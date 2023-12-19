@extends('erp.app')
@section('content')
    <!-- Row -->
    <div class="row m-1">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header p-3">
                    <ol class="breadcrumb">
                        @if (in_array(Request::get('type'), \App\Enum\Enum::MASTER_JOBWORK_IN_OUT_TYPES)) 
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Other Info</a></li>
                        @else
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Transactions</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Jobwork In</a></li>
                        @endif
                        <li class="breadcrumb-item"><a href="javascript:void(0)">{{ ucfirst(str_replace( '_', ' ', Request::get('type'))) }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none d-flex pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.account-transaction.jobwork-in.index', ['type' => Request::get('type'), 'module' => Request::get('module')]) }}" class="btn btn-sm btn-default d-none d-sm-inline-block mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                            <a href="{{ route('erp.account-transaction.jobwork-in.index', ['type' => Request::get('type'), 'module' => Request::get('module')]) }}" class="btn btn-sm btn-default d-sm-none mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                        </div>
                        <div class="btn-list">
                            <label for="formSubmit" class="btn btn-sm btn-primary d-none d-sm-inline-block me-0"><i class="fas fa-save me-1"></i>Save {{ ucfirst(str_replace(['jobwork_in_', 'jobwork_out_', '_', ], ' ', Request::get('type'))) }}</label>
                            <label for="formSubmit" class="btn btn-primary d-sm-none btn-icon me-0"><i class="fas fa-plus mx-2"></i></label>
                        </div>                        
                    </div>
                </div>
                <div class="card-body p-3">
                    @livewire('erp.transaction.jobwork-in.edit', [ 'id' => $id, 'type' => Request::get('type'), 'module' => Request::get('module')])     
                </div>
            </div>
        </div>
    </div>
    <!-- Row END -->
    
    <script>
        window.addEventListener('entry-table', event => {
            $('.entry-table').css("width","100%");
            $('.entry-table').DataTable({
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                },
                "ordering": false,
                "bDestroy": true,
                paging: false,
                ordering: false,
                info: false,
                sScrollY : 350,
                searching:true,
                sScrollX : true,
                scrollX : true,
            });
        });
    
        $(document).ready(function() {
            $('.entry-table').css("width","100%");
            $('.entry-table').DataTable({
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                },
                "ordering": false,
                "bDestroy": true,
                paging: false,
                ordering: false,
                info: false,
                sScrollY : 350,
                searching:true,
                sScrollX : true,
                scrollX : true,
            });
        });
    </script>
@endsection