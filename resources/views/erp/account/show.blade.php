@extends('erp.app')
@section('customCss')
    <style type="text/css">
        @media screen and (min-width: 768px) {
            .address-detail-hr {
                display: none;
            }
        }
    </style>
@endsection
@section('content')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Accounts</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Accounts</a></li>
                <li class="breadcrumb-item active" aria-current="page">Show</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Accounts</h4>
                    <div class="col-auto ms-auto d-print-none d-flex pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.master.account.index') }}" class="btn btn-default d-none d-sm-inline-block"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                        </div>                        
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title">General detail</h4>
                                <div class="mb-4">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control form-control-sm" value="{{ $account->name }}" disabled>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Alias</label>
                                    <input type="text" class="form-control form-control-sm" value="{{ $account->alias }}" disabled>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Account group</label>
                                    <select class="form-control form-control-sm form-select" disabled>
                                        <option value="">{{$account->account_group ? $account->account_group->name : ''}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <hr class="bg-dark address-detail-hr">
                                <h4 class="card-title">Address detail</h4>
                                <div class="mb-4">
                                    <label class="form-label">State</label>
                                    <select class="form-control form-control-sm form-select" disabled>
                                        <option value=>Select state</option>
                                        @foreach ($states as $state)
                                            <option value="{{ $state->id }}"
                                                {{ $account->state_id == $state->id ? 'selected' : '' }}>{{ $state->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Mobile</label>
                                    <input type="text" class="form-control form-control-sm" value="{{ $account->mobile }}" disabled>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">City</label>
                                    <select class="form-control form-control-sm form-select" disabled>
                                        <option value=>Select city</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}"
                                                {{ $account->city_id == $city->id ? 'selected' : '' }}>{{ $city->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Pincode</label>
                                    <input type="text" class="form-control form-control-sm" value="{{ $account->pincode }}" disabled>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Area</label>
                                    <input type="text" class="form-control form-control-sm" value="{{ $account->area }}" disabled>
                                </div>  

                                <hr class="bg-dark">
                                <h4 class="card-title">ID proof</h4>
                                <div class="mb-4">
                                    <label class="form-label">Pan no</label>
                                    <input type="text" class="form-control form-control-sm" value="{{ $account->pan_no }}" disabled>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Aadhar no</label>
                                    <input type="text" class="form-control form-control-sm" value="{{ $account->aadhar_no }}" disabled>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">GST no</label>
                                    <input type="text" class="form-control form-control-sm" value="{{ $account->gstin_no }}" disabled>
                                </div>
                            </div>    
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <hr class="bg-dark">
                                <h4 class="card-title">Balance</h4>
                                <div class="mb-4">
                                    <label class="form-label">Balance method</label>
                                    <input type="text" class="form-control form-control-sm" value="{{ $account->balance_method }}" disabled>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Balance type</label>
                                    <input type="text" class="form-control form-control-sm" value="{{ $account->balance_type }}" disabled>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Opening balance</label>
                                    <input type="text" class="form-control form-control-sm" value="{{ $account->opening_balance }}"  disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <hr class="bg-dark">
                                <h4 class="card-title">Credit detail</h4>
                                <div class="mb-4">
                                    <label class="form-label">Credit limit</label>
                                    <input type="text" class="form-control form-control-sm" value="{{ $account->credit_limit }}" disabled>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Credit day</label>
                                    <input type="text" class="form-control form-control-sm" value="{{ $account->credit_days }}" disabled>
                                </div>
                            </div>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
    <!-- Row END -->

@endsection

@section('customJs')
@endsection
