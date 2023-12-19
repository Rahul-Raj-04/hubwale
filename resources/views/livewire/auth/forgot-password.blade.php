<section>
    @push('style')
    <style type="text/css">
        @media only screen and (min-width: 480px) {
            .wrap-login100 {
                width: 450px;
            }
        }
    </style>
    @endpush
    <!-- BACKGROUND-IMAGE -->
    <div class="app sidebar-mini ltr login-img">
        <!-- PAGE -->
        <div class="page">
            <div class="">
                <!-- CONTAINER OPEN -->
                <div class="col col-login mx-auto mt-7">
                    <div class="text-center">
                        <a href="javascript:void(0)"><img src="{{ asset('img/new/white-horizontal.png') }}"
                                class="header-brand-img" alt="" height="60"></a>
                    </div>
                </div>

                <div class="container-login100">
                    <div class="wrap-login100 p-6">
                        <div>
                            <span class="login100-form-title pb-5">
                                Forgot Password
                            </span>
                            <div wire:loading class="w-100">
                                <span class="d-flex flex-column align-items-center">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="sr-only"></span>
                                    </div>
                                    <p>Please wait....</p>
                                </span>
                            </div>
                            <div class="panel panel-primary">
                                <div class="tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs d-none">
                                            <li class="mx-0"><a href="#tab5" class="active"
                                                    data-bs-toggle="tab">Email</a></li>
                                            <li class="mx-0"><a href="#tab6" data-bs-toggle="tab">Mobile</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body p-0 pt-5">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab5">
                                            <div class="form-outline mb-3">
                                                <input type="text"
                                                    class="form-control form-control-lg @error('emailOrMobile') is-invalid @enderror"
                                                    id="email" placeholder="Enter email or mobile"
                                                    wire:model.defer="emailOrMobile" {{ $isOtpSent ? "disabled" : '' }}>
                                                @error('emailOrMobile')
                                                <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            @if ($isOtpSent)
                                                <div class="form-outline mb-3">
                                                    <input type="number" class="form-control form-control-lg @error('otp') is-invalid @enderror" id="otp"
                                                        placeholder="Enter OTP" wire:model.defer="otp">
                                                    @error('otp')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-outline mb-3">
                                                    <input type="text" class="form-control form-control-lg @error('password') is-invalid @enderror" id="otp"
                                                        placeholder="Enter new password" wire:model.defer="password">
                                                    @error('password')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-outline mb-3">
                                                    <input type="text" class="form-control form-control-lg @error('confirmPassword') is-invalid @enderror" id="confirmPassword"
                                                        placeholder="Confirm password" wire:model.defer="confirmPassword">
                                                    @error('confirmPassword')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div style="max-width: 24em;">
                                                    <small class="form-text text-muted" style="font-size:0.7rem">Password must be 8-20 characters long, contain minimum 1
                                                        uppercase, 1 special character and 1 number.</small>
                                                </div>
                                            @endif
                                            <div class="container-login100-form-btn">
                                                @if ($isOtpSent)
                                                    <button class="btn btn-primary btn-lg w-100" wire:click='submitOtp'>Submit</button>
                                                @else
                                                    <button class="btn btn-primary btn-lg w-100" wire:click='sendOtp'>Send OTP To Email</button>
                                                @endif
                                            </div>
                                            <div class="text-center pt-3">
                                                <p class="text-dark mb-0">Want to Sign In?<a href="{{ route('login') }}" class="text-primary ms-1">Sign In</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- End PAGE -->

    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->
</section>