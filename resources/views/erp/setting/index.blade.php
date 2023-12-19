@extends('erp.app')
@section('content')

	<!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Settings</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Settings</a></li>
                <li class="breadcrumb-item active" aria-current="page">Index</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- Row -->
    <div class="row ">
        <div class="col-lg-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="list-group list-group-transparent mb-0 file-manager file-manager-border">
                        <div>
                            <a href="{{route('erp.setting.company-setup')}}" class="list-group-item  d-flex align-items-center px-0 border-top  {{ request()->routeIs('setting.home') ? 'active' : ' ' }}">
                                <i class="fas fa-building fs-18 me-2 text-warning p-2"></i>Company setup
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-9">
            <div class="row row-sm">
                <div class="col-xl-12 col-xxl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-2 col-sm-2 col-md-12">
                                    <div class="mt-3 mb-5">
                                        <span class="settings-icon bg-primary-transparent text-primary"><i class="far fa-building"></i></span>
                                    </div>
                                </div>
                                <div class="col-xl-10 col-sm-10 col-md-12">
                                    <a href="{{route('erp.setting.company-setup.company.details')}}">
                                        <h4 class="mb-1 text-dark">Company details</h4>
                                    </a>
                                    <p>In this settings we can change company Name, Logo ,financial year date etc.</p>
                                    <a href="{{route('erp.setting.company-setup.company.details')}}">Change Settings <i class="ion-chevron-right fs-10 ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-xxl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-2 col-sm-2 col-md-12">
                                    <div class="mt-3 mb-5">
                                        <span class="settings-icon bg-secondary-transparent text-secondary border-secondary"><i class="fas fa-gavel"></i></span>
                                    </div>
                                </div>
                                <div class="col-xl-10 col-sm-10 col-md-12">
                                    <a href="{{route('erp.setting.company-setup.statutory.details')}}">
                                        <h4 class="mb-1 text-dark">Statutory details</h4>
                                    </a>
                                    <p>In this settings we can change PAN ,Adhar, CST etc.</p>
                                    <a href="{{route('erp.setting.company-setup.statutory.details')}}">Change Settings <i class="ion-chevron-right fs-10 ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-xxl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-2 col-sm-2 col-md-12">
                                    <div class="mt-3 mb-5">
                                        <span class="settings-icon bg-danger-transparent text-danger border-danger"><i class="far fa-address-card"></i></span>
                                    </div>
                                </div>
                                <div class="col-xl-10 col-sm-10 col-md-12">
                                    <a href="{{route('erp.setting.company-setup.address.details')}}">
                                        <h4 class="mb-1 text-dark">Address details</h4>
                                    </a>
                                    <p>In this settings we can change Address, Pincode, Country, state, mobile etc.</p>
                                    <a href="{{route('erp.setting.company-setup.address.details')}}">Change Settings <i class="ion-chevron-right fs-10 ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-xxl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-2 col-sm-2 col-md-12">
                                    <div class="mt-3 mb-5">
                                        <span class="settings-icon bg-warning-transparent text-warning border-warning"><i class="fas fa-university"></i></span>
                                    </div>
                                </div>
                                <div class="col-xl-10 col-sm-10 col-md-12">
                                    <a href="{{route('erp.setting.company-setup.bank.details')}}">
                                        <h4 class="mb-1 text-dark">Bank details</h4>
                                    </a>
                                    <p>In this settings we can change Bank name, Bank Address, Branch name, Account number etc.</p>
                                    <a href="{{route('erp.setting.company-setup.bank.details')}}">Change Settings <i class="ion-chevron-right fs-10 ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-xxl-6 d-none">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-2 col-sm-2 col-md-12">
                                    <div class="mt-3 mb-5">
                                        <span class="settings-icon bg-success-transparent text-success border-success"><i class="fe fe-flag"></i></span>
                                    </div>
                                </div>
                                <div class="col-xl-10 col-sm-10 col-md-12">
                                    <a href="{{route('erp.setting.company-setup.alter.language')}}">
                                        <h4 class="mb-1 text-dark">Alter language</h4>
                                    </a>
                                    <p>Region & language settings we can Add, Delete and edit your Region & language.</p>
                                    <a href="{{route('erp.setting.company-setup.alter.language')}}">Change Settings <i class="ion-chevron-right fs-10 ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->

@endsection