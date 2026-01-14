<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'customer_email',
        'customer_name',
        'customer_phone',
        'reference',
        'total_amount',
        'payment_method',
        'payment_status',
        'payment_proof',
        'notes',
    ];

    protected $casts = [
        'total_amount' => 'decimal:2',
    ];

    /**
     * Générer une référence unique pour la commande
     */
    public static function generateReference(): string
    {
        $year = now()->year;
        $lastOrder = self::whereYear('created_at', $year)->latest('id')->first();
        $number = $lastOrder ? ((int) substr($lastOrder->reference, -4)) + 1 : 1;
        
        return sprintf('CMD-%d-%04d', $year, $number);
    }

    /**
     * Relation avec l'utilisateur
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation avec les items de la commande
     */
    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Obtenir le badge de statut avec couleur
     */
    public function getStatusBadge(): string
    {
        return match($this->payment_status) {
            'pending' => '<span class="badge bg-secondary">En attente</span>',
            'waiting_validation' => '<span class="badge bg-warning">À vérifier</span>',
            'paid' => '<span class="badge bg-success">Payé</span>',
            'rejected' => '<span class="badge bg-danger">Refusé</span>',
            default => '<span class="badge bg-light">Inconnu</span>',
        };
    }

    /**
     * Vérifier si la commande appartient à l'utilisateur
     */
    public function belongsToUser(int $userId): bool
    {
        return $this->user_id === $userId;
    }

    /**
     * Marquer la commande comme payée
     */
    public function markAsPaid(): void
    {
        $this->update(['payment_status' => 'paid']);
    }

    /**
     * Refuser le paiement
     */
    public function rejectPayment(): void
    {
        $this->update(['payment_status' => 'rejected']);
    }

    /**
     * Marquer en attente de validation
     */
    public function markAsWaitingValidation(): void
    {
        $this->update(['payment_status' => 'waiting_validation']);
    }
}
