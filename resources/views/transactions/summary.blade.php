@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="content-wrapper-before black"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0">TRANSACTIONS</h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{route('adminDashboard')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">transaction->summary
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
                            @include('includes.flash')
                        </div>

                    </div>

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
                                                       style="width:100%">
                                                    <thead>
                                                    <tr role="row">
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 38px;">Username
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 35px;">Credit
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 151px;">Debit
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 151px;">Balance
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 151px;">Wallet
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @isset($users)
                                                        <span class="hide-on-small-only hidden-xs">{{$n=1}}</span>
                                                        @forelse($users as $user)

                                                            <tr role="row" class="even">

                                                                <td>{{$user->username}}</td>
                                                                <td>{{$credit = $transactions->where('owner', $user->username)
                                                                     ->where('type', 'CREDIT')->sum('amount')}}</td>
                                                                <td>{{$debit = $transactions->where('owner',$user->username)
                                                                     ->where('type', 'DEBIT')->sum('amount')}}</td>
                                                                <td>
                                                                    {{$credit-$debit}}
                                                                </td>
                                                                <td>
                                                                    {{$user->rewards->cash}}
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <h5>No withdrawals</h5>
                                                        @endforelse
                                                    @endisset


                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th rowspan="1" colspan="1">Username</th>
                                                        <th rowspan="1" colspan="1">Credit</th>
                                                        <th rowspan="1" colspan="1">Debit</th>
                                                        <th rowspan="1" colspan="1">Balance</th>
                                                        <th rowspan="1" colspan="1">Wallet</th>
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

            </div>
        </div>
    </div>




@endsection
