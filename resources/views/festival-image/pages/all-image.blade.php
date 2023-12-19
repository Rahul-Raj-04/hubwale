@extends('festival-image.app')

@section('content')
<div class="row row-sm my-3">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header p-3">
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Festival Image</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </div>
            </div>

            <div class="card-body p-2">
                <div class="col-md-12 p-5">
                    <h4>Ads</h4>
                    <div class="owl-carousel">
                        @foreach ($ads as $ad)
                        <a href="{{ $ad->url }}" target="_blank" class="item">
                            <img src="{{ $ad->banner }}" class="img-fluid""
                                style=" height: 200px; width: 100%">
                        </a>
                        @endforeach
                    </div>
                </div>
                <hr class="bg-primary" />
                <div class="col-md-12 px-5">
                    @foreach ($businessCategories as $category)
                    @if ($category->festival_images->count())
                    <h4>{{ $category->name }}</h4>
                        @foreach ($category->festival_images as $image)
                        <div class="column" style="width:200px;">
                            <div class="card card-sm border overflow-hidden p-0 br-7 shadow-sm">
                                <img src="{{$image->image}}" class="card-img-top" style="height: 200px; width:100%">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div>{{ $image->image_category->name }}</div>
                                            <div>{{ $image->image_category->date }}</div>
                                        </div>
                                        <div class="ms-auto">
                                            <div class="text-muted text-end" style="min-width: 44px;">
                                                <i class="far fa-arrow-alt-circle-down"></i>
                                                {{ $image->downloads ?? 0 }}
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="m-3">
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <button class="btn btn-secondary btn-sm customize-image-button"
                                                style="margin-left: -18px;" id="{{$image->id}}" data-bs-toggle="modal"
                                                data-bs-target="#customize-image">
                                                Customize
                                            </button>
                                        </div>
                                        <div class="col-6">
                                            <form action="{{route('festival-image.download', $image->id)}}" method="post">
                                                @method('POST')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-primary"
                                                    style="margin-left: -8px;">
                                                    Download
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Image customization modal --}}
<div class="modal fade" id="customize-image" tabindex="-1" aria-hidden="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Image filter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="image-customize-form" action="" method="post">
                    @method('POST')
                    @csrf
                    <div class="form-outline mt-3 mb-1">
                        <label for="font_family" class="form-label">Select font type<span
                                class="text-danger">*</span></label>
                        <select class="form-control" name="font_family" id="font_family" required>
                            <option value="" selected>Select font type</option>
                            @foreach ($fonts as $font)
                            <option value="{{$font}}">{{$font}} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-outline mt-3 mb-1">
                        <label for="font_color" class="form-label">Select font color<span
                                class="text-danger">*</span></label>
                        <input type="color" name="font_color" id="font_color" required>
                    </div>

                    <div class="form-outline mt-3 mb-1">
                        <label for="layout_color" class="form-label">Select layout color<span
                                class="text-danger">*</span></label>
                        <input type="color" name="layout_color" id="layout_color" required>

                    </div>

                    <input type="submit" id="customization" class="d-none">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <label for="customization" class="btn btn-primary">Submit</label>
            </div>
        </div>
    </div>
</div>
{{-- Image customization modal end --}}
@endsection

@section('customJs')
<script type="text/javascript">
    $(document).ready(function () {
        $('.customize-image-button').on('click', function() {
            var imageId = $(this).attr('id');
            var url = '{{ route("festival-image.download", ":id") }}';
            url = url.replace(':id', imageId);
            $('#image-customize-form').attr('action', url);
        });

        $('#image-customize-form').on('submit', function() {
            $('#customize-image').modal('toggle');
        });
    });
</script>
@endsection