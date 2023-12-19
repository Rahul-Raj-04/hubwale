<!-- Cash/Bank Fubd Flow -->
<!-- <div class="card-body"> -->
    <!-- <div class="table-responsive"> -->
        <table class="table table-bordered text-nowrap border-bottom report_table">
            <thead>
                <tr>
                    <th class="bg-primary text-white">Index No.</th>
                    <th class="bg-primary text-white">Account Group</th>
                    <th class="bg-primary text-white">Opening</th>
                    <th class="bg-primary text-white">Total Credit</th>
                    <th class="bg-primary text-white">Total Debit</th>
                    <th class="bg-primary text-white">Closing</th>
                    <th class="bg-primary text-white">Fund Flow</th>
                    <th class="bg-primary text-white">Voucher</th>
                    <th class="bg-primary text-white">Action</th>
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
                    <td>
                        <a href="" class="btn btn-sm btn-outline-info">Edit</a>
                        <a href="{{ route('erp.report.account-book.ledger.allShow', ['id' => 1, 'type' => 'cash_bank_fund']) }}" class="btn btn-sm btn-outline-success">Show</a>
                        <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    <!-- </div> -->

    {{-- modals --}}
    {{-- @foreach ($accounts as $key => $account) --}}
        <div class="modal fade" id="delete-modal-">
            <div class="modal-dialog modal-dialog-centered text-center" role="document">
                <div class="modal-content tx-size-sm">
                    <div class="modal-body text-center p-4 pb-5">
                        <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                        <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                        <h4 class="text-danger">Are you sure you want to delete?</h4>
                        <form action="" method="POST" class="btn">
                                @method('DELETE')
                                @csrf
                                <input type="submit" value="Delete" class="btn btn-danger pd-x-25">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    {{-- @endforeach --}}
<!-- </div> -->