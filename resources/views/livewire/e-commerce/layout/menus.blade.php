<div class="main-sidemenu container">
    <div class="slide-left">
        <img src="{{ asset('img/new/blue-bg-small.png') }}" class="header-brand-img desktop-logo" alt="logo" style="width: 30px !important;" alt="logo">
    </div>
    <ul class="side-menu flex-nowrap" style="margin-right: 0px; margin-left: 0px;">
        <li class="slide">
            <a class="side-menu__item has-link {{ request()->routeIs('e-commerce.home') ? 'active' : '' }}" data-bs-toggle="slide" href="{{ route('e-commerce.home') }}">
                <span class="side-menu__label">Dashboard</span>
            </a> 
        </li>


        <!-- Transaction menu -->
        <li class="slide">
            <a class="side-menu__item has-link {{ request()->routeIs('e-commerce.product.index') ? 'active' : '' }}"
                data-bs-toggle="slide" href="{{ route('e-commerce.product.index') }}">
                <span class="side-menu__label">Product</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item has-link {{ request()->routeIs('e-commerce.category.index') ? 'active' : '' }}"
                data-bs-toggle="slide" href="{{ route('e-commerce.category.index') }}">
                <span class="side-menu__label">Category</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item has-link {{ request()->routeIs('e-commerce.brand.index') ? 'active' : '' }}"
                data-bs-toggle="slide" href="{{ route('e-commerce.brand.index') }}">
                <span class="side-menu__label">Brand</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item has-link {{ request()->routeIs('e-commerce.size.index') ? 'active' : '' }}"
                data-bs-toggle="slide" href="{{ route('e-commerce.size.index') }}">
                <span class="side-menu__label">Size</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item has-link {{ request()->routeIs('e-commerce.status.index') ? 'active' : '' }}"
                data-bs-toggle="slide" href="{{ route('e-commerce.status.index') }}">
                <span class="side-menu__label">Status</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item has-link {{ request()->routeIs('e-commerce.tax.index') ? 'active' : '' }}"
                data-bs-toggle="slide" href="{{ route('e-commerce.tax.index') }}">
                <span class="side-menu__label">Tax</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item has-link {{ request()->routeIs('e-commerce.permission.index') ? 'active' : '' }}"
                data-bs-toggle="slide" href="{{ route('e-commerce.permission.index') }}">
                <span class="side-menu__label">Permission</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item has-link {{ request()->routeIs('e-commerce.order.index') ? 'active' : '' }}"
                data-bs-toggle="slide" href="{{ route('e-commerce.order.index') }}">
                <span class="side-menu__label">Orders</span>
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
