<section>
<!--app-content open-->
    <div class="row row-sm m-1">
        <div class="col-lg-12">
            <div class="card me-1">
                <div class="card-header p-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Settings</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Company Setup</li>
                    </ol>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none pe-0">
                        <div class="btn-list">
                            <label for="" wire:click="submit" class="btn btn-sm btn-primary d-none d-sm-inline-block me-0"><i class="fas fa-save me-1"></i> Save
                                Setting</label>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3" style="height: 500px;overflow-y: scroll;">
                    <div class="row">
                        <div class="col-md-3 border">
                            <ul class="nav nav-tabs flex-column" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" style="width: 100%" id="general_settings-tab"
                                     data-bs-toggle="tab" data-bs-target="#general_settings-tab-pane" type="button" role="tab" 
                                     aria-controls="general_settings-tab-pane" aria-selected="true" wire:click="openMenu('general_settings')">General Setting
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="advance_settings-tab"
                                     data-bs-toggle="tab" data-bs-target="#advance_settings-tab-pane" type="button" role="tab" 
                                     aria-controls="advance_settings-tab-pane" aria-selected="true">Advance Setting
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="advance_module_settings-tab"
                                     data-bs-toggle="tab" data-bs-target="#advance_module_settings-tab-pane" type="button" role="tab" 
                                     aria-controls="advance_module_settings-tab-pane" aria-selected="true">Advance Modules
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="master_settings-tab"
                                     data-bs-toggle="tab" data-bs-target="#master_settings-tab-pane" type="button" role="tab" 
                                     aria-controls="master_settings-tab-pane" aria-selected="true">Master Setup
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="gst_settings-tab"
                                     data-bs-toggle="tab" data-bs-target="#gst_settings-tab-pane" type="button" role="tab" 
                                     aria-controls="gst_settings-tab-pane" aria-selected="true">GST Setup
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="tds_tcs_settings-tab"
                                     data-bs-toggle="tab" data-bs-target="#tds_tcs_settings-tab-pane" type="button" role="tab" 
                                     aria-controls="tds_tcs_settings-tab-pane" aria-selected="true">TDS/TCS Setup
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="report_settings-tab"
                                     data-bs-toggle="tab" data-bs-target="#report_settings-tab-pane" type="button" role="tab" 
                                     aria-controls="report_settings-tab-pane" aria-selected="true">Report Setup
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="classification_settings-tab"
                                     data-bs-toggle="tab" data-bs-target="#classification_settings-tab-pane" type="button" role="tab" 
                                     aria-controls="classification_settings-tab-pane" aria-selected="true">Classification Setup
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="price_list_settings-tab"
                                     data-bs-toggle="tab" data-bs-target="#price_list_settings-tab-pane" type="button" role="tab" 
                                     aria-controls="price_list_settings-tab-pane" aria-selected="true">PriceList Setup
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="barcode_settings-tab" data-bs-toggle="tab" data-bs-target="#barcode_settings-tab-pane" type="button" role="tab" 
                                     aria-controls="barcode_settings-tab-pane" aria-selected="true">Barcode Setup</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="share_settings-tab" data-bs-toggle="tab" data-bs-target="#share_settings-tab-pane" type="button" role="tab" 
                                     aria-controls="share_settings-tab-pane" aria-selected="true">Share Setup</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="jobwork_out_settings-tab" data-bs-toggle="tab" data-bs-target="#jobwork_out_settings-tab-pane" type="button" role="tab" 
                                     aria-controls="jobwork_out_settings-tab-pane" aria-selected="true">JobWork Out Setup</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="jobwork_in_settings-tab" data-bs-toggle="tab" data-bs-target="#jobwork_in_settings-tab-pane" type="button" role="tab" 
                                     aria-controls="jobwork_in_settings-tab-pane" aria-selected="true">JobWork In Setup</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="consultant_settings-tab" data-bs-toggle="tab" data-bs-target="#consultant_settings-tab-pane" type="button" role="tab" 
                                     aria-controls="consultant_settings-tab-pane" aria-selected="true">Consultant Setup</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="apmc_settings-tab" data-bs-toggle="tab" data-bs-target="#apmc_settings-tab-pane" type="button" role="tab" 
                                     aria-controls="apmc_settings-tab-pane" aria-selected="true">APMC Setup</button>
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
                                            <select class="form-control form-control-sm" wire:model.defer="general_settings.closing_stock_calculating_method"> 
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

                                <!-- Advance Setup -->
                                <div class="tab-pane fade show" id="advance_settings-tab-pane" role="tabpanel" aria-labelledby="advance_settings-tab" tabindex="0">
                                    <h5 class="text-danger m-0 mt-3"><b>Advance Options</b></h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Account with Stock</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="advance_settings.account_with_stock">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Bill To Bill Outstanding</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="advance_settings.bill_to_bill_outstanding">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Bill To Bill Outstanding for Non Party</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="advance_settings.bill_to_bill_outstanding_non">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Multiple Trading Account</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="advance_settings.multiple_trading_account">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Multi Currency Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="advance_settings.multi_currency_required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Base Currency</label>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control form-control-sm" wire:model.defer="advance_settings.base_currency"> 
                                                <option value="$ | USD | United States">$ | USD | United States</option>
                                                <option value="R | INR | India">R | INR | India</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Free Qty Facility Req. Fro Purchase ?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="advance_settings.free_qty_facility_req_for_purchase">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Free Qty Facility Req. Fro Sale ?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="advance_settings.free_qty_facility_req_for_sale">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <h5 class="text-danger m-0 mt-3"><b>Stock Setup</b></h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Pricelist Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="advance_settings.pricelist_required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Locationwise Stock Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="advance_settings.locationwise_stock_required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Batchwise Stock Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="advance_settings.batchwise_stock_required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Dual Stock Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="advance_settings.dual_stock_required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Serial Numberwise Stock Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="advance_settings.serial_numberwise_stock_required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Product Classification Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="advance_settings.product_classification_required">
                                            </div>
                                        </div>
                                    </div>

                                    <h5 class="text-danger m-0 mt-3"><b>Weight Scale Detail</b></h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Weight Scale Req.?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="advance_settings.weight_scale_required">
                                            </div>
                                        </div>
                                    </div>

                                    <h5 class="text-danger m-0 mt-3"><b>Adv. Voucher</b></h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Challan Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="advance_settings.challan_required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Order Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="advance_settings.order_required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Quotation Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="advance_settings.quotation_required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Production Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="advance_settings.production_required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Stock Journal Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="advance_settings.stock_journal_required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Physical Stock Voucher Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="advance_settings.physical_stock_voucher_required">
                                            </div>
                                        </div>
                                    </div>

                                    <h5 class="text-danger m-0 mt-3"><b>User Option</b></h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">User Field Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="advance_settings.user_field_required">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">User Master Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="advance_settings.user_master_required">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Advance module setup -->
                                <div class="tab-pane fade show" id="advance_module_settings-tab-pane" role="tabpanel" aria-labelledby="advance_module_settings-tab" tabindex="0">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Deal with E-Commerce Operator</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="advance_module_settings.deal_e_commerce_operator">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">ICICI Net Banking Required?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="advance_module_settings.icici_net_banking_required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Share Accounting Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="advance_module_settings.share_accounting_required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">JobWork Out Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="advance_module_settings.jobwork_out_required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">JobWork In Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="advance_module_settings.jobwork_in_required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">BarCode Entry Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="advance_module_settings.barcode_entry_required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Cost Centre Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="advance_module_settings.cost_centre_required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Cost Category Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="advance_module_settings.cost_category_required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Ticker Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="advance_module_settings.ticker_required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Packing Stock Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="advance_module_settings.packing_stock_required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Consultant Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="advance_module_settings.consultant_required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">POS Entry Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="advance_module_settings.pos_entry_required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">APMC Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="advance_module_settings.apmc_required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">E-Commerce Required?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="advance_module_settings.e_commerce_required">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Master  Setup -->
                                <div class="tab-pane fade show" id="master_settings-tab-pane" role="tabpanel" aria-labelledby="master_settings-tab" tabindex="0">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Account Popup Type</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="master_settings.account_popup_type">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Account Search On Alias</label>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control form-control-sm" wire:model.defer="master_settings.account_search_on_alias"> 
                                                <option value="None">None</option>
                                                <option value="Name">Name</option>
                                                <option value="Alias">Alias</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Proper Case In Master Entry</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="master_settings.proper_case_in_master">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Proper Case In Address Entry</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="master_settings.proper_case_in_address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">CIN No Required?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="master_settings.cin_no_required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Product Search on Alias</label>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control form-control-sm" wire:model.defer="master_settings.product_search_on_alias"> 
                                                <option value="None">None</option>
                                                <option value="Name">Name</option>
                                                <option value="Alias">Alias</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Product Group Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="master_settings.product_group_required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Product Category Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="master_settings.product_category_required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Ask Quentity Effect In Product</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="master_settings.ask_quentity_effect_in_product">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Ask Stock A/C In Product</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="master_settings.ask_stock_ac_in_product">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Itemwise Expense Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="master_settings.itemwise_expense_required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Proper Case In Master Entry</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="master_settings.proper_case_in_master_entry">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Trending Good Req.?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="master_settings.tranding_goods_req">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Product Wise Stock Method Req.?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="master_settings.product_wise_stock_method_req">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Decimal Point For Unit-1</label>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control form-control-sm" wire:model.defer="master_settings.decimal_point_for_unit_1"> 
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Decimal Point For Rate</label>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control form-control-sm" wire:model.defer="master_settings.decimal_point_for_rate"> 
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!--GST Setup  -->
                                <div class="tab-pane fade show" id="gst_settings-tab-pane" role="tabpanel" aria-labelledby="gst_settings-tab" tabindex="0">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Quick Auto GST Setup</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="gst_settings.quick_auto_gst_setup">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">GST Auto Account Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="gst_settings.gst_auto_account_required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">None GST Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="gst_settings.none_gst_required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Cess Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="gst_settings.cess_required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Garment Condition</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="gst_settings.garment_condition">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Rate For GArment Product Commodity Change(W/O TaxPaid)</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control form-control-sm" wire:model.defer="gst_settings.rate_for_garment_product">
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">GSTR Return Period</label>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control form-control-sm" wire:model.defer="gst_settings.gst_return_period"> 
                                                <option value="Monthly">Monthly</option>
                                                <option value="Quarterly">Quarterly</option>
                                                <option value="Alias">Alias</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">UIN No. Required ?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="gst_settings.uin_no_required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">GSP Services</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="gst_settings.gsp_services">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">GST Portal Username</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control form-control-sm" wire:model.defer="gst_settings.gst_portal_username">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">HSN Head Type</label>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control form-control-sm" wire:model.defer="gst_settings.hsn_head_type"> 
                                                <option value="Heading">Heading</option>
                                                <option value="Sub Heading">Sub Heading</option>
                                                <option value="Alias">Tarrif Heading</option>
                                                <option value="Alias">Chapter
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Decimal Point For GST % </label>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control form-control-sm" wire:model.defer="gst_settings.decimal_point_for_gst"> 
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">GST Commodity Search On HSN/SAC Code</label>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control form-control-sm" wire:model.defer="gst_settings.gst_commodity_search_code"> 
                                                <option value="HSN/SAC">HSN/SAC</option>
                                                <option value="None">None</option>
                                                <option value="Commodity">Commodity</option>
                                                <option value="Alias">Chapter
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Sale Tax Paid Rate Entry ?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="gst_settings.sale_tax_paid_rate_entry">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Purchase Tax Paid Rate Entry ?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="gst_settings.purchase_tax_paid_rate_entry">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">GST on JW Amount Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="gst_settings.gst_on_jw_amount_required">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Value Of Good Required in ITC04?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="gst_settings.value_of_godd_required_in_itc04">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Advance Receipt Entry Req?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="gst_settings.advance_receipt_entry_req">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Tax Paid Rate Entry ?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control form-control-sm" wire:model.defer="gst_settings.tax_paid_rate_entry"> 
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                <option value="Both">Both</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">No. Of Previous Year Loading</label>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control form-control-sm" wire:model.defer="gst_settings.no_of_previous_year_loading"> 
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">RCM Effect While URD Voucher Req. ?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="gst_settings.ecm_effect_while_urd_voucher_req">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Notified Reverse Charge Required ?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="gst_settings.notified_reverse_charge_required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">E-Way Bill Required ?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="gst_settings.e_way_bill_required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Dispatch From Master Required?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="gst_settings.dispatch_from_master_required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">E-way Bill Confirmation Required ?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="gst_settings.e_way_bill_confirmation_required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">E-Way Bill Amount Limit</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control form-control-sm" wire:model.defer="gst_settings.e_way_bill_amount_limit">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">E-Invoice Require ?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="gst_settings.way_bill_setup_e_invoice_required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Dispatch From Master Required ?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="gst_settings.e_invoice_dispatch_from_master_required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Generate E-Way-Bill With E-Invoice?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="gst_settings.generate_e_way_bill_with_invoice">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">E- Invoice Confirmation Required ?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="gst_settings.e_invoice_confirmation_required">
                                            </div>
                                        </div>
                                    </div>
                                </div>   

                                <!--TDS/TCS  Setup  -->
                                <div class="tab-pane fade show" id="tds_tcs_settings-tab-pane" role="tabpanel" aria-labelledby="tds_tcs_settings-tab" tabindex="0">
                                    <h5 class="text-danger m-0 mt-3"><b>TDS Detail</b></h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">TDS Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="tds_tcs_settings.tds_required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Rountd Off Required In Hawala Entry ?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control form-control-sm" wire:model.defer="tds_tcs_settings.round_off_required_in_hawala_entry"> 
                                                <option value="Entry Wise">Entry Wise</option>
                                                <option value="Hawala Generation">Hawala Generation</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">TDS Salary</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="tds_tcs_settings.tds_salary">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">TDS Debit (Deducted By Other) Entries Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="tds_tcs_settings.tds_debit_entries_required">
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="text-danger m-0 mt-3"><b>TCS Detail</b></h5>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">TCS Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="tds_tcs_settings.tcs_required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">TCS as per section 206C (1H) Required ?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="tds_tcs_settings.tcs_as_per_section_required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Separate Debit Note Option Required in Receipt ?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="tds_tcs_settings.separate_note_option_required_in_receipt">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Ignore TCS Threshold Limit ?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="tds_tcs_settings.ignore_tcs_threshold_limit">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!--TDS/TCS  Setup  -->
                                <div class="tab-pane fade show" id="report_settings-tab-pane" role="tabpanel" aria-labelledby="report_settings-tab" tabindex="0">
                                    <h5 class="text-danger m-0 mt-3"><b>General Setup</b></h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Display Width For Document No.</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control form-control-sm" wire:model.defer="report_settings.display_width_for_document">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Report Type (Default)</label>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control form-control-sm" wire:model.defer="report_settings.report_type_default"> 
                                                <option value="Horizontal">Horizontal</option>
                                                <option value="Vertical">Vertical</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Display Width For Voucher No.</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control form-control-sm" wire:model.defer="report_settings.display_width_for_voucher">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Display Long Voucher No.</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="report_settings.display_long_voucher_no">
                                            </div>
                                        </div>
                                    </div>

                                    <h5 class="text-danger m-0 mt-3"><b>Stock Report</b></h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">First Unit Name</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control form-control-sm" wire:model.defer="report_settings.first_unit_name">
                                        </div>
                                    </div>

                                    <h5 class="text-danger m-0 mt-3"><b>Watermark</b></h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Watermark Printing Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="report_settings.watermark_printing_required">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Classification Setup  -->
                                <div class="tab-pane fade show" id="classification_settings-tab-pane" role="tabpanel" aria-labelledby="classification_settings-tab" tabindex="0">
                                    <h5 class="text-danger m-0 mt-3"><b>Classification Setup</b></h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Negative Classification Stock Required.</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="classification_settings.negative_classification_stock_required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Merge Batch In Sales / Purchase ?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="classification_settings.merge_batch_in_sales_purchase">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--PriceList Setup  -->
                                <div class="tab-pane fade show" id="price_list_settings-tab-pane" role="tabpanel" aria-labelledby="price_list_settings-tab" tabindex="0">
                                    <h5 class="text-danger m-0 mt-3"><b>PriceList Setup</b></h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">MRP Required Into PriceList Entry ?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="price_list_settings.mrp_required_into_pricelist_entry">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">No. Of MRP Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control form-control-sm" wire:model.defer="price_list_settings.no_of_mrp_required">
                                        </div>
                                    </div>
                                </div>

                                <!--Barcode  Setup  -->
                                <div class="tab-pane fade show" id="barcode_settings-tab-pane" role="tabpanel" aria-labelledby="barcode_settings-tab" tabindex="0">
                                    <h5 class="text-danger m-0 mt-3"><b>Barcode Setup</b></h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Continue Product Entry ?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="barcode_settings.continue_product_entry">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Cumulative Product Entry ?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="barcode_settings.cumulative_product_entry">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Barcode Validation Message Required ?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="barcode_settings.barcode_validation_message_required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Miltiple Barcode Entry Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="barcode_settings.miltiple_barcode_entry_required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Default Type</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control form-control-sm" wire:model.defer="barcode_settings.default_type">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Multiple Barcode Info Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="barcode_settings.multiple_barcode_info_required">
                                            </div>
                                        </div>
                                    </div>

                                    <h5 class="text-danger m-0 mt-3"><b>Barcode Setup For Sales Return</b></h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Continue Product Entry ?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="barcode_settings.barcode_continue_product_entry">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Cumulative Product Entry ?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="barcode_settings.barcode_cumulative_product_entry">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Same Party In Sales And Sales Return ?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="barcode_settings.same_party_in_sales_and_sales_return">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Share  Setup  -->
                                <div class="tab-pane fade show" id="share_settings-tab-pane" role="tabpanel" aria-labelledby="share_settings-tab" tabindex="0">
                                    <h5 class="text-danger m-0 mt-3"><b>Share Setup</b></h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Demat Account Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="share_settings.demat_account_required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Settlement is Required in F&O Entry</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="share_settings.settlement_is_required_f_o_entry">
                                            </div>
                                        </div>
                                    </div>

                                    <h5 class="text-danger m-0 mt-3"><b>STT Setup</b></h5>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Security Transaction Tax</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control form-control-sm" wire:model.defer="share_settings.security_transaction_tax">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Intraday Security Transaction Tax</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control form-control-sm" wire:model.defer="share_settings.intraday_security_transaction_tax">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">F&O Security Transaction Tax</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control form-control-sm" wire:model.defer="share_settings.f_o_security_transaction_tax">
                                        </div>
                                    </div>
                                </div>

                                <!--Jobwork Out Setup  -->
                                <div class="tab-pane fade show" id="jobwork_out_settings-tab-pane" role="tabpanel" aria-labelledby="jobwork_out_settings-tab" tabindex="0">
                                    <h5 class="text-danger m-0 mt-3"><b>Jobwork Out Setup</b></h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Raw Material To Finished Goods Tracking Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="jobwork_out_settings.raw_material_to_finished_goods_traking_required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Process Required In Jobwork Out?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="jobwork_out_settings.process_required_in_jobwork_out">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Consider Jobwork Out Issue Stock in Negative Stock</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="jobwork_out_settings.consider_jobwork_out_issue_stock_in_negative_stock">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Stock Rate For Input Products In Receipt Entry</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="jobwork_out_settings.stock_rate_for_input_product_in_receipt_entry">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Jobwork In Setup  -->
                                <div class="tab-pane fade show" id="jobwork_in_settings-tab-pane" role="tabpanel" aria-labelledby="jobwork_in_settings-tab" tabindex="0">
                                    <h5 class="text-danger m-0 mt-3"><b>Jobwork In Setup</b></h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Raw Material To Finished Goods Tracking Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="jobwork_in_settings.raw_material_to_finished_goods_traking_required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Process Required In Production ?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="jobwork_in_settings.process_required_in_production">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Sub Jobwork Required ?</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="jobwork_in_settings.sub_jobwork_required">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Consultant Setup  -->
                                <div class="tab-pane fade show" id="consultant_settings-tab-pane" role="tabpanel" aria-labelledby="consultant_settings-tab" tabindex="0">
                                    <h5 class="text-danger m-0 mt-3"><b>Consultant Required</b></h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">GST Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="consultant_settings.gst_required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Partial Final Invoice Allowed</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="consultant_settings.partial_final_invoice_allowed">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--APMC Setup  -->
                                <div class="tab-pane fade show" id="apmc_settings-tab-pane" role="tabpanel" aria-labelledby="apmc_settings-tab" tabindex="0">
                                    <h5 class="text-danger m-0 mt-3"><b>APMC Setup</b></h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Discount Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="apmc_settings.discount_required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Interest Required</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                                <input type="checkbox" class="form-check-input" wire:model.defer="apmc_settings.interest_required">
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