<div class="main-sidemenu container">
    <div class="slide-left">
        <img src="{{ asset('img/new/blue-bg-small.png') }}" class="header-brand-img desktop-logo" alt="logo" style="width: 30px !important;" alt="logo">
    </div>
    <ul class="side-menu flex-nowrap" style="margin-right: 0px; margin-left: 0px;">
        <li class="slide">
            <a class="side-menu__item has-link {{ request()->routeIs('e-commerce.home') ? 'active' : '' }}" data-bs-toggle="slide" href="{{ route('e-commerce.store.home') }}">
                <span class="side-menu__label">Dashboard</span>
            </a> 
        </li>

        <li class="slide">
            <a class="side-menu__item has-link {{ request()->routeIs('e-commerce.store.order') ? 'active' : '' }}"
                data-bs-toggle="slide" href="{{ route('e-commerce.store.order') }}">
                <span class="side-menu__label">My Orders</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item has-link {{ request()->routeIs('e-commerce.store.cart') ? 'active' : '' }}"
                data-bs-toggle="slide" href="{{ route('e-commerce.store.cart') }}">
                <span class="side-menu__label">View Cart</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                <span class="side-menu__label">Other</span>
                <i class="angle fe fe-chevron-right"></i>
            </a>
            <ul class="slide-menu">
                <li class="side-menu-label1">
                    <a href="javascript:void(0)">Other</a>
                </li>
                <li class="sub-slide">
                    <li>
                        <a class="sub-slide-item" href="{{ route('main.dashboard') }}">Main Dashboard</a>
                    </li>
                    <li>
                        <a class="sub-slide-item" href="{{ route('logout') }}">Log Out</a>
                    </li>
                </li>
            </ul>
        </li>
    </ul>
    <div class="slide-right d-none" id="slide-right">
        <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24"
            height="24" viewBox="0 0 24 24">
            <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
        </svg>
    </div>
</div>
<div class="ps__rail-x" style="left: 0px; bottom: 0px;">
    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
</div>
<div class="ps__rail-y" style="top: 0px; height: 56px; right: 0px;">
    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
</div>
