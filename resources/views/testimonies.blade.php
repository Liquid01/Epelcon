@extends('layouts.web')

@section('content')
    <!-- .wpo-breadcumb-area start -->
    <div class="wpo-breadcumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wpo-breadcumb-wrap">
                        <h2>Testimonies</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><span>Testimonies</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .wpo-breadcumb-area end -->

    <div class="wpo-case-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wpo-section-title">
                        <span>Live Testimonies</span>
                        <h2>This is what gives us Pride and Motivation</h2>
                    </div>
                </div>
            </div>
            <div class="wpo-case-wrap">
                <div class="wpo-case-slider">
                    <div class="wpo-case-single">
                        <div class="wpo-case-item">
                            <div class="wpo-case-img align-content-center">
                                <video src="{{asset('assets/videos/testimony1.mp4')}}" width="100%"
                                       height="282px"  poster="{{asset('assets/images/t-placeholder1.png')}}">
                                </video>
                            </div>
                            <div class="wpo-case-content">
                                <div class="wpo-case-text-top">
                                    <h2>Cancer and High Blood Pressure (BP) Cured</h2>
                                    <p>Mrs. Yusuf D.</p>
                                </div>
                                <div class="case-btn">
                                    <ul>
                                        <li><a href="{{route('about')}}">Learn More</a></li>
                                        <li><a href="{{route('register')}}">Join Now!</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wpo-case-single">
                        <div class="wpo-case-item">
                            <div class="wpo-case-img">
                                <video src="{{asset('assets/videos/testimony2.mp4')}}" width="370"
                                       height="282px"  poster="{{asset('assets/images/t-placeholder2.png')}}">
                                </video>
                            </div>
                            <div class="wpo-case-content">
                                <div class="wpo-case-text-top">
                                    <h2>Problems with Thyroid Gland Gone</h2>
                                    <p>Miss. Chidimma Nwadiogu</p>

                                </div>
                                <div class="case-btn">
                                    <ul>
                                        <li><a href="{{route('about')}}">Learn More</a></li>
                                        <li><a href="{{route('register')}}">Join Now!</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wpo-case-single">
                        <div class="wpo-case-item">
                            <div class="wpo-case-img">
                                <video src="{{asset('assets/videos/testimony3.mp4')}}" width="370"
                                       height="282px"  poster="{{asset('assets/images/t-placeholder3.png')}}">
                                </video>
                            </div>
                            <div class="wpo-case-content">
                                <div class="wpo-case-text-top">
                                    <h2>Providing Healthy Food for the children</h2>
                                </div>
                                <div class="case-btn">
                                    <ul>
                                        <li><a href="{{route('about')}}">Learn More</a></li>
                                        <li><a href="{{route('register')}}">Join Now!</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="wpo-case-wrap">
                <div class="wpo-case-slider">
                    <div class="wpo-case-single">
                        <div class="wpo-case-item">
                            <div class="wpo-case-img">
                                <video src="{{asset('assets/videos/testimony4.mp4')}}" width="370"
                                       height="282px"  poster="{{asset('assets/images/t-placeholder4.png')}}">
                                </video>
                            </div>
                            <div class="wpo-case-content">
                                <div class="wpo-case-text-top">
                                    <h2>Ensure Education for every poor children</h2>
                                </div>
                                <div class="case-btn">
                                    <ul>
                                        <li><a href="{{route('about')}}">Learn More</a></li>
                                        <li><a href="{{route('register')}}">Join Now!</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wpo-case-single">
                        <div class="wpo-case-item">
                            <div class="wpo-case-img">
                                <video src="{{asset('assets/videos/testimony5.mp4')}}" width="370"
                                       height="282px"  poster="{{asset('assets/images/t-placeholder5.png')}}">
                                </video>
                            </div>
                            <div class="wpo-case-content">
                                <div class="wpo-case-text-top">
                                    <h2>Supply drinking water for the people</h2>

                                </div>
                                <div class="case-btn">
                                    <ul>
                                        <li><a href="{{route('about')}}">Learn More</a></li>
                                        <li><a href="{{route('register')}}">Join Now!</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wpo-case-single">
                        <div class="wpo-case-item">
                            <div class="wpo-case-img">
                                <video src="{{asset('assets/videos/testimony6.mp4')}}" width="370"
                                       height="282px"   controls="none"  poster="{{asset('assets/images/t-placeholder6.png')}}">
                                </video>
                            </div>
                            <div class="wpo-case-content">
                                <div class="wpo-case-text-top">
                                    <h2>Providing Healthy Food for the children</h2>
                                </div>
                                <div class="case-btn">
                                    <ul>
                                        <li><a href="{{route('about')}}">Learn More</a></li>
                                        <li><a href="{{route('register')}}">Join Now!</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
