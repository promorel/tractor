@extends('layout.template')

@section('contenu')

<style>
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
        margin-bottom: 40px;
    }
    .gallery-item {
        overflow: hidden;
        border-radius: 8px;
        transition: all 0.3s ease;
    }
    .gallery-item img {
        width: 100%;
        height: 300px;
        object-fit: cover;
        display: block;
    }
    .gallery-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0,0,0,0.2);
    }
    .divider {
        width: 80px;
        height: 3px;
        background-color: #ffc107;
        margin: 60px auto;
    }
    .shop-section {
        text-align: center;
        margin: 60px 0;
    }
    .shop-section img {
        max-width: 100%;
        height: auto;
        margin-bottom: 30px;
        border-radius: 8px;
    }
    .btn-shop {
        display: inline-block;
        background-color: #ffc107;
        color: #000;
        padding: 15px 40px;
        font-weight: bold;
        text-decoration: none;
        border-radius: 5px;
        transition: all 0.3s ease;
    }
    .btn-shop:hover {
        background-color: #ffb300;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }
    .breadcrumb-section {
        padding: 20px 0;
        background-color: #f8f9fa;
        margin-bottom: 40px;
    }
    .breadcrumb-section .breadcrumb {
        background: none;
        padding: 0;
        margin: 0;
    }
</style>

<!-- Breadcrumb Section Start -->
<div class="section">
    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-light">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h1 class="title">Massey Ferguson Photo Gallery</h1>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>Photo's</li>
                    <li class="active">Massey Ferguson</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->
</div>
<!-- Breadcrumb Section End -->

<section class="section section-margin">
    <div class="container">
        <div class="row">
            <div class="col">
                
                <div class="gallery-grid">
                    <div class="gallery-item">
                        <img src="https://tractorbumper.com/wp-content/uploads/2021/09/frontweight-masseyferguson-weightblock-1024x768.jpg" alt="Frontweight Massey Ferguson Weight Block" loading="lazy">
                    </div>
                    <div class="gallery-item">
                        <img src="https://tractorbumper.com/wp-content/uploads/2021/09/massey-ferguson-frontweight-ballast.jpg" alt="Massey Ferguson Frontweight Ballast" loading="lazy">
                    </div>
                    <div class="gallery-item">
                        <img src="https://tractorbumper.com/wp-content/uploads/2021/09/massey-ferguson-breite-markierung-led-leuchten-traktor-1024x768.jpg" alt="Massey Ferguson Breite Markierung LED Leuchten Traktor" loading="lazy">
                    </div>
                    <div class="gallery-item">
                        <img src="https://tractorbumper.com/wp-content/uploads/2021/06/tractorbumper-masse-ferguson.jpg" alt="Tractorbumper Massey Ferguson" loading="lazy">
                    </div>
                    <div class="gallery-item">
                        <img src="https://tractorbumper.com/wp-content/uploads/2021/06/massey-ferguson-8s-frontgewicht-traktor-schlepper-lohnunternehmen-ernte-1024x683.jpg" alt="Massey Ferguson 8S Frontgewicht Traktor" loading="lazy">
                    </div>
                    <div class="gallery-item">
                        <img src="https://tractorbumper.com/wp-content/uploads/2021/06/masseyferguson-tractorbumper-1024x683.jpg" alt="Massey Ferguson Tractorbumper" loading="lazy">
                    </div>
                    <div class="gallery-item">
                        <img src="https://tractorbumper.com/wp-content/uploads/2021/09/massey-parechoc-tracteur-1024x768.jpg" alt="Massey Ferguson Parechoc Tracteur" loading="lazy">
                    </div>
                    <div class="gallery-item">
                        <img src="https://tractorbumper.com/wp-content/uploads/2021/09/mf-tractor-front-box-linkage.jpg" alt="MF Tractor Front Box Linkage" loading="lazy">
                    </div>
                    <div class="gallery-item">
                        <img src="https://tractorbumper.com/wp-content/uploads/2021/06/agri-bumper-massey-ferguson-1024x683.jpg" alt="Agri Bumper Massey Ferguson" loading="lazy">
                    </div>
                    <div class="gallery-item">
                        <img src="https://tractorbumper.com/wp-content/uploads/2021/08/LMBVeldman5-1024x683.jpg" alt="LMB Veldman Massey Ferguson" loading="lazy">
                    </div>
                    <div class="gallery-item">
                        <img src="https://tractorbumper.com/wp-content/uploads/2021/08/Timmermans-Agri-Service2-1024x683.jpg" alt="Timmermans Agri Service" loading="lazy">
                    </div>
                    <div class="gallery-item">
                        <img src="https://tractorbumper.com/wp-content/uploads/2021/08/110317058_2586932681546393_5373986305885955057_o-1024x768.jpg" alt="Massey Ferguson Tractor" loading="lazy">
                    </div>
                    <div class="gallery-item">
                        <img src="https://tractorbumper.com/wp-content/uploads/2021/06/Massey-Ferguson-8S-E-power-Dyna-7-trekkerbumper-1024x610.jpg" alt="Massey Ferguson 8S E-power Dyna 7 Trekkerbumper" loading="lazy">
                    </div>
                    <div class="gallery-item">
                        <img src="https://tractorbumper.com/wp-content/uploads/2021/09/tractor-safety-road-marking-massey-ferguson-1024x576.jpg" alt="Tractor Safety Road Marking Massey Ferguson" loading="lazy">
                    </div>
                    <div class="gallery-item">
                        <img src="https://tractorbumper.com/wp-content/uploads/2021/09/MF-safety-frontweight-1024x683.jpg" alt="MF Safety Frontweight" loading="lazy">
                    </div>
                    <div class="gallery-item">
                        <img src="https://tractorbumper.com/wp-content/uploads/2021/09/masseyferguson-weight-agri-tractorbumper-768x1024.jpg" alt="Massey Ferguson Weight Agri Tractorbumper" loading="lazy">
                    </div>
                    <div class="gallery-item">
                        <img src="https://tractorbumper.com/wp-content/uploads/2021/09/mikevdhphotography2-1024x576.jpg" alt="Massey Ferguson Photography" loading="lazy">
                    </div>
                    <div class="gallery-item">
                        <img src="https://tractorbumper.com/wp-content/uploads/2022/01/massey-ferguson-front-lights-weight.jpg" alt="Massey Ferguson Front Lights Weight" loading="lazy">
                    </div>
                    <div class="gallery-item">
                        <img src="https://tractorbumper.com/wp-content/uploads/2022/01/masseyferguson-frontschutz-markierung-beleuchtung.jpg" alt="Massey Ferguson Frontschutz Markierung Beleuchtung" loading="lazy">
                    </div>
                    <div class="gallery-item">
                        <img src="https://tractorbumper.com/wp-content/uploads/2022/01/massey-ferguson-tractor-bumper-1024x550.jpg" alt="Massey Ferguson Tractor Bumper" loading="lazy">
                    </div>
                    <div class="gallery-item">
                        <img src="https://tractorbumper.com/wp-content/uploads/2022/01/massey-ferguson-black-safety-weight-tractorbumper-mass.jpg" alt="Massey Ferguson Black Safety Weight" loading="lazy">
                    </div>
                    <div class="gallery-item">
                        <img src="https://tractorbumper.com/wp-content/uploads/2022/01/masseyferguson-frontbumper-frontweight.jpg" alt="Massey Ferguson Frontbumper Frontweight" loading="lazy">
                    </div>
                </div>

                <div class="divider"></div>

                <div class="shop-section">
                    <img src="https://tractorbumper.com/wp-content/uploads/2024/05/agribumper_massey-ferguson.jpg" alt="Agribumper Massey Ferguson">
                    <br>
                    <a href="{{ route('products') }}" class="btn-shop">View MF bumpers in our shop</a>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection
