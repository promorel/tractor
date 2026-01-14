<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Migrer les données existantes de brands.product_id vers brand_product (pivot table)
     */
    public function up(): void
    {
        // Récupérer toutes les marques qui ont un product_id
        $brands = DB::table('brands')
            ->whereNotNull('product_id')
            ->get();

        foreach ($brands as $brand) {
            // Insérer dans la table pivot
            DB::table('brand_product')->insert([
                'brand_id' => $brand->id,
                'product_id' => $brand->product_id,
                'price' => $brand->price,
                'stock' => $brand->stock,
                'created_at' => $brand->created_at ?? now(),
                'updated_at' => $brand->updated_at ?? now(),
            ]);
        }

        // Optionnel: Supprimer les colonnes product_id, price et stock de la table brands
        // car elles sont maintenant dans la table pivot
        // Commenté pour l'instant au cas où vous voulez garder pour compatibilité
        /*
        Schema::table('brands', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropColumn(['product_id', 'price', 'stock']);
        });
        */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Restaurer les données dans brands.product_id
        $pivotRecords = DB::table('brand_product')->get();

        foreach ($pivotRecords as $pivot) {
            DB::table('brands')
                ->where('id', $pivot->brand_id)
                ->update([
                    'product_id' => $pivot->product_id,
                    'price' => $pivot->price,
                    'stock' => $pivot->stock,
                ]);
        }
    }
};
