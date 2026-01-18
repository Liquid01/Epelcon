// <!DOCTYPE html>
//
// <html lang="en">
//
//     <head>
//
//     <meta charset="utf-8">
//
//     <meta http-equiv="X-UA-Compatible" content="IE=edge">
//
//     <meta name="viewport" content="width=device-width, initial-scale=1">
//
//     <meta name="viewport"
//
// content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
//
//     <meta name="theme-color" content="#333">
//
//     <title>Epelcon Global: @yield('page_title')</title>
//
// {{--    <meta name="keywords"--}}
// {{--          content="Lifeseed, Life Seed, Lifeseed Worldwide, Empowerment, Skills Acquisition, Training and Development, Vocational Training, Food, Halthcare, Life Seed Worldwide, MLM, Networking, Food Network ">--}}
//
// {{--    <meta name="description"--}}
// {{--          content="LifeSeed Worldwide is a flexible and progressive community of Business Entrepreneurs with the sole mission of eradicatingUnemployment, Poor Nutrition and Healthcare by providing a platform for consistent and affordable  Skills Acquisition, Training and Developing, simplified distribution network of Food Supplies,Charity and Campaign against Hunger and Malnutrition.">--}}
//
// <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets2/img/logos/favicon.png')}}?v=3">
//
//     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
//
//         <link rel="stylesheet" href="{{asset('assets2/css/preload.min.css')}}"/>
//
//         <link rel="stylesheet" href="{{asset('assets2/css/plugins.min.css')}}"/>
//
//         <link rel="stylesheet" href="{{asset('assets2/css/style.light-blue-500.min.css')}}"/>
//
//         <link rel="stylesheet" href="{{asset('assets2/css/custom.css')}}"/>
//
//         <link rel="stylesheet" href="{{asset('assets2/css/width-boxed.min.css')}}" id="ms-boxed" disabled="">
//
//             <!--[if lt IE 9]>
//
//             <script src="{{asset('assets2/js/html5shiv.min.js')}}"></script>
//
//             <script src="{{asset('assets2/js/respond.min.js')}}"></script>
//
//             <![endif]-->
//             <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1910843246966412"
//                     crossorigin="anonymous"></script>
//         </head>
//
//         <body>
//
//         @if(auth()->user() != null)
//         <span class="hidden"
//               style="display:none;">{{$pro_pix = auth()->user()->image == null? 'avatar2.png':auth()->user()->image}}</span>
//         @else
//         <span class="hidden" style="display:none;">
//         {{$pro_pix = 'avatar2.png'}}
//     </span>
//         @endif
//
//
//         {{--<a href="javascript:void(0)"--}}
//         {{--   class="ms-conf-btn ms-configurator-btn btn-circle btn-circle-raised btn-circle-primary animated rubberBand">--}}
//         {{--    @if($pro_pix == "avatar2.png")--}}
//         {{--        <i class="zmdi zmdi-menu"></i>--}}
//         {{--    @else--}}
//         {{--        <img src="{{asset('public/upload/profile/thumb/'.$pro_pix)}}" alt="" width="50"--}}
//         {{--             class="img-circle img-responsive"--}}
//         {{--             style="display: inline">--}}
//         {{--    @endif--}}
//         {{--</a>--}}
//
//         {{--<a href="{{route('pay')}}"--}}
//         {{--class=" ms-configurator-btn btn-circle btn-circle-raised btn-circle-royal animated rubberBand mt-4"--}}
//         {{--style="margin-top:80px!important;">--}}
//         {{--<i class="">Pay</i>--}}
//         {{--</a>--}}
//
//         {{--<a href="{{route('buypin')}}"--}}
//         {{--class=" ms-configurator-btn btn-circle btn-circle-raised btn-circle-info animated rubberBand mt-4"--}}
//         {{--style="margin-top:160px!important;">--}}
//         {{--<i class="">PIN</i>--}}
//         {{--</a>--}}
//
//         <div id="ms-configurator" class="ms-configurator">
//
//             <div class="ms-configurator-title">
//
//                 <h3>
//
//                     <i class="fa fa-gear"></i> Account
//
//                 </h3>
//
//                 <a href="javascript:void(0);" class="ms-conf-btn withripple">
//
//                     <i class="zmdi zmdi-close"></i>
//
//                 </a>
//
//             </div>
//
//             <div class="panel-group" id="accordion_conf" role="tablist" aria-multiselectable="true">
//
//                 <div class="panel panel-default">
//
//                     <div class="text-center pt-1 pb-1">
//
//                         <img src="{{asset('public/upload/profile/thumb/'.$pro_pix)}}" alt="" width="50"
//
//                              class="img-circle img-responsive"
//
//                              style="display: inline">
//
//                     </div>
//
//
//                     <div class="btn-group btn-group-justified btn-group-raised">
//
//                         @guest
//
//                         <a href="{{route('login')}}" class="btn ">Login</a>
//
//                         {{--<a href="#" class="btn ">Middle</a>--}}
//
//                         <a href="{{route('register')}}" class="btn ">Register</a>
//
//                         @endguest
//
//                         @auth
//
//                         <a href="{{route('dashboard')}}" class="btn ">{{ Auth::user()->username }}</a>
//                         <a href="{{route('dashboard')}}" class="btn"
//                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
//
//                         @endauth
//
//                     </div>
//
//                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
//
//
//                 </div>
//
//                 <div class="panel panel-default">
//
//                     <div class="panel-heading" role="tab" id="ms-conf-header-color">
//
//                         <h4 class="panel-title">
//
//                             <a role="button" class="withripple" data-toggle="collapse" data-parent="#accordion_conf"
//
//                                href="#ms-collapse-conf-1" aria-expanded="true" aria-controls="ms-collapse-conf-1">
//
//                                 <i class="zmdi zmdi-menu"></i> Menu </a>
//
//                         </h4>
//
//                     </div>
//
//                     <div id="ms-collapse-conf-1" class="panel-collapse collapse in" role="tabpanel"
//
//                          aria-labelledby="ms-conf-header-color">
//
//                         <div class="card">
//
//                             {{--<div class="card-header">{{ __('Login') }}</div>--}}
//
//
//                             <div class="card-body">
//
//                                 <nav>
//
//                                     <ul class="nav navbar-dark  ms-navbar-white" style="list-style-type:none; ">
//
//                                         <li class="list-group-item">
//
//                                             <a data-scroll href="{{url('index#home')}}" class="ms-conf-btn withripple home_btn"><i
//                                                 class="fa fa-home side"></i>Home</a>
//
//                                         </li>
//
//                                         <li class="list-group-item">
//
//                                             <a data-scroll href="{{url('index#about')}}" class="ms-conf-btn withripple"><i
//                                                 class="fa fa-globe side"></i>About</a>
//
//                                         </li>
//
//                                         <li class="list-group-item">
//
//                                             <a data-scroll href="{{url('index#features')}}" class="ms-conf-btn withripple"><i
//                                                 class="zmdi zmdi-widgets side"></i>Packages</a>
//
//                                         </li>
//
//                                         <li class="list-group-item">
//
//                                             <a data-scroll href="{{url('index#plan')}}" class="ms-conf-btn withripple"><i
//                                                 class="zmdi zmdi-device-hub side"></i>Marketing Plan</a>
//
//                                         </li>
//
//                                         <li class="list-group-item">
//
//                                             <a data-scroll href="{{url('index#support')}}" class="ms-conf-btn withripple"><i
//                                                 class="fa fa-male side"></i>Support</a>
//
//                                         </li>
//
//                                         <li class="list-group-item">
//
//                                             <a data-scroll href="{{route('guestshop')}}" class="ms-conf-btn withripple"><i
//                                                 class="fa fa-shopping-cart side"></i>Shop</a>
//
//                                         </li>
//
//                                         <li class="list-group-item">
//
//                                             <a data-scroll href="{{route('login')}}" id="register_btn"
//                                                class="register_link ms-conf-btn withripple register_btn"><i
//                                                 class="fa fa-user-plus side"></i>Sign-in</a>
//
//                                         </li>
//
//                                         {{--<li>--}}
//
//                                         {{--<!-- Right Side Of Navbar -->--}}
//
//                                         {{--<ul class="navbar-nav ml-auto">--}}
//
//                                         {{--<!-- Authentication Links -->--}}
//
//                                         {{--@guest--}}
//
//                                         {{--<li class="nav-item">--}}
//
//                                         {{--<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
//
//                                         {{--</li>--}}
//
//                                         {{--@if (Route::has('register'))--}}
//
//                                         {{--<li class="nav-item">--}}
//
//                                         {{--<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
//
//                                         {{--</li>--}}
//
//                                         {{--@endif--}}
//
//                                         {{--@else--}}
//
//                                         {{--<li class="nav-item dropdown">--}}
//
//                                         {{--<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
//
//                                         {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
//
//                                         {{--</a>--}}
//
//
//
//                                         {{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
//
//                                         {{--<a class="dropdown-item" href="{{ route('logout') }}"--}}
//
//                                         {{--onclick="event.preventDefault();--}}
//
//                                         {{--document.getElementById('logout-form').submit();">--}}
//
//                                         {{--{{ __('Logout') }}--}}
//
//                                         {{--</a>--}}
//
//
//
//                                         {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
//
//                                         {{--@csrf--}}
//
//                                         {{--</form>--}}
//
//                                         {{--</div>--}}
//
//                                         {{--</li>--}}
//
//                                         {{--@endguest--}}
//
//                                         {{--</ul>--}}
//
//                                         {{--</li>--}}
//
//                                             </ul>
//
//                                             </nav>
//
//                                             </div>
//
//                                             </div>
//
//                                             </div>
//
//                                             </div>
//
//                                             <div class="panel panel-default">
//
//                                             <div class="panel-heading" role="tab" id="ms-conf-header-color">
//
//                                             <h4 class="panel-title">
//
//                                             <a role="button" class="withripple" data-toggle="collapse" data-parent="#accordion_conf"
//
//                                             href="#ms-collapse-conf-0" aria-expanded="true" aria-controls="ms-collapse-conf-1">
//
//                                             <i class="zmdi zmdi-sign-in"></i> login </a>
//
//                                             </h4>
//
//                                             </div>
//
//                                             <div id="ms-collapse-conf-0" class="panel-collapse collapse" role="tabpanel"
//
//                                             aria-labelledby="ms-conf-header-color">
//
//                                             <div class="card">
//
//                                         {{--<div class="card-header">{{ __('Login') }}</div>--}}
//
//
//                                             <div class="card-body ml-1 mr-1">
//
//                                             <form method="POST" action="{{ route('login') }}">
//
//                                             @csrf
//
//                                             <div class="form-group row">
//
//                                         {{--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>--}}
//
//
//                                             <div class="col-md-10">
//
//                                             <input id="username_side" type="text" placeholder="Enter Username"
//
//                                             class="form-control {{$errors->has('username' ? ' is-invalid': '')}}"
//                                             name="username"
//
//                                             value="{{ old('username') }}" required autocomplete="email" autofocus>
//
//
//                                             @if($errors->has('username'))
//
//                                             <span class="invalid-feedback" role="alert">
//
//                                             <strong>
//
//                                         {{$errors->first('username')}}
//
//                                             </strong>
//
//                                             </span>
//
//                                             @endif
//
//                                             </div>
//
//                                             </div>
//
//
//                                             <div class="form-group row">
//
//                                             <div class="col-md-10">
//
//                                             <input id="password_side" type="password" placeholder="Enter Password"
//
//                                             class="form-control {{$errors->has('password' ? ' is-invalid': '')}}"
//                                             name="password"
//
//                                             required autocomplete="current-password">
//
//
//                                             @if($errors->has('password'))
//
//                                             <span class="invalid-feedback" role="alert">
//
//                                             <strong>
//
//                                         {{$errors->first('password')}}
//
//                                             </strong>
//
//                                             </span>
//
//                                             @endif
//
//                                             </div>
//
//                                             </div>
//
//
//                                             <div class="form-group row">
//
//                                             <div class="col-md-8 offset-md-4">
//
//                                             <div class="form-check">
//
//                                             <input class="form-check-input" type="checkbox" name="remember"
//
//                                             id="remember" {{ old('remember') ? 'checked' : '' }}>
//
//
//                                             <label class="form-check-label" for="remember">
//
//                                         {{ __('Remember Me') }}
//
//                                             </label>
//
//                                             </div>
//
//                                             </div>
//
//                                             </div>
//
//
//                                             <div class="form-group row mb-0">
//
//                                             <div class="">
//
//                                             <button type="submit" class="btn btn-primary pull-right">
//
//                                         {{ __('Login') }}
//
//                                             </button>
//
//
//                                             @if (Route::has('password.request'))
//
//                                             <a class="btn btn-link" href="{{ route('password.request') }}">
//
//                                         {{ __('Forgot Your Password?') }}
//
//                                             </a>
//
//                                             @endif
//
//                                             </div>
//
//                                             </div>
//
//                                             </form>
//
//                                             </div>
//
//                                             </div>
//
//                                             </div>
//
//                                             </div>
//
//                                             </div>
//
//                                             </div>
//
//                                             <div id="ms-preload" class="ms-preload">
//
//                                             <div id="status">
//
//                                             <div class="spinner">
//
//                                             <div class="dot1"></div>
//
//                                             <div class="dot2"></div>
//
//                                             </div>
//
//                                             </div>
//
//                                             </div>
//
//                                             <div class="sb-site-container" id="home">
//                                         {{--@include('includes.web_pop_up_modal')--}}
//
//                                             <div class="main" id="main" style="background-color: white;">
//
//                                             @yield('content')
//
//                                             </div>
//
//                                             <div class="btn-back-top">
//
//                                             <a href="#" data-scroll id="back-top"
//                                             class="btn-circle btn-circle-primary btn-circle-sm btn-circle-raised ">
//
//                                             <i class="zmdi zmdi-long-arrow-up"></i>
//
//                                             </a>
//
//                                             </div>
//
//                                             </div>
//
//                                             <!-- sb-site-container -->
//
//
//                                             <script src="{{asset('assets2/js/plugins.min.js')}}"></script>
//
//                                             <script src="{{asset('assets2/js/app.min.js')}}"></script>
//
//                                             <script src="{{asset('assets2/js/configurator.min.js')}}"></script>
//
//                                             <script src="{{asset('assets2/js/lead-full.js')}}"></script>
//
//                                             <script src="{{asset('assets2/js/home-generic-7.js')}}"></script>
//
//                                             <script src="{{asset('assets2/js/component-carousels.js')}}"></script>
//
//                                             <script src="{{asset('assets2/js/overlay.js')}}"></script>
//
//                                             <script src="{{asset('assets2/js/custom.js')}}"></script>
//
//                                             <script src="{{asset('assets2/js/coming.js')}}"></script>
//
//
//                                             <!--Start of Tawk.to Script-->
//
//                                         {{--<script type="text/javascript">--}}
//
//                                         {{--var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();--}}
//
//                                         {{--(function () {--}}
//
//                                         {{--var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];--}}
//
//                                         {{--s1.async = true;--}}
//
//                                         {{--s1.src = 'https://embed.tawk.to/5e75dd208d24fc226589156d/default';--}}
//
//                                         {{--s1.charset = 'UTF-8';--}}
//
//                                         {{--s1.setAttribute('crossorigin', '*');--}}
//
//                                         {{--s0.parentNode.insertBefore(s1, s0);--}}
//
//                                         {{--})();--}}
//
//                                         {{--</script>--}}
//
//                                             <!--End of Tawk.to Script-->
//
//
//                                             <script>
//
//                                             $(document).ready(function () {
//
//                                             $("#sponsor").val("");
//
//                                             $('#other_parts').css('display', 'none');
//
//                                             // ($("#sponsor").val());
//
//
//                                             $('#sponsor').on('keyup', function () {
//
//
//                                             // alert('hi');
//
//
//                                             function timer() {
//
//                                             var sponsor = $('#sponsor').val();
//
//
//                                             $.ajaxSetup({
//
//                                             headers: {
//
//                                             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
//
//                                         }
//
//                                         });
//
//
//                                             $(this).LoadingOverlay('show');
//
//
//                                             $.ajax({
//
//                                             type: 'GET',
//
//                                             url: "{!!URL::route('checkSponsorship')!!}",
//
//                                             dataType: 'json',
//
//                                             data: {refId: sponsor},
//
//                                             success: function (data) {
//
// //                        var result = json.
//
// //alert(data);
//
//                                             if (data.validity == 'invalid') {
//
//                                             $("#sponsor_result").html("<span class='invalid-input danger text-danger color-red'> Invalid Sponsor Username</span>");
//                                             $('#other_parts').hide(500);
//
//                                         } else {
//                                             $("#sponsor_result").html("<span class='invalid-success " +
//
//                                             "success text-success color-green'> " + data.firstname + " " + data.lastname +
//
//                                             "</span>");
//
//                                             $('#other_parts').show(500);
//
//
//                                         }
//
//
//                                         }
//
//                                         });
//
//
// //                $('#yourname').text(name);
//
//                                         }
//
//
//                                             //setTimeout(myFunc,5000);
//
//                                             setTimeout(timer, 2000);
//
//
//                                         });
//
//                                             $('#parent').on('keyup', function (){
//                                             if ($("#parent").val() != "") {
//
//                                             var parent = $('#parent').val();
//
//
//                                             $.ajaxSetup({
//
//                                             headers: {
//
//                                             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
//
//                                         }
//
//                                         });
//
//
//                                             $.ajax({
//
//                                             type: 'GET',
//
//                                             url: "{!!URL::route('checkSponsorship')!!}",
//
//                                             dataType: 'json',
//
//                                             data: {refId: parent},
//
//                                             success: function (data) {
//
// //                        var result = json.
//
//
//                                             if (data.validity == 'invalid') {
//
//                                             $("#parent_result").html("<span class='invalid-input danger text-danger color-red'> Invalid Parent Username</span>");
//
//                                         } else {
//
//                                             $("#parent_result").html("<span class='invalid-success " +
//
//                                             "success text-success color-green'> " + data.firstname + " " + data.lastname +
//
//                                             "</span>");
//
//                                         }
//
//
//                                         }
//
//                                         });
//
//                                         }
//                                         });
//
//                                             var username = $('#username').val();
//
//                                             if (username != "") {
//
//                                             var username = $('#username').val();
//
//
//                                             $.ajaxSetup({
//
//                                             headers: {
//
//                                             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
//
//                                         }
//
//                                         });
//
//
//                                             $.ajax({
//
//                                             type: 'GET',
//
//                                             url: "{!!URL::route('checkUsernameAvailability')!!}",
//
//                                             dataType: 'json',
//
//                                             data: {username: username},
//
//                                             success: function (data) {
//
// //                        var result = json.
//
//
//                                             if (data.availability == 'unavailable') {
//
//                                             $("#username_result").html("<span class='invalid-input danger text-danger color-red'> Username NOT available</span>");
//
//                                         } else {
//
//                                             $("#username_result").html("<span class='invalid-success " +
//
//                                             "success text-success color-green'> " + "Username Available" +
//
//                                             "</span>");
//
//                                         }
//
//
//                                         }
//
//                                         });
//
//                                         }
//
//                                             //USERNAME CHECK
//                                             $('#username').on('keyup', function () {
//
//
//                                             if ($('#username').val() != "" && $('#username').val().length >= 4) {
//
//                                             function timer() {
//
//                                             var username = $('#username').val();
//
//
//                                             $.ajaxSetup({
//
//                                             headers: {
//
//                                             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
//
//                                         }
//
//                                         });
//
//
//                                             $.ajax({
//
//                                             type: 'GET',
//
//                                             url: "{!!URL::route('checkUsernameAvailability')!!}",
//
//                                             dataType: 'json',
//
//                                             data: {username: username},
//
//                                             success: function (data) {
//
// //                        var result = json.
//
//
//                                             if (data.availability == 'unavailable') {
//
//                                             $("#username_result").html("<span class='invalid-input danger text-danger color-red'> Username NOT available</span>");
//
//                                         } else {
//
//                                             $("#username_result").html("<span class='invalid-success " +
//
//                                             "success text-success color-green'> " + "Username Available" +
//
//                                             "</span>");
//
//                                         }
//
//
//                                         }
//
//                                         });
//
//
// //                $('#yourname').text(name);
//
//                                         }
//
//                                         } else {
//
//                                             $("#username_result").html("<span class='invalid-input danger text-danger color-red'> INVALID username! Minimum is 4</span>");
//
//                                         }
//
//
//                                             setTimeout(timer, 2000);
//
//
//                                         });
//
//
// //        $.getJSON('/functions.php', {get_param: 'value'}, function (data) {
//
// //            $.each(data, function (index, element) {
//
// //                $('body').append($('<div>', {
//
// //                    text: element.name
//
// //                }));
//
// //            });
//
// //        });
//
// //        document.ready
//
//
//                                             $("#donate_button").click(function () {
//
// //            alert('yeah');
//
//                                             $("#pay_option").slideToggle("slow");
//
//                                         });
//
//
//                                             $("#buy_button").click(function () {
//
// //            alert('yeah');
//
//                                             $("#buy_option").slideToggle("slow");
//
//                                         });
//
//
//                                             $("#pay_in_bank").click(function () {
//
//                                             $("#bank_account").slideToggle("slow");
//
//                                         });
//
//
//                                             $("#buy_in_bank").click(function () {
//
//                                             $("#bank_account").slideToggle("slow");
//
//                                         });
//
//                                         });
//
//                                             </script>
//
//
//                                             <script>
//
//                                             function payWithPaystack() {
//
//                                             var email = $("#pay_user_email").val();
//
//                                             var phoneNumber = $("#pay_user_phone").val();
//
//
//                                             var first = $("#pay_first_name").val();
//
//                                             var last = $("#pay_last_name").val();
//
//                                             var pin_amount = 10000 + $("#pay_amount").val() * 100;
//
//
//                                             var handler = PaystackPop.setup({
//
//                                             key: '{{config('app.ps_live_pk')}}',
//
//                                             email: email,
//
//                                             amount: pin_amount,
//
//                                             reference: 'MLS' + Math.floor((Math.random() * 1000000000) + 1),
//                                             channels: ['bank_transfer', 'ussd', 'card'],
//
//                                             firstname: first,
//
//                                             lastname: last,
//
//                                             currency: 'NGN', // Use GHS for Ghana Cedis or USD for US Dollars
//
//                                             metadata: {
//
//                                             custom_fields: [
//
//                                         {
//
//                                             display_name: first,
//
//                                             variable_name: "mobile_number",
//
//                                             value: phoneNumber
//
//                                         }
//
//                                             ]
//
//                                         },
//
//                                             callback: function (response) {
//
//
//                                             alert('Transaction Successful. transaction reference is ' + response);
//
//
//                                             var message = verifyTransaction(response);
//
//                                             alert(message);
//
//                                         },
//
//                                             onClose: function () {
//
//                                             alert('Transaction Terminated Successfully');
//
//                                         }
//
//                                         });
//
//                                             handler.openIframe();
//
//                                         }
//
//
//                                             </script>
//                                             @include('includes.webjs')
//
//                                             </body>
//
//                                             </html>
