@extends('layouts.members')
@section('page_title')
    Dashboard - {{ app('current_user')->username }}
@endsection
@section('content')
    <div class="container border-bottom-1">
        <div class="content-wrapper-before" style=""></div>
        <div class="breadcrumbs-light pb-0 pt-4" id="breadcrumbs-wrapper">
            <div class="container">
                <div class="">
                    <div class="col s12 m12 l12">
                        <div class="d-inline justify-content-between align-items-center">
                            <span class="deep-orange-text">Rank: </span>
                            <i class=" fa fa-star" style="color: silver;font-size:12px!important;"></i>
                            <i id="stage">1</i>
                            {{--                            <a href="javascript:void(0);" style="font-weight: bolder; font-size:12px;" class="black-text copyRefLink"> --}}
                            {{--                                Referral Link <i class="fa grey-text fa-copy"></i> --}}
                            {{--                            </a> --}}
                            @include('wallets.fund_link')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col s12">
        <div class="container">
            {{-- PVS and WALLET --}}
            @include('includes.back_flash')
            @include('includes.errors')
            {{-- PVS and WALLET --}}
            <div class="container">
                @include('includes.card')
            </div>
        </div>
    </div>

    <div class="container border-bottom-1">
        <div class="content-wrapper-before" style=""></div>
        <div class="breadcrumbs-light pb-0 pt-4" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->

        </div>
    </div>
    <div class="col s12">
        <div class="container">
            {{-- PVS and WALLET --}}
            @include('includes.back_flash')

            {{-- PVS and WALLET --}}
            <div class="row">
                <div class="col-md-4 col m4 x6 s12 l4">
                    <div class=" card border-radius-6">
                        <div class="col-md-6 col m6 x6 s6 l6">
                            <div class="card-width">
                                <div class="">
                                    <div class="card-content center-align">
                                        <i class="material-icons amber-text small-ico-bg mb-5 fa fa-coins"></i>
                                        <p class="m-0"><b id="left_pvs">0</b></p>
                                        <p>PVs</p>
                                        <p class="green-text  mt-3">
                                            Left</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col m6 l6 x6 s6">
                            <div class="card-width">
                                <div class="">
                                    <div class="card-content center-align">
                                        <i class="material-icons amber-text small-ico-bg mb-5 fa fa-coins"></i>
                                        <p class="m-0"><b id="right_pvs">0</b></p>
                                        <p>PVs</p>
                                        <p class="green-text  mt-3">
                                            Right
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col m4 x6 s12 l4">
                    <div class=" card border-radius-6">
                        <div class="col-md-6 col m6 x6 s6 l6">
                            <div class="card-width">
                                <div class="">
                                    <div class="card-content center-align">
                                        <i class="material-icons amber-text small-ico-bg mb-5 fa fa-coins"></i>
                                        <p class="m-0"><b id="points">0</b></p>
                                        <p>PVs</p>
                                        <p class="green-text  mt-3">
                                            Direct
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col m6 l6 x6 s6">
                            <div class="card-width">
                                <div class="">
                                    <div class="card-content center-align">
                                        <i class="material-icons amber-text small-ico-bg mb-5 fa fa-coins"></i>
                                        <p class="m-0"><b id="total_pvs">0</b></p>
                                        <p>PVs</p>
                                        <p class="green-text  mt-3">
                                            Total
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col m4 x6 s12 l4">

                    <div class="card border-radius-6">
                        <div class="container">
                            <div class="col m3 s3">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-6 col m6 x6 s6 l6">
                            <div class="card-width">
                                <div class="">
                                    <div class="card-content center-align">
                                        <i class="material-icons amber-text small-ico-bg mb-5">device_hub</i>
                                        <p class="green-text  mt-3">
                                            <b class="matching_bonus" id="matching_bonus">
                                                @isset($matching_bonus)
                                                    {{ $matching_bonus->amount }}
                                                @endisset
                                                {{--                                                <small>Up in: <i id="countdown"></i></small> --}}
                                            </b>
                                            <br>
                                            <i class=" green-text fa fa-users"></i>
                                        </p>
                                        @php
                                            $settings = \App\Setting::where('item', 'MATCHING_WITHDRAWALS')->first();
                                        @endphp
                                        @if ($settings->status == 1)
                                            <p style="font-size: 14px; margin-top:10px; text-align:center!important;"
                                               class="">
                                                <a href="javascript:void(0);" style="margin-top: -15px;"
                                                   data-target="modal-withdraw-matching"
                                                   class="modal-trigger  waves-effect waves-light">
                                                    Withdraw
                                                </a>
                                            </p>
                                        @else
                                            <p style="font-size: 14px; margin-top:10px; text-align:center!important;">
                                                Matching
                                            </p>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6 col m6 l6 x6 s6">
                            <div class="card-width">
                                <div class="">
                                    <div class="card-content center-align">
                                        <i class="material-icons amber-text small-ico-bg mb-5">device_hub</i>
                                        <span style="display:none">
                                            {{ $bonus = \App\Bonus::where('user_id', app('current_user')->id)->where('bonus_type_id', config('app.matching_bonus'))->first() }}
                                        </span>
                                        <p class="m-0">
                                            <b id="">
                                                <span id="">
                                                    @isset($matching_bonus)
                                                        {{ number_format($matching_bonus->withdrawn, 2) }}
                                                    @endisset
                                                </span>
                                            </b>
                                        </p>
                                        <p>Withdrawn</p>
                                        <p class="red-text  mt-3">
                                            <i class="fa fa-arrow-circle-down"></i>
                                        </p>
                                        <p>
                                            <a href="javascript:void(0);"
                                               style="text-align:center; font-size: 12px; text-align:center!important;"
                                               class="">
                                                @isset($matching)
                                                    Bal:
                                                    {{ number_format($matching_bonus->amount - $matching_bonus->withdrawn, 2) }}
                                                @endisset
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--                        <div class="container"> --}}
                        {{--                            <div class="col s6 m6"> --}}

                        {{--                                <p>Bal: {{$matching_bonus->this_balance}}</p> --}}

                        {{--                            </div> --}}
                        {{--                            <div class="col s6 m6"> --}}
                        {{--                                <p style="font-size: 12px; text-align:right!important;"> --}}

                        {{--                                    <a href="javascript:void(0);" --}}
                        {{--                                       style="margin-top: -15px;" --}}
                        {{--                                       data-target="modal-withdraw-matching" --}}
                        {{--                                       class="modal-trigger  waves-effect waves-light"> --}}
                        {{--                                        Withdraw --}}
                        {{--                                    </a> --}}
                        {{--                                </p> --}}
                        {{--                            </div> --}}
                        {{--                        </div> --}}

                    </div>

                </div>

                <div class="col-md-4 col m4 x6 s12 l4">
                    <div class="card border-radius-6">
                        <div class="container">
                            <div class="col m3 s3">
                                <p class="pl-1 pr-2" style="font-size:13px; text-align: left;">Latest<i
                                            class=""></i>
                                </p>
                            </div>
                            <div class="col m9 s9">
                                {{--                                <p class="pl-1 " style="font-size:13px; text-align: right;">Matched: <i --}}
                                {{--                                            class="matched"></i>PVs</p> --}}

                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-6 col m6 x6 s6 l6">
                            <div class="card-width">
                                <div class="">
                                    <div class="card-content center-align">
                                        <i class="material-icons amber-text small-ico-bg mb-5">shopping_cart</i>
                                        <p class="m-0">
                                            {{ \Carbon\Carbon::now()->monthName }} <br>

                                            <b id="this_matching" class="this_wmatching">
                                                {{--                                                @if (isset($matchings)) --}}
                                                {{--                                                    {{$matchings}} --}}
                                                {{--                                                @else --}}
                                                {{--                                                    {{0.00}} --}}
                                                {{--                                                @endisset --}}
                                            </b>
                                        </p>
                                        <p class="green-text  mt-3">
                                            <i class="fa fa-coins"></i>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col m6 l6 x6 s6">
                            <div class="card-width">
                                <div class="">
                                    <div class="card-content center-align">
                                        <i class="fa fa-box "></i>
                                        <p class="m-0"><b id="">0</b></p>
                                        <p>Collected</p>
                                        <p class="orange-text  mt-3">
                                            <i class="fa fa-car-side"></i>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col m4 x6 s12 l4">
                    <div class="card border-radius-6">
                        <div class="col-md-6 col m6 x6 s6 l6">
                            <div class="card-width">
                                <div class="">
                                    <div class="card-content center-align">
                                        <i class="material-icons amber-text small-ico-bg mb-5">device_hub</i>
                                        <p class="m-0">
                                            <b id="">
                                                {{ \App\User::where('sponsor', auth()->user()->username)->count() }}
                                            </b>
                                        </p>
                                        <p>Referral</p>
                                        <p class="green-text  mt-3">
                                            <i class=" green-text fa fa-users"></i>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col m6 l6 x6 s6">
                            <div class="card-width">
                                <div class="">
                                    <div class="card-content center-align">
                                        <i class="material-icons amber-text small-ico-bg mb-5">device_hub</i>
                                        <p class="m-0"><b id=""><span id="downline_count"></span></b></p>
                                        <p>Downlines</p>
                                        <p class="orange-text  mt-3">
                                            <i class="fa fa-users-cog"></i>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--                <div class="col-md-6 col m6 x6 s12 l6"> --}}
                    {{--                    <div class="card border-radius-6"> --}}
                    {{--                        <div class="col-md-6 col m6 x6 s6 l6"> --}}
                    {{--                            <div class="card-width"> --}}
                    {{--                                <div class=""> --}}
                    {{--                                    <div class="card-content center-align"> --}}
                    {{--                                        <i class="material-icons amber-text small-ico-bg mb-5" >shopping_cart</i> --}}
                    {{--                                        <p class="m-0"> --}}
                    {{--                                            <b id=""> --}}
                    {{--                                                {{\App\Order::where('owner', app('current_user')->username)->count()}} --}}
                    {{--                                            </b> --}}
                    {{--                                        </p> --}}
                    {{--                                        <p>Purchases</p> --}}
                    {{--                                        <p class="green-text  mt-3"> --}}
                    {{--                                            <i class="fa fa-coins"></i> --}}
                    {{--                                        </p> --}}
                    {{--                                    </div> --}}
                    {{--                                </div> --}}
                    {{--                            </div> --}}
                    {{--                        </div> --}}
                    {{--                        <div class="col-md-6 col m6 l6 x6 s6"> --}}
                    {{--                            <div class="card-width"> --}}
                    {{--                                <div class=""> --}}
                    {{--                                    <div class="card-content center-align"> --}}
                    {{--                                        <i class="material-icons amber-text small-ico-bg mb-5">shopping_cart</i> --}}
                    {{--                                        <p class="m-0"><b id="">0</b></p> --}}
                    {{--                                        <p>Delivered</p> --}}
                    {{--                                        <p class="orange-text  mt-3"> --}}
                    {{--                                            <i class="fa fa-car-side"></i> --}}
                    {{--                                        </p> --}}
                    {{--                                    </div> --}}
                    {{--                                </div> --}}
                    {{--                            </div> --}}
                    {{--                        </div> --}}
                    {{--                    </div> --}}
                    {{--                </div> --}}
                </div>
            </div>
            <div id="card-with-analytics" class="section">
                <h4 class="header">Thrift</h4>
                <div class="row">
                    <div class="col s12 m4 l4 xl4 card-width">
                        <div class="card border-radius-6">
                            <div class="card-content center-align">
                                <i class="material-icons amber-text small-ico-bg mb-5">account_balance</i>
                                <h4 class="m-0"><b>0.00</b></h4>
                                <p>Daily </p>
                                <p class="green-text  mt-3">
                                    Interest:
                                    N0.00
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m4 l4 xl4 card-width">
                        <div class="card border-radius-6">
                            <div class="card-content center-align">
                                <i class="material-icons amber-text small-ico-bg mb-5">account_balance</i>
                                <h4 class="m-0"><b>0.00</b></h4>
                                <p>Weekly</p>
                                <p class="green-text  mt-3">
                                    Interest:
                                    N0.00
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m4 l4 xl4 card-width">
                        <div class="card border-radius-6">
                            <div class="card-content center-align">
                                <i class="material-icons amber-text small-ico-bg mb-5">account_balance</i>
                                <h4 class="m-0"><b>0.00</b></h4>
                                <p>Monthly</p>
                                <p class="green-text  mt-3">
                                    Interest:
                                    N0.00
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            @include('includes.withdraw_modal')

        </div>
    </div>
@endsection
