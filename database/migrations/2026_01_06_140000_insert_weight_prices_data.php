<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

return new class extends Migration
{
    /**
     * Run the migrations - Create table AND insert weight prices
     */
    public function up(): void
    {
        // 1. Créer la table si elle n'existe pas
        if (!Schema::hasTable('product_weight_prices')) {
            Schema::create('product_weight_prices', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('product_id');
                $table->integer('weight')->nullable()->comment('Weight in kg');
                $table->decimal('price', 10, 2)->comment('Price in EUR');
                $table->timestamps();
                
                // Clé étrangère vers la table products
                $table->foreign('product_id')
                      ->references('id')
                      ->on('products')
                      ->onDelete('cascade');
                
                // Index unique pour éviter les doublons
                $table->unique(['product_id', 'weight']);
            });
            
            Log::info("✅ Table product_weight_prices créée");
        }
        // Afficher tous les produits pour debug
        $products = DB::table('products')->select('id', 'name')->get();
        
        Log::info("=== Début insertion prix par poids ===");
        Log::info("Produits trouvés en base : " . $products->count());
        
        foreach ($products as $product) {
            Log::info("Produit ID={$product->id}, Name='{$product->name}'");
        }
        
        // Recherche FLEXIBLE des produits (cherche avec LIKE car les noms peuvent varier)
        $weightXlBoxId = DB::table('products')
            ->where(function($q) {
                $q->where('name', 'LIKE', '%Weight%XL%BOX%')
                  ->orWhere('name', 'LIKE', '%WeightXLBOX%')
                  ->orWhere('name', 'Weight XL BOX');
            })
            ->first()?->id;
            
        $safetyWeightId = DB::table('products')
            ->where(function($q) {
                $q->where('name', 'SafetyWeight')
                  ->orWhere(function($sub) {
                      $sub->where('name', 'LIKE', '%SafetyWeight%')
                          ->where('name', 'NOT LIKE', '%Plus%');
                  });
            })
            ->first()?->id;
            
        $safetyWeightPlusId = DB::table('products')
            ->where(function($q) {
                $q->where('name', 'SafetyWeight Plus')
                  ->orWhere('name', 'LIKE', '%SafetyWeight%Plus%')
                  ->orWhere('name', 'LIKE', '%Safety%Weight%Plus%');
            })
            ->first()?->id;

        Log::info("Weight XL BOX ID: " . ($weightXlBoxId ?? 'NOT FOUND'));
        Log::info("SafetyWeight ID: " . ($safetyWeightId ?? 'NOT FOUND'));
        Log::info("SafetyWeight Plus ID: " . ($safetyWeightPlusId ?? 'NOT FOUND'));

        // Préparer les données
        $dataToInsert = [];
        
        // Données partagées pour Weight XL BOX & SafetyWeight
        $sharedWeights = [
            300  => 2293.00,
            400  => 2452.00,
            500  => 2630.00,
            600  => 2895.00,
            800  => 3050.00,
            1000 => 3226.00,
            1100 => 3426.00,
        ];
        
        // Ajouter Weight XL BOX
        if ($weightXlBoxId) {
            foreach ($sharedWeights as $weight => $price) {
                $dataToInsert[] = [
                    'product_id' => $weightXlBoxId,
                    'weight' => $weight,
                    'price' => $price,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            Log::info("✅ Weight XL BOX : 7 prix ajoutés (ID: $weightXlBoxId)");
        } else {
            Log::warning("❌ Weight XL BOX non trouvé - prix non insérés");
        }
        
        // Ajouter SafetyWeight
        if ($safetyWeightId) {
            foreach ($sharedWeights as $weight => $price) {
                $dataToInsert[] = [
                    'product_id' => $safetyWeightId,
                    'weight' => $weight,
                    'price' => $price,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            Log::info("✅ SafetyWeight : 7 prix ajoutés (ID: $safetyWeightId)");
        } else {
            Log::warning("❌ SafetyWeight non trouvé - prix non insérés");
        }
        
        // Données pour SafetyWeight Plus
        $safetyWeightPlusWeights = [
            1300 => 3662.00,
            1500 => 3895.00,
            1800 => 4096.00,
            2000 => 4326.00,
            2500 => 4895.00,
        ];
        
        // Ajouter SafetyWeight Plus
        if ($safetyWeightPlusId) {
            foreach ($safetyWeightPlusWeights as $weight => $price) {
                $dataToInsert[] = [
                    'product_id' => $safetyWeightPlusId,
                    'weight' => $weight,
                    'price' => $price,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            Log::info("✅ SafetyWeight Plus : 5 prix ajoutés (ID: $safetyWeightPlusId)");
        } else {
            Log::warning("❌ SafetyWeight Plus non trouvé - prix non insérés");
        }
        
        // Insérer les données
        if (!empty($dataToInsert)) {
            DB::table('product_weight_prices')->insert($dataToInsert);
            Log::info("✅ Total inséré : " . count($dataToInsert) . " prix");
            Log::info("=== Fin insertion prix par poids ===");
        } else {
            Log::warning("❌ AUCUNE DONNÉE INSÉRÉE - Aucun produit trouvé !");
            Log::warning("Vérifiez les noms exacts des produits dans votre base de données");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Supprimer la table complètement
        Schema::dropIfExists('product_weight_prices');
        Log::info("Table product_weight_prices supprimée");
    }
};
