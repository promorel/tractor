<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'session_id',
    ];

    /**
     * Relation avec l'utilisateur
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation avec les items du panier
     */
    public function items(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    /**
     * Calculer le total du panier
     */
    public function getTotal(): float
    {
        return $this->items->sum(function ($item) {
            // Utiliser selected_price si disponible, sinon price
            $itemPrice = $item->selected_price ?? $item->price;
            return $itemPrice * $item->quantity;
        });
    }

    /**
     * Compter le nombre total d'articles
     */
    public function getTotalItems(): int
    {
        return $this->items->sum('quantity');
    }

    /**
     * Récupérer ou créer un panier pour l'utilisateur ou la session
     */
    public static function getOrCreate(): self
    {
        if (auth()->check()) {
            // Utilisateur connecté
            $cart = self::firstOrCreate(
                ['user_id' => auth()->id()],
                ['session_id' => session()->getId()]
            );

            // Fusionner le panier de session si existant
            self::mergeSessionCart($cart);

            return $cart;
        }

        // Utilisateur invité - utiliser session
        return self::firstOrCreate(
            ['session_id' => session()->getId()],
            ['user_id' => null]
        );
    }

    /**
     * Fusionner le panier de session avec le panier utilisateur après connexion
     */
    protected static function mergeSessionCart(self $userCart): void
    {
        $sessionCart = self::where('session_id', session()->getId())
            ->where('user_id', null)
            ->first();

        if ($sessionCart && $sessionCart->id !== $userCart->id) {
            // Transférer les items
            foreach ($sessionCart->items as $item) {
                $existingItem = $userCart->items()
                    ->where('product_id', $item->product_id)
                    ->where('brand_id', $item->brand_id)
                    ->first();

                if ($existingItem) {
                    // Mettre à jour la quantité
                    $existingItem->increment('quantity', $item->quantity);
                } else {
                    // Créer un nouvel item
                    $item->cart_id = $userCart->id;
                    $item->save();
                }
            }

            // Supprimer le panier de session
            $sessionCart->delete();
        }
    }
}
