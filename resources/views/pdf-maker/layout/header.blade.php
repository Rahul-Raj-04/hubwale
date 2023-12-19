<!-- app-Header -->
<div class="app-header header sticky py-0">
    <div class="container-fluid main-container">
        <div class="d-flex">
            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar"
                href="javascript:void(0)"></a>
            <!-- sidebar-toggle-->
            <a class="logo-horizontal " href="{{route('home')}}">
                <img src="{{ asset('img/new/blue-bg-small.png') }}" class="header-brand-img desktop-logo" alt="logo">
                <img src="{{ asset('img/new/blue-horizontal.png') }}" class="header-brand-img light-logo1"
                    style="width: 100px !important;" alt="logo">
            </a>
            <div class="d-flex order-lg-2 ms-auto header-right-icons">
                <!-- SEARCH -->
                <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                </button>
                <div class="navbar navbar-collapse responsive-navbar p-0">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                        <div class="d-flex order-lg-2">

                            {{-- theme change icon --}}
                            <div class="d-flex country">
                                <a class="nav-link icon theme-layout nav-link-bg layout-setting">
                                    <span class="dark-layout"><i class="fe fe-moon"></i></span>
                                    <span class="light-layout"><i class="fe fe-sun"></i></span>
                                </a>
                            </div>

                            {{-- full screen icon --}}
                            <div class="dropdown d-flex">
                                <a class="nav-link icon full-screen-link nav-link-bg">
                                    <i class="fe fe-minimize fullscreen-button"></i>
                                </a>
                            </div>

                            {{-- Application change icon icon --}}
                            <div class="dropdown d-flex profile-1">
                                <a href="javascript:void(0)" data-bs-toggle="dropdown"
                                    class="nav-link leading-none d-flex">
                                    <i class="fas fa-exchange-alt"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <div class="p-2">
                                        <p class="mb-0 p-0 text-center">Switch to</p>
                                        <div class="p-2 row">
                                            <a href="#" class="btn btn-primary mb-2">
                                                <div class="rounded text-center p-1">
                                                    <i class="fas fa-file-invoice-dollar fa-2x mb-4"></i>
                                                    <h5 class="mb-0">ERP</h5>
                                                </div>
                                            </a>
                                            <a href="#" class="btn btn-primary mb-2">
                                                <div class="rounded text-center p-1">
                                                    <i class="fas fa-box-open fa-2x mb-4"></i>
                                                    <h5 class="mb-0">Stock</h5>
                                                </div>
                                            </a>
                                            <a href="#" class="btn btn-primary mb-2">
                                                <div class="rounded text-center p-1">
                                                    <i class="fas fa-users fa-2x mb-4"></i>
                                                    <h5 class="mb-0">CRM</h5>
                                                </div>
                                            </a>
                                            <a href="#" class="btn btn-primary mb-2">
                                                <div class="rounded text-center p-1">
                                                    <i class="fas fa-magic fa-2x mb-4"></i>
                                                    <h5 class="mb-0">Festival Post</h5>
                                                </div>
                                            </a>
                                            <a href="#" class="btn btn-primary">
                                                <div class="rounded text-center p-1">
                                                    <i class="fas fa-file-pdf fa-2x mb-4"></i>
                                                    <h5 class="mb-0">PDF Maker</h5>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Profile icon --}}
                            <div class="dropdown d-flex profile-1">
                                <a href="javascript:void(0)" data-bs-toggle="dropdown"
                                    class="nav-link leading-none d-flex">
                                    <img src="{{ auth()->user()->image ? auth()->user()->image : Avatar::create(Auth::user()->name)->toBase64() }}"
                                        alt="profile-user" class="avatar  profile-user brround cover-image">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <a class="dropdown-item" href="{{route('profile.index')}}   ">
                                        <i class="dropdown-icon fe fe-user"></i> Profile
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}">
                                        <i class="dropdown-icon fa-solid fa-right-from-bracket"></i> Log out
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /app-Header -->

<!--APP-SIDEBAR-->
<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar" style="overflow-y: auto;">
        <div class="side-header" style="height: 50px">
            <a class="header-brand1" href="{{route('home')}}">
                <img src="{{ asset('img/new/blue-horizontal.png') }}" class="header-brand-img desktop-logo" alt="logo"
                    style="width: 120px;">
                <img src="{{ asset('img/new/blue-bg-small.png') }}" class="header-brand-img toggle-logo" alt="logo">
                <img src="{{ asset('img/new/blue-bg-small.png') }}" class="header-brand-img light-logo" alt="logo">
                <img src="{{ asset('img/new/blue-horizontal.png') }}" class="header-brand-img light-logo1"
                    style="width: 120px;" alt="logo">
            </a>
            <!-- LOGO -->
        </div>
        @include('pdf-maker.layout.menus')
    </div>
    <!--/APP-SIDEBAR-->
</div>