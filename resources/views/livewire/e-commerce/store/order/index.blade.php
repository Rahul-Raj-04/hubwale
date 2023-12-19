<div class="row row-sm m-1">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header p-3 d-flex justify-content-between">
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">E-Commerce</a></li>
                        <li class="breadcrumb-item active" aria-current="page">My Orders</li>
                    </ol>
                </div>
                <div>
                    <a href="{{ url()->previous()}}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left mx-1"></i> Back</a>
                </div>
            </div>

            <div class="card-body p-2" wire:ignore>
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom datatable-common">
                        <thead>
                            <tr>
                                <th class="bg-primary text-white">ID</th>
                                <th class="bg-primary text-white">Customer</th>
                                <th class="bg-primary text-white">City</th>
                                <th class="bg-primary text-white">Products</th>
                                <th class="bg-primary text-white">Payment Status</th>
                                <th class="bg-primary text-white">Order Status</th>
                                <th class="bg-primary text-white">View</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $record)
                            <tr>
                                <td>{{ $record->id }}</td>
                                <td>{{ $record->name }}</td>
                                <td>{{ $record->city }}</td>
                                <td>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Product Quantity</th>
                                            <th>Product Packaging Type</th>
                                        </tr>
                                        @foreach ($record->items as $item)
                                            <tr>
                                                <td>{{ $item->product->name." ".$item->variation->name}}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ $item->packaging_type }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </td>
                                <td>{{ $record->payment_status->name ?? '-' }}</td>
                                <td>{{ $record->order_status->name ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('e-commerce.store.order.view', $record->id) }}"
                                        class="btn btn-primary btn-sm" title="Edit">
                                        <i class="fa-solid fa-eye"></i>
                                        View Order
                                    </a>
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