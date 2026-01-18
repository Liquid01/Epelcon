@extends('layouts.members')



@section('content')

    <div class="row">

        <div class="content-wrapper-before black"></div>

        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">

            <!-- Search for small screen-->

            <div class="container">

                <div class="row">

                    <div class="col s10 m6 l6">

                        <h5 class="breadcrumbs-title mt-0 mb-0">INVESTMENTS</h5>

                        <ol class="breadcrumbs mb-0">

                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>

                            </li>

                            <li class="breadcrumb-item active">Investments

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

                            <button data-target="modal1" class=" modal-trigger waves-effect waves-light btn btn-small gradient-45deg-light-blue-cyan z-depth-4 mb-2">

                                New

                            </button>

                        </div>

                        @include('includes.flash')

                    </div>



                    <!-- DataTables Row grouping -->



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

                                                       style="width: 100%;">

                                                    <thead>

                                                    <tr role="row">



                                                        <th class="sorting_disabled" rowspan="1" colspan="1"

                                                            style="width: 79px;">From

                                                        </th>



                                                        <th class="sorting_disabled" rowspan="1" colspan="1"

                                                            style="width: 79px;">Duration

                                                        </th>

                                                        <th class="sorting_disabled" rowspan="1" colspan="1"

                                                            style="width: 50px;">Amount

                                                        </th>

                                                        <th class="sorting_disabled" rowspan="1" colspan="1"

                                                            style="width: 50px;">Interest

                                                        </th>

                                                        <th class="sorting_disabled" rowspan="1" colspan="1"

                                                            style="width: 151px;">Start Date

                                                        </th>

                                                        <th class="sorting_disabled" rowspan="1" colspan="1"

                                                            style="width: 151px;">Due

                                                        </th>

                                                        <th class="sorting_disabled" rowspan="1" colspan="1"

                                                            style="width: 151px;">Status

                                                        </th>

                                                    </tr>

                                                    </thead>

                                                    <tbody>

                                                    @isset($investments)

{{--                                                        <span class="hide">{{$n=1}}</span>--}}

                                                        @forelse($investments as $investment)



                                                            <tr role="row" class="even">



{{--                                                                <td>{{$n++}}</td>--}}

                                                                <td>{{$investment->paid_from}}</td>

                                                                <td>{{$investment->duration}} Months</td>

                                                                <td>{{$investment->amount}}</td>

                                                                <td>{{number_format(($investment->amount*0.082)*$investment->duration, 2)}}</td>

                                                                <td>{{$investment->created_at}}</td>

                                                                <td>{{$investment->created_at->addMonths($investment->duration)}}</td>

                                                                <td>{{$investment->status == 0 ? 'Not Collected':'Collected'}}</td>

                                                            </tr>

                                                        @empty

                                                            <h5>No investments</h5>

                                                        @endforelse

                                                    @endisset





                                                    </tbody>

                                                    <tfoot>

                                                    <tr>

                                                        {{--<th rowspan="1" colspan="1">SN</th>--}}

                                                        <th rowspan="1" colspan="1">From</th>

                                                        <th rowspan="1" colspan="1">Duration</th>

                                                        <th rowspan="1" colspan="1">Amount</th>

                                                        <th rowspan="1" colspan="1">Interest</th>

                                                        <th rowspan="1" colspan="1">Start Date</th>

                                                        <th rowspan="1" colspan="1">Due</th>

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





                <!-- Modal Trigger -->



                <!-- Modal Structure -->

                <div id="modal1" class="modal modal-fixed-footer">

                    <div class="modal-content">

                        <div class="" id="card-reveal-section">

                            <div class="card" style="overflow: hidden;">

                                <div class="card-content">



                                    <span class="card-title activator grey-text text-darken-4 mt-2">

                                        New Investment

                                    </span>

                                    <form action="{{route('store_new_investment')}}" method="post">

                                        @csrf

                                        <div class="input-field mb-10">

                                            <div class="row">

                                                <div class="input-field col s12">

                                                    <input id="plan_amount" name="plan_amount" required

                                                           type="text"

                                                           min="3"

                                                           value="{{old('plan_amount')}}"

                                                           class="{{ $errors->has('plan_amount') ? ' is-invalid' : '' }}">

                                                    <label for="plan_amount">Amount</label>

                                                    @if ($errors->has('plan_amount'))

                                                        <span class="invalid-feedback" role="alert">

                                                            <strong>{{ $errors->first('plan_amount') }} </strong>

                                                        </span>

                                                    @endif

                                                </div>

                                            </div>

                                        </div>

                                        <div class="input-field mb-10">

                                            <div class="row">

                                                <div class=" col s12">

                                                    <select name="plan_duration" required

                                                            class="browser-default form-control {{ $errors->has('plan_duration') ? ' is-invalid' : '' }}"

                                                            id="plan_duration">

                                                        <option value="3">3 Months</option>

                                                        <option value="6">6 Months</option>

                                                        <option value="12">12 Months</option>

                                                    </select>

                                                    <label for="plan_duration"></label>

                                                    @if ($errors->has('plan_duration'))

                                                        <span class="invalid-feedback" role="alert">

                                                            <strong>{{ $errors->first('plan_duration') }} </strong>

                                                        </span>

                                                    @endif

                                                </div>

                                            </div>

                                        </div>

                                        <button class="btn btn-success" style="float:right; margin-top:-30px;">Submit</button>

                                    </form>

                                </div>

                            </div>





                        </div>



                    </div>

                    <div class="modal-footer">

                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>

                    </div>

                </div>

            </div>

        </div>

    </div>









@endsection
