@extends('layout.template')

@section('contenu')
<!-- Breadcrumb Section Start -->
<div class="section">
    <div class="breadcrumb-area bg-light">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h1 class="title">Checkout</h1>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('cart.index') }}">Cart</a></li>
                    <li class="active">Checkout</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Start -->
<div class="section section-margin">
    <div class="container">
        
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form action="{{ route('checkout.store') }}" method="POST" id="checkout-form">
            @csrf
            
            <div class="row mb-n4">
                
                <!-- Order Summary Column -->
                <div class="col-lg-6 col-12 mb-4">
                    <div class="your-order-area border p-3">
                        <h5 class="mb-3">Order Summary</h5>
                        
                        <!-- Customer Information -->
                        <div class="mb-3 border-bottom pb-3">
                            <h6 class="mb-3">Your Information</h6>
                            <div class="mb-2">
                                <label for="customer_name" class="form-label small">Full Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm" id="customer_name" name="customer_name" required>
                            </div>
                            <div class="mb-2">
                                <label for="customer_email" class="form-label small">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control form-control-sm" id="customer_email" name="customer_email" required>
                                <small class="text-muted">We will send the order confirmation to this address</small>
                            </div>
                            <div class="mb-2">
                                <label for="customer_phone" class="form-label small">Phone</label>
                                <input type="tel" class="form-control form-control-sm" id="customer_phone" name="customer_phone">
                            </div>
                        </div>
                        
                        <!-- Cart Items -->
                        <div class="your-order-table table-responsive mb-3">
                            <table class="table table-sm" style="table-layout: fixed;">
                                <colgroup>
                                    <col style="width: 65%;">
                                    <col style="width: 35%;">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th class="text-start px-2" style="font-size: 0.85rem;">Product</th>
                                        <th class="text-end px-2" style="font-size: 0.85rem;">Total</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 0.85rem;">
                                    @foreach($cart->items as $item)
                                        <tr>
                                            <td class="text-start py-2 px-2">
                                                @if($item->sparepart_id)
                                                    @php
                                                        $sparepartData = \App\Http\Controllers\SparepartsController::getSparepartById($item->sparepart_id);
                                                    @endphp
                                                    <strong>{{ $sparepartData['name'] ?? 'Unknown Product' }}</strong> <span class="text-muted">× {{ $item->quantity }}</span><br>
                                                    <small class="text-muted badge bg-info">{{ ucfirst($sparepartData['category'] ?? 'sparepart') }}</small>
                                                @else
                                                    <strong>{{ $item->product->name }}</strong> <span class="text-muted">× {{ $item->quantity }}</span><br>
                                                    <small class="text-muted">{{ $item->brand->name ?? 'N/A' }}</small>
                                                @endif
                                            </td>
                                            <td class="text-end py-2 px-2">€ {{ number_format($item->price * $item->quantity, 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot style="font-size: 0.9rem;">
                                    <tr>
                                        <th class="text-start py-2 px-2">Subtotal</th>
                                        <td class="text-end py-2 px-2">€ {{ number_format($subtotal, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-start py-2 px-2">Shipping</th>
                                        <td class="text-end py-2 px-2">
                                            @if($deliveryFee > 0)
                                                € {{ number_format($deliveryFee, 2) }}
                                            @else
                                                <span class="text-success">Free</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr class="border-top">
                                        <th class="text-start py-2 px-2"><strong>Total</strong></th>
                                        <td class="text-end py-2 px-2"><strong class="text-primary">€ {{ number_format($total, 2) }}</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <!-- Order Notes -->
                        <div class="mb-3">
                            <label for="notes" class="form-label small">Order Notes (optional)</label>
                            <textarea class="form-control form-control-sm" id="notes" name="notes" rows="2" 
                                      placeholder="Notes about your order, e.g.: special delivery instructions..."></textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-dark btn-hover-primary w-100" id="submit-order-btn">
                            <i class="fa fa-check-circle me-2"></i> Place Order
                        </button>
                    </div>
                </div>

                <!-- Payment Info Column -->
                <div class="col-lg-6 col-12 mb-4">
                    <div class="border p-3 bg-light">
                        <h4 class="mb-3">
                            <i class="fa fa-info-circle text-primary me-2"></i> 
                            Payment Information
                        </h4>
                        
                        <div class="alert alert-warning py-2 mb-3">
                            <small><i class="fa fa-exclamation-triangle me-2"></i>
                            <strong>Important:</strong> Payment is made outside the platform.</small>
                        </div>

                        <h6 class="mb-2">Accepted Methods:</h6>
                        <ul class="list-unstyled mb-3" style="font-size: 0.9rem;">
                            @foreach(config('payment.accepted_methods') as $method)
                                <li class="mb-1">
                                    <i class="fa fa-check-circle text-success me-2"></i> {{ $method }}
                                </li>
                            @endforeach
                        </ul>

                        <h6 class="mb-2">After Validation:</h6>
                        <ol class="mb-3" style="font-size: 0.85rem; padding-left: 1.2rem;">
                            <li class="mb-1">Detailed payment instructions</li>
                            <li class="mb-1">Make the payment</li>
                            <li class="mb-1">Send proof of payment</li>
                            <li class="mb-1">Validation within 24-48h</li>
                        </ol>

                        <div class="alert alert-info py-2 mb-0">
                            <small>
                                <i class="fa fa-phone me-2"></i>
                                <strong>Need Help?</strong><br>
                                Email: {{ config('payment.support_email') }}<br>
                                Tel: {{ config('payment.support_phone') }}
                            </small>
                        </div>
                    </div>
                </div>

            </div>
        </form>

    </div>
</div>
<!-- Checkout Section End -->

<script>
    // Confirmation avant soumission
    document.getElementById('checkout-form').addEventListener('submit', function(e) {
        const btn = document.getElementById('submit-order-btn');
        btn.disabled = true;
        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Creating order...';
    });
</script>

@endsection
