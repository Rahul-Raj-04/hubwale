<section>
    <!-- Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('erp.setting.home')}}">Setting</a></li>
                        <li class="breadcrumb-item"><a href="{{route('erp.setting.home')}}">Company setting</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Company details</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none d-flex pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.setting.home') }}" class="btn btn-sm btn-default d-none d-sm-inline-block mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                            <a href="{{ route('erp.setting.home') }}" class="btn btn-sm btn-default d-sm-none mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                        </div>
                        <div class="btn-list">
                            <button class="btn btn-sm btn-primary d-none d-sm-inline-block me-0" type="submit" wire:click="submit">
                                <i class="fas fa-save me-1"></i>Save Company details 
                            </button>
                            <button class="btn btn-sm btn-primary d-sm-none btn-icon me-0" type="submit" wire:click="submit">
                                <i class="fas fa-plus mx-2"></i>
                            </button>
                        </div>                        
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-row row">
                        <div class="col-md-6 d-flex justify-content-center align-items-center">
                            @if ($logo)
                                @error('logo')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @else
                                    <img src="{{ $logo->temporaryUrl() }}" style="height:200px;width:200px;" class="bg-secondary">
                                @enderror
                            @elseif(auth()->user()->company->logo)
                                @error('logo')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @else
                                    <img src="{{ auth()->user()->company->logo }}" style="height:200px;width:200px;" class="bg-secondary">
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
                        <div class="form-group col-md-4">
                            <label for="group_name">Group name</label>
                            <input type="text" class="form-control form-control-sm" id="group_name" wire:model="group_name">
                        </div>
                    </div>
                    <div class="form-row row mt-2">
                        <div class="form-group col-md-6">
                            <label for="fin_year_from">Financial year from</label>
                            <input type="text" class="form-control form-control-sm @error('fin_year_from') is-invalid @enderror"
                                id="fin_year_from" wire:model="fin_year_from" placeholder="Select date" autocomplete="off" data-provide="datepicker" data-date-autoclose="true" data-date-format="dd/mm/yyyy" data-date-today-highlight="true" onchange="this.dispatchEvent(new InputEvent('input'))">
                            @error('fin_year_from')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="fin_year_to">Financial year to</label>
                            <input type="text" class="form-control form-control-sm @error('fin_year_to') is-invalid @enderror"
                                id="fin_year_to" wire:model="fin_year_to" placeholder="Select date" autocomplete="off" data-provide="datepicker" data-date-autoclose="true" data-date-format="dd/mm/yyyy" data-date-today-highlight="true" onchange="this.dispatchEvent(new InputEvent('input'))">
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
                    <hr class="bg-dark">
                    <div>
                        <h4 class="card-title">Report description</h4>
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

                    <div class="form-group col-md-12 mt-2 ms-2">
                        <input type="checkbox" class="form-check-input me-2" id="auto_gst" wire:model="auto_gst">
                        <label for="auto_gst">Auto GST</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row END -->

    <script>
          document.addEventListener('livewire:load', function () {
            $("#fin_year_from").datepicker({
                format: "dd/mm/yyyy",
                autoclose: true,
                orientation: "auto"
            });
            $("#fin_year_to").datepicker({
                format: "dd/mm/yyyy",
                autoclose: true,
                orientation: "auto"
            });
        })
    </script>

</section>








