<li class="navigation-header"><a class="navigation-header-text">ADMINISTRATION</a><i
            class="navigation-header-icon material-icons">more_horiz</i>
</li>

<li class="bold">
    <a class="collapsible-header waves-effect waves-cyan " href="#">
        <i class="material-icons">dashboard</i>
        <span class="menu-title" data-i18n="">Support</span>
    </a>
    <div class="collapsible-body">

        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
            <li>
                <a class="collapsible-body" href="{{route('products')}}" data-i18n="">
                    <i class="material-icons">radio_button_unchecked</i>
                    <span>Products</span>
                </a>
            </li>
            <li>
                <a class="collapsible-body" href="{{route('categories')}}" data-i18n="">
                    <i class="material-icons">radio_button_unchecked</i>
                    <span>Categories</span>
                </a>
            </li>
            <li>
                <a class="collapsible-body" href="{{route('admin_messages')}}" data-i18n="">
                    <i class="material-icons">radio_button_unchecked</i>
                    <span>Messages</span>
                </a>
            </li>
        </ul>
    </div>
</li>