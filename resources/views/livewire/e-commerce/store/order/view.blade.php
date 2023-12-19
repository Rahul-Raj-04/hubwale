<div class="row row-sm m-1">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header p-3 d-flex justify-content-between">
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">E-Commerce</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Order</a></li>
                        <li class="breadcrumb-item active" aria-current="page">#{{ $order->id }}</li>
                    </ol>
                </div>
                <div>
                    <a href="{{ route('e-commerce.store.order') }}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left mx-1"></i> Back</a>
                </div>
            </div>

            <div class="card-body p-2">
                <h4>Order Id #{{ $order->id }}</h4>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" value="{{ $order->name }}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Street Address</label>
                        <input type="text" class="form-control" value="{{ $order->street_address }}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">City</label>
                        <input type="text" class="form-control" value="{{ $order->city }}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">State</label>
                        <input type="text" class="form-control" value="{{ $order->state }}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Pincode</label>
                        <input type="text" class="form-control" value="{{ $order->pincode }}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Order Total Amount</label>
                        <input type="text" class="form-control" value="{{ $order->total_amount }}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Payment Method</label>
                        <input type="text" class="form-control" value="{{ $order->payment_method }}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Remarks</label>
                        <input type="text" class="form-control" value="{{ $order->remarks }}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Date</label>
                        <input type="text" class="form-control" value="{{ $order->created_at }}" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Payment Status</label>
                        <input type="text" class="form-control" value="{{ $order->payment_status ? $order->payment_status->name : 'no updated' }}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Order Status</label>
                        <input type="text" class="form-control" value="{{ $order->order_status? $order->order_status->name : 'no updated' }}" readonly>
                    </div>
                </div>

                <div class="p-1">
                    <label class="form-label">Order Items</label>
                    <div class="row">
                        <table class="table table-responsive table-bordered text-nowrap border-bottom">
                            <tr>
                                <th>ID</th>
                                <th>Product Category</th>
                                <th>Product Name</th>
                                <th>Variation Name</th>
                                <th>Ordered Packaging Type</th>
                                <th>Quantity</th>
                                <th>Box Price</th>
                                <th>Piece Price</th>
                                <th>Sub Total</th>
                                <th>Discount</th>
                                <th>Tax</th>
                                <th>Total Amount</th>
                                <th>Payment Status</th>
                                <th>Order Status</th>
                            </tr>
                            @foreach ($order->items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->product->category->name }}</td>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->variation->size->name }}</td>
                                <td>{{ $item->packaging_type}}</td>
                                <td>{{ $item->quantity}}</td>
                                <td>{{ $item->packaging_type == 'box' ? $item->variation->box_price : '-'}}</td>
                                <td>{{ $item->packaging_type == 'piece' ? $item->variation->piece_price : '-'}}</td>
                                <td>{{ ($item->total_amount - $item->tax) + $item->discount}}</td>
                                <td>{{ $item->discount}}</td>
                                <td>{{ $item->tax}}</td>
                                <td>{{ $item->total_amount}}</td>
                                <td>{{ $item->payment_status ? $item->payment_status->name : 'no updated'}}</td>
                                <td>{{ $item->order_status ?$item->order_status->name : 'no updated'}}</td>
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
                                <th class="bg-secondary">{{ ($order->items->sum('total_amount') - $order->items->sum('tax')) +
                                    $order->items->sum('discount') }}</th>
                                <th class="bg-secondary">{{ $order->items->sum('discount') }}</th>
                                <th class="bg-secondary">{{ $order->items->sum('tax') }}</th>
                                <th class="bg-secondary">{{ $order->items->sum('total_amount') }}</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>