@extends('layout.template')

@section('contenu')
<!-- Breadcrumb Section Start -->
<div class="section">
    <div class="breadcrumb-area bg-light">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h1 class="title">Détail de la Commande</h1>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('orders.index') }}">Mes Commandes</a></li>
                    <li class="active">{{ $order->reference }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Order Detail Section Start -->
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

        <div class="row">
            
            <!-- Order Information Column -->
            <div class="col-lg-8 mb-4">
                
                <!-- Order Header Card -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">
                            <i class="fa fa-info-circle me-2"></i>
                            Informations de la commande
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <strong><i class="fa fa-hashtag text-primary me-2"></i>Référence:</strong><br>
                                <h5 class="mt-1">{{ $order->reference }}</h5>
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong><i class="fa fa-calendar text-primary me-2"></i>Date:</strong><br>
                                <span class="mt-1">{{ $order->created_at->format('d/m/Y à H:i') }}</span>
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong><i class="fa fa-credit-card text-primary me-2"></i>Mode de paiement:</strong><br>
                                <span class="mt-1">{{ ucfirst($order->payment_method) }}</span>
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong><i class="fa fa-flag text-primary me-2"></i>Statut:</strong><br>
                                <div class="mt-1">
                                    {!! $order->getStatusBadge() !!}
                                </div>
                            </div>
                        </div>

                        @if($order->notes)
                            <div class="border-top pt-3 mt-2">
                                <strong><i class="fa fa-comment text-primary me-2"></i>Vos notes:</strong>
                                <p class="mb-0 mt-2 p-3 bg-light rounded">{{ $order->notes }}</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Order Items Card -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-secondary text-white">
                        <h4 class="mb-0">
                            <i class="fa fa-box me-2"></i>
                            Articles commandés
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Produit</th>
                                        <th>Marque</th>
                                        <th class="text-center">Prix unitaire</th>
                                        <th class="text-center">Quantité</th>
                                        <th class="text-end">Sous-total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->items as $item)
                                        <tr>
                                            <td>
                                                <a href="{{ route('product-details', encrypt($item->product_id)) }}" 
                                                   class="text-dark text-decoration-none">
                                                    <strong>{{ $item->product->name }}</strong>
                                                </a>
                                            </td>
                                            <td>
                                                <span class="text-muted">{{ $item->brand->name ?? 'N/A' }}</span>
                                            </td>
                                            <td class="text-center">
                                                € {{ number_format($item->price, 2) }}
                                            </td>
                                            <td class="text-center">
                                                <span class="badge bg-primary">× {{ $item->quantity }}</span>
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
                                            <h5 class="mb-0 text-primary">€ {{ number_format($order->total_amount, 2) }}</h5>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Actions & Status Column -->
            <div class="col-lg-4 mb-4">
                
                <!-- Status Card -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header 
                        @if($order->payment_status === 'paid') bg-success
                        @elseif($order->payment_status === 'waiting_validation') bg-warning
                        @elseif($order->payment_status === 'rejected') bg-danger
                        @else bg-secondary
                        @endif text-white">
                        <h5 class="mb-0">
                            <i class="fa fa-flag me-2"></i>
                            Statut du paiement
                        </h5>
                    </div>
                    <div class="card-body">
                        
                        @if($order->payment_status === 'pending')
                            <div class="alert alert-warning mb-3">
                                <i class="fa fa-clock me-2"></i>
                                <strong>En attente de votre paiement</strong>
                            </div>
                            <p class="mb-3">Votre commande a été enregistrée. Veuillez procéder au paiement pour que nous puissions la traiter.</p>
                            <a href="{{ route('checkout.payment', encrypt($order->id)) }}" class="btn btn-warning text-dark w-100 mb-2">
                                <i class="fa fa-credit-card me-2"></i> Payer maintenant
                            </a>
                            
                        @elseif($order->payment_status === 'waiting_validation')
                            <div class="alert alert-info mb-3">
                                <i class="fa fa-hourglass-half me-2"></i>
                                <strong>Vérification en cours</strong>
                            </div>
                            <p class="mb-3">Votre preuve de paiement a été reçue et est en cours de vérification par notre équipe.</p>
                            <p class="text-muted small mb-0">
                                <i class="fa fa-info-circle me-1"></i>
                                Délai habituel : 24 à 48h ouvrées
                            </p>
                            
                        @elseif($order->payment_status === 'paid')
                            <div class="alert alert-success mb-3">
                                <i class="fa fa-check-circle me-2"></i>
                                <strong>Paiement validé</strong>
                            </div>
                            <p class="mb-3">Votre paiement a été confirmé. Votre commande est en cours de préparation.</p>
                            <p class="text-muted small mb-0">
                                <i class="fa fa-truck me-1"></i>
                                Vous serez informé de l'expédition
                            </p>
                            
                        @else
                            <div class="alert alert-danger mb-3">
                                <i class="fa fa-times-circle me-2"></i>
                                <strong>Paiement refusé</strong>
                            </div>
                            <p class="mb-3">Votre paiement n'a pas pu être validé. Veuillez contacter notre service client.</p>
                            <a href="{{ route('contact') }}" class="btn btn-outline-dark w-100">
                                <i class="fa fa-envelope me-2"></i> Nous contacter
                            </a>
                        @endif
                        
                    </div>
                </div>

                <!-- Actions Card -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">
                            <i class="fa fa-cog me-2"></i>
                            Actions
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="{{ route('orders.index') }}" class="btn btn-outline-dark">
                                <i class="fa fa-arrow-left me-2"></i> Retour à mes commandes
                            </a>
                            
                            @if($order->payment_status === 'paid')
                                <button class="btn btn-outline-primary" onclick="alert('Fonctionnalité à venir')">
                                    <i class="fa fa-download me-2"></i> Télécharger la facture
                                </button>
                            @endif
                            
                            <a href="{{ route('contact') }}" class="btn btn-outline-secondary">
                                <i class="fa fa-question-circle me-2"></i> Besoin d'aide ?
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Payment Instructions (if pending) -->
                @if($order->payment_status === 'pending')
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-info text-white">
                            <h5 class="mb-0">
                                <i class="fa fa-info-circle me-2"></i>
                                Informations
                            </h5>
                        </div>
                        <div class="card-body">
                            <p class="mb-2"><strong>Comment payer ?</strong></p>
                            <ul class="small mb-0">
                                <li>Cliquez sur "Payer maintenant"</li>
                                <li>Suivez les instructions de paiement</li>
                                <li>Envoyez votre preuve de paiement</li>
                                <li>Attendez la validation (24-48h)</li>
                            </ul>
                        </div>
                    </div>
                @endif

            </div>

        </div>

    </div>
</div>
<!-- Order Detail Section End -->

@endsection
