@extends('layout.template')

@section('contenu')

    <style>
        /* Réduction de la taille des images */
        .wp-block-gallery img {
            max-height: 300px;
            object-fit: cover;
            width: 100%;
        }
        
        /* Espacement */
        .wp-block-spacer {
            margin-bottom: 50px;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .wp-block-gallery img {
                max-height: 200px;
            }
        }
    </style>

    <!-- Breadcrumb Section Start -->
    <div class="section">
        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-light">
            <div class="container-fluid">
                <div class="breadcrumb-content text-center">
                    <h1 class="title">Why TractorBumper?</h1>
                    <ul>
                        <li>
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="active">Why</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End -->
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Why Content Section Start -->
    <section class="content section section-margin">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="text-center" style="font-size:24px">
                        Tractorrbumper is: safety, design and practical use. TractorrBumper increases the visibility of the width of tractors, helps to shield the wheels and increases the appreciation of other road users. A tough look with marking, lighting and a perfect finish.
                    </p>

                    <div class="wp-block-spacer"></div>

                    <div class="row mb-5">
                        <div class="col-md-4 mb-3">
                            <figure class="wp-block-gallery">
                                <a href="https://tractorbumper.com/wp-content/uploads/2020/12/trekker-gadget-tractor-bumper-breedtemarkering-lights-led-1024x666.png" target="_blank">
                                    <img decoding="async" src="https://tractorbumper.com/wp-content/uploads/2020/12/trekker-gadget-tractor-bumper-breedtemarkering-lights-led-1024x666.png" alt="Tractor bumper lights" class="img-fluid">
                                </a>
                            </figure>
                        </div>

                        <div class="col-md-4 mb-3">
                            <figure class="wp-block-gallery">
                                <a href="https://tractorbumper.com/wp-content/uploads/2020/12/frontgewicht-tractor-frontschutz-unterfahrschutz-safetybumper-1024x681.jpg" target="_blank">
                                    <img decoding="async" src="https://tractorbumper.com/wp-content/uploads/2020/12/frontgewicht-tractor-frontschutz-unterfahrschutz-safetybumper-1024x681.jpg" alt="Safety bumper" class="img-fluid">
                                </a>
                            </figure>
                        </div>

                        <div class="col-md-4 mb-3">
                            <figure class="wp-block-gallery">
                                <a href="https://tractorbumper.com/wp-content/uploads/2020/12/veilig-landbouwverkeer-breedtemarkering-breedteverlichting-trekker-bumper-verlichting-1024x681.jpg" target="_blank">
                                    <img decoding="async" src="https://tractorbumper.com/wp-content/uploads/2020/12/veilig-landbouwverkeer-breedtemarkering-breedteverlichting-trekker-bumper-verlichting-1024x681.jpg" alt="Tractor bumper lighting" class="img-fluid">
                                </a>
                            </figure>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-6 mb-4">
                            <h3>Visibility</h3>
                            <p>The Standard tractor lighting does not indicate the full width of a tractor. The width lamps of a tractor may, according to legislation, be positioned 40cm from the outside of a tractor, The tractor is almost 1 meter wider in total than the lighting of the tractor indicates! Clearly lights indicating the width of the tractor are missing without tractor bumper.</p>
                            <p>It is difficult for motorists, cyclists and pedestrians to recognize a tractor and to estimate its width. The width lighting, contour lighting, red and white marking and marking poles of the TractorBumper increase the visibility of the width of tractors. Other road users has the experience of faster and better vehicle recognition.</p>
                        </div>

                        <div class="col-md-6 mb-4">
                            <h3>Security</h3>
                            <p>In addition, the Tractor bumper helps to shield the wheels from the front and side. In the case of a frontal or sideways collision, the streamlined shape of the bumper will help to increases the collision effects between the tractor's front wheels and other road users. Another feature of Tractorbumper is being able to adjust the height of the bumper with the front linkage. This allows you to drive with a bumper at the legally determined 40 cm height. Road to bottom bumper. This is the height of the bumper of a car.</p>

                            <h3 class="mt-4">Practical use</h3>
                            <p>A Tractor bumper also has even more functionality like the integrated storage box and an optional frontweight. A standard frontweight is replaced by a safe frontweight, the <a href="{{ route('products') }}" title="Safetyweight">Safetyweight</a> models.</p>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-6 mb-4">
                            <div class="ratio ratio-16x9">
                                <iframe src="https://www.youtube.com/embed/Zs15dd8mhiI" frameborder="0" allowfullscreen allow="encrypted-media; picture-in-picture"></iframe>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="ratio ratio-16x9">
                                <iframe src="https://www.youtube.com/embed/oCpLX4iLVdg" frameborder="0" allowfullscreen allow="encrypted-media; picture-in-picture"></iframe>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col text-center">
                            <a class="btn btn-lg btn-warning text-dark fw-bold" href="{{ route('products') }}">
                                See here our products in our webshop.
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Why Content Section End -->

@endsection
