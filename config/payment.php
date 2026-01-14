<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Informations de Paiement Hors Plateforme
    |--------------------------------------------------------------------------
    |
    | Ces informations seront affichées aux clients pour effectuer leurs
    | paiements en dehors de la plateforme.
    |
    */

    'bank_name' => env('PAYMENT_BANK_NAME', 'N26 Bank'),
    'account_holder' => env('PAYMENT_ACCOUNT_HOLDER', 'THOMAS SCHUBERT'),
    'iban' => env('PAYMENT_IBAN', 'DE48 1001 1001 2161 8193 26'),
    'bic' => env('PAYMENT_BIC', 'NTSBDEB1XXX'),
    
    // Instructions supplémentaires
    'instructions' => [
        'Make the bank transfer with the exact amount of your order',
        'You MUST use your order reference as the transfer description',
        'Send proof of payment (screenshot or receipt) using the button below',
        'Your order will be processed after payment validation by our team',
        'Validation time: 24 to 48 business hours',
    ],

    // Méthodes de paiement acceptées
    'accepted_methods' => [
        'Bank Transfer',
    ],

    // Informations de contact pour assistance
    'support_email' => env('PAYMENT_SUPPORT_EMAIL', 'contact@tractorrbumper.com'),
    'support_phone' => env('PAYMENT_SUPPORT_PHONE', '33602926393'),
    
    // Email de l'administrateur pour les notifications
    'admin_email' => env('ADMIN_EMAIL', 'contact@tractorrbumper.com'),
];
