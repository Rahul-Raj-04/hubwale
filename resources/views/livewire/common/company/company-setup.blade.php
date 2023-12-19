<section>
    <div class="app sidebar-mini ltr login-img">
        <!-- PAGE -->
        <div class="page">
            <div class="">
                <!-- CONTAINER OPEN -->
                <div class="col col-login mx-auto mt-7">
                    <div class="text-center">
                        <a href=""><img src="{{ asset('img/new/white-horizontal.png') }}" class="header-brand-img m-0" alt="" height="75"></a>
                    </div>
                </div>
                <div class="container-login100">
                    <div class="wrap-login100 p-6"  style="min-width: 700px">
                        <form wire:submit.prevent="submit">
                            <span class="login100-form-title" style="color: #2779e2;">
                                Company details
                            </span>
                            <!-- logo input -->
                           	<div class="form-group">
		                        <label for="logo">Company logo<i class="text-danger">*</i></label>
		                        <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo"
		                            wire:model.defer="logo">
		                        @error('logo')
		                            <span class="text-danger small wow flash">{{ $message }}</span>
		                        @enderror
		                    </div>
                        <!-- Name input -->
                            <div class="form-outline mb-3">
		                        <label for="logo">Company name <i class="text-danger">*</i></label>
                                <input type="name" class="form-control form-control-lg @error('company_name') is-invalid @enderror" id="name"
                                    placeholder="Enter company name" wire:model.defer="company_name">
                                @error('company_name')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-3">
		                        <label for="logo">Company address <i class="text-danger">*</i></label>
                                <textarea class="form-control @error('address') is-invalid @enderror" id="address" rows="2" placeholder="Enter address"
			                        wire:model.defer="address"></textarea>
			                    @error('address')
			                        <span class="text-danger small wow flash">{{ $message }}</span>
			                    @enderror
                            </div>
                            <div class="form-outline mb-3">
			                    <label for="email">Email address <i class="text-danger">*</i></label>
			                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email"
			                        wire:model.defer="email">
			                    @error('email')
			                        <span class="text-danger small wow flash">{{ $message }}</span>
			                    @enderror
			                </div>
			                <div class="form-outline mb-3">
			                    <label for="country">Business Type<i class="text-danger">*</i></label>
				                <select class="form-select @error('business_type') is-invalid @enderror" id="country" wire:model.defer="business_type">
									<option value="0">Select business type</option>
				                    @foreach ($business_types as $business_type)
										<option value="{{ $business_type->id }}">{{ $business_type->name }}</option>
				                    @endforeach
				                </select>
				                @error('business_type')
				                 	<span class="text-danger small wow flash">{{ $message }}</span>
				                @enderror
			                </div>
            				<div class="form-row row mt-2">
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
			            </div>
            			<div class="form-row row mt-2">
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
			                <div class="form-group col-md-6">
			                    <label for="pincode">Pincode <i class="text-danger">*</i></label>
			                    <input type="text" class="form-control @error('pincode') is-invalid @enderror" id="pincode" placeholder="Enter pincode"
			                        wire:model.defer="pincode">
			                    @error('pincode')
			                        <span class="text-danger small wow flash">{{ $message }}</span>
			                    @enderror
			                </div>
		                </div>
			            <div class="form-row row mt-2">
			                <div class="form-group col-md-6">
			                    <label for="phone_1">Phone 1 <i class="text-danger">*</i></label>
			                    <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="phone_1" placeholder="Enter phone 1" wire:model.defer="phone_1">
			                    @error('phone_1')
			                        <span class="text-danger small wow flash">{{ $message }}</span>
			                    @enderror
			                </div>
			                <div class="form-group col-md-6">
			                    <label for="phone_2">Phone 2</label>
			                    <input type="text" placeholder="Enter phone 2"class="form-control" id="phone_2" wire:model.defer="phone_2">
			                </div>
			            </div>
			            <div class="form-row row mt-2">
			                <div class="form-group col-md-6">
			                    <label for="mob_1">Mob 1</label>
			                    <input type="text" placeholder="Enter mob 1"class="form-control" id="mob_1" wire:model.defer="mob_1">
			                </div>
			                <div class="form-group col-md-6">
			                    <label for="mob_2">Mob 2</label>
			                    <input type="text" placeholder="Enter mob 2" class="form-control" id="mob_2" wire:model.defer="mob_2">
			                </div>
			            </div>
			            <div class="form-row row mt-2">
			                <div class="form-group col-md-6">
			                    <label for="fax">Fax</label>
			                    <input type="text" placeholder="Enter fax"class="form-control" id="fax" wire:model.defer="fax">
			                </div>
			                <div class="form-group col-md-6">
			                    <label for="website">Website</label>
			                    <input type="text" placeholder="Enter website" class="form-control" id="website" wire:model.defer="website">
			                </div>
			            </div>
                        <div class="text-center text-lg-start mt-4 pt-2">
                                <button type="submit" class="btn btn-primary btn-lg w-100"><span wire:loading wire:target="submit"><span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>Saving ...</span><span wire:loading.class="d-none" wire:target="submit" class="">Save</span></button>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- END PAGE -->
    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->
</section>