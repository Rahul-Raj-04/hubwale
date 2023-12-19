@extends('stock-management.app')
@section('content')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Stock Management</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('stock-management.home')}}">Stock Management</a></li>
                <li class="breadcrumb-item active" aria-current="page">Home</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW-1 -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                        <div class="card overflow-hidden">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="mt-2">
                                        <h6 class="">Total Products</h6>
                                        <h2 class="mb-0 number-font">{{ $totalProducts }}</h2>
                                    </div>
                                    <div class="ms-auto">
                                        <div class="chart-wrapper mt-1">
                                            <canvas id="saleschart"
                                                class="h-8 w-9 chart-dropshadow"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                        <div class="card overflow-hidden">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="mt-2">
                                        <h6 class="">Out Of Stocks</h6>
                                        <h2 class="mb-0 number-font">{{ $outOfStocks }}</h2>
                                    </div>
                                    <div class="ms-auto">
                                        <div class="chart-wrapper mt-1">
                                            <canvas id="leadschart"
                                                class="h-8 w-9 chart-dropshadow"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                        <div class="card overflow-hidden">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="mt-2">
                                        <h6 class="">In Stocks</h6>
                                        <h2 class="mb-0 number-font">{{ $inStocks }}</h2>
                                    </div>
                                    <div class="ms-auto">
                                        <div class="chart-wrapper mt-1">
                                            <canvas id="profitchart"
                                                class="h-8 w-9 chart-dropshadow"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                        <div class="card overflow-hidden">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="mt-2">
                                        <h6 class="">Defective Packages</h6>
                                        <h2 class="mb-0 number-font">{{ $defectivePackages }}</h2>
                                    </div>
                                    <div class="ms-auto">
                                        <div class="chart-wrapper mt-1">
                                            <canvas id="costchart"
                                                class="h-8 w-9 chart-dropshadow"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- ROW-1 END -->

    <!-- ROW-2 -->
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Products</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                        <thead>
                            <tr>
                                <th class="bg-primary text-white">Index No.</th>
                                <th class="bg-primary text-white">Product number</th>
                                <th class="bg-primary text-white">Product name</th>
                                <th class="bg-primary text-white">Available pieces quantity</th>
                                <th class="bg-primary text-white">Available packages quantity</th>
                                <th class="bg-primary text-white">Defective pieces quantity</th>
                                <th class="bg-primary text-white">Defective packages quantity</th>
                                <th class="bg-primary text-white">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $product)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $product->number }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->available_pieces_quantity }}</td>
                                    <td>{{ $product->available_packages_quantity }}</td>
                                    <td>{{ $product->defective_pieces_quantity }}</td>
                                    <td>{{ $product->defective_packages_quantity }}</td>
                                    <td><button type="button" class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="{{'#modal-update-stock-'.$product->id}}">Edit</button>
                                        <a href="{{route('erp.products.show', $product->id)}}" class="btn btn-sm btn-outline-success d-none">Show</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- ROW-2 END -->
    
    {{-- update stock modal --}}
    @foreach ($products as $key => $product)
        <div class="modal fade" id="{{'modal-update-stock-'.$product->id}}">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Update stock</h6>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('stock-management.update-stock', $product->id) }}" method="POST">
                        @method('post')
                        @csrf
                        <div class="form-group mt-2">
                            <label for="available_pieces_quantity">Available pieces quantity</label>
                            <input type="number" class="form-control" id="available_pieces_quantity" name="available_pieces_quantity" value="{{$product->available_pieces_quantity}}" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="available_packages_quantity">Available packages quantity</label>
                            <input type="number" class="form-control" id="available_packages_quantity" name="available_packages_quantity" value="{{$product->available_packages_quantity}}" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="defective_pieces_quantity">Defective pieces quantity</label>
                            <input type="number" class="form-control" id="defective_pieces_quantity" name="defective_pieces_quantity" value="{{$product->defective_pieces_quantity}}" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="defective_packages_quantity">Defective packages quantity</label>
                            <input type="number" class="form-control" id="defective_packages_quantity" name="defective_packages_quantity" value="{{$product->defective_packages_quantity}}" required>
                        </div>
                        <input type="submit" id="updateStock" class="d-none">
                    </form>
                  </div>
                <div class="modal-footer">
                    <label class="btn ripple btn-success" for="updateStock">Save changes</label>
                    <button class="btn ripple btn-danger" data-bs-dismiss="modal" type="button">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
        

@endsection

@section('customJs')
    <script src="{{ asset('bundle/js/stock-charts.js') }}"></script>    
@endsection