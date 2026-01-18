<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="viewport"

          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <meta name="theme-color" content="#333">

    <title>Epelcon Global - @yield('page_title')</title>

    <meta name="description" content="epelcon Sellers Center">

    <link rel="shortcut icon" href="{{asset('assets2/img/logos/favicon.png')}}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="{{asset('assets2/css/preload.min.css')}}"/>

    <link rel="stylesheet" href="{{asset('assets2/css/plugins.min.css')}}"/>

    <link rel="stylesheet" href="{{asset('assets2/css/style.light-blue-500.min.css')}}"/>

    <link rel="stylesheet" href="{{asset('assets2/css/width-boxed.min.css')}}" id="ms-boxed" disabled="">

    <!--[if lt IE 9]>

    <script src="{{asset('assets2/js/html5shiv.min.js')}}"></script>

    <script src="{{asset('assets2/js/respond.min.js')}}"></script>

    <![endif]-->

</head>

<body>

<div id="ms-preload" class="ms-preload">

    <div id="status">

        <div class="spinner">

            <div class="dot1"></div>

            <div class="dot2"></div>

        </div>

    </div>

</div>

<div class="sb-site-container">

    <!-- Modal -->

    <div class="modal modal-primary" id="ms-account-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

        <div class="modal-dialog animated zoomIn animated-3x" role="document">

            <div class="modal-content">

                <div class="modal-header shadow-2dp no-pb">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">

                          <i class="zmdi zmdi-close"></i>

                        </span>

                    </button>

                    <div class="modal-header-tabs">

                        <ul class="nav nav-tabs nav-tabs-full nav-tabs-3 nav-tabs-primary" role="tablist">

                            <li role="presentation" class="active">

                                <a href="#ms-login-tab" aria-controls="ms-login-tab" role="tab" data-toggle="tab"

                                   class="withoutripple">

                                    Login</a>

                            </li>

                            <li role="presentation">

                                <a href="#ms-register-tab" aria-controls="ms-register-tab" role="tab" data-toggle="tab"

                                   class="withoutripple">

                                    Signup</a>

                            </li>

                        </ul>

                    </div>

                </div>

                <div class="modal-body">

                    <div class="tab-content">

                        <div role="tabpanel" class="tab-pane fade active in" id="ms-login-tab">

                            <form autocomplete="off">

                                <fieldset>

                                    <div class="form-group label-floating">

                                        <div class="input-group">

                          <span class="input-group-addon">

                            <i class="zmdi zmdi-account"></i>

                          </span>

                                            <label class="control-label" for="ms-form-user">Username</label>

                                            <input type="text" id="ms-form-user" class="form-control"></div>

                                    </div>

                                    <div class="form-group label-floating">

                                        <div class="input-group">

                                          <span class="input-group-addon">

                                            <i class="zmdi zmdi-lock"></i>

                                          </span>

                                            <label class="control-label" for="ms-form-pass">Password</label>

                                            <input type="password" id="ms-form-pass" class="form-control"></div>

                                    </div>

                                    <div class="row mt-2">

                                        <div class="col-md-6">

                                            <div class="form-group no-mt">

                                                <div class="checkbox">

                                                    <label>

                                                        <input type="checkbox"> Remember

                                                        Me </label>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <button class="btn btn-raised btn-primary pull-right">Login</button>

                                        </div>

                                    </div>

                                </fieldset>

                            </form>

                            {{--<div class="text-center">--}}

                                {{--<h3>Login with</h3>--}}

                                {{--<a href="javascript:void(0)" class="wave-effect-light btn btn-raised btn-facebook">--}}

                                    {{--<i class="zmdi zmdi-facebook"></i> Facebook</a>--}}

                                {{--<a href="javascript:void(0)" class="wave-effect-light btn btn-raised btn-twitter">--}}

                                    {{--<i class="zmdi zmdi-twitter"></i> Twitter</a>--}}

                                {{--<a href="javascript:void(0)" class="wave-effect-light btn btn-raised btn-google">--}}

                                    {{--<i class="zmdi zmdi-google"></i> Google</a>--}}

                            {{--</div>--}}

                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="ms-register-tab">

                            <form>

                                <fieldset>

                                    <div class="form-group label-floating">

                                        <div class="input-group">

                          <span class="input-group-addon">

                            <i class="zmdi zmdi-account"></i>

                          </span>

                                            <label class="control-label" for="ms-form-user">Username</label>

                                            <input type="text" id="ms-form-user" class="form-control"></div>

                                    </div>

                                    <div class="form-group label-floating">

                                        <div class="input-group">

                          <span class="input-group-addon">

                            <i class="zmdi zmdi-email"></i>

                          </span>

                                            <label class="control-label" for="ms-form-email">Email</label>

                                            <input type="email" id="ms-form-email" class="form-control"></div>

                                    </div>

                                    <div class="form-group label-floating">

                                        <div class="input-group">

                          <span class="input-group-addon">

                            <i class="zmdi zmdi-lock"></i>

                          </span>

                                            <label class="control-label" for="ms-form-pass">Password</label>

                                            <input type="password" id="ms-form-pass" class="form-control"></div>

                                    </div>

                                    <div class="form-group label-floating">

                                        <div class="input-group">

                          <span class="input-group-addon">

                            <i class="zmdi zmdi-lock"></i>

                          </span>

                                            <label class="control-label" for="ms-form-pass">Re-type Password</label>

                                            <input type="password" id="ms-form-pass" class="form-control"></div>

                                    </div>

                                    <button class="btn btn-raised btn-block btn-primary">Register Now</button>

                                </fieldset>

                            </form>

                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="ms-recovery-tab">

                            <fieldset>

                                <div class="form-group label-floating">

                                    <div class="input-group">

                        <span class="input-group-addon">

                          <i class="zmdi zmdi-account"></i>

                        </span>

                                        <label class="control-label" for="ms-form-user">Username</label>

                                        <input type="text" id="ms-form-user" class="form-control"></div>

                                </div>

                                <div class="form-group label-floating">

                                    <div class="input-group">

                        <span class="input-group-addon">

                          <i class="zmdi zmdi-email"></i>

                        </span>

                                        <label class="control-label" for="ms-form-email">Email</label>

                                        <input type="email" id="ms-form-email" class="form-control"></div>

                                </div>

                                <button class="btn btn-raised btn-block btn-primary">Send Password</button>

                            </fieldset>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <header class="ms-header ms-header-primary" style="background: #424242;">

        <div class="container container-full">

            <div class="ms-title">

                <a href="{{url('/')}}">

                    <img src="{{asset('assets2/img/logos/logo3.png')}}" alt="LOGO"

                         style="max-width:50px; display: inline;" class="img img-responsive">



                    <h1 class="animated fadeInRight animation-delay-6">Life

                        <span>Seed</span>

                        <small>Seller <strong>HQ</strong></small>

                    </h1>

                </a>

            </div>

        </div>

    </header>

    <nav class="navbar navbar-static-top yamm ms-navbar ms-navbar-primary hidden-sm visible-xs hidden-md hidden-lg">

        <div class="container container-full">

            <div class="navbar-header">

                <a class="navbar-brand" href="{{url('/')}}">

                    <img src="{{asset('assets2/img/logos/logo3.png')}}" class="img img-responsive" alt=""

                         style="max-width:50px;">

                    <span class="ms-title">Seller

                <strong>HQ</strong>

              </span>

                </a>

            </div>

            <div id="navbar" class="navbar-collapse collapse">



            </div>

            <!-- navbar-collapse collapse -->





            <a href="javascript:void(0)" class="sb-toggle-left btn-navbar-menu">

                <i class="zmdi zmdi-menu"></i>

            </a>

        </div>

        <!-- container -->

    </nav>

    <nav class="navbar navbar-static-top yamm ms-navbar ms-navbar-primary visible-sm hidden-xs visible-md visible-lg"  style="height:5px; min-height:5px!important;">

        <div class="container container-full">

            <div class="navbar-header">



            </div>

            <div id="navbar" class="navbar-collapse collapse">



            </div>

            <!-- navbar-collapse collapse -->





            <a href="javascript:void(0)" class="sb-toggle-left btn-navbar-menu">

                <i class="zmdi zmdi-menu"></i>

            </a>

        </div>

        <!-- container -->

    </nav>



    @yield('content')





    <footer class="ms-footer">

        <div class="container">

            <p>Copyright &copy; epelcon 2020</p>

        </div>

    </footer>

    <div class="btn-back-top">

        <a href="#" data-scroll id="back-top" class="btn-circle btn-circle-primary btn-circle-sm btn-circle-raised ">

            <i class="zmdi zmdi-long-arrow-up"></i>

        </a>

    </div>

</div>

<!-- sb-site-container -->

<div class="ms-slidebar sb-slidebar sb-left sb-momentum-scrolling sb-style-overlay">

    <header class="ms-slidebar-header">

        <div class="ms-slidebar-login">

            <a href="javascript:void(0)" class="withripple">

                <i class="zmdi zmdi-account"></i> Login</a>

            <a href="javascript:void(0)" class="withripple">

                <i class="zmdi zmdi-account-add"></i> Register</a>

        </div>

        <div class="ms-slidebar-title">

            <form class="search-form">

                <input id="search-box-slidebar" type="text" class="search-input" placeholder="Search..." name="q"/>

                <label for="search-box-slidebar">

                    <i class="zmdi zmdi-search"></i>

                </label>

            </form>

            <div class="ms-slidebar-t">

                <span class="ms-logo ms-logo-sm">My</span>

                <h3>Life

                    <span>Seed</span>

                </h3>

            </div>

        </div>

    </header>

    <ul class="ms-slidebar-menu" id="slidebar-menu" role="tablist" aria-multiselectable="true">

        <li class="panel" role="tab" id="sch1">

            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#slidebar-menu" href="#sc1"

               aria-expanded="false" aria-controls="sc1">

                <i class="zmdi zmdi-home"></i> Home </a>

            <ul id="sc1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="sch1">

                <li>

                    <a href="{{url('/')}}">Epelcon Global</a>

                </li>

            </ul>

        </li>

    </ul>

</div>

<script src="{{asset('assets2/js/plugins.min.js')}}"></script>

<script src="{{asset('assets2/js/app.min.js')}}"></script>

<script src="{{asset('assets2/js/configurator.min.js')}}"></script>

<script src="{{asset('assets2/js/lead-full.js')}}"></script>

<script src="{{asset('assets2/js/home-generic-7.js')}}"></script>

<script src="{{asset('assets2/js/component-carousels.js')}}"></script>

<script src="{{asset('assets2/js/overlay.js')}}"></script>

<script src="{{asset('assets2/js/custom.js')}}"></script>

<script src="{{asset('assets2/js/coming.js')}}"></script>

<script src="{{asset('assets2/js/home-generic-6.js')}}"></script>



<!--Start of Tawk.to Script-->

<script type="text/javascript">

    var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();

    (function () {

        var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];

        s1.async = true;

        s1.src = 'https://embed.tawk.to/5e75dd208d24fc226589156d/default';

        s1.charset = 'UTF-8';

        s1.setAttribute('crossorigin', '*');

        s0.parentNode.insertBefore(s1, s0);

    })();

</script>

<!--End of Tawk.to Script-->





<script>

    $(document).ready(function () {

        if ($("#sponsor").val() != "") {

            var sponsor = $('#sponsor').val();



            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')

                }

            });





            $.ajax({

                type: 'GET',

                url: "{!!URL::route('checkSponsorship')!!}",

                dataType: 'json',

                data: {refId: sponsor},

                success: function (data) {

//                        var result = json.

//alert(data);

                    if (data.validity == 'invalid') {

                        $("#sponsor_result").html("<span class='invalid-input danger text-danger color-red'> Invalid Sponsor Username</span>");

                    } else {

                        $("#sponsor_result").html("<span class='invalid-success " +

                            "success text-success color-green'> " + data.firstname + " " + data.lastname +

                            "</span>");

                    }





                }

            });

        }





        $('#sponsor').on('keyup', function () {



//            alert('hi');



            function timer() {

                var sponsor = $('#sponsor').val();



                $.ajaxSetup({

                    headers: {

                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')

                    }

                });



                $(this).LoadingOverlay('show', true);





                $.ajax({

                    type: 'GET',

                    url: "{!!URL::route('checkSponsorship')!!}",

                    dataType: 'json',

                    data: {refId: sponsor},

                    success: function (data) {

//                        var result = json.

//alert(data);

                        if (data.validity == 'invalid') {

                            $("#sponsor_result").html("<span class='invalid-input danger text-danger color-red'> Invalid Sponsor Username</span>");

                        } else {

                            $("#sponsor_result").html("<span class='invalid-success " +

                                "success text-success color-green'> " + data.firstname + " " + data.lastname +

                                "</span>");

                        }





                    }

                });



//                $('#yourname').text(name);

            }



            //setTimeout(myFunc,5000);

            setTimeout(timer, 2000);



        });



        if ($("#parent").val() != "") {

            var parent = $('#parent').val();



            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')

                }

            });



            $.ajax({

                type: 'GET',

                url: "{!!URL::route('checkSponsorship')!!}",

                dataType: 'json',

                data: {refId: parent},

                success: function (data) {

//                        var result = json.



                    if (data.validity == 'invalid') {

                        $("#parent_result").html("<span class='invalid-input danger text-danger color-red'> Invalid Parent Username</span>");

                    } else {

                        $("#parent_result").html("<span class='invalid-success " +

                            "success text-success color-green'> " + data.firstname + " " + data.lastname +

                            "</span>");

                    }

                }

            });

        }



                {{--$('#parent').on('keyup', function () {--}}



                {{--function timer() {--}}

                {{--var parent = $('#parent').val();--}}



                {{--$.ajaxSetup({--}}

                {{--headers: {--}}

                {{--'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')--}}

                {{--}--}}

                {{--});--}}



                {{--$.ajax({--}}

                {{--type: 'GET',--}}

                {{--url: "{!!URL::route('checkSponsorship')!!}",--}}

                {{--dataType: 'json',--}}

                {{--data: {refId: parent},--}}

                {{--success: function (data) {--}}

                {{--//                        var result = json.--}}



                {{--if (data.validity == 'invalid') {--}}

                {{--$("#parent_result").html("<span class='invalid-input danger text-danger color-red'> Invalid Parent Username</span>");--}}

                {{--} else {--}}

                {{--$("#parent_result").html("<span class='invalid-success " +--}}

                {{--"success text-success color-green'> " + data.firstname + " " + data.lastname +--}}

                {{--"</span>");--}}

                {{--}--}}





                {{--}--}}

                {{--});--}}



                {{--//                $('#yourname').text(name);--}}

                {{--}--}}



                {{--setTimeout(timer, 2000);--}}



                {{--});--}}





        var username = $('#username').val();



        if (username != "") {

            var username = $('#username').val();



            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')

                }

            });



            $.ajax({

                type: 'GET',

                url: "{!!URL::route('checkUsernameAvailability')!!}",

                dataType: 'json',

                data: {username: username},

                success: function (data) {

//                        var result = json.



                    if (data.availability == 'unavailable') {

                        $("#username_result").html("<span class='invalid-input danger text-danger color-red'> Username NOT available</span>");

                    } else {

                        $("#username_result").html("<span class='invalid-success " +

                            "success text-success color-green'> " + "Username Available" +

                            "</span>");

                    }





                }

            });

        }



        $('#username').on('keyup', function () {



            if ($('#username').val() != "" && $('#username').val().length >= 4) {

                function timer() {

                    var username = $('#username').val();



                    $.ajaxSetup({

                        headers: {

                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')

                        }

                    });



                    $.ajax({

                        type: 'GET',

                        url: "{!!URL::route('checkUsernameAvailability')!!}",

                        dataType: 'json',

                        data: {username: username},

                        success: function (data) {

//                        var result = json.



                            if (data.availability == 'unavailable') {

                                $("#username_result").html("<span class='invalid-input danger text-danger color-red'> Username NOT available</span>");

                            } else {

                                $("#username_result").html("<span class='invalid-success " +

                                    "success text-success color-green'> " + "Username Available" +

                                    "</span>");

                            }





                        }

                    });



//                $('#yourname').text(name);

                }

            } else {

                $("#username_result").html("<span class='invalid-input danger text-danger color-red'> INVALID username! Minimum is 4</span>");

            }





            setTimeout(timer, 2000);



        });



//        $.getJSON('/functions.php', {get_param: 'value'}, function (data) {

//            $.each(data, function (index, element) {

//                $('body').append($('<div>', {

//                    text: element.name

//                }));

//            });

//        });

//        document.ready



        $("#donate_button").click(function () {

//            alert('yeah');

            $("#pay_option").slideToggle("slow");

        });





        $("#buy_button").click(function () {

//            alert('yeah');

            $("#buy_option").slideToggle("slow");

        });



        $("#pay_in_bank").click(function () {

            $("#bank_account").slideToggle("slow");

        });



        $("#buy_in_bank").click(function () {

            $("#bank_account").slideToggle("slow");

        });

    });

</script>



<script>





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

</body>

</html>
