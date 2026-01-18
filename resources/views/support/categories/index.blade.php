@extends('layouts.support')







@section('content')

    <div class="row">

        <div class="content-wrapper-before black"></div>

        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">

            <!-- Search for small screen-->

            <div class="container">

                <div class="row">

                    <div class="col s10 m6 l6">

                        <h5 class="breadcrumbs-title mt-0 mb-0">CATEGORIES</h5>

                        <ol class="breadcrumbs mb-0">

                            {{--<li class="breadcrumb-item"><a href="{{route('adminDashboard')}}">Dashboard</a>--}}

                            {{--</li>--}}

                            <li class="breadcrumb-item active">Categories

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

                            <a href="{{route('support_create_category')}}" data-target="modal1"

                               class=" modal-trigger waves-effect waves-light btn btn-small gradient-45deg-light-blue-cyan z-depth-4 mb-2">

                                New Category

                            </a>

                            {{--<a href="{{route('')}}" data-target="modal-withdraw" class="modal-trigger waves-effect waves-light btn btn-small gradient-45deg-red-pink z-depth-4 mb-2">--}}

                            {{--Shop--}}

                            {{--</a>--}}

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

                                                            style="width: 238px;">Name

                                                        </th>



                                                        <th class="sorting_disabled" rowspan="1" colspan="1"

                                                            style="width: 153px;">Description

                                                        </th>

                                                        <th class="sorting_disabled" rowspan="1" colspan="1"

                                                            style="width: 135px;">Image

                                                        </th>

                                                    </tr>

                                                    </thead>

                                                    <tbody>

                                                    @isset($categories)

                                                        <span class="hide">{{$n=1}}</span>

                                                        @forelse($categories as $category)



                                                            <tr role="row" class="even">



                                                                <td>{{$n++}}</td>

                                                                <td>{{$category->name}}</td>

                                                                <td>{{$category->description}}</td>

                                                                <td>

                                                                    <img src="{{asset('assets/img/categories/categoryThumbImage/'.$category->image)}}"

                                                                         style="max-width:150px;"

                                                                         alt="{{$category->name}}">

                                                                </td>

                                                            </tr>

                                                        @empty

                                                            <h5>No categories</h5>

                                                        @endforelse

                                                    @endisset





                                                    </tbody>

                                                    <tfoot>

                                                    <tr>

                                                        <th rowspan="1" colspan="1">SN</th>

                                                        <th rowspan="1" colspan="1">Name</th>

                                                        <th rowspan="1" colspan="1">Description</th>

                                                        <th rowspan="1" colspan="1">Image</th>

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
