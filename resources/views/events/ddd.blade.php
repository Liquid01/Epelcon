@extends('layouts.events')



@section('content')







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



                        </ul>

                    </div>

                </div>

                <div class="col-md-5 col-md-offset-1">

                    <div class="booking-form-wrapper">

                        <h3>Quick Booking Form</h3>

                        <form name="contact-form" id="contactForm" class="clearfix"

                              action="{{route('save_attendant')}}" method="POST">

                            @csrf

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="input-field">

                                        <input type="text" name="firstname" value="{{old('firstname')}}" required class="validate" id="firstname">

                                        <label for="firstname">First Name</label>

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="input-field">

                                        <input id="lastname" value="{{old('lastname')}}" type="tel" required name="lastname" class="validate">

                                        <label for="lastname">Last Name</label>

                                    </div>

                                </div>

                            </div>

                            <div class="row">



                                <div class="col-md-6">

                                    <div class="input-field">

                                        <input id="phone" type="tel" required name="phone" class="validate">

                                        <label for="phone">Phone Number</label>

                                    </div>

                                </div>

                                <label class="sr-only" for="email">Email</label>

                                <input id="email" type="email" required name="email" class="validate">

                                <label for="email" data-error="wrong" data-success="right">Email</label>

                            </div>





                            <button type="submit" name="submit" class="waves-effect waves-light btn pink mt-30">Book Now

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>



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
