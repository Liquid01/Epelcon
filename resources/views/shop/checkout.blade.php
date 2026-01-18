@extends('layouts.members')



@section('content')



    <div class="row mb-5" style="">

        <div class="content-wrapper-before black"></div>

        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">

            <!-- Search for small screen-->

            <div class="container">

                <div class="row">

                    <div class="col s10 m6 l6">

                        <h5 class="breadcrumbs-title mt-0 mb-0">SHOP</h5>

                        <ol class="breadcrumbs mb-0">

                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a>

                            <li class="breadcrumb-item"><a href="{{url('shop')}}">Shop</a>

                            </li>

                            <li class="breadcrumb-item active">Checkout

                            </li>

                        </ol>

                    </div>

                </div>

            </div>

        </div>


        <div class="col s12">

            <div class="container">

                <div class="section">

                    <div class="row" id="">

                        <div class="col s12 m12 l12">

                            <div class="card animate fadeLeft">

                                <div class="card-content data-row">

                                    @include('includes.flash')

                                    <div class="invoice-table">

                                        <div class="row">

                                            <div class="col s12 m12 l12 items-div">

                                                @include('shop.checkoutItems')

                                            </div>
                                            <hr>
                                            <br>
                                            <div class="container left delivery-form" style="">

                                                <div class="  inline"

                                                     style="display: inline; margin-top: 100px!important; ">

                                                    <h6>Stockists Centers</h6>

                                                    <div class="card-hover">

{{--                                                    <span>--}}

{{--                                                            <label>--}}

{{--                                                                <input name="delivery_option"--}}
{{--                                                                       data-target="collection_form"--}}

{{--                                                                       id="del_option1" type="radio" checked/>--}}

{{--                                                                <span>Collection Center</span>--}}

{{--                                                            </label>--}}

{{--                                                        </span>--}}
{{--                                                        <span>--}}

{{--                                                            <label>--}}
{{--                                    --}}
{{--                                                                <input name="delivery_option" data-target="delivery_form"--}}
{{--                                    --}}
{{--                                                                       id="del_option2" type="radio"/>--}}
{{--                                    --}}
{{--                                                                <span>Home Delivery</span>--}}
{{--                                    --}}
{{--                                                            </label>--}}
{{--                                    --}}
{{--                                                        </span>--}}

                                                    </div>

                                                    <hr>

                                                    <div id="collection_form">

                                                        {{--                                                        <h6 class="bold">Select Collection Center</h6>--}}

                                                        <form action="{{route('place_collection_order')}}"

                                                              method="post">

                                                            @csrf

                                                            <input type="hidden" name="address"
                                                                   value="Collection Center">

                                                            <div class="row">

                                                                <div class="input-field">

                                                                    <label for="collection_center"></label>

                                                                    <select name="collection_center"
                                                                            class="browser-default"
                                                                            id="collection_center">

                                                                        <option value="ABUJA">ABUJA</option>

                                                                        <option selected="selected" value="LAGOS">
                                                                            LAGOS
                                                                        </option>

                                                                        <option value="KANO">KANO</option>

                                                                        <option value="PH">PH</option>

                                                                        <option value="ONITSHA">ONITSHA</option>

                                                                        <option value="CALABAR">CALABAR</option>

                                                                        <option value="KADUNA">KADUNA</option>

                                                                        <option value="NIGER">NIGER</option>

                                                                        <option value="SULEJA">SULEJA</option>

                                                                    </select>

                                                                </div>

                                                            </div>


                                                            <div class="row">

                                                                <div class="col s12 file-field input-field">

                                                                    <div class="file-path-wrapper">
                                                                        <div class="row">
                                                                            <div class="col s6  m6 mt-3">
                                                                                <a href="{{url('/shop')}}"

                                                                                   class="btn btn-sm  purple waves-effect waves-light placeOrder">Shop

                                                                                </a>
                                                                            </div>

                                                                            <div class="col s6 m6 mt-3">
                                                                                <button
                                                                                    class="btn btn-block btn-lg save_product btn-block float-right">

                                                                                    Order

                                                                                </button>

                                                                            </div>
                                                                        </div>

                                                                        &nbsp; &nbsp;


                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </form>


                                                    </div>

                                                    <div class="row " style="display: none;" id="delivery_form">

                                                        <h6 class="bold">Enter Delivery Address</h6>


                                                        <form class="col s12" method="post"

                                                              action="{{route('place_delivery_order')}}">

                                                            @csrf

                                                            <div class="row">

                                                                <div class="input-field col s12">

                                                                    <input id="name" name="name" required

                                                                           type="text"

                                                                           value="{{old('name')}}"

                                                                           class="{{ $errors->has('name') ? ' is-invalid' : '' }}">

                                                                    <label for="name">Recipients' Name</label>

                                                                    @if ($errors->has('name'))

                                                                        <span class="invalid-feedback" role="alert">

                                                            <strong>{{ $errors->first('name') }} </strong>

                                                        </span>

                                                                    @endif

                                                                </div>

                                                            </div>


                                                            <div class="input-field col s12">

                                                                <input id="phone" required

                                                                       class="{{ $errors->has('phone') ? ' is-invalid' : '' }}"

                                                                       name="phone"

                                                                       value="{{old('phone')}}"

                                                                       type="number">

                                                                <label for="phone">Phone</label>

                                                                @if ($errors->has('phone'))

                                                                    <span class="invalid-feedback" role="alert">

                                                           <strong>{{ $errors->first('phone') }}</strong>

                                                    </span>

                                                                @endif

                                                            </div>


                                                            <div class="row">

                                                                <div class="col s12 input-field">

                                                                    <input id="address1" name="address1"

                                                                           class=" validate {{ $errors->has('address1') ? ' is-invalid' : '' }}"

                                                                           required value="{{old('address1')}}"

                                                                           type="text">

                                                                    <label for="address1">Address Line 1</label>

                                                                    @if ($errors->has('address1'))

                                                                        <span class="invalid-feedback"

                                                                              role="alert">

                                                            <strong>{{ $errors->first('address1') }} </strong>

                                                        </span>

                                                                    @endif

                                                                </div>


                                                            </div>

                                                            <div class="row">

                                                                <div class="input-field col s12">

                                                                    <input type="text" name="address2"

                                                                           class="validate {{$errors->has('address2')? 'is-invalid':''}}">

                                                                    <label for="address2"

                                                                    >Address Line 2</label>

                                                                    @if ($errors->has('address2'))

                                                                        <span class="invalid-feedback"

                                                                              role="alert">

                                                            <strong>{{ $errors->first('address2') }} </strong>

                                                        </span>

                                                                    @endif

                                                                </div>

                                                            </div>

                                                            <div class="row">

                                                                <div class="input-field col s12">

                                                                    <input type="text" name="city"

                                                                           class="validate {{$errors->has('city')? 'is-invalid':''}}">

                                                                    <label for="city"

                                                                           class="active">City</label>

                                                                    @if ($errors->has('city'))

                                                                        <span class="invalid-feedback"

                                                                              role="alert">

                                                            <strong>{{ $errors->first('city') }} </strong>

                                                        </span>

                                                                    @endif

                                                                </div>

                                                            </div>

                                                            <div class="row">

                                                                <div class="input-field col s12">

                                                                    <input type="text" name="state"

                                                                           class="validate {{$errors->has('state')? 'is-invalid':''}}">

                                                                    <label for="state"

                                                                           class="active">State</label>

                                                                    @if ($errors->has('state'))

                                                                        <span class="invalid-feedback"

                                                                              role="alert">

                                                            <strong>{{ $errors->first('state') }} </strong>

                                                        </span>

                                                                    @endif

                                                                </div>

                                                            </div>

                                                            <div class="row">

                                                                <div class="col s12 file-field input-field">

                                                                    <div class="file-path-wrapper">

                                                                        <button
                                                                            class="btn btn-lg save_product btn-block float-right">

                                                                            Place Order

                                                                        </button>

                                                                    </div>

                                                                </div>

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

@endsection
