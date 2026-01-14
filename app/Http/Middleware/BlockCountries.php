<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use GeoIp2\Database\Reader;
use Symfony\Component\HttpFoundation\Response;

class BlockCountries
{
    /**
     * Liste des codes pays bloqués (ISO 3166-1 alpha-2)
     * BJ = Bénin, NL = Pays-Bas/Netherlands/Holland, FR = France
     */
    protected array $blockedCountries = [
        'BJ', // Bénin
        'NL', // Pays-Bas 
        'FR', // France
    ];

    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $geoipPath = base_path('geoip/GeoLite2-Country.mmdb');
            
            // Vérifier si la base de données GeoIP existe
            if (!file_exists($geoipPath)) {
                // Si le fichier n'existe pas, laisser passer (en développement)
                return $next($request);
            }

            $reader = new Reader($geoipPath);
            
            // Récupérer la vraie IP (gère les proxies/CDN)
            $ip = $this->getRealIp($request);
            
            // Ne bloquer QUE si on est en environnement local (localhost/127.0.0.1)
            if ($this->isStrictLocalhost($ip)) {
                return $next($request);
            }

            // Tenter la détection du pays
            $record = $reader->country($ip);
            $countryCode = $record->country->isoCode;

            // Afficher pour debug (à retirer après tests)
            \Log::info("IP détectée: {$ip}, Pays: {$countryCode}");

            if (in_array($countryCode, $this->blockedCountries)) {
                abort(403, 'Access denied from your country.');
            }

        } catch (\GeoIp2\Exception\AddressNotFoundException $e) {
            // IP non trouvée dans la base → laisser passer
            \Log::warning("GeoIP: IP {$ip} non trouvée dans la base");
        } catch (\Exception $e) {
            // Erreur technique → laisser passer mais logger
            \Log::error('GeoIP error: ' . $e->getMessage());
        }

        return $next($request);
    }

    /**
     * Récupérer la vraie IP (gère proxies, load balancers, Cloudflare, etc.)
     */
    protected function getRealIp(Request $request): string
    {
        // Liste des headers à vérifier (ordre de priorité)
        $headers = [
            'HTTP_CF_CONNECTING_IP', // Cloudflare
            'HTTP_X_REAL_IP',        // Nginx proxy
            'HTTP_X_FORWARDED_FOR',  // Standard proxy
            'REMOTE_ADDR',           // IP directe
        ];

        foreach ($headers as $header) {
            if ($request->server($header)) {
                $ip = $request->server($header);
                
                // Si X-Forwarded-For contient plusieurs IPs, prendre la première
                if (str_contains($ip, ',')) {
                    $ip = trim(explode(',', $ip)[0]);
                }
                
                // Valider que c'est une vraie IP publique
                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
                    return $ip;
                }
            }
        }

        return $request->ip();
    }

    /**
     * Vérifier si c'est STRICTEMENT localhost (développement local)
     */
    protected function isStrictLocalhost(string $ip): bool
    {
        return in_array($ip, ['127.0.0.1', '::1', 'localhost']);
    }
}
