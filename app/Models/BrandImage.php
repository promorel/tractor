<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'product_id',
        'image_path',
    ];

    /**
     * Get the brand this image belongs to
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Get the product this image belongs to
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
