@extends('layouts.back_seller')

@section('page_title')
    Stockist
@endsection

@section('breadcrumb')

@endsection

@section('content')
    <div class="container">
        <!--yearly & weekly revenue chart start-->
{{--        <div id="sales-chart">--}}
{{--            <div class="row">--}}
{{--                <div class="col s12 m8 l8">--}}

{{--                    <div id="revenue-chart" class="card animate fadeUp">--}}

{{--                        <div class="card-content  hide-on-small-and-down">--}}

{{--                            <h4 class="header mt-0">--}}

{{--                                REVENUE FOR 2023--}}

{{--                                <span class="purple-text small text-darken-1 ml-1">--}}

{{--                     <i class="material-icons">keyboard_arrow_up</i> $0.00 %</span>--}}

{{--                                <a class="waves-effect waves-light btn gradient-45deg-purple-deep-orange gradient-shadow right">Details</a>--}}

{{--                            </h4>--}}

{{--                            <div class="row">--}}

{{--                                <div class="col s12">--}}

{{--                                    <div class="yearly-revenue-chart">--}}

{{--                                        <canvas id="thisYearRevenue" class="firstShadow" height="350"></canvas>--}}

{{--                                        <canvas id="lastYearRevenue" height="350"></canvas>--}}

{{--                                    </div>--}}

{{--                                </div>--}}

{{--                            </div>--}}

{{--                        </div>--}}

{{--                    </div>--}}

{{--                </div>--}}
{{--                <div class="col s12 m4 l4">--}}

{{--                    <div id="weekly-earning" class="card animate fadeUp">--}}

{{--                        <div class="card-content">--}}

{{--                            <h4 class="header m-0">Earning <i--}}

{{--                                        class="material-icons right grey-text lighten-3">more_vert</i>--}}

{{--                            </h4>--}}

{{--                            <p class="no-margin grey-text lighten-3 medium-small">_</p>--}}

{{--                            <h3 class="header">$0.00 <i class="material-icons deep-orange-text text-accent-2">arrow_upward</i>--}}

{{--                            </h3>--}}

{{--                            <canvas id="monthlyEarning" class="" height="150"></canvas>--}}

{{--                            <div class="center-align">--}}

{{--                                <p class="lighten-3">Total Weekly Earning</p>--}}

{{--                                <a class="waves-effect waves-light btn gradient-45deg-purple-deep-orange gradient-shadow">View--}}

{{--                                    Full</a>--}}

{{--                            </div>--}}

{{--                        </div>--}}

{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <!--yearly & weekly revenue chart end-->

        <!--card stats start-->

        <div id="card-stats">
            <div class="row">
                <div class="col s12 m6 l6 xl3">

                    <div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text animate fadeRight">

                        <div class="padding-4">

                            <div class="col s7 m7">

                                <i class="material-icons background-round mt-5" style="width:55px; height:55px; padding-left:19px;">&#x20a6;</i>

                                <p>Bonus</p>

                            </div>

                            <div class="col s5 m5 right-align">

                                <h5 class="mb-0 white-text">0.00</h5>

                                <p class="no-margin">Today</p>

                                <p>&#x20a6; 0.00</p>

                            </div>

                        </div>

                    </div>

                </div>
                <div class="col s12 m6 l6 xl3">

                    <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text animate fadeLeft">

                        <div class="padding-4">

                            <div class="col s7 m7">

                                <i class="material-icons background-round mt-5">add_shopping_cart</i>

                                <p>Orders</p>

                            </div>

                            <div class="col s5 m5 right-align">

                                <h5 class="mb-0 white-text">0</h5>

                                <p class="no-margin">New</p>

                                <p>0.00</p>

                            </div>

                        </div>

                    </div>

                </div>
                <div class="col s12 m6 l6 xl3">

                    <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text animate fadeLeft">

                        <div class="padding-4">

                            <div class="col s7 m7">

                                <i class="material-icons background-round mt-5">perm_identity</i>

                                <p>Customers</p>

                            </div>

                            <div class="col s5 m5 right-align">

                                <h5 class="mb-0 white-text">0</h5>

                                <p class="no-margin">New</p>

                                <p>0</p>

                            </div>

                        </div>

                    </div>

                </div>
                <div class="col s12 m6 l6 xl3">

                    <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text animate fadeRight">

                        <div class="padding-4">

                            <div class="col s7 m7">

                                <i class="material-icons background-round mt-5">timeline</i>

                                <p>Sales</p>

                            </div>

                            <div class="col s5 m5 right-align">

                                <h5 class="mb-0 white-text">0</h5>

                                <p class="no-margin">New</p>

                                <p>0</p>

                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!--card stats end-->
        <!-- Member online, Currunt Server load & Today's Revenue Chart start -->
        <div id="daily-data-chart">

            <div class="row">

                <div class="col s12 m4 l4">

                    <div class="card pt-0 pb-0 animate fadeLeft">

                        <div class="padding-2 ml-2">

                            <span class="new badge gradient-45deg-light-blue-cyan gradient-shadow mt-2 mr-2">0.00%</span>

                            <p class="mt-2 mb-0">Products</p>

                            <p class="no-margin grey-text lighten-3">0 Live</p>

                            <h5>00</h5>

                        </div>

                        <div class="row">

                            <div class="sample-chart-wrapper" style="margin-bottom: -14px; margin-top: -75px;">

                                <canvas id="custom-line-chart-sample-one" class="center"></canvas>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col s12 m4 l4 animate fadeUp">

                    <div class="card pt-0 pb-0">

                        <div class="padding-2 ml-2">

                            <span class="new badge gradient-45deg-purple-deep-orange gradient-shadow mt-2 mr-2">0.00%</span>

                            <p class="mt-2 mb-0">Orders</p>

                            <p class="no-margin grey-text lighten-3">0% Delivered</p>

                            <h5>0</h5>

                        </div>

                        <div class="row">

                            <div class="sample-chart-wrapper" style="margin-bottom: -14px; margin-top: -75px;">

                                <canvas id="custom-line-chart-sample-two" class="center"></canvas>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col s12 m4 l4">

                    <div class="card pt-0 pb-0 animate fadeRight">

                        <div class="padding-2 ml-2">

                            <span class="new badge gradient-45deg-amber-amber gradient-shadow mt-2 mr-2">+0.00</span>

                            <p class="mt-2 mb-0">Today's revenue</p>

                            <p class="no-margin grey-text lighten-3">$0.00</p>

                            <h5>0.000</h5>

                        </div>

                        <div class="row">

                            <div class="sample-chart-wrapper" style="margin-bottom: -14px; margin-top: -75px;">

                                <canvas id="custom-line-chart-sample-three" class="center"></canvas>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>



@endsection





