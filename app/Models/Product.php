<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'main_image',
        'characteristics',
        'average_price',
        'delivery_time',
        'description',
    ];

    /**
     * Get all brands for this product (Many-to-Many)
     */
    public function brands()
    {
        return $this->belongsToMany(Brand::class)
            ->withPivot('price', 'stock')
            ->withTimestamps();
    }
}
