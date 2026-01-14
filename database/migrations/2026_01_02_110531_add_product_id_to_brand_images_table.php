<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('brand_images', function (Blueprint $table) {
            $table->foreignId('product_id')->nullable()->after('brand_id')->constrained()->onDelete('cascade');
            
            // Ajouter un index composé pour optimiser les requêtes
            $table->index(['brand_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('brand_images', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropIndex(['brand_id', 'product_id']);
            $table->dropColumn('product_id');
        });
    }
};
