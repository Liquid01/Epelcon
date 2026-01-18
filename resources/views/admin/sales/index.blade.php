@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="content-wrapper-before black"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0">SALES</h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{route('adminDashboard')}}">New Sale</a>
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

                            <a href="{{route('admin_sell')}}" class="btn btn-raised">New Sale</a>
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
                                                        <th class="sorting_disabled hide-on-small-only hidden-xs" rowspan="1" colspan="1"
                                                            style="width: 20px;">SN
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 38px;">Customer
                                                        </th>

                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 79px;">Item
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 35px;">Quantity
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 151px;">Amount
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 50px;">Date
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 50px;">Status
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 50px;">Action
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @isset($sales)
                                                        <span class="hide-on-small-only hidden-xs">{{$n=1}}</span>
                                                        @forelse($sales as $sale)

                                                            <tr role="row" class="even">

                                                                <td class="hide-on-small-only">{{$n++}}</td>
                                                                <td>{{$sale->user->username}}</td>
                                                                <td>{{$sale->item}}</td>
                                                                <td>{{$sale->quantity}}</td>
                                                                <td>{{$sale->amount}}</td>
                                                                <td>{{$sale->created_at}}</td>
                                                                <td>{{$sale->status == 0 ? 'New' : 'Delivered'}}</td>
                                                                <td>
                                                                    <a href="{{route('deliver_sale', $sale->id)}}" class="btn btn-info">Deliverd</a>
                                                                </td>

                                                            </tr>
                                                        @empty
                                                            <h5>No sales</h5>
                                                        @endforelse
                                                    @endisset


                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th rowspan="1" colspan="1" class="hide-on-small-only hidden-xs">SN</th>
                                                        <th rowspan="1" colspan="1">Customer</th>
                                                        <th rowspan="1" colspan="1">Item</th>
                                                        <th rowspan="1" colspan="1">Quantity</th>
                                                        <th rowspan="1" colspan="1">Amount</th>
                                                        <th rowspan="1" colspan="1">Date</th>
                                                        <th rowspan="1" colspan="1">Status</th>
                                                        <th rowspan="1" colspan="1">Action</th>
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
