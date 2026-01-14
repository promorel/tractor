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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('reference')->unique(); // Ex: CMD-2025-0001
            $table->decimal('total_amount', 10, 2);
            $table->string('payment_method')->default('offline'); // offline, bank_transfer, etc.
            $table->enum('payment_status', ['pending', 'waiting_validation', 'paid', 'rejected'])->default('pending');
            $table->string('payment_proof')->nullable(); // Chemin vers le fichier de preuve
            $table->text('notes')->nullable(); // Notes du client
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
