@extends('layout.template')

@section('contenu')

    <!-- Breadcrumb Section Start -->
    <div class="section">
        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-light">
            <div class="container-fluid">
                <div class="breadcrumb-content text-center">
                    <h1 class="title">FAQ</h1>
                    <ul>
                        <li>
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="active">FAQ</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End -->
    </div>
    <!-- Breadcrumb Section End -->

    <div class="section section-margin">
        <!-- Faq Content Start -->
        <div class="faq_content_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="faq_content_wrapper">
                            <h4 class="title">Frequently Asked Questions</h4>
                            <p>Below are frequently asked questions, you may find the answer for yourself</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Faq Content End -->

        <!-- General Section -->
        <div class="container mb-5">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-4"><strong>General</strong></h3>
                </div>
            </div>
        </div>

        <!-- Accordion area General -->
        <div class="accordion_area mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div id="accordionGeneral" class="accordion mb-n4">
                            <!-- Why TractorBumper -->
                            <div class="card_dipult accordion-item mb-4">
                                <div class="card-header card_accor" id="headingWhy">
                                    <button class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapseWhy" aria-expanded="true" aria-controls="collapseWhy">
                                        Why a TractorBumper?
                                        <i class="fa fa-plus"></i>
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <div id="collapseWhy" class="collapse accordion-collapse show border-0" aria-labelledby="headingWhy" data-bs-parent="#accordionGeneral">
                                    <div class="card-body">
                                        <p>In addition to the design, the TractorBumper has 2 important main features:</p>
                                        <div class="row mt-3">
                                            <div class="col-md-6 mb-3">
                                                <div class="border p-3">
                                                    <h5>Protection of the frontwheels</h5>
                                                    <img loading="lazy" class="img-fluid mb-2" src="https://tractorbumper.com/wp-content/uploads/2023/08/agribumper_crashtest-1024x683.jpeg" alt="Crash test">
                                                    <img loading="lazy" class="img-fluid" src="https://tractorbumper.com/wp-content/uploads/2023/08/Agribumper_crashtest_2.jpg" alt="Crash test 2">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="border p-3">
                                                    <h5>Clear lighting of the Tractor width</h5>
                                                    <img loading="lazy" class="img-fluid mb-2" src="https://tractorbumper.com/wp-content/uploads/2023/08/agribumper_lighting-1024x683.jpg" alt="Lighting">
                                                    <img loading="lazy" class="img-fluid" src="https://tractorbumper.com/wp-content/uploads/2023/08/MX_Front-bumper.jpg" alt="Front bumper">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Does the bumper work in practice -->
                            <div class="card_dipult accordion-item mb-4">
                                <div class="card-header card_accor" id="headingPractice">
                                    <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapsePractice" aria-expanded="false" aria-controls="collapsePractice">
                                        Does the bumper work in practice?
                                        <i class="fa fa-plus"></i>
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <div id="collapsePractice" class="collapse accordion-collapse border-0" aria-labelledby="headingPractice" data-bs-parent="#accordionGeneral">
                                    <div class="card-body">
                                        <p>A few of accidents have now been reported in which the bumper has undoubtedly limited the consequences.</p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p><strong>Roosendaal / Netherlands</strong><br>Bumper prevented the car from sliding under the front wheels.</p>
                                                <img loading="lazy" class="img-fluid" src="https://tractorbumper.com/wp-content/uploads/2023/08/ongeluk_TractorBumper-1024x682.jpeg" alt="Accident">
                                            </div>
                                            <div class="col-md-6">
                                                <p><strong>Lith / Netherlands</strong><br>The car went off the side of the tractor because of the bumper.</p>
                                                <img loading="lazy" class="img-fluid" src="https://tractorbumper.com/wp-content/uploads/2023/08/crash_collision_Agribumper.jpg" alt="Collision">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Patent -->
                            <div class="card_dipult accordion-item mb-4">
                                <div class="card-header card_accor" id="headingPatent">
                                    <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapsePatent" aria-expanded="false" aria-controls="collapsePatent">
                                        What exactly do you have a patent on?
                                        <i class="fa fa-plus"></i>
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <div id="collapsePatent" class="collapse accordion-collapse border-0" aria-labelledby="headingPatent" data-bs-parent="#accordionGeneral">
                                    <div class="card-body">
                                        <p>We have a patent on the hinged side panels. These can be fixed in different positions and can rotate forward. European patent number EP2815928 A1. <a href="https://worldwide.espacenet.com/patent/search/family/050687253/publication/EP2815928A1?q=pn%3DEP2815928A1" target="_blank">Click here for the patent</a>. <a href="{{ route('features') }}">Click here</a> for the unique features.</p>
                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <img loading="lazy" class="img-fluid" src="https://tractorbumper.com/wp-content/uploads/2023/08/animation_TractorBumper_Patent.gif" alt="Patent animation">
                                            </div>
                                            <div class="col-md-6">
                                                <img loading="lazy" class="img-fluid" src="https://tractorbumper.com/wp-content/uploads/2023/08/protection_Tractor.jpg" alt="Protection">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- CE Marking -->
                            <div class="card_dipult accordion-item mb-4">
                                <div class="card-header card_accor" id="headingCE">
                                    <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseCE" aria-expanded="false" aria-controls="collapseCE">
                                        Does TractorBumper have CE marking?
                                        <i class="fa fa-plus"></i>
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <div id="collapseCE" class="collapse accordion-collapse border-0" aria-labelledby="headingCE" data-bs-parent="#accordionGeneral">
                                    <div class="card-body">
                                        <p>Yes, with this we make sure our products comply with the EU machinery directives.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Price List -->
                            <div class="card_dipult accordion-item mb-4">
                                <div class="card-header card_accor" id="headingPrice">
                                    <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapsePrice" aria-expanded="false" aria-controls="collapsePrice">
                                        Where can I find the price list?
                                        <i class="fa fa-plus"></i>
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <div id="collapsePrice" class="collapse accordion-collapse border-0" aria-labelledby="headingPrice" data-bs-parent="#accordionGeneral">
                                    <div class="card-body">
                                        <p>See the gross price list here. In <a href="{{ route('products') }}">our webshop</a> 10% discount on the gross price and free miniature.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Color Combinations -->
                            <div class="card_dipult accordion-item mb-4">
                                <div class="card-header card_accor" id="headingColors">
                                    <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseColors" aria-expanded="false" aria-controls="collapseColors">
                                        Which color combinations are possible?
                                        <i class="fa fa-plus"></i>
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <div id="collapseColors" class="collapse accordion-collapse border-0" aria-labelledby="headingColors" data-bs-parent="#accordionGeneral">
                                    <div class="card-body">
                                        <p>The standard powder-coated frame colors are black, AGCO grey, anthracite and green. With stickers we can make different color combinations. A different RAL as frame color is possible at additional costs.</p>
                                        <img loading="lazy" class="img-fluid mt-3" src="https://tractorbumper.com/wp-content/uploads/2023/08/Layout_TractorBumper_Brands-1024x570.jpg" alt="Color combinations">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Webshop / Ordering Section -->
        <div class="container mb-5">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-4"><strong>Webshop / Ordering</strong></h3>
                </div>
            </div>
        </div>

        <!-- Accordion area Webshop -->
        <div class="accordion_area mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div id="accordionWebshop" class="accordion mb-n4">
                            <!-- 10% discount -->
                            <div class="card_dipult accordion-item mb-4">
                                <div class="card-header card_accor" id="headingDiscount">
                                    <button class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapseDiscount" aria-expanded="false" aria-controls="collapseDiscount">
                                        10% discount and free miniature?
                                        <i class="fa fa-plus"></i>
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <div id="collapseDiscount" class="collapse accordion-collapse border-0" aria-labelledby="headingDiscount" data-bs-parent="#accordionWebshop">
                                    <div class="card-body">
                                        <p>The 10% discount has already been calculated in the webshop prices. Free miniature will be added at checkout. Discount only applies when ordering online. → <a href="{{ route('products') }}">Click here to order</a></p>
                                    </div>
                                </div>
                            </div>

                            <!-- Delivery time -->
                            <div class="card_dipult accordion-item mb-4">
                                <div class="card-header card_accor" id="headingDelivery">
                                    <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseDelivery" aria-expanded="false" aria-controls="collapseDelivery">
                                        What is the delivery time?
                                        <i class="fa fa-plus"></i>
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <div id="collapseDelivery" class="collapse accordion-collapse border-0" aria-labelledby="headingDelivery" data-bs-parent="#accordionWebshop">
                                    <div class="card-body">
                                        <p>The delivery time is 2.5 to 3 weeks.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- VAT -->
                            <div class="card_dipult accordion-item mb-4">
                                <div class="card-header card_accor" id="headingVAT">
                                    <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseVAT" aria-expanded="false" aria-controls="collapseVAT">
                                        What about the VAT?
                                        <i class="fa fa-plus"></i>
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <div id="collapseVAT" class="collapse accordion-collapse border-0" aria-labelledby="headingVAT" data-bs-parent="#accordionWebshop">
                                    <div class="card-body">
                                        <p><strong>For inside EU:</strong> With a valid company VAT number you do not pay VAT inside EU. <a href="https://ec.europa.eu/taxation_customs/vies/#/vat-validation" target="_blank">Click here to check your VAT number inside EU</a>. You can enter your VAT number at checkout page.</p>
                                        <p><strong>For UK:</strong> You need a EORI number, <a href="https://www.tax.service.gov.uk/check-eori-number/" target="_blank">you can check here your EORI number</a>. Without a EORI we can not do business directly.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Basic Bumper Section -->
        <div class="container mb-5">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-4"><strong>Basic Bumper</strong></h3>
                </div>
            </div>
        </div>

        <!-- Accordion area Basic -->
        <div class="accordion_area mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div id="accordionBasic" class="accordion mb-n4">
                            <!-- Storage box -->
                            <div class="card_dipult accordion-item mb-4">
                                <div class="card-header card_accor" id="headingBasicBox">
                                    <button class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapseBasicBox" aria-expanded="false" aria-controls="collapseBasicBox">
                                        How big is the storage box of the Basic bumper?
                                        <i class="fa fa-plus"></i>
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <div id="collapseBasicBox" class="collapse accordion-collapse border-0" aria-labelledby="headingBasicBox" data-bs-parent="#accordionBasic">
                                    <div class="card-body">
                                        <p>The Basic has a storage box of 55 liters. 78 cm wide, 32 cm high and 20 cm deep.</p>
                                        <img loading="lazy" class="img-fluid mt-3" src="https://tractorbumper.com/wp-content/uploads/2022/01/basic_dimensions_toolbox.jpg" alt="Basic dimensions">
                                    </div>
                                </div>
                            </div>

                            <!-- Width -->
                            <div class="card_dipult accordion-item mb-4">
                                <div class="card-header card_accor" id="headingBasicWidth">
                                    <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseBasicWidth" aria-expanded="false" aria-controls="collapseBasicWidth">
                                        What is the minimum and maximum width for the Basic bumper?
                                        <i class="fa fa-plus"></i>
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <div id="collapseBasicWidth" class="collapse accordion-collapse border-0" aria-labelledby="headingBasicWidth" data-bs-parent="#accordionBasic">
                                    <div class="card-body">
                                        <p>With standard side parts, the width can be adjusted from 2 meters to 2.7 meter. Optionally (at no extra cost) very short side parts are possible. The width is then approx. 1.8 meters.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Weight -->
                            <div class="card_dipult accordion-item mb-4">
                                <div class="card-header card_accor" id="headingBasicWeight">
                                    <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseBasicWeight" aria-expanded="false" aria-controls="collapseBasicWeight">
                                        What is the weight of the Basic bumper?
                                        <i class="fa fa-plus"></i>
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <div id="collapseBasicWeight" class="collapse accordion-collapse border-0" aria-labelledby="headingBasicWeight" data-bs-parent="#accordionBasic">
                                    <div class="card-body">
                                        <p>The total weight of the Basic bumper is 100 kg.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Note for additional sections -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-info">
                        <h5>More Questions?</h5>
                        <p>For more detailed information about Premium bumper, Connect bumper, SafetyWeight models and technical specifications, please visit our complete FAQ section or <a href="{{ route('products') }}">contact us</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
