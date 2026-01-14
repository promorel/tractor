@extends('admin.layout')

@section('title', 'Créer un produit')
@section('page-title', 'Nouveau produit')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-plus-circle me-2"></i> Ajouter un nouveau produit
            </div>
            <div class="card-body">
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nom du produit <span class="text-danger">*</span></label>
                        <input type="text" 
                               class="form-control @error('name') is-invalid @enderror" 
                               id="name" 
                               name="name" 
                               value="{{ old('name') }}" 
                               required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="main_image_url" class="form-label">URL de l'image principale</label>
                        <input type="url" 
                               class="form-control @error('main_image_url') is-invalid @enderror" 
                               id="main_image_url" 
                               name="main_image_url" 
                               value="{{ old('main_image_url') }}" 
                               placeholder="https://example.com/image.jpg"
                               onchange="previewImageFromUrl(event)">
                        <small class="text-muted">
                            Formats acceptés : JPEG, JPG, PNG, WEBP, GIF. 
                            L'image sera automatiquement téléchargée et enregistrée sur le serveur.
                        </small>
                        @error('main_image_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        
                        <div class="mt-2" id="imagePreview"></div>
                    </div>

                    <div class="mb-3">
                        <label for="characteristics" class="form-label">Caractéristiques</label>
                        <textarea class="form-control @error('characteristics') is-invalid @enderror" 
                                  id="characteristics" 
                                  name="characteristics" 
                                  rows="5"
                                  placeholder="Ex: Premium Quality, Weather Resistant">{{ old('characteristics') }}</textarea>
                        @error('characteristics')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="average_price" class="form-label">Prix moyen <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" 
                                   class="form-control @error('average_price') is-invalid @enderror" 
                                   id="average_price" 
                                   name="average_price" 
                                   value="{{ old('average_price') }}" 
                                   step="0.01"
                                   min="0"
                                   required>
                            @error('average_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="delivery_time" class="form-label">Temps de livraison</label>
                        <input type="text" 
                               class="form-control @error('delivery_time') is-invalid @enderror" 
                               id="delivery_time" 
                               name="delivery_time" 
                               value="{{ old('delivery_time') }}" 
                               placeholder="Ex: 2-3 jours ouvrables">
                        @error('delivery_time')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description complète</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" 
                                  name="description" 
                                  rows="5"
                                  placeholder="Décrivez les détails du produit...">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Maximum 2000 caractères</small>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i> Retour
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i> Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function previewImageFromUrl(event) {
    const preview = document.getElementById('imagePreview');
    const url = event.target.value;
    
    if (url) {
        // Vérifier si l'URL semble valide
        try {
            new URL(url);
            preview.innerHTML = `
                <div class="alert alert-info">
                    <strong>Aperçu :</strong><br>
                    <img src="${url}" 
                         class="img-thumbnail mt-2" 
                         style="max-width: 300px;" 
                         onerror="this.parentElement.innerHTML='<span class=text-danger>⚠️ Impossible de charger l\'image depuis cette URL</span>'"
                         onload="this.parentElement.querySelector('.alert').classList.replace('alert-info', 'alert-success')">
                </div>
            `;
        } catch (e) {
            preview.innerHTML = '<span class="text-danger">⚠️ URL invalide</span>';
        }
    } else {
        preview.innerHTML = '';
    }
}
</script>
@endpush
