@extends('layout.template')

@section('contenu')

    <!-- Breadcrumb Section Start -->
    <div class="section">

        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-light">
            <div class="container-fluid">
                <div class="breadcrumb-content text-center">
                    <h1 class="title">{{ $product->name }}</h1>
                    <ul>
                        <li>
                            <a href="{{ route('home') }}">Home </a>
                        </li>
                        <li>
                            <a href="{{ route('products') }}">Products</a>
                        </li>
                        <li class="active">{{ $product->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End -->

    </div>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Start -->
    <div class="section section-margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-0 col-md-8 offset-md-2 col-custom">

                    <!-- Product Details Image Start -->
                    <div class="product-details-img">

                        <!-- Single Product Image Start -->
                        <div class="single-product-img swiper-container gallery-top swiper-container-initialized swiper-container-horizontal">
                            <div class="swiper-wrapper popup-gallery" id="swiper-wrapper-gallery" aria-live="polite">
                                @php
                                    $firstBrand = $product->brands->first();
                                    // Filtrer les images par product_id
                                    $defaultImages = $firstBrand ? $firstBrand->brandImages->where('product_id', $product->id) : collect();
                                @endphp
                                
                                @forelse($defaultImages as $index => $image)
                                <a class="swiper-slide @if($index === 0) swiper-slide-active @endif" 
                                   href="{{ asset($image->image_path) }}" 
                                   data-swiper-slide-index="{{ $index }}" 
                                   role="group" 
                                   aria-label="{{ $index + 1 }} / {{ $defaultImages->count() }}">
                                    <img src="{{ asset($image->image_path) }}" alt="{{ $product->name }}">
                                </a>
                                @empty
                                <a class="swiper-slide" href="{{ asset($product->main_image) }}">
                                    <img src="{{ asset($product->main_image) }}" alt="{{ $product->name }}">
                                </a>
                                @endforelse
                            </div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                        <!-- Single Product Image End -->

                        <!-- Single Product Thumb Start -->
                        <div class="single-product-thumb swiper-container gallery-thumbs swiper-container-initialized swiper-container-horizontal swiper-container-free-mode swiper-container-thumbs">
                            <style>
                                /* Galerie principale - hauteur fixe avec centrage */
                                .gallery-top {
                                    height: 500px;
                                }
                                .gallery-top .swiper-wrapper {
                                    height: 100%;
                                }
                                .gallery-top .swiper-slide {
                                    height: 100%;
                                    display: flex !important;
                                    align-items: center !important;
                                    justify-content: center !important;
                                    overflow: hidden;
                                    background: #f8f9fa;
                                }
                                .gallery-top .swiper-slide img {
                                    max-width: 100%;
                                    max-height: 100%;
                                    width: auto;
                                    height: auto;
                                    object-fit: contain;
                                    object-position: center;
                                }
                                
                                /* Miniatures */
                                .gallery-thumbs .swiper-slide {
                                    height: 100px;
                                    width: 100px;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    overflow: hidden;
                                    background: #f8f9fa;
                                }
                                .gallery-thumbs .swiper-slide img {
                                    max-width: 100%;
                                    max-height: 100%;
                                    width: auto;
                                    height: auto;
                                    object-fit: contain;
                                    object-position: center;
                                }
                            </style>
                            <div class="swiper-wrapper" id="swiper-wrapper-thumbs" aria-live="polite">
                                @forelse($defaultImages as $index => $image)
                                <div class="swiper-slide @if($index === 0) swiper-slide-active swiper-slide-thumb-active @endif" 
                                     role="group" 
                                     aria-label="{{ $index + 1 }} / {{ $defaultImages->count() }}">
                                    <img src="{{ asset($image->image_path) }}" alt="{{ $product->name }}">
                                </div>
                                @empty
                                <div class="swiper-slide swiper-slide-active">
                                    <img src="{{ asset($product->main_image) }}" alt="{{ $product->name }}">
                                </div>
                                @endforelse
                            </div>

                            <!-- Next Previous Button Start -->
                            <div class="swiper-button-horizental-next swiper-button-next" tabindex="0" role="button" aria-label="Next slide"><i class="pe-7s-angle-right"></i></div>
                            <div class="swiper-button-horizental-prev swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide"><i class="pe-7s-angle-left"></i></div>
                            <!-- Next Previous Button End -->

                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                        <!-- Single Product Thumb End -->

                    </div>
                    <!-- Product Details Image End -->

                </div>
                <div class="col-lg-7 col-custom">

                    <!-- Product Summery Start -->
                    <div class="product-summery position-relative">

                        <!-- Product Title Start -->
                        <div class="product-head mb-3">
                            <h2 class="product-title">{{ $product->name }}</h2>
                        </div>
                        <!-- Product Title End -->

                        <!-- Product Head Start -->
                        <div class="product-head mb-3">
                            <h2 class="product-title">Brand : <strong id="selectedBrand">{{ $product->brands->first()?->brand_name ?? 'N/A' }}</strong></h2>
                        </div>
                        <!-- Product Head End -->

                        <!-- Product Brand Variation Start -->
                        <div class="product-brand-variation mb-3">
                            
                            <style>
                                .brand-options {
                                    display: flex;
                                    gap: 10px;
                                    flex-wrap: wrap;
                                }
                                .brand-options .form-check {
                                    margin: 0;
                                }
                                .brand-options .form-check-input {
                                    display: none;
                                }
                                .brand-options .form-check-label {
                                    cursor: pointer;
                                    display: inline-block;
                                    margin: 0;
                                }
                                .brand-options .form-check-label img {
                                    width: 70px;
                                    height: 70px;
                                    object-fit: contain;
                                    border: 2px solid transparent;
                                    padding: 5px;
                                    border-radius: 4px;
                                    transition: all 0.3s ease;
                                }
                                .brand-options .form-check-label:hover img {
                                    border-color: #d4af37;
                                    box-shadow: 0 0 8px rgba(212, 175, 55, 0.3);
                                    transform: scale(1.05);
                                }
                                .brand-options .form-check-input:checked + .form-check-label img {
                                    border-color: #d4af37;
                                    box-shadow: 0 0 12px rgba(212, 175, 55, 0.5);
                                    transform: scale(1.1);
                                }
                            </style>
                            <div class="brand-options" id="brandContainer">
                                @forelse($product->brands as $brand)
                                <div class="form-check form-check-inline">
                                    <input 
                                        class="form-check-input brand-selector" 
                                        type="radio" 
                                        name="brand" 
                                        id="brand_{{ Str::slug($brand->brand_name) }}" 
                                        value="{{ Str::slug($brand->brand_name) }}"
                                        data-brand-id="{{ $brand->id }}"
                                        data-brand-name="{{ $brand->brand_name }}"
                                        data-price="{{ $brand->final_price }}"
                                        data-stock="{{ $brand->stock }}"
                                        data-images='{{ json_encode($brand->brandImages->pluck("image_path")) }}'
                                        @if(isset($selectedBrandId) && $selectedBrandId == $brand->id) 
                                            checked 
                                        @elseif(!isset($selectedBrandId) && $loop->first) 
                                            checked 
                                        @endif>
                                    <label class="form-check-label" for="brand_{{ Str::slug($brand->brand_name) }}">
                                        <img src="{{ asset($brand->logo) }}" alt="{{ $brand->brand_name }}" title="{{ $brand->brand_name }}">
                                    </label>
                                </div>
                                @empty
                                <p class="text-muted">Aucune marque disponible</p>
                                @endforelse
                            </div>
                        </div>
                        <!-- Product Brand Variation End -->
                        
                        <script>
                            // Gestionnaire de changement de marque avec rechargement de page
                            document.querySelectorAll('.brand-selector').forEach(radio => {
                                radio.addEventListener('change', function() {
                                    const brandId = this.getAttribute('data-brand-id');
                                    const productId = {{ $product->id }};
                                    
                                    // Recharger la page avec la marque sélectionnée
                                    window.location.href = '{{ route("product-details", $product) }}?brand=' + brandId;
                                });
                            });
                        </script>
                        
                        <!-- Weight Selector Start -->
                        @if($weightPrices && $weightPrices->count() > 0)
                        <div class="weight-selector mb-4">
                            <h5 class="mb-3" style="font-weight: 600; color: #333;">Choisissez le poids :</h5>
                            <select class="form-select" id="weight-selector" name="weight" style="padding: 12px; border: 2px solid #e0e0e0; border-radius: 6px; font-size: 16px; cursor: pointer;">
                                <option value="" disabled selected>Sélectionnez un poids</option>
                                @foreach($weightPrices as $weightPrice)
                                    <option value="{{ $weightPrice->weight }}" data-price="{{ $weightPrice->price }}">
                                        {{ $weightPrice->weight }} kg - {{ number_format($weightPrice->price, 2, ',', ' ') }} €
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                        <!-- Weight Selector End -->

                        <!-- Price Box Start -->
                        <div class="price-box mb-2">
                            <span class="regular-price" id="productPrice" style="font-size: 28px; font-weight: bold; color: #d4af37;">
                                @if($weightPrices && $weightPrices->count() > 0)
                                    <span style="font-size: 18px; color: #666;">Sélectionnez un poids</span>
                                @else
                                    @php
                                        $firstBrandPrice = $product->brands->first();
                                        $displayPrice = $firstBrandPrice ? ($firstBrandPrice->pivot->price ?? $firstBrandPrice->price ?? $product->average_price) : $product->average_price;
                                    @endphp
                                    {{ number_format($displayPrice, 2, ',', ' ') }} €
                                @endif
                            </span>
                            @if(!$weightPrices || $weightPrices->count() == 0)
                            <span class="old-price"><del>{{ number_format($product->average_price, 2, ',', ' ') }} €</del></span>
                            @endif
                        </div>
                        <!-- Price Box End -->

                        <!-- Stock Start -->
                        <div class="stock-info mb-3">
                            <span id="stockInfo">In stock: <strong id="brandStock">{{ $product->brands->first()?->stock ?? 0 }}</strong></span>
                        </div>
                        <!-- Stock End -->

                        <!-- Quantity Start -->
                        <div class="quantity mb-5">
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box" id="product-quantity" value="1" type="text" min="1">
                                <div class="dec qtybutton"><i class="fa fa-minus"></i></div>
                                <div class="inc qtybutton"><i class="fa fa-plus"></i></div>
                            </div>
                        </div>
                        <!-- Quantity End -->

                        <!-- Cart & Wishlist Button Start -->
                        <div class="cart-wishlist-btn mb-4">
                            <div class="add-to_cart">
                                <button class="btn btn-outline-dark btn-hover-primary" id="add-to-cart-btn" onclick="handleAddToCart()">
                                    <i class="pe-7s-shopbag"></i> Add to cart
                                </button>
                            </div>
                        </div>
                        <!-- Cart & Wishlist Button End -->
                        
                        <script>
                            // Script pour actualiser le prix selon le poids sélectionné
                            document.addEventListener('DOMContentLoaded', function() {
                                const weightSelector = document.getElementById('weight-selector');
                                const priceDisplay = document.getElementById('productPrice');
                                
                                if (weightSelector && priceDisplay) {
                                    weightSelector.addEventListener('change', function() {
                                        const selectedOption = this.options[this.selectedIndex];
                                        const price = selectedOption.getAttribute('data-price');
                                        const weight = selectedOption.value;
                                        
                                        if (price) {
                                            // Formater le prix avec séparateur de milliers
                                            const formattedPrice = parseFloat(price).toLocaleString('fr-FR', {
                                                minimumFractionDigits: 2,
                                                maximumFractionDigits: 2
                                            });
                                            
                                            priceDisplay.innerHTML = formattedPrice + ' €';
                                            priceDisplay.style.color = '#d4af37';
                                            priceDisplay.style.fontWeight = 'bold';
                                            
                                            // Stocker le prix dans le dataset pour l'ajout au panier
                                            weightSelector.dataset.selectedPrice = price;
                                        }
                                    });
                                }
                            });
                        </script>
                        
                        <script>
                            // Fonction pour gérer l'ajout au panier
                            function handleAddToCart() {
                                // Vérifier si un poids doit être sélectionné
                                const weightSelector = document.getElementById('weight-selector');
                                if (weightSelector && !weightSelector.value) {
                                    alert('⚠️ Veuillez sélectionner un poids avant d\'ajouter au panier');
                                    weightSelector.focus();
                                    return;
                                }
                                
                                // Récupérer la marque sélectionnée
                                const selectedBrand = document.querySelector('.brand-selector:checked');
                                
                                if (!selectedBrand) {
                                    showNotification('Veuillez sélectionner une marque', 'error');
                                    return;
                                }
                                
                                const brandId = selectedBrand.getAttribute('data-brand-id');
                                const productId = {{ $product->id }};
                                const quantity = parseInt(document.getElementById('product-quantity').value) || 1;
                                const stock = parseInt(selectedBrand.getAttribute('data-stock'));
                                
                                // Vérifier le stock
                                if (quantity > stock) {
                                    showNotification('Stock insuffisant', 'error');
                                    return;
                                }
                                
                                // Récupérer le poids et prix sélectionnés
                                const selectedWeight = weightSelector ? weightSelector.value : null;
                                const selectedPrice = weightSelector ? weightSelector.dataset.selectedPrice : null;
                                
                                // Désactiver le bouton temporairement
                                const btn = document.getElementById('add-to-cart-btn');
                                btn.disabled = true;
                                btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Ajout en cours...';
                                
                                // Ajouter au panier avec le poids
                                addToCart(productId, brandId, quantity, selectedWeight, selectedPrice);
                                
                                // Réactiver le bouton après 2 secondes
                                setTimeout(() => {
                                    btn.disabled = false;
                                    btn.innerHTML = '<i class="pe-7s-shopbag"></i> Ajouter au panier';
                                }, 2000);
                            }
                        </script>

                        <!-- Product Delivery Policy Start -->
                        <ul class="product-delivery-policy border-top pt-4 mt-4 border-bottom pb-4">
                            <li>
                                <i class="fa fa-gift"></i> 
                                <span>10% discount on the gross prices + free calender when ordering via our webshop</span>
                            </li>
                        </ul>
                        <!-- Product Delivery Policy End -->

                    </div>
                    <!-- Product Summery End -->

                </div>
            </div>
        </div>
    </div>
    <!-- Product Details Section End -->

    <!-- Product Tabs Section Start -->
    <div class="section section-margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="woocommerce-tabs wc-tabs-wrapper">
                        <ul class="tabs wc-tabs nav nav-tabs" role="tablist">
                            <li class="description_tab nav-item" id="tab-title-description" role="presentation">
                                <a class="nav-link active" href="#tab-description" data-bs-toggle="tab" role="tab" aria-controls="tab-description" aria-selected="true">
                                    Description
                                </a>
                            </li>
                            <li class="order-info_tab nav-item" id="tab-title-order-info" role="presentation">
                                <a class="nav-link" href="#tab-order-info" data-bs-toggle="tab" role="tab" aria-controls="tab-order-info" aria-selected="false">
                                    Order info
                                </a>
                            </li>
                            <li class="faq_tab nav-item" id="tab-title-faq" role="presentation">
                                <a class="nav-link" href="#tab-faq" data-bs-toggle="tab" role="tab" aria-controls="tab-faq" aria-selected="false">
                                    FAQ
                                </a>
                            </li>
                        </ul>
                        
                        <div class="tab-content">
                            <!-- Description Tab -->
                            <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab tab-pane fade show active" id="tab-description" role="tabpanel" aria-labelledby="tab-title-description">
                                <h2>Description</h2>

                                <h2>Linked to weight block</h2>
                                <p>The Tractor bumper Connect is a bumper that can be attached to a B900 weight block or an original Fendt 870kg weight block. The Connect is available separately for existing weight blocks or can be ordered as a set (bumper + weight block). For a lot of landwork, the bumper can be disconnected and attached to a lot of road transport (simple with two bolts) for better visibility.</p>
                                <p><iframe title="Tractorbumper Connect" width="500" height="281" src="https://www.youtube.com/embed/WwLOsQ_DtL4?feature=oembed" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen=""></iframe></p>
                                <p>Optional assembly set to link the Connect directly to the front lift also available. This allows the following options: bumper with weight, weight without bumper and bumper without weight.</p>
                                <p><img fetchpriority="high" decoding="async" class="alignnone size-medium wp-image-19160" src="https://tractorbumper.com/wp-content/uploads/2022/02/connect_bumper_options-600x145.jpg" alt="" width="600" height="145" srcset="https://tractorbumper.com/wp-content/uploads/2022/02/connect_bumper_options-600x145.jpg 600w, https://tractorbumper.com/wp-content/uploads/2022/02/connect_bumper_options-1024x247.jpg 1024w, https://tractorbumper.com/wp-content/uploads/2022/02/connect_bumper_options-768x186.jpg 768w, https://tractorbumper.com/wp-content/uploads/2022/02/connect_bumper_options.jpg 1345w" sizes="(max-width: 600px) 100vw, 600px"></p>
                                
                                <h3>Standard features</h3>
                                <ul>
                                    <li>Rotatable and width-adjustable side panels</li>
                                    <li>Shear bolt protection when driving backwards</li>
                                    <li>LED position lighting according to standard</li>
                                    <li>Full LED + LED direction indicators</li>
                                    <li>Red-white panels according to ECE-104</li>
                                    <li>Guide poles</li>
                                    <li>Powdercoated black, AGCO grey or John-Deere green</li>
                                    <li>Design in tractor colours with own logo</li>
                                </ul>
                                
                                <h3>Optional</h3>
                                <ul>
                                    <li>In a common RAL colour</li>
                                    <li>Adjustable in width from 2.6 to 3 metres</li>
                                    <li>Mounting set for direct construction front linkage</li>
                                </ul>
                                
                                <h3>Dimensions:</h3>
                                <p><img decoding="async" class="alignnone size-medium wp-image-35951" src="https://tractorbumper.com/wp-content/uploads/2022/02/connect_dimensions_TractorBumper-800x550.jpg" alt="" width="800" height="550"></p>
                                <p><strong>10% discount on the gross prices + free calender when ordering via the webshop</strong></p>
                                <p><a href="https://tractorbumper.com/wp-content/uploads/2025/03/EN_gross_TractorBumper_25.pdf" target="_blank" rel="noopener">Click here for our pricelist</a></p>
                            </div>
                            
                            <!-- Order Info Tab -->
                            <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--order-info panel entry-content wc-tab tab-pane fade" id="tab-order-info" role="tabpanel" aria-labelledby="tab-title-order-info">
                                <h2 class="yikes-custom-woo-tab-title yikes-custom-woo-tab-title-order-info">Order info</h2>
                                <p><strong>Receive a 10% discount on the gross prices + free calender when ordering via the webshop</strong><br>
                                The discount has already been calculated in the price</p>
                                
                                <p><strong>How will the bumper be delivered and how to assemble?</strong><br>
                                Will be delivered on a EUR pallet. Only assemble the side panels, see:</p>
                                <p><iframe loading="lazy" title="Unpack and assemble Tractorbumper" width="500" height="281" src="https://www.youtube.com/embed/AtAAlEY3H5A?feature=oembed" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen=""></iframe></p>
                                
                                <p><strong>VAT in EU:</strong><br>
                                For EU: 0% with a valid VAT number. <a href="https://ec.europa.eu/taxation_customs/vies/?locale=en" target="_blank" rel="noopener">You can check the VAT number here.</a><br>
                                You can fill in your VAT number on the check out page. VAT will be 0%</p>
                                
                                <p><strong>UK:</strong><br>
                                To do business directly, you need a valid company <strong>EORI</strong> number, <a href="https://www.tax.service.gov.uk/check-eori-number/">you can check EORI nr.</a>. You can find more information about <a href="https://taxation-customs.ec.europa.eu/customs-4/customs-procedures-import-and-export-0/customs-procedures_en">EORI number here</a>. If you do not have a EORI number, please <a href="https://tractorbumper.com/en/dealers/">find a UK dealer here</a> or contact your local dealer.</p>
                                
                                <p><strong>Stickerdesign with own logo:</strong><br>
                                If you have chosen your own logo, please send the logo by email to: <a href="mailto:contact@tractorrbumper.com">contact@tractorrbumper.com</a>. We will then make an example for the layout and send it via e-mail. After approval, production is started. So no surprises afterwards.</p>
                                
                                <p><strong>Shipment costs</strong><br>
                                Price shipment to Ireland -&gt; <a href="http://www.baileymachinerysales.ie/" target="_blank" rel="noopener">Please contact our dealer Bailey Machiney Sales</a><br>
                                Price shipment to CZ, PL, DE : 145 €</p>
                                
                                <p>Price shipment to UK or other locations: <a href="mailto:contact@tractorrbumper.com" target="_blank" rel="noopener">Please contact us via Email</a></p>
                                
                                <p><strong>Delivery time:</strong><br>
                                3 weeks after ordering.</p>
                                
                                <p><strong>Payment:</strong><br>
                                Only possible via Proforma Invoice</p>
                                
                                <p><strong>Return policy:</strong><br>
                                Only products in the original packaging can be returned. <a href="https://tractorbumper.com/en/return-cancel-order/">Click here for more information.</a></p>
                            </div>
                            
                            <!-- FAQ Tab -->
                            <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--faq panel entry-content wc-tab tab-pane fade" id="tab-faq" role="tabpanel" aria-labelledby="tab-title-faq">
                                <h2 class="yikes-custom-woo-tab-title yikes-custom-woo-tab-title-faq">FAQ</h2>

                                <div class="accordion" id="faqAccordion">
                                    <!-- FAQ 1 -->
                                    <div class="accordion-item mb-3">
                                        <h2 class="accordion-header" id="headingConnectDirect">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseConnectDirect" aria-expanded="true" aria-controls="collapseConnectDirect">
                                                How does it work with the Solo connection kit?
                                            </button>
                                        </h2>
                                        <div id="collapseConnectDirect" class="accordion-collapse collapse show" aria-labelledby="headingConnectDirect" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body">
                                                <p>With solo connection kit you can connect the bumper directly to you frontlinkage without a frontweight between. Red colored is the mounting kit Solo.</p>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <img loading="lazy" decoding="async" class="img-fluid" src="https://tractorbumper.com/wp-content/uploads/2023/07/TractorBumper_direct_linkage-1024x709.jpg" alt="">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <img loading="lazy" decoding="async" class="img-fluid" src="https://tractorbumper.com/wp-content/uploads/2023/08/Connect_direct_linkage.jpg" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- FAQ 2 -->
                                    <div class="accordion-item mb-3">
                                        <h2 class="accordion-header" id="headingConnectFrontweight">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseConnectFrontweight" aria-expanded="false" aria-controls="collapseConnectFrontweight">
                                                Which types of weight blocks does the Connect bumper fit on?
                                            </button>
                                        </h2>
                                        <div id="collapseConnectFrontweight" class="accordion-collapse collapse" aria-labelledby="headingConnectFrontweight" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body">
                                                <p>The Connect bumper fits in an original Fendt 870kg weight block and in B-600kg and B-900kg weights from manufacturer Pateer. See the dimensions here:</p>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <img loading="lazy" decoding="async" class="img-fluid" src="https://tractorbumper.com/wp-content/uploads/2020/10/connect_dimensions-2.png" alt="frontweight-weightblock-tractor-weights-ballast">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <iframe loading="lazy" width="100%" height="315" src="https://www.youtube.com/embed/WwLOsQ_DtL4" frameborder="0" allowfullscreen="" allow="autoplay; encrypted-media; picture-in-picture"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- FAQ 3 -->
                                    <div class="accordion-item mb-3">
                                        <h2 class="accordion-header" id="headingBreedteConnect">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBreedteConnect" aria-expanded="false" aria-controls="collapseBreedteConnect">
                                                What is the minimum and maximium width for the Connect bumper?
                                            </button>
                                        </h2>
                                        <div id="collapseBreedteConnect" class="accordion-collapse collapse" aria-labelledby="headingBreedteConnect" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body">
                                                <p>Width is adjusable from 2.1 til 2.7 meter.</p>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <img decoding="async" class="img-fluid" src="https://tractorbumper.com/wp-content/uploads/2022/12/connect_tractorbumper_dimensions.jpg" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- FAQ 4 -->
                                    <div class="accordion-item mb-3">
                                        <h2 class="accordion-header" id="headingConnectWeight">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseConnectWeight" aria-expanded="false" aria-controls="collapseConnectWeight">
                                                What is the weight of the Connect?
                                            </button>
                                        </h2>
                                        <div id="collapseConnectWeight" class="accordion-collapse collapse" aria-labelledby="headingConnectWeight" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body">
                                                <p>Total weight is 90kg.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- FAQ 5 -->
                                    <div class="accordion-item mb-3">
                                        <h2 class="accordion-header" id="headingConnectBox">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseConnectBox" aria-expanded="false" aria-controls="collapseConnectBox">
                                                Does the connect has a storage box?
                                            </button>
                                        </h2>
                                        <div id="collapseConnectBox" class="accordion-collapse collapse" aria-labelledby="headingConnectBox" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body">
                                                <p>No, the Connect bumper is the only bumper without a storage box.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- FAQ 6 -->
                                    <div class="accordion-item mb-3">
                                        <h2 class="accordion-header" id="headingConnectMounted">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseConnectMounted" aria-expanded="false" aria-controls="collapseConnectMounted">
                                                How is the Connect bumper connected on the frontweight?
                                            </button>
                                        </h2>
                                        <div id="collapseConnectMounted" class="accordion-collapse collapse" aria-labelledby="headingConnectMounted" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body">
                                                <p>At the front connected with 2x M16 bolts. On the side, the Connect bumper is laterally supported with 2x M20 bolts</p>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <iframe loading="lazy" width="100%" height="315" src="https://www.youtube.com/embed/WwLOsQ_DtL4" frameborder="0" allowfullscreen="" allow="autoplay; encrypted-media; picture-in-picture"></iframe>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <img loading="lazy" decoding="async" class="img-fluid" src="https://tractorbumper.com/wp-content/uploads/2023/08/Connect_Agribumper-1024x685.jpg" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Tabs Section End -->

@endsection