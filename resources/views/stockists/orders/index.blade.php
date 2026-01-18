@extends('layouts.back_seller')

@section('page_title')

    My Orders

@endsection

@section('content')

    <div class="row">

        <div class="content-wrapper-before black"></div>

        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">

            <!-- Search for small screen-->

            <div class="container">

                <div class="row">

                    <div class="col s10 m6 l6">

                        <h5 class="breadcrumbs-title mt-0 mb-0">ORDERS</h5>

                        <ol class="breadcrumbs mb-0">

                            <li class="breadcrumb-item"><a href="{{route('adminDashboard')}}">Dashboard</a>

                            </li>

                            <li class="breadcrumb-item active">orders

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



                        @include('includes.flash')

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

                                                            style="width: 38px;">SN

                                                        </th>



                                                        <th class="sorting_disabled" rowspan="1" colspan="1"

                                                            style="width: 179px;">Items

                                                        </th>

                                                        <th class="sorting_disabled" rowspan="1" colspan="1"

                                                            style="width: 135px;">Amount.

                                                        </th>

                                                        <th class="sorting_disabled" rowspan="1" colspan="1"

                                                            style="width: 153px;">Delivery Address

                                                        </th>

                                                        <th class="sorting_disabled" rowspan="1" colspan="1"

                                                            style="width: 153px;">Order Date

                                                        </th>

                                                        <th class="sorting_disabled" rowspan="1" colspan="1"

                                                            style="width: 151px;">Status

                                                        </th>

                                                        <th class="sorting_disabled" rowspan="1" colspan="1"

                                                            style="width: 151px;">Issued Date

                                                        </th>

                                                        <th class="sorting_disabled" rowspan="1" colspan="1"

                                                            style="width: 151px;">Delivered By

                                                        </th>

                                                        <th class="sorting_disabled" rowspan="1" colspan="1"

                                                            style="width: 100px;">Action

                                                        </th>

                                                    </tr>

                                                    </thead>

                                                    <tbody>

                                                    @isset($orders)

                                                        <span class="hide">{{$n=1}}</span>

                                                        @forelse($orders as $order)



                                                            <tr role="row" class="even">



                                                                <td>{{$n++}}</td>

                                                                <td>

                                                                    <ul class="collapsible collapsible-sub">

                                                                        @foreach(json_decode($order->items) as $item)

                                                                            <li>

                                                                                {{$item->name}} - QTY:{{$item->qty}}

                                                                                Price: {{ $item->price}} - AMT:{{$item->subtotal}}

                                                                            </li>

                                                                        @endforeach

                                                                    </ul>



                                                                </td>

                                                                <td>

                                                                    {{$order->amount}}

                                                                </td>

                                                                <td>{{$order->delivery_address}}</td>

                                                                <td>{{$order->created_at}}</td>

                                                                <td>{{$order->status == 0? 'PENDING':'DELIVERED'}}</td>

                                                                <td>{{$order->issued_date == null? 'NOT COLLECTED':'COLLECTED'}}</td>

                                                                <td>{{$order->issued_by == null? 'NOT ISSUED':'ISSUED'}}</td>

                                                                <td>



                                                                    <a href="{{route('edit_order', $order)}}"

                                                                       class="btn">Edit</a>

                                                                    <a href="#!" class="btn">Suspend</a>

                                                                    <a href="{{route('delete_order', $order)}}"

                                                                       onclick="return confirm('Are you Sure you want to delete this order?')"

                                                                       class="btn">Delete</a>

                                                                </td>

                                                            </tr>

                                                        @empty

                                                            <h5>No orders</h5>

                                                        @endforelse

                                                    @endisset





                                                    </tbody>

                                                    <tfoot>

                                                    <tr>

                                                        <th rowspan="1" colspan="1">SN</th>

                                                        <th rowspan="1" colspan="1">Items</th>

                                                        <th rowspan="1" colspan="1">Amount</th>

                                                        <th rowspan="1" colspan="1">Delivery Address</th>

                                                        <th rowspan="1" colspan="1">Order Date</th>

                                                        <th rowspan="1" colspan="1">Status</th>

                                                        <th rowspan="1" colspan="1">Issued Date</th>

                                                        <th rowspan="1" colspan="1">Issued By</th>

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
