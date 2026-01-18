<li class="navigation-header"><a class="navigation-header-text">ADMINISTRATION</a><i
            class="navigation-header-icon material-icons">more_horiz</i>
</li>
{{--<li class="bold {{$data['page_title'] == 'dashboard'? 'active open': ''}}" href="{{route('adminDashboard')}}">--}}

<li class="bold " href="{{route('dashboard')}}">
    <a class="collapsible-header waves-effect waves-cyan" href="#">
        <i class="material-icons">dashboard</i>
        <span class="menu-title" >Admin</span>
    </a>
    <div class="collapsible-body active">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
            <li>
                <a class="collapsible-body " href="{{route('dashboard')}}" >
                    <i class="material-icons">radio_button_unchecked</i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a class="collapsible-body" href="https://www.epelcon.com:2096" target="_blank"
                   >
                    <i class="material-icons">radio_button_unchecked</i>
                    <span>Check Email</span>
                </a>
            </li>
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                <li>
                    <a class="collapsible-body" href="{{route('allMembers')}}" >
                        <i class="material-icons">radio_button_unchecked</i>
                        <span>All Members</span>
                    </a>
                </li>
                <li>
                    <a class="collapsible-body" href="{{route('all_transactions')}}" >
                        <i class="material-icons">radio_button_unchecked</i>
                        <span>All Transactions</span>
                    </a>
                </li>
                <li>
                    <a class="collapsible-body" href="{{route('generatepin')}}" >
                        <i class="material-icons">radio_button_unchecked</i>
                        <span>Generate Pin</span>
                    </a>
                </li>
                <li>
                    <a class="collapsible-body" href="{{route('pinManagement')}}" >
                        <i class="material-icons">radio_button_unchecked</i>
                        <span>Pin Management</span>
                    </a>
                </li>
                <li>
                    <a class="collapsible-body" href="{{route('all_withdrawals')}}" >
                        <i class="material-icons">radio_button_unchecked</i>
                        <span>Withdrawals</span>
                    </a>
                </li>
                <li>
                    <a class="collapsible-body" href="{{route('admin_messages')}}" >
                        <i class="material-icons">radio_button_unchecked</i>
                        <span>Messages</span>
                    </a>
                </li>
            </ul>
        </ul>
    </div>
</li>
{{--<li class="bold " href="{{route('adminDashboard')}}">--}}
{{--    <a class="collapsible-header waves-effect waves-cyan" href="#">--}}
{{--        <i class="material-icons">dashboard</i>--}}
{{--        <span class="menu-title" >Packages</span>--}}
{{--    </a>--}}
{{--    <div class="collapsible-body active">--}}
{{--        <ul class="collapsible collapsible-sub" data-collapsible="accordion">--}}
{{--            <li>--}}
{{--                <a class="collapsible-body " href="{{route('all_packages')}}" >--}}
{{--                    <i class="material-icons">radio_button_unchecked</i>--}}
{{--                    <span>All Packages</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a class="collapsible-body" href="{{route('change_package')}}" target="_blank"--}}
{{--                   >--}}
{{--                    <i class="material-icons">radio_button_unchecked</i>--}}
{{--                    <span>Change Package</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--</li>--}}
<li class="bold">
    <a class="collapsible-header waves-effect waves-cyan " href="#">
        <i class="material-icons">event</i>
        <span class="menu-title" >Events</span>
    </a>
    <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
            <li>
                <a class="collapsible-body" href="{{route('admin_events')}}"
                   >
                    <i class="material-icons">radio_button_unchecked</i>
                    <span>Events</span>
                </a>
            </li>
            <li>
                <a class="collapsible-body" href="{{route('event_attendance')}}"
                   >
                    <i class="material-icons">radio_button_unchecked</i>
                    <span>Attendance</span>
                </a>
            </li>
        </ul>
    </div>
</li>

<li class="bold">
    <a class="collapsible-header waves-effect waves-cyan " href="#">
        <i class="material-icons">attach_money</i>
        <span class="menu-title" >Wallet</span>
    </a>
    <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
            <li>
                <a class="collapsible-body" href="{{route('admin_fund_wallet')}}"
                   >
                    <i class="material-icons">radio_button_unchecked</i>
                    <span>Fund User</span>
                </a>
            </li>
            <li>
                <a class="collapsible-body" href="!#"
                   >
                    <i class="material-icons">radio_button_unchecked</i>
                    <span>All Wallet</span>
                </a>
            </li>
{{--            <li>--}}
{{--                <a class="collapsible-body" href="{{route('transaction_summary')}}"--}}
{{--                   >--}}
{{--                    <i class="material-icons">radio_button_unchecked</i>--}}
{{--                    <span>Summary</span>--}}
{{--                </a>--}}
{{--            </li>--}}
        </ul>
    </div>
</li>
<li class="bold">
    <a class="collapsible-header waves-effect waves-cyan " href="#">
        <i class="material-icons">shop</i>
        <span class="menu-title" >Sales</span>
    </a>
    <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
            <li>
                <a class="collapsible-body" href="{{route('admin_sell')}}"
                   >
                    <i class="material-icons">radio_button_unchecked</i>
                    <span>Sell</span>
                </a>
            </li>
            <li>
                <a class="collapsible-body" href="{{route('admin_sales')}}"
                   >
                    <i class="material-icons">radio_button_unchecked</i>
                    <span>All Sales</span>
                </a>
            </li>
        </ul>
    </div>
</li>
<li class="bold">
    <a class="collapsible-header waves-effect waves-cyan " href="#">
        <i class="material-icons">list</i>
        <span class="menu-title" >Products</span>
    </a>
    <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
            <li>
                <a class="collapsible-body" href="{{route('create_product')}}"
                   >
                    <i class="material-icons">radio_button_unchecked</i>New Product</a>
            </li>
            <li>
                <a class="collapsible-body" href="{{route('products')}}" >
                    <i class="material-icons">radio_button_unchecked</i>
                    <span>Products</span>
                </a>
            </li>
            <li>
                <a class="collapsible-body" href="{{route('create_category')}}" >
                    <i class="material-icons">radio_button_unchecked</i>
                    <span>New Category</span>
                </a>
            </li>
            <li>
                <a class="collapsible-body" href="{{route('categories')}}" >
                    <i class="material-icons">radio_button_unchecked</i>
                    <span>Categories</span>
                </a>
            </li>
        </ul>
    </div>
</li>
<li class="bold">
    <a class="collapsible-header waves-effect waves-cyan " href="#">
        <i class="material-icons">list</i>
        <span class="menu-title" >Orders</span>
    </a>
    <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
            <li>
                <a class="collapsible-body" href="{{route('all_orders')}}"
                   >
                    <i class="material-icons">radio_button_unchecked</i>All Orders</a>
            </li>
        </ul>
    </div>
</li>
<li class="bold">
    <a class="collapsible-header waves-effect waves-cyan " href="#">
        <i class="material-icons">store</i>
        <span class="menu-title" >Market</span>
    </a>
    <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
            <li>
                <a class="collapsible-body" href="{{route('shop')}}"
                   >
                    <i class="material-icons">radio_button_unchecked</i>
                    <span>Visit Shop</span>
                </a>
            </li>
            <li>
                <a class="collapsible-body" href="{{route('sell_pin')}}"
                   >
                    <i class="material-icons">radio_button_unchecked</i>
                    <span>Sell</span>
                </a>
            </li>
        </ul>
    </div>
</li>

<li class="bold">
    <a class="collapsible-header waves-effect waves-cyan " href="#">
        <i class="material-icons">settings</i>
        <span class="menu-title" >Settings</span>
    </a>
    <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
            <li>
                <a class="collapsible-body" href="{{route('general_settings')}}"
                   >
                    <i class="material-icons">radio_button_unchecked</i>
                    <span>General Settings</span>
                </a>
            </li>
            <li>
                <a class="collapsible-body" href="{{route('system_settings')}}"
                   >
                    <i class="material-icons">radio_button_unchecked</i>
                    <span>System Settings</span>
                </a>
            </li>
        </ul>
    </div>
</li>
