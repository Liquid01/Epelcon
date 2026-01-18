@extends('layouts.members')



@section('page_title')

    Airtime Top-up info

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

                            <li class="breadcrumb-item active">Info

                            </li>

                        </ol>

                    </div>

                </div>

            </div>

        </div>

        <div class="col s12">

            <div class="container">

                <div class="col m8 offset-m2 l8 offset-l2 s12" id="card-reveal-section">

                    <div class="card" style="overflow: hidden;">

                        <div class="card-content">

                            <h5>

                                <span class="card-title activator grey-text text-darken-4 mt-2">

                                   Review Topup Info

                                </span>

                            </h5>

                            @include('includes.back_flash')

                            <form action="{{route('send_airtime_top_up')}}" method="post" id="topup_form">

                                @csrf



                                @isset($opts)

                                    <div class="input-field mb-10">

                                        <div class="row">

                                            <div class="input-field col s12">

                                                <input id="msisdn" name="msisdn" required type="hidden"

                                                       value="{{$opts->msisdn}}"

                                                       class="">

                                                <p><strong>Country: {{$opts->country}}</strong></p>

                                                <p><strong>Operator: {{$opts->operator}}</strong></p>

                                                <p><strong>MSISDN: {{$opts->msisdn}}</strong></p>

                                            </div>

                                        </div>

                                    </div>

                                @endisset

                                <h6>Enter Amount</h6>

                                <hr>



                                @isset($products)

                                    <div class="input-field mb-10">

                                        <div class="row">

                                            <div class="input-field col s12">

                                                <p><strong>Min:</strong> 1 {{($products[0])->topup_currency}}</p>

                                                <p><strong>Max:</strong> 20,000 {{($products[0])->topup_currency}}</p>

                                                <input id="topup_amount" name="topup_amount" required

                                                       type="number"

                                                       min="100"

                                                       max="20000"

                                                       placeholder="Enter Topup Amount"

                                                       class="{{ $errors->has('topup_amount') ? ' is-invalid' : '' }}">

                                                @if ($errors->has('topup_amount'))

                                                    <span class="invalid-feedback red-text" role="alert">

                                                        <strong>{{ $errors->first('topup_amount') }} </strong>

                                                    </span>

                                                @endif



                                                <input type="hidden" name="product_id"

                                                       value="{{$products[0]->product_id}}">

                                            </div>

                                        </div>

                                    </div>

                                @endisset

                                <button class="btn btn-success airtime_next" id="topup_btn"

                                        style="float:right; margin-top:-30px;">

                                    Topup

                                </button>

                            </form>

                        </div>

                    </div>





                </div>

            </div>

        </div>

    </div>

@endsection
