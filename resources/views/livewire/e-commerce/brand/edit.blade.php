<div class="row row-sm m-1">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header p-3">
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">E-Commerce</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Brand</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </div>
            </div>

            <div class="card-body p-2">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" wire:model='brand_name'>
                        @error('brand_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Type</label>
                        <select class="form-control" wire:model='brand_type'>
                            <option value="own">Own</option>
                            <option value="supplier">Supplier</option>
                        </select>
                        @error('brand_type')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary" wire:click='updateCategory'>Save</button>
                        <a href="{{ route('e-commerce.brand.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>