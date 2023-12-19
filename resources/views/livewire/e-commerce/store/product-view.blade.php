<div class="row row-sm m-1">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header p-3 d-flex justify-content-between">
                <div class="d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('e-commerce.home') }}">E-Commerce</a></li>
                        <li class="breadcrumb-item"><a href="{{ $storeUrl }}">Store Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                    </ol>
                </div>
                <div>
                    <a href="{{ $storeUrl }}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left mx-1"></i> Back</a>
                    <a class="btn btn-success" href="{{ route('e-commerce.store.order') }}">
                        <i class="fa-solid fa-box-open"></i>
                        My Orders
                    </a>
                    <a class="btn btn-primary" href="{{ route('e-commerce.store.cart') }}">
                        <i class="fa-solid fa-cart-shopping"></i>
                        View Cart
                    </a>
                </div>
            </div>

            <div class="card-body">
                <div class="my-5 px-2">
                    <div class="row">
                        {{-- <div class="col-md-6 p-5" wire:ignore>
                            <div class="owl-carousel">
                                @foreach ($product->getMedia('images') as $image)
                                <img src="{{ $image->getFullUrl() }}" class="img-fluid" alt="{{ $product->name }}"
                                    style="height: 400px; width: 100%">
                                @endforeach
                            </div>
                        </div> --}}
                        <div class="col-md-6 p-5" wire:ignore>
                            <div class="owl-carousel border border-2">
                                @if ($product->getMedia('images')->count() > 0)
                                    @foreach ($product->getMedia('images') as $image)
                                    <img src="{{ $image->getFullUrl() }}" class="card-img-top" alt="{{ $product->name }}"
                                        style="height: 400px; width: 100%">
                                    @endforeach
                                @else
                                    <img src="{{ $imageUrl }}" class="card-img-top item" alt="{{ $product->name }}" style="height: 400px; width: 100%">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <span class="">
                                <h1>{{ $product->name }}</h1>
                            </span>
                            <span class="m-5">
                                <h6>Box Price</h6>
                                @if (in_array($currentVariation->packaging_type, ['both', 'box']))
                                    <h2 class="my-0">{{ $currentVariation->box_price }}</h2>
                                    <p>{{ $currentVariation->piece_per_box }} pieces/box</p>
                                @else
                                    <p class="text-danger">sold only in piece</p>
                                @endif
                            </span>
                            <span class="m-5">
                                <h6>Piece Price</h6>
                                @if (in_array($currentVariation->packaging_type, ['both', 'piece']))
                                    <h2>{{ $currentVariation->piece_price }}</h2>
                                @else
                                    <p class="text-danger">sold only in box</p>
                                @endif
                            </span>
                            <span class="m-5">
                                <h4>Variations</h4>
                                <div>
                                    @foreach ($product->variations as $variation)
                                    <button class="btn {{ $variation->id == $currentVariation->id ? " btn-primary"
                                        : "btn-outline-primary" }}" wire:click='changeVariation({{ $variation->id }})'>{{
                                        $variation->size->name }}</button>
                                    @endforeach
                                </div>
                            </span>

                            <span class="m-5">
                                <h4>Packaging Type</h4>
                                <div>
                                    @if ($currentVariation->packaging_type == 'box')
                                        <button class="btn btn-{{ $packagingType == 'box' ? '' : 'outline-' }}primary" wire:click='changePackageType("box")'>Box</button>
                                    @elseif ($currentVariation->packaging_type == 'piece')
                                        <button class="btn btn-{{ $packagingType == 'piece' ? '' : 'outline-' }}primary" wire:click='changePackageType("piece")'>Piece</button>
                                    @else
                                        <button class="btn btn-{{ $packagingType == 'box' ? '' : 'outline-' }}primary" wire:click='changePackageType("box")'>Box</button>
                                        <button class="btn btn-{{ $packagingType == 'piece' ? '' : 'outline-' }}primary" wire:click='changePackageType("piece")'>Piece</button>
                                    @endif
                                </div>
                            </span>

                            <span class="m-5">
                                <h6>Quantity</h6>
                                <div class="form-group">
                                    <input type="number"
                                        class="form-control {{ $errors->has('quantity') ? 'is-invalid' : 'is-valid' }}"
                                        style="max-width: 100px" wire:model='quantity'>
                                    @error('quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </span>
                            <span class="m-5">
                                <div class="my-2">
                                    @if (session()->has('message'))
                                    <div class="alert alert-success" style="width: max-content">
                                        {{ session('message') }}
                                    </div>
                                    @endif
                                </div>
                                <div>
                                    <button class="btn btn-primary w-50" wire:click='addToCart'><i
                                            class="fa-solid fa-cart-plus mx-2"></i> Add To Cart</button>
                                </div>
                            </span>
                        </div>
                    </div>

                    <hr />
                    <div>
                        <div class="py-3">
                            <h4>Product Description</h4>
                            <p>{!! $product->description !!}</p>
                        </div>
                        <div class="row py-3">
                            <div class="col-md-6">
                                <h4>Product Details</h4>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Store Name</th>
                                        <td>{{ $companyName }}</td>
                                    </tr>
                                    <tr>
                                        <th>Brand</th>
                                        <td>{{ $product->brand->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Category</th>
                                        <td>{{ $product->category->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Sub Category</th>
                                        <td>{{ $product->sub_category->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tax ({{ $product->tax ? $product->tax->name : '-' }})</th>
                                        <td>{{ $product->tax ? $product->tax->tax : "0" }} %</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <h4>Product Pricing</h4>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Name</th>
                                        <th>Packaging Type</th>
                                        <th>Piece Per Box</th>
                                        <th>Box Price</th>
                                        <th>Piece Price</th>
                                    </tr>
                                    @foreach ($product->variations as $variation)
                                    <tr>
                                        <td>{{ $variation->size->name}}</td>
                                        <td>{{ $variation->packaging_type}}</td>
                                        <td>{{ $variation->piece_per_box > 0? $variation->piece_per_box : '-'}}</td>
                                        <td>{{ $variation->box_price > 0? $variation->box_price : '-'}}</td>
                                        <td>{{ $variation->piece_price > 0 ? $variation->piece_price : '-'}}</td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>