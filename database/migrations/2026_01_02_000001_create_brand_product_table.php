<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Cette migration crée une table pivot pour permettre
     * une relation many-to-many entre brands et products
     */
    public function up(): void
    {
        Schema::create('brand_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->decimal('price', 10, 2)->nullable()->comment('Prix spécifique pour ce produit');
            $table->integer('stock')->nullable()->comment('Stock spécifique pour ce produit');
            $table->timestamps();
            
            // Empêcher les doublons (une marque ne peut être associée qu'une fois à un produit)
            $table->unique(['brand_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brand_product');
    }
};
