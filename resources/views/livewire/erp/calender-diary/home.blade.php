<section>
    <!-- Calender -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Utility</a></li>
                        <li class="breadcrumb-item"><a href="">Personal Diary</a></li>
                        <li class="breadcrumb-item"><a href="">Calender Diary</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Index</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.utility.personal-diary.calender-diary.create') }}" class="btn btn-sm btn-primary d-none d-sm-inline-block me-0">
                                <i class="fas fa-plus me-1"></i>
                                Add Schedule
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
    			    <div class="container container-calendar">
                        <div class="d-flex">
                            <div>
            			        <div class="calendar">
                                    <div class="front">
                                        <div class="current-date">
                                            <h1>{{date('D-d', strtotime($current_date))}}</h1>
                                            <h1>{{date('M-Y', strtotime($dates[0]))}}</h1> 
                                        </div>
                                        <div class="current-month text-white">
                                            <table>
                                              	<thead>
                                                    <tr>
                                                        <th class="p-5">Sun</th>
                                                        <th class="p-5">Mon</th>
                                                        <th class="p-5">Tue</th>
                                                        <th class="p-5">Wed</th>
                                                        <th class="p-5">Thu</th>
                                                        <th class="p-5">Fri</th>
                                                        <th class="p-5">Sat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>      
                                                    @foreach($dates as $key => $date)
                                                        @if(date('D', strtotime($date)) == 'Sun')
                                                            <tr>
                                                        @endif
                                                        @php
                                                            $i = 0;
                                                        @endphp
                                                        @if(date('D', strtotime($date)) == 'Mon' && $loop->index == 0)
                                                            @php
                                                                $i = 1;
                                                            @endphp
                                                        @elseif(date('D', strtotime($date)) == 'Tue' && $loop->index == 0)
                                                            @php
                                                                $i = 2;
                                                            @endphp
                                                        @elseif(date('D', strtotime($date)) == 'Wed' && $loop->index == 0)
                                                            @php
                                                                $i = 3;
                                                            @endphp
                                                        @elseif(date('D', strtotime($date)) == 'Thu' && $loop->index == 0)
                                                            @php
                                                                $i = 4;
                                                            @endphp
                                                        @elseif(date('D', strtotime($date)) == 'Fri' && $loop->index == 0)
                                                            @php
                                                                $i = 5;
                                                            @endphp
                                                        @elseif(date('D', strtotime($date)) == 'Sat' && $loop->index == 0)
                                                            @php
                                                                $i = 6;
                                                            @endphp
                                                        @endif
                                                        @for ($index = 0; $index < $i; $index++)
                                                            <td class="p-5 td-hover">  </td>
                                                        @endfor
                                                        <td class="td-hover p-5 {{date('Y-m-d', strtotime($date)) == $current_date ? 'curent-date' : ''}}" wire:click="changeSchedul({{date('Y', strtotime($date))}}, {{ date('m', strtotime($date))}}, {{date('d', strtotime($date))}})">
                                                            @if(date('D', strtotime($date)) == 'Sun')
                                                                {{date('d', strtotime($date))}}
                                                            @elseif(date('D', strtotime($date)) == 'Mon')
                                                                {{date('d', strtotime($date))}}
                                                            @elseif(date('D', strtotime($date)) == 'Tue')
                                                                {{date('d', strtotime($date))}}
                                                            @elseif(date('D', strtotime($date)) == 'Wed')
                                                                {{date('d', strtotime($date))}}
                                                            @elseif(date('D', strtotime($date)) == 'Thu')
                                                                {{date('d', strtotime($date))}}
                                                            @elseif(date('D', strtotime($date)) == 'Fri')
                                                                {{date('d', strtotime($date))}}
                                                            @elseif(date('D', strtotime($date)) == 'Sat')
                                                                {{date('d', strtotime($date))}}
                                                            @endif
                                                        </td>
                                                        @if(date('D', strtotime($date)) == 'Sat')
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                        	</table>
                                        </div>
                                    </div>
            			        </div>
                            </div>
                            <div class="ms-6">
                                <div class="pb-4 row">
                                    <div class="col-md-12 mb-4">
                                        <form>
                                            <label class="form-label">Select Month</label>
                                            <input type="month" class="form-control form-control-sm" wire:model="month_year">
                                        </form>
                                    </div>
                                </div>
                                <div class="pb-4 row">
                                        <form wire:submit.prevent="noteUpdate">
                                            <div>
                                                <div class="d-flex">
                                                    <label class="form-label">Add note</label>
                                                    <div class="col-auto ms-auto d-print-none d-flex pe-0 mb-1">
                                                        <div class="btn-list">
                                                            <label for="formSubmitBtn" class="btn btn-sm btn-primary d-none d-sm-inline-block me-0"><i class="fas fa-save me-1"></i> Save Note</label>
                                                        </div>                        
                                                    </div>
                                                </div>
                                                <textarea  class="form-control form-control-sm" rows="16" cols="50" wire:model="note">{{$note}}</textarea>
                                                <input type="submit" id="formSubmitBtn" class="d-none">
                                            </div>
                                        </form>
                                    <div class="col-md-12 mb-4">
                                    </div>
                                </div>
                            </div>
                        </div>
    			    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Schedules</h3>
                    <div class="col-auto ms-auto d-print-none pe-0">
                        <div class="btn-list d-none">
                            <a href="{{ route('erp.utility.personal-diary.calender-diary.create') }}" class="btn btn-sm btn-primary d-none d-sm-inline-block me-0">
                                <i class="fas fa-plus me-1"></i>
                                Add Scheduler
                            </a>

                            <a href="{{ route('erp.utility.personal-diary.calender-diary.create') }}" class="btn btn-sm btn-primary d-sm-none me-0">
                                <i class="fas fa-plus"></i>
                            </a>

                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <!-- <div class="table-responsive"> -->
                        <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white">Index No.</th>
                                    <th class="bg-primary text-white">Time</th>
                                    <th class="bg-primary text-white">Duration</th>
                                    <th class="bg-primary text-white">Type</th>
                                    <th class="bg-primary text-white">Particulars</th>
                                    <th class="bg-primary text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($calenderDiaries as $key => $calenderDiary)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $calenderDiary->time }}</td>
                                        <td>{{ $calenderDiary->duration }}</td>
                                        <td>{{ $calenderDiary->type }}</td>
                                        <td>{{ $calenderDiary->particulars }}</td>
                                        <td>
                                            <a href="{{route('erp.utility.personal-diary.calender-diary.edit', $calenderDiary->id)}}" class="btn btn-sm btn-outline-info">Edit</a>
                                            <a href="{{route('erp.utility.personal-diary.calender-diary.show', $calenderDiary->id)}}" class="btn btn-sm btn-outline-success">Show</a>
                                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $calenderDiary->id }}">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    <!-- </div> -->

                    {{-- modals --}}
                    @foreach ($calenderDiaries as $key => $calenderDiary)
                        <div class="modal fade" id="delete-modal-{{ $calenderDiary->id }}">
                            <div class="modal-dialog modal-dialog-centered text-center" role="document">
                                <div class="modal-content tx-size-sm">
                                    <div class="modal-body text-center p-4 pb-5">
                                        <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                                        <h4 class="text-danger">Are you sure you want to delete?</h4>
                                        <form action="{{route('erp.utility.personal-diary.calender-diary.destroy', $calenderDiary->id)}}" method="POST" class="btn">
                                                @method('DELETE')
                                                @csrf
                                                <input type="submit" value="Delete" class="btn btn-danger pd-x-25">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>