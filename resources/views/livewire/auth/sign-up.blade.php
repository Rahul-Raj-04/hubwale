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
                    <div class="wrap-login100 p-6">
                        <form wire:submit.prevent="submit">
                            <span class="login100-form-title">
                                        Registration
                            </span>
                        <!-- Name input -->
                            <div class="form-outline mb-3">
                                <input type="name" class="form-control form-control-lg @error('name') is-invalid @enderror" id="name"
                                    placeholder="Enter your full name" wire:model="name">
                                @error('name')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-3">
                                <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email"
                                    placeholder="Enter a your email address" wire:model="email">
                                @error('email')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- mobile input -->
                            <div class="form-outline mb-3">
                                <div class="input-group">
                                    <span class="input-group-text">+91</span>
                                    <input type="text" class="form-control form-control-lg @error('mobile') is-invalid @enderror"
                                        placeholder="Enter your mobile number" id="mobile" wire:model="mobile">
                                </div>
                                @error('mobile')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-3">
                                <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password"
                                    placeholder="Enter your password" wire:model="password">
                                <div style="max-width: 24em;">
                                    <small class="form-text text-muted" style="font-size:0.7rem">Password must be 8-20 characters long, contain  minimum 1 uppercase, 1 special character and 1 number.</small>
                                </div>
                                @error('password')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Confirm password input -->
                            <div class="form-outline mb-3">
                                <input type="password" class="form-control form-control-lg @error('confirm_password') is-invalid @enderror" id="confirm_password"
                                    placeholder="Re-enter your password" wire:model="confirm_password">
                                @error('confirm_password')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- Referral code input -->
                            <div class="form-outline mb-3">
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-lg @error('referral_code') is-invalid @enderror"
                                        placeholder="Referral code" wire:model='referral_code'>
                                    <a class="btn btn-primary pt-2" wire:click="applyReferralCode">Apply</a>
                                </div>
                                @error('referral_code')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="text-center text-lg-start mt-4 pt-2">
                                <button type="submit" class="btn btn-primary btn-lg w-100">Create Account</button>
                                <small style="font-size: .7rem">By tapping "Create account" you agree to our Terms & Conditions.</small>
                            </div>
                            <div class="text-center pt-3">
                                <p class="text-dark mb-0">Already have account?<a href="{{ route('login') }}" class="text-primary ms-1">Sign In</a></p>
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