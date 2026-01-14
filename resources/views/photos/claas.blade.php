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
                <h1 class="title">Claas Photo Gallery</h1>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>Photo's</li>
                    <li class="active">Claas</li>
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
                    <img src="https://tractorbumper.com/wp-content/uploads/2023/09/Claas_frontweight-1024x576.jpg" alt="Claas Frontweight" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/09/tractor-bumper-claas-e1691840448619.jpg" alt="Tractor Bumper Claas" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2020/10/91492733_1055366661498075_8448574977631846400_n.jpg" alt="Claas Tractor" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/09/Claas-trekkerbumper-safetybumper-agribumper-frontbumper-frontweight-e1691840380234.jpg" alt="Claas Trekkerbumper Safetybumper" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/09/Claas-tractorbumper-e1691840305919.jpg" alt="Claas Tractorbumper" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2023/03/claas-front-stauraum-fontgewicht-1024x461.jpg" alt="Claas Front Stauraum Frontgewicht" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2023/03/Claas-frontgewicht-markierung-1-1024x576.jpg" alt="Claas Frontgewicht Markierung" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2023/03/frontbox-claas-tractor-1024x772.jpeg" alt="Frontbox Claas Tractor" loading="lazy">
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
                <img src="https://tractorbumper.com/wp-content/uploads/2024/05/agribumper_Claas.jpg" alt="Agribumper Claas" class="img-fluid">
            </div>
            <div class="col-lg-12">
                <a href="{{ route('products') }}" class="btn-shop">View Claas bumpers in our shop</a>
            </div>
        </div>
    </div>
</div>
<!-- Shop Section End -->

@endsection
