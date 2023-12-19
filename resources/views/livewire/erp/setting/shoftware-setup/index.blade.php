<section>
<!--app-content open-->
    <div class="row row-sm m-1">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header p-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Setup</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Shoftware setup</a></li>
                    </ol>
                </div>
                <div class="card-body p-3" style="height: 500px;overflow-y: scroll;">
                    <div class="row">
                        <div class="col-md-3 border" style="height: 500px;overflow-y: scroll;">
                            <ul class="nav nav-tabs flex-column" id="myTab" role="tablist">
                                <li role="presentation">
                                    <h4 class="ps-5"><b>Category</b></h4>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" style="width: 100%" id="shoftware-setup-tab" data-bs-toggle="tab" data-bs-target="#shoftware-setup-tab-pane" type="button" role="tab" 
                                     aria-controls="shoftware-setup-tab-pane" aria-selected="true">Shoftware Setup
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content col-md-9 border" id="myTabContent" style="height: 500px;overflow-y: scroll;">
                            <div class="tab-pane fade show active" id="shoftware-setup-tab-pane" role="tabpanel" aria-labelledby="shoftware-setup-tab" tabindex="0">
                                <h5 class="text-danger m-0 mt-3"><b>Backup Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Backup</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer="shoftware_setting.auto_backup"> 
                                            <option value="None">None</option>
                                            <option value="Ask">Ask</option>
                                            <option value="Automatic">Automatic</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Backup Location</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model="shoftware_setting.auto_backup_location">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Daily/Monthly Backup</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer="shoftware_setting.daily_monthly_backup"> 
                                            <option value="None">None</option>
                                            <option value="Daily">Daily</option>
                                            <option value="Monthly">Monthly</option>
                                            <option value="Both">Both</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Secure Backup Against Ransomware</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model="shoftware_setting.secure_backup_against_ransomware">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Language Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Multi Language Support Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model="shoftware_setting.multi_language_support_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Activation Key</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer="shoftware_setting.activation_key"> 
                                            <option value="Caps Lock">Caps Lock</option>
                                            <option value="Scroll Lock">Scroll Lock</option>
                                            <option value="None</">None</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Gujrati Keyboard Layout</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer="shoftware_setting.gujrati_keyboard_layout"> 
                                            <option value="Inscript">Inscript</option>
                                            <option value="Type Writ">Type Writer</option>
                                            <option value="New Phonet">New Phonetic</option>
                                            <option value="Phonetic">Phonetic</option>
                                            <option value="Inscript">Inscript</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Hindi Keyboard Layout</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer="shoftware_setting.hindi_keyboard_layout"> 
                                            <option value="Inscript">Inscript</option>
                                            <option value="Type Writ">Type Writer</option>
                                            <option value="New Phonet">New Phonetic</option>
                                            <option value="Phonetic">Phonetic</option>
                                            <option value="Inscript">Inscript</option>
                                        </select>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Other Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Security Type</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control form-control-sm" wire:model="shoftware_setting.security_type">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Before Company Password Required?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model="shoftware_setting.before_company_password_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">LAN Server Computer Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control form-control-sm" wire:model="shoftware_setting.lan_server_computer_name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Temporary Path</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer="shoftware_setting.temporary_path"> 
                                            <option value="Miracle Default">Miracle Default</option>
                                            <option value="Windows Default">Windows Default</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Company List</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer="shoftware_setting.company_list"> 
                                            <option value="Predefined">Predefined</option>
                                            <option value="Default">Default</option>
                                        </select>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Searching Option</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Default Search Type In Popup/Report</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer="shoftware_setting.default_search_type_in_popup_report"> 
                                            <option value="List">List</option>
                                            <option value="M-search">M-search</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Save last search type</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model="shoftware_setting.save_last_search_type">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>WhatsApp Option</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">WhatsApp Facility Required ?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model="shoftware_setting.whatsApp_facility_required">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Telegram Option</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Telegram Facility Required ?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model="shoftware_setting.telegram_facility_required">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Android/IOS Syncronization Option</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Android/IOS Syncronization Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model="shoftware_setting.android_ios_syncronization_required">
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