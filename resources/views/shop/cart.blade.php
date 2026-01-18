@extends('layouts.shop')



@section('content')



    <div class="row" style="">

        <div class="content-wrapper-before black"></div>

        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">

            <!-- Search for small screen-->

            <div class="container">

                <div class="row">

                    <div class="col s10 m6 l6">

                        <h5 class="breadcrumbs-title mt-0 mb-0">Shopping Cart</h5>

                        <ol class="breadcrumbs mb-0">

                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a>

                            <li class="breadcrumb-item"><a href="{{url('shop')}}">Shop</a>

                            </li>

                            <li class="breadcrumb-item active">Basket

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

                                <div class="card-content">

                                    @include('includes.flash')

                                    <div class="invoice-table">

                                        <div class="row">

                                            <div class="col s12 m12 l12 items-div">

                                                @include('shop.checkoutItems')

                                            </div>

                                            <div class="center align-center">

                                                <a href="{{url('/shop')}}"

                                                   class="btn btn-large mt-3 mr-3 purple waves-effect waves-light placeOrder">Continue

                                                    Shopping</a>

                                                <a href="{{route('member_checkout')}}"

                                                   class="btn btn-large mt-3 green waves-effect waves-light placeOrder">continue

                                                    to checkout</a>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div><!-- START RIGHT SIDEBAR NAV -->

                    </div>

                </div>

            </div>

        </div>



        <meta name="_token" content="{{@csrf_token()}}">



@endsection
