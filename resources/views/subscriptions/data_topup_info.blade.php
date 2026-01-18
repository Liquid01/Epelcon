@extends('layouts.members')



@section('page_title')

    Data Top-up info

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

                            <h6>

                                <span class="card-title activator grey-text text-darken-4 mt-2">

                                   Review Data Info

                                </span>

                            </h6>

                            @include('includes.back_flash')

                            <form action="{{route('send_data_top_up')}}" method="post" id="data_topup_form">

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

                                <h6>Select Denomination</h6>

                                <hr>



                                @isset($products)

                                    <div class="input-field mb-10">

                                        <div class="row">

                                            <div class="input-field col s12">

                                                <select name="data_topup_amount" id="data_topup_amount" class="browser-default">

                                                    @foreach($products as $product)

                                                        <option value="{{$product->denomination.','.$product->product_id}}">

                                                            NGN{{$product->denomination}}, &nbsp;

                                                            {{$product->data_amount >=1000? number_format(($product->data_amount/1000), 1). "GB" : $product->data_amount."MB"}}

                                                            &nbsp; {{$product->validity}}

                                                        </option>

                                                    @endforeach

                                                </select>

                                                @if ($errors->has('data_topup_amount'))

                                                    <span class="invalid-feedback red-text" role="alert">

                                                        <strong>{{ $errors->first('data_topup_amount') }} </strong>

                                                    </span>

                                                @endif

                                            </div>

                                        </div>

                                    </div>

                                @endisset

                                <button class="btn btn-success airtime_next" id="data_topup_btn"

                                        style="float:right; margin-top:-30px;">

                                    Subscribe

                                </button>

                            </form>

                        </div>

                    </div>





                </div>

            </div>

        </div>

    </div>

@endsection
