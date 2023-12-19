<div class="row row-sm m-1">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header p-3">
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">E-Commerce</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Category</a></li>
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
                                <th class="bg-primary text-white">Name</th>
                                <th class="bg-primary text-white">Type</th>
                                <th class="bg-primary text-white">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $record)
                            <tr>
                                <td>{{ $record->id }}</td>
                                <td>{{ $record->name}}</td>
                                <td>{{ $record->type }}</td>
                                <td>
                                    <a href="{{ route('e-commerce.category.edit', $record->id) }}" class="btn btn-primary btn-sm" data-bs-title="Edit">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-title="Delete"
                                        wire:click="deleteCategory({{ $record->id }})">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-auto ms-auto d-print-none mt-5 pe-0">
                    <div class="btn-list">
                        <a href="{{ route('e-commerce.category.create') }}" class="btn btn-primary btn-sm d-none d-sm-inline-block me-1">
                            <i class="fas fa-plus me-1"></i>
                            Add
                        </a>

                        <a href="{{ route('e-commerce.category.create') }}" class="btn btn-primary btn-sm d-sm-none me-1">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>