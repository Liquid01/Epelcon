<!DOCTYPE html>



<html class="loading" lang="en" data-textdirection="ltr">

<!-- BEGIN: Head-->

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <meta name="description"

          content="Epelcon Global is a wealth horizon">

    <meta name="keywords"

          content="Epelcon Global dashboard">

    {{--<meta name="author" content="ThemeSelect">--}}

    <title>Admin - @yield('page_title') </title>

    <link rel="apple-touch-icon" href="{{asset('backassets/images/favicon/favicon.gif')}}">

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('backassets/images/favicon/favicon.gif')}}">

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

    <link rel="stylesheet" type="text/css" href="{{asset('backassets/vendors/dropify/css/dropify.min.css')}}">



{{--Datatables--}}

{{--<link rel="stylesheet" type="text/css" href="{{asset('assets/datatables/dataTables.min.css')}}">--}}

<!-- END: Page Level CSS-->

    <!-- BEGIN: Custom CSS-->

    <link rel="stylesheet" type="text/css" href="{{asset('backassets/css/custom/custom.css')}}">

    <!-- END: Custom CSS-->

</head>

<!-- END: Head-->

<body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu 2-columns  "

      data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">



<!-- BEGIN: Header-->

<header class="page-topbar" id="header">

    <div class="navbar navbar-fixed">

        <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-dark black no-shadow">

            <div class="nav-wrapper">

{{--                <div class="header-search-wrapper hide-on-med-and-down"><i class="material-icons">search</i>--}}

{{--                    <input class="header-search-input z-depth-2" type="text" name="Search"--}}

{{--                           placeholder="Explore Your Account">--}}

{{--                </div>--}}

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

                    <li class="hide-on-large-only">

                        <a class="waves-effect waves-block waves-light search-button"

                           href="javascript:void(0);">

                            <i

                                    class="material-icons">search</i>

                        </a>

                    </li>

                    <li>

                        <a class="waves-effect waves-block waves-light" href="{{route('admin_messages')}}"

                           data-target="">

                            <i class="material-icons">email

                                <small class="notification-badge">{{\App\Message::where('status', 0)->count()}}</small>

                            </i>

                        </a>

                    </li>

                    <li>

                        <a class="waves-effect waves-block waves-light notification-button" href="javascript:void(0);"

                           data-target="notifications-dropdown">

                            <i class="material-icons">notifications_none

                                <small class="notification-badge">1</small>

                            </i>

                        </a>

                    </li>

                    <li>

                        <a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);"

                           data-target="profile-dropdown">

                            <span class="avatar-status avatar-online">

                                <img src="{{asset('assets2/img/avatar.png')}}"

                                     alt="Profile">

                                <i></i>

                            </span>

                        </a>

                    </li>

                    {{--<li>--}}

                    {{--<a class="waves-effect waves-block waves-light sidenav-trigger" href="#"--}}

                    {{--data-target="slide-out-right">--}}

                    {{--<i class="material-icons">format_indent_increase</i>--}}

                    {{--</a>--}}

                    {{--</li>--}}

                </ul>

                <!-- translation-button-->

                <ul class="dropdown-content" id="translation-dropdown">



                </ul>



                <!-- notifications-dropdown-->

                <ul class="dropdown-content" id="notifications-dropdown">

                    <li>

                        <h6>NOTIFICATIONS<span class="new badge">0</span></h6>

                    </li>

                    <li class="divider"></li>

                    <li><a class="grey-text text-darken-2" href="#!"><span

                                    class="material-icons icon-bg-circle cyan small">perm_identity</span> Registered

                            Successfully</a>

                        <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">Some hours ago</time>

                    </li>



                </ul>

                <!-- profile-dropdown-->

                <ul class="dropdown-content" id="profile-dropdown">

                    {{--<li><a class="grey-text text-darken-1" href="user-profile-page.html"><i class="material-icons">person_outline</i>--}}

                    {{--Profile</a></li>--}}



                    {{--<li>--}}

                    <form action="{{route('logout')}}" method="POST">

                        @csrf

                        <button class=" btn btn-xs btn-success">

                            Logout

                        </button>

                    </form>




                </ul>

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

</header>

<!-- END: Header-->





<!-- BEGIN: SideNav-->

<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square">

    <div class="brand-sidebar " style="background: white!important;">

        <h5 class="logo-wrapper  center-align">

            <a class="bran-logo darken-1 hide-on-small-only" href="{{route('dashboard')}}"

               style="color:orangered; margin-top:20px;line-height:60px; font-size:30px;">

                <img src="{{asset('assets/images/logo-2.png')}}" alt="Epelcon Global" style="max-width:80px; margin-top: 10px;">
                <hr>


            </a>

            <a class="navbar-toggler sidenav-trigger btn-sidenav-toggle waves-effect waves-light"

               data-target="slide-out" href="#"><i class="material-icons sidenav-trigger"

                                                   style="color:white!important;">radio_button_checked</i></a>

        </h5>

    </div>

    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out"

        data-menu="menu-navigation" data-collapsible="menu-accordion">



        @if(app('current_user') != null)

            @if(app('current_user')->is_admin == 1)

                @include('admin.admin_menu')

            @elseif(app('current_user')->is_admin == 2)

                @include('includes.support_menu')

            @endif

        @endif





    </ul>

    <div class="navigation-background"></div>

    <a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only"

       href="#" data-target="slide-out"><i class="material-icons">menu</i></a>

</aside>

<!-- END: SideNav-->



<!-- BEGIN: Page Main-->

<div id="main">

    @yield('content')

</div>

<!-- END: Page Main-->





<!-- BEGIN: Footer-->



<footer class="page-footer footer footer-static footer-dark black gradient-shadow navbar-border navbar-shadow">

    <div class="footer-copyright">

        <div class="container"><span>&copy; {{now()->year}}          <a

                        href="{{url('/')}}"

                        target="_blank">Epelcon Global</a> All rights reserved.</span><span

                    class="right hide-on-small-only"><a

                        href="https://www.mylifeseed.org">LSW</a></span></div>

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

@include('includes.customjs')

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

<script src="{{asset('backassets/vendors/dropify/js/dropify.min.js')}}"></script>

<script src="{{asset('backassets/js/scripts/form-file-uploads.min.js')}}" type="text/javascript"></script>

{{--<script src="{{asset('backassets/js/scripts/form-layouts.min.js')}}" type="text/javascript"></script>--}}

<script src="{{asset('assets/js/custom.js')}}"></script>



<script>
    // alert('hi');


    function payWithPaystack() {





        var email = $("#user_email").val();

        var phoneNumber = $("#phone").val();



        var name = $("#user_full_name").val();

        var name_arr = name.split(' ');

        var first = name_arr[0];

        var last = name_arr[1];

        var voucher_amount = 10000 + $("#pay_amount").val() * 100;





        var handler = PaystackPop.setup({

            key: 'pk_live_3c3430d365a78d96a4c54c01d389384b634d64a6',

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



<!-- END PAGE LEVEL JS-->

</body>

</html>
