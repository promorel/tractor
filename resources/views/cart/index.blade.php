@extends('layout.template')

@section('contenu')

    <!-- Breadcrumb Section Start -->
    <div class="section">
        <div class="breadcrumb-area bg-light">
            <div class="container-fluid">
                <div class="breadcrumb-content text-center">
                    <h1 class="title">Shopping Cart</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Cart Section Start -->
    <div class="section section-margin">
        <div class="container">
            
            @if($cart && $cart->items->count() > 0)
                <div class="row">
                    <div class="col-12">
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="pro-thumbnail">Image</th>
                                        <th class="pro-title">Product</th>
                                        <th class="pro-price">Price</th>
                                        <th class="pro-quantity">Quantity</th>
                                        <th class="pro-subtotal">Subtotal</th>
                                        <th class="pro-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cart->items as $item)
                                        <tr data-item-id="{{ $item->id }}">
                                            <td class="pro-thumbnail">
                                                @php
                                                    $firstImage = $item->brand->brandImages->first();
                                                @endphp
                                                @if($firstImage)
                                                    <a href="{{ route('product-details', encrypt($item->product->id)) }}">
                                                        <img src="{{ asset($firstImage->image_path) }}" 
                                                             alt="{{ $item->product->name }}" 
                                                             style="width: 100px; height: 100px; object-fit: cover;">
                                                    </a>
                                                @else
                                                    <div style="width: 100px; height: 100px; background: #f0f0f0; display: flex; align-items: center; justify-content: center;">
                                                        <i class="fa fa-image text-muted"></i>
                                                    </div>
                                                @endif
                                            </td>
                                            <td class="pro-title">
                                                <a href="{{ route('product-details', encrypt($item->product->id)) }}">
                                                    {{ $item->product->name }}
                                                </a>
                                                <br>
                                                <small class="text-muted">Brand: {{ $item->brand->brand_name }}</small>
                                            </td>
                                            <td class="pro-price">
                                                <span>{{ number_format($item->price, 2) }} Ar</span>
                                            </td>
                                            <td class="pro-quantity">
                                                <div class="quantity">
                                                    <div class="cart-plus-minus">
                                                        <input class="cart-plus-minus-box quantity-input" 
                                                               value="{{ $item->quantity }}" 
                                                               type="text" 
                                                               readonly
                                                               data-item-id="{{ $item->id }}">
                                                        <div class="dec qtybutton" onclick="updateCartQuantity({{ $item->id }}, {{ $item->quantity - 1 }})">
                                                            <i class="fa fa-minus"></i>
                                                        </div>
                                                        <div class="inc qtybutton" onclick="updateCartQuantity({{ $item->id }}, {{ $item->quantity + 1 }})">
                                                            <i class="fa fa-plus"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="pro-subtotal">
                                                <span class="item-subtotal-{{ $item->id }}">{{ number_format($item->getSubtotal(), 2) }} Ar</span>
                                            </td>
                                            <td class="pro-remove">
                                                <button onclick="removeCartItem({{ $item->id }})" class="btn btn-link text-danger" title="Remove">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-5 ms-auto">
                        <div class="cart-calculator-wrapper">
                            <h3 class="mb-4">Cart Summary</h3>
                            
                            <div class="cart-calculate-items">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>Subtotal</td>
                                                <td class="text-end">
                                                    <span class="cart-total-amount">{{ number_format($cart->getTotal(), 2) }} Ar</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Shipping</td>
                                                <td class="text-end">Free</td>
                                            </tr>
                                            <tr class="total">
                                                <td><strong>Total</strong></td>
                                                <td class="text-end">
                                                    <strong class="cart-total-amount">{{ number_format($cart->getTotal(), 2) }} Ar</strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="cart-calculate-buttons mt-4">
                                <a href="{{ route('products') }}" class="btn btn-outline-dark btn-hover-primary mb-3 w-100">
                                    <i class="fa fa-arrow-left me-2"></i> Continue Shopping
                                </a>
                                <a href="{{ route('checkout.index') }}" class="btn btn-dark btn-hover-primary w-100">
                                    <i class="fa fa-check me-2"></i> Proceed to Checkout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            @else
                <!-- Empty Cart -->
                <div class="row">
                    <div class="col-12">
                        <div class="empty-cart text-center py-5">
                            <i class="fa fa-shopping-cart fa-5x text-muted mb-4"></i>
                            <h3 class="mb-3">Your cart is empty</h3>
                            <p class="text-muted mb-4">You haven't added any products to your cart yet.</p>
                            <a href="{{ route('products') }}" class="btn btn-dark btn-hover-primary">
                                <i class="fa fa-arrow-left me-2"></i> Discover our products
                            </a>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
    <!-- Cart Section End -->

    <script>
        // Fonction pour mettre à jour la quantité
        function updateCartQuantity(itemId, quantity) {
            if (quantity < 1) {
                removeCartItem(itemId);
                return;
            }

            const formData = new FormData();
            formData.append('item_id', itemId);
            formData.append('quantity', quantity);
            
            fetch('/cart/update-quantity', {
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
                    // Mettre à jour l'input
                    document.querySelector(`.quantity-input[data-item-id="${itemId}"]`).value = quantity;
                    
                    // Mettre à jour le sous-total de l'item
                    document.querySelector(`.item-subtotal-${itemId}`).textContent = data.item.subtotal + ' Ar';
                    
                    // Mettre à jour les totaux
                    document.querySelectorAll('.cart-total-amount').forEach(el => {
                        el.textContent = data.cart.total + ' Ar';
                    });
                    
                    // Mettre à jour le compteur du header
                    if (typeof updateCartCounter === 'function') {
                        updateCartCounter(data.cart.total_items);
                    }
                    
                    showNotification(data.message, 'success');
                } else {
                    showNotification(data.message, 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('An error occurred', 'error');
            });
        }

        // Fonction pour supprimer un item
        function removeCartItem(itemId) {
            if (!confirm('Do you really want to remove this item from the cart?')) {
                return;
            }

            fetch(`/cart/remove/${itemId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Retirer la ligne du tableau
                    const row = document.querySelector(`tr[data-item-id="${itemId}"]`);
                    if (row) {
                        row.remove();
                    }
                    
                    // Si le panier est vide, recharger la page
                    if (data.cart.total_items === 0) {
                        location.reload();
                    } else {
                        // Mettre à jour les totaux
                        document.querySelectorAll('.cart-total-amount').forEach(el => {
                            el.textContent = data.cart.total + ' Ar';
                        });
                        
                        // Mettre à jour le compteur du header
                        if (typeof updateCartCounter === 'function') {
                            updateCartCounter(data.cart.total_items);
                        }
                    }
                    
                    showNotification(data.message, 'success');
                } else {
                    showNotification(data.message, 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('An error occurred', 'error');
            });
        }
    </script>

@endsection
