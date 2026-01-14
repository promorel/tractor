@if($cart && $cart->items->count() > 0)
    <div class="cart-items-list">
        @foreach($cart->items as $item)
            <div class="cart-item" data-item-id="{{ $item->id }}">
                <div class="item-image">
                    @php
                        // Récupérer l'image de la marque spécifique de cet item
                        $brandImages = $item->brand->brandImages ?? collect();
                        $firstImage = $brandImages->where('product_id', $item->product_id)->first();
                    @endphp
                    @if($firstImage)
                        <img src="{{ asset($firstImage->image_path) }}" alt="{{ $item->product->name }}" 
                             style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">
                    @else
                        <div style="width: 80px; height: 80px; background: #f0f0f0; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                            <i class="fa fa-image text-muted"></i>
                        </div>
                    @endif
                </div>
                
                <div class="item-details flex-grow-1 ms-3">
                    <h6 class="mb-1">{{ $item->product->name }}</h6>
                    <small class="text-muted">
                        {{ $item->brand->name }}
                        @if($item->weight)
                            <span class="badge bg-secondary ms-1">{{ $item->weight }} kg</span>
                        @endif
                    </small>
                    
                    <div class="d-flex align-items-center mt-2">
                        <div class="quantity-controls d-flex align-items-center me-3">
                            <button class="btn btn-sm btn-outline-secondary btn-qty-minus" data-item-id="{{ $item->id }}">
                                <i class="fa fa-minus"></i>
                            </button>
                            <input type="number" class="form-control form-control-sm mx-2 text-center item-quantity" 
                                   value="{{ $item->quantity }}" 
                                   min="1" 
                                   max="100" 
                                   style="width: 60px;"
                                   data-item-id="{{ $item->id }}" 
                                   readonly>
                            <button class="btn btn-sm btn-outline-secondary btn-qty-plus" data-item-id="{{ $item->id }}">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                        
                        <div class="item-price fw-bold">
                            @php
                                $itemPrice = $item->selected_price ?? $item->price;
                                $subtotal = $itemPrice * $item->quantity;
                            @endphp
                            <span class="item-subtotal">{{ number_format($subtotal, 2) }}</span> €
                        </div>
                    </div>
                </div>
                
                <button class="btn btn-sm btn-link text-danger btn-remove-item ms-2" data-item-id="{{ $item->id }}" title="Supprimer">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
            
            @if(!$loop->last)
                <hr class="my-3">
            @endif
        @endforeach
    </div>
    
    <div class="cart-summary mt-4 pt-3 border-top">
        <div class="d-flex justify-content-between mb-2">
            <span>Sous-total:</span>
            <span class="fw-bold cart-total">{{ number_format($cart->getTotal(), 2) }} €</span>
        </div>
        <div class="d-flex justify-content-between mb-3">
            <span>Nombre d'articles:</span>
            <span class="fw-bold cart-items-count">{{ $cart->getTotalItems() }}</span>
        </div>
        
        <div class="cart-actions">
            <a href="{{ route('cart.index') }}" class="btn btn-primary btn-block w-100 mb-2">Voir le panier</a>
            <a href="{{ route('checkout.index') }}" class="btn btn-success btn-block w-100">
                <i class="fa fa-credit-card me-2"></i> Passer à la caisse
            </a>
        </div>
    </div>
@else
    <div class="empty-cart text-center py-5">
        <i class="fa fa-shopping-cart fa-3x text-muted mb-3"></i>
        <p class="text-muted">Votre panier est vide</p>
        <a href="{{ route('products') }}" class="btn btn-primary mt-2">Continuer vos achats</a>
    </div>
@endif
