@extends('layout.template')

@section('contenu')

    <!-- ===========================
         Hero/Intro Slider Section
    ============================ -->
    <div class="section" style="margin-bottom: 30px; !important;">
        <div class="hero-slider">
            <div class="swiper-container">
                <div class="swiper-wrapper">

                    <div class="hero-slide-item-two swiper-slide">
                        <div class="hero-slide-bg">
                            <img src="{{ asset('assets/images/slider/FB-scaled.jpg') }}" alt="Safe On The Road" />
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="hero-slide-content col-lg-8 col-xl-6 col-12">
                                    <h2 class="title">
                                        SAFETY<br />
                                        ON THE<br />
                                        ROAD
                                    </h2>
                                    <p>Tractorbumper makes traffic safer, for you and your fellow road users. With lighting, marking and shielding.</p>
                                    <a href="{{ route('why') }}" class="btn btn-lg btn-primary btn-hover-dark">Why a bumper?</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hero-slide-item-two swiper-slide">
                        <div class="hero-slide-bg">
                            <img src="{{ asset('assets/images/slider/Claas-1-scaled.jpg') }}" alt="Premium Quality" />
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="hero-slide-content col-lg-8 col-xl-6 col-12 text-lg-center text-left">
                                    <h2 class="title">
                                        Brands <br />
                                    </h2>
                                    <p>Can be supplied in tractor or company colors with your own company logo on the front</p>
                                    <a href="{{ route('photos.fendt') }}" class="btn btn-lg btn-primary btn-hover-dark">What is your Tractor brand?</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hero-slide-item-two swiper-slide">
                        <div class="hero-slide-bg">
                            <img src="{{ asset('assets/images/slider/Misschien2-scaled.jpg') }}" alt="All Tractor Brands" />
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="hero-slide-content col-lg-8 col-xl-6 col-12 text-lg-center text-left">
                                    <h2 class="title">
                                        Different <br />
                                        Models
                                    </h2>
                                    <p>Combine safety with more functionality such as storage box and / or weight?</p>
                                    <a href="{{ route('products') }}" class="btn btn-lg btn-primary btn-hover-dark">View our products </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hero-slide-item-two swiper-slide">
                        <div class="hero-slide-bg">
                            <img src="{{ asset('assets/images/slider/NewHolland2.jpg') }}" alt="Expert Support" />
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="hero-slide-content col-lg-8 col-xl-6 col-12 text-lg-center text-left">
                                    <h2 class="title">
                                        Adjustable  <br />
                                        Side Panels
                                    </h2>
                                    <p>The rotatable and width-adjustable side parts provide better protection and maneuverability. Also secured when driving reversing, curious?</p>
                                    <a href="{{ route('features') }}" class="btn btn-lg btn-primary btn-hover-dark">Unique features</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Swiper Pagination -->
                <div class="swiper-pagination d-md-none"></div>

                <!-- Swiper Navigation Controls -->
                <div class="home-slider-prev swiper-button-prev main-slider-nav d-md-flex d-none"><i class="pe-7s-angle-left"></i></div>
                <div class="home-slider-next swiper-button-next main-slider-nav d-md-flex d-none"><i class="pe-7s-angle-right"></i></div>

            </div>
        </div>
    </div>
    <!-- Hero/Intro Slider End -->

    <!-- ===========================
         Features Section
    ============================ -->
    <div class="section">
        <div class="container">
            <div class="feature-wrap">
                <div class="row row-cols-lg-4 row-cols-xl-auto row-cols-sm-2 row-cols-1 justify-content-between">

                    <!-- Feature: Free Shipping -->
                    <div class="col mb-5" data-aos="fade-up" data-aos-delay="300">
                        <div class="feature">
                            <div class="icon text-primary align-self-center">
                                <i class="pe-7s-lock" style="font-size: 48px; color: black;"></i>
                            </div>
                            <div class="content">
                                <h5 class="title">Secure Payment</h5>
                                <p>Bank card, check or wire transfer</p>
                            </div>
                        </div>
                    </div>

                    <!-- Feature: Support 24/7 -->
                    <div class="col mb-5" data-aos="fade-up" data-aos-delay="500">
                        <div class="feature">
                            <div class="icon text-primary align-self-center">
                                <i class="pe-7s-home" style="font-size: 48px; color: black;"></i>
                            </div>
                            <div class="content">
                                <h5 class="title">95% Products in Stock</h5>
                                <p>2 years warranty after-sales service</p>
                            </div>
                        </div>
                    </div>

                    <!-- Feature: Eco-friendly Products -->
                    <div class="col mb-5" data-aos="fade-up" data-aos-delay="700">
                        <div class="feature">
                            <div class="icon text-primary align-self-center">
                                <i class="pe-7s-global" style="font-size: 48px; color: black;"></i>
                            </div>
                            <div class="content">
                                <h5 class="title">Eco-friendly Products</h5>
                                <p>Expertise and products of excellence</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Features Section End -->

    <!-- ===========================
         Banners Section
    ============================ -->
    <div class="section section-margin" style="background: linear-gradient(135deg, #FDC830 0%, #311101ff 100%); padding: 40px 0; margin-top: 0px;">
        <div class="container">
            <div class="row mb-n6">

                <!-- Banner: Different Models -->
                <div class="col-lg-4 col-md-6 col-12 mb-6">
                    <div class="banner" data-aos="fade-up" data-aos-delay="300">
                        <div class="banner-image">
                            <a href="{{ route('products') }}" class="blok-img"><img src="{{ asset('assets/images/banner/blok-model.jpg') }}" alt="Different Models"></a>
                        </div>
                        <div class="info">
                            <div class="small-banner-content">
                                <h4 class="sub-title">Different</h4>
                                <h3 class="title">Models</h3>
                                <p><a href="{{ route('products') }}" class="btn btn-dark btn-sm">Read more</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Banner: Visit Webshop -->
                <div class="col-lg-4 col-md-6 col-12 mb-6">
                    <div class="banner" data-aos="fade-up" data-aos-delay="500">
                        <div class="banner-image">
                            <a href="{{ route('products') }}" class="blok-img"><img src="{{ asset('assets/images/banner/blok-webshop.jpg') }}" alt="Visit Webshop"></a>
                        </div>
                        <div class="info">
                            <div class="small-banner-content">
                                <h4 class="sub-title">Visit</h4>
                                <h3 class="title">Webshop</h3>
                                <p><a href="{{ route('products') }}" class="btn btn-dark btn-sm">Read more</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Banner: For all Brands -->
                <div class="col-lg-4 col-md-6 col-12 mb-6">
                    <div class="banner" data-aos="fade-up" data-aos-delay="700">
                        <div class="banner-image">
                            <a href="{{ route('photos.fendt') }}" class="blok-img"><img src="{{ asset('assets/images/banner/blok-merken.jpg') }}" alt="For all Brands"></a>
                        </div>
                        <div class="info">
                            <div class="small-banner-content">
                                <h4 class="sub-title">For all</h4>
                                <h3 class="title">Brands</h3>
                                <p><a href="{{ route('photos.fendt') }}" class="btn btn-dark btn-sm">Read more</a></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Banners Section End -->

    <!-- ===========================
         About Section
    ============================ -->
    <div class="section section-margin overflow-hidden"  style="margin-top: 0px; !important;">
        <div class="container">
            <div class="row mb-n6">

                <!-- About Content Start -->
                <div class="col-lg-6 align-self-center mb-6" data-aos="fade-right" data-aos-delay="600">
                    <div class="about_content">
                        <h4 class="sub-title">Safety, design and practical use</h4>
                        <h2 class="title" style="font-size: 70px;">Tractor Bumper</h2>
                        <p style="border-left: 5px solid #d4af37; padding-left: 20px; margin-bottom: 20px; font-size: 25px; font-weight: 500;">
                            Tractor bumper take care of your safety and that of other road user, but also stands for design and practical use.
                            <br>
                        </p>
                        <p style="font-size: 20px;">
                            TractorBumper increases the visibility of the width of tractors, helps to shield the wheels and increases the appreciation of other road users. A tough look with marking, lighting and a perfect finish.
                        </p>
                        <a href="{{ route('features') }}" class="btn btn-primary btn-hover-dark">Read more</a>
                    </div>
                </div>
                <!-- About Content End -->

                <!-- About Video Start -->
                <div class="col-lg-6 mb-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="about_thumb" style="overflow: hidden; transition: all 0.3s ease; border-radius: 30px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);" onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 8px 25px rgba(0,0,0,0.2)';" onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.1)';">
                        <iframe width="100%" height="600" src="https://www.youtube.com/embed/YCJSCMx7bCk" title="Tractor Bumper Video" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                    </div>
                </div>
                <!-- About Video End -->

            </div>
        </div>
    </div>
    <!-- About Section End -->


    <!-- Banner Fullwidth Start -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up" data-aos-delay="300">
                    <div class="banner">
                        <div class="banner-image">
                            <a href="https://tractorbumper.com/wp-content/uploads/2020/11/Brochure2019_English_digital.pdf" target="_blank">
                                <img src="{{ asset('assets/images/banner/brochure.png') }}" alt="Banner">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Fullwidth End -->

    <!-- TikTok Section Start -->
    <div class="section design" style="padding: 60px 0; background: linear-gradient(135deg, #FDC830 0%, #311101ff 100%);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center mb-5" style="font-size: 2.5rem; font-weight: bold;">Follow us on TikTok</h2>
                    
                    <div class="row justify-content-center">
                        <!-- TikTok Video 1 -->
                        <div class="col-12 col-md-6 col-lg-3 mb-4">
                            <div class="tiktok-embed" style="border-radius: 15px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); height: 500px;">
                                <blockquote class="tiktok-embed" cite="https://www.tiktok.com/@materiel.agricole4/video/7579719084724587798" data-video-id="7579719084724587798" style="max-width: 100%; min-width: 100%; height: 100%;">
                                    <section>
                                        <a target="_blank" href="https://www.tiktok.com/@materiel.agricole4/video/7579719084724587798">@materiel.agricole4</a>
                                    </section>
                                </blockquote>
                            </div>
                        </div>
                        
                        <!-- TikTok Video 2 -->
                        <div class="col-12 col-md-6 col-lg-3 mb-4">
                            <div class="tiktok-embed" style="border-radius: 15px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); height: 500px;">
                                <blockquote class="tiktok-embed" cite="https://www.tiktok.com/@materiel.agricole4/video/7586390410667281686" data-video-id="7586390410667281686" style="max-width: 100%; min-width: 100%; height: 100%;">
                                    <section>
                                        <a target="_blank" href="https://www.tiktok.com/@materiel.agricole4/video/7586390410667281686">@materiel.agricole4</a>
                                    </section>
                                </blockquote>
                            </div>
                        </div>
                        
                        <!-- TikTok Video 3 -->
                        <div class="col-12 col-md-6 col-lg-3 mb-4">
                            <div class="tiktok-embed" style="border-radius: 15px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); height: 500px;">
                                <blockquote class="tiktok-embed" cite="https://www.tiktok.com/@materiel.agricole4/video/7580432108217322774" data-video-id="7580432108217322774" style="max-width: 100%; min-width: 100%; height: 100%;">
                                    <section>
                                        <a target="_blank" href="https://www.tiktok.com/@materiel.agricole4/video/7580432108217322774">@materiel.agricole4</a>
                                    </section>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Bouton TikTok -->
                    <div class="text-center mt-4">
                        <a href="https://www.tiktok.com/@materiel.agricole4" target="_blank" class="btn btn-dark btn-lg" style="background-color: #000; border: none; padding: 15px 40px; font-size: 1.2rem; border-radius: 50px;">
                            <i class="fab fa-tiktok" style="margin-right: 10px;"></i><span> SEE MORE </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- TikTok Section End -->
     <script async src="https://www.tiktok.com/embed.js"></script>


    <!-- Features Details Section Start -->
    <section class="content section section-margin">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <p class="pl-md-5 pr-md-5">
                        <p style="font-size:24px">Our bumpers are equipped with articulated side parts. This is a patent (<a href="https://patentimages.storage.googleapis.com/b2/4c/ee/8c35c42ee833a6/EP2815928A1.pdf" target="_blank" rel="noopener" title="">Nr.: EP2815928A1</a>) to make this construction unique. The hinged side parts have the following advantages: </p>
                    </p>
                </div>
            </div>
            
            <div class="row pt-5 pb-5 text-center draaicirkel">
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-lg" style="border-radius: 15px; overflow: hidden; transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">
                        <img class="card-img-top" src="https://tractorbumper.com/wp-content/themes/tractor-bumper/images/img-draaicirkel.jpg" alt="Reduced turning circle" style="height: 250px; object-fit: cover;">
                        <div class="card-body" style="padding: 30px;">
                            <h3 class="card-title" style="font-size: 1.5rem; font-weight: bold; color: #333; margin-bottom: 15px;">Reduced turning circle</h3>
                            <p class="card-text" style="font-size: 15px; color: #666; line-height: 1.6;">By adjusting the side parts, the turning circle is reduced.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-lg" style="border-radius: 15px; overflow: hidden; transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">
                        <img class="card-img-top" src="https://tractorbumper.com/wp-content/themes/tractor-bumper/images/img-beveiligd.jpg" alt="Secured when reversing" style="height: 250px; object-fit: cover;">
                        <div class="card-body" style="padding: 30px;">
                            <h3 class="card-title" style="font-size: 1.5rem; font-weight: bold; color: #333; margin-bottom: 15px;">Secured when reversing</h3>
                            <p class="card-text" style="font-size: 15px; color: #666; line-height: 1.6;">Side part hinges forward (shear bolt control) when encountering an obstacle while reversing.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-lg" style="border-radius: 15px; overflow: hidden; transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">
                        <img class="card-img-top" src="https://tractorbumper.com/wp-content/themes/tractor-bumper/images/img-afgeschermd.jpg" alt="Shielded side" style="height: 250px; object-fit: cover;">
                        <div class="card-body" style="padding: 30px;">
                            <h3 class="card-title" style="font-size: 1.5rem; font-weight: bold; color: #333; margin-bottom: 15px;">Shielded side</h3>
                            <p class="card-text" style="font-size: 15px; color: #666; line-height: 1.6;">Safety is enhanced by reducing the space between the wheels and the bumper.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="alignfull fronthef mb-5">
                <img class="img-fluid" src="https://tractorbumper.com/wp-content/themes/tractor-bumper/images/img-kenmerken.jpg" alt="Tractorbumper">
            </div>
            
            <div class="row eigenschappen-titel mb-5">				
                <div class="col-12 text-center">
                    <div style="width: 100px; height: 4px; background: linear-gradient(to right, #FDC830, #311101ff); margin: 0 auto 20px;"></div>
                    <h2 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 0;">Other Features</h2>
                </div>
            </div>
            
            <div class="row text-center overige-eigenschappen justify-content-center" style="padding: 40px 0;">
                <div class="col-6 col-md-4 col-lg-2 mb-5">
                    <div class="property-item">
                        <img class="rounded-circle shadow mb-3" src="https://tractorbumper.com/wp-content/themes/tractor-bumper/images/eigenschap-reflectie.jpg" style="width: 140px; height: 140px; object-fit: cover;">
                        <p style="font-size: 14px; line-height: 1.4; padding: 0 10px;">Red and white panels according to standard (ECE-104)</p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 mb-5">
                    <div class="property-item">
                        <img class="rounded-circle shadow mb-3" src="https://tractorbumper.com/wp-content/themes/tractor-bumper/images/eigenschap-led.jpg" style="width: 140px; height: 140px; object-fit: cover;">
                        <p style="font-size: 14px; line-height: 1.4; padding: 0 10px;">Flexible LED width lighting</p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 mb-5">
                    <div class="property-item">
                        <img class="rounded-circle shadow mb-3" src="https://tractorbumper.com/wp-content/themes/tractor-bumper/images/eigenschap-richting.jpg" style="width: 140px; height: 140px; object-fit: cover;">
                        <p style="font-size: 14px; line-height: 1.4; padding: 0 10px;">LED outline lighting + turn signals</p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 mb-5">
                    <div class="property-item">
                        <img class="rounded-circle shadow mb-3" src="https://tractorbumper.com/wp-content/themes/tractor-bumper/images/eigenschap-markering.jpg" style="width: 140px; height: 140px; object-fit: cover;">
                        <p style="font-size: 14px; line-height: 1.4; padding: 0 10px;">Marker sticks</p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 mb-5">
                    <div class="property-item">
                        <img class="rounded-circle shadow mb-3" src="https://tractorbumper.com/wp-content/themes/tractor-bumper/images/eigenschap-fronthef.jpg" style="width: 140px; height: 140px; object-fit: cover;">
                        <p style="font-size: 14px; line-height: 1.4; padding: 0 10px;">Universal for front-lift tractors</p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 mb-5">
                    <div class="property-item">
                        <img class="rounded-circle shadow mb-3" src="https://tractorbumper.com/wp-content/themes/tractor-bumper/images/eigenschap-aankoppelen.jpg" style="width: 140px; height: 140px; object-fit: cover;">
                        <p style="font-size: 14px; line-height: 1.4; padding: 0 10px;">Easy coupling</p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 mb-5">
                    <div class="property-item">
                        <img class="rounded-circle shadow mb-3" src="https://tractorbumper.com/wp-content/themes/tractor-bumper/images/eigenschap-stralen.jpg" style="width: 140px; height: 140px; object-fit: cover;">
                        <p style="font-size: 14px; line-height: 1.4; padding: 0 10px;">All parts are sandblasted, primed and powder coated</p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 mb-5">
                    <div class="property-item">
                        <img class="rounded-circle shadow mb-3" src="https://tractorbumper.com/wp-content/themes/tractor-bumper/images/eigenschap-afstellen.jpg" style="width: 140px; height: 140px; object-fit: cover;">
                        <p style="font-size: 14px; line-height: 1.4; padding: 0 10px;">Easy adjustment of side parts</p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 mb-5">
                    <div class="property-item">
                        <img class="rounded-circle shadow mb-3" src="https://tractorbumper.com/wp-content/themes/tractor-bumper/images/eigenschap-design.jpg" style="width: 140px; height: 140px; object-fit: cover;">
                        <p style="font-size: 14px; line-height: 1.4; padding: 0 10px;">Elegant design in your tractor color</p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2 mb-5">
                    <div class="property-item">
                        <img class="rounded-circle shadow mb-3" src="https://tractorbumper.com/wp-content/themes/tractor-bumper/images/eigenschap-logo.jpg" style="width: 140px; height: 140px; object-fit: cover;">
                        <p style="font-size: 14px; line-height: 1.4; padding: 0 10px;">Own logo</p>
                    </div>
                </div>
            </div>
            
            <div class="row mt-5">
                <div class="col">
                    <iframe width="100%" height="700" src="https://www.youtube.com/embed/YCJSCMx7bCk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </section>
    <!-- Features Details Section End -->

    <!-- Reviews Slider Section Start -->
    <section class="reviews-section section"   style="padding: 60px 0; background: linear-gradient(135deg, #FDC830 0%, #311101ff 100%); margin-top: 0px; !important;">
        <div class="container">
            <div class="reviews-slider">
                <div class="swiper-container testimonials-swiper">
                    <div class="swiper-wrapper">
                        
                        <!-- Review 1 -->
                        <div class="swiper-slide">
                            <div class="review-slide" style="background-image: url('https://tractorbumper.com/wp-content/uploads/2020/10/recensie.jpg'); background-size: cover; background-position: center; min-height: 600px; position: relative;">
                                <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.4);"></div>
                                <div class="container" style="position: relative; z-index: 2; height: 600px; display: flex; align-items: center; justify-content: center;">
                                    <div class="review-content text-center" style="max-width: 800px; color: white;">
                                        <p style="font-size: 28px; line-height: 1.6; margin-bottom: 30px; font-style: italic;">"There is a fight over who gets to hang it on the tractor, because it looks 'cool'. The bumper is carefully finished, with LED and reflective stickers"</p>
                                        <h3 style="font-size: 24px; font-weight: bold; color: white;">Heeringa Company</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Review 2 -->
                        <div class="swiper-slide">
                            <div class="review-slide" style="background-image: url('https://tractorbumper.com/wp-content/uploads/2020/10/DSC06739-1-scaled.jpg'); background-size: cover; background-position: 73% 42%; min-height: 600px; position: relative;">
                                <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.4);"></div>
                                <div class="container" style="position: relative; z-index: 2; height: 600px; display: flex; align-items: center; justify-content: center;">
                                    <div class="review-content text-center" style="max-width: 800px; color: white;">
                                        <p style="font-size: 28px; line-height: 1.6; margin-bottom: 30px; font-style: italic;">"As importer of Tractorbumper for Austria, we can offer a high-quality product that increases safety and has a very good finish"</p>
                                        <h3 style="font-size: 24px; font-weight: bold; color: white;">Georg Mauser / Kommunaldienst Weinviertel O.G.</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Review 3 -->
                        <div class="swiper-slide">
                            <div class="review-slide" style="background-image: url('https://tractorbumper.com/wp-content/uploads/2020/10/DSC06312-scaled-e1603710152669.jpg'); background-size: cover; background-position: 73% 42%; min-height: 600px; position: relative;">
                                <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.4);"></div>
                                <div class="container" style="position: relative; z-index: 2; height: 600px; display: flex; align-items: center; justify-content: center;">
                                    <div class="review-content text-center" style="max-width: 800px; color: white;">
                                        <p style="font-size: 28px; line-height: 1.6; margin-bottom: 30px; font-style: italic;">"Functional product where the integrated storage box is very practical"</p>
                                        <h3 style="font-size: 24px; font-weight: bold; color: white;">Terra Trac</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Review 4 -->
                        <div class="swiper-slide">
                            <div class="review-slide" style="background-image: url('https://tractorbumper.com/wp-content/uploads/2020/10/IMG_0889-scaled.jpg'); background-size: cover; background-position: 33% 69%; min-height: 600px; position: relative;">
                                <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.4);"></div>
                                <div class="container" style="position: relative; z-index: 2; height: 600px; display: flex; align-items: center; justify-content: center;">
                                    <div class="review-content text-center" style="max-width: 800px; color: white;">
                                        <p style="font-size: 28px; line-height: 1.6; margin-bottom: 30px; font-style: italic;">"Beautiful front weight that fits the tractor perfectly in terms of design"</p>
                                        <h3 style="font-size: 24px; font-weight: bold; color: white;">Agri CS / CZECH REPUBLIC</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Navigation Controls -->
                    <div class="reviews-slider-prev swiper-button-prev main-slider-nav d-md-flex d-none"><i class="pe-7s-angle-left"></i></div>
                    <div class="reviews-slider-next swiper-button-next main-slider-nav d-md-flex d-none"><i class="pe-7s-angle-right"></i></div>
                </div>
            </div>
        </div>
    </section>
    <!-- Reviews Slider Section End -->

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new Swiper('.testimonials-swiper', {
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: '.reviews-slider-next',
                    prevEl: '.reviews-slider-prev',
                },
                speed: 800,
            });
        });
    </script>


@endsection
