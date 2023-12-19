@extends('festival-image.app')
@section('customCss')
<style type="text/css">

    .column {
        display: none; /* Hide all elements by default */
    }

    /* The "show" class is added to the filtered elements */
    .show {
        display: block;
    }

    /* Style the buttons */
    .btnImg {
      outline: none;
      padding: 12px 16px;
      background-color: white;
      cursor: pointer;
    }

    .btnImg:hover {
      background-color: #ddd;
    }

    .btnImg.active {
      background-color: #666;
      color: white;
    }

    @media (max-width: 370px)
    {
        .btnImg {
            padding: 0.55rem !important;
        }
    }
</style>
@endsection
@section('content')


    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Festival Images</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('festival-image.home')}}">Festival</a></li>
                <li class="breadcrumb-item active" aria-current="page">Images</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    @if (count($festivalImage) == 0)
        <div class="g-4 pt-1">
            <div class="text-center pt-5">
                <img src="{{ asset('img/new/imageNotFound.svg')}}" height="250px">
                <h3 class="p-1">No festival images found for today</h3>
            </div>
        </div>
    @endif

    @if (count($festivalImage))

    <!-- GALLERY OPEN -->
    <div class="demo-gallery card">
        <div class="card-header">
            <div class="card-title">
                    <div id="myBtnContainer" class="mt-3 ps-4">
                        <button class="btnImg border shadow-sm btn-primary mt-1" onclick="filterSelection('all')"> Show all</button>
                        @foreach ($imageCategory as $category)
                            <button class="btnImg shadow-sm border mt-1" onclick="filterSelection({{$category->id}})"> {{$category->name}} </button>
                        @endforeach
                    </div>
            </div>
        </div>
        <div class="card-body row">

        @foreach ($imageCategory as $category)
            @if(count($category->festivalImage))
                @foreach ($category->festivalImage as $image)
                    <div class="column {{$category->id}}" style="width:200px;">
                        <div class="card card-sm border overflow-hidden p-0 br-7 shadow-sm">
                            <img src="{{$image->image}}" class="card-img-top" style="height: 200px; width:100%">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div>{{ $image->design_name }}</div>
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
                                        <button class="btn btn-secondary btn-sm customize-image-button" style="margin-left: -18px;" id="{{$image->id}}" data-bs-toggle="modal" data-bs-target="#customize-image">
                                            Customize
                                        </button>
                                    </div>
                                    <div class="col-6">
                                       <form action="{{route('festival-image.download', $image->id)}}" method="post">
                                            @method('POST')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-primary" style="margin-left: -8px;">
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
    
    @endif

    <section>

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
                                <label for="font_family" class="form-label">Select font type<span class="text-danger">*</span></label>
                                <select class="form-control" name="font_family" id="font_family" required>
                                  <option value="" selected>Select font type</option>
                                  @foreach ($fonts as $font)
                                    <option value="{{$font}}">{{$font}} </option>
                                  @endforeach
                                </select>
                            </div>
                            
                            <div class="form-outline mt-3 mb-1">
                                <label for="font_color" class="form-label">Select font color<span class="text-danger">*</span></label>
                                <input type="color" name="font_color" id="font_color" required>
                            </div>
                            
                            <div class="form-outline mt-3 mb-1">
                                <label for="layout_color" class="form-label">Select layout color<span class="text-danger">*</span></label>
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
    </section>
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

    filterSelection("all") // Execute the function and show all columns
    
    function filterSelection(c) {
        var x, i;
        x = document.getElementsByClassName("column");
        if (c == "all") c = "";
        // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
        
        for (i = 0; i < x.length; i++) {
            w3RemoveClass(x[i], "show");
            if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
        }
    }

    // Show filtered elements
    function w3AddClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");

        for (i = 0; i < arr2.length; i++) {

            if (arr1.indexOf(arr2[i]) == -1) {
                element.className += " " + arr2[i];
            }
        }
    }

    // Hide elements that are not selected
    function w3RemoveClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
      
        for (i = 0; i < arr2.length; i++) {
            while (arr1.indexOf(arr2[i]) > -1) {
                arr1.splice(arr1.indexOf(arr2[i]), 1);
            }
        }

        element.className = arr1.join(" ");
    }

    // Add active class to the current button (highlight it)
    var btnContainer = document.getElementById("myBtnContainer");
    var btns = btnContainer.getElementsByClassName("btnImg");

    $('.btnImg').on('click', function() {

        $.each(btns, function(key, val){

            if (val.classList.contains('btn-primary')) {
                val.classList.remove('btn-primary');
            }    
        })

        $(this).addClass('btn-primary');
    });
</script>
@endsection
