<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <title>Lock Screen</title>
    <link rel="apple-touch-icon" href="{{asset('backassets/images/favicon/apple-touch-icon-152x152.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('backassets/images/favicon/favicon-32x32.png')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('backassets/vendors/vendors.min.css')}}">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css"
          href="{{asset('backassets/css/themes/vertical-modern-menu-template/materialize.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('backassets/css/themes/vertical-modern-menu-template/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backassets/css/pages/lock.min.css')}}">
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('backassets/css/custom/custom.css')}}">
    <!-- END: Custom CSS-->
</head>
<!-- END: Head-->
<body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu 1-column forgot-bg  blank-page blank-page"
      data-open="click" data-menu="vertical-modern-menu" data-col="1-column">
<div class="row">
    <div class="col s12">
        <div class="container">
            <div id="lock-screen" class="row">

                <section class="section-padding gray-bg">
                    <div class="container">
                        <div class="login-wrapper">
                            <div class="card-wrapper">
                                <a href="{{url('/')}}" class="white-text ml-1 mr-1">Home</a>
                                <a href="{{route('member_details', $username)}}" class="white-text ml-1 mr-1">Back</a>
                                <a href="{{route('allMembers')}}" class="white-text ml-1 mr-1">All Members</a>
                                <a href="{{route('adminDashboard')}}" class="white-text ml-1 mr-1">Dashboard</a>
                            </div>
                            <div class="card-wrapper">
                                <h1 class="title white-text">Change Password</h1>
                                @include('includes.flash')
                                <form method="POST" action="{{route('update_user_password', $username)}}">
                                    @csrf
                                    @isset($username)
                                        <div class="input-container">
                                            <h6 class="white-text">Username: {{$username}}</h6>
                                        </div>
                                    @endisset

                                    <div class="input-container">
                                        <input type="password" name="password" id="password"
                                               placeholder="Enter new pasword"
                                               class="{{$errors->has('password'? ' is-invalid': '')}}"
                                               value="{{old('password')}}" required="required" autocomplete="off"/>
                                        <div class="bar"></div>
                                        @if($errors->has('password'))
                                            <span class="invalid-feedback" style="color:yellow;" role="alert">
                                    <strong>{{$errors->first('password')}}</strong>
                                </span>
                                        @endif
                                    </div>

                                    <div class="button-container">
                                        <button class=" btn btn-lg btn-block waves-effect waves-light">
                                            Change
                                        </button>
                                    </div>
                                </form>
                                {{--<form method="post" action="{{route('logout')}}">--}}
                                {{--<div class="button-container">--}}
                                {{--<button class=" btn btn-lg btn-block waves-effect waves-light">--}}
                                {{--Login--}}
                                {{--</button>--}}
                                {{--</div>--}}

                                {{--<div class="footer"><a href="#">Forgot your password?</a></div>--}}
                                {{--</form>--}}
                            </div>

                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<!-- BEGIN VENDOR JS-->
<script src="{{asset('backassets/js/vendors.min.js')}}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<!-- END PAGE VENDOR JS-->
<!-- BEGIN THEME  JS-->
<script src="{{asset('backassets/js/plugins.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backassets/js/custom/custom.js')}}" type="text/javascript"></script>
<!-- END THEME  JS-->
<!-- BEGIN PAGE LEVEL JS-->
<!-- END PAGE LEVEL JS-->
</body>
</html>