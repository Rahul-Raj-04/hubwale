<div class="row row-sm m-1">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header p-3 d-flex justify-content-between">
                <div class="d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('e-commerce.home') }}">E-Commerce</a></li>
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
                                <a href="{{ route('e-commerce.store.index', ['companyId' => $store->company->id, 'companyName' => $store->company->company_name]) }}"
                                    target="_blank">Open Store URL</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>

                <div class="p-2 my-4">
                    <h5>Visited Products</h5>
                    <table class="table">
                        <tr>
                            <th>Sr. No.</th>
                            <th>Store Name</th>
                            <th>Product Name</th>
                            <th>Store URL</th>
                            <th>Product URL</th>
                        </tr>
                        @foreach ($visitedProducts as $key => $visitedProduct)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $visitedProduct->product->company->company_name }}</td>
                            <td>{{ $visitedProduct->product->name}}</td>
                            <td>
                                <a href="{{ $visitedProduct->product->store_url }}" class="form-control" target="_blank">
                                    {{ $visitedProduct->product->store_url }}
                                    <i class="fa-solid fa-arrow-up-right-from-square mx-2"></i>
                                </a>
                            </td>
                            <td>
                                <a href="{{ $visitedProduct->product->url }}" class="form-control" target="_blank">
                                    {{ $visitedProduct->product->url }}
                                    <i class="fa-solid fa-arrow-up-right-from-square mx-2"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>