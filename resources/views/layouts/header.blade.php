<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="{{ route('index-mail') }}"><img class="main-logo" src="{{ asset('img/logo/logos.png') }}"
                    style="width: 100px; height:100px" alt="" /></a>
            <strong><img src="{{ asset('img/logo/logos.png') }}" alt=""
                    style="width: 60px; height:60px; margin:10px" /></strong>
            <div class="main-logo text-dash">Complaint 's
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
                    @endif
                    <li class="">
                        <a @if (request()->is('users')) class="actives" @endif href="{{ route('index-user') }}">
                            <i class="fa-solid fa-user-group icon-head-3"></i>
                            <span class="mini-click-non">Users</span>
                        </a>
                    </li>
                    <li class="">
                        <a @if (request()->is('codes')) class="actives" @endif href="{{ route('index-code') }}">
                            <i class="fa-solid fa-list-ul icon-head-4"></i>
                            <span class="mini-click-non">Code Agent</span>
                        </a>
                    </li>
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
                                                    <div class="admin-name">
                                                        {{ Auth::user()->name }} |
                                                        <form id="logout-form" action="{{ route('logout') }}"
                                                            method="POST" style="display: none;">
                                                            @csrf <!-- Tambahkan ini untuk melindungi dari serangan CSRF -->
                                                        </form>
                                                        <button class="Btn-log"
                                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                            <div class="sign" title="Log Out">
                                                                <svg viewBox="0 0 512 512">
                                                                    <path
                                                                        d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z">
                                                                    </path>
                                                                </svg>
                                                            </div>
                                                            <div class="text">Logout</div>
                                                        </button>
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
</div>
