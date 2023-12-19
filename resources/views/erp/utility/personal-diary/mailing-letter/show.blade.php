@extends('erp.app')
@section('content')
    <!-- Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Utility</a></li>
                        <li class="breadcrumb-item"><a href="">Personal diary</a></li>
                        <li class="breadcrumb-item"><a href="">Mailing Letter</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Show</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none d-flex pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.utility.personal-diary.mailing-letter.index') }}" class="btn btn-sm btn-default d-none d-sm-inline-block mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                            <a href="{{ route('erp.utility.personal-diary.reminder.index') }}" class="btn btn-sm btn-default d-sm-none mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                        </div>                        
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row mt-3">
                            <div class="form-group col-lg-4 col-md-6 mt-2">
                                <label for="remind_date">Name</label>
                                <input type="text" class="form-control form-control-sm" value="{{$mailingLetter->name}}" disabled>
                            </div>
                            @foreach($custom_fields as $custom_field)
                            
                                <div class="form-group col-lg-4 col-md-6 mt-2">
                                    <label>{{$custom_field['label']}}</label>
                                    <input type="text" class="form-control form-control-sm" value="{{$custom_field['field_value']}}" disabled>
                                </div>
                            @endforeach
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Row END -->
@endsection
