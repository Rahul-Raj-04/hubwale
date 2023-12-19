
<!-- app-Header -->
<div class="app-header header sticky">
    <div class="container-fluid main-container">
        <div class="d-flex">
            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="javascript:void(0)"></a>
            <!-- sidebar-toggle-->
            <a class="logo-horizontal " href="index.html">
                <img src="{{ asset('img/new/blue-bg-small.png') }}" class="header-brand-img desktop-logo" alt="logo" style="height:20px;">
                <img src="{{ asset('img/new/blue-bg-small.png') }}" class="header-brand-img light-logo1 d-lg-none" style="height:20px;"
                    alt="logo">
            </a>
        </div>
    </div>
</div>
<!-- /app-Header -->
<div class="sticky" style="margin-bottom: -74px;">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar ps horizontal-main">
        <div class="side-header">
            <a class="header-brand1" href="{{route('home')}}">
                <img src="{{ asset('img/new/blue-bg-small.png') }}" class="header-brand-img desktop-logo" alt="logo"
                    style="width: 120px;">
                <img src="{{ asset('img/new/blue-bg-small.png') }}" class="header-brand-img toggle-logo" alt="logo">
                <img src="{{ asset('img/new/blue-bg-small.png') }}" class="header-brand-img light-logo" alt="logo">
                <img src="{{ asset('img/new/blue-bg-small.png') }}" class="header-brand-img light-logo1" style="width: 120px;"
                    alt="logo">
            </a>
        </div>
        @include('livewire.e-commerce.layout.menus')
    </div>
</div>