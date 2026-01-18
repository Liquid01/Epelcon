@extends('layouts.members')


@section('content')

    <div class="row">
        <div class="content-wrapper-before black"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0">BONUSES</h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Matching
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>


        <div class="col s12">
            <div class="container">
                <div class="section section-data-tables">
                    <!-- DataTables Row grouping -->
                    <style>
                        .matching_block{
                            /*width: auto%;*/
                            /*border: 1px solid #666666;*/
                            /*padding: 15px;*/
                            margin-left: 10px;
                            margin-right: 10px;
                        }
                    </style>
                    <div class="container center-align">
                        <div class="col s12">
                            <div class="card">
                                <div>
                                    <div class="mt-1 border-bottom-1 pb-1">
                                        @isset($pvs)
                                            <div style="display: inline-block; color: green" class="matching_block">
                                                LEFT: {{$pvs->left}}
                                            </div>
                                            <div style="display: inline-block; color: green" class="matching_block">
                                                RIGHT: {{$pvs->right}}
                                            </div>
                                            {{--                                                <div style="display: inline-block; color: orange" class="matching_block">--}}
                                            {{--                                                    L_ROYAL: {{$pvs->left_extra}}--}}
                                            {{--                                                </div>--}}
                                            {{--                                                <div style="display: inline-block; color: orange" class="matching_block">--}}
                                            {{--                                                    R_ROYAL: {{$pvs->right_extra}}--}}
                                            {{--                                                </div>--}}
                                            {{--                                                <div style="display: inline-block; color: green" class="matching_block">--}}
                                            {{--                                                    NEW B:--}}
                                            {{--                                                </div>--}}
                                            {{--                                                <div style="display: inline-block; color: green" class="matching_block">--}}
                                            {{--                                                    L_MATCHED: {{$user_bonus->last_matched}}--}}
                                            {{--                                                </div>--}}
                                            <div style="display: inline-block; color: black" class="matching_block">
                                                WITHDRAWN: {{$user_bonus->withdrawn}}
                                            </div>
                                            {{--                                                <div style="display: inline-block; color: black" class="matching_block">--}}
                                            {{--                                                    WITHDRAWN: {{$user_bonus}}--}}
                                            {{--                                                </div>--}}

                                        @endisset
                                    </div>
                                    {{--                                        <h4 class="card-title">AUGUST Matchings</h4>--}}
                                    <div class="row">
                                        <div class="col s12">
                                            <div class="card">
                                                <div class="card-content">
                                                    <a class="btn success" href="{{route('previous_matchings_within')}}" data-i18n="">
                                                        <span>August</span>
                                                    </a>
{{--                                                    <a class="btn orange" href="{{route('previous_matchings_outside')}}" data-i18n="">--}}
{{--                                                        <span>August Outside</span>--}}
{{--                                                    </a>--}}
                                                    <a class="btn orange" href="{{route('member_matchings_within')}}" data-i18n="">
                                                        <span>September</span>
                                                    </a>
                                                    <a class="btn orange" href="{{route('all_matchings')}}" data-i18n="">
                                                        <span>More</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div id="page-length-option_wrapper" class="dataTables_wrapper">

                                                <table id="page-length-option"
                                                       class="display dataTabled dtr-inline collapsed" role="grid"
                                                       aria-describedby="page-length-option_info"
                                                       style="width:100%">
                                                    <thead>
                                                    <tr role="row">

                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style=";">SN
                                                        </th>

                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style=";">Left
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="">Right
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="">Matched
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="">Package
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="">Amount
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="">Date
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @isset($matchings)
                                                        <span class="hide">{{$n=1}}</span>
                                                        @forelse($matchings as $matching)

                                                            <tr role="row" class="even">
                                                                <td>{{$n++}}</td>
                                                                <td>{{$matching->left_pvs}}</td>
                                                                <td>{{$matching->right_pvs}}</td>
                                                                <td>{{$matching->matched}}</td>
                                                                <td>{{$matching->package->name}}</td>
                                                                <td>{{$matching->amount}}</td>
                                                                <td>{{$matching->created_at}}</td>
                                                            </tr>
                                                        @empty
                                                            <h5>No Matchings</h5>
                                                        @endforelse
                                                    @endisset

                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th rowspan="1" colspan="1">SN</th>
                                                        <th rowspan="1" colspan="1">Left</th>
                                                        <th rowspan="1" colspan="1">Right.</th>
                                                        <th rowspan="1" colspan="1">Matched</th>
                                                        <th rowspan="1" colspan="1">Package</th>
                                                        <th rowspan="1" colspan="1">Amount</th>
                                                        <th rowspan="1" colspan="1">Date</th>
                                                    </tr>
                                                    </tfoot>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--                                    {{$matchings->links()}}--}}
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
                                    <input class="with-gap" data-target="to_cash" name="from" type="radio"/>
                                    <span>Cash Balance</span>
                                </label>
                            </p>
                            <p class=" from from-investment">
                                <label>
                                    <input class="with-gap" data-target="to_investment" name="from" type="radio"/>
                                    <span>Investment Interest</span>
                                </label>
                            </p>
                        </div>
                        <hr>

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
                                            <input type="number" min="1" name="amount" required
                                                   placeholder="amount">
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
                                            <input type="number" min="1" name="amount" required
                                                   placeholder="amount">
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
                                            <input type="number" min="1" name="amount" required
                                                   placeholder="amount">
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
                                    <span>Investment Interest</span>
                                </label>
                                <div id="investment_form">
                                    <form method="post" action="{{route('cash_to_investment')}}">
                                        @csrf
                                        <div class="input-field mb-10">
                                            <label for="amount"></label>
                                            <input type="number" min="1" name="amount" required
                                                   placeholder="amount">
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
                                            <input type="number" min="1" name="amount" required
                                                   placeholder="amount">
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
                                            <input type="number" min="1" name="amount" required
                                                   placeholder="amount">
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
                                            <input type="number" min="1" name="amount" required
                                                   placeholder="amount">
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
                                            <input type="number" min="1" name="amount" required
                                                   placeholder="amount">
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
                        <h6>Withdrawal Request</h6>
                        <form method="post" action="{{route('member_withdraw')}}">
                            @csrf

                            <div class="input-field mb-10">
                                <label for="amount">Enter Amount</label>
                                <input type="number" min="1" required name="amount">
                                <button class="btn btn-success">Withdraw</button>

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