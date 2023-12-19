@extends('erp.app')
@section('content')

    <!-- Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('erp.utility.personal-diary.calender-diary.index')}}">Calender Diary</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Show</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none d-flex pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.utility.personal-diary.calender-diary.index') }}" class="btn btn-sm btn-default d-none d-sm-inline-block mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                            <a href="{{ route('erp.utility.personal-diary.calender-diary.index') }}" class="btn btn-sm btn-default d-sm-none mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                        </div>                        
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row mt-3">
                            <div class="form-group col-lg-4 col-md-6 mt-2">
                                <label for="date">Date</label>
                                <input type="date" class="form-control form-control-sm" id="date" value="{{$calenderDiary->date}}" disabled>
                            </div>

                            <div class="form-group col-lg-4 col-md-6 mt-2">
                                <label for="time">Time</label>
                                <input type="time" class="form-control form-control-sm" id="time" value="{{$calenderDiary->time}}" disabled>
                            </div>

                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="duration">Duration</label>
                                <input type="text" class="form-control form-control-sm" id="duration" value="{{$calenderDiary->duration}}" disabled>
                            </div>

                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="type">Type</label>
                                <input type="text" class="form-control form-control-sm" id="type" value="{{$calenderDiary->type}}" disabled>
                            </div>

                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="particulars">Particulars</label>
                                <input type="text" class="form-control form-control-sm" id="particulars" value="{{$calenderDiary->particulars}}" disabled>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Row END -->
@endsection
