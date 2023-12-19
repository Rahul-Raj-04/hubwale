<div>
    <link rel="stylesheet" href="{{asset('css/summernote-lite.min.css')}}">

        <div class="modal" id="voucher_format" >
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Setup -> Voucher Format -> Format Selection</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class='col-12'>

                                <div class="row">
                                    <!-- report type -->
                                    <div class="col-md-6">
                                        <div class="my-2 row">
                                            <label for="" class='col-form-label  col-md-3'>Report Type</label>
                                            <select wire:model='report_type' class="col-md-9 form-control form-control-sm form-select">
                                                <option >GST Cash Payment</option>
                                                <option >GST Expense</option> 
                                                <option >GST Income</option>
                                                <option >GST Journal</option>
                                                <option >ournal</option>
                                                <option >Prod. Master</option>
                                                <option >Purc. Bill</option>
                                                <option >Purc. Return</option>
                                                <option >RCM Bank Payment</option>
                                                <option >Sales Bill</option>
                                                <option >Sales Return</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- print mode -->
                                    <div class="col-md-6">
                                        <div class="my-2 row">
                                            <label for="" class="col-form-label  col-md-3">Print Mode</label>
                                            <select name="" class='col-md-9 form-control form-control-sm form-select'>
                                                <option >Windows Mode</option>
                                                <option >Dos Mode</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">  <!-- row -->
                                    <div class="col-md-6">
                                        <div class="my-2 row">
                                            <label for="" class="col-form-label  col-md-3">Type</label>
                                            <select name="" class='col-md-9 form-control form-control-sm form-select'>
                                                <option >Voucher Format</option>
                                                <option >Label Format</option>
                                                <option >Format 402</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="my-2 row">
                                            <label for="" class="col-form-label  col-md-3">Label Type</label>
                                            <select disabled name="" class='col-md-9 form-control form-control-sm form-select'>
                                                <option >Productwise</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">  <!-- row -->
                                    <div class="col-md-6">
                                        <div class="my-2 row my-2">
                                            <label for="" class="col-form-label col-md-3">Format Type</label>
                                            <select name="" class='col-md-9 form-control form-control-sm form-select'>
                                                <option >Simple</option>
                                                <option >Combine</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                </div>
                        </div>

                        <!-- list -->
                        <table class="table table-hover table-bordered mt-4">
                            <tr>
                                <td>SALE_E5G.FRX</td>
                                <td>Single Task (Full Page)-(GST) </td>
                                <td>Custom</td>
                                <td>GST</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Edit"
                                        wire:click="editRecord(1)">
                                        <i class="fa-solid fa-pencil"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>SALE_E5G.FRX</td>
                                <td>Single Task (Full Page)-(GST) </td>
                                <td>Custom</td>
                                <td>GST</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Edit"
                                        wire:click="editRecord(1)">
                                        <i class="fa-solid fa-pencil"></i>
                                    </button>
                                </td>
                            </tr>
        
                        </table>


                            <!-- action buttons -->
                            <div class="">
                                <a class="btn btn-primary btn-sm  me-1" data-bs-toggle="modal"
                                    data-bs-target="#voucher_format_add_record_modal">
                                    <i class="fas fa-plus me-1"></i>
                                    Add
                                </a>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- add record modal -->
    <div class="modal fade" id='voucher_format_add_record_modal'>
        <div class="modal-dialog modal-xl modal-scrollble">
            <div class="modal-content">
                <div class="modal header">
                    <h3>Voucher Format Designer</h3>
                </div>
                <div class="modal-body">
                    <div id="editor_add">
                        Hello, there!! <br>
                        Edit voucher
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- edit record modal -->
    <div class="modal fade" id='editRecord'>
        <div class="modal-dialog modal-xl modal-scrollble">
            <div class="modal-content">
                <div class="modal header">
                    <h3>Voucher Format Designer</h3>
                </div>
                <div class="modal-body">
                    <div id="editor_edit">
                        Hello, there!! <br>
                        Edit voucher
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('js/summernote-lite.min.js')}}"></script>
    <script>




        $('#editor_add').summernote({
            fullscreen : false,
            height : 500
        })

        $('#editor_edit').summernote({
            fullscreen : false,
            height : 500
        })

        // edit record
        window.addEventListener('edit_record', function(){
            $('#editRecord').modal('show')
        })


    </script>

</div>
