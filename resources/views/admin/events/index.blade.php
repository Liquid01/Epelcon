@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="content-wrapper-before black"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0">EVENTS</h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{route('adminDashboard')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">events
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
                            <a href="{{route('create_event')}}" data-target="modal1"
                               class=" modal-trigger waves-effect waves-light btn btn-small gradient-45deg-light-blue-cyan z-depth-4 mb-2">
                                New Event
                            </a>
                            {{--<a href="{{route('')}}" data-target="modal-withdraw" class="modal-trigger waves-effect waves-light btn btn-small gradient-45deg-red-pink z-depth-4 mb-2">--}}
                            {{--Shop--}}
                            {{--</a>--}}
                        </div>
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
                                                            style="width: 238px;">SN
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 238px;">Name
                                                        </th>

                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 179px;">Subtitle
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 135px;">Venue.
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 153px;">Description
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 151px;">Capacity
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 100px;">FEE
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 100px;">Date
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 100px;">Image
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 100px;">Status
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 100px;">Date Created
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="width: 100px;">Action
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @isset($events)
                                                        <span class="hide">{{$n=1}}</span>
                                                        @forelse($events as $event)

                                                            <tr role="row" class="even">

                                                                <td>{{$n++}}</td>
                                                                <td>{{$event->title}}</td>
                                                                <td>{{$event->subtitle}}</td>
                                                                <td>{{$event->venue}}</td>
                                                                <td>{{$event->description}}</td>
                                                                <td>{{$event->capacity}}</td>
                                                                <td>{{$event->amount}}</td>
                                                                <td>{{$event->start_date}} - {{$event->end_date}}</td>
                                                                <td>
                                                                    <img src="{{asset('assets/img/events/'.$event->image)}}"
                                                                         style="max-width: 150px;" alt="">
                                                                </td>
                                                                <td>{{$event->status}}</td>
                                                                <td>{{$event->created_date}}</td>
                                                                <td>

                                                                    <a href="{{route('edit_event', $event)}}" class="btn">Edit</a>
                                                                    <a href="#!" class="btn">Suspend</a>
                                                                    <a href="{{route('delete_event', $event)}}" onclick="return confirm('Are you Sure you want to delete this product?')" class="btn">Delete</a>
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <h5>No Events</h5>
                                                        @endforelse
                                                    @endisset


                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th rowspan="1" colspan="1">SN</th>
                                                        <th rowspan="1" colspan="1">TITLE</th>
                                                        <th rowspan="1" colspan="1">Subtitle</th>
                                                        <th rowspan="1" colspan="1">Venue</th>
                                                        <th rowspan="1" colspan="1">Description</th>
                                                        <th rowspan="1" colspan="1">Capacity</th>
                                                        <th rowspan="1" colspan="1">Amount</th>
                                                        <th rowspan="1" colspan="1">Event Date</th>
                                                        <th rowspan="1" colspan="1">Image</th>
                                                        <th rowspan="1" colspan="1">Status</th>
                                                        <th rowspan="1" colspan="1">Created</th>
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
