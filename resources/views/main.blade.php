@extends('layouts.default')
@section('content')
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 text-center">
                    <h1 class="display-4 mb-4">{{ __('messages.hero_title') }}</h1>
                    <p class="lead mb-4">{{ __('messages.hero_subtitle') }}</p>
                    <a href="{{ route('posts.index') }}" class="btn btn-primary btn-lg">{{ __('messages.hero_join_now') }}</a>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('images/assets/1.jpg') }}" class="img-fluid" alt="{{ __('messages.hero_alt_text') }}">
                </div>
            </div>
        </div>
    </section>

    <section class="about-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="section-title text-center mb-4">{{ __('messages.about_title') }}</h2>
                    <p class="text-muted text-center">{{ __('messages.about_description') }}</p>
                    <div class="row mt-5">
                        <div class="col-md-6">
                            <img src="{{ asset('images/assets/2.jpg') }}" class="img-fluid mb-3" alt="{{ __('messages.about_image1_alt') }}">
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('images/assets/3.jpg') }}" class="img-fluid mb-3" alt="{{ __('messages.about_image2_alt') }}">
                        </div>
                    </div>
                    <p class="text-muted text-center">{{ __('messages.about_join_community') }}</p>
                    <div class="text-center mt-5">
                        <a href="{{ route('posts.index') }}" class="btn btn-primary btn-lg">{{ __('messages.hero_join_now') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="features-section py-5">
        <div class="container">
            <h2 class="section-title text-center mb-5">{{ __('messages.features_title') }}</h2>
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="text-center">
                        <div class="icon-circle mb-3">
                            <i class="bi bi-globe2"></i>
                        </div>
                        <h4 class="mb-3">{{ __('messages.feature1_title') }}</h4>
                        <p class="text-muted">{{ __('messages.feature1_description') }}</p>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="text-center">
                        <div class="icon-circle mb-3">
                            <i class="bi bi-camera"></i>
                        </div>
                        <h4 class="mb-3">{{ __('messages.feature2_title') }}</h4>
                        <p class="text-muted">{{ __('messages.feature2_description') }}</p>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="text-center">
                        <div class="icon-circle mb-3">
                            <i class="bi bi-share"></i>
                        </div>
                        <h4 class="mb-3">{{ __('messages.feature3_title') }}</h4>
                        <p class="text-muted">{{ __('messages.feature3_description') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonial-section py-5">
        <div class="container">
            <h2 class="section-title text-center mb-5">{{ __('messages.testimonials_title') }}</h2>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="testimonial">
                        <blockquote class="mb-4">
                            <p class="text-muted">{{ __('messages.quote') }}</p>
                        </blockquote>
                        <p class="testimonial-author">{{ __('messages.author') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-section py-5">
        <div class="container text-center">
            <h2 class="mb-4">{{ __('messages.cta_title') }}</h2>
            <p class="text-muted mb-4">{{ __('messages.cta_description') }}</p>

            @guest
                @if (Route::has('login'))
                    <a class="btn btn-outline-primary me-2" href="{{ route('login') }}">{{ __('messages.Login') }}</a>
                @endif

                @if (Route::has('register'))
                    <a class="btn btn-primary" href="{{ route('register') }}">{{ __('messages.Register') }}</a>
                @endif
            @endguest
{{--            <a href="{{ route('register') }}" class="btn btn-primary btn-lg">{{ __('messages.cta_join_now') }}</a>--}}

        </div>
    </section>
@endsection
