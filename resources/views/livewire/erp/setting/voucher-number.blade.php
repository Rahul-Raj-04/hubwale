<div>


    <!-- modal -->
    <div class="modal fade" id='voucher_number_modal'>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Setup -> Vouchar Number -> Voucher Number</h3>
                </div>
                <div class="modal-body" >
                    <table class="table table-hover table-bordered">
                        <tr>
                            <th class="bg-primary text-white">Voucher Type</th>
                            <th class="bg-primary text-white">Prefix</th>
                            <th class="bg-primary text-white">Last Voucher No.</th>
                            <th class="bg-primary text-white">Tax/Retail</th>
                            <th class="bg-primary text-white">Action</th>
                        </tr>
                        <tr>
                            <td>Bank Payment</td>
                            <td>BP </td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Edit"
                                    wire:click="editRecord(1)">
                                    <i class="fa-solid fa-pencil"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Delete"
                                    wire:click="deleteRecord(1)">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>Bank Receipt</td>
                            <td>BR</td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Edit"
                                    wire:click="editRecord(1)">
                                    <i class="fa-solid fa-pencil"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-title="Delete"
                                    wire:click="deleteRecord(1)">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </td>
                        </tr>
                    </table>


                    <!-- action buttons -->
                    <div class="">
                        <a class="btn btn-primary btn-sm  me-1" data-bs-toggle="modal"
                            data-bs-target="#voucher_number_add_record_modal">
                            <i class="fas fa-plus me-1"></i>
                            Add
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- add record modal -->
    <div class="modal fade" id="voucher_number_add_record_modal" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Setup -> Voucher Number -> Add Voucher No. </h3>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="row my-2">
                            <label for="" class="col-md-3 col-form-label ">Voucher Type</label>
                            <select class="col-md-9 form-control form-control-sm form-select">
                                <option >Bank Payment</option>
                                <option >Bank Receipt</option>
                                <option >Cash Payment</option>
                                <option >Cash Receipt</option>
                                <option >Credit Note</option>
                                <option >Credit Note w/o stock</option>
                                <option >Credit Note with stock</option>
                                <option >Credit Note (common) </option>
                                <option >Debit Note </option>
                                <option >Debit Note w/o stock</option>
                                <option >Debit Note with stock</option>
                                <option >Debit Note (common) </option>
                                <option >GST Bank Payment</option>
                                <option >GST Cash Payment</option>
                                <option >GST Expense</option>
                                <option >GST Income</option>
                                <option >Journal</option>
                                <option >Payment</option>
                                <option >Purc. Bill</option>
                                <option >Purc. Return</option>
                                <option >RCM Bank Payment</option>
                                <option >RCM Cash Payment</option>
                                <option >Receipt</option>
                                <option >Sales Bill</option>
                                <option >Sales Return</option>
                                <option >Utilization Entry</option>
                            </select>
                        </div>
                        <div class="row my-2">
                            <label for="" class="col-md-3 col-form-label ">Voucher Prefix</label>
                            <input type="text" class="col-md-9 form-control form-control-sm ">
                        </div>
                        <div class="row my-2">
                            <label for="" class="col-md-3 col-form-label ">Last Voucher No.</label>
                            <input type="number" class="col-md-9 form-control form-control-sm ">
                        </div>
                        <div class="row my-2">
                            <label for="" class="col-md-3 col-form-label ">Tax/Retail</label>
                            <select  disabled class="col-md-9 form-control form-control-sm form-select">
                                <option >Tax Invoice</option>
                            </select>
                        </div>
                        <div class="row my-2">
                            <label for="" class="col-md-3 col-form-label ">Year Suffix Req. ?</label>
                            <select   class="col-md-9 form-control form-control-sm form-select">
                                <option >Yes</option>
                                <option >No</option>
                            </select>
                        </div>
                    </form> 
                    <div class="my-4 text-center">
                        <button data-bs-dismiss="modal" class="btn text-white btn-primary">Add Voucher</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- edit record modal -->
    <div class="modal fade" id="voucher_number_edit_record_modal" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Setup -> Voucher Number -> Edit Voucher No. </h3>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="row my-2">
                            <label for="" class="col-md-3 col-form-label ">Voucher Type</label>
                            <select class="col-md-9 form-control form-control-sm form-select">
                                <option >Bank Payment</option>
                                <option >Bank Receipt</option>
                                <option >Cash Payment</option>
                                <option >Cash Receipt</option>
                                <option >Credit Note</option>
                                <option >Credit Note w/o stock</option>
                                <option >Credit Note with stock</option>
                                <option >Credit Note (common) </option>
                                <option >Debit Note </option>
                                <option >Debit Note w/o stock</option>
                                <option >Debit Note with stock</option>
                                <option >Debit Note (common) </option>
                                <option >GST Bank Payment</option>
                                <option >GST Cash Payment</option>
                                <option >GST Expense</option>
                                <option >GST Income</option>
                                <option >Journal</option>
                                <option >Payment</option>
                                <option >Purc. Bill</option>
                                <option >Purc. Return</option>
                                <option >RCM Bank Payment</option>
                                <option >RCM Cash Payment</option>
                                <option >Receipt</option>
                                <option >Sales Bill</option>
                                <option >Sales Return</option>
                                <option >Utilization Entry</option>
                            </select>
                        </div>
                        <div class="row my-2">
                            <label for="" class="col-md-3 col-form-label ">Voucher Prefix</label>
                            <input type="text" class="col-md-9 form-control form-control-sm ">
                        </div>
                        <div class="row my-2">
                            <label for="" class="col-md-3 col-form-label ">Last Voucher No.</label>
                            <input type="number" class="col-md-9 form-control form-control-sm ">
                        </div>
                        <div class="row my-2">
                            <label for="" class="col-md-3 col-form-label ">Tax/Retail</label>
                            <select  disabled class="col-md-9 form-control form-control-sm form-select">
                                <option >Tax Invoice</option>
                            </select>
                        </div>
                        <div class="row my-2">
                            <label for="" class="col-md-3 col-form-label ">Year Suffix Req. ?</label>
                            <select   class="col-md-9 form-control form-control-sm form-select">
                                <option >Yes</option>
                                <option >No</option>
                            </select>
                        </div>
                    </form> 
                    <div class="my-4 text-center">
                        <button class="btn text-white btn-primary" data-bs-dismiss="modal">Edit Voucher</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <script>

        // edit modal
        window.addEventListener('openRecordEditModal', event => {
            $('#voucher_number_edit_record_modal').modal('show')
        });



    </script>
</div>
