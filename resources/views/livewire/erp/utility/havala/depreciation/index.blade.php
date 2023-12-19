<section>
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Utility</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Havala</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Depreciation</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Index</li>
                    </ol>
                </div>
                <div class="card-body"> 
                    <form>
                        <div class="row">
                            <lable>Total Depreciation : 00000</lable>
                        </div>
                    </form>
                    <table class="table table-bordered text-nowrap border-bottom datatable-common">
                        <thead>
                            <tr>
                                <th class="bg-primary text-white">Index No.</th>
                                <th class="bg-primary text-white">Asset Account</th>
                                <th class="bg-primary text-white">Depreciation Account</th>
                                <th class="bg-primary text-white">Percentage</th>
                                <th class="bg-primary text-white">Amount</th>
                                <th class="bg-primary text-white">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Cash Ledger</td>
                                <td>Test depreciation pravin account</td>
                                <td>50%</td>
                                <td>10000CR</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-outline-info">
                                        <span data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </apan>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-outline-info">
                                        Ledger
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="col-auto ms-auto d-print-none mt-5 pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.utility.havala.depreciation.create') }}" class="btn btn-primary btn-sm d-none d-sm-inline-block me-1">
                                <i class="fas fa-plus me-1"></i>
                                New
                            </a>
                            <a href="#" class="btn btn-primary btn-sm d-none d-sm-inline-block me-1">
                                Havala
                            </a>
                            <a href="#" class="btn btn-primary btn-sm d-none d-sm-inline-block me-1">
                                Summury
                            </a>
                            <a href="#" class="btn btn-primary btn-sm d-none d-sm-inline-block me-1">
                                <i class="fa fa-print me-0"></i>
                                Print
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="date-range-model" tabindex="-1" aria-hidden="true" wire:ignore.self data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Date Range</h5>
                    <a href="#" class="btn-close btn-sm" data-bs-dismiss="modal"
                                    aria-label="Close"></a>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group mt-2">
                            <label for="category_short_name">From</label>
                            <input type="date" class="form-control form-control-sm" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="category_short_name">To</label>
                            <input type="date" class="form-control form-control-sm" required>
                        </div>
                        <input type="submit" id="submit" class="d-none">
                    </form>
                </div>
                <div class="modal-footer">
                    <label for="submit" class="btn btn-sm btn-primary ">OK</label>
                </div>
            </div>
        </div>
    </div>
        <script>
            document.addEventListener('livewire:load', function () {
                $(window).on('load', function() {
                    $('#date-range-model').modal('show');
                });
            });
        </script>
</section>