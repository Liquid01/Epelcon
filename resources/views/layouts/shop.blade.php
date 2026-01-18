<!DOCTYPE html>


<html class="loading" lang="en" data-textdirection="ltr">

<!-- BEGIN: Head-->

<head>

    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <meta name="keywords"
          content="Epelcon Global, Herbal, Herbs, Herbalyn Cleanser, Cleanser, Detoxifier, Affordable Food, Online Stores, e-commerce, shop, online shop, Life Seed, , Empowerment, Training and Development, Vocational Training, Food, Halthcare, Life Seed Worldwide, MLM, Networking, Food Network ">

    <meta name="description"
          content="Epelcon Clobal Registration Portal - Shop for Herbalyn Cleanser and other affordable food products. Join Epelcon Global today!">

    <meta name="author" content="Lifessed Worldwide">

    <title>Epelcon Global - Shop</title>

    <link rel="apple-touch-icon" href="{{asset('assets/img/favicon.png')}}">

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon.png')}}">

{{--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">--}}

<!-- BEGIN: VENDOR CSS-->

    <link rel="stylesheet" type="text/css" href="{{asset('backassets/vendors/vendors.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('backassets/vendors/flag-icon/css/flag-icon.min.css')}}">

    <link rel="stylesheet" type="text/css"

          href="{{asset('backassets/vendors/data-tables/css/jquery.dataTables.min.css')}}">

    <link rel="stylesheet" type="text/css"

          href="{{asset('backassets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">

    <link rel="stylesheet" type="text/css"

          href="{{asset('backassets/vendors/data-tables/css/select.dataTables.min.css')}}">

    <!-- END: VENDOR CSS-->

    <!-- BEGIN: Page Level CSS-->

    <link rel="stylesheet" type="text/css"

          href="{{asset('backassets/css/themes/vertical-modern-menu-template/materialize.min.css')}}">

    <link rel="stylesheet" type="text/css"

          href="{{asset('backassets/css/themes/vertical-modern-menu-template/style.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('backassets/css/pages/dashboard.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('backassets/css/pages/data-tables.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('backassets/css/pages/user-profile-page.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('backassets/fonts/fontawesome/css/all.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('backassets/css/pages/eCommerce-products-page.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('backassets/vendors/noUiSlider/nouislider.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('backassets/vendors/sweetalert/sweetalert.css')}}">


    <link rel="stylesheet" type="text/css" href="{{asset('backassets/css/custom/custom.css')}}">

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1910843246966412"

            crossorigin="anonymous"></script>

</head>

<!-- END: Head-->

<body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu 2-columns  "

      data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">


<!-- BEGIN: Header-->

@if(\Illuminate\Support\Facades\Auth::user() != null)

    <input type="hidden" value="{{auth()->user()->username}}" id="username">

@else

    <input type="hidden" value="root" id="username">

@endif


<header class="page-topbar" id="header">

    <div class="navbar navbar-fixed">

        <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-dark black no-shadow">

            <div class="nav-wrapper">

                <div class="col l6 offset-l3 offset-m3 m6 s12">

{{--                    <div class="header-search-wrapper hide-on-med-and-down" style="width:80%!important;"><i--}}
{{--                            class="material-icons">search</i>--}}

{{--                        <input class="header-search-input z-depth-2" type="text" name="Search"--}}
{{--                               style="width:40%!important;"--}}

{{--                               placeholder="Search">--}}

{{--                    </div>--}}

                </div>
                <ul class="navbar-list right">

                    {{--<li class="hide-on-med-and-down">--}}

                    {{--<a class="waves-effect waves-block waves-light translation-button" href="javascript:void(0);"--}}

                    {{--data-target="translation-dropdown">--}}

                    {{--<span class="flag-icon flag-icon-gb"></span>--}}

                    {{--</a>--}}

                    {{--</li>--}}

                    {{--<li class="hide-on-med-and-down">--}}

                    {{--<a class="waves-effect waves-block waves-light toggle-fullscreen"--}}

                    {{--href="javascript:void(0);">--}}

                    {{--<i class="material-icons">settings_overscan</i>--}}

                    {{--</a>--}}

                    {{--</li>--}}

                    {{--                    <li class="hide-on-large-only">--}}

                    {{--                        <a class="waves-effect waves-block waves-light search-button"--}}

                    {{--                           href="javascript:void(0);">--}}

                    {{--                            <i--}}

                    {{--                                    class="material-icons">search</i>--}}

                    {{--                        </a>--}}

                    {{--                    </li>--}}

                    @if(auth()->user())

                        <li>
                            <a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);"

                               data-target="profile-dropdown">

                                <span class="hidden"

                                      style="display:none;">{{$pro_pix = auth()->user()->image == null? 'avatar2.png':auth()->user()->image}}</span>


                                <span class="avatar-status avatar-online">

                                <img src="{{asset('public/upload/profile/thumb/'.$pro_pix)}}"

                                     alt="Profile">

                                <i></i>

                            </span>

                            </a>

                        </li>

                    @endif

                    <li>

                        <a class="waves-effect waves-block waves-light notification-button" href="javascript:void(0);"

                           data-target="notifications-dropdown2">

                            <i class="material-icons">shopping_cart

                                <small class="notification-badge" id="shopping_cart">

                                    @if(isset($cartItems) > 0)

                                        {{$cartItems->count()}}

                                    @else

                                        0

                                    @endif

                                </small>

                            </i>

                        </a>

                    </li>

                </ul>

                <!-- translation-button-->

                <ul class="dropdown-content" id="translation-dropdown">


                </ul>


                <!-- notifications-dropdown-->

                <ul class="dropdown-content" id="notifications-dropdown2">

                    <span id="cartmenu">

                        @include('shop.cartItems')





                    </span>

                    <div class="clearfix"></div>

                    <div class="row" style="margin-left:0px; margin-right:0px;">

                        <div class="col s6 x6 m6">

                            <a href="javascript:void(0);" class="btn btn-raised btn-danger" id="clearCart">clear</a>

                        </div>

                        <div class="col s6 x6 m6">

                            <a href="{{route('cart_details')}}"

                               class="btn waves-effect  waves-light green darken-1 checkoutd"

                               id="checkoutd">Checkout</a>

                        </div>


                    </div>

                </ul>

                <!-- profile-dropdown-->

                <ul class="dropdown-content" id="profile-dropdown">

                    <li>

                        <a class="grey-text text-darken-1" href="{{route('my_profile')}}"><i class="material-icons">person_outline</i>

                            Profile

                        </a>

                    </li>

                    <li>

                        <a class="grey-text text-darken-1" href="javascript:void(0);"><i class="material-icons">chat_bubble_outline</i>

                            Chat

                        </a>

                    </li>

                    <li>

                        <a class="grey-text text-darken-1" href="javascript:void(0);">

                            <i class="material-icons">help_outline</i> Help

                        </a>

                    </li>

                    <li class="divider"></li>

                    {{--<li>--}}

                    {{--<a class="grey-text text-darken-1" href="user-lock-screen.html"><i class="material-icons">lock_outline</i>--}}

                    {{--Lock--}}

                    {{--</a>--}}

                    {{--</li>--}}

                    <li>

                        <a class="grey-text text-darken-1 " onclick="document.getElementById('logout').submit();"><i

                                class="material-icons">keyboard_tab</i> Logout</a>

                    </li>

                </ul>

                <form id="logout" action="{{route('logout')}}" method="post">@csrf</form>

            </div>

            <nav class="display-none search-sm">

                <div class="nav-wrapper">

                    <form>

                        <div class="input-field">

                            <input class="search-box-sm" type="search" required="">

                            <label class="label-icon" for="search"><i

                                    class="material-icons search-sm-icon">search</i></label><i

                                class="material-icons search-sm-close">close</i>

                        </div>

                    </form>

                </div>

            </nav>

        </nav>

    </div>

    <div class="row" id="cart_alert" style="position:fixed; left: 30%; top: 30%; z-index:10000;">

        @include('includes.flash')

    </div>

</header>

<!-- END: Header-->


<!-- BEGIN: SideNav-->

<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square">

    <div class="brand-sidebar black-overlay">

        <h5 class="logo-wrapper  center-align">

            <a class="bran-logo darken-1 " href="{{route('homepage')}}"

               style="color:orangered; margin-top:20px;line-height:60px; font-size:30px;">

                <img src="{{asset('assets/images/logo-2.png')}}" alt="epelcon"
                     class="img-responsive responsive-img hide-on-small-only"style="max-width:100px; margin-top:15px;">

                <img src="{{asset('assets/images/logo-2.png')}}" alt="epelcon"
                     class="img-responsive responsive-img show-on-small hide-on-large-only hide-on-med-only"

                     style="    max-width:100px; margin-top:10px; margin-left:-20px;">


            </a>

            <a class="navbar-toggler sidenav-trigger btn-sidenav-toggle waves-effect waves-light"

               data-target="slide-out" href="#"><i class="material-icons sidenav-trigger"

                                                   style="color:white!important;">radio_button_checked</i></a>

        </h5>

    </div>

{{--    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out"--}}

{{--        data-menu="menu-navigation" data-collapsible="menu-accordion">--}}


{{--        <li>--}}

{{--            <a class="waves-effect waves-cyan" data-i18n="">--}}

{{--                <i class="material-icons">device_hub</i>--}}

{{--                <span>CATEGORIES</span>--}}

{{--            </a>--}}

{{--        </li>--}}

{{--        @include('includes.categories_menu')--}}

{{--    </ul>--}}

    <div class="navigation-background"></div>

    <a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only "

       href="#" data-target="slide-out"><i class="material-icons">menu</i></a>

</aside>

<!-- END: SideNav-->


<!-- BEGIN: Page Main-->

<div id="main">

    @yield('content')

</div>

<!-- END: Page Main-->


<!-- BEGIN: Footer-->

<meta name="csrf-token" content="{{ csrf_token() }}">
<footer class="page-footer footer footer-static footer-dark black gradient-shadow navbar-border navbar-shadow">

    <div class="footer-copyright">

        <div class="container">
            <span>&copy; 2025
                <a href="{{url('/')}}" target="_blank">Epelcon Global Limited</a>
                All rights reserved.
            </span>
            <span class="right hide-on-small-only">
                <a href="https://www.mylifeseed.org">LSW</a>
            </span>
        </div>

    </div>

</footer>


<!-- END: Footer-->

<!-- BEGIN VENDOR JS-->

<script src="{{asset('backassets/js/vendors.min.js')}}" type="text/javascript"></script>

<!-- BEGIN VENDOR JS-->

<!-- BEGIN PAGE VENDOR JS-->


<script src="{{asset('backassets/vendors/data-tables/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>

<script src="{{asset('backassets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"

        type="text/javascript"></script>

<script src="{{asset('backassets/vendors/data-tables/js/dataTables.select.min.js')}}" type="text/javascript"></script>

<script src="{{asset('backassets/vendors/chartjs/chart.min.js')}}"></script>

<!-- END PAGE VENDOR JS-->

<script src="{{asset('assets/js/overlay.js')}}"></script>


<!-- BEGIN THEME  JS-->

<script src="{{asset('backassets/js/plugins.min.js')}}" type="text/javascript"></script>

<script src="{{asset('backassets/js/scripts/customizer.min.js')}}" type="text/javascript"></script>

<script src="{{asset('backassets/js/scripts/data-tables.min.js')}}" type="text/javascript"></script>

<script src="{{asset('backassets/fonts/fontawesome/js/all.min.js')}}" type="text/javascript"></script>

<script src="{{asset('backassets/fonts/fontawesome/js/all.min.js')}}" type="text/javascript"></script>

<!-- END THEME  JS-->

{{--Datatables--}}

{{--<script src="{{asset('assets/plugins/datatables/dataTables.min.js')}}" type="text/javascript"></script>--}}

<script src="{{asset('backassets/js/scripts/ui-alerts.min.js')}}" type="text/javascript"></script>

<!-- BEGIN PAGE LEVEL JS-->

<script src="{{asset('backassets/js/scripts/dashboard-ecommerce.min.js')}}" type="text/javascript"></script>

<script src="{{asset('backassets/js/scripts/advance-ui-modals.min.js')}}" type="text/javascript"></script>

<script src="{{asset('backassets/js/scripts/eCommerce-products-page.min.js')}}" type="text/javascript"></script>

<script src="{{asset('backassets/vendors/noUiSlider/nouislider.min.js')}}" type="text/javascript"></script>

<script src="{{asset('backassets/vendors/sweetalert/sweetalert.min.js')}}" type="text/javascript"></script>

<script src="{{asset('backassets/js/scripts/extra-components-sweetalert.min.js')}}" type="text/javascript"></script>

@include('includes.customjs')

<!-- END PAGE LEVEL JS-->

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5e75dd208d24fc226589156d/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->


<script>

    function payWithPaystack() {


        var email = $("#user_email").val();

        var phoneNumber = $("#phone").val();


        var name = $("#user_full_name").val();

        var name_arr = name.split(' ');

        var first = name_arr[0];

        var last = name_arr[1];

        var voucher_amount = 10000 + $("#pay_amount").val() * 100;


        var handler = PaystackPop.setup({

            key: '{{config('app.ps_live_pk')}}',

            email: email,

            amount: voucher_amount,

            ref: 'BLG' + Math.floor((Math.random() * 1000000000) + 1),

            firstname: first,

            lastname: last,

            metadata: {

                custom_fields: [

                    {

                        display_name: first,

                        variable_name: "mobile_number",

                        value: phoneNumber

                    }

                ]

            },

            callback: function (response) {


                alert('Transaction Successful. transaction reference is ' + response.reference);


                var message = verifyTransaction(response.reference);

                alert(message);

            },

            onClose: function () {

                alert('Transaction Terminated Successfully');

            }

        });

        handler.openIframe();

    }


    function verifyTransaction(ref) {


        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')

            }

        });


        $.ajax({

            type: "POST",

            url: "/verifyTransactionRef",

            dataType: 'json',

            data: {'reference': ref},

            success: function (data) {


                if (data.status !== null) {

                    return data;

                } else {


                    return "failed to credit Voucher";


                }

            }


        });

    }

</script>

<script>

    $(document).ready(function () {

        $('tabs').tabs();


        $('.modal').modal();


        $('.carousel').carousel();


    });

</script>


<!-- END PAGE LEVEL JS-->

</body>

</html>
