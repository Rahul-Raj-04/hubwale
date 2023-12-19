@extends('erp.app')
@section('content')
    <!-- Row -->
    <div class="row m-1">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header p-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">GST</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Credit Note With Stock Setup</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none d-flex pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.master.gst.credit-note-setup.index') }}" class="btn btn-sm btn-default d-none d-sm-inline-block mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                            <a href="{{ route('erp.master.gst.credit-note-setup.index') }}" class="btn btn-sm btn-default d-sm-none mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                        </div>
                        <div class="btn-list">
                            <label for="CreditNoteStockSetupFormSubmit" class="btn btn-primary d-none btn-sm d-sm-inline-block me-0"><i class="fas fa-save me-1"></i> Save Credit Note Stock Setup</label>
                            <label for="CreditNoteStockSetupFormSubmit" class="btn btn-primary d-sm-none btn-sm btn-icon me-0"><i class="fas fa-plus mx-2"></i></label>
                        </div>                        
                    </div>
                </div>
                <div class="card-body p-3">
                    @livewire('erp.master.gst.credit-note-stock-setup.add-credit-note-stock-setup')
                </div>
            </div>
        </div>
    </div>
    <!-- Row END -->

@endsection

@section('customJs')
@endsection
