<div class="demo-footer">
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="top-footer">
                        <div class="row">
                            <div class="col-lg-4 col-sm-12 col-md-12 reveal revealleft">
                                <h6>About</h6>
                                <p>ERP and CRM integration enhances business operations with streamlined processes. A built-in PDF maker simplifies document creation. Improved stock management helps maintain optimal inventory levels. This results in a more efficient and effective company.</p>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-md-4 reveal revealleft">
                                <h6>Pages</h6>
                                <ul class="list-unstyled mb-5 mb-lg-0">
                                    <li><a href="#">- Home</a></li>
                                    {{-- <li><a href="#">- Pricing</a></li> --}}
                                    <li><a href="#">- Contact</a></li>
                                    <li><a href="#">- About</a></li>
                                    {{-- <li><a href="#">- Login</a></li> --}}
                                    {{-- <li><a href="#">- Register</a></li> --}}
                                </ul>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-4 reveal revealleft">
                                <div class="">
                                    <a href="{{route('home')}}"><img loading="lazy" alt="" class="logo-2 mb-3"
                                            src="{{ asset('img/new/blue-horizontal.png') }}" style="height: 40px !important"></a>
                                    <a href=""><img src="{{ asset('img/new/blue-horizontal.png') }}" class="logo-3"
                                            alt="logo"></a>
                                    <p>Stay connected with us by just entering your professional email address and get valuable content from us.</p>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Enter your email"
                                                aria-label="Example text with button addon"
                                                aria-describedby="button-addon1">
                                            <button class="btn btn-primary" type="button"
                                                id="button-addon2">Submit</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-list mt-6">
                                    <button type="button" class="btn btn-icon rounded-pill"><i
                                            class="fa fa-facebook"></i></button>
                                    <button type="button" class="btn btn-icon rounded-pill"><i
                                            class="fa fa-youtube"></i></button>
                                    <button type="button" class="btn btn-icon rounded-pill"><i
                                            class="fa fa-twitter"></i></button>
                                    <button type="button" class="btn btn-icon rounded-pill"><i
                                            class="fa fa-instagram"></i></button>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <footer class="main-footer px-0 pb-0 text-center">
                        <div class="row ">
                            <div class="col-md-12 col-sm-12">
                                © <span id="year"></span>, <a href="#">{{env('APP_NAME')}}</a>. All rights reserved | Designed with <span class="fa fa-heart text-danger"></span> by <a href="https://www.webwell.in" target="blank"> Webwell
                                    Infotech </a>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </div>
</div>
