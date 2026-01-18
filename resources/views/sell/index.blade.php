@extends('layouts.seller')

    @section('page_title')
        Seller HQ
    @endsection

    @section('content')
        <header class="ms-hero-page ms-hero-img-keyboard ms-hero-bg-dark color-white">
            <div class="container index-1">
                <div class="col-md-6 text-center mt-4">
                    <div class="img-phone-container ">
                        <img class="img-responsive" src="{{asset('assets/img/seller/sell-online-nobg.png')}}">
                    </div>
                </div>

                <div class="col-md-6">
                    <h4 class="text-uppercase animated fadeInDown animation-delay-5 typed-title visible-xs">The power to Enjoy
                        <br>
                        <span class="color-primary typed-class">incredible sales</span>
                    </h4>
                    <h1 class="text-uppercase animated fadeInDown animation-delay-5 hidden-xs typed-title">The power to Enjoy
                        <br>
                        <span class="color-primary typed-class">incredible sales</span>
                    </h1>
                    <p class="lead lead-sm animated fadeInLeft animation-delay-7 color-light">Get your PRODUCT, SKILLS
                        &amp Services to unlimited customer base</p>
                    <ul class="ms-list-arrow">
                        <li class="animated fadeInUp animation-delay-7">Unlimited Product Categories.</li>
                        <li class="animated fadeInUp animation-delay-10">Ever growing Customer Base.</li>
                        <li class="animated fadeInUp animation-delay-13">Broad Spectrum of Features to increase sales.
                        </li>
                        <li class="animated fadeInUp animation-delay-16">Excellent Commission for all categories.</li>
                    </ul>
                    <div class="text-center">
                        <a href="{{route('member_sell')}}"
                           class="btn btn-raised btn-lg btn-white color-primary animated flipInX animation-delay-20">
                            <i class="zmdi zmdi-airplane"></i> Start Selling</a>
                        <a href="javascript:void(0)"
                           class="btn btn-raised btn-lg btn-warning animated flipInX animation-delay-24">
                            <i class="zmdi zmdi-info-outline"></i> Learn More</a>
                    </div>
                </div>
                {{--<div class="col-md-12">--}}
                    {{--<div class="text-center ms-margin">--}}
                        {{--<a href="javascript:void(0)"--}}
                           {{--class="btn btn-primary btn-raised btn-app wow flipInX animation-delay-20">--}}
                            {{--<div class="btn-container">--}}
                                {{--<i class="fa fa-cutlery"></i>--}}
                                {{--<span>Varieties of</span>--}}
                                {{--<br>--}}
                                {{--<strong>Food</strong>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                        {{--<a href="javascript:void(0)"--}}
                           {{--class="btn btn-primary btn-raised btn-app wow flipInX animation-delay-22">--}}
                            {{--<div class="btn-container">--}}
                                {{--<i class="fa fa-cog"></i>--}}
                                {{--<span>Skills</span>--}}
                                {{--<br>--}}
                                {{--<strong>Services</strong>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                        {{--<a href="javascript:void(0)"--}}
                           {{--class="btn btn-primary btn-raised btn-app wow flipInX animation-delay-24">--}}
                            {{--<div class="btn-container">--}}
                                {{--<i class="fa fa-shirtsinbulk"></i>--}}
                                {{--<span>Trending</span>--}}
                                {{--<br>--}}
                                {{--<strong>Fashion</strong>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                        {{--<a href="javascript:void(0)"--}}
                           {{--class="btn btn-primary btn-raised btn-app wow flipInX animation-delay-26">--}}
                            {{--<div class="btn-container">--}}
                                {{--<i class="fa fa-stethoscope"></i>--}}
                                {{--<span>Healthcare &amp</span>--}}
                                {{--<br>--}}
                                {{--<strong>Medicals</strong>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                        {{--<a href="javascript:void(0)"--}}
                           {{--class="btn btn-primary btn-raised btn-app wow flipInX animation-delay-28">--}}
                            {{--<div class="btn-container">--}}
                                {{--<i class="fa fa-car"></i>--}}
                                {{--<span>Cars &amp;</span>--}}
                                {{--<br>--}}
                                {{--<strong>Automobiles</strong>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
        </header>
        <div class="container mt-6">
            <div class="text-center mw-800 center-block mb-4">
                <h2 class="color-primary wow fadeInDown animation-delay-4">We know what you need</h2>
                <p class="lead wow fadeInDown animation-delay-4">
                    Discover our amazing sales platform with unlimited customer base for your Products and Services.
                </p>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="card card-royal wow zoomInUp animation-delay-5">
                        <div class="bg-royal">
                            <img src="{{asset('assets/img/demo/m1.png')}}" alt="..." class="img-avatar-circle">
                        </div>
                        <div class="card-block pt-4 text-center">
                            <h4 class="color-royal">Start Selling In Seconds</h4>
                            <p>Simple and easy to use Seller Center with rich feature for better service delivery</p>
                            <a href="javascript:void(0)" class="btn btn-royal" data-toggle="modal"
                               data-target="#ms-account-modal">
                                <i class="zmdi zmdi-star"></i> Start Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card card-danger wow zoomInUp animation-delay-6">
                        <div class="bg-danger">
                            <img src="{{asset('assets/img/demo/m2.png')}}" alt="..." class="img-avatar-circle"></div>
                        <div class="card-block pt-4 text-center">
                            <h4 class="color-danger">Standard Logistics</h4>
                            <p>Variety of Logistic options that allows your products reach the customers anywhere.</p>
                            <a href="javascript:void(0)" class="btn btn-danger" data-toggle="modal"
                               data-target="#ms-account-modal">
                                <i class="zmdi zmdi-star"></i> Start Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card card-warning wow zoomInUp animation-delay-7">
                        <div class="bg-warning">
                            <img src="{{asset('assets/img/demo/m3.png')}}" alt="..." class="img-avatar-circle"></div>
                        <div class="card-block pt-4 text-center">
                            <h4 class="color-warning">FULL Products Rights</h4>
                            <p>Enjoy secure and reliable products and property rights on all your dealings.</p>
                            <a href="javascript:void(0)" class="btn btn-warning" data-toggle="modal"
                               data-target="#ms-account-modal">
                                <i class="zmdi zmdi-star"></i>Begin Here</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card card-success wow zoomInUp animation-delay-8">
                        <div class="bg-success">
                            <img src="{{asset('assets/img/demo/m4.png')}}" alt="..." class="img-avatar-circle"></div>
                        <div class="card-block pt-4 text-center">
                            <h4 class="color-success">Excellent & 24/7 Support</h4>
                            <p>We are available to Support you all the way from Uploading to delivery.</p>
                            <a href="javascript:void(0)" class="btn btn-success" data-toggle="modal"
                               data-target="#ms-account-modal">
                                <i class="zmdi zmdi-star"></i> Begin here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="wrap ms-hero-page ms-hero-img-coffee ms-hero-bg-info ms-bg-fixed color-white mt-6">
            <div class="container">
                <h2 class="text-center fw-500 mb-6 wow fadeInDown animation-delay-2">Amazing Features</h2>
                <div class="row">
                    <div class="col-sm-6 col-md-3 wow fadeIn animation-delay-2">
                        <div class="text-center">
                            <div class="circle" id="circles-1"></div>
                            <h4 class="text-center">Take Pictures</h4>
                            <p class="small-font">Use your camera or phone to Snap your products.</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 wow fadeIn animation-delay-3">
                        <div class="text-center">
                            <div class="circle" id="circles-2"></div>
                            <h4 class="text-center">Upload Online</h4>
                            <p class="small-font">Upload your products with full support and guide.</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 wow fadeIn animation-delay-4">
                        <div class="text-center">
                            <div class="circle" id="circles-3"></div>
                            <h4 class="text-center">Describe your Products</h4>
                            <p class="small-font">Name, describe and cost your products.</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 wow fadeIn animation-delay-5">
                        <div class="text-center">
                            <div class="circle" id="circles-4"></div>
                            <h4 class="text-center">Live Online</h4>
                            <p class="small-font">Your products goes live and available for immediate sales.</p>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-6">
                    <a href="javascript:void(0)"
                       class="btn btn-raised btn-lg btn-white color-primary animated flipInX animation-delay-4">
                        <i class="zmdi zmdi-info"></i> Know More</a>
                    <a href="{{route('member_sell')}}"
                       class="btn btn-raised btn-lg btn-info animated flipInX animation-delay-6" data-toggle="modal"
                       data-target="#ms-account-modal">
                        <i class="zmdi zmdi-email"></i> Start Now</a>
                </div>
            </div>
        </section>
        {{--<section class="wrap bg-dark color-white">--}}
        {{--<div class="container">--}}
        {{--<h2 class="text-center mb-4">Some Categories</h2>--}}
        {{--<div class="mw-800 center-block mb-4">--}}
        {{--<ul class="nav nav-tabs nav-tabs-primary indicator-light nav-tabs-full nav-tabs-4" role="tablist">--}}
        {{--<li role="presentation" class="active filter" data-filter="all">--}}
        {{--<a class="withoutripple" href="#home7" aria-controls="home7" role="tab" data-toggle="tab">--}}
        {{--<i class="zmdi zmdi-desktop-mac"></i>--}}
        {{--<span class="hidden-xs">All</span>--}}
        {{--</a>--}}
        {{--</li>--}}
        {{--<li role="presentation" class="filter" data-filter=".category-1">--}}
        {{--<a class="withoutripple" href="#profile7" aria-controls="profile7" role="tab" data-toggle="tab">--}}
        {{--<i class="zmdi zmdi-language-html5"></i>--}}
        {{--<span class="hidden-xs">REALTORS</span>--}}
        {{--</a>--}}
        {{--</li>--}}
        {{--<li role="presentation" class="filter" data-filter=".category-2">--}}
        {{--<a class="withoutripple" href="#messages7" aria-controls="messages7" role="tab" data-toggle="tab">--}}
        {{--<i class="fa fa-wordpress"></i>--}}
        {{--<span class="hidden-xs">DIGITAL</span>--}}
        {{--</a>--}}
        {{--</li>--}}
        {{--<li role="presentation" class="filter" data-filter=".category-3">--}}
        {{--<a class="withoutripple" href="#settings7" aria-controls="settings7" role="tab" data-toggle="tab">--}}
        {{--<i class="zmdi zmdi-language-javascript"></i>--}}
        {{--<span class="hidden-xs">TRAVELS</span>--}}
        {{--</a>--}}
        {{--</li>--}}
        {{--</ul>--}}
        {{--</div>--}}
        {{--<div class="row" id="Container">--}}
        {{--<div class="col-md-4 col-sm-6 mix category-1 category-3">--}}
        {{--<div class="card">--}}
        {{--<figure class="ms-thumbnail">--}}
        {{--<img src="{{asset('assets/img/demo/port1.jpg')}}" alt="" class="img-responsive">--}}
        {{--<figcaption class="ms-thumbnail-caption text-center">--}}
        {{--<div class="ms-thumbnail-caption-content">--}}
        {{--<h4 class="ms-thumbnail-caption-title mb-2">Travels & Tours</h4>--}}
        {{--<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mr-1 btn-circle-white color-danger">--}}
        {{--<i class="zmdi zmdi-favorite"></i>--}}
        {{--</a>--}}
        {{--<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs ml-1 mr-1 btn-circle-white color-warning">--}}
        {{--<i class="zmdi zmdi-star"></i>--}}
        {{--</a>--}}
        {{--<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs ml-1 btn-circle-white color-success">--}}
        {{--<i class="zmdi zmdi-share"></i>--}}
        {{--</a>--}}
        {{--</div>--}}
        {{--</figcaption>--}}
        {{--</figure>--}}
        {{--<div class="card-block text-center portfolio-item-caption hidden">--}}
        {{--<h3 class="color-primary no-mt">Lorem ipsum dolor</h3>--}}
        {{--<p>Explicabo consequatur quidem praesentium quas qui eius ina Cupiditate ratione sint.</p>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<!-- item -->--}}
        {{--<div class="col-md-4 col-sm-6 mix category-2">--}}
        {{--<div class="card">--}}
        {{--<figure class="ms-thumbnail">--}}
        {{--<img src="{{asset('assets/img/demo/port2.jpg')}}" alt="" class="img-responsive">--}}
        {{--<figcaption class="ms-thumbnail-caption text-center">--}}
        {{--<div class="ms-thumbnail-caption-content">--}}
        {{--<h4 class="ms-thumbnail-caption-title mb-2">Digital photography and Life</h4>--}}
        {{--<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mr-1 btn-circle-white color-danger">--}}
        {{--<i class="zmdi zmdi-favorite"></i>--}}
        {{--</a>--}}
        {{--<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs ml-1 mr-1 btn-circle-white color-warning">--}}
        {{--<i class="zmdi zmdi-star"></i>--}}
        {{--</a>--}}
        {{--<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs ml-1 btn-circle-white color-success">--}}
        {{--<i class="zmdi zmdi-share"></i>--}}
        {{--</a>--}}
        {{--</div>--}}
        {{--</figcaption>--}}
        {{--</figure>--}}
        {{--<div class="card-block text-center portfolio-item-caption hidden">--}}
        {{--<h3 class="color-primary no-mt">Lorem ipsum dolor</h3>--}}
        {{--<p>Explicabo consequatur quidem praesentium quas qui eius ina Cupiditate ratione sint.</p>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<!-- item -->--}}
        {{--<div class="col-md-4 col-sm-6 mix category-3">--}}
        {{--<div class="card">--}}
        {{--<figure class="ms-thumbnail">--}}
        {{--<img src="{{asset('assets/img/demo/port3.jpg')}}" alt="" class="img-responsive">--}}
        {{--<figcaption class="ms-thumbnail-caption text-center">--}}
        {{--<div class="ms-thumbnail-caption-content">--}}
        {{--<h4 class="ms-thumbnail-caption-title mb-2">Travels and Bookings</h4>--}}
        {{--<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mr-1 btn-circle-white color-danger">--}}
        {{--<i class="zmdi zmdi-favorite"></i>--}}
        {{--</a>--}}
        {{--<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs ml-1 mr-1 btn-circle-white color-warning">--}}
        {{--<i class="zmdi zmdi-star"></i>--}}
        {{--</a>--}}
        {{--<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs ml-1 btn-circle-white color-success">--}}
        {{--<i class="zmdi zmdi-share"></i>--}}
        {{--</a>--}}
        {{--</div>--}}
        {{--</figcaption>--}}
        {{--</figure>--}}
        {{--<div class="card-block text-center portfolio-item-caption hidden">--}}
        {{--<h3 class="color-primary no-mt">ICT and Online Services</h3>--}}
        {{--<p>Explicabo consequatur quidem praesentium quas qui eius ina Cupiditate ratione sint.</p>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<!-- item -->--}}
        {{--<div class="col-md-4 col-sm-6 mix category-2">--}}
        {{--<div class="card">--}}
        {{--<figure class="ms-thumbnail">--}}
        {{--<img src="{{asset('assets/img/demo/port4.jpg')}}" alt="" class="img-responsive">--}}
        {{--<figcaption class="ms-thumbnail-caption text-center">--}}
        {{--<div class="ms-thumbnail-caption-content">--}}
        {{--<h4 class="ms-thumbnail-caption-title mb-2">ICT and Online Services</h4>--}}
        {{--<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mr-1 btn-circle-white color-danger">--}}
        {{--<i class="zmdi zmdi-favorite"></i>--}}
        {{--</a>--}}
        {{--<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs ml-1 mr-1 btn-circle-white color-warning">--}}
        {{--<i class="zmdi zmdi-star"></i>--}}
        {{--</a>--}}
        {{--<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs ml-1 btn-circle-white color-success">--}}
        {{--<i class="zmdi zmdi-share"></i>--}}
        {{--</a>--}}
        {{--</div>--}}
        {{--</figcaption>--}}
        {{--</figure>--}}
        {{--<div class="card-block text-center portfolio-item-caption hidden">--}}
        {{--<h3 class="color-primary no-mt">Real Estate and Luxury</h3>--}}
        {{--<p>Explicabo consequatur quidem praesentium quas qui eius ina Cupiditate ratione sint.</p>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<!-- item -->--}}
        {{--<div class="col-md-4 col-sm-6 mix category-1">--}}
        {{--<div class="card">--}}
        {{--<figure class="ms-thumbnail">--}}
        {{--<img src="{{asset('assets/img/demo/port5.jpg')}}" alt="" class="img-responsive">--}}
        {{--<figcaption class="ms-thumbnail-caption text-center">--}}
        {{--<div class="ms-thumbnail-caption-content">--}}
        {{--<h4 class="ms-thumbnail-caption-title mb-2">Real Estate and Luxury</h4>--}}
        {{--<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mr-1 btn-circle-white color-danger">--}}
        {{--<i class="zmdi zmdi-favorite"></i>--}}
        {{--</a>--}}
        {{--<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs ml-1 mr-1 btn-circle-white color-warning">--}}
        {{--<i class="zmdi zmdi-star"></i>--}}
        {{--</a>--}}
        {{--<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs ml-1 btn-circle-white color-success">--}}
        {{--<i class="zmdi zmdi-share"></i>--}}
        {{--</a>--}}
        {{--</div>--}}
        {{--</figcaption>--}}
        {{--</figure>--}}
        {{--<div class="card-block text-center portfolio-item-caption hidden">--}}
        {{--<h3 class="color-primary no-mt">Lorem ipsum dolor</h3>--}}
        {{--<p>Explicabo consequatur quidem praesentium quas qui eius ina Cupiditate ratione sint.</p>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<!-- item -->--}}
        {{--<div class="col-md-4 col-sm-6 mix category-3">--}}
        {{--<div class="card">--}}
        {{--<figure class="ms-thumbnail">--}}
        {{--<img src="{{asset('assets/img/demo/port6.jpg')}}" alt="" class="img-responsive">--}}
        {{--<figcaption class="ms-thumbnail-caption text-center">--}}
        {{--<div class="ms-thumbnail-caption-content">--}}
        {{--<h4 class="ms-thumbnail-caption-title mb-2">Creative Arts and Imagery</h4>--}}
        {{--<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mr-1 btn-circle-white color-danger">--}}
        {{--<i class="zmdi zmdi-favorite"></i>--}}
        {{--</a>--}}
        {{--<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs ml-1 mr-1 btn-circle-white color-warning">--}}
        {{--<i class="zmdi zmdi-star"></i>--}}
        {{--</a>--}}
        {{--<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs ml-1 btn-circle-white color-success">--}}
        {{--<i class="zmdi zmdi-share"></i>--}}
        {{--</a>--}}
        {{--</div>--}}
        {{--</figcaption>--}}
        {{--</figure>--}}
        {{--<div class="card-block text-center portfolio-item-caption hidden">--}}
        {{--<h3 class="color-primary no-mt">Lorem ipsum dolor</h3>--}}
        {{--<p>Explicabo consequatur quidem praesentium quas qui eius ina Cupiditate ratione sint.</p>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<!-- item -->--}}
        {{--<div class="col-md-4 col-sm-6 mix category-2">--}}
        {{--<div class="card">--}}
        {{--<figure class="ms-thumbnail">--}}
        {{--<img src="{{asset('assets/img/demo/port7.jpg')}}" alt="" class="img-responsive">--}}
        {{--<figcaption class="ms-thumbnail-caption text-center">--}}
        {{--<div class="ms-thumbnail-caption-content">--}}
        {{--<h4 class="ms-thumbnail-caption-title mb-2">Real Estate</h4>--}}
        {{--<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mr-1 btn-circle-white color-danger">--}}
        {{--<i class="zmdi zmdi-favorite"></i>--}}
        {{--</a>--}}
        {{--<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs ml-1 mr-1 btn-circle-white color-warning">--}}
        {{--<i class="zmdi zmdi-star"></i>--}}
        {{--</a>--}}
        {{--<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs ml-1 btn-circle-white color-success">--}}
        {{--<i class="zmdi zmdi-share"></i>--}}
        {{--</a>--}}
        {{--</div>--}}
        {{--</figcaption>--}}
        {{--</figure>--}}
        {{--<div class="card-block text-center portfolio-item-caption hidden">--}}
        {{--<h3 class="color-primary no-mt">Lorem ipsum dolor</h3>--}}
        {{--<p>Explicabo consequatur quidem praesentium quas qui eius ina Cupiditate ratione sint.</p>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<!-- item -->--}}
        {{--<div class="col-md-4 col-sm-6 mix category-1">--}}
        {{--<div class="card">--}}
        {{--<figure class="ms-thumbnail">--}}
        {{--<img src="{{asset('assets/img/demo/port8.jpg')}}" alt="" class="img-responsive">--}}
        {{--<figcaption class="ms-thumbnail-caption text-center">--}}
        {{--<div class="ms-thumbnail-caption-content">--}}
        {{--<h4 class="ms-thumbnail-caption-title mb-2">Beauty and Fashion</h4>--}}
        {{--<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mr-1 btn-circle-white color-danger">--}}
        {{--<i class="zmdi zmdi-favorite"></i>--}}
        {{--</a>--}}
        {{--<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs ml-1 mr-1 btn-circle-white color-warning">--}}
        {{--<i class="zmdi zmdi-star"></i>--}}
        {{--</a>--}}
        {{--<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs ml-1 btn-circle-white color-success">--}}
        {{--<i class="zmdi zmdi-share"></i>--}}
        {{--</a>--}}
        {{--</div>--}}
        {{--</figcaption>--}}
        {{--</figure>--}}
        {{--<div class="card-block text-center portfolio-item-caption hidden">--}}
        {{--<h3 class="color-primary no-mt">Lorem ipsum dolor</h3>--}}
        {{--<p>Explicabo consequatur quidem praesentium quas qui eius ina Cupiditate ratione sint.</p>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<!-- item -->--}}
        {{--<div class="col-md-4 col-sm-6 mix category-3">--}}
        {{--<div class="card">--}}
        {{--<figure class="ms-thumbnail">--}}
        {{--<img src="{{asset('assets/img/demo/port9.jpg')}}" alt="" class="img-responsive">--}}
        {{--<figcaption class="ms-thumbnail-caption text-center">--}}
        {{--<div class="ms-thumbnail-caption-content">--}}
        {{--<h4 class="ms-thumbnail-caption-title mb-2">Hotels and Reservations</h4>--}}
        {{--<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mr-1 btn-circle-white color-danger">--}}
        {{--<i class="zmdi zmdi-favorite"></i>--}}
        {{--</a>--}}
        {{--<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs ml-1 mr-1 btn-circle-white color-warning">--}}
        {{--<i class="zmdi zmdi-star"></i>--}}
        {{--</a>--}}
        {{--<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs ml-1 btn-circle-white color-success">--}}
        {{--<i class="zmdi zmdi-share"></i>--}}
        {{--</a>--}}
        {{--</div>--}}
        {{--</figcaption>--}}
        {{--</figure>--}}
        {{--<div class="card-block text-center portfolio-item-caption hidden">--}}
        {{--<h3 class="color-primary no-mt">Lorem ipsum dolor</h3>--}}
        {{--<p>Explicabo consequatur quidem praesentium quas qui eius ina Cupiditate ratione sint.</p>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<!-- item -->--}}
        {{--<div class="col-md-4 col-sm-6 mix category-2">--}}
        {{--<div class="card">--}}
        {{--<figure class="ms-thumbnail">--}}
        {{--<img src="{{asset('assets/img/demo/port10.jpg')}}" alt="" class="img-responsive">--}}
        {{--<figcaption class="ms-thumbnail-caption text-center">--}}
        {{--<div class="ms-thumbnail-caption-content">--}}
        {{--<h4 class="ms-thumbnail-caption-title mb-2">Lorem ipsum dolor</h4>--}}
        {{--<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mr-1 btn-circle-white color-danger">--}}
        {{--<i class="zmdi zmdi-favorite"></i>--}}
        {{--</a>--}}
        {{--<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs ml-1 mr-1 btn-circle-white color-warning">--}}
        {{--<i class="zmdi zmdi-star"></i>--}}
        {{--</a>--}}
        {{--<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs ml-1 btn-circle-white color-success">--}}
        {{--<i class="zmdi zmdi-share"></i>--}}
        {{--</a>--}}
        {{--</div>--}}
        {{--</figcaption>--}}
        {{--</figure>--}}
        {{--<div class="card-block text-center portfolio-item-caption hidden">--}}
        {{--<h3 class="color-primary no-mt">Lorem ipsum dolor</h3>--}}
        {{--<p>Explicabo consequatur quidem praesentium quas qui eius ina Cupiditate ratione sint.</p>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<!-- item -->--}}
        {{--<div class="col-md-4 col-sm-6 mix category-1">--}}
        {{--<div class="card">--}}
        {{--<figure class="ms-thumbnail">--}}
        {{--<img src="{{asset('assets/img/demo/port11.jpg')}}" alt="" class="img-responsive">--}}
        {{--<figcaption class="ms-thumbnail-caption text-center">--}}
        {{--<div class="ms-thumbnail-caption-content">--}}
        {{--<h4 class="ms-thumbnail-caption-title mb-2">Photography and Life</h4>--}}
        {{--<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mr-1 btn-circle-white color-danger">--}}
        {{--<i class="zmdi zmdi-favorite"></i>--}}
        {{--</a>--}}
        {{--<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs ml-1 mr-1 btn-circle-white color-warning">--}}
        {{--<i class="zmdi zmdi-star"></i>--}}
        {{--</a>--}}
        {{--<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs ml-1 btn-circle-white color-success">--}}
        {{--<i class="zmdi zmdi-share"></i>--}}
        {{--</a>--}}
        {{--</div>--}}
        {{--</figcaption>--}}
        {{--</figure>--}}
        {{--<div class="card-block text-center portfolio-item-caption hidden">--}}
        {{--<h3 class="color-primary no-mt">Lorem ipsum dolor</h3>--}}
        {{--<p>Explicabo consequatur quidem praesentium quas qui eius ina Cupiditate ratione sint.</p>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<!-- item -->--}}
        {{--<div class="col-md-4 col-sm-6 mix category-2">--}}
        {{--<div class="card">--}}
        {{--<figure class="ms-thumbnail">--}}
        {{--<img src="{{asset('assets/img/demo/port12.jpg')}}" alt="" class="img-responsive">--}}
        {{--<figcaption class="ms-thumbnail-caption text-center">--}}
        {{--<div class="ms-thumbnail-caption-content">--}}
        {{--<h4 class="ms-thumbnail-caption-title mb-2">Relaxation and Adventures</h4>--}}
        {{--<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs mr-1 btn-circle-white color-danger">--}}
        {{--<i class="zmdi zmdi-favorite"></i>--}}
        {{--</a>--}}
        {{--<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs ml-1 mr-1 btn-circle-white color-warning">--}}
        {{--<i class="zmdi zmdi-star"></i>--}}
        {{--</a>--}}
        {{--<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-xs ml-1 btn-circle-white color-success">--}}
        {{--<i class="zmdi zmdi-share"></i>--}}
        {{--</a>--}}
        {{--</div>--}}
        {{--</figcaption>--}}
        {{--</figure>--}}
        {{--<div class="card-block text-center portfolio-item-caption hidden">--}}
        {{--<h3 class="color-primary no-mt">Lorem ipsum dolor</h3>--}}
        {{--<p>Explicabo consequatur quidem praesentium quas qui eius ina Cupiditate ratione sint.</p>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<!-- item -->--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</section>--}}
    <!-- container -->

    @endsection