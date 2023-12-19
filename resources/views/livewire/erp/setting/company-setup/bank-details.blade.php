<section>
    <!-- Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('erp.setting.home')}}">Setting</a></li>
                        <li class="breadcrumb-item"><a href="{{route('erp.setting.home')}}">Company setting</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Bank details</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none d-flex pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.setting.home') }}" class="btn btn-sm btn-default d-none d-sm-inline-block mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                            <a href="{{ route('erp.setting.home') }}" class="btn btn-sm btn-default d-sm-none mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                        </div>
                        <div class="btn-list">
                            <button class="btn btn-sm btn-primary d-none d-sm-inline-block me-0" type="submit" wire:click="submit">
                                <i class="fas fa-save me-1"></i>Save Bank details 
                            </button>
                            <button class="btn btn-sm btn-primary d-sm-none btn-icon me-0" type="submit" wire:click="submit">
                                <i class="fas fa-plus mx-2"></i>
                            </button>
                        </div>                        
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-row row mt-2">
                        <div class="form-group col-md-6 mt-2">
                            <label for="bank_name">Bank name</label>
                            <input type="text" class="form-control form-control-sm" id="bank_name" wire:model="bank_name">
                        </div>
                        <div class="form-group col-md-6 mt-2">
                            <label for="branch_name">Branch name</label>
                            <input type="text" class="form-control form-control-sm" id="branch_name" wire:model="branch_name">
                        </div>
                        <div class="form-group col-md-6 mt-2">
                            <label for="bank_address">Bank address</label>
                            <input type="text" class="form-control form-control-sm" id="bank_address" wire:model="bank_address">
                        </div>
                        <div class="form-group col-md-6 mt-2">
                            <label for="bank_ifsc">Bank ifsc</label>
                            <input type="text" class="form-control form-control-sm" id="bank_ifsc" wire:model="bank_ifsc">
                        </div>
                        <div class="form-group col-md-6 mt-2">
                            <label for="bank_ac_no">Bank A/C no.</label>
                            <input type="text" class="form-control form-control-sm" id="bank_ac_no" wire:model="bank_ac_no">
                        </div>
                        <div class="form-group col-md-6 mt-2">
                            <label for="iban_no">IBAN no.</label>
                            <input type="text" class="form-control form-control-sm" id="iban_no" wire:model="iban_no">
                        </div>
                        <div class="form-group col-md-6 mt-2">
                            <label for="swift_code">Swift code</label>
                            <input type="text" class="form-control form-control-sm" id="swift_code" wire:model="swift_code">
                        </div>
                        <div class="form-group col-md-6 mt-2">
                            <label for="upi_code">UPI code</label>
                            <input type="text" class="form-control form-control-sm" id="upi_code" wire:model="upi_code">
                        </div>
                        <div class="form-group col-md-6 mt-2">
                            <label for="upi_id">UPI id</label>
                            <input type="text" class="form-control form-control-sm" id="upi_id" wire:model="upi_id">
                        </div>
                    </div>      
                </div>
            </div>
        </div>
    </div>
    <!-- Row END -->
    
</section>


