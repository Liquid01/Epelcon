@extends('layouts.register')

@section('page_title')
    Join with referral
@endsection

@section('content')
    <div class="ms-hero-page-override ms-hero-img-keyboard  ms-hero-bg-light">
        <div class="container">
            <div class="text-center">

                <p class="lead lead-lg color-dark text-center center-block mt-2 mw-800 text-uppercase fw-700 animated fadeInUp animation-delay-7">
                    Sign-in and enjoy Amazing
                    <span class="color-primary"> Business Opportunities </span>
                </p>
            </div>
        </div>
    </div>
    {{--<div class="row bg-primary" style="min-height:100px; background: #014664;"></div>--}}

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
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

                        <h1 class="color-primary text-center">Register</h1>

                        <div class="row">
                            <div class="buy_pin">
                                <div class="card">
                                    <ul class="nav nav-tabs nav-tabs-full nav-tabs-4 shadow-2dp" role="tablist">
                                        <li role="presentation" class="active" style="width:50%!important;">
                                            <a class="withoutripple" href="#have_pin" aria-controls="have_pin"
                                               role="tab" data-toggle="tab">
                                                <i class="zmdi zmdi-star"></i>
                                                <span class="">I HAVE PIN</span>
                                            </a>
                                        </li>
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
                                            <div role="have_pin" class="tab-pane fade active in" id="have_pin">
                                                <form class="form-horizontal" method="post"
                                                      action="{{route('register')}}">
                                                    @csrf
                                                    <fieldset>

                                                        @if($sponsor_username != null)
                                                            <div class="form-group">
                                                                <div for="sponsor" class="col-md-2 control-label">Sponsor: </div>
                                                                <div class="col-md-10">
                                                                    <strong class="" style="line-height:3;">{{$sponsor_username}}</strong>
                                                                    <input type="hidden"
                                                                           class="form-control {{$errors->has('sponsor' ? ' is-invalid': '')}}"
                                                                           name="sponsor" required
                                                                           value="{{ old('$sponsor_username') }}" id="sponsor"
                                                                          >
                                                                    @if($errors->has('sponsor'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>
                                                                                {{$errors->first('sponsor')}}
                                                                            </strong>
                                                                        </span>
                                                                    @endif
                                                                    <div id="sponsor_result" class="text-success">{{$sponsoring_user->firstname . ' '. $sponsoring_user->lastname}}</div>
                                                                </div>

                                                            </div>

                                                        @else
                                                            <div class="sponsor" style="display: block;">

                                                                {{--Sponsor--}}
                                                                <div class="form-group">
                                                                    <label for="sponsor" class="col-md-2 control-label">Sponsor</label>
                                                                    <div class="col-md-10">
                                                                        <input type="text"
                                                                               class="form-control {{$errors->has('sponsor' ? ' is-invalid': '')}}"
                                                                               name="sponsor" required
                                                                               value="{{ old('sponsor') }}" id="sponsor"
                                                                               placeholder="Sponsor/referrer username"
                                                                               onautocomplete="alert('hi');">
                                                                        @if($errors->has('sponsor'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                            <strong>
                                                                                {{$errors->first('sponsor')}}
                                                                            </strong>
                                                                        </span>
                                                                        @endif
                                                                        <div id="sponsor_result"></div>
                                                                    </div>

                                                                </div>

                                                                <div class="error_place" style="display:none"></div>

                                                                {{--position--}}
                                                                <div class="form-group">
                                                                    <label for="position" class="col-md-2 control-label">Position</label>
                                                                    <div class="col-md-10">
                                                                        <select id="position" name="position" required
                                                                                class="form-control selectpicker">
                                                                            <option value="a">Select Position</option>
                                                                            <option value="0" {{old('position') == "0"? 'selected':''}}>
                                                                                Left
                                                                            </option>
                                                                            <option value="1" {{old('position') == "1"? 'selected':''}}>
                                                                                Right
                                                                            </option>
                                                                        </select>
                                                                        @if($errors->has('position'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                            <strong>
                                                                                {{$errors->first('position')}}
                                                                            </strong>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {{--<input type="hidden" value="r44t" id="referrer">--}}
                                                        @endif

                                                        <div class="sponsor" style="display: block;">

                                                            {{--Sponsor--}}
                                                            {{--<div class="form-group">--}}
                                                                {{--<label for="sponsor" class="col-md-2 control-label">Sponsor</label>--}}
                                                                {{--<div class="col-md-10">--}}
                                                                    {{--<input type="text"--}}
                                                                           {{--class="form-control {{$errors->has('sponsor' ? ' is-invalid': '')}}"--}}
                                                                           {{--name="sponsor" required--}}
                                                                           {{--value="{{ old('sponsor') }}" id="sponsor"--}}
                                                                           {{--placeholder="Sponsor/referrer username"--}}
                                                                           {{--onautocomplete="alert('hi');">--}}
                                                                    {{--@if($errors->has('sponsor'))--}}
                                                                        {{--<span class="invalid-feedback" role="alert">--}}
                                                                            {{--<strong>--}}
                                                                                {{--{{$errors->first('sponsor')}}--}}
                                                                            {{--</strong>--}}
                                                                        {{--</span>--}}
                                                                    {{--@endif--}}
                                                                    {{--<div id="sponsor_result"></div>--}}
                                                                {{--</div>--}}

                                                            {{--</div>--}}

                                                            <div class="error_place" style="display:none"></div>

                                                            {{--position--}}
                                                            <div class="form-group">
                                                                <label for="position" class="col-md-2 control-label">Position</label>
                                                                <div class="col-md-10">
                                                                    <select id="position" name="position" required
                                                                            class="form-control selectpicker">
                                                                        <option value="a">Select Position</option>
                                                                        <option value="0" {{old('position') == "0"? 'selected':''}}>
                                                                            Left
                                                                        </option>
                                                                        <option value="1" {{old('position') == "1"? 'selected':''}}>
                                                                            Right
                                                                        </option>
                                                                    </select>
                                                                    @if($errors->has('position'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>
                                                                                {{$errors->first('position')}}
                                                                            </strong>
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{--<input type="hidden" value="r44t" id="referrer">--}}


                                                        <div class="form-group">
                                                            <label for="username" class="col-md-2 control-label">Username</label>
                                                            <div class="col-md-10">
                                                                <input type="text"
                                                                       class="form-control  {{$errors->has('username' ? ' is-invalid': '')}}"
                                                                       name="username" required
                                                                       value="{{ old('username') }}" id="username"
                                                                       placeholder="Username">
                                                                @if($errors->has('username'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>
                                                                            {{$errors->first('username')}}
                                                                        </strong>
                                                                    </span>
                                                                @endif
                                                                <div id="username_result"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="phone"
                                                                   class="col-md-2 control-label">Phone</label>
                                                            <div class="col-md-10">
                                                                <input type="text" required name="phone"
                                                                       value="{{ old('phone') }}"
                                                                       class="form-control  {{$errors->has('phone' ? ' is-invalid': '')}}"
                                                                       id="phone"
                                                                       placeholder="Enter your correct phone number">
                                                            </div>
                                                            @if($errors->has('phone'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>
                                                                        {{$errors->first('phone')}}
                                                                    </strong>
                                                                </span>
                                                            @endif
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="email"
                                                                   class="col-md-2 control-label">Email</label>
                                                            <div class="col-md-10">
                                                                <input type="email" name="email"
                                                                       class="form-control  {{$errors->has('email' ? ' is-invalid': '')}}"
                                                                       value="{{ old('email') }}" id="email"
                                                                       placeholder="Email">
                                                                @if($errors->has('email'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>
                                                                            {{$errors->first('email')}}
                                                                        </strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="inputPassword" class="col-md-2 control-label">Password</label>
                                                            <div class="col-md-10">
                                                                <input type="password" required name="password"
                                                                       class="form-control  {{$errors->has('username' ? ' is-invalid': '')}}"
                                                                       id="inputPassword"
                                                                       placeholder="Password">
                                                                @if($errors->has('password'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>
                                                                            {{$errors->first('password')}}
                                                                        </strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="password-confirm"
                                                                   class="col-md-2 control-label">Confirm
                                                                Password</label>
                                                            <div class="col-md-10">
                                                                <input type="password" name="password_confirmation"
                                                                       required
                                                                       class="form-control  {{$errors->has('username' ? ' is-invalid': '')}}"
                                                                       id="password-confirm"
                                                                       placeholder="Password">
                                                                @if($errors->has('password_confirmation'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>
                                                                            {{$errors->first('password_confirmation')}}
                                                                        </strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="firstname" class="col-md-2 control-label">First
                                                                Name</label>
                                                            <div class="col-md-10">
                                                                <input type="text" name="firstname" required
                                                                       class="form-control {{$errors->has('firstname' ? ' is-invalid': '')}}"
                                                                       id="firstname"
                                                                       value="{{ old('firstname') }}"
                                                                       placeholder="First Name">
                                                            </div>
                                                            @if($errors->has('firstname'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>
                                                                        {{$errors->first('firstname')}}
                                                                    </strong>
                                                                </span>
                                                            @endif
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="lastname" class="col-md-2 control-label">Last
                                                                Name</label>
                                                            <div class="col-md-10">
                                                                <input type="text" name="lastname" required
                                                                       class="form-control {{$errors->has('lastname' ? ' is-invalid': '')}}"
                                                                       id="lastname"
                                                                       value="{{ old('lastname') }}"
                                                                       placeholder="Last Name">
                                                                @if($errors->has('lastname'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>
                                                                            {{$errors->first('lastname')}}
                                                                        </strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="serial" class="col-md-2 control-label">Serial
                                                                Number</label>
                                                            <div class="col-md-10">
                                                                <input type="text" name="serial" required
                                                                       class="form-control  {{$errors->has('serial' ? ' is-invalid': '')}}"
                                                                       id="serial"
                                                                       value="{{ old('serial') }}" placeholder="Serial">
                                                                @if($errors->has('serial'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>
                                                                            {{$errors->first('serial')}}
                                                                        </strong>
                                                                    </span>
                                                                @endif
                                                            </div>

                                                        </div>

                                                        <div class="form-group">
                                                            <label for="code" class="col-md-2 control-label">PIN</label>
                                                            <div class="col-md-10">
                                                                <input type="password" name="pincode" required
                                                                       class="form-control  {{$errors->has('pin' ? ' is-invalid': '')}}"
                                                                       id="pincode"
                                                                       placeholder="Enter PIN">
                                                                @if($errors->has('pincode'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>
                                                                            {{$errors->first('pincode')}}
                                                                        </strong>
                                                                    </span>
                                                                @endif

                                                                <small class="text-success"><i
                                                                            class="fa fa-info-circle"> Don't have
                                                                        PIN?</i>
                                                                    <strong>
                                                                        <a href="#buy_pin" aria-controls="buy_pin"
                                                                           role="tab"
                                                                           data-toggle="tab" class="text-royal">Buy
                                                                            PIN</a>
                                                                    </strong>
                                                                </small>
                                                            </div>

                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-offset-2 col-md-10">
                                                                <div class="checkbox">
                                                                    <label>
                                                                        <input type="checkbox" required id="reg_terms">
                                                                        <span class="ml-2">I agree to the T&amp;C.</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-raised btn-block btn-primary"
                                                                id="reg_button"
                                                                disabled="disabled">Register
                                                        </button>
                                                    </fieldset>
                                                </form>
                                            </div>

                                            <!--PIN PURCHASE STARTS-->

                                            <div role="buy_pin" aria-controls="buy_pin" role="tab"
                                                 data-toggle="tab" class="tab-pane fade" id="buy_pin">
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
                                                               class="form-control"
                                                               placeholder="Enter correct Phone number"/>
                                                        <small class="text-warning">Ensure Phone is correct! - <i
                                                                    class="text-dark" style="color:purple">Pin will be
                                                                sent here.</i></small>

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
