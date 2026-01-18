@extends('layouts.register')

@section('page_title')
    Join Us
@endsection

@section('content')
    <div class="ms-hero ms-hero-page-override ms-hero ms-hero-bg-white" style="margin-top:0px!important; margin-bottom:30px;">
        <div class="container">
            <div class="text-center">
                <i class="fa fa-long-arrow-left" id="reg_back" style="cursor: pointer"> Back</i>
                <a href="{{ url('/') }}" class="btn btn-lg btn-primary">
                    <img src="{{ asset('assets/images/logo-2.png') }}" style="max-width:100px;" alt="Home">
                </a>
            </div>
        </div>
        <div class="container" style="background-color: white; margin-top:30px;">
            <div class="row" id="package_wrapper">
                <div class="col-md-6 col-md-offset-3">
                    @include('includes.errors')
                    <div class="  card-primary animated fadeInUp animation-delay-7" style=" ">
                        <div class="card-block">
                            <div class="col-md-12">
                                <h4 class="mb-3">Select Package</h3>
                                <div class="row text-center">
                                    @foreach (\App\Package::all() as $package)
                                        <?php $colors = ['default', 'info', 'dark-inverse', 'success', 'royal', 'royal-inverse', 'warning', 'danger', 'primary-inverse']; ?>
                                        <div class="card card- card-{{ $colors[$package->id] }} col-md-6 col-sm-6 col-xs-4 package"
                                            data-name="{{ $package->name }}" data-bottles="{{ $package->bottles }}"
                                            data-amount="{{ $package->amount }}" id="{{ $package->id }}">
                                            <div class="row">
                                                <div class="img img-responsive pt-2">
                                                    <img src="{{ asset('assets/images/bottle.png') }}" width="40" style="max-width: 40px" alt="">
                                                    <span>X 
                                                            {{ ceil($package->bottles) }} 
                                                    </span>
                                                </div>
                                                <p class=" p-item" style="font-size: 12px!important;">
                                                    {{ $package->name }} <br>
                                                    <strong>&#x20a6;{{ number_format($package->amount) }}</strong>
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="clearfix mb-5"></div>
        {{-- <div class="row bg-primary" style="min-height:100px; background: #014664;"></div> --}}

        <div class="container" style="background-color: white; display: none; margin-top:100px;" id="reg_wrapper">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="card card-hero card-primary animated fadeInUp animation-delay-7" style=" ">
                        <div class="card-block">
                            <h5 class="color-primary text-center">
                                <span id="package_price">&#x20a6;16,000</span> <img src="{{ asset('assets/images/bottle.png') }}" width="40" style="max-width: 40px; margin-top: 10px;;" alt="">
                            </h5>
                            @include('includes.web-flash')
                            <div class="row">
                                <div class="buy_pin">
                                    <div class="card"
                                        style="background-color: white; border:0!important; box-shadow:none!important;">
                                        <div class="card-block">
                                            <div class="tab-content">
                                                <div role="have_pin" class="tab-pane fade active in" id="have_pin">
                                                    <form class="form-horizontal"
                                                        style="border:none!important; width:100%!important;" method="post"
                                                        action="{{ route('register') }}">
                                                        @csrf
                                                        <fieldset>
                                                            <div class="sponsor" style="display: block;">

                                                                {{-- Sponsor --}}
                                                                <div class="form-group">
                                                                    <label for="sponsor"
                                                                        class="col-md-2 control-label">Referrer</label>
                                                                    <div class="col-md-10">
                                                                        <input type="text"
                                                                            class="form-control {{ $errors->has('sponsor' ? ' is-invalid' : '') }}"
                                                                            name="sponsor" required
                                                                            value="{{ old('sponsor') }}" id="sponsor"
                                                                            placeholder="Referrer's username"
                                                                            onautocomplete="alert('hi');"
                                                                            autocomplete="none">
                                                                        @if ($errors->has('sponsor'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>
                                                                                    {{ $errors->first('sponsor') }}
                                                                                </strong>
                                                                            </span>
                                                                        @endif
                                                                        <div id="sponsor_result"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="parent" style="display: block;">

                                                                {{-- parent --}}

                                                                <div class="form-group">
                                                                    <label for="parent"
                                                                        class="col-md-2 control-label">Parent (Placement)</label>
                                                                    <div class="col-md-10">
                                                                        <input type="text"
                                                                            class="form-control {{ $errors->has('parent' ? ' is-invalid' : '') }}"
                                                                            name="parent" required
                                                                            value="{{ old('parent') }}" id="parent"
                                                                            placeholder="Sponsor's username"
                                                                            onautocomplete=""
                                                                            autocomplete="none">
                                                                        @if ($errors->has('parent'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>
                                                                                    {{ $errors->first('parent') }}
                                                                                </strong>
                                                                            </span>
                                                                        @endif
                                                                        <div id="parent_result"></div>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                            <input type="hidden" value="0" name="position"
                                                                          id="position">
                                                            {{-- <input type="hidden" value="r44t" id="referrer"> --}}

                                                            <input type="hidden" id="package_id" name="package_id">
                                                            <div class="other_parts" id="other_parts" style="display: none">
                                                                <div class="form-group">
                                                                    <label for="username"
                                                                        class="col-md-2 control-label">Username</label>
                                                                    <div class="col-md-10">
                                                                        <input type="text"
                                                                            class="form-control  {{ $errors->has('username' ? ' is-invalid' : '') }}"
                                                                            name="username" required
                                                                            value="{{ old('username') }}" id="username"
                                                                            placeholder="Username">
                                                                        @if ($errors->has('username'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>
                                                                                    {{ $errors->first('username') }}
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
                                                                            class="form-control  {{ $errors->has('phone' ? ' is-invalid' : '') }}"
                                                                            id="phone"
                                                                            placeholder="Enter your correct phone number">
                                                                    </div>
                                                                    @if ($errors->has('phone'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>
                                                                                {{ $errors->first('phone') }}
                                                                            </strong>
                                                                        </span>
                                                                    @endif
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="email"
                                                                        class="col-md-2 control-label">Email</label>
                                                                    <div class="col-md-10">
                                                                        <input type="email" name="email"
                                                                            class="form-control  {{ $errors->has('email' ? ' is-invalid' : '') }}"
                                                                            value="{{ old('email') }}" id="email"
                                                                            placeholder="Email">
                                                                        @if ($errors->has('email'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>
                                                                                    {{ $errors->first('email') }}
                                                                                </strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="inputPassword"
                                                                        class="col-md-2 control-label">Password</label>
                                                                    <div class="col-md-10">
                                                                        <div class="input-group">
                                                                            <input type="password" required
                                                                                name="password"
                                                                                class="form-control type_toggle {{ $errors->has('username' ? ' is-invalid' : '') }}"
                                                                                id="inputPassword" placeholder="Password">
                                                                            <div class="input-group-addon">
                                                                                <i class="fa fa-eye show_pass"></i>
                                                                            </div>
                                                                        </div>

                                                                        @if ($errors->has('password'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>
                                                                                    {{ $errors->first('password') }}
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
                                                                        <div class="input-group">
                                                                            <input type="password"
                                                                                name="password_confirmation" required
                                                                                class="form-control type_toggle {{ $errors->has('username' ? ' is-invalid' : '') }}"
                                                                                id="password-confirm"
                                                                                placeholder="Password">
                                                                            <div class="input-group-addon">
                                                                                <i class="fa fa-eye show_pass"></i>
                                                                            </div>
                                                                        </div>

                                                                        @if ($errors->has('password_confirmation'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>
                                                                                    {{ $errors->first('password_confirmation') }}
                                                                                </strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="firstname"
                                                                        class="col-md-2 control-label">First
                                                                        Name</label>
                                                                    <div class="col-md-10">
                                                                        <input type="text" name="firstname" required
                                                                            class="form-control {{ $errors->has('firstname' ? ' is-invalid' : '') }}"
                                                                            id="firstname" value="{{ old('firstname') }}"
                                                                            placeholder="First Name">
                                                                    </div>
                                                                    @if ($errors->has('firstname'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>
                                                                                {{ $errors->first('firstname') }}
                                                                            </strong>
                                                                        </span>
                                                                    @endif
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="lastname"
                                                                        class="col-md-2 control-label">Last
                                                                        Name</label>
                                                                    <div class="col-md-10">
                                                                        <input type="text" name="lastname" required
                                                                            class="form-control {{ $errors->has('lastname' ? ' is-invalid' : '') }}"
                                                                            id="lastname" value="{{ old('lastname') }}"
                                                                            placeholder="Last Name">
                                                                        @if ($errors->has('lastname'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>
                                                                                    {{ $errors->first('lastname') }}
                                                                                </strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                                {{-- <div class="form-group">
                                                                    <label for="serial"
                                                                        class="col-md-2 control-label">Serial
                                                                        Number</label>
                                                                    <div class="col-md-10">
                                                                        <input type="text" name="serial" required
                                                                            class="form-control  {{ $errors->has('serial' ? ' is-invalid' : '') }}"
                                                                            id="serial" value="{{ old('serial') }}"
                                                                            placeholder="Serial">
                                                                        <div id="serial_result" class="serial_result">
                                                                        </div>
                                                                        @if ($errors->has('serial'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>
                                                                                    {{ $errors->first('serial') }}
                                                                                </strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>

                                                                </div> --}}

                                                                <div class="form-group">
                                                                    <label for="code"
                                                                        class="col-md-2 control-label">PIN</label>
                                                                    <div class="col-md-10">
                                                                        <div class="input-group">
                                                                            <input type="password" name="pincode" required
                                                                                class="form-control type_toggle  {{ $errors->has('pin' ? ' is-invalid' : '') }}"
                                                                                id="pincode" placeholder="Enter PIN">
                                                                            <div class="input-group-addon">
                                                                                <i class="fa fa-eye show_pass"></i>
                                                                            </div>
                                                                        </div>

                                                                        <div id="code_result" class="code_result"></div>

                                                                        @if ($errors->has('pincode'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>
                                                                                    {{ $errors->first('pincode') }}
                                                                                </strong>
                                                                            </span>
                                                                        @endif

                                                                        <small class="text-success"><i
                                                                                class="fa fa-info-circle"> Don't have
                                                                                PIN?</i>
                                                                            <strong>
                                                                                <a href="#buy_pin" aria-controls="buy_pin"
                                                                                    role="tab" data-toggle="tab"
                                                                                    class="text-royal">Buy
                                                                                    PIN</a>
                                                                            </strong>
                                                                        </small>
                                                                    </div>

                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-offset-2 col-md-10">
                                                                        <div class="checkbox">
                                                                            <label>
                                                                                <input type="checkbox" required
                                                                                    id="reg_terms">
                                                                                <span class="ml-2">I have read and agreed to the
                                                                                    Terms and Conditions of EPELCON.</span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <button class="btn btn-raised btn-block btn-primary"
                                                                    id="reg_button" disabled="disabled">Register
                                                                </button>
                                                            </div>
                                                        </fieldset>
                                                    </form>
                                                </div>

                                                <!--PIN PURCHASE STARTS-->
                                                <div role="buy_pin" aria-controls="buy_pin" role="tab"
                                                    data-toggle="tab" class="tab-pane fade" id="buy_pin">
                                                    <form id="paymentForm" action="javascript:void(0);">
                                                        <div class="form-group">
                                                            <label for="pin_quantity">Quantity</label>
                                                            <input class="form-control" min="1" step="1"
                                                                value="1" id="pin_quantity" placeholder="quantity"
                                                                type="number" formnovalidate required
                                                                style="background: #fff; color: #000;">
                                                        </div>
                                                        <div class="form-group">
                                                            <h3 class="text-center" id="pin_amount"></h3>
                                                            <input type="hidden" name="pay_amount" id="pay_amount">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="pay_user_email">Email Address</label>
                                                            <input type="email" class="form-control"
                                                                id="pay_user_email" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="pay_first_name">First Name</label>
                                                            <input type="text" id="pay_first_name" required
                                                                class="form-control" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="pay_last_name">Last Name</label>
                                                            <input type="text" id="pay_last_name" required
                                                                class="form-control" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="pay_user_phone">Phone</label>
                                                            <input type="text" id="pay_user_phone" required
                                                                class="form-control"
                                                                placeholder="Enter correct Phone number" />
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
    </div>
    {{--        <script src="https://js.paystack.co/v2/inline.js"></script> --}}
@endsection
