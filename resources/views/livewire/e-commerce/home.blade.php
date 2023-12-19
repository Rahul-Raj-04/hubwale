<div class="row row-sm m-1">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header p-3">
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">E-Commerce</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </div>
            </div>

            <div class="card-body p-2">
                <div class="form-group">
                    <label class="form-label">Your Store Link</label>
                    <a href="{{ $storeUrl }}" class="form-control" target="_blank">
                        {{ $storeUrl }}
                        <i class="fa-solid fa-arrow-up-right-from-square mx-2"></i>
                    </a>
                    <a class="btn btn-success my-3" href="whatsapp://send?text={{ $storeUrl }}" data-action="share/whatsapp/share">
                        <i class="fa-brands fa-whatsapp"></i>
                        Share via Whatsapp
                    </a>
                </div>
                <div class="d-flex">
                    <div class="card mx-2 p-2 border border-2 p-3">
                        <h3>Products</h3>
                        <h1>{{ $products }}</h1>
                    </div>
                    <div class="card mx-2 p-2 border border-2 p-3">
                        <h3>Orders</h3>
                        <h1>{{ $orders }}</h1>
                    </div>
                    <div class="card mx-2 p-2 border border-2 p-3">
                        <h3>Categories</h3>
                        <h1>{{ $categories }}</h1>
                    </div>
                    <div class="card mx-2 p-2 border border-2 p-3">
                        <h3>Total Sales</h3>
                        <h1>{{ $totlaSales }}</h1>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label">Visited Products</label>
                    </div>
                    <table class="table">
                        <tr>
                            <th>Index</th>
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