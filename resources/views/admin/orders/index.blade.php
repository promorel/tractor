@extends('admin.layout')

@section('title', 'Gestion des Commandes')

@section('contenu')
<div class="container-fluid py-4">
    
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fa fa-shopping-cart me-2"></i> Gestion des Commandes</h2>
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
    <div class="row mb-4">
        <div class="col-md-3 mb-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Total</h6>
                            <h3 class="mb-0">{{ $stats['total'] }}</h3>
                        </div>
                        <div class="text-primary">
                            <i class="fa fa-shopping-cart fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">En attente</h6>
                            <h3 class="mb-0">{{ $stats['pending'] }}</h3>
                        </div>
                        <div class="text-secondary">
                            <i class="fa fa-clock fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">À vérifier</h6>
                            <h3 class="mb-0">{{ $stats['waiting_validation'] }}</h3>
                        </div>
                        <div class="text-warning">
                            <i class="fa fa-exclamation-triangle fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Payées</h6>
                            <h3 class="mb-0">{{ $stats['paid'] }}</h3>
                        </div>
                        <div class="text-success">
                            <i class="fa fa-check-circle fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('admin.orders.index') }}" class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Statut</label>
                    <select name="status" class="form-select">
                        <option value="all" {{ request('status') === 'all' ? 'selected' : '' }}>Tous</option>
                        <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>En attente</option>
                        <option value="waiting_validation" {{ request('status') === 'waiting_validation' ? 'selected' : '' }}>À vérifier</option>
                        <option value="paid" {{ request('status') === 'paid' ? 'selected' : '' }}>Payées</option>
                        <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Refusées</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Rechercher</label>
                    <input type="text" name="search" class="form-control" 
                           placeholder="Référence, email, nom..."
                           value="{{ request('search') }}">
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fa fa-search me-2"></i> Filtrer
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Orders Table -->
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            
            <!-- DEBUG -->
            <div class="alert alert-info">
                <strong>DEBUG:</strong> Nombre de commandes trouvées: {{ $orders->count() }} / Total: {{ $orders->total() }}
            </div>
            
            @if($orders->isEmpty())
                <div class="text-center py-5">
                    <i class="fa fa-inbox fa-3x text-muted mb-3"></i>
                    <p class="text-muted">Aucune commande trouvée</p>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Référence</th>
                                <th>Client</th>
                                <th>Date</th>
                                <th class="text-end">Montant</th>
                                <th class="text-center">Statut</th>
                                <th class="text-center">Preuve</th>
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
                                            <a href="{{ route('admin.orders.downloadProof', encrypt($order->id)) }}" 
                                               class="btn btn-sm btn-info" title="Télécharger la preuve">
                                                <i class="fa fa-download"></i>
                                            </a>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.orders.show', encrypt($order->id)) }}" 
                                               class="btn btn-sm btn-outline-primary" title="Détails">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            
                                            @if($order->payment_status === 'waiting_validation')
                                                <form action="{{ route('admin.orders.markAsPaid', encrypt($order->id)) }}" 
                                                      method="POST" class="d-inline"
                                                      onsubmit="return confirm('Confirmer le paiement de cette commande ?')">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-success" title="Marquer comme payé">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                </form>
                                                
                                                <form action="{{ route('admin.orders.rejectPayment', encrypt($order->id)) }}" 
                                                      method="POST" class="d-inline"
                                                      onsubmit="return confirm('Refuser le paiement de cette commande ?')">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Refuser">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
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
@endsection
