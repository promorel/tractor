<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- SEO Core -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO Description -->
    <meta name="description" content="High-quality tractor front bumpers designed for road safety and visibility. Compatible with all major tractor brands. Fast delivery across Europe.">

    <!-- SEO Control -->
    <meta name="google" content="notranslate">
    <meta name="robots" content="index, follow">

    <!-- Branding -->
    <meta name="author" content="Tractorbumper">
    <meta name="theme-color" content="#d4af37">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>Tractor Front Bumper – Safety & Visibility | Tractorrbumper</title>

    <!-- Canonical URL -->
    <link rel="canonical" href="https://tractorrbumper.com/">

    <!-- Hreflang (European targeting) -->
    <link rel="alternate" hreflang="en" href="https://tractorrbumper.com/">
    <link rel="alternate" hreflang="fr" href="https://tractorrbumper.com/">
    <link rel="alternate" hreflang="de" href="https://tractorrbumper.com/">
    <link rel="alternate" hreflang="es" href="https://tractorrbumper.com/">
    <link rel="alternate" hreflang="it" href="https://tractorrbumper.com/">
    <link rel="alternate" hreflang="pl" href="https://tractorrbumper.com/">
    <link rel="alternate" hreflang="no" href="https://tractorrbumper.com/">
    <link rel="alternate" hreflang="sv" href="https://tractorrbumper.com/">
    <link rel="alternate" hreflang="ro" href="https://tractorrbumper.com/">
    <link rel="alternate" hreflang="el" href="https://tractorrbumper.com/">
    <link rel="alternate" hreflang="ru" href="https://tractorrbumper.com/">
    <link rel="alternate" hreflang="lt" href="https://tractorrbumper.com/">
    <link rel="alternate" hreflang="lv" href="https://tractorrbumper.com/">
    <link rel="alternate" hreflang="hu" href="https://tractorrbumper.com/">
    <link rel="alternate" hreflang="pt" href="https://tractorrbumper.com/">
    <link rel="alternate" hreflang="bg" href="https://tractorrbumper.com/">
    <link rel="alternate" hreflang="x-default" href="https://tractorrbumper.com/">

    <!-- Open Graph (Social Sharing) -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Tractor Front Bumper – Safety & Visibility | Tractorbumper">
    <meta property="og:description" content="High-quality tractor front bumpers for road safety and visibility. Compatible with major tractor brands across Europe.">
    <meta property="og:url" content="https://tractorrbumper.com/">

    <meta charset="UTF-8">

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favico.png') }}" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/favico.png') }}">

    <!-- Vendor CSS (Icon Font) -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/pe-icon-7-stroke.min.css') }}">

    <!-- Plugins CSS (All Plugins Files) -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/aos.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/nice-select.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/jquery-ui.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/lightgallery.min.css') }}" />

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

    <!-- Google Translate Custom Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/google-translate.css') }}" />
    
    <!-- Mobile Custom Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/mobile-custom.css') }}" />
    
    <style>
        /* Hide Google Translate table/banner */
        body > table,
        body > .skiptranslate,
        body > iframe.skiptranslate,
        .goog-te-banner-frame.skiptranslate {
            display: none !important;
        }
        
        /* Reset body top margin */
        body {
            top: 0 !important;
        }
    </style>

    <!-- Preconnect for Performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="dns-prefetch" href="https://www.youtube.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>
    <!-- Include Menu Component -->
    @include('layout.menu')

    <!-- Main Content Section -->
    <main>
        @yield('contenu')
    </main>

    <!-- Include Footer Component -->
    @include('layout.footer')

    <!-- Core JS Files -->
    <script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-migrate-3.3.2.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/modernizr-3.11.2.min.js') }}"></script>

    <!-- Plugin JS Files -->
    <script src="{{ asset('assets/js/plugins/countdown.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/aos.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/lightgallery-all.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/thia-sticky-sidebar.min.js') }}"></script>

    <!-- Main Application JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Cart Management Script -->
    <script>
        // Configuration CSRF pour les requêtes AJAX
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

        // Charger le contenu du panier
        // Cette fonction est appelée par main.js lors de l'ouverture du panier
        function loadCart() {
            console.log('loadCart appelé');
            const container = document.getElementById('cart-items-container');

            // Afficher un loader
            container.innerHTML = '<div class="text-center py-5"><div class="spinner-border" role="status"><span class="visually-hidden">Chargement...</span></div></div>';

            fetch('/cart/get', {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        container.innerHTML = data.html;
                        updateCartCounter(data.cart.total_items);
                        // Attacher les événements seulement si le panier n'est pas vide
                        if (data.cart.total_items > 0) {
                            attachCartEventListeners();
                        }
                    }
                })
                .catch(error => {
                    console.error('Erreur lors du chargement du panier:', error);
                    container.innerHTML = '<div class="alert alert-danger m-3">Erreur lors du chargement du panier</div>';
                });
        }

        // Ajouter un produit au panier
        function addToCart(productId, brandId, quantity = 1, weight = null, selectedPrice = null) {
            console.log('addToCart called with:', { productId, brandId, quantity, weight, selectedPrice });
            
            const formData = new FormData();
            formData.append('product_id', productId);
            formData.append('brand_id', brandId);
            formData.append('quantity', quantity);
            
            // Ajouter le poids et le prix si fournis
            if (weight) {
                formData.append('weight', weight);
            }
            if (selectedPrice) {
                formData.append('selected_price', selectedPrice);
            }

            console.log('Sending request to /cart/add');

            fetch('/cart/add', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: formData
            })
                .then(response => {
                    console.log('Response status:', response.status);
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Response data:', data);
                    if (data.success) {
                        showNotification(data.message, 'success');
                        updateCartCounter(data.cart.total_items);

                        // Si le panier est ouvert, le recharger
                        if (document.querySelector('.cart-offcanvas-wrapper').classList.contains('open')) {
                            document.getElementById('cart-items-container').innerHTML = data.html;
                            attachCartEventListeners();
                        }
                    } else {
                        showNotification(data.message || 'Erreur lors de l\'ajout au panier', 'error');
                    }
                })
                .catch(error => {
                    console.error('Erreur complète:', error);
                    showNotification('Une erreur est survenue: ' + error.message, 'error');
                });
        }

        // Mettre à jour la quantité d'un item
        function updateQuantity(itemId, quantity) {
            const formData = new FormData();
            formData.append('item_id', itemId);
            formData.append('quantity', quantity);

            fetch('/cart/update-quantity', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('cart-items-container').innerHTML = data.html;
                        updateCartCounter(data.cart.total_items);
                        attachCartEventListeners();
                    } else {
                        showNotification(data.message, 'error');
                    }
                })
                .catch(error => {
                    console.error('Erreur:', error);
                    showNotification('Une erreur est survenue', 'error');
                });
        }

        // Supprimer un item du panier
        function removeFromCart(itemId) {
            if (!confirm('Voulez-vous vraiment retirer cet article du panier ?')) {
                return;
            }

            fetch(`/cart/remove/${itemId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showNotification(data.message, 'success');
                        document.getElementById('cart-items-container').innerHTML = data.html;
                        updateCartCounter(data.cart.total_items);
                        attachCartEventListeners();
                    } else {
                        showNotification(data.message, 'error');
                    }
                })
                .catch(error => {
                    console.error('Erreur:', error);
                    showNotification('Une erreur est survenue', 'error');
                });
        }

        // Mettre à jour le compteur du panier
        function updateCartCounter(count) {
            const counter = document.querySelector('.cart-counter');
            if (counter) {
                counter.textContent = count;
                counter.style.display = count > 0 ? 'inline-block' : 'none';
            }
        }

        // Afficher une notification
        function showNotification(message, type = 'info') {
            // Créer l'élément de notification
            const notification = document.createElement('div');
            notification.className = `alert alert-${type === 'success' ? 'success' : type === 'error' ? 'danger' : 'info'} notification-toast`;
            notification.style.cssText = 'position: fixed; top: 20px; right: 20px; z-index: 9999; min-width: 250px; animation: slideIn 0.3s ease-out;';
            notification.innerHTML = `
                <button type="button" class="btn-close" onclick="this.parentElement.remove()"></button>
                ${message}
            `;

            document.body.appendChild(notification);

            // Auto-fermeture après 3 secondes
            setTimeout(() => {
                notification.style.animation = 'slideOut 0.3s ease-out';
                setTimeout(() => notification.remove(), 300);
            }, 3000);
        }

        // Attacher les événements aux éléments du panier
        function attachCartEventListeners() {
            // Boutons de quantité
            document.querySelectorAll('.btn-qty-plus').forEach(btn => {
                btn.addEventListener('click', function () {
                    const itemId = this.dataset.itemId;
                    const input = document.querySelector(`.item-quantity[data-item-id="${itemId}"]`);
                    const newQuantity = parseInt(input.value) + 1;
                    updateQuantity(itemId, newQuantity);
                });
            });

            document.querySelectorAll('.btn-qty-minus').forEach(btn => {
                btn.addEventListener('click', function () {
                    const itemId = this.dataset.itemId;
                    const input = document.querySelector(`.item-quantity[data-item-id="${itemId}"]`);
                    const newQuantity = Math.max(1, parseInt(input.value) - 1);
                    updateQuantity(itemId, newQuantity);
                });
            });

            // Boutons de suppression
            document.querySelectorAll('.btn-remove-item').forEach(btn => {
                btn.addEventListener('click', function () {
                    const itemId = this.dataset.itemId;
                    removeFromCart(itemId);
                });
            });
        }

        // Initialisation au chargement de la page
        document.addEventListener('DOMContentLoaded', function () {
            console.log('Initialisation du panier...');

            // Charger le compteur du panier
            fetch('/cart/get', {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        updateCartCounter(data.cart.total_items);
                    }
                })
                .catch(error => {
                    console.error('Erreur lors du chargement du compteur:', error);
                    updateCartCounter(0);
                });

            // Note: Le bouton panier est géré par main.js qui appelle loadCart()
            // Nous n'avons pas besoin d'attacher d'événement ici

            // Fermer le panier avec le bouton close (géré par main.js)
            // Fermer le panier en cliquant sur l'overlay (géré par main.js)

            // Initialize AOS on page load
            if (typeof AOS !== 'undefined') {
                AOS.init({
                    duration: 800,
                    easing: 'ease-in-out-quad',
                    once: true
                });
            }
        });

        // Animations CSS pour les notifications
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideIn {
                from {
                    transform: translateX(400px);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }
            @keyframes slideOut {
                from {
                    transform: translateX(0);
                    opacity: 1;
                }
                to {
                    transform: translateX(400px);
                    opacity: 0;
                }
            }
            .cart-item {
                display: flex;
                align-items: center;
                padding: 15px 0;
            }
            .cart-item:not(:last-child) {
                border-bottom: 1px solid #e0e0e0;
            }
        `;
        document.head.appendChild(style);
    </script>

    <!-- Defer non-critical scripts -->
    <script>
        // Initialize AOS on page load
        document.addEventListener('DOMContentLoaded', function () {
            if (typeof AOS !== 'undefined') {
                AOS.init({
                    duration: 800,
                    easing: 'ease-in-out-quad',
                    once: true
                });
            }
        });
    </script>

    <!-- Google Translate Integration -->
    <script type="text/javascript">
        // Mapping des langues avec leurs drapeaux
        const languageFlags = {
            'en': '🇬🇧', 'de': '🇩🇪', 'es': '🇪🇸', 'it': '🇮🇹',
            'pl': '🇵🇱', 'no': '🇳🇴', 'sv': '🇸🇪', 'ro': '🇷🇴',
            'fr': '🇫🇷', 'el': '🇬🇷', 'ru': '🇷🇺', 'lt': '🇱🇹',
            'lv': '🇱🇻', 'hu': '🇭🇺', 'pt': '🇵🇹', 'bg': '🇧🇬'
        };

        function googleTranslateElementInit() {
            new google.translate.TranslateElement(
                {
                    pageLanguage: 'en',
                    includedLanguages: 'en,pl,no,sv,ro,fr,el,ru,lt,lv,de,es,it,hu,pt,bg',
                    autoDisplay: false
                },
                'google_translate_element'
            );
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {

            // Fonction pour changer la langue
            function changeLanguage(lang, flag) {
                const select = document.querySelector("select.goog-te-combo");
                if (!select) {
                    setTimeout(() => changeLanguage(lang, flag), 500);
                    return;
                }

                select.value = lang;
                select.dispatchEvent(new Event("change"));
                
                // Sauvegarder la langue et le drapeau dans localStorage
                localStorage.setItem('selectedLanguage', lang);
                localStorage.setItem('selectedFlag', flag);
                
                // Mettre à jour tous les drapeaux affichés
                updateAllFlags(flag);
            }

            // Fonction pour mettre à jour tous les drapeaux
            function updateAllFlags(flag) {
                // Drapeau fixe en bas à gauche (mobile)
                const fixedFlag = document.getElementById('fixedCurrentFlag');
                if (fixedFlag) fixedFlag.textContent = flag;
                
                // Drapeau du menu offcanvas
                const currentFlagMobile = document.getElementById('currentFlagMobile');
                if (currentFlagMobile) currentFlagMobile.textContent = flag;
            }

            // Fonction pour mettre à jour le code langue
            function updateLangCode(code) {
                const fixedLangCode = document.getElementById('fixedLangCode');
                if (fixedLangCode) fixedLangCode.textContent = code;
            }

            // Fonction pour mettre à jour le texte de langue
            function updateLanguageText(langText) {
                const currentLangMobile = document.getElementById('currentLanguageMobile');
                if (currentLangMobile) currentLangMobile.textContent = langText;
                
                const currentLang = document.getElementById('currentLanguage');
                if (currentLang) currentLang.textContent = langText;
            }

            // Gestionnaire de clic sur les éléments de langue
            setTimeout(function() {
                const savedLang = localStorage.getItem('selectedLanguage') || 'en';
                const savedFlag = localStorage.getItem('selectedFlag') || languageFlags['en'];
                const savedCode = localStorage.getItem('selectedCode') || 'EN';
                
                if (savedLang && savedLang !== 'en') {
                    changeLanguage(savedLang, savedFlag);
                    
                    // Mettre à jour le texte de langue
                    const langItem = document.querySelector(`.lang-select[data-lang="${savedLang}"]`);
                    if (langItem) {
                        const langText = langItem.textContent.trim().split(' ').slice(1).join(' ');
                        updateLanguageText(langText);
                    }
                } else {
                    // Appliquer la langue par défaut (EN)
                    updateAllFlags(savedFlag);
                }
                
                // Mettre à jour le code langue
                updateLangCode(savedCode);
            }, 1000);

            // Gestionnaire de clic sur les éléments de langue
            document.querySelectorAll(".lang-select").forEach(item => {
                item.addEventListener("click", function (e) {
                    e.preventDefault();

                    const lang = this.getAttribute("data-lang");
                    const flag = this.getAttribute("data-flag") || languageFlags[lang];
                    const langText = this.textContent.trim().split(' ').slice(1).join(' ');
                    const code = this.getAttribute("data-code") || lang.toUpperCase();

                    // Changer la langue
                    changeLanguage(lang, flag);
                    
                    // Mettre à jour le texte
                    updateLanguageText(langText);
                    
                    // Mettre à jour le code langue
                    updateLangCode(code);
                    
                    // Sauvegarder le code
                    localStorage.setItem('selectedCode', code);
                });
            });
        });
    </script>

    <script type="text/javascript"
        src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>
    
    <!-- TikTok Embed Script -->
    <script async src="https://www.tiktok.com/embed.js"></script>
</body>

</html>