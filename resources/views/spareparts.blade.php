@extends('layout.template')

@section('contenu')

    <style>
        .spareparts-page {
            padding: 60px 0;
        }

        .category-section {
            margin-bottom: 80px;
        }

        .category-title {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 30px;
            color: #333;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
            margin-top: 30px;
        }

        .product-card {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            display: flex;
            flex-direction: column;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
        }

        .product-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            background: #f8f9fa;
        }

        .product-content {
            padding: 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .product-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 10px;
            color: #333;
            min-height: 50px;
        }

        .product-price {
            font-size: 1.3rem;
            color: #d4af37;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .product-price small {
            font-size: 0.8rem;
            color: #666;
            font-weight: normal;
        }

        .add-to-cart-btn {
            background: linear-gradient(135deg, #FDC830 0%, #d4af37 100%);
            color: #000;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
            margin-top: auto;
        }

        .add-to-cart-btn:hover {
            background: linear-gradient(135deg, #d4af37 0%, #FDC830 100%);
            transform: scale(1.05);
        }

        .add-to-cart-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .quantity-selector {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }

        .quantity-selector input {
            width: 60px;
            text-align: center;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .filter-sort-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 10px;
        }

        .sort-select {
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        .result-count {
            color: #666;
            font-size: 1rem;
        }
    </style>

    <!-- Breadcrumb Section Start -->
    <div class="section">
        <div class="breadcrumb-area bg-light">
            <div class="container-fluid">
                <div class="breadcrumb-content text-center">
                    <h1 class="title">Spare Parts & Accessories</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">Spareparts & Stickers</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Spareparts Section Start -->
    <section class="spareparts-page">
        <div class="container">

            <!-- Spareparts Category -->
            <div class="category-section">
                <h2 class="category-title">Spareparts</h2>

                <div class="filter-sort-bar">
                    <p class="result-count">Showing all {{ count($spareparts) }} results</p>
                    <select class="sort-select" id="sparepartsSort">
                        <option value="popularity">Sort by popularity</option>
                        <option value="price-asc">Sort by price: low to high</option>
                        <option value="price-desc">Sort by price: high to low</option>
                        <option value="name">Sort by name</option>
                    </select>
                </div>

                <div class="products-grid" id="sparepartsGrid">
                    @foreach($spareparts as $sparepart)
                    <div class="product-card" data-price="{{ $sparepart['price'] }}" data-name="{{ $sparepart['name'] }}">
                        <img src="{{ asset($sparepart['image']) }}" 
                             alt="{{ $sparepart['name'] }}" class="product-image">
                        <div class="product-content">
                            <h3 class="product-title">{{ $sparepart['name'] }}</h3>
                            <p class="product-price">€{{ number_format($sparepart['price'], 2) }} <small>excl. VAT</small></p>
                            <div class="quantity-selector">
                                <label>Qty:</label>
                                <input type="number" class="product-quantity" value="1" min="1" max="{{ $sparepart['stock'] }}">
                            </div>
                            <button class="add-to-cart-btn" onclick="addSparepartToCart(this, '{{ $sparepart['id'] }}')">
                                <i class="pe-7s-shopbag"></i> Add to cart
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Stickers Category -->
            <div class="category-section">
                <h2 class="category-title">Stickers</h2>

                <div class="filter-sort-bar">
                    <p class="result-count">Showing all {{ count($stickers) }} results</p>
                    <select class="sort-select" id="stickersSort">
                        <option value="popularity">Sort by popularity</option>
                        <option value="price-asc">Sort by price: low to high</option>
                        <option value="price-desc">Sort by price: high to low</option>
                        <option value="name">Sort by name</option>
                    </select>
                </div>

                <div class="products-grid" id="stickersGrid">
                    @foreach($stickers as $sticker)
                    <div class="product-card" data-price="{{ $sticker['price'] }}" data-name="{{ $sticker['name'] }}">
                        <img src="{{ asset($sticker['image']) }}" 
                             alt="{{ $sticker['name'] }}" class="product-image">
                        <div class="product-content">
                            <h3 class="product-title">{{ $sticker['name'] }}</h3>
                            <p class="product-price">€{{ number_format($sticker['price'], 2) }} <small>excl. VAT</small></p>
                            <div class="quantity-selector">
                                <label>Qty:</label>
                                <input type="number" class="product-quantity" value="1" min="1" max="{{ $sticker['stock'] }}">
                            </div>
                            <button class="add-to-cart-btn" onclick="addSparepartToCart(this, '{{ $sticker['id'] }}')">
                                <i class="pe-7s-shopbag"></i> Add to cart
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>
    <!-- Spareparts Section End -->

    <script>
        // Fonction pour ajouter un sparepart au panier
        function addSparepartToCart(button, sparepartId) {
            const card = button.closest('.product-card');
            const quantityInput = card.querySelector('.product-quantity');
            const quantity = parseInt(quantityInput.value) || 1;

            // Désactiver le bouton temporairement
            button.disabled = true;
            button.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Adding...';

            // Préparer les données
            const formData = new FormData();
            formData.append('sparepart_id', sparepartId);
            formData.append('quantity', quantity);

            // Envoyer la requête AJAX
            fetch('{{ route("spareparts.addToCart") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showNotification(data.message, 'success');
                    updateCartCounter(data.cart.total_items);

                    // Si le panier est ouvert, le recharger
                    const cartWrapper = document.querySelector('.cart-offcanvas-wrapper');
                    if (cartWrapper && cartWrapper.classList.contains('open')) {
                        document.getElementById('cart-items-container').innerHTML = data.html;
                        attachCartEventListeners();
                    }

                    // Réinitialiser le bouton
                    button.disabled = false;
                    button.innerHTML = '<i class="pe-7s-shopbag"></i> Add to cart';
                    
                    // Réinitialiser la quantité
                    quantityInput.value = 1;
                } else {
                    showNotification(data.message || 'Error adding to cart', 'error');
                    button.disabled = false;
                    button.innerHTML = '<i class="pe-7s-shopbag"></i> Add to cart';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('An error occurred', 'error');
                button.disabled = false;
                button.innerHTML = '<i class="pe-7s-shopbag"></i> Add to cart';
            });
        }

        // Fonction de tri pour Spareparts
        document.getElementById('sparepartsSort').addEventListener('change', function() {
            const sortValue = this.value;
            const grid = document.getElementById('sparepartsGrid');
            const cards = Array.from(grid.querySelectorAll('.product-card'));

            cards.sort((a, b) => {
                const priceA = parseFloat(a.dataset.price);
                const priceB = parseFloat(b.dataset.price);
                const nameA = a.dataset.name.toLowerCase();
                const nameB = b.dataset.name.toLowerCase();

                switch(sortValue) {
                    case 'price-asc':
                        return priceA - priceB;
                    case 'price-desc':
                        return priceB - priceA;
                    case 'name':
                        return nameA.localeCompare(nameB);
                    default:
                        return 0;
                }
            });

            cards.forEach(card => grid.appendChild(card));
        });

        // Fonction de tri pour Stickers
        document.getElementById('stickersSort').addEventListener('change', function() {
            const sortValue = this.value;
            const grid = document.getElementById('stickersGrid');
            const cards = Array.from(grid.querySelectorAll('.product-card'));

            cards.sort((a, b) => {
                const priceA = parseFloat(a.dataset.price);
                const priceB = parseFloat(b.dataset.price);
                const nameA = a.dataset.name.toLowerCase();
                const nameB = b.dataset.name.toLowerCase();

                switch(sortValue) {
                    case 'price-asc':
                        return priceA - priceB;
                    case 'price-desc':
                        return priceB - priceA;
                    case 'name':
                        return nameA.localeCompare(nameB);
                    default:
                        return 0;
                }
            });

            cards.forEach(card => grid.appendChild(card));
        });
    </script>

@endsection
