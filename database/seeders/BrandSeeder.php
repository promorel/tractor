<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            [
                'brand_name' => 'Anthracite grey',
                'logo_url' => 'https://tractorbumper.com/wp-content/uploads/2022/08/DE_universal_Anthrazit.png',
            ],
            [
                'brand_name' => 'Black',
                'logo_url' => 'https://tractorbumper.com/wp-content/uploads/2023/05/universal_black_Agribumper.jpg',
            ],
            [
                'brand_name' => 'Blue Power',
                'logo_url' => 'https://tractorbumper.com/wp-content/uploads/2023/05/Blue_power_TractorBumper-640x426.png',
            ],
            [
                'brand_name' => 'Case IH',
                'logo_url' => 'https://tractorbumper.com/wp-content/uploads/2025/02/Case_Square_Logo_small-580x426.png',
            ],
            [
                'brand_name' => 'Claas',
                'logo_url' => 'https://tractorbumper.com/wp-content/uploads/2025/02/Claas_Square_Logo_small-583x426.png',
            ],
            [
                'brand_name' => 'Deutz Fahr',
                'logo_url' => 'https://tractorbumper.com/wp-content/uploads/2023/05/deutz-fahr_tractorbumper.jpg',
            ],
            [
                'brand_name' => 'Fendt',
                'logo_url' => 'https://tractorbumper.com/wp-content/uploads/2025/02/Fendt_Square_Logo_2-616x426.png',
            ],
            [
                'brand_name' => 'Fiatagri',
                'logo_url' => 'https://tractorbumper.com/wp-content/uploads/2023/05/fiat_agri_tractorBumper_Logo-640x426.jpg',
            ],
            [
                'brand_name' => 'JCB',
                'logo_url' => 'https://tractorbumper.com/wp-content/uploads/2025/02/JCB_frontweight_Logo_2-580x426.png',
            ],
            [
                'brand_name' => 'John Deere',
                'logo_url' => 'https://tractorbumper.com/wp-content/uploads/2025/02/JohnDeere_Square_Logo-2-557x426.png',
            ],
            [
                'brand_name' => 'Kubota',
                'logo_url' => 'https://tractorbumper.com/wp-content/uploads/2025/02/kubota_frontweight-small_logo-600x426.png',
            ],
            [
                'brand_name' => 'Lindner',
                'logo_url' => 'https://tractorbumper.com/wp-content/uploads/2023/05/Lindner_TractorBumper-640x426.jpg',
            ],
            [
                'brand_name' => 'Massey Ferguson',
                'logo_url' => 'https://tractorbumper.com/wp-content/uploads/2025/02/MasseyFerguson_Square_Logo_2-572x426.png',
            ],
            [
                'brand_name' => 'MB-trac',
                'logo_url' => 'https://tractorbumper.com/wp-content/uploads/2023/05/MB_trac_TractorBumper-640x426.png',
            ],
            [
                'brand_name' => 'New Holland',
                'logo_url' => 'https://tractorbumper.com/wp-content/uploads/2025/02/New-Holland_frontweight_small_logo-550x426.png',
            ],
            [
                'brand_name' => 'Steyr',
                'logo_url' => 'https://tractorbumper.com/wp-content/uploads/2022/06/steyr_tractorbumper.jpg',
            ],
            [
                'brand_name' => 'Unimog',
                'logo_url' => 'https://tractorbumper.com/wp-content/uploads/2023/05/unimog_TractorBumper_logo-640x426.jpg',
            ],
            [
                'brand_name' => 'Valtra',
                'logo_url' => 'https://tractorbumper.com/wp-content/uploads/2025/02/Valtra_Square_small-600x426.png',
            ],
        ];

        // Créer le dossier pour les logos des marques s'il n'existe pas
        $brandsDir = public_path('assets/images/products/brands');
        if (!file_exists($brandsDir)) {
            mkdir($brandsDir, 0755, true);
        }

        foreach ($brands as $brandData) {
            try {
                // Télécharger l'image depuis l'URL
                $response = Http::timeout(30)->get($brandData['logo_url']);
                
                if ($response->successful()) {
                    // Extraire l'extension du fichier
                    $extension = pathinfo(parse_url($brandData['logo_url'], PHP_URL_PATH), PATHINFO_EXTENSION);
                    if (empty($extension)) {
                        $extension = 'png'; // Par défaut
                    }

                    // Générer le nom du fichier : brand-name_logo.extension
                    $filename = Str::slug($brandData['brand_name']) . '_logo.' . $extension;
                    $filepath = $brandsDir . '/' . $filename;

                    // Sauvegarder l'image
                    file_put_contents($filepath, $response->body());

                    // Créer ou récupérer la marque (sans product_id, price, stock)
                    Brand::firstOrCreate(
                        ['brand_name' => $brandData['brand_name']],
                        ['logo' => 'assets/images/products/brands/' . $filename]
                    );

                    $this->command->info("✓ {$brandData['brand_name']} - Logo téléchargé et enregistré");
                } else {
                    $this->command->error("✗ {$brandData['brand_name']} - Erreur téléchargement (HTTP {$response->status()})");
                }
            } catch (\Exception $e) {
                $this->command->error("✗ {$brandData['brand_name']} - Erreur: {$e->getMessage()}");
            }
        }

        $this->command->info("\n🎉 Seeder des marques terminé!");
    }
}
