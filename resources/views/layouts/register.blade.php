<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="theme-color" content="#333">
    <title>Epelcon Global Healthcare: @yield('page_title')</title>
    <meta name="keywords"
          content="Epelcon, Halthcare, Herbalyn, LifePro Corrective Capsule Empowerment, Skills Acquisition, Training and Development, Vocational Training, Food, Halthcare, Life Seed Worldwide, MLM, Networking, Food Network ">
    <meta name="description"
          content="Epelcon Global Healthcare is a flexible and progressive community of Business Entrepreneurs with the sole mission of eradicatingUnemployment, Poor Nutrition and Healthcare by providing a platform for consistent and affordable  Skills Acquisition, Training and Developing, simplified distribution network of Food Supplies,Charity and Campaign against Hunger and Malnutrition.">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon.png')}}?v=3">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{asset('assets2/css/preload.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets2/css/plugins.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets2/css/style.light-blue-500.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets2/css/custom.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets2/css/width-boxed.min.css')}}" id="ms-boxed"
          disabled=""><!--[if lt IE 9]> <script src="{{asset('assets2/js/html5shiv.min.js')}}"></script> <script src="{{asset('assets2/js/respond.min.js')}}"></script> <![endif]-->{{--    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1910843246966412"--}}{{--            crossorigin="anonymous"></script>--}}
</head>
<body>@if(auth()->user() != null)
    <span class="hidden"
          style="display:none;">
        {{$pro_pix = auth()->user()->image == null? 'avatar2.png':auth()->user()->image}}</span>
@else
    <span class="hidden" style="display:none;">{{$pro_pix = 'avatar2.png'}}</span>
@endif
{{--<a href="javascript:void(0)"--}}{{--   class="ms-conf-btn ms-configurator-btn btn-circle btn-circle-raised btn-circle-primary animated rubberBand">--}}{{--    @if($pro_pix == "avatar2.png")--}}{{--        <i class="zmdi zmdi-menu"></i>--}}{{--    @else--}}{{--        <img src="{{asset('public/upload/profile/thumb/'.$pro_pix)}}" alt="" width="50"--}}{{--             class="img-circle img-responsive"--}}{{--             style="display: inline">--}}{{--    @endif--}}{{--</a>--}}{{--<a href="{{route('pay')}}"--}}{{--class=" ms-configurator-btn btn-circle btn-circle-raised btn-circle-royal animated rubberBand mt-4"--}}{{--style="margin-top:80px!important;">--}}{{--<i class="">Pay</i>--}}{{--</a>--}}{{--<a href="{{route('buypin')}}"--}}{{--class=" ms-configurator-btn btn-circle btn-circle-raised btn-circle-info animated rubberBand mt-4"--}}{{--style="margin-top:160px!important;">--}}{{--<i class="">PIN</i>--}}{{--</a>--}}
<div id="ms-configurator" class="ms-configurator">
    <div class="ms-configurator-title">
        <h3><i class="fa fa-gear"></i> Account</h3>
        <a href="javascript:void(0);" class="ms-conf-btn withripple">
            <i class="zmdi zmdi-close"></i>
        </a>
    </div>
    <div class="panel-group" id="accordion_conf" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <div class="text-center pt-1 pb-1">
                <img src="{{asset('public/upload/profile/thumb/'.$pro_pix)}}" alt="" width="50"
                     class="img-circle img-responsive" style="display: inline">
            </div>
            <div class="btn-group btn-group-justified btn-group-raised">@guest
                    <a href="{{route('login')}}" class="btn ">Login</a>
                    {{--<a href="#" class="btn ">Middle</a>--}} <a
                            href="{{route('register')}}" class="btn ">Register</a>
                @endguest @auth
                    <a href="{{route('dashboard')}}" class="btn ">{{ Auth::user()->username }}</a> <a
                            href="{{route('dashboard')}}" class="btn"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                @endauth</div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="ms-conf-header-color"><h4 class="panel-title"><a role="button"
                                                                                                       class="withripple"
                                                                                                       data-toggle="collapse"
                                                                                                       data-parent="#accordion_conf"
                                                                                                       href="#ms-collapse-conf-1"
                                                                                                       aria-expanded="true"
                                                                                                       aria-controls="ms-collapse-conf-1"><i
                                class="zmdi zmdi-menu"></i> Menu </a></h4></div>
            <div id="ms-collapse-conf-1" class="panel-collapse collapse in" role="tabpanel"
                 aria-labelledby="ms-conf-header-color">
                <div class="card">{{--<div class="card-header">{{ __('Login') }}</div>--}}
                    <div class="card-body">
                        <nav>
                            <ul class="nav navbar-dark  ms-navbar-white" style="list-style-type:none; ">
                                <li class="list-group-item"><a data-scroll href="{{url('index#home')}}"
                                                               class="ms-conf-btn withripple home_btn"><i
                                                class="fa fa-home side"></i>Home</a></li>
                                <li class="list-group-item"><a data-scroll href="{{url('index#about')}}"
                                                               class="ms-conf-btn withripple"><i
                                                class="fa fa-globe side"></i>About</a></li>
                                <li class="list-group-item"><a data-scroll href="{{url('index#features')}}"
                                                               class="ms-conf-btn withripple"><i
                                                class="zmdi zmdi-widgets side"></i>Packages</a></li>
                                <li class="list-group-item"><a data-scroll href="{{url('index#plan')}}"
                                                               class="ms-conf-btn withripple"><i
                                                class="zmdi zmdi-device-hub side"></i>Marketing Plan</a></li>
                                <li class="list-group-item"><a data-scroll href="{{url('index#support')}}"
                                                               class="ms-conf-btn withripple"><i
                                                class="fa fa-male side"></i>Support</a></li>
                                <li class="list-group-item"><a data-scroll href="{{route('guestshop')}}"
                                                               class="ms-conf-btn withripple"><i
                                                class="fa fa-shopping-cart side"></i>Shop</a></li>
                                <li class="list-group-item"><a data-scroll href="{{route('login')}}" id="register_btn"
                                                               class="register_link ms-conf-btn withripple register_btn"><i
                                                class="fa fa-user-plus side"></i>Sign-in</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="ms-conf-header-color"><h4 class="panel-title"><a role="button"
                                                                                                       class="withripple"
                                                                                                       data-toggle="collapse"
                                                                                                       data-parent="#accordion_conf"
                                                                                                       href="#ms-collapse-conf-0"
                                                                                                       aria-expanded="true"
                                                                                                       aria-controls="ms-collapse-conf-1"><i
                                class="zmdi zmdi-sign-in"></i> login </a>
                </h4>
            </div>
            <div id="ms-collapse-conf-0" class="panel-collapse collapse" role="tabpanel"
                 aria-labelledby="ms-conf-header-color">
                <div class="card">{{--<div class="card-header">{{ __('Login') }}</div>--}}
                    <div class="card-body ml-1 mr-1">
                        <form method="POST" action="{{ route('login') }}">@csrf
                            <div class="form-group row">{{--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>--}}
                                <div class="col-md-10"><input id="username_side" type="text"
                                                              placeholder="Enter Username"
                                                              class="form-control {{$errors->has('username' ? ' is-invalid': '')}}"
                                                              name="username" value="{{ old('username') }}" required
                                                              autocomplete="email"
                                                              autofocus>@if($errors->has('username'))
                                        <span class="invalid-feedback"
                                              role="alert"><strong>{{$errors->first('username')}}</strong></span>
                                    @endif</div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-10"><input id="password_side" type="password"
                                                              placeholder="Enter Password"
                                                              class="form-control {{$errors->has('password' ? ' is-invalid': '')}}"
                                                              name="password" required
                                                              autocomplete="current-password">@if($errors->has('password'))
                                        <span class="invalid-feedback"
                                              role="alert"><strong>{{$errors->first('password')}}</strong></span>
                                    @endif</div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-8 offset-md-4">
                                    <div class="form-check"><input class="form-check-input" type="checkbox"
                                                                   name="remember"
                                                                   id="remember" {{ old('remember') ? 'checked' : '' }}><label
                                                class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="">
                                    <button type="submit"
                                            class="btn btn-primary pull-right">{{ __('Login') }}</button>@if (Route::has('password.request'))
                                        <a class="btn btn-link"
                                           href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                                    @endif</div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="ms-preload" class="ms-preload">
    <div id="status">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>
</div>
<div class="sb-site-container" id="home"
     style="linear-gradient(90deg,rgb(136, 214, 244) 0%, rgb(194, 251, 218) 50%, rgb(255, 246, 171) 100%)!important">
    {{--@include('includes.web_pop_up_modal')--}}
    <div class="main" id="main"
         style="linear-gradient(90deg,rgb(136, 214, 244) 0%, rgb(194, 251, 218) 50%, rgb(255, 246, 171) 100%)!important ">
        @yield('content')
    </div>
    <div class="btn-back-top">
        <a href="#" data-scroll id="back-top"
           class="btn-circle btn-circle-primary btn-circle-sm btn-circle-raised ">
            <i class="zmdi zmdi-long-arrow-up"></i>
        </a>
    </div>
</div>
<!-- sb-site-container -->{{--<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js"></script>--}}
<script src="{{asset('assets2/js/plugins.min.js')}}"></script>
<script src="{{asset('assets2/js/app.min.js')}}"></script>
<script src="{{asset('assets2/js/configurator.min.js')}}"></script>
<script src="{{asset('assets2/js/lead-full.js')}}"></script>
<script src="{{asset('assets2/js/home-generic-7.js')}}"></script>
<script src="{{asset('assets2/js/component-carousels.js')}}"></script>
<script src="{{asset('assets2/js/overlay.js')}}"></script>
<script src="{{asset('assets2/js/custom.js')}}"></script>
<script src="{{asset('assets2/js/coming.js')}}"></script>
<script src="{{asset('assets/js/jquery.typewatch.js')}}"></script>
@include('includes.reg_js')
@include('includes.webjs')
</body>
</html>
