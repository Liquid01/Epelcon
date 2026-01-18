@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="content-wrapper-before black"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0">WITHDRAWALS</h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{route('adminDashboard')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">All Withdrawals
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
                            @include('includes.flash')
                        </div>

                    </div>

                    <!-- DataTables Row grouping -->
                    <div class="container">
                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                    <div class="col l6 m6 s12">
                                        <p class="orange-text">
                                            <a href="{{route('all_withdrawals')}}" style="color:orange; font-weight: bolder; text-transform: uppercase" class="{{$data['paid'] == 0?'btn white-text':''}} btn-warning btn-raised">Unpaid
                                                &#x20a6;{{$all_withdrawals->where('status', 0)->sum('value')}}
                                            </a>
                                        </p>
                                    </div>
                                    <div class="col l6 m6 s12">
                                        <p class="green-text">
                                            <a href="{{route('admin_paid_withdrawals')}}" style="color:orangered; font-weight: bolder; text-transform: uppercase" class="{{$data['paid'] == 1?'btn white-text':''}} btn-success btn-raised">PAID
                                                &#x20a6;{{$all_withdrawals->where('status', 1)->sum('value')}}
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="card">
                                <div class="card-content">
                                    <h4 class="card-title">Page Length Options</h4>
                                    <div class="row">
                                        @include('includes.errors')
                                        <form action="{{route('search_withdrawals')}}" method="post">
                                            @csrf
                                            <div class="col l4 m4 s13 mb-2">
                                                <label for="search_withdrawals">Search</label>
                                                <div class="input-group">
                                                    <input type="text" placeholder="search withdrawals" class="inline form-control" id="search_withdrawals"
                                                           name="search_term">
                                                    <button class="btn btn-default input-group-addon inline">Search</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="row">

                                        <div class="row">
                                            <div class="col s12">

                                                @isset($withdrawals)
                                                    <span class="hide">{{$n=0}}</span>
                                                    @forelse($withdrawals as $withdrawal)
                                                        <p class="hidden hide">{{$user = \App\User::where('username', $withdrawal->by)->first()}}</p>

                                                        <div class="col l3 s12 mt-2">
                                                            <p class="orange-text pl-2 pr-2 pt-2 center-left">
                                                                {{$withdrawal->type}}
                                                            </p>
                                                            <div class="card-content"
                                                                 style="padding:10px; font-size:12px;">
                                                                <p>
                                                                    <strong style="color:#666; font-weight:bold;"><i class="fa fa-clock"></i></strong> {{\Carbon\Carbon::createFromDate($withdrawal->created_at)->diffForHumans()}}
                                                                </p>
                                                                <p>
                                                                    <strong style="color:#666; font-weight:bold;">Status: </strong>
                                                                    @if($withdrawal->status == 0)
                                                                        <strong style="color:orangered;"><small>UNPAID</small></strong>
                                                                    @else
                                                                        <strong style="color:green;">PAID OUT</strong>
                                                                    @endif
                                                                </p>
                                                                <hr>
                                                                <p>
                                                                    <strong style="color:#666666; font-weight:bold;">Firstname: </strong>
                                                                    {{$user->firstname}}
                                                                </p>
                                                                <p>
                                                                    <strong style="color:#666666; font-weight:bold;">Lastname: </strong>
                                                                    {{$user->lastname}}
                                                                </p>

                                                                <p>
                                                                    <strong style="color:darkorange; font-weight:bold;">Username:</strong> {{$withdrawal->by}}
                                                                </p>
                                                                <hr>
                                                                <p>
                                                                    <strong style="color:darkorange; font-weight:bold;">Amount: </strong>{{$withdrawal->value}}
                                                                </p>
                                                                <div>
                                                                    <strong style="color:darkorange;">Acount:</strong>
                                                                    <span>
                                                                            {{$user->bank_account_number}} <br>
{{--                                                                            {{$user->bank_account_name}} <br>--}}
                                                                            <strong style="color:darkorange;">BANK:</strong> {{$user->bank?$user->bank['name']:''}}
                                                                        </span>
                                                                </div>
                                                            </div>
                                                            @if($withdrawal->status == 0)
                                                                <div class="right mb-3">

                                                                    <a class=" btn-raised small mb-3 p-1"
                                                                       id="pay_withdraw"
                                                                       style="font-weight: 700; text-shadow: 1px 1px orangered;"
                                                                       href="{{route('approve_withdrawal', $withdrawal->id)}}">PAY</a>
                                                                </div>
{{--                                                            @else--}}
{{--                                                                <div class="right mb-3">--}}
{{--                                                                    <p class=" btn-raised small mb-3 p-1"--}}
{{--                                                                       id="" style="color:green;"--}}
{{--                                                                       href="#!">PAID--}}
{{--                                                                    </p>--}}
{{--                                                                </div>--}}
                                                            @endif
                                                        </div>

                                                        @php
                                                            ++$n;
                                                        @endphp
                                                        @if($n % 4 == 0)
                                                            <div class="clearfix"></div>
                                                        @endif
                                                    @empty
                                                        No Withdrawals to show
                                                    @endforelse
                                                @endisset
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div>

                                        {{$withdrawals->links()}}
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
