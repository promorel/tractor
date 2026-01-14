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
     * - Si on a des données pivot (contexte produit spécifique), utiliser pivot->price
     * - Sinon, si le prix direct de la marque existe → utiliser ce prix
     * - Sinon → utiliser le prix moyen du premier produit associé
     * 
     * @return float
     */
    public function getFinalPriceAttribute(): float
    {
        // Si on a des données pivot (contexte d'un produit spécifique)
        if ($this->pivot && $this->pivot->price !== null) {
            return (float) $this->pivot->price;
        }
        
        // Si la marque a un prix spécifique direct, l'utiliser
        if ($this->price !== null) {
            return (float) $this->price;
        }

        // En dernier recours, prendre le premier produit associé
        $firstProduct = $this->products()->first();
        return $firstProduct ? (float) $firstProduct->average_price : 0;
    }

    /**
     * Accessor pour le stock
     * Utilise pivot->stock si disponible, sinon le stock direct
     */
    public function getStockAttribute($value)
    {
        // Si on a des données pivot, utiliser le stock du pivot
        if ($this->pivot && isset($this->pivot->stock)) {
            return $this->pivot->stock;
        }
        
        // Sinon retourner le stock direct
        return $value;
    }

    /**
     * Get all products this brand is associated with (Many-to-Many)
     */
    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->withPivot('price', 'stock')
            ->withTimestamps();
    }
    
    /**
     * Accessor pour obtenir le premier produit (pour rétrocompatibilité)
     * Retourne le premier produit associé
     */
    public function getProductAttribute()
    {
        return $this->products()->first();
    }

    /**
     * Get all images for this brand
     */
    public function brandImages()
    {
        return $this->hasMany(BrandImage::class);
    }
}
