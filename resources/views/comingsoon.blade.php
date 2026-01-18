@extends('layouts.register')

@section('content')
    <div class="bg-full-page ms-hero-img-city2 ms-hero-bg-primary back-fixed">
        <div class="mw-500 absolute-center">
            <header class="text-center mb-2">
                <span class="ms-logo ms-logo-lg ms-logo-white center-block mb-2 mt-2 animated zoomInDown animation-delay-5">
                    <img src="{{asset('assets/img/logos/logo3.png')}}" alt=""  class="img-responsive img-circle">
                </span>
                <h1 class="no-m ms-site-title color-white center-block ms-site-title-lg mt-2 animated zoomInDown animation-delay-5">
                    epelcon
                    <span>Countdown</span>
                </h1>
            </header>
            <div class="card animated zoomInUp animation-delay-7 color-primary withripple">
                <div class="card-block">
                    <div class="text-center color-dark">
                        <h1 class="color-primary text-big">Coming Soon</h1>
                        <div id="ms-countdown"></div>
                        <p class="lead lead-sm">epelcon in collaboration with LIBERTY GRANTS flags off her
                            Child Education Support in April. Stay Tuned.</p>
                        <form>
                            <div class="form-group label-floating mt-2 mb-1">
                                <div class="input-group center-block">
                                    <label class="control-label" for="ms-subscribe">
                                        <i class="zmdi zmdi-email"></i> Email Adress</label>
                                    <input type="email" id="ms-subscribe" class="form-control"></div>
                            </div>
                            <button class="btn btn-raised btn-primary btn-block" type="button">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
