@extends('layouts.members')

@section('page_title')
    My Office
@endsection

@section('content')
    <div class="container">
        <!--yearly & weekly revenue chart start-->
        <h5>General Activities</h5>
        <div id="sales-chart">
            <div class="row">
                <div class="col s12 m8 l8">
                    <div id="revenue-chart" class="card animate fadeUp">
                        <div class="card-content">
                            <h4 class="header mt-0">
                                Sales this week
                                <span class="purple-text small text-darken-1 ml-1">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                    $0.00 %
                                </span>
                                <a class="waves-effect waves-light btn gradient-45deg-purple-deep-orange gradient-shadow right">Details</a>
                            </h4>
                            <div class="row">
                                <div class="col s12">
                                    <div class="yearly-revenue-chart">
                                        <canvas id="thisYearRevenue" class="firstShadow" height="350"></canvas>
                                        <canvas id="lastYearRevenue" height="350"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m4 l4">
                    <div id="weekly-earning" class="card animate fadeUp">
                        <div class="card-content">
                            <h4 class="header m-0">Earning <i
                                        class="material-icons right grey-text lighten-3">more_vert</i>
                            </h4>
                            <p class="no-margin grey-text lighten-3 medium-small">_</p>
                            <h3 class="header">$0.00 <i class="material-icons deep-orange-text text-accent-2">arrow_upward</i>
                            </h3>
                            <canvas id="monthlyEarning" class="" height="150"></canvas>
                            <div class="center-align">
                                <p class="lighten-3">Total Weekly Earning</p>
                                <a class="waves-effect waves-light btn gradient-45deg-purple-deep-orange gradient-shadow">View
                                    Full</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--yearly & weekly revenue chart end-->
        <!--card stats start-->

        <h5 class="page-title">MY Activities</h5>
        <div id="card-stats">
            <div class="row">
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
                <div class="col s12 m6 l6 xl3">
                    <div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text animate fadeRight">
                        <div class="padding-4">
                            <div class="col s7 m7">
                                <i class="material-icons background-round mt-5">attach_money</i>
                                <p>Commission</p>
                            </div>
                            <div class="col s5 m5 right-align">
                                <h5 class="mb-0 white-text">$0.00</h5>
                                <p class="no-margin">Today</p>
                                <p>$0.000</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--card stats end-->

        Latest
        <!-- Member online, Currunt Server load & Today's Revenue Chart start -->
        <div id="daily-data-chart">
            <div class="row">
                <div class="col s12 m4 l4">
                    <div class="card pt-0 pb-0 animate fadeLeft">
                        <div class="padding-2 ml-2">
                            <span class="new badge gradient-45deg-light-blue-cyan gradient-shadow mt-2 mr-2">0</span>
                            <p class="mt-2 mb-0">PINS</p>
                            <p class="no-margin grey-text lighten-3">{{$count = count(App\Pin::where('created_by', app('current_user')->username)->get())}}</p>
                            <h5>&#x20a6;{{number_format($count*3900, 2)}}</h5>
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
                            <p class="mt-2 mb-0">WP</p>
                            <p class="no-margin grey-text lighten-3">0 Delivered</p>
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
                            <p class="mt-2 mb-0">Commission</p>
                            <p class="no-margin grey-text lighten-3">$0.00</p>
                            <h5>&#x20a6;0.000</h5>
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

        <h5>Account</h5>
        <div id="daily-data-chart">
            <div class="row">
                <div class="col s12 m4 l4">
                    <div class="card pt-0 pb-0 animate fadeLeft">
                        <div class="padding-2 ml-2">
                            <p class="mt-2 mb-0">Paid</p>
                            <p class="no-margin grey-text lighten-3">$0.00 paid </p>
                            <h5>&#x20a6;0</h5>
                        </div>

                    </div>
                </div>
                <div class="col s12 m4 l4 animate fadeUp">
                    <div class="card pt-0 pb-0">
                        <div class="padding-2 ml-2">
                            <p class="mt-2 mb-0">Unpaid</p>
                            <p class="no-margin grey-text lighten-3">$0.00</p>
                            <h5>&#x20a6;0.00</h5>
                        </div>

                    </div>
                </div>
                <div class="col s12 m4 l4">
                    <div class="card pt-0 pb-0 animate fade8Right">
                        <div class="padding-2 ml-2">
                            <p class="mt-2 mb-0">Points</p>
                            <p class="no-margin grey-text lighten-3">$0.00</p>
                            <h5>&#x20a6;0.00</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Member online, Currunt Server load & Today's Revenue Chart start -->
        <!-- ecommerce product start-->
    {{--    @include('products.back_featured')--}}
    <!--end container--><!-- START RIGHT SIDEBAR NAV -->
    {{--removed--}}
    <!-- END RIGHT SIDEBAR NAV -->

    </div>

@endsection


