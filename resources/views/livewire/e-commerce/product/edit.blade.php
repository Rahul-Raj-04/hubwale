<div class="row row-sm m-1">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header p-3">
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('e-commerce.home') }}">E-Commerce</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('e-commerce.product.index') }}">Product</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </div>
            </div>

            <div class="card-body p-2">
                <div class="row">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" wire:model='productName'>
                            @error('productName')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Tax (Optional)</label>
                            <select class="form-control" wire:model='productTax'>
                                <option value="">---Select---</option>
                                @foreach ($productTaxes as $tax)
                                <option value="{{ $tax->id }}">{{ $tax->name }}</option>
                                {{ info($tax->id) }}
                                @endforeach
                            </select>
                            @error('productTax')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Category</label>
                            <select class="form-control" wire:model='productCategory'>
                                <option value="">---Select---</option>
                                @foreach ($productCategories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('productCategory')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Sub Category</label>
                            <select class="form-control" wire:model='productSubCategory'>
                                <option value="">---Select---</option>
                                @foreach ($productSubCategories as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('productSubCategory')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Brand</label>
                            <select class="form-control" wire:model='productBrand'>
                                <option value="">---Select---</option>
                                @foreach ($productBrands as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('productBrand')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Supplier Brand</label>
                            <select class="form-control" wire:model='productSupplierBrand'>
                                <option value="">---Select---</option>
                                @foreach ($productSupplierBrands as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('productSupplierBrand')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label class="form-label">Description</label>
                            <textarea cols="30" rows="10" class="form-control"
                                wire:model='productDescription'></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="form-label">Upload Photos</label>
                            <input type="file" accept="image/*" class="form-control" multiple
                                wire:model='productImages'>
                            @error('productImages')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="my-2 d-flex">
                                @foreach ($product->getMedia('images') as $item)
                                @php if (!in_array($item->id, $deleteMediaArray)) {
                                        @endphp
                                        <div class="d-flex flex-column mx-2">
                                            <img src="{{ $item->getUrl() }}" style="height: 100px; width:100px">
                                            <button type="button" class="btn btn-danger btn-sm" title="Delete" wire:click='deleteMedia({{ $item->id }})'>
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </div>
                                @php } @endphp
                                @endforeach
                            </div>
                            <span class="mx-2 text-danger">Your image's will delete after click on 'Update Product'.</span>
                        </div>
                    </div>

                    <div class="my-3">
                        <div class="d-flex my-2">
                            <label class="form-label">Product Variations</label>
                        </div>
                        @error('productVariations')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <table class="table table-bordered">
                            <tr>
                                <th>Name</th>
                                <th>Packaging Type</th>
                                <th>Box Price</th>
                                <th>Piece Per Box</th>
                                <th>Piece Price</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <td>
                                    <select class="form-control {{ $errors->has('productVariationName') ? 'is-invalid' : '' }}"
                                        wire:model='productVariationName'>
                                        <option value="">Select</option>
                                        @foreach ($productVariationSizes as $productVariationSize)
                                        <option value="{{ $productVariationSize->id }}">{{ $productVariationSize->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control {{ $errors->has('productVariationPackagingType') ? 'is-invalid' : '' }}" wire:model='productVariationPackagingType'>
                                        <option value="both">Both</option>
                                        <option value="box">Box</option>
                                        <option value="piece">Piece</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="number" class="form-control {{ $errors->has('productVariationBoxPrice') ? 'is-invalid' : '' }}"
                                        placeholder="Enter Box Price" wire:model='productVariationBoxPrice' {{ ($productVariationPackagingType=='box' OR
                                        $productVariationPackagingType=='both' ) ? '' : 'readonly' }}>
                                </td>
                                <td>
                                    <input type="number" class="form-control {{ $errors->has('productVariationPiecePerBox') ? 'is-invalid' : '' }}"
                                        placeholder="Enter Piece Per Box" wire:model='productVariationPiecePerBox' {{
                                        ($productVariationPackagingType=='box' OR $productVariationPackagingType=='both' ) ? '' : 'readonly' }}>
                                </td>
                                <td>
                                    <input type="number" class="form-control {{ $errors->has('productVariationPiecePrice') ? 'is-invalid' : '' }}"
                                        placeholder="Enter Piece Price" wire:model='productVariationPiecePrice' {{
                                        ($productVariationPackagingType=='piece' OR $productVariationPackagingType=='both' ) ? '' : 'readonly' }}>
                                </td>
                                <td>
                                    <button class="btn btn-primary mx-2" wire:click='addVariation'><i
                                            class="fa-solid fa-plus"></i> Add Variation</button>
                                </td>
                            </tr>
                            @foreach ($productVariations as $key => $item)
                            <tr>
                                <td>{{ $item['actual_name'] }}</td>
                                <td>{{ $item['packaging_type'] }}</td>
                                <td>{{ $item['box_price'] ?? 0.00 }}</td>
                                <td>{{ $item['piece_per_box'] ?? 0 }}</td>
                                <td>{{ $item['piece_price'] ?? 0.00 }}</td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-title="Delete"
                                        wire:click='deleteVariation({{ $item['is_old'] ? $item['id'] : $key }})'>
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        <span class="mx-2 text-danger">Your variations will delete after click on 'Update Product'.</span>
                    </div>
                    <div class="col-md-6 my-3">
                        <button class="btn btn-primary" wire:click='saveProduct'>Update Product</button>
                        <a href="{{ route('e-commerce.product.index') }}" class="btn btn-secondary mx-3">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>