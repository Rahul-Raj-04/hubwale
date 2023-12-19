<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">GST</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">GST Audit</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">ITC As per GSTR 2B</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Claimed ITC As per GSTR 2B</li>
                </ol>

                <div class="col-auto ms-auto d-print-none pe-0">
                    <div class="btn-list d-none">
                        <a href="{{ route('erp.gst.gst-commodity.create') }}" class="btn btn-sm btn-primary d-none d-sm-inline-block me-0">
                            <i class="fas fa-plus me-1"></i>
                            Claimed ITC As Per GSTR 2B
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
                            <select class="form-control form-control-sm form-select " id="format-input">
                                <option>Claimed ITC As Per GSTR 2B </option>
                            </select>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col-md-6 text-end">
                                    Return period
                                </div>
                                <div class="col-md-6">
                                    <select wire:model="return_period" class="form-control form-control-sm form-select" name="return_period">
                                        @foreach (getReportPeriod($report_period) as $monthId => $month)
                                            <option value="{{ $monthId }}">{{ $month }}</option>
                                        @endforeach
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col-md-6 text-end col-form-label">
                                    From
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control form-control-sm" type="date" id="from" name="from">
                                </div>
                            </div>
                        </div>
                        <div class="col"> 
                            <div class="row">
                                <div class="col-md-6 text-end col-form-label">
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
                                <th class="bg-primary text-white">GSTR 3B Grouping</th>
                                <th class="bg-primary text-white">Taxable Amount</th>
                                <th class="bg-primary text-white">Integrated Tax</th>
                                <th class="bg-primary text-white">Central Tax</th>
                                <th class="bg-primary text-white">State/UT Tax</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
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

    <!-- modal for setting report period and the year -->
    <div class="modal {{$isReportModal ? 'd-block' : 'd-none' }}" data-bs-backdrop="static" data-bs-keyboard="false" id="modal-report-for" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Report For</h5>
                </div>
                <div class="modal-body">
                    <form class="row" action="#">
                        <div class="form-group mt-2 col-6">
                            <label for="category_name">Report Period</label>
                            <select wire:model="report_period" class="form-control form-select" name="report_period">
                                <option value="">- Select -</option>
                                <option value="monthly">Monthly</option>
                                <option value="quarterly">Quarterly</option>
                                <option value="annual">Annual</option>
                            </select>
                        </div>
                        <div class="form-group mt-2 col-6">
                            <label for="date_range">Date Range</label>
                            <select wire:model="return_period" class="form-control form-select" name="return_period">
                                @if($report_period != "")
                                @foreach (getReportPeriod($report_period) as $monthId => $month)
                                <option value="{{ $monthId }}">{{ $month }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </form>
                    <div class="modal-footer d-flex justify-content-right">
                        <button type="submit" wire:click.prevent="setReportPeriod()" class="btn btn-primary">Set Period</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
