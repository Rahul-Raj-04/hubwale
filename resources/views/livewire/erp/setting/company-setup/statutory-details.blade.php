<section>
    <!-- Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('erp.setting.home')}}">Setting</a></li>
                        <li class="breadcrumb-item"><a href="{{route('erp.setting.home')}}">Company setting</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Statutory details</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none d-flex pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.setting.home') }}" class="btn btn-sm btn-default d-none d-sm-inline-block mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                            <a href="{{ route('erp.setting.home') }}" class="btn btn-sm btn-default d-sm-none mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                        </div>
                        <div class="btn-list">
                            <button class="btn btn-sm btn-primary d-none d-sm-inline-block me-0" type="submit" wire:click="submit">
                                <i class="fas fa-save me-1"></i>Save Statutory details 
                            </button>
                            <button class="btn btn-sm btn-primary d-sm-none btn-icon me-0" type="submit" wire:click="submit">
                                <i class="fas fa-plus mx-2"></i>
                            </button>
                        </div>                        
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-row row">
                        <div class="form-group col-md-6 my-2">
                            <label for="pan">PAN</label>
                            <input type="text" class="form-control form-control-sm" id="pan" wire:model="pan">
                        </div>
                        <div class="form-group col-md-6 my-2">
                            <label for="gstin">GSTIN</label>
                            <input type="text" class="form-control form-control-sm" id="gstin" wire:model="gstin">
                        </div>
                        <div class="form-group col-md-6 my-2">
                            <label for="aadhar">Aadhar</label>
                            <input type="text" class="form-control form-control-sm" id="aadhar" wire:model="aadhar">
                        </div>
                        <div class="form-group col-md-6 my-2">
                            <label for="tin">TIN</label>
                            <input type="text" class="form-control form-control-sm" id="tin" wire:model="tin">
                        </div>
                        <div class="form-group col-md-6 my-2">
                            <label for="cst">CST</label>
                            <input type="text" class="form-control form-control-sm" id="cst" wire:model="cst">
                        </div>
                        <div class="form-group col-md-6 my-2">
                            <label for="tan">TAN</label>
                            <input type="text" class="form-control form-control-sm" id="tan" wire:model="tan">
                        </div>
                        <div class="form-group col-md-6 my-2">
                            <label for="ecc">ECC</label>
                            <input type="text" class="form-control form-control-sm" id="ecc" wire:model="ecc">
                        </div>
                        <div class="form-group col-md-6 my-2">
                            <label for="importer_ecc_no">Importer ecc no.</label>
                            <input type="text" class="form-control form-control-sm" id="importer_ecc_no" wire:model="importer_ecc_no">
                        </div>
                        <div class="form-group col-md-6 my-2">
                            <label for="service_tax_no">Service tax no.</label>
                            <input type="text" class="form-control form-control-sm" id="service_tax_no" wire:model="service_tax_no">
                        </div>
                        <div class="form-group col-md-6 my-2">
                            <label for="ssi_no">SSI no.</label>
                            <input type="text" class="form-control form-control-sm" id="ssi_no" wire:model="ssi_no">
                        </div>
                        <div class="form-group col-md-6 my-2">
                            <label for="generel_lic_no">Generel lic. no.</label>
                            <input type="text" class="form-control form-control-sm" id="generel_lic_no" wire:model="generel_lic_no">
                        </div>
                        <div class="form-group col-md-6 my-2">
                            <label for="wholesale_agent_lic_no">Wholesale agent lic. no.</label>
                            <input type="text" class="form-control form-control-sm" id="wholesale_agent_lic_no"
                                wire:model="wholesale_agent_lic_no">
                        </div>
                        <div class="form-group col-md-6 my-2">
                            <label for="commission_lic_no">Commission lic. no.</label>
                            <input type="text" class="form-control form-control-sm" id="commission_lic_no"
                                wire:model="commission_lic_no">
                        </div>
                        <div class="form-group col-md-6 my-2">
                            <label for="drug_lic_no">Drug lic. no.</label>
                            <input type="text" class="form-control form-control-sm" id="drug_lic_no" wire:model="drug_lic_no">
                        </div>
                        <div class="form-group col-md-6 my-2">
                            <label for="cin_no">CIN no.</label>
                            <input type="text" class="form-control form-control-sm" id="cin_no" wire:model="cin_no">
                        </div>
                        <div class="form-group col-md-6 my-2">
                            <label for="food_product_lic_no">Food product lic. no.</label>
                            <input type="text" class="form-control form-control-sm" id="food_product_lic_no"
                                wire:model="food_product_lic_no">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row END -->
    
</section>



            