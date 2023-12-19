<div class="row row-sm m-1">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header p-3 d-flex justify-content-between">
                <div class="d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('e-commerce.home') }}">E-Commerce</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a
                                href="{{ route('e-commerce.home') }}">Checkout</a></li>
                    </ol>
                </div>
                <div>
                    <a href="{{ url()->previous()}}" class="btn btn-secondary"><i
                            class="fa-solid fa-arrow-left mx-1"></i> Back To Home</a>
                </div>
            </div>

            @if ($products->count() > 0)
                <div class="card-body p-2">
                    <h5 class="m-3">Products</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>Product ID</th>
                                <th>Product Name</th>
                                <th>Product Variant</th>
                                <th>Product Packaging Type</th>
                                <th>Product Piece Per Box</th>
                                <th>Product Box Price</th>
                                <th>Product Piece Price</th>
                                <th>Product Quantity</th>
                                <th>Product Total</th>
                                <th>Product Tax</th>
                                <th>Product Gross</th>
                            </tr>
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
                                <td>{{ $product->total_amount_without_tax}}</td>
                                <td>{{ $product->tax." (".($product->product->tax ? $product->product->tax->tax : "0") ."%)"}}</td>
                                <td>{{ $product->total_amount}}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th class="bg-secondary">Total</th>
                                <th class="bg-secondary">{{ $products->sum('total_amount_without_tax') }}</th>
                                <th class="bg-secondary">{{ $products->sum('tax') }}</th>
                                <th class="bg-secondary">{{ $products->sum('total_amount') }}</th>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="my-3 p-3">
                        <h5>Address Details</h5>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Name</label>
                                <input type="text" wire:model='name' class="form-control">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label>Street address</label>
                                <input type="text" wire:model='street_address' class="form-control">
                                @error('street_address')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label>City</label>
                                <input type="text" wire:model='city' class="form-control">
                                @error('city')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label>State</label>
                                <input type="text" wire:model='state' class="form-control">
                                @error('state')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label>Pincode</label>
                                <input type="text" wire:model='pincode' class="form-control">
                                @error('pincode')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label>Remarks (Optional)</label>
                                <input type="text" wire:model='remarks' class="form-control">
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary" wire:click='placeOrder'><i class="fa-solid fa-credit-card mx-1"></i> Place Order</button>
                        </div>
                    </div>
                </div>
            @else
                <div class="card-body p-2 d-flex justify-content-center flex-column align-items-center">
                    <img src="{{ asset('img/new/imageNotFound.svg') }}" style="height: 200px; width:100%">
                    <h4 class="my-5">Please add some product to cart!</h4>
                </div>
            @endif
        </div>
    </div>
</div>