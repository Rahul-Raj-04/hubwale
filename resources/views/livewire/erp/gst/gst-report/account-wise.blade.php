<section>
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">GST</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">GST Report</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Account Wise</li>
                    </ol>
                </div>

                <div class="card-body">
                    <form>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <select id="format-input">
                                    <option>GST Account Wise Summary</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-6 text-end">
                                        Return period
                                    </div>
                                    <div class="col-md-6">
                                        <input type="month" id="return_period" name="return_period">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-6 text-end">
                                        From
                                    </div>
                                    <div class="col-md-6">
                                        <input type="date" id="from" name="from">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-6 text-end">
                                        To
                                    </div>
                                    <div class="col-md-6">
                                        <input type="date" name="to">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom report_table">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white">Particular</th>
                                    <th class="bg-primary text-white">GST %</th>
                                    <th class="bg-primary text-white">Taxable Amount</th>
                                    <th class="bg-primary text-white">Central Tax</th>
                                    <th class="bg-primary text-white">State/UT Tax</th>
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
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-auto ms-auto d-print-none mt-5 pe-0">
                        <div class="btn-list">
                            <a href="#" class="btn btn-primary btn-sm d-none d-sm-inline-block me-1">
                                <i class="fa fa-print me-0"></i>
                                Print
                            </a>
                            <a href="#" class="btn btn-primary btn-sm d-sm-none me-1">
                                <i class="fa fa-print me-0"></i>
                            </a>
                            <button id="format" class="btn btn-primary btn-sm d-none d-sm-inline-block me-1" data-bs-toggle="modal" data-bs-target="#filter_account"><i class="fas fa-filter"></i> Format</button>
                            <button class="btn btn-primary btn-sm d-sm-none me-1" data-bs-toggle="modal" data-bs-target="#filter_account">
                                <i class="fas fa-filter"></i>
                            </button>

                            <button id="date" class="btn btn-primary btn-sm d-none d-sm-inline-block me-1">Date</button>

                            <button id="month" class="btn btn-primary btn-sm d-none d-sm-inline-block me-1">Month</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


   <!-- modal for setting report period and the year -->
   @if ($isReportModal === true)
    <div class="modal  d-block" id="modal-report-for" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Report For</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                            <label for="category_short_name">Report For</label>
                            <select wire:model="report_for" class="form-control form-select" name="report_for">
                                <option value="">- Select -</option>
                                @if($report_period != "")
                                    @foreach (App\Enum\Enum::getReportPeriod($report_period) as $monthId => $month)
                                        <option value="{{ $monthId }}">{{ $month }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="submit" wire:click.prevent="setReportPeriod()" class="btn btn-primary" >Set Period</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif




    <script>
    window.addEventListener('report_table', event => {
        $('.report_table').DataTable({
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
            }
        });
    });

    $(document).ready(function() {
        $('#format').click(function (){
            $("#format-input").focus();
        });
        $('#date').click(function (){
            $("#from").focus();
        });
        $('#month').click(function (){
            $("#return_period").focus();
        });
        
        // $('#modal-report-for').modal('show');

        $('.report_table').DataTable({
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
            }
        });
    });
    </script>
</section>