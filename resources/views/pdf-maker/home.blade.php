@extends('pdf-maker.app')
@section('content')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">PDF Maker</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('pdf-maker.home')}}">PDF</a></li>
                <li class="breadcrumb-item"><a href="{{route('pdf-maker.home')}}">PDF Maker</a></li>
                <li class="breadcrumb-item active" aria-current="page">Index</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All PDF's</h3>
                    <div class="col-auto ms-auto d-print-none pe-0">
                        <div class="btn-list">
                            <button class="btn btn-primary d-none d-sm-inline-block me-0" type="button" data-bs-toggle="modal" data-bs-target="#create-pdf-modal"> <i class="fas fa-file-pdf me-2"></i>
                                    Create new PDF
                            </button>
                            <button class="btn btn-primary d-sm-none btn-icon me-0" type="button" data-bs-toggle="modal" data-bs-target="#create-pdf-modal">
                            <i class="far fa-save"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <!-- <div class="table-responsive"> -->
                        <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                            <thead>
                            <tr>
                                <th class="bg-primary text-white">Index No.</th>
                                <th class="bg-primary text-white">PDF name</th>
                                <th class="bg-primary text-white">Created By</th>
                                <th class="bg-primary text-white">View Products</th>
                                <th class="bg-primary text-white">Download</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pdfs as $key => $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->user->id == auth()->user()->id ? 'You' : $item->user->name }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary d-none d-md-inline-block" data-bs-toggle="modal"
                                            data-bs-target="#product-modal-{{ $item->id }}"><i
                                                class="fas fa-eye me-2"></i>View</button>
                                        <button type="button" class="btn btn-primary d-md-none btn-icon" data-bs-toggle="modal"
                                            data-bs-target="#product-modal-{{ $item->id }}"><i class="fas fa-eye"></i></button>
                                    </td>
                                    <td>
                                        <button class="btn btn-secondary d-none d-md-inline-block" data-bs-toggle="modal"
                                            data-bs-target="#view-modal-{{ $item->id }}"><i
                                                class="fas fa-download me-2"></i>Download</button>
                                        <button class="btn btn-secondary d-md-none btn-icon" data-bs-toggle="modal"
                                            data-bs-target="#view-modal-{{ $item->id }}"><i class="fas fa-download"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>

<section>
        {{-- product list model --}}
        @foreach ($pdfs as $key => $item)
            <div class="modal fade" id="product-modal-{{ $item->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{ $item->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h3>Products List</h3>
                            <table class="table">
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product name</th>
                                    <th>Product price</th>
                                </tr>
                                @foreach ($item->all_products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price_per_piece }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        {{-- default layout view pdf model --}}
        @foreach ($pdfs as $key => $item)
            <div class="modal fade" id="default-view-modal-{{ $item->id }}" tabindex="-1" aria-hidden="true" style="overflow-y:scroll;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Default layout</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @include('erp.products.templetes.default', [
                                'products' => $item->all_products,
                                'pdf_id' => $item->id,
                            ])
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary print-default-pdf"
                                data-pdf-id="{{ $item->id }}">Print</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        {{-- simple layout view pdf model --}}
        @foreach ($pdfs as $key => $item)
            <div class="modal fade" id="simple-view-modal-{{ $item->id }}" tabindex="-1" aria-hidden="true" style="overflow-y:scroll;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Simple layout</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @include('erp.products.templetes.simple', [
                                'products' => $item->all_products,
                                'pdf_id' => $item->id,
                            ])
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary print-simple-pdf"
                                data-pdf-id="{{ $item->id }}">Print</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        {{-- select layout model --}}
        @foreach ($pdfs as $key => $item)
            <div class="modal fade" id="view-modal-{{ $item->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" >
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{ $item->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <section>
                                <div class="container-fluid">
                                    <div class="overflow-hidden">
                                        {{-- main code start from here --}}
                                        <header class="d-flex justify-content-center align-item-center flex-column">
                                            <div class="mx-auto">
                                                <h4>Select Layout</h4>
                                            </div>
                                        </header>
                                        <div>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#default-view-modal-{{ $item->id }}" id="default">Default</button>
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#simple-view-modal-{{ $item->id }}" id="simple">Simple</button>
                                        </div>

                                    </div>
                                </div>
                            </section>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <section>
            <div class="modal fade" id="create-pdf-modal" tabindex="-1" aria-hidden="true" role="dialog" wire:ignore.self>
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create PDF</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="panel panel-primary">
                                            <div class="tab-menu-heading tab-menu-heading-boxed">
                                                <div class="tabs-menu-boxed">
                                                    <!-- Tabs -->
                                                    <ul class="nav panel-tabs">
                                                        <li><a href="#product" class="product" data-bs-toggle="tab">Product</a></li>
                                                        <li><a href="#category" data-bs-toggle="tab">Category</a></li>
                                                        <li><a href="#group" data-bs-toggle="tab">Group</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="panel-body tabs-menu-body">
                                                <div class="tab-content">
                                                        <div class="tab-pane product" id="product">
                                                            <form id="product-form" method="POST" action="{{ route('pdf-maker.store')}}">
                                                                @method('POST')
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label for="select-product" class="form-label">Select product</label>
                                                                    <select class="form-control " name="selected_products[]" multiple id="select-product" placeholder="select product" required oninvalid="this.setCustomValidity('Please select atleast one product')">
                                                                        @foreach ($products as $key => $product)
                                                                            <option value="{{$product->id}}">{{$product->id.' | '.$product->name.' | '.$product->price_per_piece}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-outline mt-3">
                                                                    <label for="filename" class="form-label">File name</label>
                                                                    <input type="filename" class="form-control" id="filename" name="filename" 
                                                                        placeholder="Enter filename (Optional)">
                                                                </div>
                                                                <input type="hidden" class="form-control" value="product" name="type" id="type">
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                                </div>
                                                            </form>
                                                        </div>

                                                        <div class="tab-pane" id="category">
                                                            <form id=category-form method="POST" action="{{ route('pdf-maker.store')}}">
                                                                @method('post')
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label for="select-category" class="form-label">Select category</label>
                                                                    <select class="form-control" name="selected_category" id="select-category" placeholder="select category" required oninvalid="this.setCustomValidity('Please select one category')">
                                                                        <option value="">Select category</option>
                                                                        @foreach ($categories as $key => $category)
                                                                            <option value="{{$category->id}}">{{$category->id.' | '.$category->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-outline mt-3">
                                                                    <label for="filename" class="form-label">File name</label>
                                                                    <input type="filename" class="form-control" id="filename" name="filename" 
                                                                        placeholder="Enter filename (Optional)">
                                                                </div>
                                                                <input type="hidden" class="form-control" value="category" name="type" id="type">
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                                </div>
                                                            </form>
                                                        </div>

                                                        <div class="tab-pane" id="group">
                                                            <form id="group-form" method="POST" action="{{ route('pdf-maker.store')}}">
                                                                @method('POST')
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label for="select-group" class="form-label">Select group</label>
                                                                    <select class="form-control" name="selected_group" id="select-group" placeholder="select group" required oninvalid="this.setCustomValidity('Please select one group')">
                                                                        <option value="">Select group</option>
                                                                        @foreach ($groups as $key => $group)
                                                                            <option value="{{$group->id}}">{{$group->id.' | '.$group->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <span class="selected_group text-danger small wow flash"></span>
                                                                </div>
                                                                <div class="form-outline mt-3">
                                                                    <label for="filename" class="form-label">File name</label>
                                                                    <input type="filename" name="filename" class="form-control" id="filename"
                                                                        placeholder="Enter filename (Optional)">
                                                                </div>
                                                                <input type="hidden" class="form-control" value="group" name="type" id="type">
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection

@section('customJs')
    <script>
        $(document).ready(function() {
            $( ".product" ).addClass( 'active');
        });
        new TomSelect("#select-product",{
            create: false,
            sortField: {
                field: 'text',
                direction: 'asc'
            },
            plugins: ['remove_button']
        });

        new TomSelect("#select-category",{
            create: false,
            sortField: {
                field: 'text',
                direction: 'asc'
            },
            plugins: ['remove_button']
        });

        new TomSelect("#select-group",{
            create: false,
            sortField: {
                field: 'text',
                direction: 'asc'
            },
            plugins: ['remove_button']
        });
        $(document).ready(function() {
            $('.print-default-pdf').click(function() {
                let id = $(this).attr('data-pdf-id');
                $('#default-pdf-id-' + id).printThis({
                    importCSS: true,
                    pageTitle: '.',
                    header: null,
                    footer: null,
                });
            });

            $('.print-simple-pdf').click(function() {
                let id = $(this).attr('data-pdf-id');
                $('#simple-pdf-id-' + id).printThis({
                    importCSS: true,
                    pageTitle: '.',
                    header: null,
                    footer: null,
                });
            });
        });
    </script>
@endsection
