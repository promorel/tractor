@extends('admin.layout')

@section('title', 'Détails Commande #' . $order->reference)

@section('contenu')
<div class="container-fluid py-4">
    
    <!-- Header with Back Button -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>
            <i class="fa fa-shopping-cart me-2"></i> 
            Commande {{ $order->reference }}
        </h2>
        <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary">
            <i class="fa fa-arrow-left me-2"></i> Retour
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
                        Informations de la commande
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <strong>Référence :</strong><br>
                            {{ $order->reference }}
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Date :</strong><br>
                            {{ $order->created_at->format('d/m/Y à H:i') }}
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Client :</strong><br>
                            <strong>{{ $order->customer_name }}</strong><br>
                            <small class="text-muted">
                                📧 {{ $order->customer_email }}<br>
                                @if($order->customer_phone)
                                    📞 {{ $order->customer_phone }}<br>
                                @endif
                                @if($order->user)
                                    <span class="badge bg-info">Compte utilisateur</span>
                                @else
                                    <span class="badge bg-secondary">Invité</span>
                                @endif
                            </small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Statut :</strong><br>
                            {!! $order->getStatusBadge() !!}
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Méthode de paiement :</strong><br>
                            {{ ucfirst($order->payment_method) }}
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Montant total :</strong><br>
                            <h4 class="text-primary mb-0">€ {{ number_format($order->total_amount, 2) }}</h4>
                        </div>
                    </div>

                    @if($order->notes)
                        <div class="border-top pt-3 mt-3">
                            <strong>Notes du client :</strong>
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
                        Articles commandés
                    </h5>
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
                                    <th colspan="4" class="text-end">Total :</th>
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
                            Cette commande attend votre validation
                        </div>
                        
                        <form action="{{ route('admin.orders.markAsPaid', encrypt($order->id)) }}" 
                              method="POST" class="mb-2"
                              onsubmit="return confirm('Confirmer le paiement de cette commande ?')">
                            @csrf
                            <button type="submit" class="btn btn-success w-100 mb-2">
                                <i class="fa fa-check-circle me-2"></i> 
                                Marquer comme payé
                            </button>
                        </form>
                        
                        <form action="{{ route('admin.orders.rejectPayment', encrypt($order->id)) }}" 
                              method="POST"
                              onsubmit="return confirm('Refuser le paiement de cette commande ?')">
                            @csrf
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="fa fa-times-circle me-2"></i> 
                                Refuser le paiement
                            </button>
                        </form>
                    @elseif($order->payment_status === 'paid')
                        <div class="alert alert-success mb-0">
                            <i class="fa fa-check-circle me-2"></i>
                            Paiement validé
                        </div>
                    @elseif($order->payment_status === 'rejected')
                        <div class="alert alert-danger mb-0">
                            <i class="fa fa-times-circle me-2"></i>
                            Paiement refusé
                        </div>
                    @else
                        <div class="alert alert-secondary mb-0">
                            <i class="fa fa-clock me-2"></i>
                            En attente du paiement client
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
                            Preuve de paiement
                        </h5>
                    </div>
                    <div class="card-body text-center">
                        @php
                            $extension = pathinfo($order->payment_proof, PATHINFO_EXTENSION);
                        @endphp
                        
                        @if(in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                            <img src="{{ asset('storage/' . $order->payment_proof) }}" 
                                 class="img-fluid rounded mb-3" 
                                 alt="Preuve de paiement">
                        @else
                            <div class="mb-3">
                                <i class="fa fa-file-pdf fa-4x text-danger"></i>
                                <p class="mt-2 mb-0">Document PDF</p>
                            </div>
                        @endif
                        
                        <a href="{{ route('admin.orders.downloadProof', encrypt($order->id)) }}" 
                           class="btn btn-primary w-100">
                            <i class="fa fa-download me-2"></i> 
                            Télécharger
                        </a>
                    </div>
                </div>
            @endif

        </div>

    </div>

</div>
@endsection
