@extends('layouts.back_seller')

@section('page_title')
    Stockist
@endsection

@section('breadcrumb')

@endsection

@section('content')

    <div class="container mt-5">

        <!-- Member online, Currunt Server load & Today's Revenue Chart start -->
        <div id="daily-data-chart">
{{--            <div id="card-with-analytics" class="section">--}}
{{--                <h4 class="header">Thrift</h4>--}}
{{--                <div class="row">--}}
{{--                    <div class="col s12 m4 l4 xl4 card-width">--}}
{{--                        <div class="card border-radius-6">--}}
{{--                            <div class="card-content center-align">--}}
{{--                                <i class="material-icons amber-text small-ico-bg mb-5">account_balance</i>--}}
{{--                                <h4 class="m-0"><b>0.00</b></h4>--}}
{{--                                <p>Daily </p>--}}
{{--                                <p class="green-text  mt-3">--}}
{{--                                    Interest:--}}
{{--                                    N0.00--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col s12 m4 l4 xl4 card-width">--}}
{{--                        <div class="card border-radius-6">--}}
{{--                            <div class="card-content center-align">--}}
{{--                                <i class="material-icons amber-text small-ico-bg mb-5">account_balance</i>--}}
{{--                                <h4 class="m-0"><b>0.00</b></h4>--}}
{{--                                <p>Weekly</p>--}}
{{--                                <p class="green-text  mt-3">--}}
{{--                                    Interest:--}}
{{--                                    N0.00--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col s12 m4 l4 xl4 card-width">--}}
{{--                        <div class="card border-radius-6">--}}
{{--                            <div class="card-content center-align">--}}
{{--                                <i class="material-icons amber-text small-ico-bg mb-5">account_balance</i>--}}
{{--                                <h4 class="m-0"><b>0.00</b></h4>--}}
{{--                                <p>Monthly</p>--}}
{{--                                <p class="green-text  mt-3">--}}
{{--                                    Interest:--}}
{{--                                    N0.00--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}


            <div class="row">

                <div class="col s12 m3 l3">

                    <div class="card pt-0 pb-0 animate fadeRight">

                        <div class="padding-2 ml-2">

                            <span class="new badge gradient-45deg-amber-amber gradient-shadow mt-2 mr-2">+0.00</span>

                            <p class="mt-2 mb-0">Cash Wallet</p>

                            <p class="no-margin grey-text lighten-3">&#x20a6;{{number_format(0, 2)}}</p>

                            <h6>&#x20a6;{{number_format($balance, 2)}}</h6>

                        </div>

                    </div>

                </div>

                <div class="col s12 m3 l3 animate fadeUp">

                    <div class="card pt-0 pb-0">

                        <div class="padding-2 ml-2">

                            <span class="new badge gradient-45deg-purple-deep-orange gradient-shadow mt-2 mr-2">0.00%</span>

                            <p class="mt-2 mb-0">Sales</p>

                            <p class="no-margin grey-text lighten-3">0% Delivered</p>

                            <h6>0</h6>

                        </div>


                    </div>

                </div>

                <div class="col s12 m3 l3 animate fadeUp">

                    <div class="card pt-0 pb-0">

                        <div class="padding-2 ml-2">

                            <span class="new badge gradient-45deg-purple-deep-orange gradient-shadow mt-2 mr-2">0.00%</span>

                            <p class="mt-2 mb-0">Orders</p>

                            <p class="no-margin grey-text lighten-3">0% Delivered</p>

                            <h5>0</h5>

                        </div>

                    </div>

                </div>
                <div class="col s12 m3 l3">

                    <div class="card pt-0 pb-0 animate fadeRight">

                        <div class="padding-2 ml-2">

                            <span class="new badge gradient-45deg-amber-amber gradient-shadow mt-2 mr-2">+0.00</span>

                            <p class="mt-2 mb-0">Purchases</p>

                            <p class="no-margin grey-text lighten-3">&#x20a6;0.00</p>

                            <h5>0.000</h5>

                        </div>

                    </div>

                </div>
            </div>

        </div>

            <div class="row">
                <div class="col s12 m3 l3">

                    <div class="card pt-0 pb-0 animate fadeLeft">

                        <div class="padding-2 ml-2">

                            <span class="new badge gradient-45deg-light-blue-cyan gradient-shadow mt-2 mr-2">0.00%</span>

                            <p class="mt-2 mb-0">My Products</p>

                            <p class="no-margin grey-text lighten-3">0 Live</p>

                            <h5>00</h5>

                        </div>

                    </div>

                </div>
                <div class="col s12 m3 l3">

                    <div class="card pt-0 pb-0 animate fadeLeft">

                        <div class="padding-2 ml-2">

                            <span class="new badge gradient-45deg-light-blue-cyan gradient-shadow mt-2 mr-2">0.00%</span>

                            <p class="mt-2 mb-0">My Pins</p>

                            <p class="no-margin grey-text lighten-3">0 used</p>

                            <h5>00</h5>

                        </div>

                    </div>

                </div>
                <div class="col s12 m3 l3">

                    <div class="card pt-0 pb-0 animate fadeRight">

                        <div class="padding-2 ml-2">

                            <span class="new badge gradient-45deg-amber-amber gradient-shadow mt-2 mr-2">+0.00</span>

                            <p class="mt-2 mb-0">Stock</p>

                            <p class="no-margin grey-text lighten-3">0 new</p>

                            <h5>0.000</h5>

                        </div>

                    </div>

                </div>
                <div class="col s12 m3 l3">

                    <div class="card pt-0 pb-0 animate fadeRight">

                        <div class="padding-2 ml-2">

                            <span class="new badge gradient-45deg-amber-amber gradient-shadow mt-2 mr-2">+0.00</span>

                            <p class="mt-2 mb-0">Inventory</p>

                            <p class="no-margin grey-text lighten-3">$0.00</p>

                            <h5>0.000</h5>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>



@endsection





