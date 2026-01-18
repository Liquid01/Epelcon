<li class="active bold">
    {{--                <a class=" waves-effect waves-cyan {{$data['page_title'] == 'dashboard'? 'active': ''}}" href="{{route('dashboard')}}">--}}
    <a class=" waves-effect waves-cyan" href="{{route('dashboard')}}">
        <i class="material-icons">device_hub</i>
        <span class="menu-title" data-i18n="">Dashboard</span></a>
</li>
<li>
    <a class="waves-effect waves-cyan" href="{{route('my_profile')}}" data-i18n="">
        <i class="material-icons">device_hub</i>
        <span>Profile</span>
    </a>

</li>
<li class="bold">
    <a class="collapsible-header waves-effect waves-cyan " href="#">
        <i class="material-icons">device_hub</i>
        <span class="menu-title" data-i18n="">My Tree</span>
    </a>
    <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
            <li>
                <a class="waves-effect waves-cyan" href="#" data-i18n="">
                    <i class="material-icons">radio_button_unchecked</i>
                    <span>All Descendants</span>
                </a>
            </li>
            <li>
                <a class="waves-effect waves-cyan"
                   href="{{route('user_downline_tree', auth()->user()->username)}}" data-i18n="">
                    <i class="material-icons">radio_button_unchecked</i>
                    <span>My Tree</span>
                </a>
            </li>
            <li>
                <a class="waves-effect waves-cyan"
                   href="#!" data-i18n="">
                    <i class="material-icons">radio_button_unchecked</i>
                    <span>My Referrals</span>
                </a>
            </li>

            {{--            <li>--}}

            {{--                <a class="waves-effect waves-cyan"--}}

            {{--                   href="{{route('get_stage_matrix', auth()->user()->username)}}" data-i18n="">--}}

            {{--                    <i class="material-icons">radio_button_unchecked</i>--}}

            {{--                    <span>Stage Matrix</span>--}}

            {{--                </a>--}}

            {{--            </li>--}}
        </ul>
    </div>
</li>


<li class="bold">

    <a class="collapsible-header waves-effect waves-cyan " href="#">

        <i class="material-icons">device_hub</i>

        <span class="menu-title" data-i18n="">My Money</span>

    </a>

    <div class="collapsible-body">

        <ul class="collapsible collapsible-sub" data-collapsible="accordion">

            <li>

                <a class="waves-effect waves-cyan" href="{{route('my_investments')}}" data-i18n="">

                    <i class="material-icons">nature_people</i>

                    <span>Investment</span>

                </a>

                <a class="waves-effect waves-cyan" href="{{route('member_savings')}}" data-i18n="">

                    <i class="material-icons">account_balance</i>

                    <span>Savings</span>

                </a>

                {{--                <a class="waves-effect waves-cyan" href="{{route('member_matchings_within')}}" data-i18n="">--}}

                {{--                    <i class="material-icons">archive</i>--}}

                {{--                    <span>Matchings</span>--}}

                {{--                </a>--}}

                <a class="waves-effect waves-cyan" href="{{route('member_withdrawals')}}" data-i18n="">

                    <i class="material-icons">keyboard_backspace</i>

                    <span>Withdrawals</span>

                </a>

            </li>

            <li>

                <a class="waves-effect waves-cyan" href="{{route('my_transactions')}}" data-i18n="">

                    <i class="material-icons">device_hub</i>

                    <span>Transactions</span>

                </a>

            </li>

        </ul>

    </div>

</li>

<li class="bold">

    <a class="collapsible-header waves-effect waves-cyan " href="#">
        <i class="material-icons">device_hub</i>
        <span class="menu-title" data-i18n="">Orders</span>
    </a>

    <div class="collapsible-body">

        <ul class="collapsible collapsible-sub" data-collapsible="accordion">

            <li>
                <a class="waves-effect waves-cyan" href="{{route('guestshop')}}" data-i18n="">

                    <i class="material-icons">view_list</i>

                    <span>Shop</span>

                </a>

                <a class="waves-effect waves-cyan" href="{{route('member_orders')}}" data-i18n="">

                    <i class="material-icons">device_hub</i>

                    <span>Orders</span>

                </a>

            </li>

        </ul>

    </div>

</li>
@if(app('current_user')->package_id >= 5)

    <li>

        <a class="waves-effect waves-cyan" style="color:orange" href="{{route('stockist_dashboard')}}" data-i18n="">

            <i class="material-icons" style="color:darkorange;">settings</i>

            <span>Stockist</span>

        </a>

    </li>

@endif
<li>

    <a class="waves-effect waves-cyan" href="{{url('/')}}" data-i18n="">
        <i class="material-icons">web</i>
        <span>Website</span>

    </a>

</li>

<li>

    <a class="waves-effect waves-cyan" href="{{route('member_request')}}" data-i18n="">
        <i class="material-icons">web</i>
        <span>Requests</span>

    </a>

</li>


<script>

    function notEligible(type) {

        alert('Not Eligible to ' + type + ' Yet');

    }

    {{--function get_stockist_home()--}}
    {{--{--}}
    {{--    window.location.href = "{{url('/stockists/home')}}"--}}
    {{--}--}}

</script>
