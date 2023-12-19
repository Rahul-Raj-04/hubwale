<section>
<!--app-content open-->
    <div class="row row-sm m-1">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header p-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Settings</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Voucher Setup</li>
                    </ol>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none pe-0">
                        <div class="btn-list">
                            <label wire:click="submit" class="btn btn-sm btn-primary d-none d-sm-inline-block me-0"><i class="fas fa-save me-1"></i> Save Setting</label>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3" style="height: 500px;overflow-y: scroll;">
                    <div class="row">
                        <div class="col-md-3 border" style="height: 500px;overflow-y: scroll;">
                            <ul class="nav nav-tabs flex-column" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" style="width: 100%" id="bank_payments-tab" data-bs-toggle="tab" data-bs-target="#bank_payments-tab-pane" type="button" role="tab" 
                                     aria-controls="bank_payments-tab-pane" aria-selected="true">Bank Payment
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="bank_receipts-tab" data-bs-toggle="tab" data-bs-target="#bank_receipts-tab-pane" type="button" role="tab" 
                                     aria-controls="bank_receipts-tab-pane" aria-selected="true">Bank Receipt
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="contra-tab"
                                     data-bs-toggle="tab" data-bs-target="#contra-tab-pane" type="button" role="tab" 
                                     aria-controls="contra-tab-pane" aria-selected="true">Contra
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="cash_receipts-tab" data-bs-toggle="tab" data-bs-target="#cash_receipts-tab-pane" type="button" role="tab" 
                                     aria-controls="cash_receipts-tab-pane" aria-selected="true">Cash Receipt
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="cash_payments-tab" data-bs-toggle="tab" data-bs-target="#cash_payments-tab-pane" type="button" role="tab" 
                                     aria-controls="cash_payments-tab-pane" aria-selected="true">Cash Payment
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="journal-tab"
                                     data-bs-toggle="tab" data-bs-target="#journal-tab-pane" type="button" role="tab" 
                                     aria-controls="journal-tab-pane" aria-selected="true">Journal
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="credit_note-tab" data-bs-toggle="tab" data-bs-target="#credit_note-tab-pane" type="button" role="tab" 
                                     aria-controls="credit_note-tab-pane" aria-selected="true">Credit Note
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="debit_note-tab" data-bs-toggle="tab" data-bs-target="#debit_note-tab-pane" type="button" role="tab" 
                                     aria-controls="debit_note-tab-pane" aria-selected="true">Debit Note
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="purchase_invoices-tab" data-bs-toggle="tab" data-bs-target="#purchase_invoices-tab-pane" type="button" role="tab" 
                                     aria-controls="purchase_invoices-tab-pane" aria-selected="true">Purchase Invoice
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="purchase_return-tab" data-bs-toggle="tab" data-bs-target="#purchase_return-tab-pane" type="button" role="tab" 
                                     aria-controls="purchase_return-tab-pane" aria-selected="true">Purchase Return
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="purchase_quotation-tab" data-bs-toggle="tab" data-bs-target="#purchase_quotation-tab-pane" type="button" role="tab" aria-controls="purchase_quotation-tab-pane" aria-selected="true">Purchase Quotation
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="sales_invoice-tab" data-bs-toggle="tab" data-bs-target="#sales_invoice-tab-pane" type="button" role="tab" aria-controls="sales_invoice-tab-pane" aria-selected="true">Sales Invoice
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="sales_return-tab" data-bs-toggle="tab" data-bs-target="#sales_return-tab-pane" type="button" role="tab" aria-controls="sales_return-tab-pane" aria-selected="true">Sales Return
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="sales_quotation-tab" data-bs-toggle="tab" data-bs-target="#sales_quotation-tab-pane" type="button" role="tab" aria-controls="sales_quotation-tab-pane" aria-selected="true">Sales Quotation
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="credit_with_stock-tab" data-bs-toggle="tab" data-bs-target="#credit_with_stock-tab-pane" type="button" role="tab" aria-controls="credit_with_stock-tab-pane" aria-selected="true">Credit Note With Stock
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="debit_with_stock-tab" data-bs-toggle="tab" data-bs-target="#debit_with_stock-tab-pane" type="button" role="tab" aria-controls="debit_with_stock-tab-pane" aria-selected="true">Debit Note With Stock
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="credit_with_out_stock-tab" data-bs-toggle="tab" data-bs-target="#credit_with_out_stock-tab-pane" type="button" role="tab" aria-controls="credit_with_out_stock-tab-pane" aria-selected="true">Credit Note With Out Stock
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="debit_with_out_stock-tab" data-bs-toggle="tab" data-bs-target="#debit_with_out_stock-tab-pane" type="button" role="tab" aria-controls="debit_with_out_stock-tab-pane" aria-selected="true">Debit Note With Out Stock
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="production-tab" data-bs-toggle="tab" data-bs-target="#production-tab-pane" type="button" role="tab" aria-controls="production-tab-pane" aria-selected="true">Production
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="stock_transfer-tab" data-bs-toggle="tab" data-bs-target="#stock_transfer-tab-pane" type="button" role="tab" aria-controls="stock_transfer-tab-pane" aria-selected="true">Stock Transfer
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="gst_expense-tab" data-bs-toggle="tab" data-bs-target="#gst_expense-tab-pane" type="button" role="tab" aria-controls="gst_expense-tab-pane" aria-selected="true">GST Expense
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="gst_income-tab" data-bs-toggle="tab" data-bs-target="#gst_income-tab-pane" type="button" role="tab" aria-controls="gst_income-tab-pane" aria-selected="true">GST Income
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="gst_journal-tab" data-bs-toggle="tab" data-bs-target="#gst_journal-tab-pane" type="button" role="tab" aria-controls="gst_journal-tab-pane" aria-selected="true">GST Journal
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="utilization_entry-tab" data-bs-toggle="tab" data-bs-target="#utilization_entry-tab-pane" type="button" role="tab" aria-controls="utilization_entry-tab-pane" aria-selected="true">Utilization Entry
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="gst_bank_payment-tab" data-bs-toggle="tab" data-bs-target="#gst_bank_payment-tab-pane" type="button" role="tab" aria-controls="gst_bank_payment-tab-pane" aria-selected="true">GST Bank Payment
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="gst_cash_payment-tab" data-bs-toggle="tab" data-bs-target="#gst_cash_payment-tab-pane" type="button" role="tab" aria-controls="gst_cash_payment-tab-pane" aria-selected="true">GST Cash Payment
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="rcm_bank_payment-tab" data-bs-toggle="tab" data-bs-target="#rcm_bank_payment-tab-pane" type="button" role="tab" aria-controls="rcm_bank_payment-tab-pane" aria-selected="true">RCM Bank Payment
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" style="width: 100%" id="rcm_cash_payment-tab" data-bs-toggle="tab" data-bs-target="#rcm_cash_payment-tab-pane" type="button" role="tab" aria-controls="rcm_cash_payment-tab-pane" aria-selected="true">RCM Cash Payment
                                    </button>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content col-md-9 border" id="myTabContent" style="height: 500px;overflow-y: scroll;">
                            <!-- Bank Payment setup -->
                            <div class="tab-pane fade show active" id="bank_payments-tab-tab-pane" role="tabpanel" aria-labelledby="bank_payments-tab" tabindex="0">
                                <h5 class="text-danger m-0 mt-3"><b>Entry Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Voucher Number Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="bank_payments.voucher_number_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Align Voucher Number</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="bank_payments.auto_align_voucher_number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                            <label class="form-label">Narration Type</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer="bank_payments.narration_type"> 
                                                <option value="Common">Common</option>
                                                <option value="Entriwise">Entriwise</option>
                                                <option value="Both">Both</option>
                                                <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Auto Narration Help</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="bank_payments.required_auto_narration_help">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Cheque No. Req. ?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="bank_payments.auto_cheque_no_req">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Cheque Name Required For</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer.defer="bank_payments.cheque_name_required_for"> 
                                            @foreach($account_groups as $group)
                                                <option value="{{$group->name}}">{{$group->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Bill To Bill Entry Before Amount</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="bank_payments.bill_to_bill_entry_before">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Closing Balance As on Date?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="bank_payments.required_closing_balance_on_date">
                                        </div>
                                    </div>
                                </div>

                                <h5 class="text-danger m-0 mt-3"><b>Printing Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online Voucher Printing</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="bank_payments.online_voucher_printing">
                                        </div>
                                    </div>
                                </div>

                                <h5 class="text-danger m-0 mt-3"><b>SMS Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online SMS Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="bank_payments.online_sms_sending">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>E-Mail Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online E-Mail Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="bank_payments.online_e_mail_sending">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Bank Receipt setup -->
                            <div class="tab-pane fade show" id="bank_receipts-tab-pane" role="tabpanel" aria-labelledby="bank_receipts-tab" tabindex="0">
                                <h5 class="text-danger m-0 mt-3"><b>Entry Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Voucher Number Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="bank_receipts.voucher_number_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Align Voucher Number</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="bank_receipts.auto_align_voucher_number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                            <label class="form-label">Narration Type</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer.defer="bank_receipts.narration_type"> 
                                                <option value="Common">Common</option>
                                                <option value="Entriwise">Entriwise</option>
                                                <option value="Both">Both</option>
                                                <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Auto Narration Help</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="bank_receipts.required_auto_narration_help">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Bill To Bill Entry Before Amount</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="bank_receipts.bill_to_bill_entry_before">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Closing Balance As on Date?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="bank_receipts.required_closing_balance_on_date">
                                        </div>
                                    </div>
                                </div>

                                <h5 class="text-danger m-0 mt-3"><b>Printing Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online Receipt Printing</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="bank_receipts.online_receipt_printing">
                                        </div>
                                    </div>
                                </div>

                                <h5 class="text-danger m-0 mt-3"><b>SMS Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online SMS Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="bank_receipts.online_sms_sending">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>E-Mail Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online E-Mail Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="bank_receipts.online_e_mail_sending">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Contra setup -->
                            <div class="tab-pane fade show" id="contra-tab-pane" role="tabpanel" aria-labelledby="contra-tab" tabindex="0">
                                <h5 class="text-danger m-0 mt-3"><b>Entry Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Voucher Number Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="contra.voucher_number_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Align Voucher Number</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="contra.auto_align_voucher_number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                            <label class="form-label">Narration Type</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer.defer="contra.narration_type"> 
                                                <option value="Common">Common</option>
                                                <option value="Entriwise">Entriwise</option>
                                                <option value="Both">Both</option>
                                                <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Auto Narration Help</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="contra.required_auto_narration_help">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Extra Entry Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="contra.auto_cheque_no_req">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Cheque Name Required For</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer.defer="contra.cheque_name_required_for"> 
                                            @foreach($account_groups as $group)
                                                <option value="{{$group->name}}">{{$group->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <h5 class="text-danger m-0 mt-3"><b>Printing Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online Voucher Printing</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="contra.online_voucher_printing">
                                        </div>
                                    </div>
                                </div>                                    
                            </div>
                            <!-- Cash Receipt setup -->
                            <div class="tab-pane fade show" id="cash_receipts-tab-pane" role="tabpanel" aria-labelledby="cash_receipts-tab" tabindex="0">
                                <h5 class="text-danger m-0 mt-3"><b>Entry Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Document Number/Date Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="cash_receipts.document_number_date_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Voucher Number Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="cash_receipts.voucher_number_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Align Voucher Number</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="cash_receipts.auto_align_voucher_number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                            <label class="form-label">Narration Type</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer.defer="cash_receipts.narration_type"> 
                                                <option value="Common">Common</option>
                                                <option value="Entriwise">Entriwise</option>
                                                <option value="Both">Both</option>
                                                <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Auto Narration Help</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="cash_receipts.required_auto_narration_help">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Bill To Bill Entry Before Amount</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="cash_receipts.bill_to_bill_entry_before">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Closing Balance As on Date?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="cash_receipts.required_closing_balance_on_date">
                                        </div>
                                    </div>
                                </div>

                                <h5 class="text-danger m-0 mt-3"><b>Printing Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online Receipt Printing</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="cash_receipts.online_receipt_printing">
                                        </div>
                                    </div>
                                </div>

                                <h5 class="text-danger m-0 mt-3"><b>SMS Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online SMS Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="cash_receipts.online_sms_sending">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>E-Mail Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online E-Mail Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="cash_receipts.online_e_mail_sending">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Cash Payments setup -->
                            <div class="tab-pane fade show" id="cash_payments-tab-pane" role="tabpanel" aria-labelledby="cash_payments-tab" tabindex="0">
                                <h5 class="text-danger m-0 mt-3"><b>Entry Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Document Number/Date Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="cash_payments.document_number_date_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Voucher Number Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="cash_payments.voucher_number_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Align Voucher Number</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="cash_payments.auto_align_voucher_number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                            <label class="form-label">Narration Type</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer.defer="cash_payments.narration_type"> 
                                                <option value="Common">Common</option>
                                                <option value="Entriwise">Entriwise</option>
                                                <option value="Both">Both</option>
                                                <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Auto Narration Help</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="cash_payments.required_auto_narration_help">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Bill To Bill Entry Before Amount</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="cash_payments.bill_to_bill_entry_before">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Closing Balance As on Date?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="cash_payments.required_closing_balance_on_date">
                                        </div>
                                    </div>
                                </div>

                                <h5 class="text-danger m-0 mt-3"><b>Printing Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online Voucher Printing</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="cash_payments.online_receipt_printing">
                                        </div>
                                    </div>
                                </div>

                                <h5 class="text-danger m-0 mt-3"><b>SMS Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online SMS Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="cash_payments.online_sms_sending">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>E-Mail Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online E-Mail Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="cash_payments.online_e_mail_sending">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Journal setup -->
                            <div class="tab-pane fade show" id="journal-tab-pane" role="tabpanel" aria-labelledby="journal-tab" tabindex="0">
                                <h5 class="text-danger m-0 mt-3"><b>Entry Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Document Number/Date Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="journal.document_number_date_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Voucher Number Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="journal.voucher_number_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Align Voucher Number</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="journal.auto_align_voucher_number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                            <label class="form-label">Narration Type</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer="journal.narration_type"> 
                                                <option value="Common">Common</option>
                                                <option value="Entriwise">Entriwise</option>
                                                <option value="Both">Both</option>
                                                <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Auto Narration Help</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="journal.required_auto_narration_help">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Closing Balance As on Date?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="journal.required_closing_balance_on_date">
                                        </div>
                                    </div>
                                </div>

                                <h5 class="text-danger m-0 mt-3"><b>Printing Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online Voucher Printing</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="journal.online_voucher_printing">
                                        </div>
                                    </div>
                                </div>

                                <h5 class="text-danger m-0 mt-3"><b>SMS Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online SMS Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="journal.online_sms_sending">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>E-Mail Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online E-Mail Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="journal.online_e_mail_sending">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Credit Note setup -->
                            <div class="tab-pane fade show" id="credit_note-tab-pane" role="tabpanel" aria-labelledby="credit_note-tab" tabindex="0">
                                <h5 class="text-danger m-0 mt-3"><b>Entry Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Document Number/Date Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="credit_note.document_number_date_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Voucher Number Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="credit_note.voucher_number_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Align Voucher Number</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="credit_note.auto_align_voucher_number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                            <label class="form-label">Narration Type</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer="credit_note.narration_type"> 
                                                <option value="Common">Common</option>
                                                <option value="Entriwise">Entriwise</option>
                                                <option value="Both">Both</option>
                                                <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Auto Narration Help</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="credit_note.required_auto_narration_help">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Closing Balance As on Date?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="credit_note.required_closing_balance_on_date">
                                        </div>
                                    </div>
                                </div>

                                <h5 class="text-danger m-0 mt-3"><b>Printing Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online Voucher Printing</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="credit_note.online_voucher_printing">
                                        </div>
                                    </div>
                                </div>

                                <h5 class="text-danger m-0 mt-3"><b>SMS Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online SMS Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="credit_note.online_sms_sending">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>E-Mail Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online E-Mail Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="credit_note.online_e_mail_sending">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Debit Note setup -->
                            <div class="tab-pane fade show" id="debit_note-tab-pane" role="tabpanel" aria-labelledby="debit_note-tab" tabindex="0">
                                <h5 class="text-danger m-0 mt-3"><b>Entry Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Document Number/Date Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="debit_note.document_number_date_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Voucher Number Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="debit_note.voucher_number_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Align Voucher Number</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="debit_note.auto_align_voucher_number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                            <label class="form-label">Narration Type</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer="debit_note.narration_type"> 
                                                <option value="Common">Common</option>
                                                <option value="Entriwise">Entriwise</option>
                                                <option value="Both">Both</option>
                                                <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Auto Narration Help</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="debit_note.required_auto_narration_help">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Closing Balance As on Date?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="debit_note.required_closing_balance_on_date">
                                        </div>
                                    </div>
                                </div>

                                <h5 class="text-danger m-0 mt-3"><b>Printing Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online Voucher Printing</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="debit_note.online_voucher_printing">
                                        </div>
                                    </div>
                                </div>

                                <h5 class="text-danger m-0 mt-3"><b>SMS Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online SMS Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="debit_note.online_sms_sending">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>E-Mail Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online E-Mail Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="debit_note.online_e_mail_sending">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Purchase Invoice setup -->
                            <div class="tab-pane fade show" id="purchase_invoices-tab-pane" role="tabpanel" aria-labelledby="purchase_invoices-tab" tabindex="0">
                                <h5 class="text-danger m-0 mt-3"><b>Entry Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Debit Invoice As Default</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_invoices.debit_invoice_as_default">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Cash Party Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_invoices.cash_party_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Bill Number/Date Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_invoices.bill_number_date_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Voucher Number Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_invoices.voucher_number_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Align Voucher Number</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_invoices.auto_align_voucher_number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                            <label class="form-label">Narration Type</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer="purchase_invoices.narration_type"> 
                                                <option value="Common">Common</option>
                                                <option value="Entriwise">Entriwise</option>
                                                <option value="Both">Both</option>
                                                <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Auto Narration Help</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_invoices.required_auto_narration_help">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                            <label class="form-label">Apply GST Rules</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer="purchase_invoices.apply_gst_rules"> 
                                                <option value="None">None</option>
                                                <option value="Warning">Warning</option>
                                                <option value="Strict">Strict</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Closing Balance As on Date?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_invoices.required_closing_balance_on_date">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Group Filter In Party</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer.defer="purchase_invoices.group_filter_in_party"> 
                                            @foreach($account_groups as $group)
                                                <option value="{{$group->name}}">{{$group->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">TCS 206C (1H)Required?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_invoices.tcs_206c_required">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Product Entry Option</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Product Name Overwrite</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_invoices.product_name_overwrite">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Product History After Product Selection</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_invoices.product_history_after_product_selection">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online Master Rate Updation</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_invoices.online_master_rate_updation">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Allow Change Rate</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_invoices.allow_change_rate">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Allow Change Amount</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_invoices.allow_change_amount">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Ask Expense For Each Product</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_invoices.ask_expense_for_each_product">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Round Off In Item Entry</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer.defer="purchase_invoices.round_off_in_item_entry"> 
                                            <option value="Floor">Floor</option>
                                            <option value="Round Off">Round Off</option>
                                            <option value="Ceiling">Ceiling</option>
                                            <option value="None">None</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Reverse Rate Calculation Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_invoices.reverse_rate_calculation_required">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Other Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Duplicate Bill Number Warning</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer="purchase_invoices.duplicate_bill_number_warning"> 
                                            <option value="None">None</option>
                                            <option value="All Date">All Date</option>
                                            <option value="Entry Date">Entry Date</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Strick Quotation</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_invoices.strick_quotation">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Bill To Bill Entry</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_invoices.auto_bill_to_bill_entry">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Printing Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online Voucher Printing</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_invoices.online_voucher_printing">
                                        </div>
                                    </div>
                                </div>

                                <h5 class="text-danger m-0 mt-3"><b>SMS Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online SMS Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_invoices.online_sms_sending">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>E-Mail Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online E-Mail Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_invoices.online_e_mail_sending">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Purchase Return setup -->
                            <div class="tab-pane fade show" id="purchase_return-tab-pane" role="tabpanel" aria-labelledby="purchase_return-tab" tabindex="0">
                                <h5 class="text-danger m-0 mt-3"><b>Entry Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Debit Invoice As Default</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_return.debit_invoice_as_default">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Cash Party Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_return.cash_party_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Bill Number/Date Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_return.bill_number_date_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Voucher Number Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_return.voucher_number_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Align Voucher Number</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_return.auto_align_voucher_number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                            <label class="form-label">Narration Type</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer="purchase_return.narration_type"> 
                                                <option value="Common">Common</option>
                                                <option value="Entriwise">Entriwise</option>
                                                <option value="Both">Both</option>
                                                <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Auto Narration Help</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_return.required_auto_narration_help">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                            <label class="form-label">Apply GST Rules</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer="purchase_return.apply_gst_rules"> 
                                                <option value="None">None</option>
                                                <option value="Warning">Warning</option>
                                                <option value="Strict">Strict</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Closing Balance As on Date?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_return.required_closing_balance_on_date">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Group Filter In Party</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer.defer="purchase_return.group_filter_in_party"> 
                                            @foreach($account_groups as $group)
                                                <option value="{{$group->name}}">{{$group->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Ship To Party Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_return.ship_to_party_required">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Product Entry Option</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Product Name Overwrite</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_return.product_name_overwrite">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Product History After Product Selection</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_return.product_history_after_product_selection">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Allow Change Rate</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_return.allow_change_rate">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Allow Change Amount</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_return.allow_change_amount">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Ask Expense For Each Product</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_return.ask_expense_for_each_product">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Round Off In Item Entry</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer.defer="purchase_return.round_off_in_item_entry"> 
                                            <option value="None">None</option>
                                            <option value="Floor">Floor</option>
                                            <option value="Round Off">Round Off</option>
                                            <option value="Ceiling">Ceiling</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Reverse Rate Calculation Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_return.reverse_rate_calculation_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Closing Stock As On Date ?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_return.required_closing_stock_as_on_date">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Other Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Bill To Bill Entry</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_return.auto_bill_to_bill_entry">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Printing Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online Bill Printing</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_return.online_bill_printing">
                                        </div>
                                    </div>
                                </div>

                                <h5 class="text-danger m-0 mt-3"><b>SMS Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online SMS Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_return.online_sms_sending">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>E-Mail Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online E-Mail Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_return.online_e_mail_sending">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Purchase Quotation setup -->
                            <div class="tab-pane fade show" id="purchase_quotation-tab-pane" role="tabpanel" aria-labelledby="purchase_quotation-tab" tabindex="0">
                                <h5 class="text-danger m-0 mt-3"><b>Entry Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Debit Invoice As Default</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_quotation.debit_invoice_as_default">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Cash Party Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_quotation.cash_party_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Invoice Type Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_quotation.invoice_type_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Document Number/Date Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_quotation.document_number_date_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Narration Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_quotation.narration_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Auto Narration Help</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_quotation.required_auto_narration_help">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Bill From Quotation</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_quotation.auto_bill_from_quotation">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Group Filter In Party</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer.defer="purchase_quotation.group_filter_in_party"> 
                                            @foreach($account_groups as $group)
                                                <option value="{{$group->name}}">{{$group->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Product Entry Option</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Product Name Overwrite</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_quotation.product_name_overwrite">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Product History After Product Selection</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_quotation.product_history_after_product_selection">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online Master Rate Updation</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_quotation.online_master_rate_updation">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Ask Expense For Each Product</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_quotation.ask_expense_for_each_product">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Closing Stock As On Date ?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_quotation.required_closing_stock_as_on_date">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Printing Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online Quotation Printing</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_quotation.online_quotation_printing">
                                        </div>
                                    </div>
                                </div>

                                <h5 class="text-danger m-0 mt-3"><b>SMS Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online SMS Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_quotation.online_sms_sending">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>E-Mail Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online E-Mail Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_quotation.online_e_mail_sending">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Sales Invoice setup -->
                            <div class="tab-pane fade show" id="sales_invoice-tab-pane" role="tabpanel" aria-labelledby="sales_invoice-tab" tabindex="0">
                                <h5 class="text-danger m-0 mt-3"><b>Entry Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Debit Invoice As Default</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_invoice.debit_invoice_as_default">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Cash Party Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_invoice.cash_party_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Document Number/Date Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_invoice.document_number_date_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Align Sales Bill Number</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_invoice.auto_align_sales_bill_number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                            <label class="form-label">Narration Type</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer="sales_invoice.narration_type"> 
                                                <option value="Common">Common</option>
                                                <option value="Entriwise">Entriwise</option>
                                                <option value="Both">Both</option>
                                                <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Auto Narration Help</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_invoice.required_auto_narration_help">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Credit Limit Warning</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_invoice.credit_limit_warning">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Credit Days Warning</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_invoice.credit_days_warning">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                            <label class="form-label">Apply GST Rules</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer="sales_invoice.apply_gst_rules"> 
                                                <option value="None">None</option>
                                                <option value="Warning">Warning</option>
                                                <option value="Strict">Strict</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Closing Balance As on Date?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_invoice.required_closing_balance_on_date">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Ship To Party Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_invoice.ship_to_party_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Group Filter In Party</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer.defer="sales_invoice.group_filter_in_party"> 
                                            @foreach($account_groups as $group)
                                                <option value="{{$group->name}}">{{$group->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">TCS 206C (1H)Required?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_invoice.tcs_206c_required">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Payment Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Payment Option Req.?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_invoice.payment_option_reqired">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Product Entry Option</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Product Name Overwrite</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_invoice.product_name_overwrite">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Product History After Product Selection</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_invoice.product_history_after_product_selection">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online Master Rate Updation</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_invoice.online_master_rate_updation">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Allow Change Rate</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_invoice.allow_change_rate">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Allow Change Amount</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_invoice.allow_change_amount">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Ask Expense For Each Product</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_invoice.ask_expense_for_each_product">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Round Off In Item Entry</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer.defer="sales_invoice.round_off_in_item_entry"> 
                                            <option value="Floor">Floor</option>
                                            <option value="Round Off">Round Off</option>
                                            <option value="Ceiling">Ceiling</option>
                                            <option value="None">None</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Reverse Rate Calculation Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_invoice.reverse_rate_calculation_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Negative Stock Warning</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_invoice.negative_stock_warning">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Closing Stock As on Date ?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_invoice.required_closing_stock_as_on_date">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Weight Reading Required ?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_invoice.weight_reading_required">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Other Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Strick Quotation</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_invoice.strick_quotation">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Change Party In Bill From Quotation ?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_invoice.change_party_in_bill_from_quotation">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Bill To Bill Entry</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_invoice.auto_bill_to_bill_entry">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Printing Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online Voucher Printing</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_invoice.online_voucher_printing">
                                        </div>
                                    </div>
                                </div>

                                <h5 class="text-danger m-0 mt-3"><b>SMS Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online SMS Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_invoice.online_sms_sending">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>E-Mail Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online E-Mail Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_invoice.online_e_mail_sending">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Sales Return setup -->
                            <div class="tab-pane fade show" id="sales_return-tab-pane" role="tabpanel" aria-labelledby="sales_return-tab" tabindex="0">
                                <h5 class="text-danger m-0 mt-3"><b>Entry Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Debit Invoice As Default</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_return.debit_invoice_as_default">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Cash Party Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_return.cash_party_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Document Number/Date Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_return.document_number_date_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Align Sales Bill Number</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_return.auto_align_sales_bill_number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                            <label class="form-label">Narration Type</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer="sales_return.narration_type"> 
                                                <option value="Common">Common</option>
                                                <option value="Entriwise">Entriwise</option>
                                                <option value="Both">Both</option>
                                                <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Auto Narration Help</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_return.required_auto_narration_help">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                            <label class="form-label">Apply GST Rules</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer="sales_return.apply_gst_rules"> 
                                                <option value="None">None</option>
                                                <option value="Warning">Warning</option>
                                                <option value="Strict">Strict</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Closing Balance As on Date?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_return.required_closing_balance_on_date">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Group Filter In Party</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer.defer="sales_return.group_filter_in_party"> 
                                            @foreach($account_groups as $group)
                                                <option value="{{$group->name}}">{{$group->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Product Entry Option</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Product Name Overwrite</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_return.product_name_overwrite">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Product History After Product Selection</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_return.product_history_after_product_selection">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Allow Change Rate</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_return.allow_change_rate">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Allow Change Amount</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_return.allow_change_amount">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Ask Expense For Each Product</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_return.ask_expense_for_each_product">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Round Off In Item Entry</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer.defer="sales_return.round_off_in_item_entry"> 
                                            <option value="Floor">Floor</option>
                                            <option value="Round Off">Round Off</option>
                                            <option value="Ceiling">Ceiling</option>
                                            <option value="None">None</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Reverse Rate Calculation Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_return.reverse_rate_calculation_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Closing Stock As on Date ?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_return.required_closing_stock_as_on_date">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Other Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Bill To Bill Entry</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_return.auto_bill_to_bill_entry">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Printing Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online Bill Printing</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_return.online_bill_printing">
                                        </div>
                                    </div>
                                </div>

                                <h5 class="text-danger m-0 mt-3"><b>SMS Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online SMS Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_return.online_sms_sending">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>E-Mail Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online E-Mail Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_return.online_e_mail_sending">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Sales Quotation setup -->
                            <div class="tab-pane fade show" id="sales_quotation-tab-pane" role="tabpanel" aria-labelledby="sales_quotation-tab" tabindex="0">
                                <h5 class="text-danger m-0 mt-3"><b>Entry Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Debit Invoice As Default</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_quotation.debit_invoice_as_default">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Cash Party Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_quotation.cash_party_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Invoice Type Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_quotation.invoice_type_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Document Number/Date Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_quotation.document_number_date_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Narration Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_quotation.narration_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Auto Narration Help</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_quotation.required_auto_narration_help">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Credit Limit Warning</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_quotation.credit_limit_warning">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Credit Days Warning</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_quotation.credit_days_warning">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Bill From Quotation</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_quotation.auto_bill_from_quotation">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Group Filter In Party</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer.defer="sales_quotation.group_filter_in_party"> 
                                            @foreach($account_groups as $group)
                                                <option value="{{$group->name}}">{{$group->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Product Entry Option</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Product Name Overwrite</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_quotation.product_name_overwrite">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Product History After Product Selection</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_quotation.product_history_after_product_selection">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online Master Rate Updation</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_quotation.online_master_rate_updation">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Ask Expense For Each Product</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_quotation.ask_expense_for_each_product">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Reverse Rate Calculation Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_quotation.reverse_rate_calculation_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Closing Stock As on Date ?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_quotation.required_closing_stock_as_on_date">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Printing Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online Quotation Printing</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_quotation.online_quotation_printing">
                                        </div>
                                    </div>
                                </div>

                                <h5 class="text-danger m-0 mt-3"><b>SMS Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online SMS Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_quotation.online_sms_sending">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>E-Mail Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online E-Mail Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="sales_quotation.online_e_mail_sending">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Credit Note With Stock setup -->
                            <div class="tab-pane fade show" id="credit_with_stock-tab-pane" role="tabpanel" aria-labelledby="credit_with_stock-tab" tabindex="0">
                                <h5 class="text-danger m-0 mt-3"><b>Entry Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Debit Invoice As Default</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="credit_with_stock.debit_invoice_as_default">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Cash Party Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="credit_with_stock.cash_party_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Align Voucher Number</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="credit_with_stock.auto_align_voucher_number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Document Number/Date Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="credit_with_stock.document_number_date_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                            <label class="form-label">Narration Type</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer="credit_with_stock.narration_type"> 
                                                <option value="Common">Common</option>
                                                <option value="Entriwise">Entriwise</option>
                                                <option value="Both">Both</option>
                                                <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Auto Narration Help</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="credit_with_stock.required_auto_narration_help">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                            <label class="form-label">Apply GST Rules</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer="credit_with_stock.apply_gst_rules"> 
                                                <option value="None">None</option>
                                                <option value="Warning">Warning</option>
                                                <option value="Strict">Strict</option>
                                        </select>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Product Entry Option</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Product Name Overwrite</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="credit_with_stock.product_name_overwrite">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Product History After Product Selection</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="credit_with_stock.product_history_after_product_selection">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Ask Expense For Each Product</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="credit_with_stock.ask_expense_for_each_product">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Other Options</b></h5>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Bill to Bill Entry</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="credit_with_stock.auto_bill_to_bill_entry">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Printing Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online bill Printing</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="credit_with_stock.online_bill_printing">
                                        </div>
                                    </div>
                                </div>

                                <h5 class="text-danger m-0 mt-3"><b>SMS Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online SMS Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="credit_with_stock.online_sms_sending">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>E-Mail Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online E-Mail Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="credit_with_stock.online_e_mail_sending">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Debit Note With Stock setup -->
                            <div class="tab-pane fade show" id="debit_with_stock-tab-pane" role="tabpanel" aria-labelledby="debit_with_stock-tab" tabindex="0">
                                <h5 class="text-danger m-0 mt-3"><b>Entry Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Debit Invoice As Default</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="debit_with_stock.debit_invoice_as_default">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Cash Party Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="debit_with_stock.cash_party_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Align Voucher Number</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="debit_with_stock.auto_align_voucher_number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Document Number/Date Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="debit_with_stock.document_number_date_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                            <label class="form-label">Narration Type</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer="debit_with_stock.narration_type"> 
                                                <option value="Common">Common</option>
                                                <option value="Entriwise">Entriwise</option>
                                                <option value="Both">Both</option>
                                                <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Auto Narration Help</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="debit_with_stock.required_auto_narration_help">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                            <label class="form-label">Apply GST Rules</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer="debit_with_stock.apply_gst_rules"> 
                                                <option value="None">None</option>
                                                <option value="Warning">Warning</option>
                                                <option value="Strict">Strict</option>
                                        </select>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Product Entry Option</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Product Name Overwrite</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="debit_with_stock.product_name_overwrite">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Product History After Product Selection</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="debit_with_stock.product_history_after_product_selection">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Ask Expense For Each Product</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="debit_with_stock.ask_expense_for_each_product">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Other Options</b></h5>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Bill to Bill Entry</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="debit_with_stock.auto_bill_to_bill_entry">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Printing Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online bill Printing</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="debit_with_stock.online_bill_printing">
                                        </div>
                                    </div>
                                </div>

                                <h5 class="text-danger m-0 mt-3"><b>SMS Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online SMS Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="debit_with_stock.online_sms_sending">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>E-Mail Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online E-Mail Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="debit_with_stock.online_e_mail_sending">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Credit Note With Out Stock setup -->
                            <div class="tab-pane fade show" id="credit_with_out_stock-tab-pane" role="tabpanel" aria-labelledby="credit_with_out_stock-tab" tabindex="0">
                                <h5 class="text-danger m-0 mt-3"><b>Entry Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Cash Party Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="credit_with_out_stock.cash_party_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Align Voucher Number</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="credit_with_out_stock.auto_align_voucher_number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Document Number/Date Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="credit_with_out_stock.document_number_date_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                            <label class="form-label">Narration Type</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer="credit_with_out_stock.narration_type"> 
                                                <option value="Common">Common</option>
                                                <option value="Entriwise">Entriwise</option>
                                                <option value="Both">Both</option>
                                                <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Auto Narration Help</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="credit_with_out_stock.required_auto_narration_help">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                            <label class="form-label">Apply GST Rules</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer="credit_with_out_stock.apply_gst_rules"> 
                                                <option value="None">None</option>
                                                <option value="Warning">Warning</option>
                                                <option value="Strict">Strict</option>
                                        </select>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Other Options</b></h5>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Bill to Bill Entry</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="credit_with_out_stock.auto_bill_to_bill_entry">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Printing Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online bill Printing</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="credit_with_out_stock.online_bill_printing">
                                        </div>
                                    </div>
                                </div>

                                <h5 class="text-danger m-0 mt-3"><b>SMS Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online SMS Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="credit_with_out_stock.online_sms_sending">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>E-Mail Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online E-Mail Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="credit_with_out_stock.online_e_mail_sending">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Debit Note With Out Stock setup -->
                            <div class="tab-pane fade show" id="debit_with_out_stock-tab-pane" role="tabpanel" aria-labelledby="debit_with_out_stock-tab" tabindex="0">
                                <h5 class="text-danger m-0 mt-3"><b>Entry Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Cash Party Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="debit_with_out_stock.cash_party_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Align Voucher Number</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="debit_with_out_stock.auto_align_voucher_number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Document Number/Date Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="debit_with_out_stock.document_number_date_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                            <label class="form-label">Narration Type</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer="debit_with_out_stock.narration_type"> 
                                                <option value="Common">Common</option>
                                                <option value="Entriwise">Entriwise</option>
                                                <option value="Both">Both</option>
                                                <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Auto Narration Help</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="debit_with_out_stock.required_auto_narration_help">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                            <label class="form-label">Apply GST Rules</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer="debit_with_out_stock.apply_gst_rules"> 
                                                <option value="None">None</option>
                                                <option value="Warning">Warning</option>
                                                <option value="Strict">Strict</option>
                                        </select>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Other Options</b></h5>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Bill to Bill Entry</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="debit_with_out_stock.auto_bill_to_bill_entry">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Printing Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online bill Printing</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="debit_with_out_stock.online_bill_printing">
                                        </div>
                                    </div>
                                </div>

                                <h5 class="text-danger m-0 mt-3"><b>SMS Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online SMS Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="debit_with_out_stock.online_sms_sending">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>E-Mail Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online E-Mail Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="debit_with_out_stock.online_e_mail_sending">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Production setup -->
                            <div class="tab-pane fade show" id="production-tab-pane" role="tabpanel" aria-labelledby="production-tab" tabindex="0">
                                <h5 class="text-danger m-0 mt-3"><b>Entry Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Fifo Rate For Input Product ?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="production.cash_party_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                            <label class="form-label">Narration Type</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer="production.narration_type"> 
                                                <option value="Common">Common</option>
                                                <option value="Entriwise">Entriwise</option>
                                                <option value="Both">Both</option>
                                                <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Auto Narration Help</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="production.required_auto_narration_help">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Product Entry Option</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online Master Rate Updation</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="production.online_master_rate_updation">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Round Off In Item Entry</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer.defer="production.round_off_in_item_entry"> 
                                            <option value="None">None</option>
                                            <option value="Floor">Floor</option>
                                            <option value="Round Off">Round Off</option>
                                            <option value="Ceiling">Ceiling</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Negative Stock Warning</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="production.negative_stock_warning">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Reverse Rate Calculation Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="production.reverse_rate_calculation_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Date Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="production.date_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Closing Stock As on Date?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="production.required_closing_stock_as_on_date">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Printing Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online Voucher Printing</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="production.online_voucher_printing">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Purchase Return setup -->
                            <div class="tab-pane fade show" id="stock_transfer-tab-pane" role="tabpanel" aria-labelledby="stock_transfer-tab" tabindex="0">
                                <h5 class="text-danger m-0 mt-3"><b>Entry Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Voucher Number Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_return.voucher_number_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Document Number/Date Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="stock_transfer.document_number_date_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Quantity Total In Display</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="stock_transfer.quantity_total_in_display">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Align Voucher Number</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="stock_transfer.auto_align_voucher_number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Narration Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="stock_transfer.narration_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Auto Narration Help</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="stock_transfer.required_auto_narration_help">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Product Entry Option</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Reverse Rate Calculation Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="stock_transfer.reverse_rate_calculation_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Closing Stock As On Date ?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="stock_transfer.required_closing_stock_as_on_date">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Printing Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online Voucher Printing</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="purchase_return.online_bill_printing">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- gst expense setup -->
                            <div class="tab-pane fade show" id="gst_expense-tab-pane" role="tabpanel" aria-labelledby="gst_expense-tab" tabindex="0">
                                <h5 class="text-danger m-0 mt-3"><b>Entry Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Bill Number / Date Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_expense.bill_number_date_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Cash Party Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_expense.cash_party_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Voucher Number Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_expense.voucher_number_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Align Voucher Number</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_expense.auto_align_voucher_number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                            <label class="form-label">Narration Type</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer="gst_expense.narration_type"> 
                                                <option value="Common">Common</option>
                                                <option value="Entriwise">Entriwise</option>
                                                <option value="Both">Both</option>
                                                <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Auto Narration Help</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_expense.required_auto_narration_help">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Closing Balance As on Date?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_expense.required_closing_balance_on_date">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Cess Required?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_expense.cess_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Round Off Expense Required ?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_expense.round_off_expense_required">
                                        </div>
                                    </div>
                                </div>

                                <h5 class="text-danger m-0 mt-3"><b>Printing Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online Voucher Printing</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_expense.online_voucher_printing">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Other Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Bill to Bill Entry</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_expense.auto_bill_to_bill_entry">
                                        </div>
                                    </div>
                                </div>

                                <h5 class="text-danger m-0 mt-3"><b>SMS Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online SMS Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_expense.online_sms_sending">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>E-Mail Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online E-Mail Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_expense.online_e_mail_sending">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- gst Income setup -->
                            <div class="tab-pane fade show" id="gst_income-tab-pane" role="tabpanel" aria-labelledby="gst_income-tab" tabindex="0">
                                <h5 class="text-danger m-0 mt-3"><b>Entry Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Cash Party Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_income.cash_party_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Align Voucher Number</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_income.auto_align_voucher_number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                            <label class="form-label">Narration Type</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer="gst_income.narration_type"> 
                                                <option value="Common">Common</option>
                                                <option value="Entriwise">Entriwise</option>
                                                <option value="Both">Both</option>
                                                <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Auto Narration Help</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_income.required_auto_narration_help">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Closing Balance As on Date?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_income.required_closing_balance_on_date">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Cess Required?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_income.cess_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Round Off Expense Required ?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_income.round_off_expense_required">
                                        </div>
                                    </div>
                                </div>

                                <h5 class="text-danger m-0 mt-3"><b>Printing Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online Voucher Printing</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_income.online_voucher_printing">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Other Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Bill to Bill Entry</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_income.auto_bill_to_bill_entry">
                                        </div>
                                    </div>
                                </div>

                                <h5 class="text-danger m-0 mt-3"><b>SMS Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online SMS Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_income.online_sms_sending">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>E-Mail Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online E-Mail Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_income.online_e_mail_sending">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- gst Journal setup -->
                            <div class="tab-pane fade show" id="gst_journal-tab-pane" role="tabpanel" aria-labelledby="gst_journal-tab" tabindex="0">
                                <h5 class="text-danger m-0 mt-3"><b>Entry Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Document Number / Date Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_journal.document_number_date_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Voucher Number Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_journal.voucher_number_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Align Voucher Number</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_journal.auto_align_voucher_number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                            <label class="form-label">Narration Type</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer="gst_journal.narration_type"> 
                                                <option value="Common">Common</option>
                                                <option value="Entriwise">Entriwise</option>
                                                <option value="Both">Both</option>
                                                <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Auto Narration Help</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_journal.required_auto_narration_help">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Closing Balance As on Date?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_journal.required_closing_balance_on_date">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Printing Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online Voucher Printing</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_journal.online_voucher_printing">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>SMS Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online SMS Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_journal.online_sms_sending">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>E-Mail Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online E-Mail Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_journal.online_e_mail_sending">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Utilization Entry setup -->
                            <div class="tab-pane fade show" id="utilization_entry-tab-pane" role="tabpanel" aria-labelledby="utilization_entry-tab" tabindex="0">
                                <h5 class="text-danger m-0 mt-3"><b>Entry Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Voucher Number Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="utilization_entry.voucher_number_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Align Voucher Number</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="utilization_entry.auto_align_voucher_number">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Document Number / Date Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="utilization_entry.document_number_date_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                            <label class="form-label">Narration Type</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer="utilization_entry.narration_type"> 
                                                <option value="Common">Common</option>
                                                <option value="Entriwise">Entriwise</option>
                                                <option value="Both">Both</option>
                                                <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Auto Narration Help</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="utilization_entry.required_auto_narration_help">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                            <label class="form-label">Utilization Havala Type Old/New</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer="utilization_entry.utilization_havala_type_old_new"> 
                                                <option value="New">New</option>
                                                <option value="Old">Old</option>
                                        </select>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Printing Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online Voucher Printing</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="utilization_entry.online_voucher_printing">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>SMS Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online SMS Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="utilization_entry.online_sms_sending">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>E-Mail Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online E-Mail Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="utilization_entry.online_e_mail_sending">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- gst bank payment setup -->
                            <div class="tab-pane fade show" id="gst_bank_payment-tab-pane" role="tabpanel" aria-labelledby="gst_bank_payment-tab" tabindex="0">
                                <h5 class="text-danger m-0 mt-3"><b>Entry Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Voucher Number Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_bank_payment.voucher_number_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Align Voucher Number</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_bank_payment.auto_align_voucher_number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                            <label class="form-label">Narration Type</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer="gst_bank_payment.narration_type"> 
                                                <option value="Common">Common</option>
                                                <option value="Entriwise">Entriwise</option>
                                                <option value="Both">Both</option>
                                                <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Auto Narration Help</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_bank_payment.required_auto_narration_help">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Cheque No Req. ?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_bank_payment.auto_cheque_no_req">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Closing Balance As On Date ?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_bank_payment.required_closing_balance_as_on_date">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Printing Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online Voucher Printing</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_bank_payment.online_voucher_printing">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>SMS Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online SMS Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_bank_payment.online_sms_sending">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>E-Mail Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online E-Mail Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_bank_payment.online_e_mail_sending">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- gst cash payment setup -->
                            <div class="tab-pane fade show" id="gst_cash_payment-tab-pane" role="tabpanel" aria-labelledby="gst_cash_payment-tab" tabindex="0">
                                <h5 class="text-danger m-0 mt-3"><b>Entry Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Document Number / Date Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_cash_payment.document_number_date_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Voucher Number Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_cash_payment.voucher_number_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Align Voucher Number</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_cash_payment.auto_align_voucher_number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                            <label class="form-label">Narration Type</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer="gst_cash_payment.narration_type"> 
                                                <option value="Common">Common</option>
                                                <option value="Entriwise">Entriwise</option>
                                                <option value="Both">Both</option>
                                                <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Auto Narration Help</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_cash_payment.required_auto_narration_help">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Closing Balance As On Date ?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_cash_payment.required_closing_balance_as_on_date">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Printing Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online Voucher Printing</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_cash_payment.online_voucher_printing">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>SMS Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online SMS Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_cash_payment.online_sms_sending">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>E-Mail Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online E-Mail Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="gst_cash_payment.online_e_mail_sending">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- rcm bank payment setup -->
                            <div class="tab-pane fade show" id="rcm_bank_payment-tab-pane" role="tabpanel" aria-labelledby="rcm_bank_payment-tab" tabindex="0">
                                <h5 class="text-danger m-0 mt-3"><b>Entry Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Voucher Number Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="rcm_bank_payment.voucher_number_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Align Voucher Number</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="rcm_bank_payment.auto_align_voucher_number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                            <label class="form-label">Narration Type</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer="rcm_bank_payment.narration_type"> 
                                                <option value="Common">Common</option>
                                                <option value="Entriwise">Entriwise</option>
                                                <option value="Both">Both</option>
                                                <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Auto Narration Help</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="rcm_bank_payment.required_auto_narration_help">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Cheque No.Req ?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="rcm_bank_payment.auto_cheque_no_req">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Cheque Name Required For</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer.defer="rcm_bank_payment.cheque_name_required_for"> 
                                            @foreach($account_groups as $group)
                                                <option value="{{$group->name}}">{{$group->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Bill To Bill Entry Before Amount</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="rcm_bank_payment.bill_to_bill_entry_before_amount">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Cess Required ? </label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="rcm_bank_payment.cess_required">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">GST Values Editable ? </label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="rcm_bank_payment.gst_values_editable">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Closing Balance As On Date ?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="rcm_bank_payment.required_closing_balance_as_on_date">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Printing Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online Voucher Printing</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="rcm_bank_payment.online_voucher_printing">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>SMS Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online SMS Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="rcm_bank_payment.online_sms_sending">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>E-Mail Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online E-Mail Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="rcm_bank_payment.online_e_mail_sending">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- rcm cash payment setup -->
                            <div class="tab-pane fade show" id="rcm_cash_payment-tab-pane" role="tabpanel" aria-labelledby="rcm_cash_payment-tab" tabindex="0">
                                <h5 class="text-danger m-0 mt-3"><b>Entry Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Document Number / Date Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="rcm_cash_payment.document_number_date_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Voucher Number Required</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="rcm_cash_payment.voucher_number_required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Auto Align Voucher Number</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="rcm_cash_payment.auto_align_voucher_number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                            <label class="form-label">Narration Type</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm" wire:model.defer="rcm_cash_payment.narration_type"> 
                                                <option value="Common">Common</option>
                                                <option value="Entriwise">Entriwise</option>
                                                <option value="Both">Both</option>
                                                <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Auto Narration Help</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="rcm_cash_payment.required_auto_narration_help">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Bill To Bill Entry Before Amount</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="rcm_cash_payment.bill_to_bill_entry_before_amount">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Cess Required ? </label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="rcm_cash_payment.cess_required">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">GST Values Editable ? </label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="rcm_cash_payment.gst_values_editable">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Required Closing Balance As On Date ?</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="rcm_cash_payment.required_closing_balance_as_on_date">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>Printing Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online Voucher Printing</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="rcm_cash_payment.online_voucher_printing">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>SMS Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online SMS Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="rcm_cash_payment.online_sms_sending">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-danger m-0 mt-3"><b>E-Mail Options</b></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Online E-Mail Sending</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="social-profile me-4 rounded form-switch p-1 ps-7">
                                            <input type="checkbox" class="form-check-input" wire:model.defer="rcm_cash_payment.online_e_mail_sending">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                
                </div>
            </div>
        </div>
    </div>
</section>