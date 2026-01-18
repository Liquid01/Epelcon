@extends('layouts.register')

@section('content')
    <div class="ms-hero-page-override ms-hero ms-hero-bg-white">
        <div class="container">
            <div class="text-center">
                <p class="lead lead-lg color-dark text-center center-block fw-300 animated fadeInUp animation-delay-7">
                    DONATE <br>
                    <span class="color-warning">Empower Someone Today </span></p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-md-offset-3">
                <div class="card card-hero card-primary animated fadeInUp animation-delay-7">
                    <div class="card-block">
                        <h1 class="color-primary text-center">SUPPORT</h1>
                        <form class="form-horizontal" action="javascript:void(0);">
                            <script src="https://js.paystack.co/v1/inline.js"></script>
                            @csrf
                            <fieldset>
                                <div class="form-group">
                                    <label for="username" class="col-md-2 control-label">Amount</label>
                                    <div class="col-md-10">
                                        <input type="number" name="amount"
                                               class="form-control {{$errors->has('amount')? 'is-invalid': ''}}"
                                               id="amount" placeholder="amount">
                                        @if($errors->has('amount'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>
                                            {{$errors->first('amount')}}
                                        </strong>
                                        </span>
                                        @endif
                                    </div>
                                    <span class="material-input"></span></div>
                                <div class="form-group">
                                    <label for="name" class="col-md-2 control-label">Full Name</label>
                                    <div class="col-md-10">
                                        <input type="text" name="name"
                                               class="form-control {{$errors->has('name')? 'is-invalid': ''}}"
                                               id="name" placeholder="name">
                                        @if($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>
                                            {{$errors->first('name')}}
                                        </strong>
                                        </span>
                                        @endif
                                    </div>
                                    <span class="material-input"></span>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-md-2 control-label">Email</label>
                                    <div class="col-md-10">
                                        <input type="text" name="email"
                                               class="form-control {{$errors->has('email')? 'is-invalid': ''}}"
                                               id="email" placeholder="email">
                                        @if($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>
                                            {{$errors->first('email')}}
                                        </strong>
                                        </span>
                                        @endif
                                    </div>
                                    <span class="material-input"></span>
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="col-md-2 control-label">Phone</label>
                                    <div class="col-md-10">
                                        <input type="text" name="phone"
                                               class="form-control {{$errors->has('phone')? 'is-invalid': ''}}"
                                               id="phone" placeholder="phone">
                                        @if($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>
                                            {{$errors->first('phone')}}
                                        </strong>
                                        </span>
                                        @endif
                                    </div>
                                    <span class="material-input"></span>
                                </div>
                            </fieldset>
                            <button class="btn btn-raised btn-primary btn-block">Donate
                                <i class="zmdi zmdi-long-arrow-right no-mr ml-1"></i>
                            </button>
                        </form>
                        <div class="text-center mt-4">
                            {{--<h3>Login with</h3>--}}
                            {{--<a href="javascript:void(0)" class="btn-circle btn-facebook">--}}
                            {{--<i class="zmdi zmdi-facebook"></i>--}}
                            {{--</a>--}}
                            {{--<a href="javascript:void(0)" class="btn-circle btn-twitter">--}}
                            {{--<i class="zmdi zmdi-twitter"></i>--}}
                            {{--</a>--}}
                            {{--<a href="javascript:void(0)" class="btn-circle btn-google">--}}
                            {{--<i class="zmdi zmdi-google"></i>--}}
                            {{--</a>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


                        <div class="panel" id="pay_option" style="display:none;">
                            <div class="panel-heading">Payment Options</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <a href="javascript:void(0);" id="pay_in_bank" class="text-center"><span
                                                    style="color:#000000!important;">Pay In Bank</span> &nbsp; <i
                                                    class="fa fa-bank"></i></a>

                                    </div>
                                    <div class="col-md-4">
                                        <a href="javascript:void(0);" onclick="payDonation();" class="text-center"><span
                                                    style="color:#000000!important;">Pay Online</span> &nbsp; <i
                                                    class="fa fa-credit-card"></i></a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="javascript:void(0);" onclick="alert('Check Later');"
                                           class="text-center"><span
                                                    style="color:#000000!important;">Other Options</span> &nbsp; <i
                                                    class="fa fa-plus-circle"></i></a>
                                    </div>
                                </div>
                                <div class="row" id="bank_account" style="padding-top:30px; display: none;">
                                    <h3 class="text-center mt-2">Bank Account Details</h3>
                                    <p class="text-center"><strong>ACCOUNT NAME: </strong>epelcon Worldwide</p>
                                    <p class="text-center"><strong>BANK: </strong>Diamond Access Bank</p>
                                    <p class="text-center"><strong>Account Number: </strong> 40112662</p>
                                </div>
                            </div>
                            {{--Amount: $: <strong id="bank_amount"></strong> &nbsp; &nbsp; NGN: &nbsp; <strong id="naira_value"> </strong>--}}
                        </div>

                        <div class="button-container hidden" style="display: none; padding: 100px; min-height:200px;">
                            <button class=" btn btn-lg btn-block waves-effect waves-light" formnovalidate
                                    onclick="payDonation();">
                                Donate
                            </button>
                        </div>

                    </form>
                    {{--<form method="post" action="{{route('logout')}}">--}}
                    {{--<div class="button-container">--}}
                    {{--<button class=" btn btn-lg btn-block waves-effect waves-light">--}}
                    {{--Login--}}
                    {{--</button>--}}
                    {{--</div>--}}

                    {{--<div class="footer"><a href="#">Forgot your password?</a></div>--}}
                    {{--</form>--}}
                </div>

            </div>
        </div>
    </section>
@endsection
