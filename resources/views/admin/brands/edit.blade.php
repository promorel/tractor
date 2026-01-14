@extends('admin.layout')

@section('title', 'Modifier la marque')
@section('page-title', 'Modifier la marque')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-edit me-2"></i> Modifier : {{ $brand->brand_name }} pour {{ $product->name }}
            </div>
            <div class="card-body">
                <form action="{{ route('admin.brands.update.for.product', [$product, $brand]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        Cette page permet de modifier uniquement le <strong>prix</strong> et le <strong>stock</strong> 
                        de la marque <strong>{{ $brand->brand_name }}</strong> pour le produit <strong>{{ $product->name }}</strong>.
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="price" class="form-label">Prix</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" 
                                           class="form-control @error('price') is-invalid @enderror" 
                                           id="price" 
                                           name="price" 
                                           value="{{ old('price', $pivotData->pivot->price) }}" 
                                           step="0.01"
                                           min="0"
                                           placeholder="Laisser vide pour utiliser le prix moyen">
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <small class="text-muted">Si vide, le prix moyen du produit ({{ number_format($product->average_price, 2) }} $) sera utilisé</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="stock" class="form-label">Stock <span class="text-danger">*</span></label>
                                <input type="number" 
                                       class="form-control @error('stock') is-invalid @enderror" 
                                       id="stock" 
                                       name="stock" 
                                       value="{{ old('stock', $pivotData->pivot->stock) }}" 
                                       min="0"
                                       required>
                                @error('stock')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.products.show', $product) }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i> Retour
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i> Mettre à jour
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
