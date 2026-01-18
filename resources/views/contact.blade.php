@extends('layouts.web')

@section('content')

    <!-- .wpo-breadcumb-area start -->
    <div class="wpo-breadcumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wpo-breadcumb-wrap">
                        <h2>Contact Us</h2>
                        <ul>
                            <li><a href="{{url('/')}}l">Home</a></li>
                            <li><span>Contact</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .wpo-breadcumb-area end -->

    <!-- start wpo-contact-form-map -->
    <section class="wpo-contact-form-map section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="contact-form">
                                <h2>Get In Touch</h2>
                                <form method="post" class="contact-validation-active" id="contact-form">
                                    <div>
                                        <input type="text" class="form-control" name="name" id="name"
                                               placeholder="First Name">
                                    </div>
                                    <div>
                                        <input type="text" class="form-control" name="name2" id="name2"
                                               placeholder="Last Name">
                                    </div>
                                    <div class="clearfix">
                                        <input type="email" class="form-control" name="email" id="email"
                                               placeholder="Email">
                                    </div>
                                    <div>
                                        <input type="text" class="form-control" name="subject" id="subject"
                                               placeholder="Subject">
                                    </div>
                                    <div>
                                        <textarea class="form-control" name="note" id="note"
                                                  placeholder="Case Description..."></textarea>
                                    </div>
                                    <div class="submit-area">
                                        <button type="submit" class="theme-btn submit-btn">Send Message</button>
                                        <div id="loader">
                                            <i class="ti-reload"></i>
                                        </div>
                                    </div>
                                    <div class="clearfix error-handling-messages">
                                        <div id="success">Thank you</div>
                                        <div id="error"> Error occurred while sending email. Please try again later.
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="contact-map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7928.5263183222805!2d3.18889170885088!3d6.488323022206366!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b841f51a9dcab%3A0x403daaf265a517f1!2s1St%20Gate!5e0!3m2!1sen!2sus!4v1661982952147!5m2!1sen!2sus" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>

                    <!-- wpo-event-area start -->
                @include('home.events')
                <!-- wpo-event-area end -->                </div>
            </div>
        </div> <!-- end container -->
    </section>
    <!-- end wpo-contact-form-map -->
@endsection
