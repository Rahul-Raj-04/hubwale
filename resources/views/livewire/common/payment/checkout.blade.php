    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="py-5 text-center">
                <img class="d-block mx-auto mb-3" src="{{ asset('img/new/blue-bg-small.png') }}" height="70" />
                <h2>Checkout</h2>
            </div>
            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">Plan Details</span>
                    </h4>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between">
                            <button
                                class="w-100 btn @if ($validity == 'm') btn-primary @else btn-outlined-primary @endif"
                                wire:click="changeValidity('m')">Monthly</button>
                            <button
                                class="w-100 btn @if ($validity == 'y') btn-primary @else btn-outlined-primary @endif"
                                wire:click="changeValidity('y')">Yearly</button>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">{{ $plan->name }}</h6>
                                <small class="text-muted">{{ $plan->description }}</small>
                            </div>
                            <span class="text-muted">
                                @if ($validity == 'y')
                                    {{ $plan->yearly_price }}
                                @else
                                    {{ $plan->monthly_price }}
                                @endif
                                ₹
                            </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">Tax</h6>
                                <small class="text-muted">0% GST</small>
                            </div>
                            <span class="text-muted">0 ₹</span>
                        </li>
                        @if ($coupon)
                            <li class="list-group-item d-flex justify-content-between bg-light">
                                <div class="text-success">
                                    <h6 class="my-0">Coupon code</h6>
                                    <small>{{ $coupon->code }}</small>
                                </div>
                                <span class="text-success">-{{ $coupon_discount }} ₹</span>
                            </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (INR)</span>
                            <strong>
                                @if ($validity == 'y')
                                    {{ $plan->yearly_price - $coupon_discount }}
                                @else
                                    {{ $plan->monthly_price - $coupon_discount }}
                                @endif
                                ₹
                            </strong>
                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                            <button type="button" class="w-100 btn btn-primary btn-lg" wire:click.prevent='submit'>Pay</button>
                        </li>
                    </ul>

                    <form class="card p-2" wire:submit.prevent="applyCoupon">
                        <div class="input-group">
                            <input type="text" class="form-control @error('coupon_code') is-invalid @enderror"
                                placeholder="Coupon code" wire:model='coupon_code'>
                            <button type="submit" class="btn btn-secondary">Apply</button>
                        </div>
                        @error('coupon_code')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </form>
                </div>
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Account details</h4>
                    @guest
                        <form class="needs-validation">
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="fullName" class="form-label">Full name</label>
                                    <input type="text" class="form-control" id="fullName"
                                        placeholder="Enter your full name" wire:model='full_name'>
                                    @error('full_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-sm-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email"
                                        placeholder="Enter your email address" wire:model='email'>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="mobile" class="form-label">Mobile number</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text">+91</span>
                                        <input type="text" class="form-control" id="mobile"
                                            placeholder="Enter your mobile number" wire:model='mobile'>
                                    </div>
                                    @error('mobile')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" wire:model='password'>
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="confirm_password" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirm_password"
                                        wire:model='confirm_password'>
                                    @error('confirm_password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('referral_code') is-invalid @enderror"
                                            placeholder="Referral code" wire:model='referral_code'>
                                        <a class="btn btn-secondary text-white" wire:click="applyReferralCode">Apply</a>
                                    </div>
                                    @error('referral_code')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </form>
                    @endguest

                    @auth
                        <div>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label class="form-label">Full name</label>
                                    <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly
                                        disabled>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" value="{{ auth()->user()->email }}"
                                        readonly disabled>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label">Mobile Number</label>
                                    <input type="text" class="form-control" value="+91 {{ auth()->user()->mobile }}"
                                        readonly disabled>
                                </div>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
