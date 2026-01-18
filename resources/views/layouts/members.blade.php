<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Epelcon Global: Living Healthy is our business">
    <meta name="keywords" content="Epelcon Global: Dashboard">
    {{--<meta name="author" content="ThemeSelect">--}}
    <title>Epelcon Global: @yield('page_title') </title>
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
    <link rel="stylesheet" type="text/css" href="{{asset('backassets/css/custom/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backassets/css/croppie.min.css')}}">

</head>

<!-- END: Head-->

<body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu 2-columns  "

      data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">


<!-- BEGIN: Header-->

<input type="hidden" value="@isset(app('current_user')->username){{app('current_user')->username}}@endisset"
       id="username">

@include('includes.back_header')

<!-- END: Header-->


<!-- BEGIN: SideNav-->
@include('scripts.countdown')
<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square">

    <div class="brand-sidebar hide-on-small-only hide-on-med-only " style="background: white!important;">

        <h5 class="logo-wrapper  center-align">

            <a class="bran-logo darken-1 " href="{{route('dashboard')}}"

               style="color:orangered; margin-top:20px;line-height:60px; font-size:30px;">

                <img src="{{asset('assets/images/logo-2.png')}}" alt="epelconglobal" class="img-responsive responsive-img"

                     style="max-width:110px; margin-top:10px;">

            </a>

            <a class="navbar-toggler sidenav-trigger btn-sidenav-toggle waves-effect waves-light"

               data-target="slide-out" href="#"><i class="material-icons sidenav-trigger"

                                                   style="color:white!important;">radio_button_checked</i></a>

        </h5>

    </div>

    <div class="brand-sidebar hide-on-small-only hide-on-large-only show-on-medium "

         style="background: transparent!important;">

        <h5 class="logo-wrapper  center-align">

            <a class="bran-logo darken-1 " href="{{route('homepage')}}"

               style="color:orangered; margin-top:20px;line-height:60px; font-size:30px;">

                <img src="{{asset('assets/img/logos/logo5.png')}}" alt="epelconglobal"
                     class="img-responsive responsive-img"

                     style="max-width:130px; margin-top:10px;">


            </a>

            <a class="navbar-toggler sidenav-trigger btn-sidenav-toggle waves-effect waves-light"

               data-target="slide-out" href="#"><i class="material-icons sidenav-trigger"

                                                   style="color:white!important;">radio_button_checked</i></a>

        </h5>


    </div>

    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out"

        data-menu="menu-navigation" data-collapsible="menu-accordion">


        @if(app('current_user') != null)
            @include('menus.members_menu')
            @include('includes.categories_menu')
        @endif
        @if(app('current_user') != null && app('current_user')->is_admin == 1)
            @include('admin.admin_menu')
        @endif




    </ul>

    <div class="navigation-background"></div>

    <a class="sidenav-trigger white  btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only "

       href="#" data-target="slide-out"><i class="material-icons black-text">menu</i></a>

</aside>

<!-- END: SideNav-->


<!-- BEGIN: Page Main-->

<div id="main">

    <div class="row">

        <div class="col l12 m12 s12">

            {{-- @include('wallets.fund_link') --}}

            @yield('content')

        </div>

    </div>

    <div class="container">

        <aside id="right-sidebar-nav">

            <div id="slide-out-right" class="slide-out-right-sidenav sidenav rightside-navigation right-aligned"

                 style="transform: translateX(105%);">

                <div class="row">

                    <div class="slide-out-right-title">

                        <div class="col s12 border-bottom-1 pb-0 pt-1">

                            <div class="row">

                                <div class="col s2 pr-0 center">

                                    <i class="material-icons vertical-text-middle"><a href="#"

                                                                                      class="sidenav-close">clear</a></i>

                                </div>

                                <div class="col s10 pl-0">

                                    <ul class="tabs">

                                        <li class="tab col s4 p-0">

                                            <a href="#messages" class="active">

                                                <span>Messages</span>

                                            </a>

                                        </li>

                                        <li class="tab col s4 p-0">

                                            <a href="#settings">

                                                <span>Settings</span>

                                            </a>

                                        </li>

                                        <li class="tab col s4 p-0">

                                            <a href="#activity">

                                                <span>Activity</span>

                                            </a>

                                        </li>

                                        <li class="indicator" style="left: 0px; right: 188px;"></li>

                                    </ul>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="slide-out-right-body ps ps--active-y">

                        <div id="messages" class="col s12 active">

                            <div class="collection border-none">

                                {{--                                <input class="header-search-input mt-4 mb-2" type="text" name="Search"--}}

                                {{--                                       placeholder="Search Messages">--}}

                                <ul class="collection p-0">

                                    <li class="collection-item sidenav-trigger display-flex avatar pl-5 pb-0"

                                        data-target="slide-out-chat">

                                    <span class="avatar-status avatar-online avatar-50"><img

                                            src="{{asset('assets/img/avatar2.png')}}" alt="avatar">

                                       <i></i>

                                    </span>

                                        <div class="user-content">

                                            <h6 class="line-height-0">epelconglobal</h6>

                                            <p class="medium-small blue-grey-text text-lighten-3 pt-3">Hello</p>

                                        </div>

                                        <span class="secondary-content medium-small">5.00 AM</span>

                                    </li>

                                </ul>

                            </div>

                        </div>

                        <div id="settings" class="col s12" style="display: none;">

                            <p class="mt-8 mb-0 ml-5 font-weight-900">GENERAL SETTINGS</p>

                            <ul class="collection border-none">

                                <li class="collection-item border-none mt-3">

                                    <div class="m-0">

                                        <span>Notifications</span>

                                        <div class="switch right">

                                            <label>

                                                <input checked="" type="checkbox">

                                                <span class="lever"></span>

                                            </label>

                                        </div>

                                    </div>

                                </li>

                                <li class="collection-item border-none mt-3">

                                    <div class="m-0">

                                        <span>Show recent activity</span>

                                        <div class="switch right">

                                            <label>

                                                <input type="checkbox">

                                                <span class="lever"></span>

                                            </label>

                                        </div>

                                    </div>

                                </li>

                                <li class="collection-item border-none mt-3">

                                    <div class="m-0">

                                        <span>Show recent activity</span>

                                        <div class="switch right">

                                            <label>

                                                <input type="checkbox">

                                                <span class="lever"></span>

                                            </label>

                                        </div>

                                    </div>

                                </li>

                                <li class="collection-item border-none mt-3">

                                    <div class="m-0">

                                        <span>Show Task statistics</span>

                                        <div class="switch right">

                                            <label>

                                                <input type="checkbox">

                                                <span class="lever"></span>

                                            </label>

                                        </div>

                                    </div>

                                </li>

                                <li class="collection-item border-none mt-3">

                                    <div class="m-0">

                                        <span>Show your emails</span>

                                        <div class="switch right">

                                            <label>

                                                <input type="checkbox">

                                                <span class="lever"></span>

                                            </label>

                                        </div>

                                    </div>

                                </li>

                                <li class="collection-item border-none mt-3">

                                    <div class="m-0">

                                        <span>Email Notifications</span>

                                        <div class="switch right">

                                            <label>

                                                <input checked="" type="checkbox">

                                                <span class="lever"></span>

                                            </label>

                                        </div>

                                    </div>

                                </li>

                            </ul>

                        </div>

                        <div id="activity" class="col s12" style="display: none;">

                            <div class="activity">

                                <p class="mt-5 mb-0 ml-5 font-weight-900">RECENT</p>

                                <ul class="collection with-header">

                                    <li class="collection-item">

                                        <div class="font-weight-900">

                                            Food to Collect <span class="secondary-content">Just now</span>

                                        </div>

                                        <p class="mt-0 mb-2">Admin Sent you a message.</p>

                                        <span class="new badge amber" data-badge-caption="Important"> </span>

                                    </li>

                                </ul>

                            </div>

                        </div>

                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">

                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>

                        </div>

                        <div class="ps__rail-y" style="top: 0px; height: 353px; right: 0px;">

                            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 95px;"></div>

                        </div>

                    </div>

                </div>

            </div>


            <!-- Slide Out Chat -->

            <ul id="slide-out-chat" class="sidenav slide-out-right-sidenav-chat right-aligned"

                style="transform: translateX(105%);">

                <li class="center-align pt-2 pb-2 sidenav-close chat-head">

                    <a href="#!"><i class="material-icons mr-0">chevron_left</i>epelconglobal</a>

                </li>

                <li class="chat-body">

                    <ul class="collection ps ps--active-y">

                        <li class="collection-item display-flex avatar pl-5 pb-0" data-target="slide-out-chat">

                        <span class="avatar-status avatar-online avatar-50"><img

                                src="{{asset('assets/img/avatar2.png')}}" alt="avatar">

                        </span>

                            <div class="user-content speech-bubble">

                                <p class="medium-small">hello!</p>

                            </div>

                        </li>

                        <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0"

                            data-target="slide-out-chat">

                            <div class="user-content speech-bubble-right">

                                <p class="medium-small">How can we help? We're here for you!</p>

                            </div>

                        </li>

                        <div class="ps__rail-x" style="left: 0px; bottom: -630px;">

                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>

                        </div>

                        <div class="ps__rail-y" style="top: 630px; height: 597px; right: 0px;">

                            <div class="ps__thumb-y" tabindex="0" style="top: 306px; height: 290px;"></div>

                        </div>

                    </ul>

                </li>

                <li class="center-align chat-footer">

                    <form class="col s12" onsubmit="slide_out_chat()" action="javascript:void(0);">

                        <div class="input-field">

                            <input id="icon_prefix" type="text" class="search">

                            <label for="icon_prefix">Type here..</label>

                            <a onclick="slide_out_chat()"><i class="material-icons prefix">send</i></a>

                        </div>

                    </form>

                </li>

            </ul>

        </aside>

    </div>


</div>

<!-- END: Page Main-->

<div id="modal-withdraw-matching" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h6>Withdrawal: <span class="green-text"> Matching</span></h6>
        <form method="post" action="{{route('member_withdraw_matching')}}">
            @csrf

            <div class="input-field mb-10">
                <label for="amount">Amount</label>
                <input type="number" min="1" required name="amount">
                <button class="btn btn-success">Send</button>
            </div>

        </form>

    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
    </div>
</div>
<!-- BEGIN: Footer-->


<footer class="page-footer footer footer-static footer-dark black gradient-shadow navbar-border navbar-shadow">

    <div class="footer-copyright">

        <div class="container">

            <span>&copy; 2025

                <a href="{{url('/')}}" target="_blank">Epelcon Global</a> All rights reserved.

            </span>

            <span class="right hide-on-small-only">

                <a href="https://www.mylifeseed.org">LSW</a>

            </span>

        </div>

    </div>

</footer>


<meta name="csrf-token" content="{!! csrf_token() !!}">


<!-- END: Footer-->

<!-- BEGIN VENDOR JS-->
@include('includes.back_scripts')

<!-- END PAGE LEVEL JS-->
@include('scripts.general_scripts')
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
</body>

</html>
