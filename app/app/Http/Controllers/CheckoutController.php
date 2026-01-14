<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    /**
     * Afficher la page de paiement avec instructions
     */
    public function index()
    {
        try {
            // Récupérer le panier actif
            $cart = Cart::getOrCreate();
            $cart->load(['items.product', 'items.brand']);

            // Vérifier que le panier n'est pas vide
            if ($cart->items->isEmpty()) {
                return redirect()->route('cart.index')
                    ->with('error', 'Votre panier est vide. Ajoutez des produits avant de passer commande.');
            }

            // Calculer les totaux
            $subtotal = $cart->getTotal();
            $deliveryFee = 0; // À adapter selon vos besoins
            $total = $subtotal + $deliveryFee;

            return view('checkout.index', compact('cart', 'subtotal', 'deliveryFee', 'total'));
        } catch (\Exception $e) {
            Log::error('Erreur checkout index: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue. Veuillez réessayer.');
        }
    }

    /**
     * Créer la commande et afficher les instructions de paiement
     */
    public function store(Request $request)
    {
        try {
            // Validation des informations client
            $validated = $request->validate([
                'customer_name' => 'required|string|max:255',
                'customer_email' => 'required|email|max:255',
                'customer_phone' => 'nullable|string|max:20',
                'notes' => 'nullable|string',
            ]);

            DB::beginTransaction();

            // Récupérer le panier actif
            $cart = Cart::getOrCreate();
            $cart->load(['items.product', 'items.brand']);

            // Vérifier que le panier n'est pas vide
            if ($cart->items->isEmpty()) {
                return redirect()->route('cart.index')
                    ->with('error', 'Votre panier est vide.');
            }

            // Générer la référence de commande
            $reference = Order::generateReference();

            // Créer la commande
            $order = Order::create([
                'user_id' => auth()->id(), // null si non connecté
                'customer_name' => $validated['customer_name'],
                'customer_email' => $validated['customer_email'],
                'customer_phone' => $validated['customer_phone'] ?? null,
                'reference' => $reference,
                'total_amount' => $cart->getTotal(),
                'payment_method' => 'offline',
                'payment_status' => 'pending',
                'notes' => $validated['notes'] ?? null,
            ]);

            // Créer les items de la commande
            foreach ($cart->items as $cartItem) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->product_id,
                    'brand_id' => $cartItem->brand_id,
                    'price' => $cartItem->price,
                    'quantity' => $cartItem->quantity,
                ]);
            }

            // Vider le panier
            $cart->items()->delete();

            DB::commit();

            // Envoyer l'email de confirmation
            try {
                \Mail::to($order->customer_email)->send(new \App\Mail\OrderConfirmation($order));
            } catch (\Exception $e) {
                Log::warning('Erreur envoi email commande: ' . $e->getMessage());
                // Ne pas bloquer la commande si l'email échoue
            }

            // Rediriger vers la page de paiement
            return redirect()->route('checkout.payment', encrypt($order->id))
                ->with('success', 'Commande créée avec succès ! Un email de confirmation vous a été envoyé.');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erreur création commande: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Une erreur est survenue lors de la création de votre commande.');
        }
    }

    /**
     * Afficher la page de paiement avec les instructions
     */
    public function payment($encryptedOrderId)
    {
        try {
            $orderId = decrypt($encryptedOrderId);
            $order = Order::with(['items.product', 'items.brand'])->findOrFail($orderId);

            return view('checkout.payment', compact('order'));
        } catch (\Exception $e) {
            Log::error('Erreur checkout payment: ' . $e->getMessage());
            return redirect()->route('home')->with('error', 'Commande introuvable.');
        }
    }

    /**
     * Confirmation du paiement par le client
     */
    public function confirmPayment(Request $request, $encryptedOrderId)
    {
        try {
            $orderId = decrypt($encryptedOrderId);
            $order = Order::findOrFail($orderId);

            // Vérifier que le paiement n'est pas déjà confirmé
            if (in_array($order->payment_status, ['paid', 'waiting_validation'])) {
                return response()->json([
                    'success' => false,
                    'message' => 'Cette commande a déjà été confirmée.'
                ]);
            }

            // Traiter l'upload de la preuve de paiement
            if ($request->hasFile('payment_proof')) {
                $request->validate([
                    'payment_proof' => 'required|file|mimes:jpeg,png,jpg,pdf|max:5120' // 5MB max
                ]);

                $file = $request->file('payment_proof');
                $filename = 'proof_' . $order->reference . '_' . time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('payment_proofs', $filename, 'public');

                $order->payment_proof = $path;
                $order->save(); // Sauvegarder les changements
            }

            // Passer le statut en attente de validation
            $order->markAsWaitingValidation();

            // Envoyer un email à l'admin pour notifier de la nouvelle commande
            try {
                $adminEmail = config('mail.admin_email', 'contact@tractorrbumper.com');
                \Mail::to($adminEmail)->send(new \App\Mail\NewOrderNotification($order));
            } catch (\Exception $e) {
                Log::warning('Erreur envoi email admin: ' . $e->getMessage());
            }

            return response()->json([
                'success' => true,
                'message' => 'Votre paiement a été enregistré et est en cours de vérification.'
            ]);

        } catch (\Exception $e) {
            Log::error('Erreur confirmation paiement: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Une erreur est survenue.'
            ], 500);
        }
    }
}
