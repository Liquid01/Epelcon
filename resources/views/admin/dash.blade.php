<div id="card-stats">

    <div class="row">
        <div class="col-md-4 col m4 x6 s12 l4">
            <div class=" card border-radius-6">
                <div class="col-md-6 col m6 x6 s6 l6">
                    <div class="card-width">
                        <div class="">
                            <div class="card-content center-align">
                                <i class="material-icons amber-text small-ico-bg mb-5 fa fa-coins"></i>
                                <p class="m-0"><b id="all_members">{{\App\User::all()->count()-1}}</b></p>
                                <p>Members</p>
                                <p class="green-text  mt-3">
                                    ALL</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col m6 l6 x6 s6">
                    <div class="card-width">
                        <div class="">
                            <div class="card-content center-align">
                                <i class="material-icons amber-text small-ico-bg mb-5 fa fa-coins"></i>
                                <p class="m-0"><b
                                            id="today_members">{{\App\User::where('created_at', today())->get()->count()}}</b>
                                </p>
                                <p>New</p>
                                <p class="green-text  mt-3">
                                    Today
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col m4 x6 s12 l4">
            <div class=" card border-radius-6">
                <div class="col-md-6 col m6 x6 s6 l6">
                    <div class="card-width">
                        <div class="">
                            <div class="card-content center-align">
                                <i class="material-icons amber-text small-ico-bg mb-5 fa fa-coins"></i>
                                <p class="m-0"><b id="generated_pin">{{\App\Pin::all()->count()}}</b></p>
                                <p>PINS</p>
                                <p class="green-text  mt-3">
                                    Generated</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col m6 l6 x6 s6">
                    <div class="card-width">
                        <div class="">
                            <div class="card-content center-align">
                                <i class="material-icons amber-text small-ico-bg mb-5 fa fa-coins"></i>
                                <p class="m-0"><b id="total_used_pins">0</b></p>
                                <p>PINS</p>
                                <p class="green-text  mt-3">
                                    Used: {{\App\Pin::where('status', 5)->count()}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col m4 x6 s12 l4">
            <div class=" card border-radius-6">
                <div class="col-md-6 col m6 x6 s6 l6">
                    <div class="card-width">
                        <div class="">
                            <div class="card-content center-align">
                                <i class="material-icons amber-text small-ico-bg mb-5 fa fa-coins"></i>
                                <p class="m-0"><b
                                            id="generated_pin">{{number_format((float)\App\user_reward::all()->sum('cash'), 2) }}</b>
                                </p>
                                <p>Cash Wallet</p>
                                <p class="green-text  mt-3">
                                    All</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col m6 l6 x6 s6">
                    <div class="card-width">
                        <div class="">
                            <div class="card-content center-align">
                                <i class="material-icons amber-text small-ico-bg mb-5 fa fa-coins"></i>
                                <p class="m-0"><b id="total_used_pins">{{\App\user_reward::all()->sum('points')}}</b>
                                </p>
                                <p>PVS</p>
                                <p class="green-text  mt-3">
                                    All
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <div class="container">
                            <div class="card">
                                <div class="card-content">

                                    <div class="card-header">
                                        <p class="mb-1">
                                            ALL WITHDRAWALS
                                        </p>
                                    </div>
                                    <div class="row">
                                        <div class="col l6 m6 s12 mb-1">
                                            <p class="orange-text">TOTAL UNPAID:
                                                &#x20a6;{{$withdrawals->where('status', 0)->sum('value')}}</p>
                                        </div>
                                        <div class="col l6 m6 s12 mb-1">
                                            <p class="green-text">TOTAL PAID:
                                                &#x20a6;{{$withdrawals->where('status', 1)->sum('value')}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">

                                @isset($latest_withdrawals)
                                    <span class="hide">{{$n=0}}</span>
                                    @forelse($latest_withdrawals as $withdrawal)
                                        <p class="hidden hide">{{$user = \App\User::where('username', $withdrawal->by)->first()}}</p>

                                        <div class="col l3 s12 mt-2 card">
                                            <p class="orange-text pl-2 pr-2 pt-2 center-align">
                                                {{$withdrawal->type}} WITHDRAWAL
                                            </p>
                                            <div class="card-content"
                                                 style="padding:10px; font-size:12px;">
                                                <p>
                                                    <strong style="color:black; font-weight:bold;"><i class="fa fa-clock"></i></strong> {{\Carbon\Carbon::createFromDate($withdrawal->created_at)->diffForHumans()}}
                                                </p>
                                                <p><strong style="color:black; font-weight:bold;">STATUS: </strong>
                                                    @if($withdrawal->status == 0)
                                                        <strong style="color:orangered;"><small>UNPAID</small></strong>
                                                    @else
                                                        <strong style="color:green;">PAID OUT</strong>
                                                    @endif</p>
                                                <hr>
                                                <p>
                                                    <strong style="color:black; font-weight:bold;">FIRSTNAME: </strong>
                                                    {{$user->firstname}}
                                                </p>
                                                <p>
                                                    <strong style="color:black; font-weight:bold;">LASTNAME: </strong>
                                                    {{$user->lastname}}
                                                </p>

                                                <p>
                                                    <strong style="color:darkorange; font-weight:bold;">USERNAME:</strong> {{$withdrawal->by}}
                                                </p>
                                                <hr>
                                                <p>
                                                    <strong style="color:darkorange; font-weight:bold;">AMOUNT: </strong>{{$withdrawal->value}}
                                                </p>
                                                <div>
                                                    <strong style="color:darkorange;">ACCOUNT:</strong>
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
                                            @else
                                                <div class="right mb-3">
                                                    <p class=" btn-raised small mb-3 p-1"
                                                       id="" style="color:green;"
                                                       href="#!">PAID
                                                    </p>
                                                </div>
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
                        <div class="content-right mt-2 mb-2">
                            <a href="{{route('all_withdrawals')}}" class="btn btn-royal">All Withdrawals</a>
                        </div>
{{--                        {{$latest_withdrawals->links()}}--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
