@extends('erp.app')
@section('content')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Account Groups</h1>
        <div>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- Row -->
    <div class="row m-1">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header p-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Account Groups</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Show</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none d-flex pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.master.account-group.index') }}" class="btn btn-sm btn-default d-none d-sm-inline-block"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                        </div>                        
                    </div>
                </div>
                <div class="card-body p-3">
                    <form>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Name <i class="text-danger">*</i></label>
                                <input type="text" class="form-control form-control-sm" value="{{ $account_group->name }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Parent group <i class="text-danger">*</i></label>
                                <select class="form-control form-control-sm form-select" disabled>
                                    <option value=>Select parent group</option>
                                    @foreach ($account_groups as $group)
                                        <option value="{{ $group->id }}"
                                            {{ $account_group->parent_id == $group->id ? 'selected' : '' }}>{{ $group->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Header</label>
                                <input type="text" class="form-control form-control-sm" value="{{ $account_group->header }}" disabled>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Sequence</label>
                                <input type="text" class="form-control form-control-sm" value="{{ $account_group->sequence }}" disabled>
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
