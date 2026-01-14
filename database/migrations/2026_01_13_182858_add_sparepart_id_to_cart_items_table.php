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
        Schema::table('cart_items', function (Blueprint $table) {
            // Ajouter sparepart_id comme string (pas de foreign key car les données sont en config)
            $table->string('sparepart_id')->nullable()->after('brand_id');
            
            // Rendre product_id et brand_id nullables
            $table->unsignedBigInteger('product_id')->nullable()->change();
            $table->unsignedBigInteger('brand_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cart_items', function (Blueprint $table) {
            $table->dropColumn('sparepart_id');
        });
    }
};
