<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * Nouvelle vue pour gérer les commandes (validation/rejet)
     */
    public function commandes(Request $request)
    {
        try {
            $query = Order::with(['user', 'items.product', 'items.brand']);

            // Filtre par statut
            if ($request->has('status') && $request->status !== 'all') {
                $query->where('payment_status', $request->status);
            }

            // Filtre par recherche (référence, email client ou nom client)
            if ($request->has('search') && $request->search) {
                $search = $request->search;
                $query->where(function($q) use ($search) {
                    $q->where('reference', 'like', "%{$search}%")
                      ->orWhere('customer_email', 'like', "%{$search}%")
                      ->orWhere('customer_name', 'like', "%{$search}%")
                      ->orWhereHas('user', function($q) use ($search) {
                          $q->where('email', 'like', "%{$search}%")
                            ->orWhere('name', 'like', "%{$search}%");
                      });
                });
            }

            // Tri par défaut : plus récent en premier
            $orders = $query->orderBy('created_at', 'desc')->paginate(20);

            // Statistiques
            $stats = [
                'total' => Order::count(),
                'pending' => Order::where('payment_status', 'pending')->count(),
                'waiting_validation' => Order::where('payment_status', 'waiting_validation')->count(),
                'paid' => Order::where('payment_status', 'paid')->count(),
                'rejected' => Order::where('payment_status', 'rejected')->count(),
            ];

            return view('admin.commandes.index', compact('orders', 'stats'));
        } catch (\Exception $e) {
            Log::error('Erreur affichage commandes: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue.');
        }
    }

    /**
     * Afficher la liste des commandes
     */
    public function index(Request $request)
    {
        try {
            $query = Order::with(['user', 'items.product', 'items.brand']);

            // Filtre par statut
            if ($request->has('status') && $request->status !== 'all') {
                $query->where('payment_status', $request->status);
            }

            // Filtre par recherche (référence, email client ou nom client)
            if ($request->has('search') && $request->search) {
                $search = $request->search;
                $query->where(function($q) use ($search) {
                    $q->where('reference', 'like', "%{$search}%")
                      ->orWhere('customer_email', 'like', "%{$search}%")
                      ->orWhere('customer_name', 'like', "%{$search}%")
                      ->orWhereHas('user', function($q) use ($search) {
                          $q->where('email', 'like', "%{$search}%")
                            ->orWhere('name', 'like', "%{$search}%");
                      });
                });
            }

            // Tri par défaut : plus récent en premier
            $orders = $query->orderBy('created_at', 'desc')->paginate(20);

            // Statistiques
            $stats = [
                'total' => Order::count(),
                'pending' => Order::where('payment_status', 'pending')->count(),
                'waiting_validation' => Order::where('payment_status', 'waiting_validation')->count(),
                'paid' => Order::where('payment_status', 'paid')->count(),
                'rejected' => Order::where('payment_status', 'rejected')->count(),
            ];

            return view('admin.orders.index', compact('orders', 'stats'));
        } catch (\Exception $e) {
            Log::error('Erreur affichage commandes admin: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue.');
        }
    }

    /**
     * Afficher les détails d'une commande
     */
    public function show($encryptedId)
    {
        try {
            $id = decrypt($encryptedId);
            $order = Order::with(['user', 'items.product', 'items.brand'])->findOrFail($id);
            
            return view('admin.commandes.show', compact('order'));
        } catch (\Exception $e) {
            Log::error('Erreur affichage commande admin: ' . $e->getMessage());
            return redirect()->route('admin.commandes')->with('error', 'Order not found.');
        }
    }

    /**
     * Marquer une commande comme payée
     */
    public function markAsPaid($encryptedId)
    {
        try {
            $id = decrypt($encryptedId);
            $order = Order::with(['items.product', 'items.brand'])->findOrFail($id);
            $order->markAsPaid();

            // Envoyer un email de confirmation au client avec le RIB et les détails
            try {
                \Mail::to($order->customer_email)->send(new \App\Mail\OrderConfirmedWithDetails($order));
            } catch (\Exception $e) {
                Log::warning('Erreur envoi email confirmation client: ' . $e->getMessage());
            }

            return redirect()->back()->with('success', 'Commande marquée comme payée. Un email de confirmation a été envoyé au client.');
        } catch (\Exception $e) {
            Log::error('Erreur marquage commande payée: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue.');
        }
    }

    /**
     * Refuser le paiement d'une commande
     */
    public function rejectPayment(Request $request, $encryptedId)
    {
        try {
            // Validation du motif
            $request->validate([
                'rejection_reason' => 'required|string|min:10|max:500'
            ], [
                'rejection_reason.required' => 'Le motif du rejet est obligatoire.',
                'rejection_reason.min' => 'Le motif doit contenir au moins 10 caractères.',
                'rejection_reason.max' => 'Le motif ne peut pas dépasser 500 caractères.'
            ]);

            $id = decrypt($encryptedId);
            $order = Order::with(['items.product', 'items.brand'])->findOrFail($id);
            
            // Rejeter le paiement
            $order->rejectPayment();

            // Envoyer un email au client avec le motif du rejet
            try {
                \Mail::to($order->customer_email)->send(new \App\Mail\OrderRejected($order, $request->rejection_reason));
            } catch (\Exception $e) {
                Log::warning('Erreur envoi email rejet client: ' . $e->getMessage());
            }

            return redirect()->back()->with('success', 'Paiement refusé. Un email a été envoyé au client.');
        } catch (\Exception $e) {
            Log::error('Erreur refus paiement: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue.');
        }
    }

    /**
     * Télécharger la preuve de paiement
     */
    public function downloadProof($encryptedId)
    {
        try {
            $id = decrypt($encryptedId);
            $order = Order::findOrFail($id);

            if (!$order->payment_proof) {
                return redirect()->back()->with('error', 'Aucune preuve de paiement disponible.');
            }

            $filePath = storage_path('app/public/' . $order->payment_proof);

            if (!file_exists($filePath)) {
                return redirect()->back()->with('error', 'Fichier introuvable.');
            }

            return response()->download($filePath);
        } catch (\Exception $e) {
            Log::error('Erreur téléchargement preuve: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue.');
        }
    }
}
