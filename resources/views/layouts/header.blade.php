<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="{{ route('index-mail') }}"><img class="main-logo" src="{{ asset('img/logo/logos.png') }}"
                    style="width: 100px; height:100px" alt="" /></a>
            <strong><img src="{{ asset('img/logo/logos.png') }}" alt=""
                    style="width: 60px; height:60px; margin:10px" /></strong>
            <div style="text-align: center; font-weight:bold;letter-spacing:1px;box-shadow:none;border:none; font-size:19px; color:white; font-family:Kaushan Script"
                class="main-logo">Complaint 's
            </div>
            <strong>
                <div></div>
            </strong>

        </div>
        <hr>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    <li>
                        <a @if (request()->is('/')) class="active" @endif href="{{ route('index-mail') }}"
                            aria-expanded="false"><i class="fa-solid fa-house icon-head"></i><span
                                class="mini-click-non">Dashboard</span></a>
                        @if (Auth::check() && Auth::user()->roles == 2)
                            <a @if (request()->is('infomatic')) class="active" @endif
                                href="{{ route('index-informatics') }}" aria-expanded="false"><i
                                    class="fa-regular fa-envelope icon-head"></i><span class="mini-click-non">Complaint
                                    Lists
                                    IT</span></a>
                        @endif


                    </li>


                    <li>
                        <a @if (request()->is('announcements') || request()->is('add-announs')) class="active" @endif class="has-arrow" href=""
                            aria-expanded="false"><i class="fa-regular fa-bell icon-head"></i> <span
                                class="mini-click-non">Notifications</span></a>
                        <ul class="submenu-angle" style="margin-left: 20px" aria-expanded="false">
                            <li><a href="{{ route('index-announs') }}" title="View Mail" "><span
                                        class="mini-sub-pro">Message</span></a></li>

                                                   @if (Auth::check() && Auth::user()->roles == 1)
                            <li><a href="{{ route('add-announs') }}" title="View Mail" "><span class="mini-sub-pro">Add
                                        Message</span></a></li>
@elseif(Auth::check() && Auth::user()->roles == 2)
<li><a href="{{ route('add-announs') }}" title="View Mail" "><span class="mini-sub-pro">Add
                                        Message</span></a></li>
                            @endif
                        </ul>

                    </li>

                    <li>
                        <a @if (request()->is('sites')) class="active" @endif href="{{ route('index-sites') }}">
                            <i class="fa-solid fa-link icon-head-3"></i>
                            <span class="mini-click-non">Site Lists</span>
                        </a>
                    </li>
                    @if (Auth::check() && Auth::user()->roles == 2)
                        <li class="">
                            <a @if (request()->is('users')) class="active" @endif href="{{ route('index-user') }}">
                                <i class="fa-solid fa-user-group icon-head-3"></i>
                                <span class="mini-click-non">Users</span>
                            </a>
                        </li>
                    @endif

                </ul>
            </nav>
        </div>
    </nav>
</div>
<!-- Start Welcome area -->
<div class="all-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="logo-pro">
                    <a href=""><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                </div>
            </div>
        </div>
    </div>
    <div class="header-advance-area">
        <div class="header-top-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="header-top-wraper">
                            <div class="row">
                                <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                    <div class="menu-switcher-pro">
                                        <button type="button" id="sidebarCollapse"
                                            class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                            <i class="icon nalika-menu-task"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">

                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">

                                    @if (Auth::check() && Auth::user()->roles)
                                        <div class="header-right-info-admin-new">
                                    @endif
                                    <div class="header-right-info">
                                        <ul class="nav navbar-nav mai-top-nav header-right-menu">


                                            <li class="nav-item">

                                                @guest
                                                    @if (Route::has('login'))
                                                        <a class="" href="{{ route('login') }}"
                                                            style="margin-right:30px"><span
                                                                class="button-17">Login</span></a>
                                                    @endif
                                                @else
                                                    <a href="{{ route('index-mail') }}" data-toggle="dropdown"
                                                        role="button" aria-expanded="false"
                                                        class="nav-link dropdown-toggle">
                                                        <span class="admin-name"
                                                            style="">{{ Auth::user()->name }}</span>
                                                    </a>
                                                    <ul role="menu"
                                                        class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a href="{{ route('logout') }}"
                                                                onclick="event.preventDefault();
                                                                        document.getElementById('logout-form').submit();"><i
                                                                    class="fa-solid fa-lock-open icon-head-2"></i>
                                                                Log Out</a>

                                                            <form id="logout-form" action="{{ route('logout') }}"
                                                                method="POST" class="d-none">
                                                                @csrf
                                                            </form>
                                                        </li>
                                                    </ul>
                                                @endguest
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
