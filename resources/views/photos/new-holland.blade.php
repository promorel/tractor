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
                <h1 class="title">New Holland Photo Gallery</h1>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>Photo's</li>
                    <li class="active">New Holland</li>
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
                    <img src="https://tractorbumper.com/wp-content/uploads/2020/12/newholland-frontbumper-1-e1607940577623.jpg" alt="New Holland Frontbumper" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/10/newholland-front-extra-lights-1-1024x683.jpg" alt="New Holland Front Extra Lights" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2020/12/trekkerbumper-new-holland.jpg" alt="Trekkerbumper New Holland" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2020/12/safetyweight-newholland-traktor-bumper-1-1024x684.jpg" alt="Safetyweight New Holland" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2020/12/safetybumper-new-holland-gewicht-tractor.jpg" alt="Safetybumper New Holland" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/10/newholland-tractorbumper-1024x390.jpg" alt="New Holland TractorBumper" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2020/12/newholland-bumper-tractor-1024x404.jpg" alt="New Holland Bumper Tractor" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/06/new-holland-tractorbumper-trekkerbumper.jpg" alt="New Holland TractorBumper Trekkerbumper" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/06/newholland-weight-box-1024x768.jpg" alt="New Holland Weight Box" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/06/trekker-schutz-bumper-weight-newholland-johndeere-1024x768.jpg" alt="Trekker Schutz Bumper" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/06/new-holland-frontschutz-1024x681.jpg" alt="New Holland Frontschutz" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/10/frontschutz-tractor-traktor-new-holland-1024x683.jpg" alt="Frontschutz Tractor New Holland" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/10/new-holland-frontschutz-schlepper-unterfahrschutz-1024x768.jpg" alt="New Holland Frontschutz Schlepper" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/10/newholland-parechoc-tracteur-768x1024.jpg" alt="New Holland Parechoc" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/10/new-holland-trekkerbumper-1024x683.jpg" alt="New Holland Trekkerbumper" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/10/parechoc-tracteur-new-holland-1024x657.jpg" alt="Parechoc Tracteur New Holland" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/10/tractorbumper-new-holland-1024x768.jpg" alt="TractorBumper New Holland" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/10/new-holland-unterfahrschutz-traktor-1024x768.jpg" alt="New Holland Unterfahrschutz" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/10/new-holland-traktor-bumper-1-1010x1024.jpg" alt="New Holland Traktor Bumper" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/10/stauraumbox-traktorkiste-new-holland-1024x583.jpg" alt="Stauraumbox New Holland" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/10/tractor-toolbox-front-newholland-1024x683.jpg" alt="Tractor Toolbox Front" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/10/new-holland-front-safety-bumper-lights-1024x683.jpg" alt="New Holland Front Safety" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/10/newholland-toolbox-1-1024x684.jpg" alt="New Holland Toolbox" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/10/tracteur-parechoc-newholland-2-1024x590.jpg" alt="Tracteur Parechoc New Holland" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/01/new-holland-frontbumper-weight-mass-safety-marking.jpg" alt="New Holland Frontbumper Weight" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/01/newholland-mass-lights-front.jpg" alt="New Holland Mass Lights" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/01/new-holland-tractorbumper-safetyweight.jpg" alt="New Holland TractorBumper Safetyweight" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/01/newholland-unterfahrschutz-tractor-bumper-1024x683.jpg" alt="New Holland Unterfahrschutz Tractor" loading="lazy">
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
                <img src="https://tractorbumper.com/wp-content/uploads/2024/05/agribumper_New-Holland.jpg" alt="Agribumper New Holland" class="img-fluid">
            </div>
            <div class="col-lg-12">
                <a href="{{ route('products') }}" class="btn-shop">View New Holland bumpers in our shop</a>
            </div>
        </div>
    </div>
</div>
<!-- Shop Section End -->

@endsection
