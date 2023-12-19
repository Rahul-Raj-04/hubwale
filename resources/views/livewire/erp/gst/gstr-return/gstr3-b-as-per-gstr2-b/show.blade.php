
<section>
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">GST</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">GST Return</a></li>
                        <li class="breadcrumb-item active" aria-current="page">GSTR 3B (as per GSTR 2B)</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none pe-0">
                        <div class="btn-list">
                            <div class="btn-list">
                                <a href="{{ route('erp.gst.gstr-return.gstr-3-b-as-per-gstr-2-b.index') }}" class="btn btn-sm btn-default d-none d-sm-inline-block mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                                <a href="{{ route('erp.gst.gstr-return.gstr-3-b-as-per-gstr-2-b.index') }}" class="btn btn-sm btn-default d-sm-none mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body" wire:ignore>
                    <form>
                        <div class="row mb-3">
                            <div class="col">
                                <select class="form-control form-select form-control-sm" id="format-input">
                                    <option>GSTR 3B as per Book</option>
                                </select>
                            </div>
                            <div class="col-auto"></div>
                            <div class="col">
                                <div class="row">
                                    <div class="col-md-6 col-form-label text-end">
                                        Return period
                                    </div>
                                    <div class="col-md-6">
                                        <select wire:model="return_period" class="form-control form-select form-control-sm" name="return_period">
                                            @foreach (getReportPeriod($report_period) as $monthId => $month)
                                                <option value="{{ $monthId }}">{{ $month }}</option>
                                            @endforeach
                                    </select>
                                    </div>
                                </div>
                            </div>
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
                        <table class="table table-bordered text-nowrap border-bottom">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white">Voucher Type</th>
                                    <th class="bg-primary text-white">Date</th>
                                    <th class="bg-primary text-white">Vou No</th>
                                    <th class="bg-primary text-white">Doc.No</th>
                                    <th class="bg-primary text-white">GST Slab</th>
                                    <th class="bg-primary text-white">Invoice Type</th>
                                    <th class="bg-primary text-white">Taxable Amount</th>
                                    <th class="bg-primary text-white">Integrated Tax</th>
                                    <th class="bg-primary text-white">Central Tax</th>
                                    <th class="bg-primary text-white">State/UT Tax</th>
                                    <th class="bg-primary text-white">Party Name</th>
                                    <th class="bg-primary text-white">City Name</th>
                                    <th class="bg-primary text-white">GSTIN NO</th>
                                    <th class="bg-primary text-white">Part Registration Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="14" class="text-danger">{{ $parent_text }}</td>
                                </tr>
                                <tr>
                                    <td colspan="14"></b>{{ $sub_text }}</b></td>
                                </tr>
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
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="col-auto ms-auto d-print-none mt-5 pe-0">
                            <div class="btn-list">
                                <a class="btn btn-primary btn-sm">
                                    Date
                                </a>
                                
                                <a class="btn btn-primary btn-sm">
                                    Format
                                </a>
                                
                                <a class="btn btn-primary btn-sm">
                                    Print
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>