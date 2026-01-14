<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'product_id',
        'brand_id',
        'sparepart_id',
        'price',
        'quantity',
        'weight',
        'selected_price',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'selected_price' => 'decimal:2',
        'quantity' => 'integer',
        'weight' => 'integer',
    ];

    /**
     * Relation avec le panier
     */
    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    /**
     * Relation avec le produit
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Relation avec la marque
     */
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Calculer le sous-total de cet item (utilise selected_price si disponible)
     */
    public function getSubtotal(): float
    {
        $itemPrice = $this->selected_price ?? $this->price;
        return $itemPrice * $this->quantity;
    }
}
