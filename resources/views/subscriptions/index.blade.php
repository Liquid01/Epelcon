@extends('layouts.members')



@section('page_title')

    My Subscriptions

@endsection



@section('content')

    <div class="row">

        <div class="content-wrapper-before black"></div>

        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">

            <!-- Search for small screen-->

            <div class="container">

                <div class="row">

                    <div class="col s10 m6 l6">

                        <h5 class="breadcrumbs-title mt-0 mb-0">SUBSCRIPTIONS</h5>

                        <ol class="breadcrumbs mb-0">

                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>

                            </li>

                            <li class="breadcrumb-item active">Subscriptions

                            </li>

                        </ol>

                    </div>

                </div>

            </div>

        </div>

        <div class="col s12">

            <div class="container">

                <div class="section section-data-tables">

                    <div class="card center-align">

                        <div class="card-content" style="padding: 20px 5px;">

                            <button data-target="modal1"

                                    class=" modal-trigger waves-effect waves-light btn btn-small gradient-45deg-light-blue-cyan z-depth-4 mb-2">

                                New Subscription

                            </button>

                        </div>

                        @include('includes.flash')

                    </div>



                    <!-- DataTables Row grouping -->



                    <div class="row">

                        <div class="col s12">

                            <div class="card">

                                <div class="card-content" style="overflow-x: scroll">

                                    <h4 class="card-title">Page Length Options</h4>

                                    <div class="row">

                                        <div class="col s12">

                                            <div id="page-length-option_wrapper" class="dataTables_wrapper">



                                                <table id="page-length-option"

                                                       class="display dataTable dtr-inline collapsed" role="grid"

                                                       aria-describedby="page-length-option_info"

                                                       style="">

                                                    <thead>

                                                    <tr role="row">

                                                        <th class="sorting_disabled" rowspan="1" colspan="1"

                                                            style="width: 38px;">SN

                                                        </th>



                                                        <th class="sorting_disabled" rowspan="1" colspan="1"

                                                            style="width: 79px;">Type

                                                        </th>

                                                        <th class="sorting_disabled" rowspan="1" colspan="1"

                                                            style="width: 135px;">Ref.

                                                        </th>

                                                        <th class="sorting_disabled" rowspan="1" colspan="1"

                                                            style="width: 50px;">Amount

                                                        </th>

                                                        <th class="sorting_disabled" rowspan="1" colspan="1"

                                                            style="width: 50px;">Number

                                                        </th>

                                                        <th class="sorting_disabled" rowspan="1" colspan="1"

                                                            style="width: 151px;">Date

                                                        </th>

                                                    </tr>

                                                    </thead>

                                                    <tbody>

                                                    @isset($member_subscriptions)

                                                        <span class="hide">{{$n=1}}</span>

                                                        @forelse($member_subscriptions as $subscription)



                                                            <tr role="row" class="even">



                                                                <td>{{$n++}}</td>

                                                                <td>{{$subscription->type}}</td>

                                                                <td>{{$subscription->reference}}</td>

                                                                <td>{{$subscription->denomination}}</td>

                                                                <td>{{$subscription->msisdn}}</td>

                                                                <td>{{$subscription->created_at}}</td>

                                                            </tr>

                                                        @empty

                                                            <h5>No Transactions</h5>

                                                        @endforelse

                                                    @endisset





                                                    </tbody>

                                                    <tfoot>

                                                    <tr>

                                                        <th rowspan="1" colspan="1">SN</th>

                                                        <th rowspan="1" colspan="1">Type</th>

                                                        <th rowspan="1" colspan="1">Reference</th>

                                                        <th rowspan="1" colspan="1">Amount</th>

                                                        <th rowspan="1" colspan="1">Number</th>

                                                        <th rowspan="1" colspan="1">Date</th>

                                                    </tr>

                                                    </tfoot>

                                                </table>



                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>



                </div>





                <!-- Modal Trigger -->



                <!-- Modal Structure -->

                <div id="modal1" class="modal modal-fixed-footer">

                    <div class="modal-content">

                        <h5> New Subscription</h5>

                        <div class="row">

                            <div class="col s12 m6 l6 card-width">

                                <div class="card border-radius-6">

                                    <a href="{{route('airtime_top_up')}}">

                                        <div class="card-content center-align">

                                            <i class="material-icons amber-text small-ico-bg mb-5">smartphone</i>

                                            <h4 class="m-0"><b>Airtime</b></h4>

                                            <p>Top-Up</p>

                                            <p class="green-text  mt-3"><i class="material-icons vertical-align-middle">arrow_drop_up</i>

                                                recharge

                                            </p>

                                        </div>

                                    </a>

                                </div>

                            </div>

                            <div class="col s12 m6 l6 card-width">

                                <div class="card border-radius-6">

                                    <a href="{{route('data_top_up')}}">

                                        <div class="card-content center-align">

                                            <i class="material-icons amber-text small-ico-bg mb-5">network_check</i>

                                            <h4 class="m-0"><b>Data</b></h4>

                                            <p>Subscription</p>

                                            <p class="green-text  mt-3"><i class="material-icons vertical-align-middle">arrow_drop_up</i>

                                                Internet

                                            </p>

                                        </div>

                                    </a>

                                </div>

                            </div>

                            <div class="col s12 m6 l6 card-width">

                                <div class="card border-radius-6">

                                    <a href="{{route('subscribe_tv')}}">

                                        <div class="card-content center-align">

                                            <i class="material-icons amber-text small-ico-bg mb-5">live_tv</i>

                                            <h4 class="m-0"><b>Cable TV</b></h4>

                                            <p>DSTV/GOTV</p>

                                            <p class="red-text  mt-3"><i class="material-icons vertical-align-middle">arrow_drop_down</i>

                                                Subscribe</p>

                                        </div>

                                    </a>



                                </div>

                            </div>

                            <div class="col s12 m6 l6 card-width">

                                <div class="card border-radius-6">

                                    <a href="{{route('pay_light_bill')}}">

                                        <div class="card-content center-align">

                                            <i class="material-icons amber-text small-ico-bg mb-5">lightbulb_outline</i>

                                            <h4 class="m-0"><b>Electricity</b></h4>

                                            <p>Recharge</p>

                                            <p class="green-text  mt-3"><i class="material-icons vertical-align-middle">arrow_drop_up</i>

                                                Top-up

                                            </p>

                                        </div>

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="modal-footer">

                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>

                    </div>

                </div>

                <div id="modal-deposit" class="modal modal-fixed-footer">

                    <div class="modal-content">

                        <h3>Deposits</h3>

                        <h6>To</h6>

                        <div class="input-field mb-10 to-panel">

                            <div id="to_shop">

                                <label>

                                    <input class="" name="to" data-form="shop_form" type="radio"/>

                                    <span>Shop Balance</span>

                                </label>

                                <div id="shop_form">

                                    <form method="post" action="{{route('from_cash_to_shop')}}">

                                        @csrf

                                        <div class="input-field mb-10">

                                            <label for="amount"></label>

                                            <input type="number" min="1" name="amount" required placeholder="amount">

                                            <button class="btn btn-success">Send</button>

                                        </div>



                                    </form>

                                </div>

                            </div>

                            <div id="to_cash">

                                <label>

                                    <input class="" name="to" data-form="cash_form" type="radio"/>

                                    <span>Cash Balance</span>

                                </label>



                                <div id="cash_form">

                                    <form method="post" action="{{route('investment_to_cash')}}">

                                        @csrf

                                        <div class="input-field mb-10">

                                            <label for="amount"></label>

                                            <input type="number" min="1" name="amount" required placeholder="amount">

                                            <input type="hidden" name="from_account" value="investment">

                                            <button class="btn btn-success">Send</button>

                                        </div>

                                    </form>

                                </div>

                            </div>

                            <div id="to_another_account">

                                <label>

                                    <input class="" name="to" data-form="other_account_form" type="radio"/>

                                    <span>Another Account</span>

                                </label>

                                <div id="other_account_form">

                                    <form method="post" action="{{route('cash_to_another_account')}}">

                                        @csrf

                                        @csrf

                                        <div class="input-field mb-10">

                                            <label for="amount"></label>

                                            <input type="number" min="1" name="amount" required placeholder="amount">

                                            <input type="text" name="recipient" required

                                                   placeholder="Recipient USERNAME">

                                            <input type="hidden" name="from_account" value="cash">

                                            <button class="btn btn-success">Send</button>

                                        </div>

                                    </form>

                                </div>

                            </div>

                            <div id="to_investment">

                                <label>

                                    <input class="" name="to" data-form="investment_form" type="radio"/>

                                    <span>Investment</span>

                                </label>

                                <div id="investment_form">

                                    <form method="post" action="{{route('cash_to_investment')}}">

                                        @csrf

                                        <div class="input-field mb-10">

                                            <label for="amount"></label>

                                            <input type="number" min="1" name="amount" required placeholder="amount">

                                            <input type="hidden" name="from_account" value="cash">

                                            <button class="btn btn-success">Send</button>

                                        </div>

                                    </form>

                                </div>

                            </div>

                            {{--this lines will manage the following controls ofr the movement of the accout--}}

                            {{--<h5 claria-flowto=""></h5>--}}

                        </div>

                    </div>

                    <div class="modal-footer">

                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>

                    </div>

                </div>



                <div id="modal-withdraw" class="modal modal-fixed-footer">

                    <div class="modal-content">

                        <h3>Withdrawal Request</h3>

                        <form method="post" action="{{route('member_withdraw')}}">

                            @csrf



                            <div class="input-field mb-10">

                                <label for="amount">Withdraw Amount</label>

                                <input type="number" min="1" required name="amount">

                                <button class="btn btn-success">Send</button>



                            </div>



                        </form>



                    </div>

                    <div class="modal-footer">

                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>

                    </div>

                </div>

            </div>

        </div>

    </div>









@endsection
