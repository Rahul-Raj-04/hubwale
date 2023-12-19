<div class="row row-sm m-1">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header p-3 d-flex justify-content-between">
                <div class="d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('e-commerce.home') }}">E-Commerce</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">{{ $companyName }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Home</li>
                    </ol>
                </div>
                <div>
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

            <div class="card-body p-2">

                <div class="p-2" wire:ignore.self>
                    <h5>Permitted Stores</h5>
                    <table class="table">
                        <tr>
                            <th>Sr. No.</th>
                            <th>Store Name</th>
                            <th>Store URL</th>
                        </tr>
                        @foreach ($stores as $key => $store)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $store->company->company_name}}</td>
                                <td>
                                    <a href="{{ route('e-commerce.store.index', ['companyId' => $store->company->id, 'companyName' => $store->company->company_name]) }}" target="_blank">Open Store URL</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>

                @foreach ($categories as $category)
                    <div class="p-2">
                        <div class="d-flex justify-content-between align-items-center bg-primary p-2">
                            <h5 class="text-white m-0">{{ $category->name }}</h5>
                            <a href="{{ $storeUrl }}?category={{ $category->id }}" class="btn btn-secondary">View All</a>
                        </div>
                        <hr>
                            <div class="row">
                                @if ($this->category)
                                    @foreach ($category->products as $product)
                                    <div class="card col-md-3 col-sm-12" style="width: 18rem;">
                                        <div class="border border-2">
                                            @if ($product->getMedia('images')->count() > 0)
                                            <img src="{{ $product->getFirstMediaUrl('images') }}" class="card-img-top" alt="{{ $product->name }}"
                                                style="height: 250px; width: 100%">
                                            @else
                                            <img src="{{ $imageUrl }}" class="card-img-top" alt="{{ $product->name }}" style="height: 250px; width: 100%">
                                            @endif
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $product->name }}</h5>
                                            <p class="card-text">Box Pricing:- {{ $product->box_price_range }}</p>
                                            <p class="card-text">Piece Pricing:-{{ $product->piece_price_range }}</p>
                                            <a class="btn btn-primary w-100"
                                                href="{{ route('e-commerce.store.product-view', ['companyId' => $companyId, 'companyName' => $companyName, 'productId' => $product->id, 'productName' => $product->name]) }}">
                                                <i class="fa-solid fa-eye"></i>
                                                View Product
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                @else
                                    @foreach ($category->products->take(4) as $product)
                                    <div class="card col-md-3 col-sm-12" style="width: 18rem;">
                                        <div class="border border-2">
                                            @if ($product->getMedia('images')->count() > 0)
                                                <img src="{{ $product->getFirstMediaUrl('images') }}" class="card-img-top" alt="{{ $product->name }}" style="height: 250px; width: 100%">
                                            @else
                                                <img src="{{ $imageUrl }}" class="card-img-top" alt="{{ $product->name }}"
                                                    style="height: 250px; width: 100%">
                                            @endif
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $product->name }}</h5>
                                            <p class="card-text">Box Pricing:- {{ $product->box_price_range }}</p>
                                            <p class="card-text">Piece Pricing:-{{ $product->piece_price_range }}</p>
                                            <a class="btn btn-primary w-100"
                                                href="{{ route('e-commerce.store.product-view', ['companyId' => $companyId, 'companyName' => $companyName, 'productId' => $product->id, 'productName' => $product->name]) }}">
                                                <i class="fa-solid fa-eye"></i>
                                                View Product
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>