
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">GST</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">GST Audit</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">GSTR 1 B2B Summary</a></li>
                    <li class="breadcrumb-item active" aria-current="page">B2B Summary</li>
                </ol>
                <div class="col-auto ms-auto d-print-none pe-0">
                    <div class="btn-list d-none">
                        <a href="{{ route('erp.gst.gst-commodity.create') }}" class="btn btn-sm btn-primary d-none d-sm-inline-block me-0">
                            <i class="fas fa-plus me-1"></i>
                            Add GSTR 1 B2B Summary
                        </a>
                        <a href="{{ route('erp.gst.gst-commodity.create') }}" class="btn btn-sm btn-primary d-sm-none me-0">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body" wire:ignore>
                <form>
                    <div class="row mb-3">
                        <div class="col">
                            <select class="form-control form-select form-control-sm" id="format-input">
                                <option>GSTR 1 B2B Summary</option>
                            </select>
                        </div>
                        <div class="col-auto"></div>
                        <div class="col">
                            <div class="row">
                                <div class="col-md-6 col-form-label text-end">
                                    From
                                </div>
                                <div class="col-md-6">
                                    <input type="date" class="form-control form-control-sm" id="from" name="from">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col-md-6 col-form-label text-end">
                                    To
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control form-control-sm" type="date" name="to">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom datatable-common">
                        <thead>
                            <tr>
                                <th class="bg-primary text-white">Sr No</th>
                                <th class="bg-primary text-white">GSTIN No.</th>
                                <th class="bg-primary text-white">Party Name(Grouping)</th>
                                <th class="bg-primary text-white">City Name</th>
                                <th class="bg-primary text-white">No Of Invoices</th>
                                <th class="bg-primary text-white">Voucher Amount</th>
                                <th class="bg-primary text-white">Taxable Amount</th>
                                <th class="bg-primary text-white">State/UT Tax</th>
                                <th class="bg-primary text-white">Central Tax</th>
                                <th class="bg-primary text-white">Integrated Tax</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>