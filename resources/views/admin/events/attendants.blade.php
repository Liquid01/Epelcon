@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="content-wrapper-before black"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0">ATTENDANCE</h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{route('adminDashboard')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Attendance
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
                            <p class="caption mb-0">All Attendance</p>
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
                                                            style="width: 238px;">Booking ID
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 238px;">First Name
                                                        </th>

                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 179px;">Last Name
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 135px;">Phone
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 153px;">Email
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 151px;">Seat
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 151px;">Date
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @isset($attendance)
                                                        <span class="hide">{{$n=1}}</span>
                                                        @forelse($attendance as $attendant)

                                                            <tr role="row" class="even">

                                                                <td>{{$n++}}</td>
                                                                <td>{{$attendant->ticket_id}}</td>
                                                                <td>{{$attendant->first_name}}</td>
                                                                <td>{{$attendant->last_name}}</td>
                                                                <td>{{$attendant->phone}}</td>
                                                                <td>{{$attendant->email}}</td>
                                                                <td>{{$attendant->seat}}</td>
                                                                <td>{{$attendant->created_at}}</td>
                                                            </tr>
                                                        @empty
                                                            <h5>No Attendance for this events</h5>
                                                        @endforelse
                                                    @endisset


                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th rowspan="1" colspan="1">SN</th>
                                                        <th rowspan="1" colspan="1">Booking ID</th>
                                                        <th rowspan="1" colspan="1">First Name</th>
                                                        <th rowspan="1" colspan="1">Last Name.</th>
                                                        <th rowspan="1" colspan="1">Phone</th>
                                                        <th rowspan="1" colspan="1">Email</th>
                                                        <th rowspan="1" colspan="1">Seat</th>
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
