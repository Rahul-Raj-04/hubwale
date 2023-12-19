<section>
    <!-- Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('erp.setting.home')}}">Setting</a></li>
                        <li class="breadcrumb-item"><a href="{{route('erp.setting.home')}}">Company setting</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Address details</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none d-flex pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.setting.home') }}" class="btn btn-sm btn-default d-none d-sm-inline-block mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                            <a href="{{ route('erp.setting.home') }}" class="btn btn-sm btn-default d-sm-none mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                        </div>
                        <div class="btn-list">
                            <button class="btn btn-sm btn-primary d-none d-sm-inline-block me-0" type="submit" wire:click="submit">
                                <i class="fas fa-save me-1"></i>Save Address details 
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
                            <label for="address">Address <i class="text-danger">*</i></label>
                            <textarea class="form-control form-control-sm @error('address') is-invalid @enderror" id="address" rows="1"
                                wire:model="address"></textarea>
                            @error('address')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 mt-2">
                            <label for="country">Country <i class="text-danger">*</i></label>
                            <select class="form-select @error('country') is-invalid @enderror" id="country"
                                wire:model="country">
                                <option value="0" selected>Select country</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                            @error('country')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 mt-2">
                            <label for="state">State <i class="text-danger">*</i></label>
                            <select class="form-select @error('state') is-invalid @enderror" id="state"
                                wire:model="state">
                                <option value="0" selected>Select state</option>
                                @foreach ($states as $state)
                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                            @error('state')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 mt-2">
                            <label for="city">City <i class="text-danger">*</i></label>
                            <select class="form-select @error('city') is-invalid @enderror" id="city"
                                wire:model="city">
                                <option value="0" selected>Select city</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                            @error('city')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 mt-2">
                            <label for="pincode">Pincode <i class="text-danger">*</i></label>
                            <input type="text" class="form-control form-control-sm @error('pincode') is-invalid @enderror" id="pincode"
                                wire:model="pincode">
                            @error('pincode')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 mt-2">
                            <label for="phone_1">Phone 1</label>
                            <input type="text" class="form-control form-control-sm" id="phone_1" wire:model="phone_1">
                        </div>
                        <div class="form-group col-md-6 mt-2">
                            <label for="phone_2">Phone 2</label>
                            <input type="text" class="form-control form-control-sm" id="phone_2" wire:model="phone_2">
                        </div>
                        <div class="form-group col-md-6 mt-2">
                            <label for="mob_1">Mob 1</label>
                            <input type="text" class="form-control form-control-sm" id="mob_1" wire:model="mob_1">
                        </div>
                        <div class="form-group col-md-6 mt-2">
                            <label for="mob_2">Mob 2</label>
                            <input type="text" class="form-control form-control-sm" id="mob_2" wire:model="mob_2">
                        </div>
                        <div class="form-group col-md-6 mt-2">
                            <label for="fax">Fax</label>
                            <input type="text" class="form-control form-control-sm" id="fax" wire:model="fax">
                        </div>
                        <div class="form-group col-md-6 mt-2">
                            <label for="email">Email address</label>
                            <input type="text" class="form-control form-control-sm @error('email') is-invalid @enderror" id="email"
                                wire:model="email">
                            @error('email')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 mt-2">
                            <label for="website">Website</label>
                            <input type="text" class="form-control form-control-sm" id="website" wire:model="website">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row END -->
    
</section>
