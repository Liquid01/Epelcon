@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="content-wrapper-before assets2"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0">MEMBERS MANAGEMENT</h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{route('adminDashboard')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Members
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="container">
                <div class="section section-data-tables">
                    {{--                    <div class="card">--}}
                    {{--                        <div class="card-content">--}}
                    {{--                            <div class="caption mb-0 card-title">Latest Members</div>--}}

                    {{--                            <form action="{{route('search_by_stage')}}">--}}

                    {{--                            </form>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                    <!-- DataTables Row grouping -->

                    <!-- Multi Select -->

                    <div class="row">
                        <div class="col s12">
                            <div class="card">
                                <div class="card-header">

                                </div>
                                <div class="card-content">
                                    LATEST MEMBERS
                                    <div class="card">
                                        <div class="card-content">

                                            <p class="pb-2">Filter Members</p>
                                            <form action="{{route('get_members_by_date_range')}}" method="get"
                                                  class="ws-validate">
                                                @csrf
                                                <div class="form-row container">
                                                    <div class="col s4 m-auto">
                                                        <label for="date-from">From:</label>
                                                        <input class="form-control"
                                                               data-dependent-validation='{"from": "dateto", "prop": "max"}'
                                                               type="date" name="datefrom" id="datefrom"
                                                               placeholder="from"/>
                                                    </div>
                                                    <div class="col s4 m-auto">

                                                        <label for="date-to">To:</label>
                                                        <input class="form-control"
                                                               data-dependent-validation='{"from": "datefrom", "prop": "min"}'
                                                               type="date" name="dateto" id="dateto" placeholder="to"/>

                                                    </div>
                                                    <div class="col s2">
                                                        <button class="btn btn-success">Search</button>
                                                    </div>

                                                    <!-- max of the first date equals value of the second -->
                                                    <!-- mmin of the second date equals value of the first -->

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12">
                                            <table class="table table-responsive table-stripped tablehover">
                                                <tr class="">
                                                    <th>Firstname</th>
                                                    <th>Lastname</th>
                                                    <th>Sponsor</th>
                                                    <th>Username</th>
                                                    <th>Package</th>
                                                </tr>

                                                <span class="hidden hide">{{$n=0}}</span>

                                                @isset($members)

                                                    @forelse($members as $member)
                                                        <tr>
                                                            <td>{{$member->firstname}}</td>
                                                            <td>{{$member->lastname}}</td>
                                                            <td>{{$member->sponsor}}</td>
                                                            <td>{{$member->username}}</td>
                                                            <td>{{$member->package->name}}</td>
                                                        </tr>

                                                        <span class="hidden hide">{{$n++}}</span>
                                                    @empty
                                                        No member to show
                                                    @endforelse
                                                @endisset

                                            </table>
                                        </div>
                                    </div>
                                    <hr>
                                    {{$members->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- START RIGHT SIDEBAR NAV -->
            </div>
        </div>
    </div>

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
                                        {{--                                            <th class="sorting_disabled" rowspan="1" colspan="1"--}}
                                        {{--                                                style="width: 135px;">--}}
                                        {{--                                                <label>--}}
                                        {{--                                                    <input type="checkbox" class="select-all clicked">--}}
                                        {{--                                                    <span></span>--}}
                                        {{--                                                </label>--}}
                                        {{--                                            </th>--}}
                                        <th class="sorting_disabled" rowspan="1" colspan="1" style="">SN</th>
                                        <th class="sorting_disabled" rowspan="1" colspan="1" style="width: auto;">Name
                                        </th>
                                        <th class="sorting_disabled" rowspan="1" colspan="1" style="width: auto">
                                            Username
                                        </th>
{{--                                        <th class="sorting_disabled" rowspan="1" colspan="1" style="width: auto;">--}}
{{--                                            Sponsor--}}
{{--                                        </th>--}}
                                        <th class="sorting_disabled" rowspan="1" colspan="1" style="width:auto">Package
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @include('admin.members.all_members')


                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">SN</th>
                                        <th rowspan="1" colspan="1">Name</th>
                                        <th rowspan="1" colspan="1">Username</th>
{{--                                        <th rowspan="1" colspan="1">Sponsor</th>--}}
                                        <th rowspan="1" colspan="1">Package</th>
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

@endsection

@section('page_script')

    <script>
        webshim.setOptions('forms', {
            lazyCustomMessages: true,
            addValidators: true
        });
        webshim.setOptions('forms-ext', {
            replaceUI: 'auto',
            types: 'date',
            date: {
                startView: 2,
                size: 2,
                classes: 'hide-spinbtns'
            }
        });

        //start polyfilling
        webshim.polyfill('forms forms-ext');

        //initial max/min attributes should be done serverside.
        $(function () {
            $('#date-from, #date-to').prop('min', function () {
                return new Date().toJSON().split('T')[0];
            });
        });

    </script>
@endsection

