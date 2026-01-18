@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="content-wrapper-before black"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0">PIN MANAGEMENT</h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{route('adminDashboard')}}">Dashboard</a>
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
{{--                                <a href="{{route('generatepin')}}" class="btn btn-success btn-raised">New Pin</a>--}}
{{--                                <a href="{{route('print_pin')}}" class="btn btn-success btn-raised">Print</a>--}}
                    </div>


                    <!-- DataTables Row grouping -->

                    <!-- Multi Select -->

                        <div class="card-content">
                            <span class="pl-1 pr-1 mr-2  left">
                                <a href="{{route('pinManagement')}}" style="color:orange; font-weight: bolder; text-transform: uppercase" class="{{$data['used'] == 0?'btn white-text':''}} btn-success btn-raised">Unused</a>
                            </span>
                            <span class="pl-1 pr-1 mr-2  center">
                                <a href="{{route('used_pins')}}" style="color:orangered; font-weight: bolder; text-transform: uppercase" class="{{$data['used'] == 1?'btn white-text':''}} btn-success btn-raised">Used</a>
                            </span>
                            <span class="pl-1 pr-1 mr-2  right">
                                <a href="{{route('generatepin')}}" style="color:green; font-weight: bolder; text-transform: uppercase" class="btn white-text btn-success btn-raised">New</a>
                            </span>
                        </div>
                    <div class="row">
                        <div class="col s12 p-0">
                            <div class="card">
                                <div class="card-content">
                                    <h4 class="card-title">Page Length Options</h4>

                                    <div class="row">
                                        @include('includes.errors')
                                        <form action="{{route('search_pins')}}" method="post">
                                            @csrf
                                            <div class="col l4 m4 s13 mb-2">
                                                <label for="search_withdrawals">Search</label>
                                                <div class="input-group">
                                                    <input type="text" placeholder="search Pins" class="inline form-control" id="search_pins"
                                                           name="search_term">
                                                    <button class="btn btn-default input-group-addon inline">Search</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="row">

                                        <div class="row" style="overflow-x: scroll">
                                            <div class="col s12">
                                                @isset($pins)
                                                    {{--                                                        {{dd($pins[0])}}--}}
                                                    @forelse($pins as $pin)
                                                        @if($pin->created_by != 'GodsWealth1')
                                                        <div class="col l3 s12 mt-2 ">
                                                            <div class="card-content" style="padding:10px; min-height:200px; font-size:12px;">
                                                                <p><strong style="color:black; font-weight:bold;">PACKAGE: </strong> {{$pin->package->name}} </p>
                                                                <p><strong style="color:black; font-weight:bold;">BATCH: </strong>{{$pin->batch}}</p>
                                                                <hr>
                                                                <p><strong style="color:darkorange; font-weight:bold;">SERIAL:</strong> {{$pin->serial}}</p>
                                                                <p><strong style="color:darkorange; font-weight:bold;">CODE: </strong>{{$pin->code}}</p>
                                                                <p><strong style="color:{{$pin->status == 0? 'green':'orangered'}}; font-weight:bold;">STATUS: {{$pin->status == 0? 'Unused':'Used'.$pin->used_date. ' '. 'Used By: '.$pin->used_by}}</strong>
                                                                </p>
                                                                <hr>
                                                                <small><strong>STOCKIST: {{$pin->created_by}}</strong></small><br>
                                                                <small><strong>Created: {{\Carbon\Carbon::createFromDate($pin->created_at)->diffForHumans()}}</strong></small>
                                                            </div>
                                                        </div>
                                                        @endif
                                                    @empty
                                                        No PIN to show
                                                    @endforelse
                                                @endisset
                                            </div>
                                        </div>
                                    </div>

                                    <div class="pagination">
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


