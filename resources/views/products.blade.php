@extends('layout.template')

@section('contenu')

    <!-- Breadcrumb Section Start -->
    <div class="section">

        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-light">
            <div class="container-fluid">
                <div class="breadcrumb-content text-center">
                    <h1 class="title">Products</h1>
                    <ul>
                        <li>
                            <a href="{{ route('home') }}">Home </a>
                        </li>
                        <li class="active">All Products</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End -->

    </div>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Start -->
    <div class="section section-margin">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <!--shop toolbar start-->
                    <div class="shop_toolbar_wrapper flex-column flex-md-row mb-10">

                        <!-- Shop Top Bar Left start -->
                        <div class="shop-top-bar-left mb-md-0 mb-2">
                            <div class="shop-top-show">
                                <span>All products we have</span>
                            </div>
                        </div>
                        <!-- Shop Top Bar Left end -->

                        <!-- Shopt Top Bar Right Start -->
                        <div class="shop-top-bar-right">
                            <div class="shop-short-by mr-4">
                                <select class="nice-select" aria-label=".form-select-sm example">
                                    <option selected>Show 12</option>
                                    <option value="1">Show 24</option>
                                    <option value="2">Show 12</option>
                                    <option value="3">Show 15</option>
                                </select>
                            </div>

                            <div class="shop_toolbar_btn">
                                <button data-role="grid_4" type="button" class="active btn-grid-4" title="Grid"><i
                                        class="fa fa-th"></i></button>
                                
                            </div>
                        </div>
                        <!-- Shopt Top Bar Right End -->

                    </div>
                    <!--shop toolbar end-->

                    <!-- Shop Wrapper Start -->
                    <div class="row shop_wrapper grid_4">

                        @forelse($products as $product)
                            <!-- Single Product Start -->
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 product my-2" data-aos="fade-up"
                                data-aos-delay="200">
                                <div class="product-inner"
                                    style="box-shadow: 0 0 15px rgba(0, 0, 0, 0.2); border-radius: 8px; overflow: hidden; height: 500px; display: flex; flex-direction: column;">
                                    <div class="thumb" style="height: 250px; overflow: hidden; display: flex; align-items: center; justify-content: center; background: #f8f9fa;">
                                        <a href="{{ route('product-details', encrypt($product->id)) }}" class="image" style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                                            <img class="first-image" src="{{ asset($product->main_image) }}"
                                                alt="{{ $product->name }}" style="max-width: 100%; max-height: 100%; object-fit: contain;" />
                                            <img class="second-image" src="{{ asset($product->main_image) }}"
                                                alt="{{ $product->name }}" style="max-width: 100%; max-height: 100%; object-fit: contain;" />
                                        </a>
                                    </div>
                                    <div class="content" style="padding: 15px; flex: 1; display: flex; flex-direction: column; overflow: hidden;">
                                        <h5 class="title mb-0" style="font-size: 16px; line-height: 1.3;"><a
                                                href="{{ route('product-details', encrypt($product->id)) }}">{{ $product->name }}</a>
                                        </h5>
                                        <hr class="mt-2 mb-2">
                                        <h4 class="sub-title flex-grow-1" style="text-align: left; white-space: pre-line; line-height: 1.3; font-size: 13px; overflow: hidden;">
                                            <a href="{{ route('product-details', encrypt($product->id)) }}"
                                                style="white-space: pre-line;">{!! nl2br(e($product->characteristics)) !!}</a>
                                        </h4>
                                        <div class="mt-auto">
                                            <span class="price" style="font-size: 18px; font-weight: bold; color: #333;">
                                                € {{ number_format($product->average_price, 2) }}
                                            </span>
                                            <div class="shop-list-btn mt-2">
                                                <a class="btn btn-sm btn-outline-dark btn-hover-primary w-100"
                                                    href="{{ route('product-details', encrypt($product->id)) }}">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Product End -->
                        @empty
                            <div class="col-12">
                                <div class="alert alert-info">
                                    <p>{{ __('Aucun produit disponible pour le moment.') }}</p>
                                </div>
                            </div>
                        @endforelse

                    </div>
                    <!-- Shop Wrapper End -->

                    <!--shop toolbar start-->
                    <div class="shop_toolbar_wrapper mt-10">

                        <!-- Shop Top Bar Left start -->
                        <div class="shop-top-bar-left">
                            <div class="shop-short-by mr-4">
                                <select class="nice-select rounded-0" aria-label=".form-select-sm example">
                                    <option selected>Show 12 Per Page</option>
                                    <option value="1">Show 12 Per Page</option>
                                    <option value="2">Show 24 Per Page</option>
                                    <option value="3">Show 15 Per Page</option>
                                </select>
                            </div>
                        </div>
                        <!-- Shop Top Bar Left end -->

                        <!-- Shopt Top Bar Right Start -->
                        <div class="shop-top-bar-right">
                            <nav>
                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link active" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Shopt Top Bar Right End -->

                    </div>
                    <!--shop toolbar end-->

                </div>
            </div>
        </div>
    </div>
    <!-- Shop Section End -->


@endsection