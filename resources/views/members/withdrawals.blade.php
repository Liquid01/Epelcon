@extends('layouts.members')
@section('page_title')
    My Withdrawals
@endsection

@section('content')
    <div class="row">
        <div class="content-wrapper-before black"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0">WITHDRAWALS</h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item white-text">My Withdrawals
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="container">
                <div class="section section-data-tables">
                @include('includes.flash')

                    <!-- DataTables Row grouping -->

                    <div class="row">
                        <div class="col s12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col s12">
                                            <div id="page-length-option_wrapper" class="dataTables_wrapper">

                                                <table id="page-length-option"
                                                       class="display dataTable dtr-inline collapsed" role="grid"
                                                       aria-describedby="page-length-option_info"
                                                       style="width:100%">
                                                    <thead>
                                                    <tr role="row">
                                                        {{--<th class="sorting_disabled hide-on-small-only hidden-xs" rowspan="1" colspan="1"--}}
                                                            {{--style="width: 38px;">SN--}}
                                                        {{--</th>--}}

                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 79px;">Type
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 135px;">Value
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 151px;">Date
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 50px;">Status
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @isset($withdrawals)
                                                        <span class="hide">{{$n=1}}</span>
                                                        @forelse($withdrawals as $withdrawal)

                                                            <tr role="row" class="even">

                                                                {{--<td class="hide-on-small-only hidden-xs">{{$n++}}</td>--}}
                                                                <td>{{$withdrawal->type}}</td>
                                                                <td>{{$withdrawal->value}}</td>
                                                                <td>{{$withdrawal->created_at}}</td>
                                                                <td>{{$withdrawal->status == 0? 'Not Collected': 'Collected'}}</td>
                                                            </tr>
                                                        @empty
                                                            <h5>No withdrawals</h5>
                                                        @endforelse
                                                    @endisset


                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        {{--<th rowspan="1" colspan="1" class="hide-on-small-only hidden-xs">SN</th>--}}
                                                        <th rowspan="1" colspan="1">Type</th>
                                                        <th rowspan="1" colspan="1">Value</th>
                                                        <th rowspan="1" colspan="1">Date</th>
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

            </div>
        </div>
    </div>




@endsection
