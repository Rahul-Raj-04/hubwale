<div>
    <div class="container-xl my-2 pb-3 px-3 card">
        {{-- steps --}}
        <section>
            <div class="d-flex justify-content-center flex-wrap p-3">
                <div
                    class="d-flex align-items-center btn py-2 px-1 mx-2 @if ($currentStep !== 1) btn-default @else btn-primary @endif">
                    <i class="far fa-building"></i>
                    <p class="m-0 mx-2">Company details</p>
                </div>
                <div
                    class="d-flex align-items-center btn py-2 px-1 mx-2 @if ($currentStep !== 2) btn-default @else btn-primary @endif">
                    <i class="fas fa-gavel"></i>
                    <p class="m-0 mx-2">Statutory details</p>
                </div>
                <div
                    class="d-flex align-items-center btn py-2 px-1 mx-2 @if ($currentStep !== 3) btn-default @else btn-primary @endif">
                    <i class="far fa-address-card"></i>
                    <p class="m-0 mx-2">Address details</p>
                </div>
                <div
                    class="d-flex align-items-center btn py-2 px-1 mx-2 @if ($currentStep !== 4) btn-default @else btn-primary @endif">
                    <i class="fas fa-university"></i>
                    <p class="m-0 mx-2">Bank details</p>
                </div>
                <div class="d-flex align-items-center btn btn-sm btn-default py-2 px-1 mx-2 d-none">
                    <i class="far fa-question-circle"></i>
                    <p class="m-0 mx-2">Alter language</p>
                </div>
            </div>
        </section>

        {{-- step 1 --}}
        <section class="@if ($currentStep !== 1) d-none @endif">
            <div class="form-row row">
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    @if ($logo)
                        @error('logo')
                            <span class="text-danger small wow flash">{{ $message }}</span>
                        @else
                            <img src="{{ $logo->temporaryUrl() }}" style="height:200px;width:200px;" class="bg-secondary">
                        @enderror
                    @else
                        <label for="logo" class="card d-flex justify-content-center align-items-center text-muted"
                            style="height:200px;width:200px;">
                            <small class="text-muted">Upload company logo</small>
                        </label>
                    @endif
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="logo">Company logo</label>
                        <input type="file" class="form-control form-control-sm @error('logo') is-invalid @enderror" id="logo"
                            wire:model="logo">
                        {{-- @error('logo')
                            <span class="text-danger small wow flash">{{ $message }}</span>
                        @enderror --}}
                    </div>
                    <div class="form-group mt-2">
                        <label for="company_number">Number <i class="text-danger">*</i></label>
                        <input type="text" class="form-control form-control-sm @error('company_number') is-invalid @enderror"
                            id="company_number" wire:model="company_number">
                        @error('company_number')
                            <span class="text-danger small wow flash">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="language">Language</label>
                        <select class="form-select @error('language') is-invalid @enderror" id="language"
                            wire:model="language">
                            <option value="en" selected>English</option>
                            <option value="gj">Gujarati</option>
                        </select>
                        @error('language')
                            <span class="text-danger small wow flash">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <hr />
            <div class="form-row row">
                <div class="form-group col-md-4">
                    <label for="name">Company name <i class="text-danger">*</i></label>
                    <input type="text" class="form-control form-control-sm @error('company_name') is-invalid @enderror"
                        id="company_name" wire:model="company_name">
                    @error('company_name')
                        <span class="text-danger small wow flash">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="short_name">Short Name</label>
                    <input type="text" class="form-control form-control-sm" id="short_name" wire:model="short_name">
                </div>
                <div class="form-column col-md-4">
                    <div class="form-group col-md-12">
                        <label for="group_name">Group name</label>
                        <input type="text" class="form-control form-control-sm" id="group_name" wire:model="group_name">
                    </div>
                </div>
            </div>
            <div class="form-row row mt-2">
                <div class="form-group col-md-6">
                    <label for="fin_year_from">Financial year from</label>
                    <input type="text" class="form-control form-control-sm @error('fin_year_from') is-invalid @enderror"
                        id="fin_year_from" wire:model="fin_year_from" placeholder="Select date">
                    @error('fin_year_from')
                        <span class="text-danger small wow flash">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="fin_year_to">Financial year to</label>
                    <input type="text" class="form-control form-control-sm @error('fin_year_to') is-invalid @enderror"
                        id="fin_year_to" wire:model="fin_year_to" placeholder="Select date">
                    @error('fin_year_to')
                        <span class="text-danger small wow flash">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-row row mt-2">
                <div class="form-group col-md-6">
                    <label for="security_type">Security type</label>
                    <select class="form-select" id="security_type" wire:model="security_type">
                        <option value="0">Without password</option>
                        <option value="1">With password</option>
                    </select>
                </div>
                @if ($security_type)
                    <div class="form-group col-md-6">
                        <label for="password">Password</label>
                        <input type="password" class="form-control form-control-sm @error('password') is-invalid @enderror"
                            id="password" wire:model="password">
                        @error('password')
                            <span class="text-danger small wow flash">{{ $message }}</span>
                        @enderror
                    </div>
                @endif
            </div>
            <hr />
            <div>
                <p class="h5">Report description</p>
                <div class="form-row row mt-2">
                    <div class="form-group col-md-6">
                        <label for="report_header">Report header</label>
                        <input type="text" class="form-control form-control-sm" id="report_header" wire:model="report_header">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="jurisdiction_city">Jurisdiction city</label>
                        <input type="text" class="form-control form-control-sm" id="jurisdiction_city"
                            wire:model="jurisdiction_city">
                    </div>
                </div>
            </div>

            <div class="form-group col-md-12 mt-2">
                <input type="checkbox" class="form-check-input me-2" id="auto_gst" placeholder="Report header"
                    wire:model="auto_gst">
                <label for="auto_gst">Auto GST</label>
            </div>
        </section>

        {{-- step 2 --}}
        <section class="@if ($currentStep !== 2) d-none @endif">
            <div class="form-row row">
                <div class="form-group col-md-6">
                    <label for="pan">PAN</label>
                    <input type="text" class="form-control form-control-sm" id="pan" wire:model="pan">
                </div>
                <div class="form-group col-md-6">
                    <label for="gstin">GSTIN</label>
                    <input type="text" class="form-control form-control-sm" id="gstin" wire:model="gstin">
                </div>
            </div>
            <div class="form-row row mt-2">
                <div class="form-group col-md-6">
                    <label for="aadhar">Aadhar</label>
                    <input type="text" class="form-control form-control-sm" id="aadhar" wire:model="aadhar">
                </div>
                <div class="form-group col-md-6">
                    <label for="tin">TIN</label>
                    <input type="text" class="form-control form-control-sm" id="tin" wire:model="tin">
                </div>
            </div>
            <div class="form-row row mt-2">
                <div class="form-group col-md-6">
                    <label for="cst">CST</label>
                    <input type="text" class="form-control form-control-sm" id="cst" wire:model="cst">
                </div>
                <div class="form-group col-md-6">
                    <label for="tan">TAN</label>
                    <input type="text" class="form-control form-control-sm" id="tan" wire:model="tan">
                </div>
            </div>
            <div class="form-row row mt-2">
                <div class="form-group col-md-6">
                    <label for="ecc">ECC</label>
                    <input type="text" class="form-control form-control-sm" id="ecc" wire:model="ecc">
                </div>
                <div class="form-group col-md-6">
                    <label for="importer_ecc_no">Importer ecc no.</label>
                    <input type="text" class="form-control form-control-sm" id="importer_ecc_no" wire:model="importer_ecc_no">
                </div>
            </div>
            <div class="form-row row mt-2">
                <div class="form-group col-md-6">
                    <label for="service_tax_no">Service tax no.</label>
                    <input type="text" class="form-control form-control-sm" id="service_tax_no" wire:model="service_tax_no">
                </div>
                <div class="form-group col-md-6">
                    <label for="ssi_no">SSI no.</label>
                    <input type="text" class="form-control form-control-sm" id="ssi_no" wire:model="ssi_no">
                </div>
            </div>
            <div class="form-row row mt-2">
                <div class="form-group col-md-6">
                    <label for="generel_lic_no">Generel lic. no.</label>
                    <input type="text" class="form-control form-control-sm" id="generel_lic_no" wire:model="generel_lic_no">
                </div>
                <div class="form-group col-md-6">
                    <label for="wholesale_agent_lic_no">Wholesale agent lic. no.</label>
                    <input type="text" class="form-control form-control-sm" id="wholesale_agent_lic_no"
                        wire:model="wholesale_agent_lic_no">
                </div>
            </div>
            <div class="form-row row mt-2">
                <div class="form-group col-md-6">
                    <label for="commission_lic_no">Commission lic. no.</label>
                    <input type="text" class="form-control form-control-sm" id="commission_lic_no"
                        wire:model="commission_lic_no">
                </div>
                <div class="form-group col-md-6">
                    <label for="drug_lic_no">Drug lic. no.</label>
                    <input type="text" class="form-control form-control-sm" id="drug_lic_no" wire:model="drug_lic_no">
                </div>
            </div>
            <div class="form-row row mt-2">
                <div class="form-group col-md-6">
                    <label for="cin_no">CIN no.</label>
                    <input type="text" class="form-control form-control-sm" id="cin_no" wire:model="cin_no">
                </div>
                <div class="form-group col-md-6">
                    <label for="food_product_lic_no">Food product lic. no.</label>
                    <input type="text" class="form-control form-control-sm" id="food_product_lic_no"
                        wire:model="food_product_lic_no">
                </div>
            </div>
        </section>

        {{-- step 3 --}}
        <section class="@if ($currentStep !== 3) d-none @endif">
            <div class="form-row row mt-2">
                <div class="form-group col-md-6">
                    <label for="address">Address <i class="text-danger">*</i></label>
                    <textarea class="form-control form-control-sm @error('address') is-invalid @enderror" id="address" rows="1"
                        wire:model="address"></textarea>
                    @error('address')
                        <span class="text-danger small wow flash">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="country">Country <i class="text-danger">*</i></label>
                    <select class="form-select @error('country') is-invalid @enderror" id="country"
                        wire:model="country">
                        <option value="0">Select country</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                    @error('country')
                        <span class="text-danger small wow flash">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-row row mt-2">
                <div class="form-group col-md-6">
                    <label for="state">State <i class="text-danger">*</i></label>
                    <select class="form-select @error('state') is-invalid @enderror" id="state"
                        wire:model="state">
                        <option value="0">Select state</option>
                        @foreach ($states as $state)
                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                        @endforeach
                    </select>
                    @error('state')
                        <span class="text-danger small wow flash">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="city">City <i class="text-danger">*</i></label>
                    <select class="form-select @error('city') is-invalid @enderror" id="city"
                        wire:model="city">
                        <option value="0">Select city</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                    @error('city')
                        <span class="text-danger small wow flash">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-row row mt-2">
                <div class="form-group col-md-6">
                    <label for="pincode">Pincode <i class="text-danger">*</i></label>
                    <input type="text" class="form-control form-control-sm @error('pincode') is-invalid @enderror" id="pincode"
                        wire:model="pincode">
                    @error('pincode')
                        <span class="text-danger small wow flash">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <hr />
            <div class="form-row row mt-2">
                <div class="form-group col-md-6">
                    <label for="phone_1">Phone 1</label>
                    <input type="text" class="form-control form-control-sm" id="phone_1" wire:model="phone_1">
                </div>
                <div class="form-group col-md-6">
                    <label for="phone_2">Phone 2</label>
                    <input type="text" class="form-control form-control-sm" id="phone_2" wire:model="phone_2">
                </div>
            </div>
            <div class="form-row row mt-2">
                <div class="form-group col-md-6">
                    <label for="mob_1">Mob 1</label>
                    <input type="text" class="form-control form-control-sm" id="mob_1" wire:model="mob_1">
                </div>
                <div class="form-group col-md-6">
                    <label for="mob_2">Mob 2</label>
                    <input type="text" class="form-control form-control-sm" id="mob_2" wire:model="mob_2">
                </div>
            </div>
            <div class="form-row row mt-2">
                <div class="form-group col-md-6">
                    <label for="fax">Fax</label>
                    <input type="text" class="form-control form-control-sm" id="fax" wire:model="fax">
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email address</label>
                    <input type="text" class="form-control form-control-sm @error('email') is-invalid @enderror" id="email"
                        wire:model="email">
                    @error('email')
                        <span class="text-danger small wow flash">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-row row mt-2">
                <div class="form-group col-md-6">
                    <label for="website">Website</label>
                    <input type="text" class="form-control form-control-sm" id="website" wire:model="website">
                </div>
            </div>
        </section>

        {{-- step 4 --}}
        <section class="@if ($currentStep !== 4) d-none @endif">
            <div class="form-row row mt-2">
                <div class="form-group col-md-6">
                    <label for="bank_name">Bank name</label>
                    <input type="text" class="form-control form-control-sm" id="bank_name" wire:model="bank_name">
                </div>
                <div class="form-group col-md-6">
                    <label for="branch_name">Branch name</label>
                    <input type="text" class="form-control form-control-sm" id="branch_name" wire:model="branch_name">
                </div>
            </div>
            <div class="form-row row mt-2">
                <div class="form-group col-md-6">
                    <label for="bank_address">Bank address</label>
                    <input type="text" class="form-control form-control-sm" id="bank_address" wire:model="bank_address">
                </div>
                <div class="form-group col-md-6">
                    <label for="bank_ifsc">Bank ifsc</label>
                    <input type="text" class="form-control form-control-sm" id="bank_ifsc" wire:model="bank_ifsc">
                </div>
            </div>
            <div class="form-row row mt-2">
                <div class="form-group col-md-6">
                    <label for="bank_ac_no">Bank A/C no.</label>
                    <input type="text" class="form-control form-control-sm" id="bank_ac_no" wire:model="bank_ac_no">
                </div>
                <div class="form-group col-md-6">
                    <label for="iban_no">IBAN no.</label>
                    <input type="text" class="form-control form-control-sm" id="iban_no" wire:model="iban_no">
                </div>
            </div>
            <div class="form-row row mt-2">
                <div class="form-group col-md-6">
                    <label for="swift_code">Swift code</label>
                    <input type="text" class="form-control form-control-sm" id="swift_code" wire:model="swift_code">
                </div>
                <div class="form-group col-md-6">
                    <label for="upi_code">UPI code</label>
                    <input type="text" class="form-control form-control-sm" id="upi_code" wire:model="upi_code">
                </div>
            </div>
            <div class="form-row row mt-2">
                <div class="form-group col-md-6">
                    <label for="upi_id">UPI id</label>
                    <input type="text" class="form-control form-control-sm" id="upi_id" wire:model="upi_id">
                </div>
            </div>
        </section>

        <div class="mt-2">
            <div class="float-end">
                @if ($currentStep !== 1)
                    <button class="btn btn-outline-primary me-2" type="submit" wire:click="previousStep">
                        <i class="fas fa-chevron-left me-2"></i> Previous
                    </button>
                @endif
                <button class="btn btn-outline-primary" type="submit" wire:click="nextStep">
                    @if ($currentStep == 4)
                        <i class="far fa-save me-2"></i> Save
                    @else
                        Next <i class="fas fa-chevron-right ms-2"></i>
                    @endif
                </button>
            </div>
        </div>
    </div>
    <script>
        $("#fin_year_from").datepicker({
            format: "dd/mm/yy",
            autoclose: true,
            orientation: "auto"
        });
        $("#fin_year_to").datepicker({
            format: "dd/mm/yy",
            autoclose: true,
            orientation: "auto"
        });
    </script>
</div>
