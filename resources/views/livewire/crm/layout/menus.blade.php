<div class="main-sidemenu">
    <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24"
            height="24" viewBox="0 0 24 24">
            <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
        </svg>
    </div>
    <ul class="side-menu mt-0 p-0">
        <li class="slide">
            <a class="side-menu__item has-link {{ request()->routeIs('main.dashboard') ? 'active' : ' ' }}"
                data-bs-toggle="slide" href="{{ route('crm.home') }}">
                <i class="side-menu__icon fas fa-columns"></i>
                <span class="side-menu__label">Dashboard</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item has-link" data-bs-toggle="slide" href="#">
                <i class="side-menu__icon fas fa-users"></i>
                <span class="side-menu__label">Teams</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item has-link" data-bs-toggle="slide" href="#">
                <i class="side-menu__icon fas fa-user-friends"></i>
                <span class="side-menu__label">Members</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item has-link" data-bs-toggle="slide" href="#">
                <i class="side-menu__icon fas fa-hands-helping"></i>
                <span class="side-menu__label">Leads</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item has-link" data-bs-toggle="slide" href="#">
                <i class="side-menu__icon fas fa-address-book"></i>
                <span class="side-menu__label">Contacts</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item has-link" data-bs-toggle="slide" href="#">
                <i class="side-menu__icon fas fa-globe"></i>
                <span class="side-menu__label">Organizations</span>
            </a>
        </li>
        <div class="my-8" style="height: 20px"></div>
    </ul>

    <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24"
            height="24" viewBox="0 0 24 24">
            <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
        </svg></div>
</div>
