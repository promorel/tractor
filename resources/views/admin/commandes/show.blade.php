@extends('admin.layout')

@section('title', 'Order Details #' . $order->reference)

@section('content')
<div class="container-fluid py-4">
    
    <!-- Header with Back Button -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>
            <i class="fa fa-shopping-cart me-2"></i> 
            Order {{ $order->reference }}
        </h2>
        <a href="{{ route('admin.commandes') }}" class="btn btn-outline-secondary">
            <i class="fa fa-arrow-left me-2"></i> Back to Orders
        </a>
    </div>

    <!-- Success/Error Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="fa fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        
        <!-- Order Info Column -->
        <div class="col-lg-8 mb-4">
            
            <!-- Order Details Card -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <i class="fa fa-info-circle me-2"></i> 
                        Order Information
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <strong>Reference:</strong><br>
                            {{ $order->reference }}
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Date:</strong><br>
                            {{ $order->created_at->format('d/m/Y at H:i') }}
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Customer:</strong><br>
                            @if($order->customer_name)
                                <strong>{{ $order->customer_name }}</strong><br>
                                <small class="text-muted">
                                    📧 {{ $order->customer_email }}<br>
                                    @if($order->customer_phone)
                                        📞 {{ $order->customer_phone }}<br>
                                    @endif
                                    @if($order->user)
                                        <span class="badge bg-info">User Account</span>
                                    @else
                                        <span class="badge bg-secondary">Guest</span>
                                    @endif
                                </small>
                            @elseif($order->user)
                                <strong>{{ $order->user->name }}</strong><br>
                                <small class="text-muted">
                                    📧 {{ $order->user->email }}<br>
                                    <span class="badge bg-info">User Account</span>
                                </small>
                            @else
                                <span class="text-muted">Guest (No info)</span>
                            @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Status:</strong><br>
                            {!! $order->getStatusBadge() !!}
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Payment Method:</strong><br>
                            {{ ucfirst($order->payment_method) }}
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Total Amount:</strong><br>
                            <h4 class="text-primary mb-0">€ {{ number_format($order->total_amount, 2) }}</h4>
                        </div>
                    </div>

                    @if($order->notes)
                        <div class="border-top pt-3 mt-3">
                            <strong>Customer Notes:</strong>
                            <p class="mb-0 mt-2">{{ $order->notes }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Order Items Card -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0">
                        <i class="fa fa-list me-2"></i> 
                        Order Items
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Product</th>
                                    <th>Brand</th>
                                    <th class="text-center">Unit Price</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-end">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->items as $item)
                                    <tr>
                                        <td>
                                            <strong>{{ $item->product->name }}</strong>
                                        </td>
                                        <td>
                                            {{ $item->brand->name ?? 'N/A' }}
                                        </td>
                                        <td class="text-center">
                                            € {{ number_format($item->price, 2) }}
                                        </td>
                                        <td class="text-center">
                                            × {{ $item->quantity }}
                                        </td>
                                        <td class="text-end">
                                            <strong>€ {{ number_format($item->getSubtotal(), 2) }}</strong>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="table-light">
                                <tr>
                                    <th colspan="4" class="text-end">Total:</th>
                                    <th class="text-end">
                                        € {{ number_format($order->total_amount, 2) }}
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <!-- Actions Column -->
        <div class="col-lg-4 mb-4">
            
            <!-- Actions Card -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0">
                        <i class="fa fa-cogs me-2"></i> 
                        Actions
                    </h5>
                </div>
                <div class="card-body">
                    
                    @if($order->payment_status === 'waiting_validation')
                        <div class="alert alert-warning mb-3">
                            <i class="fa fa-exclamation-triangle me-2"></i>
                            This order is waiting for your validation
                        </div>
                        
                        <form action="{{ route('admin.commandes.validate', encrypt($order->id)) }}" 
                              method="POST" class="mb-2"
                              onsubmit="return confirm('Confirm payment for this order?')">
                            @csrf
                            <button type="submit" class="btn btn-success w-100 mb-2">
                                <i class="fa fa-check-circle me-2"></i> 
                                Mark as Paid
                            </button>
                        </form>
                        
                        <button type="button" class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#rejectModal">
                            <i class="fa fa-times-circle me-2"></i> 
                            Reject Payment
                        </button>
                    @elseif($order->payment_status === 'paid')
                        <div class="alert alert-success mb-0">
                            <i class="fa fa-check-circle me-2"></i>
                            Payment validated
                        </div>
                    @elseif($order->payment_status === 'rejected')
                        <div class="alert alert-danger mb-0">
                            <i class="fa fa-times-circle me-2"></i>
                            Payment rejected
                        </div>
                    @else
                        <div class="alert alert-secondary mb-0">
                            <i class="fa fa-clock me-2"></i>
                            Waiting for customer payment
                        </div>
                    @endif
                    
                </div>
            </div>

            <!-- Payment Proof Card -->
            @if($order->payment_proof)
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0">
                            <i class="fa fa-file me-2"></i> 
                            Payment Proof
                        </h5>
                    </div>
                    <div class="card-body">
                        @php
                            $extension = strtolower(pathinfo($order->payment_proof, PATHINFO_EXTENSION));
                            $filePath = asset('storage/' . $order->payment_proof);
                        @endphp
                        
                        @if(in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                            <!-- Image Preview -->
                            <div class="text-center mb-3">
                                <img src="{{ $filePath }}" 
                                     class="img-fluid rounded shadow-sm" 
                                     alt="Payment proof"
                                     style="max-width: 100%; max-height: 600px; object-fit: contain; cursor: pointer;"
                                     onclick="window.open(this.src, '_blank')">
                            </div>
                            <p class="text-muted text-center small mb-3">
                                <i class="fa fa-info-circle me-1"></i> Click image to view full size
                            </p>
                        @elseif($extension === 'pdf')
                            <!-- PDF Preview -->
                            <div class="mb-3">
                                <iframe src="{{ $filePath }}" 
                                        style="width: 100%; height: 600px; border: 1px solid #ddd; border-radius: 5px;"
                                        frameborder="0">
                                    <p>Your browser does not support PDFs. 
                                       <a href="{{ $filePath }}" target="_blank">Download the PDF</a>
                                    </p>
                                </iframe>
                            </div>
                        @else
                            <!-- Other file types -->
                            <div class="text-center mb-3">
                                <i class="fa fa-file fa-4x text-secondary mb-3"></i>
                                <p class="text-muted">File: {{ basename($order->payment_proof) }}</p>
                                <p class="text-muted small">Extension: .{{ $extension }}</p>
                                <a href="{{ route('admin.commandes.downloadProof', encrypt($order->id)) }}" 
                                   class="btn btn-primary mt-3"
                                   download>
                                    <i class="fa fa-download me-2"></i> 
                                    Download
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            @endif

        </div>

    </div>

</div>

<!-- Reject Modal -->
<div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.commandes.reject', encrypt($order->id)) }}" method="POST">
                @csrf
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="rejectModalLabel">
                        <i class="fa fa-times-circle me-2"></i>
                        Rejeter le paiement
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">
                        <i class="fa fa-exclamation-triangle me-2"></i>
                        Le client recevra un email l'informant du rejet avec le motif indiqué.
                    </div>
                    
                    <div class="mb-3">
                        <label for="rejection_reason" class="form-label"><strong>Motif du rejet *</strong></label>
                        <textarea 
                            class="form-control" 
                            id="rejection_reason" 
                            name="rejection_reason" 
                            rows="4" 
                            required
                            placeholder="Ex: Le montant du virement ne correspond pas à la commande, la preuve de paiement n'est pas lisible, etc."></textarea>
                        <div class="form-text">Expliquez clairement pourquoi le paiement est rejeté.</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fa fa-times me-1"></i> Annuler
                    </button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-times-circle me-1"></i> Confirmer le rejet
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
