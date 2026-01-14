@extends('admin.layout')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="stats-card">
            <i class="fas fa-box fa-2x mb-3"></i>
            <h4>{{ \App\Models\Product::count() }}</h4>
            <p>Produits</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stats-card" style="background: linear-gradient(135deg, #3498db, #2980b9);">
            <i class="fas fa-tag fa-2x mb-3"></i>
            <h4>{{ \App\Models\Brand::count() }}</h4>
            <p>Marques</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stats-card" style="background: linear-gradient(135deg, #e74c3c, #c0392b);">
            <i class="fas fa-images fa-2x mb-3"></i>
            <h4>{{ \App\Models\BrandImage::count() }}</h4>
            <p>Images</p>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-chart-line me-2"></i> Raccourcis rapides
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i> Créer un nouveau produit
                    </a>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-list me-2"></i> Gérer les produits
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-info-circle me-2"></i> Informations système
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0">
                    <li class="mb-2">
                        <i class="fas fa-check-circle text-success me-2"></i>
                        Limite marques par produit : <strong>15</strong>
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-check-circle text-success me-2"></i>
                        Limite images par marque : <strong>6</strong>
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-check-circle text-success me-2"></i>
                        Taille max fichier : <strong>2 Mo</strong>
                    </li>
                    <li>
                        <i class="fas fa-check-circle text-success me-2"></i>
                        Formats acceptés : <strong>JPEG, JPG, PNG, WEBP</strong>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-box me-2"></i> Derniers produits créés
            </div>
            <div class="card-body">
                @php
                    $latestProducts = \App\Models\Product::with('brands')->latest()->take(5)->get();
                @endphp
                
                @if($latestProducts->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prix moyen</th>
                                    <th>Marques</th>
                                    <th>Date création</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($latestProducts as $product)
                                <tr>
                                    <td>
                                        <strong>{{ $product->name }}</strong>
                                    </td>
                                    <td>${{ number_format($product->average_price, 2) }}</td>
                                    <td>
                                        <span class="badge bg-secondary">{{ $product->brands->count() }} marque(s)</span>
                                    </td>
                                    <td>{{ $product->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <a href="{{ route('admin.products.show', $product) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-outline-secondary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-4">
                        <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                        <p class="text-muted">Aucun produit pour le moment.</p>
                        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i> Créer votre premier produit
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
