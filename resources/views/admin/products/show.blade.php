@extends('admin.layout')

@section('title', 'Détails du produit')
@section('page-title', 'Détails du produit')

@section('content')
<div class="row">
    <!-- Product Info -->
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="fas fa-info-circle me-2"></i> {{ $product->name }}</span>
                <div>
                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-outline-secondary">
                        <i class="fas fa-edit"></i> Modifier
                    </a>
                    <button type="button" 
                            class="btn btn-sm btn-outline-danger" 
                            data-bs-toggle="modal" 
                            data-bs-target="#deleteModal">
                        <i class="fas fa-trash"></i> Supprimer
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset($product->main_image) }}" 
                             alt="{{ $product->name }}" 
                             class="img-thumbnail w-100">
                    </div>
                    <div class="col-md-8">
                        <table class="table table-borderless">
                            <tr>
                                <th style="width: 200px;">Nom :</th>
                                <td><strong>{{ $product->name }}</strong></td>
                            </tr>
                            <tr>
                                <th>Caractéristiques :</th>
                                <td>{{ $product->characteristics ?? 'Non défini' }}</td>
                            </tr>
                            <tr>
                                <th>Prix moyen :</th>
                                <td><span class="badge bg-success">${{ number_format($product->average_price, 2) }}</span></td>
                            </tr>
                            <tr>
                                <th>Temps de livraison :</th>
                                <td>{{ $product->delivery_time ?? 'Non défini' }}</td>
                            </tr>
                            <tr>
                                <th>Description :</th>
                                <td>{{ $product->description ?? 'Aucune description' }}</td>
                            </tr>
                            <tr>
                                <th>Créé le :</th>
                                <td>{{ $product->created_at->format('d/m/Y à H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Brands List -->
        <div class="card mt-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="fas fa-tag me-2"></i> Marques ({{ $product->brands->count() }}/18)</span>
                @if($product->brands->count() < 15)
                    <a href="{{ route('admin.brands.create.for.product', $product) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-plus"></i> Ajouter une marque
                    </a>
                @else
                    <span class="badge bg-danger">Limite atteinte</span>
                @endif
            </div>
            <div class="card-body">
                @if($product->brands->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 80px;">Logo</th>
                                    <th>Nom de la marque</th>
                                    <th>Prix</th>
                                    <th>Stock</th>
                                    <th>Images</th>
                                    <th style="width: 180px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($product->brands as $brand)
                                <tr>
                                    <td>
                                        <img src="{{ asset($brand->logo) }}" 
                                             alt="{{ $brand->brand_name }}" 
                                             class="img-thumbnail" 
                                             style="width: 50px; height: 50px; object-fit: contain;">
                                    </td>
                                    <td><strong>{{ $brand->brand_name }}</strong></td>
                                    <td><span class="badge bg-info">${{ number_format($brand->final_price, 2) }}</span></td>
                                    <td>
                                        <span class="badge {{ $brand->stock > 0 ? 'bg-success' : 'bg-danger' }}">
                                            {{ $brand->stock }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge {{ $brand->brandImages->count() > 0 ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $brand->brandImages->count() }} image(s)
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.brand-images.index.for.product', [$product, $brand]) }}" 
                                               class="btn btn-sm btn-outline-primary" 
                                               title="Gérer les images">
                                                <i class="fas fa-images"></i>
                                            </a>
                                            <a href="{{ route('admin.brands.edit.for.product', [$product, $brand]) }}" 
                                               class="btn btn-sm btn-outline-secondary" 
                                               title="Modifier">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" 
                                                    class="btn btn-sm btn-outline-danger" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#deleteBrandModal{{ $brand->id }}"
                                                    title="Supprimer">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>

                                        <!-- Delete Brand Modal -->
                                        <div class="modal fade" id="deleteBrandModal{{ $brand->id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Supprimer la marque</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Dissocier <strong>{{ $brand->brand_name }}</strong> de ce produit ?</p>
                                                        <p class="text-danger"><i class="fas fa-exclamation-triangle"></i> Toutes les images de cette marque seront également supprimées.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                        <form action="{{ route('admin.brands.detach', [$product, $brand]) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Dissocier</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-4">
                        <i class="fas fa-tag fa-3x text-muted mb-3"></i>
                        <p class="text-muted">Aucune marque pour ce produit.</p>
                        <a href="{{ route('admin.brands.create.for.product', $product) }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i> Ajouter la première marque
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Quick Stats Sidebar -->
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-chart-bar me-2"></i> Statistiques
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <h6 class="text-muted">Nombre de marques</h6>
                    <h3 class="mb-0">{{ $product->brands->count() }} <small class="text-muted">/ 15</small></h3>
                    <div class="progress mt-2" style="height: 5px;">
                        <div class="progress-bar" 
                             role="progressbar" 
                             style="width: {{ ($product->brands->count() / 15) * 100 }}%"></div>
                    </div>
                </div>

                <div class="mb-3">
                    <h6 class="text-muted">Images totales (ce produit)</h6>
                    <h3 class="mb-0">{{ $product->brands->sum(function($brand) { return $brand->brandImages->count(); }) }}</h3>
                </div>

                <div class="mb-3">
                    <h6 class="text-muted">Stock total</h6>
                    <h3 class="mb-0">{{ $product->brands->sum('stock') }}</h3>
                </div>

                <hr>

                <a href="{{ route('product-details', $product) }}" 
                   class="btn btn-outline-primary w-100 mb-2" 
                   target="_blank">
                    <i class="fas fa-external-link-alt me-2"></i> Voir sur le site
                </a>

                <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary w-100">
                    <i class="fas fa-arrow-left me-2"></i> Retour à la liste
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Delete Product Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Supprimer le produit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Êtes-vous sûr de vouloir supprimer <strong>{{ $product->name }}</strong> ?</p>
                <p class="text-danger"><i class="fas fa-exclamation-triangle"></i> Cette action supprimera également :</p>
                <ul class="text-danger">
                    <li>{{ $product->brands->count() }} association(s) de marque(s)</li>
                    <li>{{ $product->brands->sum(function($brand) { return $brand->brandImages->count(); }) }} image(s) pour ce produit</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer définitivement</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
