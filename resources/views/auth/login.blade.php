@extends('layout.template')

@section('contenu')
<!-- Breadcrumb Section Start -->
<div class="section">

<!-- Login Section Start -->
<div class="section section-margin">
    <div class="container">

        <div class="row mb-n10">
            <div class="col-lg-6 col-md-8 mx-auto pb-10">
                <!-- Login Wrapper Start -->
                <div class="login-wrapper">

                    <!-- Login Title & Content Start -->
                    <div class="section-content text-center mb-5">
                        <h2 class="title mb-2">Login</h2>
                        <p class="desc-content">Please login using account detail bellow.</p>
                    </div>
                    <!-- Login Title & Content End -->

                    @if (session('status'))
                        <div class="alert alert-success mb-4" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger mb-4" role="alert">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Form Action Start -->
                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        <!-- Input Email Start -->
                        <div class="single-input-item mb-3">
                            <input type="email" 
                                   name="email" 
                                   placeholder="Email" 
                                   value="{{ old('email') }}"
                                   required 
                                   autofocus
                                   autocomplete="username"
                                   class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Input Email End -->

                        <!-- Input Password Start -->
                        <div class="single-input-item mb-3">
                            <input type="password" 
                                   name="password" 
                                   placeholder="Enter your Password"
                                   required
                                   autocomplete="current-password"
                                   class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Input Password End -->

                        <!-- Checkbox/Forget Password Start -->
                        <div class="single-input-item mb-3">
                            <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                <div class="remember-meta mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" 
                                               name="remember" 
                                               class="custom-control-input" 
                                               id="rememberMe">
                                        <label class="custom-control-label" for="rememberMe">Remember Me</label>
                                    </div>
                                </div>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="forget-pwd mb-3">Forget Password?</a>
                                @endif
                            </div>
                        </div>
                        <!-- Checkbox/Forget Password End -->

                        <!-- Login Button Start -->
                        <div class="single-input-item mb-3 d-flex justify-content-center">
                            <button type="submit" class="btn btn btn-dark btn-hover-primary rounded-3 w-75 py-3">Login</button>
                        </div>
                        <!-- Login Button End -->

                        <!-- Lost Password & Create New Account Start -->
                    <!-- Form Action End -->

                </div>
                <!-- Login Wrapper End -->
            </div>
        </div>

    </div>
</div>
<!-- Login Section End -->
@endsection
