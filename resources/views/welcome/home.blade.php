@extends('welcome.app')
@section('content')
<div class="">
    <div class="demo-screen-headline main-demo main-demo-1 spacing-top overflow-hidden reveal" id="home">
        <div class="container px-sm-0">
            <div class="row">
                <div class="col-xl-6 col-lg-6 mb-5 pb-5 animation-zidex pos-relative">
                    <h4 class="fw-semibold mt-7">Manage Your Business</h4>
                    <h1 class="text-start fw-bold">We Help to Manage Your Business</h1>
                    <h6 class="pb-3">One place to manage all your business</h6>

                    {{-- <a href="#Pricing" class="btn ripple btn-min w-lg mb-3 me-2 btn-primary"><i
                            class="fe fe-eye me-2"></i>View Pricing --}}
                    </a>
                </div>
                <div class="col-xl-6 col-lg-6 my-auto">
                    <img src="{{asset('img/welcome/hero.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- ROW-1 OPEN -->
    <div class="section pb-0 d-none">
        <div class="container">
            <div class="row">
                <h4 class="text-center fw-semibold">Statistics</h4>
                <span class="landing-title"></span>
                <h2 class="text-center fw-semibold mb-7">Hubwale Statistics</h2>
            </div>
            <div class="row text-center services-statistics landing-statistics">
                <div class="col-xl-3 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-body bg-primary-transparent">
                            <div class="counter-status">
                                <div class="counter-icon bg-primary-transparent box-shadow-primary">
                                    <i class="fas fa-users text-primary fs-23"></i>
                                </div>
                                <div class="test-body text-center">
                                    <h1 class=" mb-0">
                                        <span class="counter fw-semibold counter ">100</span>k+
                                    </h1>
                                    <div class="counter-text">
                                        <h5 class="font-weight-normal mb-0 ">Total Clients</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-body bg-secondary-transparent">
                            <div class="counter-status">
                                <div class="counter-icon bg-secondary-transparent box-shadow-secondary">
                                    <i class="fas fa-building text-secondary fs-23"></i>
                                </div>
                                <div class="text-body text-center">
                                    <h1 class=" mb-0">
                                        <span class="counter fw-semibold counter ">120</span>k+
                                    </h1>
                                    <div class="counter-text">
                                        <h5 class="font-weight-normal mb-0 ">Companies
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-body bg-success-transparent">
                            <div class="counter-status">
                                <div class="counter-icon bg-success-transparent box-shadow-success">
                                    <i class="fas fa-star text-success fs-23"></i>
                                </div>
                                <div class="text-body text-center">
                                    <h1 class=" mb-0">
                                        <span class="counter fw-semibold counter ">20</span>k+
                                    </h1>
                                    <div class="counter-text">
                                        <h5 class="font-weight-normal mb-0 ">Clients Reviews</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-body bg-danger-transparent">
                            <div class="counter-status">
                                <div class="counter-icon bg-danger-transparent box-shadow-danger">
                                    <i class="fas fa-award text-primary fs-23"></i>
                                </div>
                                <div class="text-body text-center">
                                    <h1 class=" mb-0">
                                        <span class="counter fw-semibold counter ">100</span>+
                                    </h1>
                                    <div class="counter-text">
                                        <h5 class="font-weight-normal mb-0 ">Award Wins
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ROW-1 CLOSED -->

    <!-- ROW-2 OPEN -->
    <div class="sptb section bg-white" id="Features">
        <div class="container">
            <div class="row">
                <h4 class="text-center fw-semibold">Features</h4>
                <span class="landing-title"></span>
                <h2 class="fw-semibold text-center">Main Features</h2>
                <p class="text-default mb-5 text-center">The Sash admin template comes with
                    ready-to-use features that are completely easy-to-use for any user, even for
                    a beginner.</p>
                <div class="row mt-7">
                    <div class="col-lg-6 col-md-12">
                        <div class="card features main-features main-features-1 wow fadeInUp reveal revealleft"
                            data-wow-delay="0.1s">
                            <div class="bg-img mb-2 text-left">
                                <i class="fas fa-file-invoice-dollar fa-2x text-primary"></i>
                            </div>
                            <div class="text-left">
                                <h4 class="fw-bold">Billing</h4>
                                <p class="mb-0">Online billing and invoicing software that helps you create invoices, keep track of expenses and manage accounts.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="card  features main-features main-features-2 wow fadeInUp reveal revealleft"
                            data-wow-delay="0.1s">
                            <div class="bg-img mb-2 text-left">
                                <i class="fas fa-store fa-2x text-primary"></i>
                            </div>
                            <div class="text-left">
                                <h4 class="fw-bold">Stock Management</h4>
                                <p class="mb-0">A One-Stop Inventory Management Module With Comprehensive Tools And Features.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="card features main-features main-features-11 wow fadeInUp reveal revealleft"
                            data-wow-delay="0.1s">
                            <div class="bg-img mb-2 text-left">
                                <i class="fas fa-users fa-2x text-primary"></i>
                            </div>
                            <div class="text-left">
                                <h4 class="fw-bold">CRM</h4>
                                <p class="mb-0">Intelligent customer relationship management system with integrated billing and stock management system.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="card features main-features main-features-10 wow fadeInUp reveal revealleft"
                            data-wow-delay="0.1s">
                            <div class="bg-img mb-2 text-left">
                                <i class="fas fa-file-pdf fa-2x text-primary"></i>
                            </div>
                            <div class="text-left">
                                <h4 class="fw-bold">Smart PDF/Catalogue maker</h4>
                                <p class="mb-0">Simple PDF or Catalogue Maker from products.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="card features main-features main-features-9 wow fadeInUp reveal revealleft"
                            data-wow-delay="0.1s">
                            <div class="bg-img mb-2 text-left">
                                <i class="fa fa-sync fa-2x text-primary"></i>
                            </div>
                            <div class="text-left">
                                <h4 class="fw-bold">App Integration</h4>
                                <p class="mb-0">All tools are integrated to each other.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="card features main-features main-features-12 mb-4 wow fadeInUp reveal revealleft"
                            data-wow-delay="0.1s">
                            <div class="bg-img mb-2 text-left">
                                <i class="fas fa-info fa-2x text-primary"></i>
                            </div>
                            <div class="text-left">
                                <h4 class="fw-bold">More Features Are Comming Soon</h4>
                                <p class="mb-0">we are working hard to integrate more features</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ROW-2 CLOSED -->

    <!-- ROW-3 OPEN -->
    <div class="section bg-landing pb-0 bg-image-style d-none" id="About">
        <div class="container">
            <div class="row">
                <h4 class="text-center fw-semibold">Our Mission</h4>
                <span class="landing-title"></span>
                <div class="text-center">
                    <h2 class="text-center fw-semibold">Our mission is to make Business simple.</h2>
                </div>
                <div class="col-lg-12">
                    <div class="card bg-transparent">
                        <div class="card-body text-dark">
                            <div class="statistics-info">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 ps-0">
                                        <div class="text-center reveal revealleft mb-3">
                                            <img src="{{asset('img/welcome/overview-1.jpg') }}"
                                                alt="" class="br-5">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 pe-0 my-auto">

                                        <div class="ps-5 reveal revealright">
                                            <h2 class="text-start fw-semibold fs-25 mb-6">We area creative business solution expert.</h2>
                                            <div class="d-flex">
                                                <span>
                                                    <i class="fab fa-uikit"></i>
                                                </span>
                                                <div class="ms-5 mb-4">
                                                    <h5 class="fw-bold">User friendly interface</h5>
                                                    <p>Simple and User friendly interface to interact with your business tools.</p>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <span>
                                                    <i class="fas fa-exchange-alt"></i>
                                                </span>
                                                <div class="ms-5 mb-4">
                                                    <h5 class="fw-bold">Easy to switch</h5>
                                                    <p>You can easily switch from another business software</p>
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
        </div>
    </div>
    <!-- ROW-3 CLOSED -->

    <!-- ROW-4 OPEN -->
    <div class="section testimonial-owl-landing d-none">
        <div class="container">
            <div class="row">
                <div class="card bg-transparent mb-0">
                    <h4 class="text-center fw-semibold text-white">Features</h4>
                    <span class="landing-title"></span>
                    <div class="demo-screen-skin code-quality" id="dependencies">
                        <div class="text-center p-0">
                            <h2 class="text-center fw-semibold text-white">All Features</h2>
                            <div class="row justify-content-center">
                                <div class="col-lg-12 px-0">
                                    <div class="feature-logos mt-5">
                                        <div class="slide">
                                            <img src="{{asset('bundle/images/landing/web/1.png') }}">
                                            <h5 class="mt-3 text-white">Bootstrap5</h5>
                                        </div>
                                        <div class="slide">
                                            <img src="{{asset('bundle/images/landing/web/2.png') }}">
                                            <h5 class="mt-3 text-white">HTML5</h5>
                                        </div>
                                        <div class="slide">
                                            <img src="{{asset('bundle/images/landing/web/3.png') }}">
                                            <h5 class="mt-3 text-white">JQuery</h5>
                                        </div>
                                        <div class="slide">
                                            <img src="{{asset('bundle/images/landing/web/4.png') }}">
                                            <h5 class="mt-3 text-white">Sass</h5>
                                        </div>
                                        <div class="slide">
                                            <img src="{{asset('bundle/images/landing/web/5.png') }}">
                                            <h5 class="mt-3 text-white">Gulp</h5>
                                        </div>
                                        <div class="slide">
                                            <img src="{{asset('bundle/images/landing/web/6.png') }}">
                                            <h5 class="mt-3 text-white">NPM</h5>
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
    <!-- ROW-4 CLOSED -->

    <!-- ROW-5 OPEN -->
    <div class="section d-none">
        <div class="container">
            <div class="row">
                <section class="sptb demo-screen-demo" id="faqs">
                    <div class="container">
                        <div class="row align-items-center">
                            <h4 class="text-center fw-semibold">Highlights</h4>
                            <span class="landing-title"></span>
                            <h2 class="text-center fw-semibold">Template Highlights</h2>
                            <div class="col-lg-12">
                                <div class="row justify-content-center">
                                    <p class="col-lg-9 text-default sub-text mb-7">
                                        The Sash admin template is one of the modern dashboard
                                        templates.
                                        It is also a premium admin dashboard with high-end
                                        features, where users can easily customize
                                        or change their projects according to their choice.
                                        Please take a quick look at our template highlights.
                                    </p>
                                </div>
                                <div class="row" id="grid">
                                    <div class="col-lg-6">
                                        <div class="col-md-12 grid-item px-0">
                                            <div class="card card-collapsed bg-primary-transparent p-0 reveal">
                                                <div class="card-header grid-link" data-bs-toggle="card-collapse">
                                                    <a href="#"
                                                        class="card-options-collapse h5 fw-bold card-title mb-0 text-primary"><span
                                                            class="badge"><i
                                                                class="fe fe-chevron-up fs-15 me-3"></i></span>Switch
                                                        Easily From Vertical to Horizontal
                                                        Menu</a>
                                                </div>
                                                <div class="card-body pt-0">
                                                    <p>
                                                        The Sash – Bootstrap 5 Admin & Dashboard
                                                        Template is available in both vertical
                                                        and horizontal menus.
                                                        Both menus are managed by single assets.
                                                        Where users can easily switch from
                                                        vertical to horizontal menus.
                                                    </p>
                                                    <p class="mt-2 mb-3">
                                                        <span class="fw-bold">Note:
                                                        </span>Please Refer full Documentation
                                                        for more details.
                                                    </p>
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-outline-primary tx-13">Click
                                                        here</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 grid-item  px-0">
                                            <div class="card card-collapsed bg-success-transparent p-0 reveal">
                                                <div class="card-header grid-link" data-bs-toggle="card-collapse">
                                                    <a href="#"
                                                        class="card-options-collapse  h5 fw-bold card-title mb-0 text-success"><span
                                                            class="badge"><i
                                                                class="fe fe-chevron-up fs-15 me-3"></i></span>Switch
                                                        Easily From LTR to RTL Version</a>
                                                </div>
                                                <div class="card-body pt-0">
                                                    <p class="mb-3">
                                                        The Sash – Bootstrap 5 Admin & Dashboard
                                                        Template is available in LRT & RTL
                                                        versions with single assets.
                                                        Using those single assets, it’s very
                                                        easy to switch from one version to
                                                        another version.
                                                    </p>
                                                    <p class="mt-2 mb-3">
                                                        <span class="fw-bold">Note:
                                                        </span>Please Refer full Documentation
                                                        for more details.
                                                    </p>
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-outline-success tx-13">Click
                                                        here</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 grid-item  px-0">
                                            <div class="card card-collapsed bg-info-transparent p-0 reveal">
                                                <div class="card-header grid-link" data-bs-toggle="card-collapse">
                                                    <a href="#"
                                                        class="card-options-collapse  h5 fw-bold card-title mb-0 text-info"><span
                                                            class="badge"><i
                                                                class="fe fe-chevron-up fs-15 me-3"></i></span>Switch
                                                        Easily From One Color to Another Color
                                                        style</a>
                                                </div>
                                                <div class="card-body pt-0">
                                                    <p class="mb-3">
                                                        The Sash – Bootstrap 5 Admin & Dashboard
                                                        Template is available in different types
                                                        of color styles.
                                                        Where the users can change their
                                                        template completely with those color
                                                        styles.
                                                    </p>
                                                    <p class="mt-2 mb-3">
                                                        <span class="fw-bold">Note:
                                                        </span>Please Refer full Documentation
                                                        for more details.
                                                    </p>
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-outline-info tx-13">Click
                                                        here</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="col-md-12 grid-item  px-0">
                                            <div class="card card-collapsed bg-secondary-transparent p-0 reveal">
                                                <div class="card-header grid-link" data-bs-toggle="card-collapse">
                                                    <a href="#"
                                                        class="card-options-collapse  h5 fw-bold card-title mb-0 text-secondary"><span
                                                            class="badge"><i
                                                                class="fe fe-chevron-up fs-15 me-3"></i></span>Switch
                                                        Easily From Full Width to Boxed
                                                        Layout</a>
                                                </div>
                                                <div class="card-body pt-0">
                                                    <p>
                                                        The Sash – Bootstrap 5 Admin & Dashboard
                                                        Template is also available in two
                                                        different types of layouts
                                                        “Full Width” and “Boxed” Layouts. So
                                                        that user can switch their dashboard
                                                        from one layout to another
                                                        layout effortlessly.
                                                    </p>
                                                    <p class="mt-2 mb-3">
                                                        <span class="fw-bold">Note:
                                                        </span>Please Refer full Documentation
                                                        for more details.
                                                    </p>
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-outline-secondary tx-13">Click
                                                        here</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 grid-item  px-0">
                                            <div class="card card-collapsed bg-warning-transparent p-0 reveal">
                                                <div class="card-header grid-link" data-bs-toggle="card-collapse">
                                                    <a href="#"
                                                        class="card-options-collapse  h5 fw-bold card-title mb-0 text-warning"><span
                                                            class="badge"><i
                                                                class="fe fe-chevron-up fs-15 me-3"></i></span>Change
                                                        Easily Side Menu Styles</a>
                                                </div>
                                                <div class="card-body pt-0">
                                                    <p>
                                                        The Sash – Bootstrap 5 Admin & Dashboard
                                                        Template is also available in different
                                                        types of Side Menu Styles.
                                                        Where the users can change their Side
                                                        Menu styles by using single assets.
                                                    </p>
                                                    <p class="mt-2 mb-3">
                                                        <span class="fw-bold">Note:
                                                        </span>Please Refer full Documentation
                                                        for more details.
                                                    </p>
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-outline-warning tx-13">Click
                                                        here</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 grid-item  px-0">
                                            <div class="card card-collapsed bg-danger-transparent p-0 reveal">
                                                <div class="card-header grid-link" data-bs-toggle="card-collapse">
                                                    <a href="#"
                                                        class="card-options-collapse  h5 fw-bold card-title mb-0 text-danger"><span
                                                            class="badge"><i
                                                                class="fe fe-chevron-up fs-15 me-3"></i></span>
                                                        Easily From Fixed to Scrollable
                                                        Layout</a>
                                                </div>
                                                <div class="card-body pt-0">
                                                    <p>
                                                        The Sash – Bootstrap 5 Admin & Dashboard
                                                        Template is also available in two
                                                        different types of layouts "Fixed
                                                        Layout" and "Scrollable Layout". Here
                                                        users
                                                        can switch their Template from one
                                                        layout to another layout easily.
                                                    </p>
                                                    <p class="mt-2 mb-3">
                                                        <span class="fw-bold">Note:
                                                        </span>Please Refer full Documentation
                                                        for more details.
                                                    </p>
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-outline-danger tx-13">Click
                                                        here</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- ROW-5 CLOSED -->

    <!-- ROW-6 OPEN -->
    <div class="bg-landing section bg-image-style d-none" id="Pricing">
        <div class="container">
            <div class="row">
                <h4 class="text-center fw-semibold">Choose a plan </h4>
                <span class="landing-title"></span>
                <h2 class="text-center fw-semibold">Find the <span class="text-primary">Perfect
                        Plan</span> for your Business.</h2>
                <div class="pricing-tabs">
                    <div class="pri-tabs-heading text-center">
                        <ul class="nav nav-price">
                            <li><a data-bs-toggle="tab" href="#month">Monthly</a></li>
                            <li><a class="active show" data-bs-toggle="tab" href="#annualyear">Annual</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane pb-0 active show" id="annualyear">
                            <div class="row d-flex align-items-center justify-content-center">
                                @foreach ($plans as $plan)
                                    @if ($plan->status)
                                    <div class="col-lg-4 col-xl-4 col-md-8 col-sm-12">
                                        <div class="card p-3 pricing-card reveal revealrotate">
                                            <div class="card-header d-block text-justified pt-2">
                                                <p class="fs-18 fw-semibold mb-1">{{$plan->name}}</p>
                                                <p class="text-justify fw-semibold mb-1"> <span
                                                        class="fs-30 me-2">{{ $plan->country->currency }}</span><span class="fs-30 me-1">{{$plan->yearly_price}}</span><span
                                                        class="fs-25"><span class="op-0-5 text-muted text-20">/</span>
                                                        Year</span></p>
                                                <p class="fs-13 mb-1">{{$plan->description}}</p>
                                                <p class="fs-13 mb-1 text-secondary">Billed yearly
                                                    on regular basis!</p>
                                            </div>
                                            <div class="card-body pt-2">
                                                <ul class="text-justify pricing-body ps-0">
                                                    <li>
                                                        @if ($plan->festival_image)
                                                        <i class="mdi mdi-checkbox-marked-circle-outline p-2 fs-16 text-secondary"></i>
                                                        @else
                                                        <i class="mdi mdi-close-circle-outline p-2 fs-16 text-danger"></i>
                                                        @endif
                                                        <strong></strong>
                                                        Festival Image Package
                                                    </li>
                                                    @if ($plan->festival_image)
                                                    <li>
                                                        <i class="mdi mdi-checkbox-marked-circle-outline p-2 fs-16 text-secondary"></i>
                                                        <strong>{{$plan->fi_download_limit_yearly}} </strong>Festival Image Download Limit
                                                    </li>
                                                    <li class="{{$plan->fi_watermark ? 'text-muted' : ''}}">
                                                        @if ($plan->fi_watermark)
                                                            <i class="mdi mdi-close-circle-outline p-2 fs-16 text-danger"></i>
                                                        @else
                                                            <i class="mdi mdi-checkbox-marked-circle-outline p-2 fs-16 text-secondary"></i>
                                                        @endif
                                                        <strong></strong> Watermark free image
                                                    </li>
                                                    <li class="{{$plan->fi_ad ? 'text-muted' : ''}}">
                                                        @if ($plan->fi_ad)
                                                            <i class="mdi mdi-close-circle-outline p-2 fs-16 text-danger"></i>
                                                        @else
                                                            <i class="mdi mdi-checkbox-marked-circle-outline p-2 fs-16 text-secondary"></i>
                                                        @endif
                                                        <strong></strong> Ad Free Interface
                                                    </li>
                                                    @endif
                                                    <li>
                                                        @if ($plan->erp)
                                                        <i class="mdi mdi-checkbox-marked-circle-outline p-2 fs-16 text-secondary"></i>
                                                        @else
                                                        <i class="mdi mdi-close-circle-outline p-2 fs-16 text-danger"></i>
                                                        @endif
                                                        <strong></strong>
                                                        ERP Package
                                                    </li>
                                                    <li>
                                                        @if ($plan->pdf_maker)
                                                        <i class="mdi mdi-checkbox-marked-circle-outline p-2 fs-16 text-secondary"></i>
                                                        @else
                                                        <i class="mdi mdi-close-circle-outline p-2 fs-16 text-danger"></i>
                                                        @endif
                                                        <strong></strong>
                                                        PDF Maker Package
                                                    </li>
                                                    <li>
                                                        @if ($plan->stock_management)
                                                        <i class="mdi mdi-checkbox-marked-circle-outline p-2 fs-16 text-secondary"></i>
                                                        @else
                                                        <i class="mdi mdi-close-circle-outline p-2 fs-16 text-danger"></i>
                                                        @endif
                                                        <strong></strong>
                                                        Stock Management Package
                                                    </li>
                                                    <li>
                                                        @if ($plan->e_commerce)
                                                        <i class="mdi mdi-checkbox-marked-circle-outline p-2 fs-16 text-secondary"></i>
                                                        @else
                                                        <i class="mdi mdi-close-circle-outline p-2 fs-16 text-danger"></i>
                                                        @endif
                                                        <strong></strong>
                                                        E Commerce Package
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="card-footer text-center border-top-0 pt-1">
                                                <a href="{{route('checkout', [$plan->id, hash('md5', $plan->name)])}}" class="btn btn-lg btn-outline-secondary btn-block">
                                                    <span class="ms-4 me-4">Checkout</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane" id="month">
                            <div class="row d-flex align-items-center justify-content-center">
                                @foreach ($plans as $plan)
                                @if ($plan->status)
                                    <div class="col-lg-4 col-xl-4 col-md-8 col-sm-12">
                                        <div class="card p-3 pricing-card reveal revealrotate">
                                            <div class="card-header d-block text-justified pt-2">
                                                <p class="fs-18 fw-semibold mb-1">{{$plan->name}}</p>
                                                <p class="text-justify fw-semibold mb-1"> <span class="fs-30 me-2">{{ $plan->country->currency }}</span><span
                                                        class="fs-30 me-1">{{$plan->monthly_price}}</span><span class="fs-25"><span
                                                            class="op-0-5 text-muted text-20">/</span>
                                                        Month</span></p>
                                                <p class="fs-13 mb-1">{{$plan->description}}</p>
                                                <p class="fs-13 mb-1 text-secondary">Billed monthly
                                                    on regular basis!</p>
                                            </div>
                                            <div class="card-body pt-2">
                                                <ul class="text-justify pricing-body ps-0">
                                                    <li>
                                                        @if ($plan->festival_image)
                                                        <i class="mdi mdi-checkbox-marked-circle-outline p-2 fs-16 text-secondary"></i>
                                                        @else
                                                        <i class="mdi mdi-close-circle-outline p-2 fs-16 text-danger"></i>
                                                        @endif
                                                        <strong></strong>
                                                        Festival Image Package
                                                    </li>
                                                    @if ($plan->festival_image)
                                                    <li>
                                                        <i class="mdi mdi-checkbox-marked-circle-outline p-2 fs-16 text-secondary"></i>
                                                        <strong>{{$plan->fi_download_limit_monthly}} </strong>Festival Image Download Limit
                                                    </li>
                                                    <li class="{{$plan->fi_watermark ? 'text-muted' : ''}}">
                                                        @if ($plan->fi_watermark)
                                                        <i class="mdi mdi-close-circle-outline p-2 fs-16 text-danger"></i>
                                                        @else
                                                        <i class="mdi mdi-checkbox-marked-circle-outline p-2 fs-16 text-secondary"></i>
                                                        @endif
                                                        <strong></strong> Watermark free image
                                                    </li>
                                                    <li class="{{$plan->fi_ad ? 'text-muted' : ''}}">
                                                        @if ($plan->fi_ad)
                                                        <i class="mdi mdi-close-circle-outline p-2 fs-16 text-danger"></i>
                                                        @else
                                                        <i class="mdi mdi-checkbox-marked-circle-outline p-2 fs-16 text-secondary"></i>
                                                        @endif
                                                        <strong></strong> Ad Free Interface
                                                    </li>
                                                    @endif
                                                    <li>
                                                        @if ($plan->erp)
                                                        <i class="mdi mdi-checkbox-marked-circle-outline p-2 fs-16 text-secondary"></i>
                                                        @else
                                                        <i class="mdi mdi-close-circle-outline p-2 fs-16 text-danger"></i>
                                                        @endif
                                                        <strong></strong>
                                                        ERP Package
                                                    </li>
                                                    <li>
                                                        @if ($plan->pdf_maker)
                                                        <i class="mdi mdi-checkbox-marked-circle-outline p-2 fs-16 text-secondary"></i>
                                                        @else
                                                        <i class="mdi mdi-close-circle-outline p-2 fs-16 text-danger"></i>
                                                        @endif
                                                        <strong></strong>
                                                        PDF Maker Package
                                                    </li>
                                                    <li>
                                                        @if ($plan->stock_management)
                                                        <i class="mdi mdi-checkbox-marked-circle-outline p-2 fs-16 text-secondary"></i>
                                                        @else
                                                        <i class="mdi mdi-close-circle-outline p-2 fs-16 text-danger"></i>
                                                        @endif
                                                        <strong></strong>
                                                        Stock Management Package
                                                    </li>
                                                    <li>
                                                        @if ($plan->e_commerce)
                                                        <i class="mdi mdi-checkbox-marked-circle-outline p-2 fs-16 text-secondary"></i>
                                                        @else
                                                        <i class="mdi mdi-close-circle-outline p-2 fs-16 text-danger"></i>
                                                        @endif
                                                        <strong></strong>
                                                        E Commerce Package
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="card-footer text-center border-top-0 pt-1">
                                                <a href="{{route('checkout', [$plan->id, hash('md5', $plan->name)])}}"
                                                    class="btn btn-lg btn-outline-secondary btn-block">
                                                    <span class="ms-4 me-4">Checkout</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ROW-6 CLOSED -->

    <!-- ROW-7 OPEN -->
    <div class="section d-none" id="Faqs">
        <div class="container">
            <div class="row">
                <h4 class="text-center fw-semibold">FAQ'S ?</h4>
                <span class="landing-title"></span>
                <h2 class="text-center fw-semibold">We are here to help you</h2>
                <div class="row justify-content-center">
                    <p class="col-xl-9 wow fadeInUp text-default sub-text mb-7" data-wow-delay="0s">
                        The Sash admin template is one of the modern dashboard templates.
                        It is also a premium admin dashboard with high-end features, where users
                        can easily customize
                        or change their projects according to their choice.
                    </p>
                </div>
                <section class="sptb demo-screen-demo" id="faqs">
                    <div class="row align-items-center">
                        <div class="col-md-12 col-lg-6">
                            <div class="col-md-12 grid-item  px-0">
                                <div class="card card-collapsed bg-primary-transparent p-0 reveal">
                                    <div class="card-header grid-link" data-bs-toggle="card-collapse">
                                        <a href="#" class="card-options-collapse h5 fw-bold card-title mb-0"><span
                                                class="me-3 fs-18 fw-bold text-primary">01.</span>Can
                                            i get a free trial before purchase ?</a>
                                    </div>
                                    <div class="card-body pt-0">
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing
                                            elit. Iure quos debitis aliquam .
                                        </p>
                                        <p class="mt-2 mb-3">
                                            <span class="fw-bold">Note: </span>Please Refer
                                            support section for more information.
                                        </p>
                                        <a href="javascript:void(0)" class="btn btn-outline-primary tx-13">Click
                                            here</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 grid-item  px-0">
                                <div class="card card-collapsed bg-success-transparent p-0 reveal">
                                    <div class="card-header grid-link" data-bs-toggle="card-collapse">
                                        <a href="#" class="card-options-collapse  h5 fw-bold card-title mb-0"><span
                                                class="me-3 fs-18 fw-bold text-success">02.</span>What
                                            type of files i will get after purchase ?</a>
                                    </div>
                                    <div class="card-body pt-0">
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing
                                            elit. Iure quos debitis aliquam.
                                        </p>
                                        <p class="mt-2 mb-3">
                                            <span class="fw-bold">Note: </span>Please Refer
                                            support section for more information.
                                        </p>
                                        <a href="javascript:void(0)" class="btn btn-outline-success tx-13">Click
                                            here</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 grid-item  px-0">
                                <div class="card card-collapsed bg-secondary-transparent p-0 reveal">
                                    <div class="card-header grid-link" data-bs-toggle="card-collapse">
                                        <a href="#" class="card-options-collapse  h5 fw-bold card-title mb-0"><span
                                                class="me-3 fs-18 fw-bold text-secondary">03.</span>What
                                            is a single Application</a>
                                    </div>
                                    <div class="card-body pt-0">
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing
                                            elit. Iure quos debitis aliquam.
                                        </p>
                                        <p class="mt-2 mb-3">
                                            <span class="fw-bold">Note: </span>Please Refer
                                            support section for more information.
                                        </p>
                                        <a href="javascript:void(0)" class="btn btn-outline-secondary tx-13">Click
                                            here</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 grid-item  px-0">
                                <div class="card card-collapsed bg-warning-transparent p-0 reveal">
                                    <div class="card-header grid-link" data-bs-toggle="card-collapse">
                                        <a href="#" class="card-options-collapse  h5 fw-bold card-title mb-0"><span
                                                class="me-3 fs-18 fw-bold text-warning">04.</span>How
                                            to get future updates ?</a>
                                    </div>
                                    <div class="card-body pt-0">
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing
                                            elit. Iure quos debitis aliquam.
                                        </p>
                                        <p class="mt-2 mb-3">
                                            <span class="fw-bold">Note: </span>Please Refer
                                            support section for more information.
                                        </p>
                                        <a href="javascript:void(0)" class="btn btn-outline-warning tx-13">Click
                                            here</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 grid-item  px-0">
                                <div class="card card-collapsed bg-danger-transparent p-0 reveal">
                                    <div class="card-header grid-link" data-bs-toggle="card-collapse">
                                        <a href="#" class="card-options-collapse  h5 fw-bold card-title mb-0"><span
                                                class="me-3 fs-18 fw-bold text-danger">05.</span>Do
                                            you provide support ?</a>
                                    </div>
                                    <div class="card-body pt-0">
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing
                                            elit. Iure quos debitis aliquam.
                                        </p>
                                        <p class="mt-2 mb-3">
                                            <span class="fw-bold">Note: </span>Please Refer
                                            support section for more information.
                                        </p>
                                        <a href="javascript:void(0)" class="btn btn-outline-danger tx-13">Click here</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 reveal revealright">
                            <img src="{{asset('bundle/images/landing/frequently-asked-questions.png') }}" alt="">
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- ROW-7 CLOSED -->

    <!-- ROW-8 OPEN -->
    <div class="section bg-landing d-none" id="Blog">
        <div class="container">
            <div class="row">
                <h4 class="text-center fw-semibold">Blog Posts </h4>
                <span class="landing-title"></span>
                <h2 class="text-center fw-semibold mb-7">Latest from Blog.</h2>
                <div class="col-lg-6">
                    <div class="card bg-transparent reveal">
                        <div class="card-body px-1">
                            <div class="d-flex overflow-visible">
                                <a href="blog-details.html" class="card-aside-column br-5 cover-image"
                                    data-bs-image-src="{{asset('bundle/images/media/12.jpg') }}"
                                    style="background: url({{asset('bundle/images/media/12.jpg')}}) center center;"></a>
                                <div class="ps-3 flex-column">
                                    <span class="badge bg-primary me-1 mb-1 mt-1">Business</span>
                                    <h3><a href="blog-details.html">Voluptatem quia
                                            voluptas...</a></h3>
                                    <div class="">Excepteur sint occaecat cupidatat non
                                        proident, accusantium sunt in culpa qui officia deserunt
                                        mollit anim id est laborum....</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card bg-transparent reveal">
                        <div class="card-body px-1">
                            <div class="d-flex overflow-visible">
                                <a href="blog-details.html" class="card-aside-column br-5 cover-image"
                                    data-bs-image-src="{{asset('bundle/images/media/22.jpg') }}"
                                    style="background: url({{asset('bundle/images/media/22.jpg') }}) center center;"></a>
                                <div class="ps-3 flex-column">
                                    <span class="badge bg-danger me-1 mb-1 mt-1">Lifestyle</span>
                                    <h3><a href="blog-details.html">Generator on the
                                            Internet..</a></h3>
                                    <div class="">Excepteur sint occaecat cupidatat non
                                        proident, accusantium sunt in culpa qui officia deserunt
                                        mollit anim id est laborum....</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- COL-END -->
                </div>
                <div class="col-lg-6">
                    <div class="card bg-transparent reveal">
                        <div class="card-body px-1">
                            <div class="d-flex overflow-visible">
                                <a href="blog-details.html" class="card-aside-column br-5 cover-image"
                                    data-bs-image-src="{{asset('bundle/images/media/about.jpg') }}"
                                    style="background: url({{asset('bundle/images/media/about.jpg') }}) center center;"></a>
                                <div class="ps-3 flex-column">
                                    <span class="badge bg-secondary me-1 mb-1 mt-1">Travel</span>
                                    <h3><a href="blog-details.html">Generator on the
                                            Internet..</a></h3>
                                    <div class="">Excepteur sint occaecat cupidatat non
                                        proident, accusantium sunt in culpa qui officia deserunt
                                        mollit anim id est laborum....</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- COL-END -->
                </div>
                <div class="col-lg-6">
                    <div class="card bg-transparent reveal">
                        <div class="card-body px-1">
                            <div class="d-flex overflow-visible">
                                <a href="blog-details.html" class="card-aside-column br-5 cover-image"
                                    data-bs-image-src="{{asset('bundle/images/media/25.jpg') }}"
                                    style="background: url({{asset('bundle/images/media/25.jpg') }}) center center;"></a>
                                <div class="ps-3 flex-column">
                                    <span class="badge bg-success me-1 mb-1 mt-1">Meeting</span>
                                    <h3><a href="blog-details.html">Voluptatem quia
                                            voluptas...</a></h3>
                                    <div class="">Excepteur sint occaecat cupidatat non
                                        proident, accusantium sunt in culpa qui officia deserunt
                                        mollit anim id est laborum....</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- COL-END -->
                </div>
                <div class="text-center">
                    <a href="blog.html" target="_blank" class="btn btn-outline-primary pt-2 pb-2"><i
                            class="fe fe-arrow-right me-2"></i>Discover More
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- ROW-8 CLOSED -->

    <!-- ROW-9 OPEN -->
    <div class="testimonial-owl-landing section pb-0 d-none" id="Clients">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card bg-transparent">
                        <div class="card-body pt-5">
                            <h4 class="text-center fw-semibold text-white-80">Testimonials </h4>
                            <span class="landing-title"></span>
                            <h2 class="text-center fw-semibold text-white mb-7">What People Are
                                Saying About Our Product.</h2>
                            <div class="testimonial-carousel">
                                <div class="slide text-center">
                                    <div class="row">
                                        <div class="col-xl-8 col-md-12 d-block mx-auto">
                                            <div class="testimonia">
                                                <p class="text-white-80">
                                                    <i class="fa fa-quote-left fs-20 text-white-80"></i>
                                                    Lorem ipsum dolor sit amet,
                                                    consectetur adipisicing elit. Quod eos id
                                                    officiis hic tenetur quae quaerat
                                                    ad velit ab. Lorem ipsum dolor sit amet,
                                                    consectetur adipisicing elit.
                                                    Dolore cum accusamus eveniet molestias
                                                    voluptatum inventore laboriosam
                                                    labore sit, aspernatur praesentium iste
                                                    impedit quidem dolor veniam.
                                                </p>
                                                <h3 class="title">Elizabeth</h3>
                                                <span class="post">Web Developer</span>
                                                <div class="rating-stars block my-rating-5 mb-5" data-rating="4"></div>
                                                <div class="owl-controls clickable">
                                                    <div class="owl-pagination">
                                                        <div class="owl-page active">
                                                            <span class=""></span>
                                                        </div>
                                                        <div class="owl-page ">
                                                            <span class=""></span>
                                                        </div>
                                                        <div class="owl-page">
                                                            <span class=""></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide text-center">
                                    <div class="row">
                                        <div class="col-xl-8 col-md-12 d-block mx-auto">
                                            <div class="testimonia">
                                                <p class="text-white-80"><i class="fa fa-quote-left fs-20"></i> Nemo
                                                    enim ipsam
                                                    voluptatem quia voluptas sit aspernatur aut
                                                    odit aut fugit, sed quia
                                                    consequuntur magni dolores eos qui ratione
                                                    voluptatem sequi nesciunt. Neque
                                                    porro quisquam est, qui dolorem ipsum quia
                                                    dolor sit amet, consectetur,
                                                    adipisci velit, sed quia non numquam eius
                                                    modi tempora incidunt ut labore.
                                                </p>
                                                <div class="testimonia-data">
                                                    <h3 class="title">williamson</h3>
                                                    <span class="post">Web Developer</span>
                                                    <div class="rating-stars">
                                                        <div class="rating-stars block my-rating-5 mb-5"
                                                            data-rating="5"></div>
                                                        <div class="owl-controls clickable">
                                                            <div class="owl-pagination">
                                                                <div class="owl-page ">
                                                                    <span class=""></span>
                                                                </div>
                                                                <div class="owl-page active">
                                                                    <span class=""></span>
                                                                </div>
                                                                <div class="owl-page">
                                                                    <span class=""></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide text-center">
                                    <div class="row">
                                        <div class="col-xl-8 col-md-12 d-block mx-auto">
                                            <div class="testimonia">
                                                <p class="text-white-80"><i class="fa fa-quote-left fs-20"></i> Duis
                                                    aute irure dolor
                                                    in reprehenderit in voluptate velit esse
                                                    cillum dolore eu fugiat nulla
                                                    pariatur. Excepteur sint occaecat cupidatat
                                                    non proident, sunt in culpa qui
                                                    officia deserunt mollit anim id est laborum.
                                                    Sed ut perspiciatis unde omnis
                                                    iste natus error sit voluptatem accusantium
                                                    doloremque laudantium.</p>
                                                <div class="testimonia-data">
                                                    <h3 class="title">Sophie Carr</h3>
                                                    <span class="post">Web Developer</span>
                                                    <div class="rating-stars">
                                                        <div class="rating-stars block my-rating-5 mb-5"
                                                            data-rating="5"></div>
                                                        <div class="owl-controls clickable">
                                                            <div class="owl-pagination">
                                                                <div class="owl-page ">
                                                                    <span class=""></span>
                                                                </div>
                                                                <div class="owl-page">
                                                                    <span class=""></span>
                                                                </div>
                                                                <div class="owl-page active">
                                                                    <span class=""></span>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ROW-9 CLOSED -->

    <!-- ROW-10 OPEN -->
    <div class="bg-image-landing section pb-0" id="Contact">
        <div class="container">
            <div class="">
                <div class="card card-shadow reveal">
                    <h4 class="text-center fw-semibold mt-7">Contact</h4>
                    <span class="landing-title"></span>
                    <h2 class="text-center fw-semibold mb-0 px-2">Get in Touch with <span
                            class="text-primary">US.</span></h2>
                    <div class="card-body p-5 pb-6 text-dark">
                        <div class="statistics-info p-4">
                            <div class="row justify-content-center">
                                <div class="col-lg-9">
                                    <div class="mt-3">
                                        <div class="text-dark">
                                            <div class="services-statistics reveal my-5">
                                                <div class="row text-center">
                                                    <div class="col-xl-3 col-md-6 col-lg-6">
                                                        <div class="card">
                                                            <div class="card-body p-0">
                                                                <div class="counter-status">
                                                                    <div
                                                                        class="counter-icon bg-primary-transparent box-shadow-primary">
                                                                        <i class="fe fe-map-pin text-primary fs-23"></i>
                                                                    </div>
                                                                    <h4 class="mb-2 fw-semibold">
                                                                        Main Branch</h4>
                                                                    <p>Gujarat, India </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-md-6 col-lg-6">
                                                        <div class="card">
                                                            <div class="card-body p-0">
                                                                <div class="counter-status">
                                                                    <div
                                                                        class="counter-icon bg-secondary-transparent box-shadow-secondary">
                                                                        <i
                                                                            class="fe fe-headphones text-secondary fs-23"></i>
                                                                    </div>
                                                                    <h4 class="mb-2 fw-semibold">
                                                                         Email</h4>
                                                                    {{-- <p class="mb-0">+125 254
                                                                        3562 </p> --}}
                                                                    <p>contact@hubwale.com</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-md-6 col-lg-6">
                                                        <div class="card">
                                                            <div class="card-body p-0">
                                                                <div class="counter-statuss">
                                                                    <div
                                                                        class="counter-icon bg-success-transparent box-shadow-success">
                                                                        <i class="fe fe-mail text-success fs-23"></i>
                                                                    </div>
                                                                    <h4 class="mb-2 fw-semibold">
                                                                        Contact</h4>
                                                                    <p class="mb-0">
                                                                        www.hubwale.com</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-md-6 col-lg-6">
                                                        <div class="card">
                                                            <div class="card-body p-0">
                                                                <div class="counter-status">
                                                                    <div
                                                                        class="counter-icon bg-danger-transparent box-shadow-danger">
                                                                        <i class="fe fe-airplay text-danger fs-23"></i>
                                                                    </div>
                                                                    <h4 class="mb-2 fw-semibold">
                                                                        Working Hours</h4>
                                                                    <p class="mb-0">Monday -
                                                                        Friday: 9am - 6pm</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-9">
                                    <div class="">
                                        <form class="form-horizontal reveal revealrotate m-t-20" action="index.html">
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <input class="form-control" type="text" required=""
                                                        placeholder="Username*">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <input class="form-control" type="email" required=""
                                                        placeholder="Email*">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <textarea class="form-control" rows="5">Your Comment*</textarea>
                                                </div>
                                            </div>
                                            <div class="">
                                                <a href="javascript:void(0)"
                                                    class="btn btn-primary btn-rounded  waves-effect waves-light">Submit</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ROW-10 CLOSED -->

    <!-- ROW-11 OPEN -->
    <div class="d-none">
        <div class="container">
            <div class="testimonial-owl-landing buynow-landing reveal revealrotate">
                <div class="row pt-6">
                    <div class="col-md-12">
                        <div class="card bg-transparent">
                            <div class="card-body pt-5 px-7">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <h1 class="fw-semibold text-white">Start Your Project
                                            with Sash.</h1>
                                        <p class="text-white">Sed ut perspiciatis unde omnis
                                            iste natus error sit voluptatem accusantium
                                            doloremque laudantium, totam rem aperiam, eaque ipsa
                                            quae ab illo inventore veritatis et quasi architecto
                                            beatae vitae dicta sunt
                                            explicabo.
                                        </p>
                                    </div>
                                    <div class="col-lg-3 text-end my-auto">
                                        <a href=""
                                            target="_blank" class="btn btn-pink w-lg pt-2 pb-2"><i
                                                class="fe fe-shopping-cart me-2"></i>Buy Now
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
    <!-- ROW-11 CLOSED -->
</div>
@endsection
