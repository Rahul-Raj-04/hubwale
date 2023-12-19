@extends('welcome.app')
@section('content')
<section class="mx-5 pt-4 serviceShowSection">
    <div class="container">
        <p class="h3 text-primary outfit mb-4">Services</p>

        <div class="row">
            <div class="col-md-3 w-100">
                <a href="{{ route('erp.home') }}" class="btn btn-outline-primary w-100 wow fadeInUp service-card" data-wow-delay="0.1s"
                    style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <div class="feature-item text-center p-5 advanced-feature-item">
                        <i class="fas fa-file-invoice-dollar fa-4x mb-4"></i>
                        <h5 class="mb-3">ERP</h5>
                        <small class="h6">Open &nbsp; <i class="fas fa-external-link-alt"></i></small>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
@section('customJs')
<script type="text/javascript">
    $(document).ready(function() {
            $(this).find("small").hide();
            $('.service-card').hover(function() {
                $(this).find("small").toggle(100);
            });
        })
</script>
@endsection

@section('customCss')
<style>
    .service-card {
        height: 160px;
        margin-bottom: 1rem;
    }
</style>
@endsection