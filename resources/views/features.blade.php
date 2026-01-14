@extends('layout.template')

@section('contenu')

    <style>
        /* Réduction de la taille des images principales */
        .kenmerk img {
            max-height: 250px;
            object-fit: cover;
        }
        
        /* Réduction de la taille des images rondes */
        .overige-eigenschappen img.rounded-circle {
            width: 120px;
            height: 120px;
            object-fit: cover;
        }
        
        /* Image centrale features */
        .fronthef img {
            max-height: 400px;
            object-fit: cover;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .kenmerk img {
                max-height: 200px;
            }
            
            .overige-eigenschappen img.rounded-circle {
                width: 100px;
                height: 100px;
            }
            
            .fronthef img {
                max-height: 300px;
            }
        }
    </style>

    <!-- Breadcrumb Section Start -->
    <div class="section">
        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-light">
            <div class="container-fluid">
                <div class="breadcrumb-content text-center">
                    <h1 class="title">Features</h1>
                    <ul>
                        <li>
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="active">Features</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End -->
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Features Content Section Start -->
    <section class="content section section-margin">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <p class="pl-md-5 pr-md-5">
                        <p style="font-size:24px">Our bumpers are equipped with hinged side panels. This construction is patented (<a href="https://patentimages.storage.googleapis.com/b2/4c/ee/8c35c42ee833a6/EP2815928A1.pdf" target="_blank" rel="noopener" title="">Patent Nr.: EP2815928A1</a>) to keep this construction unique. Hinged side panels have the following advantages:</p>
                    </p>
                </div>
            </div>
            
            <div class="row pt-5 pb-5 text-center draaicirkel">
                <div class="col-md-4 mb-4">
                    <div class="kenmerk">
                        <img class="w-100 img-fluid" src="https://tractorbumper.com/wp-content/themes/tractor-bumper/images/img-draaicirkel.jpg" alt="Turning circle redused">
                        <div class="kenmerk-tekst mt-3">
                            <h3>Turning circle redused</h3>
                            <p>By adjusting the side parts, the turning circle will be reduced.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="kenmerk">
                        <img class="w-100 img-fluid" src="https://tractorbumper.com/wp-content/themes/tractor-bumper/images/img-beveiligd.jpg" alt="Protected when driving backwards">
                        <div class="kenmerk-tekst mt-3">
                            <h3>Protected when driving backwards</h3>
                            <p>Side panel rotates forward (shear-bolt) when hitting obstacle while reversing.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="kenmerk">
                        <img class="w-100 img-fluid" src="https://tractorbumper.com/wp-content/themes/tractor-bumper/images/img-afgeschermd.jpg" alt="Side shielded">
                        <div class="kenmerk-tekst mt-3">
                            <h3>Side shielded</h3>
                            <p>More side protection by reducing space between wheels and bumper.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row mt-5 mb-5">
                <div class="col-12">
                    <div class="alignfull fronthef">
                        <img class="img-fluid w-100" src="https://tractorbumper.com/wp-content/themes/tractor-bumper/images/img-kenmerken.jpg" alt="Tractorbumper">
                    </div>
                </div>
            </div>
            
            <div class="row eigenschappen-titel mt-5 mb-4">
                <div class="col-12 text-center">
                    <h2>Other features</h2>
                </div>
            </div>
            
            <div class="row text-center overige-eigenschappen justify-content-center">
                <div class="col-6 col-lg-2 mb-4">
                    <img class="rounded-circle shadow mb-3" src="https://tractorbumper.com/wp-content/themes/tractor-bumper/images/eigenschap-reflectie.jpg" alt="Red-white panels">
                    <p class="mt-3">Red-white panels according to legislation (ECE-104)</p>
                </div>
                <div class="col-6 col-lg-2 mb-4">
                    <img class="rounded-circle shadow mb-3" src="https://tractorbumper.com/wp-content/themes/tractor-bumper/images/eigenschap-led.jpg" alt="Flexible LED">
                    <p class="mt-3">Flexible LED outside markers</p>
                </div>
                <div class="col-6 col-lg-2 mb-4">
                    <img class="rounded-circle shadow mb-3" src="https://tractorbumper.com/wp-content/themes/tractor-bumper/images/eigenschap-richting.jpg" alt="LED contour lighting">
                    <p class="mt-3">LED contour lighting + LED direction-indicators</p>
                </div>
                <div class="col-6 col-lg-2 mb-4">
                    <img class="rounded-circle shadow mb-3" src="https://tractorbumper.com/wp-content/themes/tractor-bumper/images/eigenschap-markering.jpg" alt="Guide poles">
                    <p class="mt-3">Guide poles.</p>
                </div>
                <div class="col-6 col-lg-2 mb-4">
                    <img class="rounded-circle shadow mb-3" src="https://tractorbumper.com/wp-content/themes/tractor-bumper/images/eigenschap-fronthef.jpg" alt="Universal">
                    <p class="mt-3">Universal for front-lift tractors</p>
                </div>
                
                <div class="col-6 col-lg-2 mb-4">
                    <img class="rounded-circle shadow mb-3" src="https://tractorbumper.com/wp-content/themes/tractor-bumper/images/eigenschap-aankoppelen.jpg" alt="Easy to connect">
                    <p class="mt-3">Easy to connect</p>
                </div>
                <div class="col-6 col-lg-2 mb-4">
                    <img class="rounded-circle shadow mb-3" src="https://tractorbumper.com/wp-content/themes/tractor-bumper/images/eigenschap-stralen.jpg" alt="Powder coated">
                    <p class="mt-3">All parts are blasted, primed and powder coated</p>
                </div>
                <div class="col-6 col-lg-2 mb-4">
                    <img class="rounded-circle shadow mb-3" src="https://tractorbumper.com/wp-content/themes/tractor-bumper/images/eigenschap-afstellen.jpg" alt="Adjust side panels">
                    <p class="mt-3">Side panels easy to adjust</p>
                </div>
                <div class="col-6 col-lg-2 mb-4">
                    <img class="rounded-circle shadow mb-3" src="https://tractorbumper.com/wp-content/themes/tractor-bumper/images/eigenschap-design.jpg" alt="Nice design">
                    <p class="mt-3">Nice design in colour of your tractor</p>
                </div>
                <div class="col-6 col-lg-2 mb-4">
                    <img class="rounded-circle shadow mb-3" src="https://tractorbumper.com/wp-content/themes/tractor-bumper/images/eigenschap-logo.jpg" alt="Own logo">
                    <p class="mt-3">Own logo</p>
                </div>
            </div>
            
            <div class="row mt-5">
                <div class="col">
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/YCJSCMx7bCk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Features Content Section End -->

@endsection
