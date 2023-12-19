@extends('erp.app')

@section('content')
    <!-- Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Reminder</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none d-flex pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.utility.personal-diary.reminder.index') }}" class="btn btn-sm btn-default d-none d-sm-inline-block mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                            <a href="{{ route('erp.utility.personal-diary.reminder.index') }}" class="btn btn-sm btn-default d-sm-none mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                        </div>
                        <div class="btn-list">
                            <label for="formSubmitBtn" class="btn btn-primary d-none d-sm-inline-block me-0"><i class="fas fa-save me-1"></i> Save
                                Reminder</label>
                            <label for="formSubmitBtn" class="btn btn-primary d-sm-none btn-icon me-0"><i class="fas fa-plus mx-2"></i></label>
                        </div>                        
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('erp.utility.personal-diary.reminder.store') }}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Date<i class="text-danger">*</i></label>
                                <input type="date" class="form-control form-control-sm" value="{{ old('remind_date') }}"
                                    name="remind_date">
                                @error('remind_date')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Before Day<i class="text-danger">*</i></label>
                                <input type="number" class="form-control form-control-sm" value="{{ old('before_day') }}" placeholder="Enter before day"
                                    name="before_day">
                                @error('before_day')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Category <i class="text-danger">*</i></label>
                                <select name='reminder_category_id' class="form-control form-control-sm form-select">
                                    <option value="">Select category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('reminder_category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('reminder_category_id')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Frequency <i class="text-danger">*</i></label>
                                <select name='frequency' class="form-control form-control-sm form-select">
                                    <option value="">Select frequency</option>
                                    <option value="Daily" {{ old('frequency') == 'Daily' ? 'selected' : ''}}>Daily</option>
                                    <option value="Weekly" {{ old('frequency') == 'Weekly' ? 'selected' : ''}}>Weekly</option>
                                    <option value="Monthly" {{ old('frequency') == 'Monthly' ? 'selected' : ''}}>Monthly</option>
                                    <option value="Quarterly" {{ old('frequency') == 'Quarterly' ? 'selected' : ''}}>Quarterly</option>
                                    <option value="Yearly" {{ old('frequency') == 'Yearly' ? 'selected' : ''}}>Yearly</option>
                                    <option value="Once" {{ old('frequency') == 'Once' ? 'selected' : ''}}>Once</option>
                                </select>
                                @error('frequency')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Particular <i class="text-danger">*</i></label>
                                <input type="text" class="form-control form-control-sm" value="{{ old('particular') }}" placeholder="Enter particular"
                                    name="particular">
                                @error('particular')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Level <i class="text-danger">*</i></label>
                                <select name='level' class="form-control form-control-sm form-select">
                                    <option value="">Select level</option>
                                    <option value="Company" {{old('level') == 'Company' ? 'selected' : ''}}>Company</option>
                                    <option value="System" {{old('level') == 'System' ? 'selected' : ''}}>System</option>
                                </select>
                                @error('level')
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