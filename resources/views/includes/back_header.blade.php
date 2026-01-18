<header class="page-topbar" id="header">

    <div class="navbar navbar-fixed">

        <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-dark no-shadow"
             style="background: #222!important;">

            <div class="nav-wrapper">

                <div class="header-search-wrapper hide-on-med-and-down"><i class="material-icons">search</i>
                    <input class="header-search-input z-depth-2" type="text" name="Search"
                           placeholder="Explore Your Account">
                </div>

                <ul class="navbar-list right">

                    <li class="">

                        {{--                        <a class="waves-effect waves-block waves-light translation-button" href="javascript:void(0);"--}}

                        {{--                           data-target="translation-dropdown" onclick="document.getElementById('logout').submit();">--}}

                        {{--                            <span class="fa fa-user-plus"></span>--}}

                        {{--                        </a>--}}

                    </li>

                    {{--                    <li class="hide-on-large-only">--}}

                    {{--                        <a class="waves-effect waves-block waves-light search-button"--}}

                    {{--                           href="javascript:void(0);">--}}

                    {{--                            <i--}}

                    {{--                                    class="material-icons">search</i>--}}

                    {{--                        </a>--}}

                    {{--                    </li>--}}

                    <li>

                        <a class="waves-effect waves-block waves-light notification-button" id="notifications_bell"
                           href="javascript:void(0);"

                           data-target="notifications-dropdown">

                            <i class="material-icons" style="color:#FBD12B;">notifications_none

                                <small class="notification-badge" id="notif_badge">0</small>

                            </i>

                        </a>

                    </li>

                    <li>

                        <a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);"

                           data-target="profile-dropdown">


                            @if(auth()->user()->image)
                                <span class="avatar-status avatar-online">

                                <img style="background-color: black"
                                     src="{{asset('public/upload/profile/thumb/'.auth()->user()->image)}}"

                                     alt="Profile">

                                <i></i>

                            </span>
                            @else
                                <span class="avatar-status avatar-online">

                                <img style="background-color: black"
                                     src="{{asset('public/upload/profile/thumb/avatar12.png')}}" alt="Profile">

                                <i></i>

                            </span>
                            @endif


                        </a>

                    </li>

                </ul>

                <!-- translation-button-->

                <ul class="dropdown-content" id="translation-dropdown">


                </ul>


                <!-- notifications-dropdown-->

                <ul class="dropdown-content" id="notifications-dropdown">


                </ul>

                <!-- profile-dropdown-->

                <ul class="dropdown-content" id="profile-dropdown">

                    <li>

                        <a class="grey-text text-darken-1" href="{{route('my_profile')}}"><i class="material-icons">person_outline</i>

                            Profile

                        </a>

                    </li>

                    <li>

                        <a class="grey-text text-darken-1" href="javascript:void(0);"><i class="material-icons">chat_bubble_outline</i>

                            Chat

                        </a>

                    </li>

                    <li>

                        <a class="grey-text text-darken-1" href="javascript:void(0);">

                            <i class="material-icons">help_outline</i> Help

                        </a>

                    </li>

                    <li class="divider"></li>

                    {{--<li>--}}

                    {{--<a class="grey-text text-darken-1" href="user-lock-screen.html"><i class="material-icons">lock_outline</i>--}}

                    {{--Lock--}}

                    {{--</a>--}}

                    {{--</li>--}}

                    <li>

                        <a class="grey-text text-darken-1 " onclick="document.getElementById('logout').submit();"><i

                                    class="material-icons">keyboard_tab</i> Logout</a>

                    </li>

                </ul>

                <form id="logout" action="{{route('logout')}}" style="visibility: hidden" method="post">@csrf</form>

            </div>

            <nav class="display-none search-sm">

                <div class="nav-wrapper">

                    <form>

                        <div class="input-field">

                            <input class="search-box-sm" type="search" required="">

                            <label class="label-icon" for="search"><i

                                        class="material-icons search-sm-icon">search</i></label><i

                                    class="material-icons search-sm-close">close</i>

                        </div>

                    </form>

                </div>

            </nav>

        </nav>

    </div>

</header>
