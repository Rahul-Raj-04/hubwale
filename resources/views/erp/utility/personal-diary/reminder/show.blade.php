@extends('erp.app')
@section('content')
    <!-- Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('erp.utility.personal-diary.reminder.index')}}">Reminder</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Show</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none d-flex pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.utility.personal-diary.reminder.index') }}" class="btn btn-sm btn-default d-none d-sm-inline-block mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                            <a href="{{ route('erp.utility.personal-diary.reminder.index') }}" class="btn btn-sm btn-default d-sm-none mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                        </div>                        
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row mt-3">
                            <div class="form-group col-lg-4 col-md-6 mt-2">
                                <label for="remind_date">Date</label>
                                <input type="date" class="form-control form-control-sm" value="{{$reminder->remind_date}}" disabled>
                            </div>

                            <div class="form-group col-lg-4 col-md-6 mt-2">
                                <label for="before_day">Before Day</label>
                                <input type="number" class="form-control form-control-sm" value="{{$reminder->before_day}}" disabled>
                            </div>

                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="reminder_category_id">Category</label>
                                <input type="text" class="form-control form-control-sm" value="{{$reminder->reminderCategory->name}}" disabled>
                            </div>

                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="frequency">Frequency</label>
                                <input type="text" class="form-control form-control-sm" value="{{$reminder->frequency}}" disabled>
                            </div>

                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="particular">Particular</label>
                                <input type="text" class="form-control form-control-sm" value="{{$reminder->particular}}" disabled>
                            </div>

                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="level">Level</label>
                                <input type="text" class="form-control form-control-sm" value="{{$reminder->level}}" disabled>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Row END -->
@endsection
