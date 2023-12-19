@extends('erp.app')

@section('content')
    <!-- Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Scheduler</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none d-flex pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.utility.personal-diary.calender-diary.index') }}" class="btn btn-sm btn-default d-none d-sm-inline-block mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                            <a href="{{ route('erp.utility.personal-diary.calender-diary.index') }}" class="btn btn-sm btn-default d-sm-none mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                        </div>
                        <div class="btn-list">
                            <label for="formSubmitBtn" class="btn btn-primary d-none d-sm-inline-block me-0"><i class="fas fa-save me-1"></i> Save
                                Scheduler</label>
                            <label for="formSubmitBtn" class="btn btn-primary d-sm-none btn-icon me-0"><i class="fas fa-plus mx-2"></i></label>
                        </div>                        
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('erp.utility.personal-diary.calender-diary.store') }}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Date<i class="text-danger">*</i></label>
                                <input type="date" class="form-control form-control-sm" value="{{ old('date') }}"
                                    name="date">
                                @error('date')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Time<i class="text-danger">*</i></label>
                                <input type="time" class="form-control form-control-sm" value="{{ old('time') }}" placeholder="Enter time"
                                    name="time">
                                @error('time')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Duration (Mins) <i class="text-danger">*</i></label>
                                <input type="number" class="form-control form-control-sm" value="{{ old('duration') }}" placeholder="Enter duration"
                                    name="duration">
                                @error('duration')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Type <i class="text-danger">*</i></label>
                                <select name='type' class="form-control form-control-sm form-select">
                                    <option value="">Select type</option>
                                    <option value="Normal" {{ old('type') == 'Normal' ? 'selected' : '' }}>Normal</option>
                                    <option value="Important" {{ old('type') == 'Important' ? 'selected' : '' }}>Important</option>
                                    <option value="Very important" {{ old('type') == 'Very important' ? 'selected' : '' }}>Very Important</option>
                                </select>
                                @error('type')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Particulars <i class="text-danger">*</i></label>
                                <input type="text" class="form-control form-control-sm" value="{{ old('particulars') }}" name="particulars"
                                    placeholder="Enter particulars"> 
                                @error('particulars')
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
