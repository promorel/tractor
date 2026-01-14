@extends('layout.template')

@section('contenu')

<style>
    .photo-gallery {
        margin-bottom: 4rem;
    }
    
    .photo-gallery h2 {
        font-size: 2.5rem;
        font-weight: bold;
        margin-bottom: 2rem;
        text-align: center;
    }
    
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
        margin-bottom: 3rem;
    }
    
    .gallery-item {
        position: relative;
        overflow: hidden;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }
    
    .gallery-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0,0,0,0.2);
    }
    
    .gallery-item img {
        width: 100%;
        height: 300px;
        object-fit: cover;
        display: block;
    }
    
    .shop-section {
        background-color: #f8f9fa;
        padding: 3rem 0;
        text-align: center;
        margin-top: 4rem;
    }
    
    .shop-section img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin-bottom: 2rem;
    }
    
    .btn-shop {
        display: inline-block;
        background-color: #ffc107;
        color: #000;
        padding: 15px 40px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        font-size: 1.1rem;
        transition: all 0.3s;
    }
    
    .btn-shop:hover {
        background-color: #ffb300;
        color: #000;
        transform: translateY(-2px);
    }
    
    .divider {
        height: 2px;
        background-color: #ffc107;
        width: 80px;
        margin: 3rem auto;
    }
</style>

<!-- Breadcrumb Section Start -->
<div class="section">
    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-light">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h1 class="title">Valtra Photo Gallery</h1>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>Photo's</li>
                    <li class="active">Valtra</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->
</div>
<!-- Breadcrumb Section End -->

<!-- Main Gallery Section Start -->
<div class="section section-margin">
    <div class="container">
        <div class="photo-gallery">
            <div class="gallery-grid">
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2020/12/frontweight-valtra-tractor-bumper-gewicht-1024x683.jpg" alt="Frontweight Valtra Tractor Bumper Gewicht" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2020/12/gewicht-tractor-valtra-1024x576.jpg" alt="Gewicht Tractor Valtra" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/09/tractorbumper-valtra-safetyweight-frontgewicht-frontweight-front-bumper-1.jpg" alt="Tractorbumper Valtra Safetyweight" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2020/12/Valtra-wit-tractorbumper-ballast-weights-1024x678.jpg" alt="Valtra Wit Tractorbumper Ballast Weights" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/09/Valtra-tractor-bumper.jpg" alt="Valtra Tractor Bumper" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2020/12/Valtra-tractor-bumper-frontweight-1024x678.jpg" alt="Valtra Tractor Bumper Frontweight" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2020/12/Valtra-tractorbumper-trekkerbumper-frontgewicht-1024x445.jpg" alt="Valtra Tractorbumper Trekkerbumper" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/06/valtraballastweight-tractorblinker-tagfahrlicht-tractortoolbox-tractorbumper2.jpg" alt="Valtra Ballast Weight Tractor Toolbox" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/09/valtra-tracteur-parechoc.jpg" alt="Valtra Tracteur Parechoc" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/06/valtra-red-bumper-front-lights-1-1024x683.jpg" alt="Valtra Red Bumper Front Lights" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/06/valtra-traktorbumper.jpg" alt="Valtra Traktorbumper" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/09/GVSagrarAGZwitserland2-1024x768.jpg" alt="GVS Agrar AG Switzerland" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/09/valtra-scotland-tractorbumper-agribumper.jpg" alt="Valtra Scotland Tractorbumper" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/09/IMG_20210617_082524-1024x768.jpg" alt="Valtra Front View" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/09/IMG_20210617_100256-1024x768.jpg" alt="Valtra Side View" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/09/valtra-toolbox-tractor-843x1024.jpg" alt="Valtra Toolbox Tractor" loading="lazy">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Gallery Section End -->

<!-- Divider -->
<div class="divider"></div>

<!-- Shop Section Start -->
<div class="shop-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 mb-4">
                <img src="https://tractorbumper.com/wp-content/uploads/2024/05/agribumper_Valtra.jpg" alt="Agribumper Valtra" class="img-fluid">
            </div>
            <div class="col-lg-12">
                <a href="{{ route('products') }}" class="btn-shop">View Valtra bumpers in our shop</a>
            </div>
        </div>
    </div>
</div>
<!-- Shop Section End -->

@endsection
