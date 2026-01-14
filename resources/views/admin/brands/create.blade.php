@extends('admin.layout')

@section('title', 'Associer une marque')
@section('page-title', 'Associer une marque au produit')

@section('content')
<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-link me-2"></i> Associer une marque
                @if($product)
                    pour : <strong>{{ $product->name }}</strong>
                    <span class="badge bg-info float-end">{{ $product->brands->count() }}/18 marques</span>
                @endif
            </div>
            <div class="card-body">
                <form action="{{ route('admin.brands.store') }}" method="POST">
                    @csrf

                    @if($product)
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                    @else
                        <div class="mb-3">
                            <label for="product_id" class="form-label">Produit <span class="text-danger">*</span></label>
                            <select class="form-select @error('product_id') is-invalid @enderror" 
                                    id="product_id" 
                                    name="product_id" 
                                    required>
                                <option value="">Sélectionnez un produit</option>
                                @foreach($products as $prod)
                                    <option value="{{ $prod->id }}" 
                                            {{ old('product_id') == $prod->id ? 'selected' : '' }}
                                            {{ $prod->brands->count() >= 18 ? 'disabled' : '' }}>
                                        {{ $prod->name }} 
                                        ({{ $prod->brands->count() }}/18 marques)
                                    </option>
                                @endforeach
                            </select>
                            @error('product_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    @endif

                    <div class="mb-4">
                        <label class="form-label">Sélectionnez les marques disponibles <span class="text-danger">*</span></label>
                        <p class="text-muted small">Cliquez sur plusieurs marques pour les sélectionner (sélection multiple)</p>
                        
                        @if($availableBrands->isEmpty())
                            <div class="alert alert-warning">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                Aucune marque disponible. Toutes les marques sont déjà associées à des produits.
                            </div>
                        @else
                            <div class="row g-2">
                                @foreach($availableBrands as $brand)
                                    <div class="col-md-2 col-sm-3 col-4">
                                        <input type="checkbox" 
                                               class="btn-check brand-checkbox" 
                                               name="brand_ids[]" 
                                               id="brand_{{ $brand->id }}" 
                                               value="{{ $brand->id }}"
                                               {{ is_array(old('brand_ids')) && in_array($brand->id, old('brand_ids')) ? 'checked' : '' }}>
                                        <label class="btn btn-outline-primary w-100 p-2 text-center brand-selector" 
                                               for="brand_{{ $brand->id }}"
                                               style="min-height: 100px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                            <img src="{{ asset($brand->logo) }}" 
                                                 alt="{{ $brand->brand_name }}" 
                                                 class="img-fluid mb-1"
                                                 style="max-height: 50px; max-width: 60px; object-fit: contain;">
                                            <small class="fw-bold" style="font-size: 0.7rem; line-height: 1.2;">{{ $brand->brand_name }}</small>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="mt-2">
                                <span id="selectedCount" class="badge bg-primary">0 marque(s) sélectionnée(s)</span>
                            </div>
                            @error('brand_ids')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="price" class="form-label">Prix pour ce produit</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" 
                                           class="form-control @error('price') is-invalid @enderror" 
                                           id="price" 
                                           name="price" 
                                           value="{{ old('price') }}" 
                                           step="0.01"
                                           min="0"
                                           placeholder="Laisser vide pour prix moyen">
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <small class="text-muted">Si vide, le prix moyen du produit sera utilisé</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="stock" class="form-label">Stock <span class="text-danger">*</span></label>
                                <input type="number" 
                                       class="form-control @error('stock') is-invalid @enderror" 
                                       id="stock" 
                                       name="stock" 
                                       value="{{ old('stock', 50) }}" 
                                       min="0"
                                       required>
                                @error('stock')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Valeur par défaut : 50</small>
                            </div>
                        </div>
                    </div> 

                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>Limite :</strong> Maximum 18 marques par produit
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ $product ? route('admin.products.show', $product) : route('admin.products.index') }}" 
                           class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i> Retour
                        </a>
                        @if(!$availableBrands->isEmpty())
                            <button type="submit" class="btn btn-primary" id="submitBtn">
                                <i class="fas fa-link me-2"></i> Associer les marques
                            </button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.brand-selector {
    transition: all 0.3s ease;
}
.brand-selector:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}
.btn-check:checked + .brand-selector {
    background-color: var(--bs-primary);
    color: white;
    border-color: var(--bs-primary);
}
</style>
@endsection

@push('scripts')
<script>
function previewLogo(event) {
    const preview = document.getElementById('logoPreview');
    const file = event.target.files[0];
    
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.innerHTML = `<img src="${e.target.result}" class="img-thumbnail" style="max-width: 150px;">`;
        }
        reader.readAsDataURL(file);
    }
}

// Compter les marques sélectionnées
document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('.brand-checkbox');
    const selectedCount = document.getElementById('selectedCount');
    const submitBtn = document.getElementById('submitBtn');
    
    function updateCount() {
        const checked = document.querySelectorAll('.brand-checkbox:checked').length;
        if (selectedCount) {
            selectedCount.textContent = checked + ' marque(s) sélectionnée(s)';
        }
        if (submitBtn) {
            submitBtn.disabled = checked === 0;
        }
    }
    
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateCount);
    });
    
    updateCount();
});
</script>
@endpush
