@extends('layouts.members')



@section('content')



    <div class="row" style="">

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

                                        @include('shop.checkoutItems')

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div><!-- START RIGHT SIDEBAR NAV -->

            </div>

        </div>



    </div>



    <meta name="_token" content="{{@csrf_token()}}">



@endsection
