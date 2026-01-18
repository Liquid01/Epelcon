@extends('layouts.web')

@section('content')

    <!-- .wpo-breadcumb-area start -->
    <div class="wpo-breadcumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wpo-breadcumb-wrap">
                        <h2>About Us</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><span>About</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .wpo-breadcumb-area end -->
    @include('home.about')
    <!-- wpo-mission-area start -->
    @include('home.mission')
    <!-- wpo-mission-area end -->
    <!-- wpo-team-area start -->
    @include('home.team')
    <!-- wpo-team-area end -->

@endsection
