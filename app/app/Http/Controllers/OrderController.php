<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * Constructeur - Pas de middleware auth pour permettre aux guests de voir leurs commandes
     */
    public function __construct()
    {
        // Pas d'authentification requise - sécurisé par ID chiffré
    }

    /**
     * Afficher l'historique des commandes de l'utilisateur connecté
     */
    public function index()
    {
        try {
            // Si l'utilisateur n'est pas connecté, rediriger vers la page d'accueil
            if (!auth()->check()) {
                return redirect()->route('home')->with('info', 'Veuillez vous connecter pour voir vos commandes.');
            }

            // Récupérer uniquement les commandes de l'utilisateur connecté
            $orders = Order::where('user_id', auth()->id())
                ->with(['items.product', 'items.brand'])
                ->orderBy('created_at', 'desc')
                ->paginate(10);

            return view('orders.index', compact('orders'));
        } catch (\Exception $e) {
            Log::error('Erreur affichage historique commandes: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue lors du chargement de vos commandes.');
        }
    }

    /**
     * Afficher le détail d'une commande
     */
    public function show($encryptedId)
    {
        try {
            $id = decrypt($encryptedId);
            // Récupérer la commande avec ses relations
            $order = Order::with(['items.product', 'items.brand'])
                ->findOrFail($id);

            // SÉCURITÉ : Si l'utilisateur est connecté, vérifier que la commande lui appartient
            if (auth()->check() && $order->user_id && $order->user_id !== auth()->id()) {
                abort(403, 'Vous n\'êtes pas autorisé à accéder à cette commande.');
            }

            return view('orders.show', compact('order'));
        } catch (\Exception $e) {
            Log::error('Erreur affichage détail commande: ' . $e->getMessage());
            return redirect()->route('home')->with('error', 'Commande introuvable.');
        }
    }

    /**
     * Télécharger la facture (à implémenter plus tard avec un générateur PDF)
     */
    public function downloadInvoice($id)
    {
        try {
            $order = Order::findOrFail($id);

            // SÉCURITÉ : Vérifier l'appartenance
            if ($order->user_id !== auth()->id()) {
                abort(403);
            }

            // TODO: Générer le PDF de la facture
            return redirect()->back()->with('info', 'Fonctionnalité de téléchargement de facture à venir.');
        } catch (\Exception $e) {
            Log::error('Erreur téléchargement facture: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue.');
        }
    }
}
