@extends('layout.template')

@section('contenu')

    <style>
        /* Réduction de la taille des images de comparaison */
        .comparison-image img {
            max-height: 350px;
            object-fit: cover;
            width: 100%;
        }
        
        /* Réduction de la taille des images de la galerie */
        .wp-block-gallery img {
            max-height: 200px;
            object-fit: cover;
            width: 100%;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .comparison-image img {
                max-height: 250px;
            }
            
            .wp-block-gallery img {
                max-height: 150px;
            }
        }
    </style>

    <!-- Breadcrumb Section Start -->
    <div class="section">
        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-light">
            <div class="container-fluid">
                <div class="breadcrumb-content text-center">
                    <h1 class="title">Crash Test</h1>
                    <ul>
                        <li>
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="active">Crash test</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End -->
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Crash Test Content Section Start -->
    <section class="content section section-margin">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p>With TractorBumper we want to protect the front of the tractor during a collision, so the crumple zone of the car will be used and the tractor does not climb on top of the car. See here the result:</p>

                    <div class="row mt-4 mb-5">
                        <div class="col">
                            <div class="ratio ratio-16x9">
                                <iframe src="https://www.youtube.com/embed/UT3wanvutBU" frameborder="0" allowfullscreen allow="encrypted-media; picture-in-picture"></iframe>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5 mb-5">
                        <div class="col-md-6 mb-4 comparison-image">
                            <p><strong>With TractorBumper:</strong></p>
                            <figure>
                                <img fetchpriority="high" decoding="async" src="https://tractorbumper.com/wp-content/uploads/2024/04/DSC9238-1024x681.jpg" alt="With TractorBumper" class="img-fluid">
                            </figure>
                        </div>

                        <div class="col-md-6 mb-4 comparison-image">
                            <p><strong>Without TractorBumper:</strong></p>
                            <figure>
                                <img decoding="async" src="https://tractorbumper.com/wp-content/uploads/2024/04/DJI_0633.00_03_05_10.Still018-e1712311970929-1024x691.jpg" alt="Without TractorBumper" class="img-fluid">
                            </figure>
                        </div>
                    </div>

                    <p class="mt-5 mb-4"><strong>Real life accidents:</strong></p>

                    <div class="wp-block-gallery">
                        <div class="row">
                            <div class="col-md-6 col-lg-4 mb-3">
                                <figure>
                                    <a href="https://tractorbumper.com/wp-content/uploads/2024/04/Afbeelding1.jpg" target="_blank">
                                        <img loading="lazy" decoding="async" src="https://tractorbumper.com/wp-content/uploads/2024/04/Afbeelding1.jpg" alt="Accident 1" class="img-fluid">
                                    </a>
                                </figure>
                            </div>

                            <div class="col-md-6 col-lg-4 mb-3">
                                <figure>
                                    <a href="https://tractorbumper.com/wp-content/uploads/2024/04/Afbeelding4.jpg" target="_blank">
                                        <img loading="lazy" decoding="async" src="https://tractorbumper.com/wp-content/uploads/2024/04/Afbeelding4.jpg" alt="Accident 4" class="img-fluid">
                                    </a>
                                </figure>
                            </div>

                            <div class="col-md-6 col-lg-4 mb-3">
                                <figure>
                                    <a href="https://tractorbumper.com/wp-content/uploads/2024/04/Afbeelding5.jpg" target="_blank">
                                        <img loading="lazy" decoding="async" src="https://tractorbumper.com/wp-content/uploads/2024/04/Afbeelding5.jpg" alt="Accident 5" class="img-fluid">
                                    </a>
                                </figure>
                            </div>

                            <div class="col-md-6 col-lg-4 mb-3">
                                <figure>
                                    <a href="https://tractorbumper.com/wp-content/uploads/2024/04/Afbeelding6.jpg" target="_blank">
                                        <img loading="lazy" decoding="async" src="https://tractorbumper.com/wp-content/uploads/2024/04/Afbeelding6.jpg" alt="Accident 6" class="img-fluid">
                                    </a>
                                </figure>
                            </div>

                            <div class="col-md-6 col-lg-4 mb-3">
                                <figure>
                                    <a href="https://tractorbumper.com/wp-content/uploads/2024/04/Afbeelding7.jpg" target="_blank">
                                        <img loading="lazy" decoding="async" src="https://tractorbumper.com/wp-content/uploads/2024/04/Afbeelding7.jpg" alt="Accident 7" class="img-fluid">
                                    </a>
                                </figure>
                            </div>

                            <div class="col-md-6 col-lg-4 mb-3">
                                <figure>
                                    <a href="https://tractorbumper.com/wp-content/uploads/2024/04/Afbeelding8.png" target="_blank">
                                        <img loading="lazy" decoding="async" src="https://tractorbumper.com/wp-content/uploads/2024/04/Afbeelding8.png" alt="Accident 8" class="img-fluid">
                                    </a>
                                </figure>
                            </div>

                            <div class="col-md-6 col-lg-4 mb-3">
                                <figure>
                                    <a href="https://tractorbumper.com/wp-content/uploads/2024/04/Afbeelding9.png" target="_blank">
                                        <img loading="lazy" decoding="async" src="https://tractorbumper.com/wp-content/uploads/2024/04/Afbeelding9.png" alt="Accident 9" class="img-fluid">
                                    </a>
                                </figure>
                            </div>

                            <div class="col-md-6 col-lg-4 mb-3">
                                <figure>
                                    <a href="https://tractorbumper.com/wp-content/uploads/2024/04/Afbeelding3.jpg" target="_blank">
                                        <img loading="lazy" decoding="async" src="https://tractorbumper.com/wp-content/uploads/2024/04/Afbeelding3.jpg" alt="Accident 3" class="img-fluid">
                                    </a>
                                </figure>
                            </div>

                            <div class="col-md-6 col-lg-4 mb-3">
                                <figure>
                                    <a href="https://tractorbumper.com/wp-content/uploads/2024/04/Afbeelding2.jpg" target="_blank">
                                        <img loading="lazy" decoding="async" src="https://tractorbumper.com/wp-content/uploads/2024/04/Afbeelding2.jpg" alt="Accident 2" class="img-fluid">
                                    </a>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Crash Test Content Section End -->

@endsection
