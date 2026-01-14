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
                <h1 class="title">Case IH Photo Gallery</h1>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>Photo's</li>
                    <li class="active">Case IH</li>
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
                        <img src="https://tractorbumper.com/wp-content/uploads/2021/09/case-ih-frontbumper-frontgewicht-1.jpg" alt="Case IH Front Bumper Frontgewicht" loading="lazy">
                    </div>
                    <div class="gallery-item">
                        <img src="https://tractorbumper.com/wp-content/uploads/2021/09/traktor-bumper-caseih.jpg" alt="Traktor Bumper Case IH" loading="lazy">
                    </div>
                    <div class="gallery-item">
                        <img src="https://tractorbumper.com/wp-content/uploads/2021/09/caseih-frontgewicht-casedesign-1024x683.jpg" alt="Case IH Frontgewicht Case Design" loading="lazy">
                    </div>
                    <div class="gallery-item">
                        <img src="https://tractorbumper.com/wp-content/uploads/2021/09/Case-IH-magnum-ballast-weights-1024x576.jpg" alt="Case IH Magnum Ballast Weights" loading="lazy">
                    </div>
                    <div class="gallery-item">
                        <img src="https://tractorbumper.com/wp-content/uploads/2021/09/agribumper-case-ih-frontgewicht-tractor-1024x763.jpg" alt="Agribumper Case IH Frontgewicht Tractor" loading="lazy">
                    </div>
                    <div class="gallery-item">
                        <img src="https://tractorbumper.com/wp-content/uploads/2021/09/Case-IH-tool-box-1024x768.jpg" alt="Case IH Tool Box" loading="lazy">
                    </div>
                    <div class="gallery-item">
                        <img src="https://tractorbumper.com/wp-content/uploads/2021/09/Case-IH-tractorbumper.jpg" alt="Case IH Tractor Bumper" loading="lazy">
                    </div>
                    <div class="gallery-item">
                        <img src="https://tractorbumper.com/wp-content/uploads/2021/09/tractorbumper-case-ih.jpg" alt="Tractorbumper Case IH" loading="lazy">
                    </div>
                    <div class="gallery-item">
                        <img src="https://tractorbumper.com/wp-content/uploads/2021/09/case-ih-tractor-staubox-1024x681.jpg" alt="Case IH Tractor Staubox" loading="lazy">
                    </div>
                    <div class="gallery-item">
                        <img src="https://tractorbumper.com/wp-content/uploads/2021/09/case-ih-safety-schutz.jpg" alt="Case IH Safety Schutz" loading="lazy">
                    </div>
                    <div class="gallery-item">
                        <img src="https://tractorbumper.com/wp-content/uploads/2021/09/case-front-safe-tractor-1024x683.jpg" alt="Case Front Safe Tractor" loading="lazy">
                    </div>
                </div>

                <div class="divider"></div>

                <div class="shop-section">
                    <img src="https://tractorbumper.com/wp-content/uploads/2024/05/agribumper_Case.jpg" alt="Agribumper Case IH">
                    <br>
                    <a href="{{ route('products') }}" class="btn-shop">View Case IH bumpers in our shop</a>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection
