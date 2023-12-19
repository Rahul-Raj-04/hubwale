@extends('erp.app')
@section('content')
    <!-- Row -->
    <div class="row m-1">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header p-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Account Groups</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Update</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none d-flex pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.master.account-group.index') }}" class="btn btn-sm btn-default d-none d-sm-inline-block mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                        </div>
                        <div class="btn-list">
                            <label for="formSubmitBtn" class="btn btn-primary d-none btn-sm d-sm-inline-block me-0"><i class="fas fa-save me-1"></i> Update
                                Account Group</label>
                            <label for="formSubmitBtn" class="btn btn-primary d-sm-none btn-sm btn-icon me-0"><i class="fas fa-plus mx-2"></i></label>
                        </div>                        
                    </div>
                </div>
                <div class="card-body p-3">
                    <form action="{{ route('erp.master.account-group.update', $account_group->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Group Name<i class="text-danger">*</i></label>
                                <input type="text" class="form-control form-control-sm" value="{{ $account_group->name }}" placeholder="Enter account group name"
                                    name="name" {{$account_group->is_default ? 'disabled' : 'required'}}>
                                @error('name')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Under<i class="text-danger">*</i></label>
                                <select name='parent_id' class="form-control form-control-sm form-select" {{$account_group->is_default ? 'disabled' : 'required'}}>
                                    <option value=>Select parent group</option>
                                    @foreach ($account_groups as $group)
                                        <option value="{{ $group->id }}"
                                            {{ $account_group->parent_id == $group->id ? 'selected' : '' }}>{{ $group->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('parent_id')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Group Header</label>
                                <input type="text" class="form-control form-control-sm" value="{{ $account_group->header }}" name="header"
                                    placeholder="Enter account group header">
                                @error('header')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Sequence</label>
                                <input type="text" class="form-control form-control-sm" value="{{ $account_group->sequence }}" name="sequence" placeholder="Enter account group sequence">
                                @error('sequence')
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
