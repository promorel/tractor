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
                <h1 class="title">Fendt Photo Gallery</h1>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>Photo's</li>
                    <li class="active">Fendt</li>
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
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/01/tractor-bumper-safetyweight-1024x681.jpg" alt="Tractor Bumper Safetyweight" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/02/fendt-spare-parts-1024x1024.jpg" alt="Fendt Spare Parts" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2023/03/frontgewicht-fendt-leuchten-1024x681.jpg" alt="Frontgewicht Fendt Leuchten" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/10/tractor-safety-road-fendt-width-marking-lights-led-kopieren-1024x683.jpg" alt="Tractor Safety Road" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/02/frontgewicht-fendt-kaufen-1024x681.jpg" alt="Frontgewicht Fendt" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/02/ballastierung-beleuchtung-breitemarkierung-fendt.jpg" alt="Ballastierung Beleuchtung" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/10/Breitemarkierung-traktor-accesoires-LED-fendt-2-1024x683.jpg" alt="Breitemarkierung Traktor" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/02/fendt-agribumper-kaufen-1024x676.jpg" alt="Fendt Agribumper" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/02/fendt-frontweight-lights-marking-design.jpg" alt="Fendt Frontweight Design" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/10/breite-markierung-traktor-leuchten-traktor-1024x683.jpg" alt="Breite Markierung Traktor" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/10/Fendt-frontweight-design-lights-1.jpg" alt="Fendt Frontweight" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/10/Fendt-stauraumbox-konturbeleuchtung-frontgewicht-1-1024x768.jpg" alt="Fendt Stauraumbox" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/10/width-lighting-tractor-fendt-front-weight-heavy.jpg" alt="Width Lighting Tractor" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/10/widthmarking-front-tractor-fendt-1.jpg" alt="Widthmarking Front" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/10/traktor-breite-sicherheit-verkehr-fendt-frontgewichte-2.jpg" alt="Traktor Breite Sicherheit" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/10/tractorbumper-fendt-frontweight.jpg" alt="TractorBumper Fendt" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/10/tractor-bumper-fendt-1024x291.jpg" alt="Tractor Bumper Fendt" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/10/Fendt-toolbox-front-1024x683.jpg" alt="Fendt Toolbox Front" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/10/Traktor-breitemarkierung-fendt-1024x576.jpg" alt="Traktor Breitemarkierung" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/02/frontgewicht-fendt.jpg" alt="Frontgewicht Fendt" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/10/Fendt-frontschutz-1024x768.jpg" alt="Fendt Frontschutz" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/02/fendt-frontweight-marking-1024x768.jpg" alt="Fendt Frontweight Marking" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/09/tracteur-parechoc-poids-securite-1024x681.jpg" alt="Tracteur Parechoc" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2020/12/gewicht-fendt-trekker-gewichtsblok.jpg" alt="Gewicht Fendt Trekker" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2020/12/gewichtsblock-traktor-fendt-frontgewicht-1024x575.jpg" alt="Gewichtsblock Traktor" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2020/12/tractorbumper-fendt-frontgewicht.jpg" alt="TractorBumper Fendt Frontgewicht" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2020/12/fendt-blauw-tractorbumper.jpg" alt="Fendt Blauw" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2020/12/fendt-zwart-trekkerbumper.jpg" alt="Fendt Zwart" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/02/fendt1042-front-weight.jpg" alt="Fendt 1042 Front Weight" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/09/fendt-bumper-1024x683.jpg" alt="Fendt Bumper" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/09/fendt-unterfahrschutz-1024x683.jpg" alt="Fendt Unterfahrschutz" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2020/12/fendt-trekkerbumper-1-1024x412.jpg" alt="Fendt Trekkerbumper" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/06/67274485_860264517674958_8115390875304984576_o-1-1024x682.jpg" alt="Fendt Photo 1" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/06/82230632_998726220495453_5394182257499963392_n-1-1024x498.jpg" alt="Fendt Photo 2" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/06/87057272_1581961598620385_4540306492351315968_n-1-1024x682.jpg" alt="Fendt Photo 3" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/09/agribumper-tractorbumper-frontbumper-tractor-fendt.jpg" alt="Agribumper Fendt" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/09/traktor-schutz-fendt-1024x521.jpg" alt="Traktor Schutz Fendt" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/02/cargobox-tractor.jpg" alt="Cargobox Tractor" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/02/fendt-parechoc-tracteur-768x1024.jpg" alt="Fendt Parechoc" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/09/unterfahrschutz-fendt-traktor-1024x683.jpg" alt="Unterfahrschutz Fendt" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/09/tractorshield-fendt-1024x681.jpg" alt="Tractorshield Fendt" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/09/traktorshield-fendt-1024x681.jpg" alt="Traktorshield Fendt" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/12/Fendt-frontweight-safety-lights.jpg" alt="Fendt Frontweight Safety" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2021/12/Fendt-frontschutz.jpg" alt="Fendt Frontschutz" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/02/tractor-mass.jpg" alt="Tractor Mass" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/02/fendt-front-storagebox.jpg" alt="Fendt Front Storagebox" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/01/fendt-box-front-1024x576.jpg" alt="Fendt Box Front" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/01/fendt-breitemarkierung-leuchten-front-819x1024.jpg" alt="Fendt Breitemarkierung" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/01/fendt-front-toolbox-lights-1024x683.jpg" alt="Fendt Front Toolbox" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/01/fendt-frontweight-adjustable-756x1024.jpeg" alt="Fendt Frontweight Adjustable" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/02/fendt-cargobox.jpg" alt="Fendt Cargobox" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/01/tractor-front-toolbox-marking-768x1024.jpg" alt="Tractor Front Toolbox" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/01/tractor-lights-front-1024x1024.jpg" alt="Tractor Lights Front" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/01/traktor-breitemarkierung-768x1024.jpg" alt="Traktor Breitemarkierung" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/01/fendt-lights-950x1024.jpg" alt="Fendt Lights" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/01/traktor-staubox-1024x1024.jpg" alt="Traktor Staubox" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/01/tractor-frontweight-design-2-1024x569.jpg" alt="Tractor Frontweight Design" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/02/fendt-front-box-1024x549.jpg" alt="Fendt Front Box" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/02/fendt-box.jpg" alt="Fendt Box" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/02/fendt-forestry-equipment-1024x894.jpg" alt="Fendt Forestry Equipment" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/01/fendt-safety-front-lights-1024x1024.jpg" alt="Fendt Safety Front Lights" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/01/tractor-front-safety-marking-lights-1024x768.jpeg" alt="Tractor Front Safety" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/01/forestry-front-bumper-fendt.jpg" alt="Forestry Front Bumper" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/01/heavy-frontweight-fendt-1024x1024.jpg" alt="Heavy Frontweight Fendt" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/02/tractor-bumper-fendt-1024x683.jpg" alt="Tractor Bumper Fendt" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2022/02/front-marking-weight-safetyweight-fendt.jpeg" alt="Front Marking Weight" loading="lazy">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Gallery Section End -->

<!-- Divider -->
<div class="divider"></div>

<!-- Fendt Specials Section Start -->
<div class="section section-margin">
    <div class="container">
        <div class="photo-gallery">
            <h2>Fendt Specials</h2>
            <div class="gallery-grid">
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2024/10/fendt_white_Weis-1024x709.jpg" alt="Fendt White" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2024/10/fendt-toolbox-1024x709.jpg" alt="Fendt Toolbox" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2024/10/fendt_blau_blue-1024x709.jpg" alt="Fendt Blue" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2024/10/fendt_weis_wit-1024x709.jpg" alt="Fendt Weis" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2024/10/frontgewicht_fendt.jpg" alt="Frontgewicht Fendt" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2024/10/gubbels_fendt-1024x709.jpg" alt="Gubbels Fendt" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2024/10/fendt_special.jpg" alt="Fendt Special" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2024/10/black_beauty_frontweight.jpg" alt="Black Beauty Frontweight" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2024/10/fendt_beauty_bumper-1024x709.jpg" alt="Fendt Beauty Bumper" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2024/10/fendt_black_bumper-1024x709.jpg" alt="Fendt Black Bumper" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2024/10/fendt_black_agribumper-1024x710.jpg" alt="Fendt Black Agribumper" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2024/10/fendt_grun.jpg" alt="Fendt Grün" loading="lazy">
                </div>
                <div class="gallery-item">
                    <img src="https://tractorbumper.com/wp-content/uploads/2024/10/fendt_rot_rood-1024x709.jpg" alt="Fendt Rot" loading="lazy">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fendt Specials Section End -->

<!-- Shop Section Start -->
<div class="shop-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 mb-4">
                <img src="https://tractorbumper.com/wp-content/uploads/2024/05/agribumper_fendt.jpg" alt="Agribumper Fendt" class="img-fluid">
            </div>
            <div class="col-lg-12">
                <a href="{{ route('products') }}" class="btn-shop">View Fendt bumpers in our shop</a>
            </div>
        </div>
    </div>
</div>
<!-- Shop Section End -->

@endsection
