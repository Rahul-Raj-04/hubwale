<section>
<!--app-content open-->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Settings</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Voucher Setup</li>
                    </ol>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none pe-0">
                        <div class="btn-list">
                            <label for="formSubmitBtn" class="btn btn-sm btn-primary d-none d-sm-inline-block me-0"><i class="fas fa-save me-1"></i> Save
                                Setting</label>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 border">
                            <ul class="nav nav-tabs flex-column" id="myTab" role="tablist">
                                <li class="nav-item active" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="general_settings-tab"
                                     data-bs-toggle="tab" data-bs-target="#general_settings-tab-pane" type="button" role="tab" 
                                     aria-controls="general_settings-tab-pane" aria-selected="true">General Setting
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content col-md-9 border" id="myTabContent">
                                <!-- Geeral setup -->
                               <div class="tab-pane fade show active" id="general_settings-tab-pane" role="tabpanel" aria-labelledby="general_settings-tab" tabindex="0">
                                    <h5 class="text-danger m-0 mt-3"><b>Audit Options</b></h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Auditor Password</label>
                                        </div>
                                        <div class="col-md-6">
                                                <input type="text" class="form-control form-control-sm" wire:model="general_settings.auditor_password">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Lock Audited Accounts</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model="general_settings.lock_audited_accounts">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Lock Audited Vouchers</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model="general_settings.lock_audited_vouchers">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Password at Each Audit</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model="general_settings.password_each_audit">
                                            </div>
                                        </div>
                                    </div>

                                    <h5 class="text-danger m-0 mt-3"><b>Entry Options</b></h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Entry Narration Width</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="number" class="form-control form-control-sm" wire:model="general_settings.entry_narration">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Quantity Total In Sales /Purchase</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model="general_settings.quantity_total_in_sales_purchase">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">R/I In sale /purchase product entry</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model="general_settings.r_i__sales_purchase_product_entry">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Exit Narration with Enter</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model="general_settings.exit_narration">
                                            </div>
                                        </div>
                                    </div>


                                    <h5 class="text-danger m-0 mt-3"><b>Other Options</b></h5>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Closing Stock Calculating Method</label>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control form-control-sm" wire:model.defer="general_settings.interest"> 
                                                <option value="None">None</option>
                                                <option value="Fixed">Fixed</option>
                                                <option value="Fifo">Fifo</option>
                                                <option value="Average">Average</option>
                                                <option value="Stock Rate">Stock Rate</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Reminder For Memorandum/PDC</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model="general_settings.reminder_memorandum">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Depreciation Middle Date</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="date" class="form-control form-control-sm" wire:model="general_settings.depreciation_middle">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Update Master Details ?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model="general_settings.update_master">
                                            </div>
                                        </div>
                                    </div>


                                    <h5 class="text-danger m-0 mt-3"><b>Auto Havala Round Off</b></h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                                <label class="form-label">Capital</label>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control form-control-sm" wire:model.defer="general_settings.capital"> 
                                                    <option value="None">None</option>
                                                    <option value="Floor">Floor</option>
                                                    <option value="Round Off">Round Off</option>
                                                    <option value="Ceiling">Ceiling</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Depreciation</label>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control form-control-sm" wire:model.defer="general_settings.depreciation"> 
                                                <option value="None">None</option>
                                                <option value="Floor">Floor</option>
                                                <option value="Round Off">Round Off</option>
                                                <option value="Ceiling">Ceiling</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Interest</label>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control form-control-sm" wire:model.defer="general_settings.interest"> 
                                                <option value="None">None</option>
                                                <option value="Floor">Floor</option>
                                                <option value="Round Off">Round Off</option>
                                                <option value="Ceiling">Ceiling</option>
                                            </select>
                                        </div>
                                    </div>

                                    <h5 class="text-danger m-0 mt-3"><b>Multi Language Options</b></h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Multi Language Support Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="general_settings.multi_language">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Alternate Language Input in Masters Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="general_settings.alternate_language_input_in_master_required">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                
                </div>
            </div>
        </div>
    </div>
</section>