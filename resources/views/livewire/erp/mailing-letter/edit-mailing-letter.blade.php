<section>
    <!-- Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Mailing Letter</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none d-flex pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.utility.personal-diary.mailing-letter.index') }}" class="btn btn-sm btn-default d-none d-sm-inline-block mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                            <a href="{{ route('erp.utility.personal-diary.mailing-letter.index') }}" class="btn btn-sm btn-default d-sm-none mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                        </div>
                        <div class="btn-list">
                            <label for="formSubmitBtn" class="btn btn-sm btn-primary d-none d-sm-inline-block me-0"><i class="fas fa-save me-1"></i> Save
                                Mailing Letter</label>
                            <label for="formSubmitBtn" class="btn btn-sm btn-primary d-sm-none btn-icon me-0"><i class="fas fa-plus mx-2"></i></label>
                        </div>                        
                    </div>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="submit">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Latter Name<i class="text-danger">*</i></label>
                                <input type="text" class="form-control form-control-sm" value="{{ old('name') }}" placeholder="Enter name" wire:model="name">
                                @error('name')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Field</label>
                                <div class="input-group">
                                    <select class="form-control form-control-sm form-select" wire:model="selected_field">
                                        <option value="">Select field</option>
                                        @foreach ($allFields as $key => $fields)
                                            <optgroup label="{{ $key }}">
                                                @foreach($fields as $field => $value)
                                                    <option value="{{ $field }}">{{ $value }}</option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                    <a class="btn btn-sm btn-primary pt-2" wire:click="addNewField">Add</a>
                                </div>
                                @error('selected_field')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                        	@foreach($addField as $key => $field)
	                            <div class="col-md-6">
	                                <label class="form-label">{{$field['lable']}}</label>
	                                <input type="text" class="form-control form-control-sm" placeholder="Enter {{$field['lable']}}"  wire:model="{{'new_field'.'.'.$field['field_name']}}">
	                            </div>
                        	@endforeach
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
</section>