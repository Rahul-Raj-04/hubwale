@extends('erp.app')
@section('content')
    <!-- Row -->
    <div class="row m-1">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header p-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Cost Centre</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Cost Category</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none d-flex pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.master.cost-centre.cost-category.index') }}" class="btn btn-sm btn-default d-none d-sm-inline-block mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                            <a href="{{ route('erp.master.cost-centre.cost-category.index') }}" class="btn btn-sm btn-default d-sm-none mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                        </div>
                        <div class="btn-list">
                            <label for="CostCategoryFormSubmit" class="btn btn-sm btn-primary d-none d-sm-inline-block me-0"><i class="fas fa-save me-1"></i> Save Cost Category</label>
                            <label for="CostCategoryFormSubmit" class="btn btn-sm btn-primary d-sm-none btn-icon me-0"><i class="fas fa-plus mx-2"></i></label>
                        </div>                        
                    </div>
                </div>
                <div class="card-body p-3">
                    <div>
                        <form action="{{ route('erp.master.cost-centre.cost-category.update', $costCategory->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label"> Name <i class="text-danger">*</i></label>
                                    <input type="text" class="form-control form-control-sm" value="{{ old('name') ? old('name') : $costCategory->name }}" placeholder="Enter Category Name"
                                            name="name">
                                    @error('name')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            <input type="submit" id="CostCategoryFormSubmit" class="d-none">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row END -->

@endsection

@section('customJs')
@endsection