@extends('admin.layout')

@section('title', 'Gestion des images')
@section('page-title', 'Gestion des images')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-images me-2"></i> Images de : <strong>{{ $brand->brand_name }}</strong> pour <strong>{{ $product->name }}</strong>
                <span class="badge bg-info ms-2">{{ $brand->brandImages->count() }} image(s)</span>
                <span class="badge bg-secondary ms-1">Slug: {{ Str::slug($product->name) }}-{{ Str::slug($brand->brand_name) }}</span>
            </div>
            <div class="card-body">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.products.index') }}">Produits</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.products.show', $product) }}">{{ $product->name }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ $brand->brand_name }}</li>
                    </ol>
                </nav>

                <!-- Upload Form -->
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    <strong>Ajoutez autant d'images que nécessaire pour cette combinaison produit-marque</strong>
                    <br><small>Les images seront organisées dans le dossier : assets/images/products/{{ Str::slug($product->name) }}-{{ Str::slug($brand->brand_name) }}/</small>
                </div>

                <div class="card mb-4">
                    <div class="card-header bg-light">
                        <i class="fas fa-upload me-2"></i> Ajouter des images
                    </div>
                    <div class="card-body">
                        <!-- Brand Info -->
                        <div class="alert alert-light border d-flex align-items-center mb-3">
                            <img src="{{ asset($brand->logo) }}" 
                                 alt="{{ $brand->brand_name }}" 
                                 class="img-thumbnail me-3"
                                 style="width: 60px; height: 60px; object-fit: contain;">
                            <div>
                                <h6 class="mb-1">Marque : <strong>{{ $brand->brand_name }}</strong></h6>
                                <small class="text-muted">
                                    Produit : {{ $product->name }} | 
                                    Prix : ${{ number_format($brand->final_price, 2) }} | 
                                    Stock : {{ $brand->stock }}
                                </small>
                            </div>
                        </div>

                        <form action="{{ route('admin.brand-images.store.for.product', [$product, $brand]) }}" 
                              method="POST" 
                              id="uploadForm">
                            @csrf

                            <div class="row g-3">
                                @for($i = 1; $i <= 6; $i++)
                                    <div class="col-md-4 col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <label class="form-label fw-bold">Image {{ $i }}</label>
                                                <input type="url" 
                                                       class="form-control mb-2 @error('image_urls.'.$i) is-invalid @enderror" 
                                                       name="image_urls[]" 
                                                       placeholder="https://exemple.com/image{{ $i }}.jpg"
                                                       onchange="previewImageFromUrl(event, {{ $i }})"
                                                       {{ $i == 1 ? 'required' : '' }}>
                                                <div id="preview_{{ $i }}" class="text-center mt-2"></div>
                                                @error('image_urls.'.$i)
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                                </div>

                                <small class="text-muted d-block mt-3">
                                    <i class="fas fa-info-circle me-1"></i>
                                    Collez les URLs des images. Formats supportés : JPEG, JPG, PNG, WEBP, GIF<br>
                                    <i class="fas fa-folder me-1"></i>
                                    Dossier : <code>assets/images/products/{{ Str::slug($product->name) }}-{{ Str::slug($brand->brand_name) }}/</code>
                                </small>

                                @error('image_urls')
                                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                                @enderror

                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary w-100" id="uploadBtn">
                                        <i class="fas fa-cloud-download-alt me-2"></i> Télécharger toutes les images
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                <!-- Existing Images -->
                <div class="card">
                    <div class="card-header bg-light">
                        <i class="fas fa-images me-2"></i> Images existantes ({{ $brand->brandImages->count() }})
                    </div>
                    <div class="card-body">
                        @if($brand->brandImages->count() > 0)
                            <div class="row g-2">
                                @foreach($brand->brandImages as $image)
                                <div class="col-md-2 col-sm-3 col-4">
                                    <div class="card h-100">
                                        <img src="{{ asset($image->image_path) }}" 
                                             class="card-img-top" 
                                             alt="Image" 
                                             style="height: 120px; object-fit: cover;">
                                        <div class="card-body p-2">
                                            <button type="button" 
                                                    class="btn btn-sm btn-danger w-100" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#deleteImageModal{{ $image->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteImageModal{{ $image->id }}" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Supprimer l'image</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <img src="{{ asset($image->image_path) }}" 
                                                         class="img-thumbnail mb-3" 
                                                         style="max-width: 200px;">
                                                    <p>Êtes-vous sûr de vouloir supprimer cette image ?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                    <form action="{{ route('admin.brand-images.destroy', $image) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="fas fa-trash"></i> Supprimer
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-5">
                                <i class="fas fa-images fa-4x text-muted mb-3"></i>
                                <h5 class="text-muted">Aucune image pour cette marque</h5>
                                <p class="text-muted">Ajoutez jusqu'à 6 images pour la galerie produit</p>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="mt-3">
                    <a href="{{ route('admin.products.show', $product) }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i> Retour au produit
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function previewImageFromUrl(event, index) {
    const preview = document.getElementById('preview_' + index);
    const url = event.target.value;
    
    if (url) {
        preview.innerHTML = '<div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Chargement...</span></div>';
        
        // Créer une nouvelle image pour tester le chargement
        const img = new Image();
        
        img.onload = function() {
            preview.innerHTML = `
                <img src="${url}" 
                     class="img-thumbnail" 
                     style="max-width: 100%; max-height: 150px; object-fit: cover;">
                <small class="text-success d-block mt-1"><i class="fas fa-check-circle"></i> Image valide</small>
            `;
        };
        
        img.onerror = function() {
            preview.innerHTML = '<small class="text-danger"><i class="fas fa-times-circle"></i> Impossible de charger l\'image</small>';
        };
        
        img.src = url;
    } else {
        preview.innerHTML = '';
    }
}
</script>
@endpush
