<div class="row row-sm m-1">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header p-3">
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">E-Commerce</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Tax</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </div>
            </div>

            <div class="card-body p-2">
                <div class="row">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Tax Name</label>
                            <input type="text" class="form-control" wire:model='tax_name'>
                            @error('tax_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Tax Percentage</label>
                            <input type="number" class="form-control" wire:model='tax_number'>
                            @error('tax_number')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary" wire:click='saveRecord'>Save</button>
                        <a href="{{ route('e-commerce.tax.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>