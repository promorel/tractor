<div class="header section">

    <!-- Header Top Start -->
    <div class="header-top bg-light">
        <div class="container">
            <div class="row row-cols-xl-2 align-items-center">

                <div class="col d-none d-lg-block">
                    <div class="header-top-lan-curr-link">
                        <div class="header-top-lan dropdown">
                            <button class="dropdown-toggle" data-bs-toggle="dropdown" id="languageButton">
                                <span id="currentLanguage">English</span> <i class="fa fa-angle-down"></i>
                            </button>

                            <ul class="dropdown-menu dropdown-menu-right animate slideIndropdown">
                                <li><a class="dropdown-item lang-select" href="#" data-lang="en">English</a></li>
                                <li><a class="dropdown-item lang-select" href="#" data-lang="de">German</a></li>
                                <li><a class="dropdown-item lang-select" href="#" data-lang="es">Spanish</a></li>
                                <li><a class="dropdown-item lang-select" href="#" data-lang="it">Italian</a></li>
                                <li><a class="dropdown-item lang-select" href="#" data-lang="pl">Polish</a></li>
                                <li><a class="dropdown-item lang-select" href="#" data-lang="no">Norwegian</a></li>
                                <li><a class="dropdown-item lang-select" href="#" data-lang="sv">Swedish</a></li>
                                <li><a class="dropdown-item lang-select" href="#" data-lang="ro">Romanian</a></li>
                                <li><a class="dropdown-item lang-select" href="#" data-lang="fr">French</a></li>
                                <li><a class="dropdown-item lang-select" href="#" data-lang="el">Greek</a></li>
                                <li><a class="dropdown-item lang-select" href="#" data-lang="ru">Russian</a></li>
                                <li><a class="dropdown-item lang-select" href="#" data-lang="lt">Lithuanian</a></li>
                                <li><a class="dropdown-item lang-select" href="#" data-lang="lv">Latvian</a></li>
                                <li><a class="dropdown-item lang-select" href="#" data-lang="hu">Hungarian</a></li>
                                <li><a class="dropdown-item lang-select" href="#" data-lang="pt">Portuguese</a></li>
                                <li><a class="dropdown-item lang-select" href="#" data-lang="bg">Bulgarian</a></li>
                            </ul>
                        </div>
                        <!-- Hidden Google Translate widget -->
                        <div id="google_translate_element" style="display:none;"></div>
                        <div class="header-top-links">
                            <span>Whatsapp</span><a href="https://wa.me/33602926393"> 06 02 92 63 93</a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <p class="header-top-message">Ends Monday: $100 off any dining table + 2 sets of chairs. <a
                            href="shop-grid.html">Shop Now</a></p>
                </div>

            </div>
        </div>
    </div>
    <!-- Header Top End -->

    <!-- Header Bottom Start -->
    <div class="header-bottom">
        <div class="header-sticky">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-xl-2 col-6">
                        <div class="header-logo">
                            <a href="{{ route('home') }}"><img
                                    src="{{ asset('assets/images/logo/tractorbumper-logo.png') }}"
                                    alt="Site Logo" /></a>
                        </div>
                    </div>

                    <div class="col-xl-8 d-none d-xl-block">
                        <div class="main-menu position-relative">
                            <ul>
                                <li class="has-children {{ request()->routeIs('home') ? 'active' : '' }}">
                                    <a href="{{ route('home') }}"><span>Home</span></a>
                                </li>
                                <li class="has-children {{ request()->routeIs('products', 'spareparts') ? 'active' : '' }}">
                                    <a href="#"><span>All products</span> <i class="fa fa-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <li class="{{ request()->routeIs('products') ? 'active' : '' }}">
                                            <a href="{{ route('products') }}">Products</a>
                                        </li>
                                        <li class="{{ request()->routeIs('spareparts') ? 'active' : '' }}">
                                            <a href="{{ route('spareparts') }}">Spareparts & Stickers</a>
                                        </li>
                                    </ul>
                                </li>
                                <li
                                    class="has-children {{ request()->routeIs('features', 'why', 'crash-test', 'faq', 'about-us') ? 'active' : '' }}">
                                    <a href="#"><span>Info</span> <i class="fa fa-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <li class="{{ request()->routeIs('features') ? 'active' : '' }}"><a
                                                href="{{ route('features') }}">Features</a></li>
                                        <li class="{{ request()->routeIs('why') ? 'active' : '' }}"><a
                                                href="{{ route('why') }}">Why</a></li>
                                        <li class="{{ request()->routeIs('crash-test') ? 'active' : '' }}"><a
                                                href="{{ route('crash-test') }}">Crash test</a></li>
                                        <li class="{{ request()->routeIs('faq') ? 'active' : '' }}"><a
                                                href="{{ route('faq') }}">FAQ</a></li>
                                        <li class="{{ request()->routeIs('about-us') ? 'active' : '' }}"><a
                                                href="{{ route('about-us') }}">About us</a></li>
                                    </ul>
                                </li>
                                <li class="has-children {{ request()->routeIs('photos.*') ? 'active' : '' }}">
                                    <a href="#"><span>Photo's</span> <i class="fa fa-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <li class="{{ request()->routeIs('photos.fendt') ? 'active' : '' }}"><a
                                                href="{{ route('photos.fendt') }}">Fendt</a></li>
                                        <li class="{{ request()->routeIs('photos.john-deere') ? 'active' : '' }}"><a
                                                href="{{ route('photos.john-deere') }}">John Deere</a></li>
                                        <li class="{{ request()->routeIs('photos.new-holland') ? 'active' : '' }}"><a
                                                href="{{ route('photos.new-holland') }}">New Holland</a></li>
                                        <li class="{{ request()->routeIs('photos.deutz-fahr') ? 'active' : '' }}"><a
                                                href="{{ route('photos.deutz-fahr') }}">Deutz-Fahr</a></li>
                                        <li class="{{ request()->routeIs('photos.case-ih') ? 'active' : '' }}"><a
                                                href="{{ route('photos.case-ih') }}">Case IH</a></li>
                                        <li class="{{ request()->routeIs('photos.massey-ferguson') ? 'active' : '' }}">
                                            <a href="{{ route('photos.massey-ferguson') }}">Massey Ferguson</a>
                                        </li>
                                        <li class="{{ request()->routeIs('photos.claas') ? 'active' : '' }}"><a
                                                href="{{ route('photos.claas') }}">Claas</a></li>
                                        <li class="{{ request()->routeIs('photos.valtra') ? 'active' : '' }}"><a
                                                href="{{ route('photos.valtra') }}">Valtra</a></li>
                                        <li class="{{ request()->routeIs('photos.steyr') ? 'active' : '' }}"><a
                                                href="{{ route('photos.steyr') }}">Steyr</a></li>
                                        <li class="{{ request()->routeIs('photos.kubota') ? 'active' : '' }}"><a
                                                href="{{ route('photos.kubota') }}">Kubota</a></li>
                                        <li class="{{ request()->routeIs('photos.jcb') ? 'active' : '' }}"><a
                                                href="{{ route('photos.jcb') }}">JCB</a></li>
                                        <li class="{{ request()->routeIs('photos.mb-trac') ? 'active' : '' }}"><a
                                                href="{{ route('photos.mb-trac') }}">MB Trac</a></li>
                                        <li class="{{ request()->routeIs('photos.mccormick') ? 'active' : '' }}"><a
                                                href="{{ route('photos.mccormick') }}">McCormick</a></li>
                                    </ul>
                                </li>
                                <li class="{{ request()->routeIs('contact') ? 'active' : '' }}"><a
                                        href="{{ route('contact') }}"><span>Contact</span></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-2 col-6">
                        <div class="header-actions">
                            <!-- Search icon for Desktop only -->
                            <a href="javascript:void(0)" class="header-action-btn header-action-btn-search d-none d-xl-block"><i
                                    class="pe-7s-search"></i></a>

                            @auth
                                <!-- User Dropdown -->
                                <div class="header-action-btn d-none d-md-block dropdown">
                                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="pe-7s-user"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li class="dropdown-header">
                                            <strong>{{ Auth::user()->name }}</strong><br>
                                            <small class="text-muted">{{ Auth::user()->email }}</small>
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                                <i class="fa fa-dashboard me-2"></i> Admin Dashboard
                                            </a></li>

                                        <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button type="submit" class="dropdown-item text-danger">
                                                    <i class="fa fa-sign-out me-2"></i> Logout
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            @else
                                <a href="{{ route('login') }}" class="header-action-btn d-none d-md-block"><i
                                        class="pe-7s-user"></i></a>
                            @endauth

                            <a href="javascript:void(0)" class="header-action-btn header-action-btn-cart"
                                id="cart-toggle">
                                <i class="pe-7s-shopbag"></i>
                                <span class="header-action-num cart-counter">0</span>
                            </a>
                            <a href="javascript:void(0)"
                                class="header-action-btn header-action-btn-menu d-xl-none d-lg-block">
                                <i class="fa fa-bars"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Header Bottom End -->

    <!-- Mobile Menu Start -->
    <div class="mobile-menu-wrapper">
        <div class="offcanvas-overlay"></div>

        <div class="mobile-menu-inner">

            <div class="offcanvas-btn-close">
                <i class="pe-7s-close"></i>
            </div>

            <div class="mobile-navigation">
                <nav>
                    <ul class="mobile-menu">
                        <li class="has-children {{ request()->routeIs('home') ? 'active' : '' }}">
                            <a href="{{ route('home') }}"><span>Home</span></a>
                        </li>
                        <li class="has-children {{ request()->routeIs('products', 'spareparts') ? 'active' : '' }}">
                            <a href="#">All products <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                            <ul class="dropdown">
                                <li><a href="{{ route('products') }}">Products</a></li>
                                <li><a href="{{ route('spareparts') }}">Spareparts & Stickers</a></li>
                            </ul>
                        </li>
                        <li
                            class="has-children {{ request()->routeIs('features', 'why', 'crash-test', 'faq', 'about-us') ? 'active' : '' }}">
                            <a href="#">Info <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                            <ul class="dropdown">
                                <li><a href="{{ route('features') }}">Features</a></li>
                                <li><a href="{{ route('why') }}">Why</a></li>
                                <li><a href="#">Put on YOUR Tractor!</a></li>
                                <li><a href="{{ route('crash-test') }}">Crash test</a></li>
                                <li><a href="#">Models</a></li>
                                <li><a href="#">Find a dealer</a></li>
                                <li><a href="#">Find your bumper</a></li>
                                <li><a href="#">Overview connections</a></li>
                                <li><a href="{{ route('faq') }}">FAQ</a></li>
                                <li><a href="{{ route('about-us') }}">About us</a></li>
                            </ul>
                        </li>
                        <li class="has-children {{ request()->routeIs('photos.*') ? 'active' : '' }}">
                            <a href="#">Photo's <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                            <ul class="dropdown">
                                <li><a href="{{ route('photos.fendt') }}">Fendt</a></li>
                                <li><a href="{{ route('photos.john-deere') }}">John Deere</a></li>
                                <li><a href="{{ route('photos.new-holland') }}">New Holland</a></li>
                                <li><a href="{{ route('photos.deutz-fahr') }}">Deutz-Fahr</a></li>
                                <li><a href="{{ route('photos.case-ih') }}">Case IH</a></li>
                                <li><a href="{{ route('photos.massey-ferguson') }}">Massey Ferguson</a></li>
                                <li><a href="{{ route('photos.claas') }}">Claas</a></li>
                                <li><a href="{{ route('photos.valtra') }}">Valtra</a></li>
                                <li><a href="{{ route('photos.steyr') }}">Steyr</a></li>
                                <li><a href="{{ route('photos.kubota') }}">Kubota</a></li>
                                <li><a href="{{ route('photos.jcb') }}">JCB</a></li>
                                <li><a href="{{ route('photos.mb-trac') }}">MB Trac</a></li>
                                <li><a href="{{ route('photos.mccormick') }}">McCormick</a></li>
                            </ul>
                        </li>
                        <li class="{{ request()->routeIs('contact') ? 'active' : '' }}"><a
                                href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </nav>
            </div>

            <div class="offcanvas-lag-curr mb-6">
                <h2 class="title">Languages</h2>

                <div class="header-top-lan-curr-link">
                    <div class="header-top-lan dropdown">
                        <button class="dropdown-toggle" data-bs-toggle="dropdown" id="languageButtonMobile">
                            <span class="flag-icon" id="currentFlagMobile">🇬🇧</span>
                            <span id="currentLanguageMobile">English</span> 
                            <i class="fa fa-angle-down"></i>
                        </button>

                        <ul class="dropdown-menu dropdown-menu-right animate slideIndropdown">
                            <li><a class="dropdown-item lang-select" href="#" data-lang="en" data-flag="🇬🇧"><span class="flag-emoji">🇬🇧</span> English</a></li>
                            <li><a class="dropdown-item lang-select" href="#" data-lang="de" data-flag="🇩🇪"><span class="flag-emoji">🇩🇪</span> German</a></li>
                            <li><a class="dropdown-item lang-select" href="#" data-lang="es" data-flag="🇪🇸"><span class="flag-emoji">🇪🇸</span> Spanish</a></li>
                            <li><a class="dropdown-item lang-select" href="#" data-lang="it" data-flag="🇮🇹"><span class="flag-emoji">🇮🇹</span> Italian</a></li>
                            <li><a class="dropdown-item lang-select" href="#" data-lang="pl" data-flag="🇵🇱"><span class="flag-emoji">🇵🇱</span> Polish</a></li>
                            <li><a class="dropdown-item lang-select" href="#" data-lang="no" data-flag="🇳🇴"><span class="flag-emoji">🇳🇴</span> Norwegian</a></li>
                            <li><a class="dropdown-item lang-select" href="#" data-lang="sv" data-flag="🇸🇪"><span class="flag-emoji">🇸🇪</span> Swedish</a></li>
                            <li><a class="dropdown-item lang-select" href="#" data-lang="ro" data-flag="🇷🇴"><span class="flag-emoji">🇷🇴</span> Romanian</a></li>
                            <li><a class="dropdown-item lang-select" href="#" data-lang="fr" data-flag="🇫🇷"><span class="flag-emoji">🇫🇷</span> French</a></li>
                            <li><a class="dropdown-item lang-select" href="#" data-lang="el" data-flag="🇬🇷"><span class="flag-emoji">🇬🇷</span> Greek</a></li>
                            <li><a class="dropdown-item lang-select" href="#" data-lang="ru" data-flag="🇷🇺"><span class="flag-emoji">🇷🇺</span> Russian</a></li>
                            <li><a class="dropdown-item lang-select" href="#" data-lang="lt" data-flag="🇱🇹"><span class="flag-emoji">🇱🇹</span> Lithuanian</a></li>
                            <li><a class="dropdown-item lang-select" href="#" data-lang="lv" data-flag="🇱🇻"><span class="flag-emoji">🇱🇻</span> Latvian</a></li>
                            <li><a class="dropdown-item lang-select" href="#" data-lang="hu" data-flag="🇭🇺"><span class="flag-emoji">🇭🇺</span> Hungarian</a></li>
                            <li><a class="dropdown-item lang-select" href="#" data-lang="pt" data-flag="🇵🇹"><span class="flag-emoji">🇵🇹</span> Portuguese</a></li>
                            <li><a class="dropdown-item lang-select" href="#" data-lang="bg" data-flag="🇧🇬"><span class="flag-emoji">🇧🇬</span> Bulgarian</a></li>
                        </ul>
                    </div>
                    <!-- Hidden Google Translate widget -->
                    <div id="google_translate_element" style="display:none;"></div>
                </div>
            </div>

            <div class="mt-auto">
                @auth
                    <div class="user-info-mobile mb-4 pb-3 border-bottom">
                        <p class="mb-1"><strong>{{ Auth::user()->name }}</strong></p>
                        <p class="text-muted mb-2"><small>{{ Auth::user()->email }}</small></p>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-dark mb-2 w-100">
                            <i class="fa fa-dashboard me-2"></i> Admin Dashboard
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger w-100">
                                <i class="fa fa-sign-out me-2"></i> Logout
                            </button>
                        </form>
                    </div>
                @endauth

                <ul class="contact-links">
                    <li><i class="fa fa-envelope-o"></i><a href="mailto:contact@tractorrbumper.com"> contact@tractorrbumper.com</a></li>
                    <li><i class="fa fa-clock-o"></i> <span>Monday - Sunday 9 AM - 6 PM</span></li>
                </ul>
            </div>

        </div>

    </div>
    <!-- Mobile Menu End -->

    <!-- Offcanvas Search Start -->
    <div class="offcanvas-search">
        <div class="offcanvas-search-inner">

            <div class="offcanvas-btn-close">
                <i class="pe-7s-close"></i>
            </div>

            <form class="offcanvas-search-form" action="#">
                <input type="text" placeholder="Rechercher ici..." class="offcanvas-search-input">
            </form>

        </div>
    </div>
    <!-- Offcanvas Search End -->

    <!-- Cart Offcanvas Start -->
    <div class="cart-offcanvas-wrapper">
        <div class="offcanvas-overlay"></div>

        <div class="cart-offcanvas-inner">

            <div class="offcanvas-btn-close">
                <i class="pe-7s-close"></i>
            </div>

            <div class="offcanvas-cart-content" id="cart-offcanvas-content">
                <h2 class="offcanvas-cart-title mb-10">Card</h2>

                <div id="cart-items-container">
                    <!-- Le contenu du panier sera chargé ici via AJAX -->
                    <div class="text-center py-5">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <!-- Cart Offcanvas End -->

</div>

<!-- Fixed Language Button with Dropdown (Mobile Only - Bottom Left) -->
<div class="fixed-lang-btn d-xl-none dropdown" id="fixedLangBtn">
    <button class="fixed-lang-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="flag-icon" id="fixedCurrentFlag">🇬🇧</span>
        <span class="lang-code" id="fixedLangCode">EN</span>
        <i class="fa fa-angle-up"></i>
    </button>
    
    <ul class="dropdown-menu dropdown-menu-start">
        <li><a class="dropdown-item lang-select" href="#" data-lang="en" data-flag="🇬🇧" data-code="EN"><span class="flag-emoji">🇬🇧</span> English</a></li>
        <li><a class="dropdown-item lang-select" href="#" data-lang="de" data-flag="🇩🇪" data-code="DE"><span class="flag-emoji">🇩🇪</span> Deutsch</a></li>
        <li><a class="dropdown-item lang-select" href="#" data-lang="es" data-flag="🇪🇸" data-code="ES"><span class="flag-emoji">🇪🇸</span> Español</a></li>
        <li><a class="dropdown-item lang-select" href="#" data-lang="it" data-flag="🇮🇹" data-code="IT"><span class="flag-emoji">🇮🇹</span> Italiano</a></li>
        <li><a class="dropdown-item lang-select" href="#" data-lang="pt" data-flag="🇵🇹" data-code="PT"><span class="flag-emoji">🇵🇹</span> Português</a></li>
        <li><a class="dropdown-item lang-select" href="#" data-lang="fr" data-flag="🇫🇷" data-code="FR"><span class="flag-emoji">🇫🇷</span> Français</a></li>
        <li><a class="dropdown-item lang-select" href="#" data-lang="pl" data-flag="🇵🇱" data-code="PL"><span class="flag-emoji">🇵🇱</span> Polski</a></li>
        <li><a class="dropdown-item lang-select" href="#" data-lang="no" data-flag="🇳🇴" data-code="NO"><span class="flag-emoji">🇳🇴</span> Norsk</a></li>
        <li><a class="dropdown-item lang-select" href="#" data-lang="sv" data-flag="🇸🇪" data-code="SV"><span class="flag-emoji">🇸🇪</span> Svenska</a></li>
        <li><a class="dropdown-item lang-select" href="#" data-lang="ro" data-flag="🇷🇴" data-code="RO"><span class="flag-emoji">🇷🇴</span> Română</a></li>
        <li><a class="dropdown-item lang-select" href="#" data-lang="el" data-flag="🇬🇷" data-code="EL"><span class="flag-emoji">🇬🇷</span> Ελληνικά</a></li>
        <li><a class="dropdown-item lang-select" href="#" data-lang="ru" data-flag="🇷🇺" data-code="RU"><span class="flag-emoji">🇷🇺</span> Русский</a></li>
        <li><a class="dropdown-item lang-select" href="#" data-lang="lt" data-flag="🇱🇹" data-code="LT"><span class="flag-emoji">🇱🇹</span> Lietuvių</a></li>
        <li><a class="dropdown-item lang-select" href="#" data-lang="lv" data-flag="🇱🇻" data-code="LV"><span class="flag-emoji">🇱🇻</span> Latviešu</a></li>
        <li><a class="dropdown-item lang-select" href="#" data-lang="hu" data-flag="🇭🇺" data-code="HU"><span class="flag-emoji">🇭🇺</span> Magyar</a></li>
        <li><a class="dropdown-item lang-select" href="#" data-lang="bg" data-flag="🇧🇬" data-code="BG"><span class="flag-emoji">🇧🇬</span> Български</a></li>
    </ul>
</div>