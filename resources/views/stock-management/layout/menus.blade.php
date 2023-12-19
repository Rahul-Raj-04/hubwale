<div class="main-sidemenu">
    <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24"
            height="24" viewBox="0 0 24 24">
            <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
        </svg>
    </div>
    <ul class="side-menu mt-0 p-0">
        <li class="slide">
            <a class="side-menu__item has-link {{ request()->routeIs('main.dashboard') ? 'active' : ' ' }}"
                data-bs-toggle="slide" href="{{ route('main.dashboard') }}">
                <i class="side-menu__icon fas fa-columns"></i>
                <span class="side-menu__label">Dashboard</span>
            </a>
        </li>
        <li class="slide {{ request()->routeIs('stock-management.*') ? 'is-expanded' : '' }}">
            <a class="side-menu__item {{ request()->routeIs('stock-management.*') ? 'active' : '' }}" data-bs-toggle="slide" href="javascript:void(0)">
                <i class="side-menu__icon fa fa-pie-chart"></i>
                <span class="side-menu__label">Stock Management</span>
                <i class="angle fe fe-chevron-right"></i>
            </a>
            <ul class="slide-menu {{request()->routeIs('stock-management.*') ? 'open' : ''}}">
                <li>
                    <a class="side-menu__item has-link {{request()->routeIs('stock-management.home') ? 'active' : '' }}" data-bs-toggle="slide" href="{{ route('stock-management.home') }}">
                        <span class="side-menu__label">Home</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="slide">
            <a class="side-menu__item has-link {{ request()->routeIs('profile.*') ? 'active' : ' ' }}" data-bs-toggle="slide" href="{{ route('profile.index') }}"><i class="side-menu__icon far fa-user"></i><span class="side-menu__label">Profile</span></a>
        </li>
        <li class="slide">
            <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('logout') }}"><i class="side-menu__icon fa-solid fa-right-from-bracket"></i><span class="side-menu__label">Logout</span></a>
        </li>
        <div class="my-8" style="height: 20px"></div>
    </ul>

    <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24"
            height="24" viewBox="0 0 24 24">
            <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
        </svg></div>
</div>
