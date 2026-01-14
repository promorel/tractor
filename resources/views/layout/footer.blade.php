<!-- Footer Section Start -->
<footer class="section footer-section">
    <!-- Footer Top Start -->
    <div class="footer-top section-padding">
        <div class="container">
            <div class="row mb-n10">
                <!-- Contact Widget Start -->
                <div class="col-12 col-sm-6 col-lg-4 col-xl-4 mb-10" data-aos="fade-up" data-aos-delay="200">
                    <div class="single-footer-widget">
                        <h2 class="widget-title">Contact Us</h2>
                        <p class="desc-content">Tractorrbumper - Your trusted partner for quality tractor bumpers. Premium protection for your equipment.</p>
                        <!-- Contact Address Start -->
                        <ul class="widget-address">
                            <li><span>Address: </span> 1183 RTE de la Réatière 38090 Roche</li>
                            <li><span>WhatsApp: </span> <a href="https://wa.me/33602926393"> 06 02 92 63 93</a></li>
                            <li><span>Mail to: </span> <a href="mailto:contact@tractorrbumper.com"> contact@tractorrbumper.com</a></li>
                        </ul>
                        <!-- Contact Address End -->

                        <!-- Social Link Start -->
                        <div class="widget-social justify-content-start mt-4">
                            <a title="TikTok" href="https://www.tiktok.com/@materiel.agricole4" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
                        </div>
                        <!-- Social Link End -->

                    </div>
                </div>
                <!-- Contact Widget End -->

                <!-- Information Widget Start -->
                <div class="col-12 col-sm-6 col-lg-2 col-xl-2 mb-10" data-aos="fade-up" data-aos-delay="300">
                    <div class="single-footer-widget">
                        <h2 class="widget-title">Information</h2>
                        <ul class="widget-list">
                            <li><a href="{{ route('about-us') }}">About Us</a></li>
                            <li><a href="{{ route('products') }}">All Products</a></li>
                            <li><a href="{{ route('faq') }}">FAQ</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                            <li><a href="{{ route('cgv') }}">Terms and Conditions</a></li>
                            <li><a href="{{ route('legal-notice') }}">Legal Notice</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Information Widget End -->

                <!-- Products Widget Start -->
                <div class="col-12 col-sm-6 col-lg-2 col-xl-2 mb-10" data-aos="fade-up" data-aos-delay="400">
                    <div class="single-footer-widget">
                        <h2 class="widget-title">Products</h2>
                        <ul class="widget-list">
                            <li><a href="{{ route('crash-test') }}">Crash Test</a></li>
                            <li><a href="{{ route('features') }}">Features</a></li>
                            <li><a href="{{ asset('assets/docs/GUIGARD INVEST - Comptes sociaux 2025 (1).pdf') }}" target="_blank">Financial Statements 2025</a></li>
                            <li><a href="{{ asset('assets/docs/GUIGARD INVEST - Extrait d\'immatriculation.pdf') }}" target="_blank">Registration Extract</a></li>
                            <li><a href="{{ asset('assets/docs/GUIGARD INVEST - Statuts mis à jour (1).pdf') }}" target="_blank">Updated Bylaws</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Products Widget End -->

                <!-- Newsletter Widget Start -->
                <div class="col-12 col-sm-6 col-lg-4 col-xl-4 mb-10" data-aos="fade-up" data-aos-delay="500">
                    <div class="single-footer-widget">
                        <h2 class="widget-title">Newsletter</h2>
                        <div class="widget-body">
                            <p class="desc-content mb-0">Subscribe to get special offers and updates about our latest tractor bumper collection.</p>

                            <!-- Newsletter Form Start -->
                            <div class="newsletter-form-wrap pt-4">
                                <form id="mc-form" class="mc-form">
                                    <input type="email" id="mc-email" class="form-control email-box mb-4" placeholder="Enter your email here.." name="EMAIL">
                                    <button id="mc-submit" class="newsletter-btn btn btn-primary btn-hover-dark" type="submit">Subscribe</button>
                                </form>
                                <!-- mailchimp-alerts Start -->
                                <div class="mailchimp-alerts text-centre">
                                    <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                    <div class="mailchimp-success text-success"></div><!-- mailchimp-success end -->
                                    <div class="mailchimp-error text-danger"></div><!-- mailchimp-error end -->
                                </div>
                                <!-- mailchimp-alerts end -->
                            </div>
                            <!-- Newsletter Form End -->

                        </div>
                    </div>
                </div>
                <!-- Newsletter Widget End -->
            </div>
        </div>
    </div>
    <!-- Footer Top End -->
    
    <!-- Footer Bottom Start -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 text-center">
                    <div class="copyright-content">
                        <p class="mb-0">© {{ date('Y') }} <strong>Copyright <a href="{{ route('home') }}">tractorrbumper.com</a> </strong> - Quality Tractor Bumpers. Made with <i class="fa fa-heart text-danger"></i> for farmers & professionals.</p>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Bottom End -->
</footer>
<!-- Footer Section End -->

<!-- Scroll Top Start -->
<a href="#" class="scroll-top" id="scroll-top">
    <i class="arrow-top fa fa-long-arrow-up"></i>
    <i class="arrow-bottom fa fa-long-arrow-up"></i>
</a>
<!-- Scroll Top End -->
