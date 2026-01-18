@extends('layouts.members')



@section('page_title')

    Bills Payment

@endsection



@section('content')

    <div class="row">

        <div class="content-wrapper-before black"></div>

        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">

            <!-- Search for small screen-->

            <div class="container">

                <div class="row">

                    <div class="col s10 m6 l6">

                        <h5 class="breadcrumbs-title mt-0 mb-0">Subscriptions</h5>

                        <ol class="breadcrumbs mb-0">

                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>

                            </li>

                            <li class="breadcrumb-item"><a href="{{route('member_subscriptions')}}">Subscriptions</a>

                            </li>

                            <li class="breadcrumb-item active">Bills

                            </li>

                        </ol>

                    </div>

                </div>

            </div>

        </div>

        <div class="col s12">

            <div class="">

                <div class="col m8 offset-m2 l8 offset-l2 s12" id="card-reveal-section">

                    <div class="card" style="overflow: hidden;">

                        <div class="card-content">

                            @include('includes.back_flash')

                            @isset($countries)

                                <span class="card-title activator grey-text text-darken-4 mt-2">

                                Select Country

                            </span>



                                @foreach($countries as $country)

                                    <div class="col l3 m3 s12">

                                        <div class="card">

                                            <div class="card-content">

                                                <a href="{{route('bills_services', $country->iso)}}">

                                                    {{$country->country}}

                                                </a>

                                            </div>

                                        </div>

                                    </div>

                                @endforeach

                            @endisset



                            @isset($services)

                                <span class="card-title activator grey-text text-darken-4 mt-2">

                                    Select Service

                                </span>



                                @foreach($services as $service)

                                    <a class="center"

                                       href="{{route('bills_services_products',[$iso, $service->service_id])}}">

                                        <div class="col l3 m3 s12">

                                            <div class="card">



                                                <div class="card-content">



                                                    {{$service->service_name}}



                                                </div>

                                            </div>

                                        </div>

                                    </a>

                                @endforeach

                            @endisset



                            @isset($products)

                                <span class="card-title activator grey-text text-darken-4 mt-2">

                                    Select Product

                                </span>

                                <div class="row">

                                    <ul class="collapsible" data-collapsible="accordion">

                                        @foreach($products as $product)

                                            <li>

                                                <div class="collapsible-header">



                                                    <i class="material-icons">power</i>{{$product->name}}

                                                </div>

                                                <div class="collapsible-body">

                                                    {{--TOPUP FORM--}}

                                                    <form action="{{route('top_up_bills', [$iso, $service_id, $product->product_id])}}" method="post"

                                                          id="bills_form-{{$product->product_id}}">

                                                        @csrf



                                                        <div class="input-field mb-10">

                                                            <div class="row">

                                                                <div class="input-field col s12">

                                                                    <h6>Review Details </h6>

                                                                    <p>

                                                                        <strong>Country: {{$iso == "NG"? "Nigeria":""}}</strong>

                                                                    </p>

                                                                    <p>

                                                                        <strong>Service: {{ucfirst($service_id)}}</strong>

                                                                    </p>

                                                                    <p><strong>Operator: {{$product->name}}</strong>

                                                                    </p>

                                                                </div>

                                                            </div>

                                                        </div>



                                                        {{--validating Smartcard--}}

                                                        <h6>Validate SmartCard </h6>

                                                        <div class="input-field mb-10">

                                                            <div class="row">

                                                                <div class="input-field col s12">

                                                                    <div class="input-group card_form">

                                                                        <label for="smartcard_number-{{$product->product_id}}" class="">Enter Smartcard Number</label>

                                                                        <input id="smartcard_number-{{$product->product_id}}"

                                                                               type="text"

                                                                               name="smartcard_number" required

                                                                               placeholder="Enter SmartCard Number"

                                                                               class="{{ $errors->has('smartcard_number') ? ' is-invalid' : '' }}">

                                                                        @if ($errors->has('smartcard_number'))

                                                                            <span class="invalid-feedback red-text"

                                                                                  role="alert">

                                                                                <strong>{{ $errors->first('smartcard_number') }} </strong>

                                                                            </span>

                                                                        @endif

                                                                        <div class="btn btn-addon smart_card_validate right" data-form="#bills_form-{{$product->product_id}}"

                                                                             data-smartcard="#smartcard_number-{{$product->product_id}}"

                                                                             data-product_id="{{$product->product_id}}"

                                                                             data-service_id="{{$service_id}}" >

                                                                            Validate

                                                                        </div>

                                                                    </div>





                                                                    <div class="clear-both clear"></div>

                                                                    <div class="card smartcard_details" style="display: none;">

                                                                        <div class="card-content">

                                                                            <div class="row">

                                                                                <div class="col l6 m6 s12">

                                                                                    <strong>SmartCard/Account: </strong>

                                                                                </div>

                                                                                <div class="col l6 m6 s12">

                                                                                    <span style="color:green!important;" class="{{$product->product_id}}_card_details"></span>



                                                                                </div>

                                                                                <div class="col l6 m6 s12">

                                                                                    <strong>Account Name:</strong>

                                                                                </div>

                                                                                <div class="col l6 m6 s12">

                                                                                    <span style="color:green!important;"  class="{{$product->product_id}}_account_details"></span>

                                                                                </div>

                                                                                <div class="col l6 m6 s12">

                                                                                    <strong>SmartCard/Account Address:</strong>

                                                                                </div>

                                                                                <div class="col l6 m6 s12">

                                                                                    <span style="color:green!important;"  class="{{$product->product_id}}_address_details"></span>

                                                                                </div>

                                                                            </div>

                                                                        </div>



                                                                        <p class="right mt-1 mb-1" style="padding:15px;">

                                                                            <a href="javascript:void(0);" class="reset_validate">reset</a>

                                                                        </p>

                                                                    </div>



                                                                </div>

                                                            </div>

                                                        </div>



                                                        {{--Selecting Meter Type--}}

                                                        <div class="input-field mb-10">

                                                            <div class="row">

                                                                <div class="input-field col s12">

                                                                    <div class="input-group ">

                                                                        <label for="meter_type-{{$product->product_id}}" class="">Meter Type</label>

                                                                        <select id="meter_type-{{$product->product_id}}" name="meter_type" class="browser-default {{ $errors->has('meter_type') ? ' is-invalid' : '' }}">

                                                                            <option value="0">Select Meter Type</option>

                                                                            <option value="1">STS Prepaid</option>

                                                                            <option value="2">Smart Meter</option>

                                                                        </select>

                                                                        @if ($errors->has('meter_type'))

                                                                            <span class="invalid-feedback red-text"

                                                                                  role="alert">

                                                                                <strong>{{ $errors->first('meter_type')}} </strong>

                                                                            </span>

                                                                        @endif

                                                                    </div>



                                                                </div>

                                                            </div>

                                                        </div>





                                                        {{--Enter Amount to topup--}}

                                                        <h6>Amount</h6>

                                                            <div class="input-field mb-10">

                                                                <div class="row">

                                                                    <div class="input-field col s12">

                                                                        <p>

                                                                            <strong>Min:</strong>

                                                                            {{$product->min_denomination}} {{$product->topup_currency}}

                                                                        </p>

                                                                        <p>

                                                                            <strong>Max:</strong>

                                                                            {{$product->max_denomination}} {{$product->topup_currency}}

                                                                        </p>

                                                                        <p>

                                                                            <strong>Exchange Rate:</strong>

                                                                            {{$product->rate}} Unit(s) to 1{{$product->topup_currency}}

                                                                        </p>

                                                                        <input id="topup_amount" name="topup_amount"

                                                                               required

                                                                               type="number"

                                                                               min="{{$product->min_denomination}}"

                                                                               max="{{$product->max_denomination}}"

                                                                               placeholder="Enter Topup Amount"

                                                                               class="{{ $errors->has('topup_amount') ? ' is-invalid' : '' }}">

                                                                        @if ($errors->has('topup_amount'))

                                                                            <span class="invalid-feedback red-text"

                                                                                  role="alert">

                                                                                <strong>{{ $errors->first('topup_amount') }} </strong>

                                                                            </span>

                                                                        @endif



                                                                        <input type="hidden" name="product_id"

                                                                               value="{{$product->product_id}}">

                                                                        <input type="hidden" name="iso"

                                                                               value="{{$iso}}">

                                                                        <input type="hidden" name="min_denomination"

                                                                               value="{{$product->min_denomination}}">

                                                                        <input type="hidden" name="max_denomination"

                                                                               value="{{$product->max_denomination}}">



                                                                        <input type="hidden" name="service_id"

                                                                               value="{{$service_id}}">

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        <button class="btn btn-success bills_next btn-block" id="topup_btn"

                                                                style="float:right; margin-top:-30px; display: block; width: 100%;">

                                                            Topup

                                                        </button>

                                                    </form>



                                                </div>

                                            </li>

                                        @endforeach

                                    </ul>

                                </div>

                            @endisset

                        </div>

                    </div>





                </div>

            </div>

        </div>

    </div>

@endsection
