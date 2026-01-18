<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <meta name="theme-color" content="#333">

    <title>Epelcon Global - MyAdverts</title>

    <meta name="description" content="epelcon Adertising">

    <link rel="shortcut icon" href="{{asset('assets/img/logos/favicon.png')}}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="{{asset('assets/css/preload.min.css')}}" />

    <link rel="stylesheet" href="{{asset('assets/css/plugins.min.css')}}" />

    <link rel="stylesheet" href="{{asset('assets/css/style.light-blue-500.min.css')}}" />

    <link rel="stylesheet" href="{{asset('assets/css/width-boxed.min.css')}}" id="ms-boxed" disabled="">

    <!--[if lt IE 9]>

    <script src="{{asset('assets/js/html5shiv.min.js')}}"></script>

    <script src="{{asset('assets/js/respond.min.js')}}"></script>

    <![endif]-->

</head>

<body>

<a href="{{url('/')}}" class="ms-conf-btn ms-configurator-btn btn-circle btn-circle-raised btn-circle-primary animated rubberBand">

    <i class="fa fa-home"></i>

</a>

<div id="ms-preload" class="ms-preload">

    <div id="status">

        <div class="spinner">

            <div class="dot1"></div>

            <div class="dot2"></div>

        </div>

    </div>

</div>



<style>



    @import url(https://fonts.googleapis.com/css?family=Titillium+Web:400,200,200italic,300,300italic,900,700italic,700,600italic,600,400italic);





    #timer div {

        display: inline;

        line-height: 1;

        padding: 20px;

        font-size: 20px;

    }



    #days {

        font-size: 20px;

        color: #db4844;

    }

    #hours {

        font-size: 20px;

        color: #f07c22;

    }

    #minutes {

        font-size: 20px;

        color: #f6da74;

    }

    #seconds {

        font-size:20px;

        color: #abcd58;

    }

</style>

<div class="bg-full-page ms-hero-img-city2 ms-hero-bg-primary back-fixed">

    <div class="mw-500 absolute-center">

        <header class="text-center mb-2">

            <img src="{{asset('assets/img/logos/logo4.png')}}" alt="" class="img img-responsive  mt-4 pl-3 ml-3" style="max-width:150px; margin-left:35px;">

        </header>

        <div class="card animated zoomInUp animation-delay-7 color-primary withripple">

            <div class="card-block">

                <div class="text-center color-dark">

                    <h1 class="color-primary text-big">ADSeeds</h1>

                    <p class="lead lead-sm">will be open for publishers and advertiser in</p>

                    {{--<div id="ms-countdown"></div>--}}

                    <div id="timer">

                        <div id="days"></div>

                        <div id="hours"></div>

                        <div id="minutes"></div>

                        <div id="seconds"></div>

                    </div>

                    <form id="suscribe_form" action="{{route('subscribe_ads')}}" method="post">

                        @csrf

                        <div class="form-group label-floating mt-2 mb-1">

                            <div class="input-group center-block">

                                <label class="control-label" for="ms-subscribe">

                                    <i class="zmdi zmdi-email"></i> Stay Tuned</label>

                                <input type="email" name="email" id="ms-subscribe" class="form-control"> </div>

                        </div>

                        <button class="btn btn-raised btn-primary btn-block">Subscribe</button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="{{asset('assets/js/plugins.min.js')}}"></script>

<script src="{{asset('assets/js/app.min.js')}}"></script>

<script src="{{asset('assets/js/configurator.min.js')}}"></script>

<script src="{{asset('assets/js/coming.js')}}"></script>

<script>

    function makeTimer() {



        //		var endTime = new Date("29 April 2018 9:56:00 GMT+01:00");

        var endTime = new Date("01 Nov 2020 12:56:00 GMT+01:00");

        endTime = (Date.parse(endTime) / 1000);



        var now = new Date();

        now = (Date.parse(now) / 1000);



        var timeLeft = endTime - now;



        var days = Math.floor(timeLeft / 86400);

        var hours = Math.floor((timeLeft - (days * 86400)) / 3600);

        var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);

        var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));



        if (hours < "10") { hours = "0" + hours; }

        if (minutes < "10") { minutes = "0" + minutes; }

        if (seconds < "10") { seconds = "0" + seconds; }



        $("#days").html(days + "<span>Days</span>");

        $("#hours").html(hours + "<span>Hours</span>");

        $("#minutes").html(minutes + "<span>Minutes</span>");

        $("#seconds").html(seconds + "<span>Seconds</span>");



    }



    setInterval(function() { makeTimer(); }, 1000);

</script>

</body>

</html>
