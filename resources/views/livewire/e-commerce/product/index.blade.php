<div class="row row-sm m-1">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header p-3 d-flex justify-content-between">
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">E-Commerce</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Product</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Index</li>
                    </ol>
                </div>
                <div>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-title="Upload Image's" data-bs-toggle="modal" data-bs-target="#uploadBulkImagesModal">
                        <i class="fas fa-file-upload"></i> Upload Image's
                    </button>
                </div>
            </div>

            <div class="card-body p-2" wire:ignore>
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom datatable-common">
                        <thead>
                            <tr>
                                <th class="bg-primary text-white">ID</th>
                                <th class="bg-primary text-white">Image</th>
                                <th class="bg-primary text-white">Name</th>
                                <th class="bg-primary text-white">Category</th>
                                <th class="bg-primary text-white">Box Price Range</th>
                                <th class="bg-primary text-white">Piece Price Range</th>
                                <th class="bg-primary text-white">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $record)
                            <tr>
                                <td>{{ $record->id }}</td>
                                <td class="w-100">
                                    @if ($record->getFirstMediaUrl('images'))
                                    <img src="{{ $record->getFirstMediaUrl('images') }}" style="height: 40px">
                                    @else
                                    -
                                    @endif
                                    <button type="button" class="btn btn-success btn-sm" data-bs-title="Upload Image's"
                                        wire:click='openUploadFilesModal({{ $record->id }})'>
                                        <i class="fas fa-file-upload"></i>
                                    </button>
                                </td>
                                <td>{{ $record->name}}</td>
                                <td>{{ $record->category->name}}</td>
                                <td>{{ $record->box_price_range}}</td>
                                <td>{{ $record->piece_price_range}}</td>
                                <td>
                                    <a href="{{ route('e-commerce.product.edit', $record->id) }}"
                                        class="btn btn-primary btn-sm" title="Edit">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-title="Delete"
                                        wire:click="deleteProduct({{ $record->id }})">
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
                        <a href="{{ route('e-commerce.product.create') }}"
                            class="btn btn-primary btn-sm d-none d-sm-inline-block me-1">
                            <i class="fas fa-plus me-1"></i>
                            Add
                        </a>

                        <a href="{{ route('e-commerce.product.create') }}"
                            class="btn btn-primary btn-sm d-sm-none me-1">
                            <i class="fas fa-plus"></i>
                        </a>

                        <a href="{{ route('e-commerce.product.import') }}" class="btn btn-primary btn-sm d-none d-sm-inline-block me-1">
                            <i class="fas fa-upload me-1"></i>
                            Import Products
                        </a>
                        
                        <a href="{{ route('e-commerce.product.create') }}" class="btn btn-primary btn-sm d-sm-none me-1">
                            <i class="fas fa-upload"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- upload images --}}
    <div class="modal fade" id="uploadImagesModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Image's</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="row">
                                    <label class="form-label">Select Image</label>
                                    <input type="file" class="form-control" wire:model='productImages' multiple>
                                </div>
                                @error('productImages')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click='uploadFileModal' wire:loading.attr="disabled">Upload</button>
                </div>
            </div>
        </div>
    </div>

    {{-- upload images in bulk --}}
    <div class="modal fade" id="uploadBulkImagesModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Bulk Image's</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="row">
                                    <label class="form-label">Select Image</label>
                                    <input type="file" class="form-control" wire:model='productBulkImages' multiple>
                                </div>
                                <div class="row my-3">
                                    <label class="form-label">Select Category</label>
                                    <select class="form-select" wire:model='productBulkImagesCategory'>
                                        <option value="">Select</option>
                                        @foreach ($productImagesCategories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click='uploadBulkImages'
                        wire:loading.attr="disabled">Upload</button>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        window.addEventListener('openUploadFilesModal', event => {
            $('#uploadImagesModal').modal('show');
        })
    </script>
</div>