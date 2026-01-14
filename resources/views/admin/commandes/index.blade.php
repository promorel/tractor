@extends('admin.layout')

@section('title', 'Orders Management')

@section('content')
<div class="container-fluid py-4">
    
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fa fa-shopping-cart me-2"></i> Orders Management</h2>
    </div>

    <!-- Success/Error Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="fa fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <i class="fa fa-exclamation-circle me-2"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Statistics Cards -->
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <p class="text-muted mb-1 small">Total Orders</p>
                            <h3 class="mb-0">{{ $stats['total'] ?? 0 }}</h3>
                        </div>
                        <div class="text-primary">
                            <i class="fa fa-shopping-cart fa-2x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <p class="text-muted mb-1 small">Pending</p>
                            <h3 class="mb-0">{{ $stats['pending'] ?? 0 }}</h3>
                        </div>
                        <div class="text-warning">
                            <i class="fa fa-clock fa-2x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <p class="text-muted mb-1 small">Waiting Validation</p>
                            <h3 class="mb-0">{{ $stats['waiting_validation'] ?? 0 }}</h3>
                        </div>
                        <div class="text-info">
                            <i class="fa fa-hourglass-half fa-2x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <p class="text-muted mb-1 small">Paid</p>
                            <h3 class="mb-0">{{ $stats['paid'] ?? 0 }}</h3>
                        </div>
                        <div class="text-success">
                            <i class="fa fa-check-circle fa-2x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('admin.commandes') }}" class="row g-3">
                <div class="col-md-4">
                    <label class="form-label small">Search</label>
                    <input type="text" name="search" class="form-control" 
                           placeholder="Reference, name, email..." 
                           value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label small">Status</label>
                    <select name="status" class="form-select">
                        <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>All</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="waiting_validation" {{ request('status') == 'waiting_validation' ? 'selected' : '' }}>Waiting Validation</option>
                        <option value="paid" {{ request('status') == 'paid' ? 'selected' : '' }}>Paid</option>
                        <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>
                </div>
                <div class="col-md-3 d-flex align-items-end gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-search me-1"></i> Filter
                    </button>
                    <a href="{{ route('admin.commandes') }}" class="btn btn-outline-secondary">
                        <i class="fa fa-times me-1"></i> Reset
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Orders Table -->
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            
            @if($orders->isEmpty())
                <div class="text-center py-5">
                    <i class="fa fa-inbox fa-3x text-muted mb-3"></i>
                    <p class="text-muted">No orders found</p>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Reference</th>
                                <th>Customer</th>
                                <th>Date</th>
                                <th class="text-end">Amount</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Proof</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>
                                        <strong>{{ $order->reference }}</strong>
                                    </td>
                                    <td>
                                        @if($order->customer_name)
                                            <strong>{{ $order->customer_name }}</strong><br>
                                            <small class="text-muted">{{ $order->customer_email }}</small>
                                            @if($order->user)
                                                <br><span class="badge bg-info" style="font-size: 0.7rem;">Account</span>
                                            @endif
                                        @elseif($order->user)
                                            <strong>{{ $order->user->name }}</strong><br>
                                            <small class="text-muted">{{ $order->user->email }}</small>
                                            <br><span class="badge bg-info" style="font-size: 0.7rem;">Account</span>
                                        @else
                                            <span class="text-muted">Guest</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $order->created_at->format('d/m/Y') }}<br>
                                        <small class="text-muted">{{ $order->created_at->format('H:i') }}</small>
                                    </td>
                                    <td class="text-end">
                                        <strong>€ {{ number_format($order->total_amount, 2) }}</strong>
                                    </td>
                                    <td class="text-center">
                                        {!! $order->getStatusBadge() !!}
                                    </td>
                                    <td class="text-center">
                                        @if($order->payment_proof)
                                            <a href="{{ route('admin.commandes.downloadProof', encrypt($order->id)) }}" 
                                               class="btn btn-sm btn-info" title="Download proof">
                                                <i class="fa fa-download"></i>
                                            </a>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.commandes.show', encrypt($order->id)) }}" 
                                               class="btn btn-sm btn-outline-primary" 
                                               title="View details">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            
                                            @if($order->payment_status === 'waiting_validation' || $order->payment_status === 'pending')
                                                <form action="{{ route('admin.commandes.validate', encrypt($order->id)) }}" 
                                                      method="POST" 
                                                      class="d-inline"
                                                      onsubmit="return confirm('Validate this payment?');">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-outline-success" title="Validate payment">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                </form>
                                                
                                                <button type="button" 
                                                        class="btn btn-sm btn-outline-danger" 
                                                        title="Reject payment"
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#rejectModal{{ $order->id }}">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-3">
                    {{ $orders->links() }}
                </div>
            @endif
            
        </div>
    </div>

    </div>

</div>

<!-- Reject Modals (one per order) -->
@foreach($orders as $order)
<div class="modal fade" id="rejectModal{{ $order->id }}" tabindex="-1" aria-labelledby="rejectModalLabel{{ $order->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.commandes.reject', encrypt($order->id)) }}" method="POST">
                @csrf
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="rejectModalLabel{{ $order->id }}">
                        <i class="fa fa-times-circle me-2"></i>
                        Rejeter la commande {{ $order->reference }}
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">
                        <i class="fa fa-exclamation-triangle me-2"></i>
                        Le client recevra un email l'informant du rejet avec le motif indiqué.
                    </div>
                    
                    <div class="mb-3">
                        <label for="rejection_reason{{ $order->id }}" class="form-label"><strong>Motif du rejet *</strong></label>
                        <textarea 
                            class="form-control" 
                            id="rejection_reason{{ $order->id }}" 
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
@endforeach

<style>
.opacity-50 {
    opacity: 0.5;
}
</style>
@endsection
