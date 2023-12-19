<div class="row row-sm m-1">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header p-3 d-flex justify-content-between">
                <div class="d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('e-commerce.home') }}">E-Commerce</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('e-commerce.home') }}">Cart</a></li>
                    </ol>
                </div>
                <div>
                    <a href="{{ url()->previous()}}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left mx-1"></i> Back</a>
                    <a href="{{ route('e-commerce.store.checkout') }}" class="btn btn-primary"><i class="fa-solid fa-cash-register mx-1"></i> Checkout</a>
                </div>
            </div>

            <div class="card-body p-2">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom datatable-common">
                        <thead>
                            <tr>
                                <th>Product ID</th>
                                <th>Product Name</th>
                                <th>Product Variant</th>
                                <th>Product Packaging Type</th>
                                <th>Product Piece Per Box</th>
                                <th>Product Box Price</th>
                                <th>Product Piece Price</th>
                                <th>Product Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->product->id}}</td>
                                    <td>{{ $product->product->name}}</td>
                                    <td>{{ $product->product_variation->size->name}}</td>
                                    <td>{{ $product->packaging_type}}</td>
                                    <td>{{ $product->product_variation->piece_per_box}}</td>
                                    <td>{{ $product->product_variation->box_price}}</td>
                                    <td>{{ $product->product_variation->piece_price}}</td>
                                    <td>{{ $product->quantity}}</td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-title="Delete" wire:click='removeProductFromCart({{ $product->id }})'>
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>