@extends('layouts.back_seller')

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
                            <li class="breadcrumb-item"><a href="{{route('my_office')}}">Stockist</a>
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
                            <span class="pl-1 pr-1 mr-2  left">
                                <a href="{{route('my_pins')}}" style="color:orange; font-weight: bolder; text-transform: uppercase" class="{{$data['used'] == 0?'btn white-text':''}}  btn-success btn-raised">Unused</a>
                            </span>
                            <span class="pl-1 pr-1 mr-2  center">
                                <a href="{{route('my_used_pins')}}" style="color:orangered; font-weight: bolder; text-transform: uppercase" class="{{$data['used'] == 1?'btn white-text':''}}  btn-success btn-raised">Used</a>
                            </span>
                            <span class="pl-1 pr-1 mr-2  right">
                                <a href="{{route('new_pin')}}" style="color:green; font-weight: bolder; text-transform: uppercase" class="btn white-text btn-success btn-raised">New</a>
                            </span>
                        </div>


                        <!-- DataTables Row grouping -->
                        <!-- Multi Select -->
                        <div class="row">
                            <div class="col s12" style="padding:0px">
                                <div class="card">
                                    <div class="card-content">

                                        <h5 class="caption mb-0">My PINs</h5>
                                        <hr>
                                        <div class="row" style="overflow-x: scroll">
                                            <div class="col s12" style="padding:5px;">
                                                @isset($pins)
                                                    {{--                                                        {{dd($pins[0])}}--}}
                                                    @forelse($pins as $pin)
                                                        <div class="col l3 s12 mt-2 card">
                                                            <div class="card-content" style="padding:10px; font-size:12px;">
                                                                <p><strong style="color:black; font-weight:bold;">PACKAGE: </strong> {{$pin->package->name}} </p>
                                                                <p><strong style="color:black; font-weight:bold;">BATCH: </strong>{{$pin->batch}}</p>
                                                                <hr>
                                                                <p><strong style="color:darkorange; font-weight:bold;">SERIAL:</strong> {{$pin->serial}}</p>
                                                                <p><strong style="color:darkorange; font-weight:bold;">CODE: </strong>{{$pin->code}}</p>
                                                                <p><strong style="color:darkorange; font-weight:bold;">STATUS: </strong>{{$pin->status == 0? 'Unused':'Used'}}</p>
                                                                <hr>
                                                                <small><strong>STOCKIST: {{$pin->created_by}}</strong></small>
                                                                <small><strong>{{\Carbon\Carbon::createFromDate($pin->created_at)->diffForHumans()}}</strong></small>
                                                            </div>
                                                        </div>

                                                    @empty
                                                        No PIN to show
                                                    @endforelse
                                                @endisset
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


