<div class="row row-sm m-1">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header p-3">
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">E-Commerce</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Status</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </div>
            </div>

            <div class="card-body p-2">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Status Name</label>
                        <input type="text" class="form-control" wire:model='status_name'>
                        @error('status_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label">Status Type</label>
                        <select wire:model='status_type' class="form-control">
                            <option value="">---Select---</option>
                            <option value="payment_status">Payment Status</option>
                            <option value="order_status">Order Status</option>
                        </select>
                        @error('status_type')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary" wire:click='updateStatus'>Save</button>
                        <a href="{{ route('e-commerce.status.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>