<div id="card-stats">
    <div class="row">
        <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text animate fadeRight">
                <div class="padding-4">
                    <div class="col s6 m6">
                        <i class="material-icons background-round mt-5">people</i>
                        <p>Lagos Members</p>
                    </div>
                    <div class="col s5 m6 right-align">
                        <h5 class="mb-0 white-text">{{\App\User::all()->count()-1}}</h5>
                        <p class="no-margin">Lagos Members</p>
                        <p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text animate fadeLeft">
                <div class="padding-4">
                    <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">fiber_pin</i>
                        <p>Lagos PINs</p>
                    </div>
                    <div class="col s5 m5 right-align">
                        <h5 class="mb-0 white-text">{{\App\Pin::all()->count()}}</h5>
                        <p class="no-margin">Generated</p>
                        <p>Used: {{\App\Pin::where('status', 5)->count()}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text animate fadeRight">
                <div class="padding-4">
                    <div class="col s6 m6">
                        <i class="material-icons background-round mt-5">attach_money</i>
                        <p>Lagos All Cash</p>
                    </div>
                    <div class="col s6 m6 right-align">
                        <h5 class="mb-0 white-text">{{number_format((float)\App\user_reward::all()->sum('cash'), 2) }}</h5>
                        <p class="no-margin">Balance</p>
                        <p title="withdrawn">WDR: 0.00</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-purple-deep-purple gradient-shadow min-height-100 white-text animate fadeLeft">
                <div class="padding-4">
                    <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">center_focus_strong</i>
                        <p>Points Earned</p>
                    </div>
                    <div class="col s5 m5 right-align">
                        <h5 class="mb-0 white-text">{{\App\user_reward::all()->sum('points')}}</h5>
                        <p class="no-margin">Total</p>
                        <p>Used: 0</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="card-stats">
    <div class="row">
        <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text animate fadeRight">
                <div class="padding-4">
                    <div class="col s6 m6">
                        <i class="material-icons background-round mt-5">all_inclusive</i>
                        <p><div class="btn btn-primary"><a href="{{route('all_transactions')}}">More</a></div></p>
                    </div>
                    <div class="col s5 m6 right-align">
                        <h5 class="mb-0 white-text">{{\App\Transaction::all()->count()}}</h5>
                        <p class="no-margin">LAG Transactions</p>
                        <p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-purple-deep-orange gradient-shadow min-height-100 white-text animate fadeLeft">
                <div class="padding-4">
                    <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">monetization_on</i>
                        <p>All</p>
                    </div>
                    <div class="col s5 m5 right-align">
                        <h5 class="mb-0 white-text">{{number_format((float)\App\investment::sum('amount'), 2)}}</h5>
                        <p class="no-margin">investments</p>
                        <p>count: {{\App\Investment::all()->count()}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text animate fadeLeft">
                <div class="padding-4">
                    <div class="col s6 m6">
                        <i class="material-icons background-round mt-5">attach_money</i>
                        <p>LAG All</p>
                    </div>
                    <div class="col s6 m6 right-align">
                        <h5 class="mb-0 white-text">{{number_format((float)\App\user_reward::all()->sum('shopping'), 2) }}</h5>
                        <p class="no-margin">Shopping</p>

                        <p title="withdrawn">WDR: 0.00</p>
                    </div>
                </div>
            </div>
        </div>
        {{--<div class="col s12 m6 l6 xl3">--}}
        {{--<div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text animate fadeLeft">--}}
        {{--<div class="padding-4">--}}
        {{--<div class="col s7 m7">--}}
        {{--<i class="material-icons background-round mt-5">center_focus_strong</i>--}}
        {{--<p>Points Earned</p>--}}
        {{--</div>--}}
        {{--<div class="col s5 m5 right-align">--}}
        {{--<h5 class="mb-0 white-text">{{\App\user_reward::all()->sum('points')}}</h5>--}}
        {{--<p class="no-margin">Total</p>--}}
        {{--<p>Used: 0</p>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
    </div>
</div>