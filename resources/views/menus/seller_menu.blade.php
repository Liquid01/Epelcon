<li class="active bold open">



    <a class=" waves-effect waves-cyan" href="{{route('stockist_dashboard')}}">

        <i class="material-icons">dvr</i>

        <span class="menu-title" data-i18n="">Overview</span></a>

</li>

<li class="active bold open">
    <a class=" waves-effect waves-cyan" href="{{route('stockist_orders')}}">
        <i class="material-icons">shopping_basket</i>
        <span class="menu-title" data-i18n="">Orders</span></a>
</li>

<li class="active bold">
    <a class=" waves-effect waves-cyan" href="{{route('stockist_sales')}}">
        <i class="material-icons">money</i>
        <span class="menu-title" data-i18n="">Sales</span></a>
</li>

<li class="bold">
    <a class="collapsible-header waves-effect waves-cyan " href="#">
        <i class="material-icons">images</i>
        <span class="menu-title" data-i18n="">Products</span>
    </a>

    <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
            <li>
                <a class="waves-effect waves-cyan" href="{{route('my_Products')}}" data-i18n="">
                    <i class="material-icons">view_list</i>
                    <span>My Products</span>
                </a>

                <a class="waves-effect waves-cyan" href="{{route('new_product')}}" data-i18n="">
                    <i class="material-icons">view_list</i>
                    <span>New Product</span>
                </a>
            </li>
        </ul>
    </div>
</li>

@include('menus.office_menu')
<li class="bold">
    <a class="collapsible-header waves-effect waves-cyan " href="#">
        <i class="material-icons">inventory</i>
        <span class="menu-title" data-i18n="">Inventory</span>
    </a>

    <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
            <li>
                <a class="waves-effect waves-cyan" href="#!" data-i18n="">
                    <i class="material-icons">view_list</i>
                    <span>All Inventory</span>
                </a>

                <a class="waves-effect waves-cyan" href="#!" data-i18n="">
                    <i class="material-icons">view_list</i>
                    <span>New Stock</span>
                </a>
            </li>
        </ul>
    </div>
</li>

<li class="bold">
    <a class="collapsible-header waves-effect waves-cyan " href="#">
        <i class="material-icons">settings</i>
        <span class="menu-title" data-i18n="">Logistics</span>
    </a>

    <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
            <li>
                <a class="waves-effect waves-cyan" href="#!" data-i18n="">
                    <i class="material-icons">view_list</i>
                    <span>Inbound</span>
                </a>

                <a class="waves-effect waves-cyan" href="#!" data-i18n="">
                    <i class="material-icons">view_list</i>
                    <span>Outbound</span>
                </a>
            </li>
        </ul>
    </div>
</li>


<li class="bold">
    <a class="collapsible-header waves-effect waves-cyan " href="#">
        <i class="material-icons">shopping_asket</i>
        <span class="menu-title" data-i18n="">Purchases</span>
    </a>

    <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
            <li>
                <a class="waves-effect waves-cyan" href="#!" data-i18n="">
                    <i class="material-icons">view_list</i>
                    <span>All Purchases</span>
                </a>

                <a class="waves-effect waves-cyan" href="#!" data-i18n="">
                    <i class="material-icons">view_list</i>
                    <span>New Stock Request</span>
                </a>
            </li>
        </ul>
    </div>
</li>

<li class="bold">
    <a class="collapsible-header waves-effect waves-cyan " href="#">
        <i class="material-icons">store</i>
        <span class="menu-title" data-i18n="">Store</span>
    </a>

    <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
            <li>
                <a class="waves-effect waves-cyan" href="{{route('stockist_store', app('current_user')->username)}}" data-i18n="">
                    <i class="material-icons">view_list</i>
                    <span>My Store</span>
                </a>

                <a class="waves-effect waves-cyan" href="{{route('create_store')}}" data-i18n="">
                    <i class="material-icons">view_list</i>
                    <span>Create Store</span>
                </a>
            </li>
        </ul>
    </div>
</li>

<li class="bold">
    <a class="collapsible-header waves-effect waves-cyan " href="#">
        <i class="material-icons">speaker</i>
        <span class="menu-title" data-i18n="">Marketing Tools</span>
    </a>

    <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
            <li>
                <a class="waves-effect waves-cyan" href="#!" data-i18n="">
                    <i class="material-icons">view_list</i>
                    <span>Videos</span>
                </a>

                <a class="waves-effect waves-cyan" href="#!" data-i18n="">
                    <i class="material-icons">view_list</i>
                    <span>Images</span>
                </a>

                <a class="waves-effect waves-cyan" href="#!" data-i18n="">
                    <i class="material-icons">view_list</i>
                    <span>Links</span>
                </a>
            </li>
        </ul>
    </div>
</li>

<li class="active bold open">
    <a class=" waves-effect waves-cyan orange-text" href="{{route('dashboard')}}">
        <i class="material-icons deep-orange-text">dvr</i>
        <span class="menu-title" data-i18n="">Main Dashboard</span></a>
</li>

