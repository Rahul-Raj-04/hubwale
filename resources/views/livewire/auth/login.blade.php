<section>
@push('style')
    <style type="text/css">
        @media only screen and (min-width: 480px)  {
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
                        <a href="javascript:void(0)"><img src="{{ asset('img/new/white-horizontal.png') }}" class="header-brand-img" alt="" height="60"></a>
                    </div>
                </div>

                <div class="container-login100">
                    <div class="wrap-login100 p-6">
                        <form wire:submit.prevent="submit">
                            <span class="login100-form-title pb-5">
                                Login
                            </span>
                            @if(session()->has('message'))
                                <div class="alert alert-success" role="alert">
                                    <span class="alert-inner--icon">
                                        <i class="fe fe-thumbs-up"></i>
                                    </span>
                                    <span class="alert-inner--text">
                                        <strong>Success!</strong> {!! session()->get('message') !!}
                                    </span>
                                </div>
                            @endif
                            <div class="panel panel-primary">
                                <div class="tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs d-none">
                                            <li class="mx-0"><a href="#tab5" class="active" data-bs-toggle="tab">Email</a></li>
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
                                                wire:model.defer="emailOrMobile">
                                            @error('emailOrMobile')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror

                                            </div>
                                            <div class="form-outline mb-3" id="Password-toggle">
                                                <input type="password"
                                                class="form-control form-control-lg @error('password') is-invalid @enderror" id="password"
                                                placeholder="Enter your password" wire:model.defer="password">
                                                @error('password')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                @enderror

                                            </div>
                                            <div class="text-end pt-4">
                                                <small><a href="{{ route('password-forget') }}" class="text-primary ms-1">Forgot Password?</a></small>
                                            </div>
                                            <div class="container-login100-form-btn">
                                                <button type="submit" class="btn btn-primary btn-lg w-100">Login</button>
                                            </div>
                                            <div class="text-center pt-3">
                                                <p class="text-dark mb-0">Don't have an account?<a href="{{ route('signup') }}" class="text-primary ms-1">Sign up</a></p>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab6">
                                            <div id="mobile-num" class="form-outline mb-3">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <span>+91</span>
                                                </a>
                                                <input class="input100 border-start-0 form-control ms-0">
                                            </div>
                                            <div id="login-otp" class="justify-content-around mb-5">
                                                <input class="form-control text-center w-15" id="txt1" maxlength="1">
                                                <input class="form-control text-center w-15" id="txt2" maxlength="1">
                                                <input class="form-control text-center w-15" id="txt3" maxlength="1">
                                                <input class="form-control text-center w-15" id="txt4" maxlength="1">
                                            </div>
                                            <span>Note : Login with registered mobile number to generate OTP.</span>
                                            <div class="container-login100-form-btn ">
                                                <a href="javascript:void(0)" class="login100-form-btn btn-primary" id="generate-otp">
                                                    Proceed
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- End PAGE -->

    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->
</section>