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
                            <li><span>401</span></li>
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
                            <img src="{{asset('assets/images/error-505.png')}}" style="max-width: 250px;" alt>
                        </div>
                        <div class="error-message">
                            <h3>ACCESS DENIED</h3>
                            <p>You do not have access to this Page; <br> <a href="{{url('login')}}" class="theme-btn-s1">Login</a> in again (4 attempts left).</p>
                            <p>And, You need 1 Herbalyn Cleanser</p>

                            <a href="{{url('/')}}" class="theme-btn-s4">Back to home</a>
                            <a href="{{url('login')}}" class="theme-btn-s3">Login</a>
                        </div>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
    <!-- end error-404-section -->
@endsection
