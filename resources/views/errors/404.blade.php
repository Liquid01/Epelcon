@extends('layouts.web')

@section('content')
    <!-- .wpo-breadcumb-area start -->
    <div class="wpo-breadcumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wpo-breadcumb-wrap">
                        <h2>404</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><span>404</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .wpo-breadcumb-area end -->

    <!-- start error-404-section -->
    <section class="error-404-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="content clearfix">
                        <div class="error">
                            <img src="{{asset('assets/images/error-404.png')}}" style="max-width: 250px;" alt>
                        </div>
                        <div class="error-message">
                            <h3>Oops! Page Not Found!</h3>
                            <p>We’re sorry; we can’t seem to find the page you requested. This might be because you have typed the web address incorrectly.</p>
                            <a href="{{url()->previous()}}" class="theme-btn-s4">Back</a>
                        </div>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
    <!-- end error-404-section -->
@endsection
