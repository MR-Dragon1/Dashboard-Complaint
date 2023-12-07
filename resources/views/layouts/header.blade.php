<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="{{ route('index-mail') }}"><img class="main-logo" src="{{ asset('img/logo/logos.png') }}"
                    style="width: 100px; height:100px" alt="" /></a>
            <strong><img src="{{ asset('img/logo/logos.png') }}" alt=""
                    style="width: 60px; height:60px; margin:10px" /></strong>
            <div style="text-align: center; font-weight:bold;letter-spacing:1px;box-shadow:none;border:none; font-size:19px; color:#d9efff; font-family:Kaushan Script; margin-top:-10px"
                class="main-logo">Complaint 's
            </div>
            <strong>
                <div></div>
            </strong>

        </div>
        <hr class="sep-2" />
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    <li>
                        <a @if (request()->is('home')) class="actives" @endif href="{{ route('index-mail') }}"
                            aria-expanded="false"><i class="fa-solid fa-house icon-head"></i><span
                                class="mini-click-non">Dashboard</span></a>
                        @if (Auth::check() && Auth::user()->roles == 2)
                            <a @if (request()->is('infomatic')) class="actives" @endif
                                href="{{ route('index-informatics') }}" aria-expanded="false"><i
                                    class="fa-regular fa-envelope icon-head-1"></i><span
                                    class="mini-click-non">Complaint
                                    Lists
                                    IT</span></a>
                        @endif
                    </li>
                    <li>
                        <a @if (request()->is('message')) class="actives" @endif href="{{ route('index-message') }}"
                            aria-expanded="false"><i class="fa-regular fa-bell icon-head"></i> <span
                                class="mini-click-non">Notifications</span></a>
                    </li>
                    <li class="">
                        <a @if (request()->is('spam')) class="actives" @endif href="{{ route('index-spam') }}">
                            <i class="fa-solid fa-file-circle-exclamation icon-head-2"></i>
                            <span class="mini-click-non">File Spam</span>
                        </a>
                    </li>
                    @if (Auth::check() && Auth::user()->roles == 2)
                        <li class="">
                            <a @if (request()->is('log-activity')) class="actives" @endif href="{{ route('index-log') }}">
                                <i class="fa-solid fa-layer-group icon-head-2"></i>
                                <span class="mini-click-non">Log Activity's</span>
                            </a>
                        </li>
                        <li class="">
                            <a @if (request()->is('users')) class="actives" @endif
                                href="{{ route('index-user') }}">
                                <i class="fa-solid fa-user-group icon-head-3"></i>
                                <span class="mini-click-non">Users</span>
                            </a>
                        </li>
                        <li class="">
                            <a @if (request()->is('codes')) class="actives" @endif
                                href="{{ route('index-code') }}">
                                <i class="fa-solid fa-list-ul icon-head-4"></i>
                                <span class="mini-click-non">Code Agent</span>
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
                                        <button style="background-color:white" type="button" id="sidebarCollapse"
                                            class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn"
                                            disabled>
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
                                                    <div class="dropdown" style="float:right;">
                                                        <span class="admin-name"> {{ Auth::user()->name }} <i
                                                                class="fa-solid fa-caret-down"></i></span>


                                                        <div class="dropdown-content">
                                                            <a href="{{ route('logout') }}"
                                                                onclick="event.preventDefault();
                                                                        document.getElementById('logout-form').submit();"
                                                                style="padding: 14px 7px">
                                                                <div style="cursor:context-menu; letter-spacing:1px">
                                                                    {{ Auth::user()->email }}
                                                                </div>
                                                                <hr>

                                                                <i class="fa-solid fa-right-from-bracket"></i>
                                                                Log out
                                                            </a>
                                                            <form id="logout-form" action="{{ route('logout') }}"
                                                                method="POST" class="d-none">
                                                                @csrf
                                                            </form>
                                                        </div>
                                                    </div>
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
