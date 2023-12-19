@extends('erp.app')
@section('content')
    <!-- Row -->
    <div class="row m-1">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header p-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Services</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none d-flex pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.master.service.index') }}" class="btn btn-sm btn-default d-none d-sm-inline-block mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                        </div>
                        <div class="btn-list">
                            <label for="formSubmitBtn" class="btn btn-primary d-none btn-sm d-sm-inline-block me-0"><i class="fas fa-save me-1"></i> Save
                                Service</label>
                            <label for="formSubmitBtn" class="btn btn-primary d-sm-none btn-sm btn-icon me-0"><i class="fas fa-plus mx-2"></i></label>
                        </div>                        
                    </div>
                </div>
                <div class="card-body p-3">
                    <form action="{{ route('erp.master.service.update', $service->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Name<i class="text-danger">*</i></label>
                                <input type="text" class="form-control form-control-sm" value="{{ old('name') ?? $service->name }}" placeholder="Enter name"
                                    name="name" required>
                                @error('name')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Alias</label>
                                <input type="text" class="form-control form-control-sm" value="{{ old('alias') ?? $service->name }}" placeholder="Enter alias"
                                    name="alias">
                                @error('alias')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">GST Commodity</label>
                                <select name='gst_commodity_id' class="form-control form-control-sm form-select">
                                    <option value=>Select GST Commodity</option>
                                    @foreach ($gstCommoditys as $gstCommodity)
                                        <option value="{{ $gstCommodity->id }}"
                                            {{ (old('gst_commodity_id') ?? $service->gst_commodity_id) == $gstCommodity->id ? 'selected' : '' }}>{{ $gstCommodity->description }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('gst_commodity_id')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Income A/c.<i class="text-danger">*</i></label>
                                <select name='account_id' class="form-control form-control-sm form-select" required>
                                    <option value=>Select Income A/c</option>
                                    @foreach ($accounts as $account)
                                        <option value="{{ $account->id }}"
                                            {{ (old('account_id') ?? $service->account_id) == $account->id ? 'selected' : '' }}>{{ $account->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('account_id')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <input type="submit" value="save" id="formSubmitBtn" class="d-none">
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
