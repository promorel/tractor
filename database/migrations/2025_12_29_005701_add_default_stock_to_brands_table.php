<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Cette migration modifie la colonne stock pour :
     * - Mettre à jour les NULL existants à 50
     * - Définir une valeur par défaut de 50 unités
     * - Rendre la colonne NOT NULL (car stock obligatoire)
     */
    public function up(): void
    {
        // D'abord, mettre à jour les enregistrements existants avec stock NULL
        DB::table('brands')->whereNull('stock')->update(['stock' => 50]);

        // Ensuite, modifier la colonne pour avoir une valeur par défaut
        Schema::table('brands', function (Blueprint $table) {
            $table->integer('stock')->default(50)->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('brands', function (Blueprint $table) {
            // Revenir à nullable sans valeur par défaut
            $table->integer('stock')->nullable()->change();
        });
    }
};
