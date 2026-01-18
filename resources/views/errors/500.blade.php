@extends('layouts.web')

@section('content')

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
                            <h3>ERRORS!</h3>
                            <p>It's Us, we are on it immediately. Please, check network and try again.</p>
                            <a href="{{url('/')}}" class="theme-btn-s4">Back to home</a>
                        </div>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
    <!-- end error-404-section -->
@endsection
