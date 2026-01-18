@extends('layouts.events')

@section('content')

    <section id="home" class="rev_slider_wrapper">
    </section>
    <section class="section-padding">
        <div class="container">
            <div class="text-center mb-80">
                <img src="{{asset('assets/img/event/welcome.jpg')}}" alt="">
                <p class="mt-50">Gradually, the Economy is changing dimension with respect to how people do businesses.
                    Small businesses are now understanding the need for
                    sponsorship, partnership, awareness and specific audience targeting for better conversion. Also,
                    some significant factors have played important roles in
                    simplifying the processes involved in meeting the need of customers thereby giving enterpreneures
                    better understanding of what satisfaction means in business.
                    For this, epelcon Brings to us the following programme for effective and consistent business growth in
                    Nigeria and Africa. </p>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1 video-wrapper">
                    <img src="{{asset('assets2/img/wlg-banner.png')}}" class="img img-responsive" style="" alt="">
                </div>
            </div>
        </div>
    </section>
    <section id="pressrelease" class="section-padding gray-bg">
        <div class="container">
            <div class="text-center mb-80 wow fadeInUp">
                <h2 class="section-title text-uppercase">OTHER FEATURES</h2>
            </div>
            <div class="row latest-news-card">
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <article class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="{{asset('assets2/img/event/cwn.jpg')}}" alt="image">
                        </div>
                        <div class="card-content">
                            <h2 class="entry-title activator">Club Wealth Network Programme Awareness</h2>
                        </div>
                        {{--<div class="card-reveal overlay-blue">--}}
                        {{--<span class="card-title close-button"><i class="fa fa-times"></i></span>--}}
                        {{--<a class="posted-on" href="#">Branding</a>--}}
                        {{--<h2 class="entry-title"><a href="#">Material Design is best</a></h2>--}}
                        {{--<p>Authoritatively grow quality technologies for strategic sources. Dramatically evolve--}}
                        {{--front-end services quality.</p>--}}
                        {{--<a href="#" class="readmore">Read Full Post <i class="fa fa-long-arrow-right"></i></a>--}}
                        {{--</div>--}}
                    </article>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <article class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="{{asset('assets2/img/event/one-on-one.jpg')}}" alt="image">
                        </div>
                        <div class="card-content">
                            <h2 class="entry-title activator">ONE-ON-ONE With the New Product Sale Specialist</h2>
                        </div>
                        {{--<div class="card-reveal overlay-blue">--}}
                        {{--<span class="card-title close-button"><i class="fa fa-times"></i></span>--}}
                        {{--<a class="posted-on" href="#">Branding</a>--}}
                        {{--<h2 class="entry-title"><a href="#">How To Be More Organized</a></h2>--}}
                        {{--<p>Authoritatively grow quality technologies for strategic sources. Dramatically evolve--}}
                        {{--front-end services quality.</p>--}}
                        {{--<a href="#" class="readmore">Read Full Post <i class="fa fa-long-arrow-right"></i></a>--}}
                        {{--</div>--}}
                    </article>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <article class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="{{asset('assets/img/event/press-3.jpg')}}" alt="image">
                        </div>
                        <div class="card-content">
                            <h2 class="entry-title activator">POWER OF NETWORKING</h2>
                        </div>
                        {{--<div class="card-reveal overlay-blue">--}}
                        {{--<span class="card-title close-button"><i class="fa fa-times"></i></span>--}}
                        {{--<a class="posted-on" href="#">Photography</a>--}}
                        {{--<h2 class="entry-title"><a href="#">Exploring the Product Design7</a></h2>--}}
                        {{--<p>Authoritatively grow quality technologies for strategic sources. Dramatically evolve--}}
                        {{--front-end services quality.</p>--}}
                        {{--<a href="#" class="readmore">Read Full Post <i class="fa fa-long-arrow-right"></i></a>--}}
                        {{--</div>--}}
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section id="speaker" class="section-padding gray-bg">
        <div class="container">
            <div class="text-center mb-80 wow fadeInUp">
                <h2 class="section-title text-uppercase">awesome speaker</h2>
                <p class="section-sub">Excellent Selection of Experienced Speakers</p>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="team-wrapper">
                        <div class="team-img">
                            <a href="#"><img src="{{asset('assets2/img/event/speakers/ronke-ibitayo-bawonda.jpg')}}"
                                             class="img-responsive"
                                             alt="Image"></a>
                        </div>
                        <div class="team-title">
                            <h3><a href="#">Mrs. Ronke Ibitayo B</a></h3>
                            <span>Specialist</span>
                            <p>New Business Development</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="team-wrapper">
                        <div class="team-img">
                            <a href="#"><img src="{{asset('assets2/img/event/speakers/temilehin.jpg')}}"
                                             class="img-responsive"
                                             alt="Image"></a>
                        </div>
                        <div class="team-title">
                            <h3><a href="#">TIMILEHIN AKINYELE</a></h3>
                            <span>Project Manager</span>
                            <p>
                                Interior Furnishing Expert</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="team-wrapper">
                        <div class="team-img">
                            <a href="#"><img src="{{asset('assets2/img/event/speakers/niyi.jpg')}}"
                                             class="img-responsive"
                                             alt="Image"></a>
                        </div>
                        <div class="team-title">
                            <h3><a href="#">NIYI ADELEYE</a></h3>
                            <span>Project Manager</span>
                            <p>Realtor, and Life Coach</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-padding event-banner-1 bg-fixed parallax-bg overlay purple-overlay"
             data-stellar-background-ratio="0.5">
        <div class="container">
            <h2 class="font-40 mb-30 white-text">A Place To BE</h2>
            <div class="row">
                <div class="col-md-12 white-text">
                    <p>This Event is for all of those who want consistent success in their businesses, grants,
                        sponsorship and partnership</p>
                    <p>
                        A platform for connecting with Millions of Potential Customers/clients from Nigeria and other
                        parts of Africa. epelcon has over the years connected businesses and their founders to the right
                        target audience and have experienced significant growth both in conversion and business
                        management strategies.</p>
                    <a href="#join" class="waves-effect waves-light btn pink"> Join Now!</a>
                </div>
            </div>
        </div>
    </section>
    <section id="schedule" class="section-padding">
        <div class="container">
            <div class="text-center mb-80 wow fadeInUp">
                <h2 class="section-title text-uppercase">Event Schedule</h2>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="border-tab transparent-nav event-schedule">

                        <img src="{{asset('assets2/img/wlg-schedule.png')}}" class="img img-responsive" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="ticket" class="section-padding" style="background-color: #511338;">
        <div class="container">
            <div class="text-center mb-80 wow fadeInUp">
                <h2 class="section-title text-uppercase white-text">TICKET</h2>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="border-tab center transparent-nav event-schedule">
                        <center>
                            <img src="{{asset('assets2/img/free_event.jpg')}}" class="img img-responsive center-align"
                                 alt="">
                        </center>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="join" class="section-padding event-banner-2 bg-fixed parallax-bg  overlay purple-overlay"
             data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 white-text">
                    <h2 class="font-40 mb-30 white-text line-height-50"><span
                                class="text-bold brand-color">Hurry Up!</span>
                        Limited Seat Available</h2>
                    <p>The First 20 people stand an chance of getting Membership Subscription FEE Discount at the
                        Venue</p>
                    <br>
                    <div class="countdown-wrapper">
                        <ul class="countdown">
                            <li>
                                <span class="days brand-color">00</span>
                                <p>days</p>
                            </li>
                            <li>
                                <span class="hours light-blue-text">00</span>
                                <p>hours </p>
                            </li>
                            <li>
                                <span class="minutes green-text">00</span>
                                <p>minutes</p>
                            </li>
                            <li>
                                <span class="seconds pink-text">00</span>
                                <p>seconds</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5 col-md-offset-1">
                    <div class="booking-form-wrapper">
                        <style>
                            .web-alert{
                                color:green!important;
                            }
                        </style>
                        @include('includes.flash')
                        <h3>Quick Booking Form</h3>
                        <form name="contact-form" id="contactForm" class="clearfix"
                              action="{{route('save_attendant')}}" method="get">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-field">
                                        <input type="text" name="firstname" value="{{old('firstname')}}" required
                                               class="validate {{$errors->has('phone')? 'is-invalid':''}}"
                                               id="firstname">
                                        <label for="firstname">First Name</label>
                                        @if($errors->has('firstname'))
                                            <span class="alert danger invalid-feedback">
                                        <strong>{{$error->first('firstname')}}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-field">
                                        <input id="lastname" value="{{old('lastname')}}" type="tel" required
                                               name="lastname"
                                               class="validate {{$errors->has('phone')? 'is-invalid':''}}">
                                        <label for="lastname">Last Name</label>
                                        @if($errors->has('lastname'))
                                            <span class="alert danger invalid-feedback">
                                        <strong>{{$error->first('lastname')}}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="input-field">
                                        <input id="phone" type="tel" required name="phone"
                                               class="validate {{$errors->has('phone')? 'is-invalid':''}}">
                                        <label for="phone">Phone Number</label>
                                        @if($errors->has('phone'))
                                            <span class="alert danger invalid-feedback">
                                        <strong>{{$error->first('phone')}}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <label class="sr-only" for="email">Email</label>
                                <input id="email" type="email" required name="email"
                                       class="validate {{$errors->has('phone')? 'is-invalid':''}}">
                                <label for="email" data-error="wrong" data-success="right">Email</label>
                                @if($errors->has('email'))
                                    <span class="alert danger invalid-feedback">
                                        <strong>{{$error->first('email')}}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="input-field">
                                <textarea name="message" id="message" class="materialize-textarea"></textarea>
                                <label for="message">Message</label>
                            </div>
                            <button type="submit" name="submit" class="waves-effect waves-light btn pink mt-30">Book Now
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="sponsor" class="section-padding">
        <div class="container">
            <div class="text-center mb-80 wow fadeInUp">
                <h2 class="section-title text-uppercase">confarence sponsors</h2>
            </div>
            <div class="clients-grid no-gutter">
                <div class="col-md-6 col-sm-6">
                    <div class="border-box">
                        <a href="#">
                            <img src="{{asset('assets/img/partners/gatkys.jpg')}}" alt="clients">
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="border-box">
                        <a href="#">
                            <img src="{{asset('assets/img/partners/perfection.jpg')}}" alt="clients">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-padding event-banner-3 bg-fixed parallax-bg overlay dark-5"
             data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="text-center mb-80 wow fadeInUp">
                <h2 class="font-30 white-text text-bold text-uppercase">Sign up for newsletter</h2>
                <p class="section-sub white-text">Signup to recieve constant updates about orn events, promos and
                    exhibitions first-hand</p>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="subscribe-wrapper text-center">
                        <form class="subscribe-form mailchimp" method="post">
                            <div class="clearfix">
                                <div class="input-field">
                                    <label class="sr-only" for="email">Email</label>
                                    <input id="subscribeEmail" type="email" name="subscribeEmail" class="validate">

                                    <label for="subscribeEmail" data-error="wrong" data-success="right">Type your
                                        email</label>
                                </div>
                                <button type="submit" class="btn btn-lg pink waves-effect waves-light">Subscribe Now
                                </button>
                            </div>

                            <p class="subscription-success"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="map-wrapper">
        <div id="myMap" class="height-450"></div>
        <div class="location-info">
            <p>1, Daramola Street (RCCG Auditorioum), Oke-ira, <br>Ogba Ijaye, Lagos</p>
        </div>
    </div>

    <footer class="footer footer-four">
        <div class="primary-footer dark-bg text-center">
            <div class="container">
                <a href="#top" class="page-scroll btn-floating btn-large pink back-top waves-effect waves-light"
                   data-section="#top">
                    <i class="material-icons">&#xE316;</i>
                </a>
                <ul class="social-link tt-animate ltr mt-20">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                </ul>
                <hr class="mt-10">
                <div class="row">
                    <div class="col-md-12">
                        <div class="footer-logo">
                            <img src="{{asset('assets2/img/logo-2.png')}}" style="max-width:200px;" alt="">
                        </div>
                        <span class="copy-text">Copyright &copy; 2023 </span>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </footer>

    <div id="preloader">
        <div class="preloader-position">
            <img src="{{asset('assets/img/logo-colored.png')}}" alt="logo">
            <div class="progress">
                <div class="indeterminate"></div>
            </div>
        </div>
    </div>
@endsection


