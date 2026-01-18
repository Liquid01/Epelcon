@extends('layouts.print')

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
                            <p class="caption mb-0">A view of all PINS
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
                                                        @isset($pins)
                                                            <span class="hide">{{$n=1}}</span>
                                                            @forelse($pins as $pin)

                                                                <div role="row" class="even">

                                                                    <div class="col m4 l4">
                                                                        <div class="card pl-5 pr-5">
                                                                            <p class="card-title pt-3">
                                                                                <img style="max-width:60px;" src="{{asset('assets/images/logo-2.png')}}" alt="EPELCON" CLASS="img img-responsive"
                                                                                >
                                                                                <span style="font-size: 12px;">
                                                                                    Batch: {{$pin->batch}}
                                                                                </span>
                                                                            </p>
                                                                            <div class="">
                                                                                <p class="padding-1" style="font-weight:700; font-size:14px; color:black;"><strong>Serial: </strong>{{$pin->serial}}</p>
                                                                                <p class="padding-1" style="font-weight:700; font-size:14px; color:black"><strong>Pincode: </strong>{{$pin->code}}</p>
                                                                                <hr>
                                                                                <p class="padding-1" style="font-weight:700; text-align:center; color:darkorange; font-size:11px;">www.epelcon.com/register</p>
                                                                            </div>


                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            @empty
                                                                <h5>No Transactions</h5>
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


