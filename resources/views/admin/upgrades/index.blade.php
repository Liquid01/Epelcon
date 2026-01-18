@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="content-wrapper-before black"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0">UPGRADES</h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{route('adminDashboard')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">all upgrades
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
                            <p class="caption mb-0">View all upgrades here</p>
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
                                            <div id="" class="dataTables_wrapper">
                                                <table id=""
                                                       class="display dataTable dtr-inline collapsed" role="grid"
                                                       aria-describedby="page-length-option_info"
                                                       style="">
                                                    <thead>
                                                    <tr role="row">
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="">SN
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="">Stockist
                                                        </th>

                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="">User
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="">OLD Pcak
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="">New Pack
                                                        </th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            style="">Date
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @isset($upgrades)
                                                        <span class="hide">{{$n=1}}</span>
                                                        @forelse($upgrades as $upgrade)

                                                            <tr role="row" class="even">

                                                                <td>{{$n++}}</td>
                                                                <td>{{$upgrade->stockist->username}}</td>
                                                                <td>{{$upgrade->user->username}}</td>
                                                                <td>{{$upgrade->old_package}}</td>
                                                                <td>{{$upgrade->new_package}}</td>
                                                                <td>{{$upgrade->created_at}}</td>
                                                            </tr>
                                                        @empty
                                                            <h5>No Upgrades</h5>
                                                        @endforelse
                                                    @endisset


                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th rowspan="1" colspan="1">SN</th>
                                                        <th rowspan="1" colspan="1">Stockist</th>
                                                        <th rowspan="1" colspan="1">User</th>
                                                        <th rowspan="1" colspan="1">Old Pack.</th>
                                                        <th rowspan="1" colspan="1">New ack</th>
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
