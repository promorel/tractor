@extends('layout.template')

@section('contenu')

    <style>
        .about_content h2.title {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
        }

        .about_content h3.sub-title {
            font-size: 1.5rem;
            color: #666;
            margin-bottom: 1.5rem;
        }

        .about_thumb img {
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .feature .icon img {
            max-width: 80px;
            height: auto;
        }

        .single-service {
            padding: 20px;
        }

        .single-service h2.title {
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
            max-width: 100%;
            background: #000;
            border-radius: 10px;
            margin-bottom: 2rem;
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .intro-text {
            font-size: 1.25rem;
            line-height: 1.8;
            text-align: center;
            margin-bottom: 3rem;
            color: #333;
        }

        .btn-yellow {
            background-color: #ffc107;
            color: #000;
            padding: 12px 30px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-yellow:hover {
            background-color: #ffb300;
            color: #000;
            transform: translateY(-2px);
        }
    </style>

   
    <!-- Breadcrumb Section Start -->
    <div class="section">
        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-light">
            <div class="container-fluid">
                <div class="breadcrumb-content text-center">
                    <h1 class="title">About us</h1>
                    <ul>
                        <li>
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="active">About us</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End -->
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Introduction Section Start -->
    <div class="section section-margin overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="intro-text">
                        In 2013 we started developing tractor bumpers because we felt that the road safety of tractors at
                        the front could be improved. We gradually discovered that, in addition to safety, there was a great
                        demand for more functionality, such as a storage box and extra weight.
                    </p>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-lg-8 offset-lg-2">
                    <div class="video-container">
                        <iframe title="Fons TractorBumper" src="https://www.youtube.com/embed/ib3zycOdQMs" frameborder="0"
                            allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Introduction Section End -->

    <!-- Made in Holland Section Start -->
    <div class="section section-margin overflow-hidden">
        <div class="container">
            <div class="row mb-n6">
                <div class="col-lg-6 align-self-center mb-6">
                    <div class="about_content">
                        <h2 class="title">Made in the Netherlands & France</h2>
                        <h3 class="sub-title">Designed and produced with great attention in the Netherlands and France</h3>
                        <p>For many years now, we have focused on bumpers for tractors, both in terms of design and
                            production. Everything is designed and produced with great attention in the Netherlands and France. In
                            recent years we have continued to develop our product, with safety, design and practical use as
                            spearheads.</p>

                        <h3 class="sub-title mt-4">Unique design</h3>
                        <p>The patent-protected side panels allow the bumper to be optimally adjusted to any type and brand
                            of tractor. Reversing security makes this product also unique. Tractor bumpers are now on the
                            road in more than 20 countries, which contribute to safer agricultural and construction traffic.
                        </p>

                        <div class="mt-4">
                            <a href="{{ route('features') }}" class="btn-yellow">Check out our features</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-6">
                    <div class="about_thumb">
                        <img class="fit-image w-100"
                            src="https://tractorbumper.com/wp-content/uploads/2023/07/TractorBumper_Family.jpg"
                            alt="TractorBumper Family" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Made in Holland Section End -->

    <!-- Call to Action Section Start -->
    <div class="section section-padding" style="background-color: #ffc107;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 1.5rem;">Ready to Improve Your Tractor's
                        Safety?</h2>
                    <p style="font-size: 1.25rem; margin-bottom: 2rem;">Explore our range of TractorBumpers and find the
                        perfect fit for your needs.</p>
                    <a href="{{ route('products') }}" class="btn btn-dark btn-lg"
                        style="padding: 15px 40px; font-weight: 600;">View Our Products</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Call to Action Section End -->

    <!-- Mission & Vision Section Start -->
    <div class="section section-margin">
        <div class="container">
            <div class="row mb-n6">
                <div class="col-lg-4 col-md-6 text-center mb-6">
                    <!-- Single Service Start -->
                    <div class="single-service">
                        <h2 class="title">What We Do</h2>
                        <p>We develop and manufacture innovative tractor bumpers that improve road safety and add
                            functionality. Our products are designed to protect both the tractor and other road users, while
                            offering practical solutions like storage and weight distribution.</p>
                    </div>
                    <!-- Single Service End -->
                </div>
                <div class="col-lg-4 col-md-6 text-center mb-6">
                    <!-- Single Service Start -->
                    <div class="single-service">
                        <h2 class="title">Our Mission</h2>
                        <p>To make agricultural and construction traffic safer worldwide through innovative bumper
                            solutions. We strive to continuously improve our products based on real-world feedback, ensuring
                            that safety, design and practical use remain our core values.</p>
                    </div>
                    <!-- Single Service End -->
                </div>
                <div class="col-lg-4 col-md-6 text-center mb-6">
                    <!-- Single Service Start -->
                    <div class="single-service">
                        <h2 class="title">Our History</h2>
                        <p>Since 2013, we have been developing tractor bumpers with a focus on safety. What started as a
                            safety initiative has grown into a comprehensive product range serving customers in over 20
                            countries, combining protection with functionality.</p>
                    </div>
                    <!-- Single Service End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Mission & Vision Section End -->

@endsection