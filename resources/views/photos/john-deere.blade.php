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
                <h1 class="title">John Deere Photo Gallery</h1>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>Photo's</li>
                    <li class="active">John Deere</li>
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
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/09/tracteur-parechoc-john-deere-1-1024x683.jpg" alt="Tracteur Parechoc John Deere" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/09/john-deere-frontweight-markers-lights.jpg" alt="John Deere Frontweight Markers" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/02/john-deere-frontgewicht-bumper.jpg" alt="John Deere Frontgewicht Bumper" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/09/safe-frontweight-john-deere-tractor.jpg" alt="Safe Frontweight John Deere" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/09/john-deere-frontgewichte-markierung.jpg" alt="John Deere Frontgewichte" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/09/lohnunternehmen-johndeere-traktor.jpg" alt="Lohnunternehmen John Deere" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/09/johndeere-tractorbumper-agribumper-1024x683.jpg" alt="John Deere TractorBumper" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/01/John-deere-front-storagebox-lights-1-1024x768.jpg" alt="John Deere Front Storagebox" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/12/lights-front-tractor.jpg" alt="Lights Front Tractor" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/12/john-deere-width-marking-lights.jpg" alt="John Deere Width Marking" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/01/frontweight-john-deere-tractorbumper-2-1024x673.jpg" alt="Frontweight John Deere" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/09/traktor-bumper-john-deere-1.jpg" alt="Traktor Bumper John Deere" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/09/johndeere-safety-weight-tractorbumper-led-blinker-1024x1024.jpg" alt="John Deere Safety Weight" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/12/Johndeere-frontweight-lights.jpg" alt="John Deere Frontweight Lights" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/12/John-deere-safety-frontweight-1-1024x744.jpeg" alt="John Deere Safety Frontweight" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/12/tractor-frontweight-lights-1-1024x683.jpg" alt="Tractor Frontweight Lights" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/01/john-deere-black-rims-frontbumper-lights-768x1024.jpg" alt="John Deere Black Rims" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/01/john-deere-schwarz-frontgewicht-tractor-bumper-576x1024.jpg" alt="John Deere Schwarz" loading="lazy">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Gallery Section End -->

<!-- Divider -->
<div class="divider"></div>

<!-- John Deere Specials Section Start -->
<div class="section section-margin">
    <div class="container">
        <div class="photo-gallery">
            <h2>Specials John Deere</h2>
            <div class="gallery-grid">
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2024/10/frontweight_JD-1024x708.jpg" alt="Frontweight JD" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2024/10/JohnDeere_big-tractor-1024x709.jpg" alt="John Deere Big Tractor" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2024/10/JD_cool-1024x709.jpg" alt="JD Cool" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2024/10/JD_frontweight-1024x709.jpg" alt="JD Frontweight" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2024/10/Kollmer_JohnDeere.png" alt="Kollmer John Deere" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2024/10/Deere_kommunaldienst.jpg" alt="Deere Kommunaldienst" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2024/10/Landtechnik-Murtal-3.jpg" alt="Landtechnik Murtal" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2024/10/safety_JD-1.jpg" alt="Safety JD" loading="lazy">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- John Deere Specials Section End -->

<!-- Shop Section Start -->
<div class="shop-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 mb-4">
                <img src="https://tractorbumper.com/wp-content/uploads/2024/05/agribumper_JD.jpg" alt="Agribumper John Deere" class="img-fluid">
            </div>
            <div class="col-lg-12">
                <a href="{{ route('products') }}" class="btn-shop">View John Deere bumpers in our shop</a>
            </div>
        </div>
    </div>
</div>
<!-- Shop Section End -->

@endsection
