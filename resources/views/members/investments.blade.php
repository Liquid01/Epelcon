@extends('layouts.members')
@section('page_title')
    My Investments
@endsection

@section('content')
    <div class="row">
        <div class="content-wrapper-before black"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0">INVESTMENTS</h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Investments
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="container">
                <div class="section section-data-tables">
                    {{--<div class="card center-align">--}}
                        {{--<div class="card-content" style="padding: 20px 5px;">--}}
                            {{--<button data-target="modal1" class=" modal-trigger waves-effect waves-light btn btn-small gradient-45deg-light-blue-cyan z-depth-4 mb-2">--}}
                                {{--Transfer--}}
                            {{--</button>--}}
                            {{--<button data-target="modal-withdraw" class="modal-trigger waves-effect waves-light btn btn-small gradient-45deg-red-pink z-depth-4 mb-2">--}}
                                {{--Withdraw--}}
                            {{--</button>--}}
                        {{--</div>--}}
                        {{--@include('includes.flash')--}}
                    {{--</div>--}}

                    <!-- DataTables Row grouping -->

                    <div class="row">
                        <div class="col s12">
                            <div class="card">
                                <div class="card-content">
                                    <h4 class="card-title">Page Length Options</h4>
                                    <div class="row">
                                        <div class="col s12">
                                            <div id="page-length-option_wrapper" class="dataTables_wrapper">

                                                <table id="page-length-option"
                                                       class="display dataTable dtr-inline collapsed" role="grid"
                                                       aria-describedby="page-length-option_info"
                                                       style="width: 100%;">
                                                    <thead>
                                                    <tr role="row">

                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 79px;">From
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 50px;">Amount
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 50px;">Interest
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 151px;">Date
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 151px;">Due
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 151px;">Status
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @isset($investments)
{{--                                                        <span class="hide">{{$n=1}}</span>--}}
                                                        @forelse($investments as $investment)

                                                            <tr role="row" class="even">

{{--                                                                <td>{{$n++}}</td>--}}
                                                                <td>{{$investment->paid_from}}</td>
                                                                <td>{{$investment->amount}}</td>
                                                                <td>{{$investment->amount*0.03}}</td>
                                                                <td>{{$investment->created_at}}</td>
                                                                <td>{{$investment->created_at->addMonths(6)}}</td>
                                                                <td>{{$investment->status == 0 ? 'Not Collected':'Collected'}}</td>
                                                            </tr>
                                                        @empty
                                                            <h5>No investments</h5>
                                                        @endforelse
                                                    @endisset


                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        {{--<th rowspan="1" colspan="1">SN</th>--}}
                                                        <th rowspan="1" colspan="1">From</th>
                                                        <th rowspan="1" colspan="1">Amount</th>
                                                        <th rowspan="1" colspan="1">Interest</th>
                                                        <th rowspan="1" colspan="1">Date</th>
                                                        <th rowspan="1" colspan="1">Due</th>
                                                        <th rowspan="1" colspan="1">Status</th>
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
                        <h3>Transfers</h3>
                        <h6>From</h6>

                        <div class="input-field mb-10">

                            <p class=" from from-cash">
                                <label>
                                    <input class="with-gap" data-target="to_cash" name="from" type="radio" />
                                    <span>Cash Balance</span>
                                </label>
                            </p>
                            <p class=" from from-investment">
                                <label>
                                    <input class="with-gap" data-target="to_investment" name="from" type="radio" />
                                    <span>Investment Interest</span>
                                </label>
                            </p>
                        </div>
                        <hr>

                        <h6>To</h6>

                        <div class="input-field mb-10 to-panel">
                            <div id="to_shop">
                                <label>
                                    <input class="" name="to" data-form="shop_form" type="radio" />
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
                                    <input class="" name="to" data-form="cash_form" type="radio" />
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
                                    <input class="" name="to" data-form="other_account_form" type="radio" />
                                    <span>Another Account</span>
                                </label>
                                <div id="other_account_form">
                                    <form method="post" action="{{route('cash_to_another_account')}}">
                                        @csrf
                                        @csrf
                                        <div class="input-field mb-10">
                                            <label for="amount"></label>
                                            <input type="number" min="1" name="amount" required placeholder="amount">
                                            <input type="text" name="other_account" required placeholder="Recipient Account">
                                            <input type="hidden" name="from_account" value="cash">
                                            <button class="btn btn-success">Send</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="to_investment">
                                <label>
                                    <input class="" name="to" data-form="investment_form" type="radio" />
                                    <span>Investment Interest</span>
                                </label>
                                <div id="investment_form">
                                    <form method="post" action="{{route('cash_to_investment')}}">
                                        @csrf
                                        <div class="input-field mb-10">
                                            <label for="amount"></label>
                                            <input type="number" min="1" name="amount"  required placeholder="amount">
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
                                <label for="withdraw_amount">Withdraw Amount</label>
                                <input type="number" min="1" required name="withdraw_amount">
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
