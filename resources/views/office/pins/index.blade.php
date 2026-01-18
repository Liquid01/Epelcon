@extends('layouts.support')

@section('content')
    <div class="row">
        <div class="content-wrapper-before black"></div>
        <div class="breadcrumbs-dark xpb-0 pt-4" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0">PIN MANAGEMENT</h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                            <li class="breadcrumb-item"><a href="{{route('my_office')}}">Admin</a>
                            </li>
                            <li class="breadcrumb-item active">Pins
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
                            <p class="caption mb-0">A view of all PINS</p>
                            <hr>
                            <a href="{{route('new_pin')}}" class="btn btn-success btn-raised">New Pin</a>
                            <a href="{{route('my_office')}}" class="btn btn-success btn-raised">Office</a>
                        </div>


                        <!-- DataTables Row grouping -->

                        <!-- Multi Select -->


                        <div class="row">
                            <div class="col s12">
                                <div class="card">
                                    <div class="card-content">
                                        <h4 class="card-title">My PINS</h4>
                                        <div class="row hide-on-large-only" style="overflow-x: scroll">
                                            <div class="col s12">
                                                <table class="table table-responsive table-stripped tablehover">
                                                    <tr class="">
                                                        <th>Serial</th>
                                                        <th>Code</th>
                                                        <th>Status</th>
                                                    </tr>

                                                    @isset($pins)
{{--                                                        {{dd($pins[0])}}--}}
                                                        @forelse($pins as $pin)
                                                            <tr>
                                                                <td>{{$pin->serial}}</td>
                                                                <td>{{$pin->code}}</td>
                                                                <td>{{$pin->status == 0? 'Unused':'Used'}}</td>
                                                            </tr>
                                                        @empty
                                                            No PIN to show
                                                        @endforelse
                                                    @endisset

                                                </table>
                                            </div>
                                        </div>
                                        <h4 class="card-title">Page Length Options</h4>
                                        <div class="row hide-on-med-and-down">
                                            <div class="col s12">
                                                <div id="page-length-option_wrapper" class="dataTables_wrapper">

                                                    <table id="page-length-option"
                                                           class="display dataTable dtr-inline collapsed" role="grid"
                                                           aria-describedby="page-length-option_info"
                                                           style="width: 1154px;">
                                                        <thead>
                                                        <tr role="row">
                                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                                style="width: 238px;">Serial N0.
                                                            </th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                                style="width: 238px;">Code
                                                            </th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                                style="width: 153px;">Status
                                                            </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @isset($pins)
                                                            <span class="hide">{{$n=1}}</span>
                                                            @forelse($pins as $pin)

                                                                <tr role="row" class="even">
                                                                    <td>{{$pin->serial}}</td>
                                                                    <td>{{$pin->code}}</td>
                                                                    <td>{{$pin->status == 0 ? 'Unused, Active': 'Used'}}</td>
                                                                </tr>
                                                            @empty
                                                                <h5>No Transactions</h5>
                                                            @endforelse
                                                        @endisset


                                                        </tbody>
                                                        <tfoot>
                                                        <tr>
                                                            <th rowspan="1" colspan="1">Serial</th>
                                                            <th rowspan="1" colspan="1">Code</th>
                                                            <th rowspan="1" colspan="1">Status</th>
                                                        </tr>
                                                        </tfoot>
                                                    </table>
                                                    {{--<table id="page-length-option"--}}
                                                    {{--class="display dataTable dtr-inline collapsed" role="grid"--}}
                                                    {{--aria-describedby="page-length-option_info"--}}
                                                    {{--style="width: 1154px;">--}}
                                                    {{--<thead>--}}
                                                    {{--<tr role="row">--}}
                                                    {{--<th class="sorting_disabled" rowspan="1" colspan="1"--}}
                                                    {{--style="width: 238px;">Serial--}}
                                                    {{--</th>--}}
                                                    {{--<th class="sorting_disabled" rowspan="1" colspan="1"--}}
                                                    {{--style="width: 179px;">Code--}}
                                                    {{--</th>--}}
                                                    {{--<th class="sorting_disabled" rowspan="1" colspan="1"--}}
                                                    {{--style="width: 135px;">Created Date--}}
                                                    {{--</th>--}}
                                                    {{--<th class="sorting_disabled" rowspan="1" colspan="1"--}}
                                                    {{--style="width: 153px;">Created By--}}
                                                    {{--</th>--}}
                                                    {{--<th class="sorting_disabled" rowspan="1" colspan="1"--}}
                                                    {{--style="width: 151px;">Status--}}
                                                    {{--</th>--}}
                                                    {{--</tr>--}}
                                                    {{--</thead>--}}
                                                    {{--<tbody>--}}
                                                    {{--@if($pins != null)--}}
                                                    {{--@foreach($pins as $pin)--}}

                                                    {{--<tr role="row" class="even selected">--}}
                                                    {{--<th tabindex="0">--}}
                                                    {{--<label>--}}
                                                    {{--<input class="selectpin" data-id="{{$pin->serial}}" type="checkbox">--}}
                                                    {{--<span></span>--}}
                                                    {{--</label>--}}
                                                    {{--</th>--}}
                                                    {{--<td>{{$pin->serial}}</td>--}}

                                                    {{--<td>{{$pin->code}}</td>--}}
                                                    {{--<td>{{$pin->created_at}}</td>--}}
                                                    {{--<td>{{$pin->used_by}}</td>--}}
                                                    {{--<td>{{$pin->status == 0 ? 'Unused, Active': 'Used'}}</td>--}}
                                                    {{--</tr>--}}
                                                    {{--@endforeach--}}
                                                    {{--@endif--}}

                                                    {{--</tbody>--}}
                                                    {{--<tfoot>--}}
                                                    {{--<tr>--}}
                                                    {{--<th rowspan="1" colspan="1"></th>--}}
                                                    {{--<th rowspan="1" colspan="1">Serial</th>--}}
                                                    {{--<th rowspan="1" colspan="1">Code</th>--}}
                                                    {{--<th rowspan="1" colspan="1">Created Date</th>--}}
                                                    {{--<th rowspan="1" colspan="1">Created By</th>--}}
                                                    {{--<th rowspan="1" colspan="1">Status</th>--}}
                                                    {{--</tr>--}}
                                                    {{--</tfoot>--}}
                                                    {{--</table>--}}

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
    </div>


@endsection


