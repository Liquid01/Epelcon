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
                            <li class="breadcrumb-item active">Transactions
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="container">
                <div class="section section-data-tables">
                    <div class="card">
                        <div class="card-content">
                            <p class="caption mb-0">View all transactions here</p>
                        </div>
                    </div>

                    <!-- DataTables Row grouping -->

                    <!-- Multi Select -->


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
                                                       style="width: 1154px;">
                                                    <thead>
                                                    <tr role="row">
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 238px;">SN
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 238px;">Owner
                                                        </th>

                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 179px;">Type
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 135px;">Desc.
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 153px;">Amount
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 151px;">Date
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @isset($transactions)
                                                        <span class="hide">{{$n=1}}</span>
                                                        @forelse($transactions as $transaction)
                                                            @if($transaction->owner != 'GodsWealth1')
                                                                <tr role="row" class="even">

                                                                    <td>{{$n++}}</td>
                                                                    <td>{{$transaction->owner}}</td>
                                                                    <td>{{$transaction->type}}</td>
                                                                    <td>{{$transaction->for}}</td>
                                                                    <td>{{$transaction->amount}}</td>
                                                                    <td>{{$transaction->created_at}}</td>
                                                                </tr>
                                                            @endif
                                                        @empty
                                                            <h5>No Transactions</h5>
                                                        @endforelse
                                                    @endisset


                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th rowspan="1" colspan="1">SN</th>
                                                        <th rowspan="1" colspan="1">Owner</th>
                                                        <th rowspan="1" colspan="1">Type</th>
                                                        <th rowspan="1" colspan="1">Desc.</th>
                                                        <th rowspan="1" colspan="1">Amount</th>
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
            </div>
        </div>


@endsection
