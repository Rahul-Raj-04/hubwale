<!-- app-Header -->
<div class="hor-header header">
    <div class="container main-container">
        <div class="d-flex">
            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar"
                href="javascript:void(0)"></a>
            <!-- sidebar-toggle-->
            <a class="logo-horizontal " href="{{route('home')}}">
                <img src="{{ asset('img/new/blue-horizontal.png') }}" class="header-brand-img desktop-logo" alt="logo">
                <img src="{{ asset('img/new/blue-bg-small.png') }}" class="header-brand-img light-logo1" alt="logo" style="height:35px">
            </a>
            <!-- LOGO -->
            <div class="d-flex order-lg-2 ms-auto header-right-icons">
                <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                </button>
                <div class="navbar navbar-collapse responsive-navbar p-0">
                    <div class="collapse navbar-collapse bg-white px-0" id="navbarSupportedContent-4">
                        <!-- SEARCH -->
                        <div class="header-nav-right p-5 d-none">
                            <a href="{TODO}" class="btn ripple btn-min w-sm btn-outline-primary me-2 my-auto"
                                target="_blank">New User
                            </a>
                            <a href="{{route('login')}}" class="btn ripple btn-min w-sm btn-primary me-2 my-auto"
                                target="_blank">Login
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /app-Header -->

<div class="landing-top-header overflow-hidden">
    <div class="top sticky overflow-hidden">
        <!--APP-SIDEBAR-->
        <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
        <div class="app-sidebar bg-transparent horizontal-main">
            <div class="container">
                <div class="row">
                    <div class="main-sidemenu navbar px-0">
                        <a class="navbar-brand ps-0 d-none d-lg-block" href="/">
                            <img alt="" class="logo-2" src="{{ asset('img/new/blue-horizontal.png') }}" style="height: 40px">
                            <img src="{{ asset('img/new/blue-horizontal.png') }}" class="logo-3" alt="logo" style="height: 40px">
                        </a>
                        <ul class="side-menu">
                            <li class="slide">
                                <a class="side-menu__item active" data-bs-toggle="slide" href="#home"><span
                                        class="side-menu__label">Home</span></a>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="#Features"><span
                                        class="side-menu__label">Features</span></a>
                            </li>
                            <li class="slide d-none">
                                <a class="side-menu__item" data-bs-toggle="slide" href="#Pricing">
                                    <span class="side-menu__label">Pricing</span>
                                </a>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="#Contact">
                                    <span class="side-menu__label">Contact</span>
                                </a>
                            </li>
                        </ul>
                        <div class="header-nav-right d-none">
                            {{-- d-lg-flex --}}
                            @auth
                                @if (request()->routeIs('main.dashboard'))
                                    <a href="{{route('logout')}}" class="btn ripple btn-min w-sm btn-outline me-2 my-auto d-lg-none d-xl-block d-block">Log Out</a>
                                @else
                                    <a href="{{route('logout')}}" class="btn ripple btn-min w-sm btn-outline me-2 my-auto d-lg-none d-xl-block d-block">Log Out</a>
                                    <a href="{{route('main.dashboard')}}"
                                        class="btn ripple btn-min w-sm btn-primary me-2 my-auto d-lg-none d-xl-block d-block">
                                        Go To Dashboard
                                    </a>
                                @endif
                            @else
                                <a href="{{route('login')}}"
                                    class="btn ripple btn-min w-sm btn-outline-primary me-2 my-auto d-lg-none d-xl-block d-block">
                                    Free Trial
                                </a>
                                <a href="{{route('login')}}" class="btn ripple btn-min w-sm btn-primary me-2 my-auto d-lg-none d-xl-block d-block">
                                    Login
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/APP-SIDEBAR-->
    </div>
</div>
