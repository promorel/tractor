@extends('layout.template')

@section('contenu')
<!-- Breadcrumb Section Start -->
<div class="section">
    <div class="breadcrumb-area bg-light">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h1 class="title">Payment Instructions</h1>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="active">Payment</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Payment Instructions Section Start -->
<div class="section section-margin">
    <div class="container">
        
        <!-- Success Alert -->
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            <i class="fa fa-check-circle me-2"></i>
            <strong>Order created successfully!</strong><br>
            Reference: <strong>{{ $order->reference }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>

        <div class="row">
            
            <!-- Order Summary -->
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">
                            <i class="fa fa-shopping-cart me-2"></i> 
                            Order Summary
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <strong>Reference:</strong> {{ $order->reference }}
                        </div>
                        <div class="mb-3">
                            <strong>Date:</strong> {{ $order->created_at->format('d/m/Y \a\t H:i') }}
                        </div>
                        <div class="mb-3">
                            <strong>Customer:</strong><br>
                            {{ $order->customer_name }}<br>
                            <small class="text-muted">{{ $order->customer_email }}</small>
                        </div>
                        <div class="mb-3">
                            <strong>Status:</strong> {!! $order->getStatusBadge() !!}
                        </div>

                        <hr>

                        <h5 class="mb-3">Ordered Items:</h5>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <tbody>
                                    @foreach($order->items as $item)
                                        <tr>
                                            <td>
                                                @if($item->sparepart_id)
                                                    @php
                                                        $sparepartData = \App\Http\Controllers\SparepartsController::getSparepartById($item->sparepart_id);
                                                    @endphp
                                                    <strong>{{ $sparepartData['name'] ?? 'Unknown Product' }}</strong><br>
                                                    <small class="text-muted"><span class="badge bg-info">{{ ucfirst($sparepartData['category'] ?? 'sparepart') }}</span></small>
                                                @else
                                                    <strong>{{ $item->product->name }}</strong><br>
                                                    <small class="text-muted">{{ $item->brand->name ?? 'N/A' }}</small>
                                                @endif
                                            </td>
                                            <td class="text-center">× {{ $item->quantity }}</td>
                                            <td class="text-end">€ {{ number_format($item->getSubtotal(), 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="border-top">
                                        <th colspan="2">Total</th>
                                        <th class="text-end">€ {{ number_format($order->total_amount, 2) }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Instructions -->
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-warning text-dark">
                        <h4 class="mb-0">
                            <i class="fa fa-credit-card me-2"></i> 
                            Payment Instructions
                        </h4>
                    </div>
                    <div class="card-body">
                        
                        <div class="alert alert-danger mb-4">
                            <i class="fa fa-exclamation-triangle me-2"></i>
                            <strong>IMPORTANT:</strong> Use reference <strong>{{ $order->reference }}</strong> as your payment description
                        </div>

                        <h5 class="mb-3">Bank Details:</h5>
                        <div class="bg-light p-3 rounded mb-4">
                            <div class="mb-2">
                                <strong>Bank:</strong> {{ config('payment.bank_name') }}
                            </div>
                            <div class="mb-2">
                                <strong>Account Holder:</strong> {{ config('payment.account_holder') }}
                            </div>
                            <div class="mb-2">
                                <strong>IBAN:</strong> <code>{{ config('payment.iban') }}</code>
                            </div>
                            <div class="mb-2">
                                <strong>BIC:</strong> <code>{{ config('payment.bic') }}</code>
                            </div>
                            <div class="mb-0">
                                <strong>Amount:</strong> <span class="text-danger fw-bold">€ {{ number_format($order->total_amount, 2) }}</span>
                            </div>
                        </div>

                        <h5 class="mb-3">Steps to Follow:</h5>
                        <ol>
                            @foreach(config('payment.instructions') as $instruction)
                                <li class="mb-2">{{ $instruction }}</li>
                            @endforeach
                        </ol>

                        <!-- Payment Proof Upload -->
                        <div class="border-top pt-4 mt-4">
                            <h5 class="mb-3">
                                <i class="fa fa-upload me-2"></i> 
                                Send Proof of Payment
                            </h5>
                            
                            @if($order->payment_status === 'pending')
                                <form id="payment-proof-form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="payment_proof" class="form-label">
                                            Choose a file (JPG, PNG, PDF - Max 5MB)
                                        </label>
                                        <input type="file" class="form-control" id="payment_proof" 
                                               name="payment_proof" accept="image/*,.pdf" required>
                                    </div>
                                    <button type="submit" class="btn btn-success w-100" id="upload-btn">
                                        <i class="fa fa-check me-2"></i> 
                                        I have made the payment
                                    </button>
                                </form>
                                
                                <div id="upload-message" class="mt-3"></div>
                            @elseif($order->payment_status === 'waiting_validation')
                                <div class="alert alert-info mb-0">
                                    <i class="fa fa-clock me-2"></i>
                                    Your payment is being verified. You will be notified once validated.
                                </div>
                            @elseif($order->payment_status === 'paid')
                                <div class="alert alert-success mb-0">
                                    <i class="fa fa-check-circle me-2"></i>
                                    Payment validated! Thank you for your order.
                                </div>
                            @else
                                <div class="alert alert-danger mb-0">
                                    <i class="fa fa-times-circle me-2"></i>
                                    Payment declined. Please contact our support.
                                </div>
                            @endif
                        </div>

                        <!-- Contact Support -->
                        <div class="border-top pt-4 mt-4">
                            <h5 class="mb-3">Need Help?</h5>
                            <p class="mb-2">
                                <i class="fa fa-envelope me-2"></i> 
                                <a href="mailto:{{ config('payment.support_email') }}">{{ config('payment.support_email') }}</a>
                            </p>
                            <p class="mb-0">
                                <i class="fa fa-whatsapp me-2"></i> 
                                <a href="https://wa.me/{{ config('payment.support_phone') }}" target="_blank">WhatsApp: +{{ config('payment.support_phone') }}</a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <!-- Action Buttons -->
        <div class="text-center mt-4">
            <a href="{{ route('home') }}" class="btn btn-outline-dark btn-hover-primary">
                <i class="fa fa-arrow-left me-2"></i> Back to Home
            </a>
        </div>

    </div>
</div>
<!-- Payment Instructions Section End -->

<script>
    // Upload Payment Proof via AJAX
    document.getElementById('payment-proof-form')?.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const btn = document.getElementById('upload-btn');
        const messageDiv = document.getElementById('upload-message');
        const formData = new FormData(this);
        
        // Disable button
        btn.disabled = true;
        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Sending...';
        
        try {
            const response = await fetch('{{ route("checkout.confirmPayment", encrypt($order->id)) }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: formData
            });
            
            const data = await response.json();
            
            if (data.success) {
                messageDiv.innerHTML = `
                    <div class="alert alert-success">
                        <i class="fa fa-check-circle me-2"></i> ${data.message}
                        <br><small>Refreshing page...</small>
                    </div>
                `;
                // Hide form and show success message
                document.getElementById('payment-proof-form').style.display = 'none';
                
                // Reload page after 2 seconds
                setTimeout(() => window.location.reload(), 2000);
            } else {
                messageDiv.innerHTML = `
                    <div class="alert alert-danger">
                        <i class="fa fa-exclamation-circle me-2"></i> ${data.message}
                    </div>
                `;
                btn.disabled = false;
                btn.innerHTML = '<i class="fa fa-check me-2"></i> I have made the payment';
            }
        } catch (error) {
            messageDiv.innerHTML = `
                <div class="alert alert-danger">
                    <i class="fa fa-exclamation-circle me-2"></i> An error occurred. Please try again.
                </div>
            `;
            btn.disabled = false;
            btn.innerHTML = '<i class="fa fa-check me-2"></i> I have made the payment';
        }
    });
</script>

@endsection
