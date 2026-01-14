# Tractorbumper - E-Commerce Platform

Site e-commerce pour la vente de bumpers de tracteurs avec système de paiement hors ligne et traduction multilingue.

## 🚀 Fonctionnalités Principales

### 🛒 Système de Commande
- **Checkout sans authentification** : Les clients peuvent commander en tant qu'invités
- **Informations client** : Collecte de nom, email et téléphone
- **Paiement hors plateforme** : Virement bancaire uniquement
- **Preuves de paiement** : Upload et validation manuelle par l'admin
- **Notifications email** : Confirmation de commande automatique

### 👨‍💼 Interface Admin
- **Gestion des commandes** : `/admin/commandes` - Liste et détails des commandes
- **Validation manuelle** : Approuver ou rejeter les paiements
- **Visualisation des preuves** : Affichage direct des images et PDFs

### 🌍 Traduction Multilingue
- **16 langues disponibles** : Anglais (défaut), Allemand, Espagnol, Italien, Polonais, Norvégien, Suédois, Roumain, Français, Grec, Russe, Lituanien, Letton, Hongrois, Portugais, Bulgare
- **Google Translate intégré** : Traduction dynamique sans rechargement
- **Interface personnalisée** : Dropdown Bootstrap stylisé
- **Responsive** : Disponible sur desktop et mobile

### 💾 Persistance des Données
- **Sauvegarde permanente** : Toutes les commandes en base de données
- **Historique client** : Accessible après connexion
- **Preuves de paiement** : Stockage dans `storage/app/public/payment_proofs/`

## 📋 Installation

### 1. Configuration de base

### 1. Configuration de base

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh
php artisan storage:link
```

### 2. Variables d'environnement

Ajoutez dans `.env` :

```env
# Informations bancaires
PAYMENT_BANK_NAME="Votre Banque"
PAYMENT_ACCOUNT_HOLDER="TractorBumper Company"
PAYMENT_IBAN="XX00 0000 0000 0000 0000 0000 00"
PAYMENT_BIC="XXXXXXXX"
PAYMENT_ACCOUNT_NUMBER="00000000000"

# Support client
PAYMENT_SUPPORT_EMAIL="payment@tractorbumber.com"
PAYMENT_SUPPORT_PHONE="+00 000 00 00 00"
```

## 🛠️ Technologies

- **Laravel 11** avec Jetstream
- **Bootstrap 5** pour l'interface
- **Google Translate API** pour la traduction
- **MySQL** pour la base de données

## 📁 Structure des Fichiers Clés

### Routes
- `routes/web.php` : Routes principales et admin

### Contrôleurs
- `app/Http/Controllers/CheckoutController.php` : Gestion du checkout
- `app/Http/Controllers/Admin/OrderController.php` : Interface admin

### Vues
- `resources/views/checkout/` : Pages de commande
- `resources/views/admin/commandes/` : Interface admin
- `resources/views/layout/menu.blade.php` : Menu avec traducteur

### Migration
- `database/migrations/2025_12_27_000001_create_orders_table.php`
- `database/migrations/2025_12_28_000001_add_customer_info_to_orders_table.php`

## 📞 Support

Pour toute question, contactez l'équipe de développement.

---

Développé avec Laravel 11
