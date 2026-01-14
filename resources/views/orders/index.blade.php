@extends('layout.template')

@section('contenu')
<!-- Breadcrumb Section Start -->
<div class="section">
    <div class="breadcrumb-area bg-light">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h1 class="title">Mes Commandes</h1>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="active">Mes Commandes</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Orders History Section Start -->
<div class="section section-margin">
    <div class="container">
        
        <!-- Messages -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                <i class="fa fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                <i class="fa fa-exclamation-circle me-2"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('info'))
            <div class="alert alert-info alert-dismissible fade show mb-4" role="alert">
                <i class="fa fa-info-circle me-2"></i> {{ session('info') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Page Header -->
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="mb-2">Historique de mes commandes</h2>
                <p class="text-muted">Retrouvez ici toutes vos commandes et leur statut de paiement</p>
            </div>
        </div>

        @if($orders->isEmpty())
            <!-- Empty State -->
            <div class="row">
                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="fa fa-shopping-bag fa-5x text-muted mb-4"></i>
                        <h3 class="mb-3">Aucune commande</h3>
                        <p class="text-muted mb-4">Vous n'avez pas encore passé de commande.</p>
                        <a href="{{ route('products') }}" class="btn btn-dark btn-hover-primary">
                            <i class="fa fa-arrow-left me-2"></i> Découvrir nos produits
                        </a>
                    </div>
                </div>
            </div>
        @else
            <!-- Orders List -->
            <div class="row">
                @foreach($orders as $order)
                    <div class="col-12 mb-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    
                                    <!-- Order Info -->
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <h5 class="mb-2">
                                                    <i class="fa fa-hashtag text-primary me-1"></i>
                                                    <strong>{{ $order->reference }}</strong>
                                                </h5>
                                                <p class="text-muted mb-1">
                                                    <i class="fa fa-calendar me-1"></i>
                                                    {{ $order->created_at->format('d/m/Y à H:i') }}
                                                </p>
                                                <p class="text-muted mb-0">
                                                    <i class="fa fa-credit-card me-1"></i>
                                                    Paiement {{ ucfirst($order->payment_method) }}
                                                </p>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="mb-2">
                                                    <strong>Montant total:</strong>
                                                </p>
                                                <h4 class="text-primary mb-2">
                                                    € {{ number_format($order->total_amount, 2) }}
                                                </h4>
                                                <p class="mb-0">
                                                    <strong>Articles:</strong> {{ $order->items->sum('quantity') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Status & Actions -->
                                    <div class="col-md-4 text-md-end">
                                        <div class="mb-3">
                                            @php
                                                $statusConfig = [
                                                    'pending' => ['badge' => 'secondary', 'icon' => 'clock', 'text' => 'En attente de paiement'],
                                                    'waiting_validation' => ['badge' => 'warning', 'icon' => 'exclamation-triangle', 'text' => 'En cours de vérification'],
                                                    'paid' => ['badge' => 'success', 'icon' => 'check-circle', 'text' => 'Payée'],
                                                    'rejected' => ['badge' => 'danger', 'icon' => 'times-circle', 'text' => 'Paiement refusé']
                                                ];
                                                $status = $statusConfig[$order->payment_status] ?? ['badge' => 'light', 'icon' => 'question', 'text' => 'Inconnu'];
                                            @endphp
                                            <span class="badge bg-{{ $status['badge'] }} fs-6 px-3 py-2">
                                                <i class="fa fa-{{ $status['icon'] }} me-2"></i>
                                                {{ $status['text'] }}
                                            </span>
                                        </div>

                                        <!-- Action Buttons -->
                                        <div class="d-grid gap-2">
                                            <a href="{{ route('orders.show', encrypt($order->id)) }}" 
                                               class="btn btn-outline-dark btn-hover-primary">
                                                <i class="fa fa-eye me-2"></i> Voir détails
                                            </a>
                                            
                                            @if($order->payment_status === 'pending')
                                                <a href="{{ route('checkout.payment', encrypt($order->id)) }}" 
                                                   class="btn btn-warning text-dark">
                                                    <i class="fa fa-credit-card me-2"></i> Payer maintenant
                                                </a>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <!-- Order Items Preview (optional) -->
                                @if($order->items->count() > 0)
                                    <hr class="my-3">
                                    <div class="order-items-preview">
                                        <small class="text-muted">
                                            <i class="fa fa-box me-1"></i>
                                            <strong>Produits:</strong>
                                            @foreach($order->items->take(3) as $item)
                                                {{ $item->product->name }}@if(!$loop->last), @endif
                                            @endforeach
                                            @if($order->items->count() > 3)
                                                <span class="text-primary">et {{ $order->items->count() - 3 }} autre(s)</span>
                                            @endif
                                        </small>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($orders->hasPages())
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-center">
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            @endif
        @endif

    </div>
</div>
<!-- Orders History Section End -->

<style>
    .card {
        transition: transform 0.2s, box-shadow 0.2s;
    }
    
    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }
    
    .badge {
        font-weight: 500;
        letter-spacing: 0.3px;
    }
    
    .order-items-preview {
        background: #f8f9fa;
        padding: 10px 15px;
        border-radius: 5px;
    }
</style>

@endsection
