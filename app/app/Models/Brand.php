<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'brand_name',
        'price',
        'stock',
        'logo',
    ];

    /**
     * Cast attributes to native types
     */
    protected $casts = [
        'price' => 'decimal:2',
        'stock' => 'integer',
    ];

    /**
     * Accessor pour obtenir le prix final
     * 
     * Logique métier :
     * - Si le prix de la marque existe (non NULL) → utiliser ce prix
     * - Sinon → utiliser le prix par défaut du produit (average_price)
     * 
     * @return float
     */
    public function getFinalPriceAttribute(): float
    {
        // Si la marque a un prix spécifique, l'utiliser
        if ($this->price !== null) {
            return (float) $this->price;
        }

        // Sinon, utiliser le prix par défaut du produit
        return (float) $this->product->average_price;
    }

    /**
     * Get the product this brand belongs to
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get all images for this brand
     */
    public function brandImages()
    {
        return $this->hasMany(BrandImage::class);
    }
}
