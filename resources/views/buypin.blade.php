@extends('layouts.register')

@section('page_title')
    Buy Pin
@endsection

@section('content')
    <div class="ms-hero ms-hero-page-override ms-hero ms-hero-bg-white">
        {{--<div class="container">--}}
            {{--<div class="text-center">--}}

                {{--<p class="lead lead-lg color-dark text-center center-block mt-2 mw-800 text-uppercase fw-300 animated fadeInUp animation-delay-7">--}}
                    {{--JOIN US and enjoy Amazing--}}
                    {{--<span class="color-primary"> Business Opportunities </span>--}}
                {{--</p>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
    {{--<div class="row bg-primary" style="min-height:100px; background: #014664;"></div>--}}

    <div class="container">
        <div class="row">
            <div class="col-md-7 col-md-offset-3">
                <div class="card card-hero card-primary animated fadeInUp animation-delay-7">
                    <div class="card-block">
                        @if(count($errors) > 0)
                            <h3 class="text-danger">Oops! got some errors.</h3>

                            @foreach($errors->all() as $message)
                                <div class="alert alert-danger alert-light alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="zmdi zmdi-close"></i>
                                    </button>
                                    <strong>
                                        <i class="zmdi zmdi-close-circle"></i> Error!</strong> {{$message}}.
                                </div>
                            @endforeach
                        @endif

                        <h1 class="color-primary text-center">Buy Pin</h1>

                        <div class="row">
                            <div class="buy_pin">
                                <div class="card">
                                    <ul class="nav nav-tabs nav-tabs-full nav-tabs-4 shadow-2dp" role="tablist">
                                        <li role="presentation" class="" style="width:50%!important;">
                                            <a class="withoutripple" href="#buy_pin" aria-controls="buy_pin" role="tab"
                                               data-toggle="tab">
                                                <i class="zmdi zmdi-money"></i>
                                                <span class="">BUY PIN</span>
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="card-block">
                                        <div class="tab-content">
                                            <!--PIN PURCHASE STARTS-->

                                            <div role="buy_pin" aria-controls="buy_pin" role="tab"
                                                 data-toggle="tab" class="tab-pane fade in active" id="buy_pin">
                                                <form id="paymentForm" action="javascript:void(0);">

                                                    <div class="form-group">
                                                        <label for="pin_quantity">Quantity</label>
                                                        <input class="form-control" min="1" step="1" value="1"
                                                               id="pin_quantity" placeholder="quantity"
                                                               type="number" formnovalidate required
                                                               style="background: #fff; color: #000;">
                                                    </div>

                                                    <div class="form-group">
                                                        <h3 class="text-center" id="pin_amount"></h3>
                                                        <input type="hidden" name="pay_amount" id="pay_amount">
                                                    </div>

                                                    <div class="form-group">

                                                        <label for="pay_user_email">Email Address</label>

                                                        <input type="email" class="form-control" id="pay_user_email"/>

                                                    </div>

                                                    <div class="form-group">

                                                        <label for="pay_first_name">First Name</label>

                                                        <input type="text" id="pay_first_name" required
                                                               class="form-control"/>

                                                    </div>

                                                    <div class="form-group">

                                                        <label for="pay_last_name">Last Name</label>

                                                        <input type="text" id="pay_last_name" required
                                                               class="form-control"/>

                                                    </div>

                                                    <div class="form-group">

                                                        <label for="pay_user_phone">Phone</label>

                                                        <input type="text" id="pay_user_phone" required
                                                               class="form-control" placeholder="Enter correct Phone number"/>
                                                        <small class="text-warning">Ensure Phone is correct! - <i class="text-dark" style="color:purple">Pin will be sent here.</i></small>

                                                    </div>

                                                    <div class="form-submit">

                                                        <button type="submit"
                                                                class="btn btn-raised btn-block btn-success"
                                                                onclick="payWithPaystack()"> Pay
                                                        </button>

                                                    </div>

                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://js.paystack.co/v2/inline.js"></script>

@endsection
