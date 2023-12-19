<div class="row row-sm m-1">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header p-3">
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">E-Commerce</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Product</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Import</li>
                    </ol>
                </div>
            </div>

            <div class="card-body p-2">
                <div class="row">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Select Excel File</label>
                            <input type="file" class="form-control" wire:model='file'>
                            @error('file')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <a href="{{ asset('extra/demo-excel-hubwale.ods') }}" download target="_blank" class="btn btn-outline-primary btn-sm my-2">
                                <i class="fa fa-download" aria-hidden="true"></i>
                                <span>Download Demo Excel File</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 my-3">
                        <button class="btn btn-primary" wire:click='importProducts'>Import Products</button>
                        <a href="{{ route('e-commerce.product.index') }}" class="btn btn-secondary mx-3">Back</a>
                    </div>

                    <div class="col-md-12 {{ !$fileErrors ? "d-none" : "" }}">
                        <label class="form-label">Errors</label>
                        <table class="table table-stripted">
                            <thead>
                                <tr>
                                    <th>Row</th>
                                    <th>Column Name</th>
                                    <th>Errors</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fileErrors as $fileError)
                                    <tr>
                                        <td>{{ $fileError['row'] ?? '-' }}</td>
                                        <td>{{ $fileError['attribute'] ?? '-' }}</td>
                                        <td>
                                            @if (array_key_exists('errors', $fileError))
                                                <table>
                                                    <tr>
                                                        @foreach ($fileError['errors'] as $fileErrorNew)
                                                            <td class="text-danger">{{ $fileErrorNew }}</td>
                                                        @endforeach
                                                    </tr>
                                                </table>
                                            @endif
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
</div>