@extends('layouts.register')



@section('content')

    <div class="ms-hero-page ms-hero-img-meeting ms-hero-bg-primary ms-bg-fixed mt-4 mb-4">
        <div class="container">
            <div class="text-center">
                <h5 class="no-m ms-site-title color-white center-block ms-site-title-lg mt-2 animated zoomInDown animation-delay-5">EMPOWERMENT</h5>
                <p class="lead lead-lg color-light text-center center-block mt-2 mw-800 text-uppercase fw-300 animated fadeInUp animation-delay-7">The only weapon to fight
                    <br> Lack, Poverty, Hunger, Poor Education </p>
                {{--<h3 class="color-white text-upercase text-normal">From--}}
                    {{--<span class="counter color-info">1990</span> to--}}
                    {{--<span class="counter color-warning">2016</span>--}}
                {{--</h3>--}}
                <a href="{{route('member_learn')}}" class="btn btn-warning">
                    <i class="zmdi zmdi-desktop-mac"></i>Start Learning</a>
                <a href="{{route('login')}}" class="btn btn-info">
                    <i class="zmdi zmdi-accounts"></i>Join Now</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ul class="ms-timeline">
                    <li class="ms-timeline-item wow materialUp">
                        <div class="ms-timeline-date">
                            <time class="timeline-time" datetime="">2020
                                <span>August</span>
                            </time>
                            <i class="ms-timeline-point"></i>
                        </div>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Painting and Paint Production</h3>
                            </div>
                            <div class="card-block"> Engage yourself in the world of Creative Painting and have the practical (hands-on) experience of Painting and Paint manufacturing. </div>
                            <a href="javascript:void(0)" class="btn btn-success">
                                <i class="zmdi zmdi-star"></i> More</a>
                            <a href="javascript:void(0)" class="btn btn-success btn-raised">
                                <i class="zmdi zmdi-flower"></i> Start Now</a>
                        </div>
                    </li>
                    <li class="ms-timeline-item wow materialUp">
                        <div class="ms-timeline-date">
                            <time class="timeline-time" datetime="">2020
                                <span>July</span>
                            </time>
                            <i class="ms-timeline-point bg-royal"></i>
                            <img src="{{asset('assets/img/logos/logo3.png')}}" class="ms-timeline-point-img"> </div>
                        <div class="card card-royal">
                            <div class="card-header">
                                <h3 class="card-title">30 days Web and mobile Apps Devt. Bootcamp</h3>
                            </div>
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <img src="{{asset('assets/img/demo/office1.jpg')}}" alt="" class="img-responsive"> </div>
                                    <div class="col-sm-8">
                                        <p>Learn how to Build Modern, Up-to-date Web, Mobile and Desktop applications as well as how to deploy, secure and Market them practically.</p>
                                    </div>
                                    <a href="javascript:void(0)" class="btn btn-royal pull-right">
                                    <i class="zmdi zmdi-laptop-mac"></i> More</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="ms-timeline-item wow materialUp">
                        <div class="ms-timeline-date">
                            <time class="timeline-time" datetime="">2020
                                <span>September</span>
                            </time>
                            <i class="ms-timeline-point bg-success"></i>
                        </div>
                        <div class="card card-success-inverse">
                            <div class="card-block">
                                <p>
                                    7 Days Business Development and Customer Relations Management (CRM) Course.
                                    <a href="javascript:void(0)" class="btn btn-royal color-white pull-right">
                                        <i class="zmdi zmdi-laptop-mac"></i> More</a>
                                </p>

                            </div>
                        </div>
                    </li>
                    <li class="ms-timeline-item wow materialUp">
                        <div class="ms-timeline-date">
                            <time class="timeline-time" datetime="">2020
                                <span>October</span>
                            </time>
                            <i class="ms-timeline-point bg-warning"></i>
                            <img src="{{asset('assets/img/demo/avatar2.jpg')}}" class="ms-timeline-point-img"> </div>
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">7-Day HRM Bootcamp</h3>
                            </div>
                            <div class="card-block">
                                <p>The Most Important Resource is 'HUMAN', the most difficult to manage is as well.</p>
                                The Course focuses on Principles, processes, tools for excellent Human Resource Management in Business.
                                <div class="row">
                                    <div class="col-sm-4">
                                        <img src="{{asset('assets/img/demo/office2.jpg')}}" alt="" class="img-responsive"> </div>
                                    <div class="col-sm-4">
                                        <img src="{{asset('assets/img/demo/office3.jpg')}}" alt="" class="img-responsive"> </div>
                                    <div class="col-sm-4">
                                        <img src="{{asset('assets/img/demo/office4.jpg')}}" alt="" class="img-responsive"> </div>
                                </div>
                                <br>
                                <p>The practical implementation of IT in Human Resource Management for better monitoring, assessment and appraisals</p>
                                <a href="javascript:void(0)" class="btn btn-primary btn-raised color-white">
                                    <i class="zmdi zmdi-sign-in"></i> join</a>
                            </div>
                        </div>
                    </li>
                    <li class="ms-timeline-item wow materialUp">
                        <div class="ms-timeline-date">
                            <time class="timeline-time" datetime="">2018
                                <span>April</span>
                            </time>
                            <i class="ms-timeline-point"></i>
                        </div>
                        <div class="card">
                            <blockquote class="blockquote-color-bg-primary withripple color-white">
                                <p>
                                    <strong>You Deserve The Best!</strong> We are wired to take charge of our domain and succeed within it.
                                    <br> However, it comes with extreme sacrifice.</p>
                                <footer>Just Know you can.
                                    <cite title="Source Title"> E. A. Liquid</cite>
                                </footer>
                            </blockquote>
                        </div>
                    </li>
                    <li class="ms-timeline-item wow materialUp">
                        <div class="ms-timeline-date">
                            <time class="timeline-time" datetime="">2020
                                <span>December</span>
                            </time>
                            <i class="ms-timeline-point bg-info"></i>
                            <img src="{{asset('assets/img/demo/avatar3.jpg')}}" class="ms-timeline-point-img"> </div>
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">4 Months Online Marketing Course</h3>
                            </div>
                            <div class="card">
                                <p>FREE Online Marketing Training for stage 3 Members.</p>
                                <p>Video</p>
                            </div>
                            {{--<div data-type="youtube" data-video-id="9ZfN87gSjvI"></div>--}}

                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <div class="card card-primary-inverse animated zoomInUp animation-delay-7">
                    <div class="card-block">
                        <div class=" mb-2" style="">
                            <img src="{{asset('assets/img/logos/logo5.png')}}" alt="" style="max-width:100px; display: inline;" class="img img-responsive">
                        </div>
                        <address class="no-mb">
                            <p>
                                <i class="color-danger-light zmdi zmdi-pin mr-1"></i>Sharon Ultimate Hotels garki, Abuja
                            </p>

                            <p>
                                <i class="color-danger-light zmdi zmdi-pin mr-1"></i>3 Olu koleosho Street, Ikeja Lagos
                            </p>

                            <p>
                                <i class="color-danger-light zmdi zmdi-pin mr-1"></i>Aubit Hotel Nyanya, Abuja
                            </p>

                        </address>
                    </div>
                </div>
                <div class="card card-danger-inverse text-center animated zoomInUp animation-delay-7">
                    <div class="card-block">
                        <h2 class="">
                            <span class="counter">665</span>
                        </h2>
                        <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-white btn-circle-danger btn-circle-lg">
                            <i class="zmdi zmdi-favorite"></i>
                            <div class="ripple-container"></div>
                        </a>
                        <h4 class="">Members Trained</h4>
                        <p>Be part of the next session and get Loan to start your business today</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- container -->

@endsection