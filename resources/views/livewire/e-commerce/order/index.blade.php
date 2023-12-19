<div class="row row-sm m-1">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header p-3">
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">E-Commerce</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Order</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Index</li>
                    </ol>
                </div>
            </div>

            <div class="card-body p-2" wire:ignore>
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom datatable-common">
                        <thead>
                            <tr>
                                <th class="bg-primary text-white">ID</th>
                                <th class="bg-primary text-white">Customer</th>
                                <th class="bg-primary text-white">Street Address</th>
                                <th class="bg-primary text-white">City</th>
                                <th class="bg-primary text-white">State</th>
                                <th class="bg-primary text-white">Payment Status</th>
                                <th class="bg-primary text-white">Order Status</th>
                                <th class="bg-primary text-white">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $record)
                            <tr>
                                <td>{{ $record->id }}</td>
                                <td>{{ $record->name }}</td>
                                <td>{{ $record->street_address }}</td>
                                <td>{{ $record->city }}</td>
                                <td>{{ $record->state }}</td>
                                <td>{{ $record->payment_status->name ?? '-' }}</td>
                                <td>{{ $record->order_status->name ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('e-commerce.order.edit', $record->id) }}" class="btn btn-primary btn-sm" title="Edit">
                                        <i class="fa-solid fa-pencil"></i>
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