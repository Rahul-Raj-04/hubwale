<div>
    <div class="modal " id="setup-security" wire:ignore.self>
        <div class="modal-dialog modal-xl ">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Setup -> Security-> Menu Option -> Menu Option Setup</h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3" style="border-right:1px solid gray">
                            <h2>User Name</h2>
                        </div>
                        <div class="col-md-9">
                            <div style="height: 500px;overflow-y: scroll;">
                                <table class="table table-hover" id='basic'>
                                    <tr>
                                        <th>Menu</th>
                                        <th>Enable</th>
                                    </tr>

                                    <!-- master -->
                                    <tr data-node-id='master'> 
                                        <td class="text-danger" colspan="2">Master</td>
                                    </tr>
                                        <tr data-node-id="account" data-node-pid='master'>
                                            <td>Account</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.master_account"></td>
                                        </tr>
                                        <tr data-node-id="group" data-node-pid='master'>
                                            <td>Group</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.master_group"></td>
                                        </tr>
                                        <tr data-node-id="product" data-node-pid='master'>
                                            <td>Product</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.master_product"></td>
                                        </tr>
                                        <tr data-node-id='other-info' data-node-pid='master'> <!--  other info -->
                                            <td>Other Info</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.master_other_info"></td>
                                        </tr>
                                            <tr data-node-id='opening-stock' data-node-pid='other-info'>
                                                <td>Opening Stock</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.master_opening_stock"></td>
                                            </tr>
                                            <tr data-node-id='product-group' data-node-pid='other-info'>
                                                <td>Product Group</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.master_product_group"></td>
                                            </tr>
                                            <tr data-node-id='product-category' data-node-pid='other-info'>
                                                <td>Product Category</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.master_product_category"></td>
                                            </tr>
                                            <tr data-node-id='user-master-entry' data-node-pid='other-info'>
                                                <td>User Master Entry</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.master_user_master_entry"></td>
                                            </tr>
                                            <tr data-node-id='product-label' data-node-pid='other-info'>
                                                <td>Product Label</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.master_product_label"></td>
                                            </tr>
                                        <tr data-node-id='gst' data-node-pid='master'> <!--  gst -->
                                            <td>GST</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.master_gst"></td>
                                        </tr>
                                            <tr data-node-id='sales-setup' data-node-pid='gst'>
                                                <td>Sales Setup</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.master_sales_setup"></td>
                                            </tr>
                                            <tr data-node-id='purchase-setup' data-node-pid='gst'>
                                                <td>Purchase Setup</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.master_purchase_setup"></td>
                                            </tr>
                                            <tr data-node-id='credit_note_with_stock_setup' data-node-pid='gst'>
                                                <td>Credit Note With Stock Setup</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.master_credit_note_with_stock_setup"></td>
                                            </tr>
                                            <tr data-node-id='debit_note_with_stock_setup' data-node-pid='gst'>
                                                <td>Debit Note With Stock Setup</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.master_debit_note_with_stock_setup"></td>
                                            </tr>
                                    <!-- transaction -->
                                    <tr data-node-id='transaction' >
                                        <td class="text-danger" colspan="2">Transaction</td>
                                    </tr>
                                        <tr data-node-id="cash_bank_entry" data-node-pid='transaction'>
                                            <td>Cash/Bank Entry</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.transaction_cash_bank_entry"></td>
                                        </tr>
                                        <tr data-node-id="quick_entry" data-node-pid='transaction'>  <!-- quick entry  -->
                                            <td>Quick Entry</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.transaction_quick_entry"></td>
                                        </tr>
                                            <tr data-node-id="cash_bank" data-node-pid='quick_entry'>
                                                <td>Cash/Bank</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.transaction_cash_bank"></td>
                                            </tr>
                                            <tr data-node-id='journal' data-node-pid='quick_entry'>
                                                <td>Journal</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.transaction_journal"></td>
                                            </tr>
                                        <tr data-node-id='journal-entry' data-node-pid='transaction'>
                                            <td>Journal Entry</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.transaction_journal_entry"></td>
                                        </tr>
                                        <tr data-node-id='purchase-entry' data-node-pid='transaction'>   <!-- purchase entry  -->
                                            <td>Purchase Entry</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.transaction_purchase_entry"></td>
                                        </tr>
                                            <tr data-node-id='purchase-invoice' data-node-pid='purchase-entry'>
                                                <td>Purchase Invoice</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.transaction_purchase_invoice"></td>
                                            </tr>
                                            <tr data-node-id='purchase-return' data-node-pid='purchase-entry'>
                                                <td>Purchase Return</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.transaction_purchase_return"></td>
                                            </tr>
                                            <tr data-node-id='check-from-purchase' data-node-pid='purchase-entry'>
                                                <td>Check from purchase</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.transaction_check_from_purchase"></td>
                                            </tr>
                                        <tr data-node-id='sale-entry' data-node-pid='transaction'>   <!-- sale entry  -->
                                            <td>Sale Entry</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.transaction_sale_entry"></td>
                                        </tr>
                                            <tr data-node-id='sale-invoice' data-node-pid='sale-entry'>
                                                <td>Sale Invoice</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.transaction_sale_invoice"></td>
                                            </tr>
                                            <tr data-node-id='sale-return' data-node-pid='sale-entry'>
                                                <td>Sale Return</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.transaction_sale_return"></td>
                                            </tr>
                                        <tr data-node-id='cn-dn-entry' data-node-pid='transaction'>   <!-- CN/DN entry  -->
                                            <td>CN/DN Entry</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.transaction_cn_dn_entry"></td>
                                        </tr>
                                            <tr data-node-id='cn-entry-stock' data-node-pid='cn-dn-entry'>
                                                <td>CN Entry w/o Stock </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.transaction_cn_entry_wo_stock"></td>
                                            </tr>
                                            <tr data-node-id='dn-entry-stock' data-node-pid='cn-dn-entry'>
                                                <td>DN Entry w/o Stock </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.transaction_dn_entry_wo_stock"></td>
                                            </tr>
                                            <tr data-node-id='cn-entry-with-stock' data-node-pid='cn-dn-entry'>
                                                <td>CN Entry with Stock</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.transaction_cn_entry_with_stock"></td>
                                            </tr>
                                            <tr data-node-id='dn-entry-with-stock' data-node-pid='cn-dn-entry'>
                                                <td>DN Entry with Stock</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.transaction_dn_entry_with_stock"></td>
                                            </tr>
                                    
                                    <!-- gst  -->
                                    <tr data-node-id='gst' > 
                                        <td class="text-danger" colspan="2">GST</td>
                                    </tr>
                                        <tr data-node-id='gst-master'  data-node-pid='gst'>   <!-- gst master  -->
                                            <td>GST Master</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_gst_master"></td>
                                        </tr>
                                            <tr data-node-id='gst-slab' data-node-pid='gst-master'>
                                                <td> GST Slab </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_gst_slab"></td>
                                            </tr>
                                            <tr data-node-id='gst-commodity' data-node-pid='gst-master'>
                                                <td>GST Commodity </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_gst_commodity"></td>
                                            </tr>
                                        <tr data-node-id='gst-entry'  data-node-pid='gst'>   <!-- gst entry  -->
                                            <td>GST Entry</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_gst_entry"></td>
                                        </tr>
                                            <tr data-node-id='bank-payment' data-node-pid='gst-entry'>
                                                <td>Bank Payment </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_bank_payment"></td>
                                            </tr>
                                            <tr data-node-id='cash-payment' data-node-pid='gst-entry'>
                                                <td>Cash Payment </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_cash_payment"></td>
                                            </tr>
                                            <tr data-node-id='utilization-entry' data-node-pid='gst-entry'>
                                                <td>Utilization Entry </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_utilization_entry"></td>
                                            </tr>
                                            <tr data-node-id='journal-entry' data-node-pid='gst-entry'>
                                                <td>Journal Entry </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_journal_entry"></td>
                                            </tr>
                                        <tr data-node-id='rcm-voucher' data-node-pid='gst'>
                                            <td>RCM Voucher </td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_rcm_voucher"></td>
                                        </tr>
                                        <tr data-node-id='gst-expense' data-node-pid='gst'>
                                            <td>GST Expense </td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_gst_expense"></td>
                                        </tr>
                                        <tr data-node-id='gst-report'  data-node-pid='gst'>   <!-- gst report  -->
                                            <td>GST Report</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_gst_report"></td>
                                        </tr>
                                            <tr data-node-id='summary' data-node-pid='gst-report'>
                                                <td>Summary (sectionwise) </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_summary_sectionwise"></td>
                                            </tr>
                                            <tr data-node-id='percentage' data-node-pid='gst-report'>
                                                <td>Percentagewise </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_percentagewise"></td>
                                            </tr>
                                            <tr data-node-id='account-wise' data-node-pid='gst-report'>
                                                <td>Accountwise </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_accountwise"></td>
                                            </tr>
                                            <tr data-node-id='registration-type-wise' data-node-pid='gst-report'>
                                                <td>Registration  TypeWise </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_registration_typeWise"></td>
                                            </tr>
                                            <tr data-node-id='expense-audit' data-node-pid='gst-report'>
                                                <td>Expense Audit </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_expense_audit"></td>
                                            </tr>
                                            <tr data-node-id='hsn-wise-summary' data-node-pid='gst-report'>
                                                <td>HSNwise Summary </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_hsn_wise_summary"></td>
                                            </tr>
                                        <tr data-node-id='rcm-report'  data-node-pid='gst'>   <!-- rcm report  -->
                                            <td>RCM Report</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_rcm_report"></td>
                                        </tr>
                                            <tr data-node-id='date-wise' data-node-pid='rcm-report'>
                                                <td>Datewise Summary </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_datewise_summary"></td>
                                            </tr>
                                            <tr data-node-id='a-c-wise-summary' data-node-pid='rcm-report'>
                                                <td>A/CWise Summary </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_ac_wise_summary"></td>
                                            </tr>
                                            <tr data-node-id='notified-rcm' data-node-pid='rcm-report'>
                                                <td>Notified RCM</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_notified_rcm"></td>
                                            </tr>
                                        <tr data-node-id='gst-register'  data-node-pid='gst'>   <!-- gst register  -->
                                            <td>GST Register</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_gst_register"></td>
                                        </tr>
                                            <tr data-node-id='tax-liability' data-node-pid='gst-register'>
                                                <td>Tax Liability Register </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_tax_liability_register"></td>
                                            </tr>
                                            <tr data-node-id='cash-ledger' data-node-pid='gst-register'>
                                                <td>Cash Ledger </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_cash_ledger"></td>
                                            </tr>
                                            <tr data-node-id='itc-register' data-node-pid='gst-register'>
                                                <td>ITC Register </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_itc_register"></td>
                                            </tr>
                                            <tr data-node-id='outward-register' data-node-pid='gst-register'>
                                                <td>GST Outward Register </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_gst_outward_register"></td>
                                            </tr>
                                            <tr data-node-id='inward-register' data-node-pid='gst-register'>
                                                <td>GST Inward  Register </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_gst_inward_register"></td>
                                            </tr>
                                            <tr data-node-id='expense-register' data-node-pid='gst-register'>
                                                <td>GST Expense Register </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_gst_expense_register"></td>
                                            </tr>
                                            <tr data-node-id='income-register' data-node-pid='gst-register'>
                                                <td>GST Income Register </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_gst_income_register"></td>
                                            </tr>
                                        <tr data-node-id='way-bill' data-node-pid='gst'>
                                            <td>E-way Bill </td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_e_way_bill"></td>
                                        </tr>
                                        <tr data-node-id='gst-return'  data-node-pid='gst'>   <!-- gst return  -->
                                            <td>GST Return</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_gst_return"></td>
                                        </tr>
                                            <tr data-node-id='gstr1' data-node-pid='gst-return'>
                                                <td>GSTR 1 </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_gstr1"></td>
                                            </tr>
                                            <tr data-node-id='gstr1-hsn-summary' data-node-pid='gst-return'>
                                                <td>GSTR 1 HSN Summary </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_gstr1_hsn_summary"></td>
                                            </tr>
                                            <tr data-node-id='gstr2-hsn-summary' data-node-pid='gst-return'>
                                                <td>GSTR 2 HSN Summary </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_gstr2_hsn_summary"></td>
                                            </tr>
                                            <tr data-node-id='gstr2' data-node-pid='gst-return'>
                                                <td>GSTR 2 </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_gstr2"></td>
                                            </tr>
                                            <tr data-node-id='gstr3b' data-node-pid='gst-return'>
                                                <td>GSTR 3B (as per Books) </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_gstr3b"></td>
                                            </tr>
                                            <tr data-node-id='gstr9' data-node-pid='gst-return'>
                                                <td>GSTR-9</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_gstr9"></td>
                                            </tr>
                                            <tr data-node-id='gstr3b-as-per-gstr-2b' data-node-pid='gst-return'>
                                                <td>GSTR 3B (as per GSTR 2B)</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_gstr3b_as_per_gstr_2b"></td>
                                            </tr>
                                        <tr data-node-id='gstr-integrity'  data-node-pid='gst'>   <!-- gst integrity  -->
                                            <td>GSTR Integrity</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_gstr_integrity"></td>
                                        </tr>
                                            <tr data-node-id='tax-liab' data-node-pid='gstr-integrity'>
                                                <td>Tax Liability </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_tax_liability"></td>
                                            </tr>
                                            <tr data-node-id='gstr1-itc' data-node-pid='gstr-integrity'>
                                                <td>ITC </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_itc"></td>
                                            </tr>
                                        <tr data-node-id='gst-audit'  data-node-pid='gst'>   <!-- gst Audit  -->
                                            <td>GST Audit</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_gst_audit"></td>
                                        </tr>
                                            <tr data-node-id='gstr1_b2b_summary' data-node-pid='gst'>
                                                <td>GSTR 1 B2B Summary</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_gstr1_b2b_summary"></td>
                                            </tr>
                                            <tr data-node-id='gstr2a_match' data-node-pid='gst'>
                                                <td>GSTR 2A Match</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_gstr2a_match"></td>
                                            </tr>
                                            <tr data-node-id='gstr2_b2b_summary' data-node-pid='gst'>
                                                <td>GSTR 2 B2B Summary</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_gstr2_b2b_summary"></td>
                                            </tr>
                                            <tr data-node-id='itc_as_per_gstr_2b' data-node-pid='gst'>
                                                <td>ITC As per GSTR 2B</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_itc_as_per_gstr_2b"></td>
                                            </tr>
                                        <tr data-node-id='gst-paym-assit' data-node-pid='gst'>
                                            <td>GST Paymt. Assist.</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_gst_payment"></td>
                                        </tr>
                                        <tr data-node-id='gst-income' data-node-pid='gst'>
                                            <td>GST Income </td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_gst_income"></td>
                                        </tr>
                                        <tr data-node-id='gstr-2b-match' data-node-pid='gst'>
                                            <td>GSTR 2B Match </td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.gst_gstr_2b_match"></td>
                                        </tr>

                                    <!-- report  -->
                                    <tr data-node-id='report'  >   
                                        <td class="text-danger" colspan="2">Report</td>
                                    </tr>
                                        <tr data-node-id='account-books' data-node-pid='report'>  <!-- acccount books -->
                                            <td>Account Books</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_account_book"></td>
                                        </tr>
                                            <tr data-node-id='ledger' data-node-pid='account-books'>
                                                <td>Ledger </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_ledger"></td>
                                            </tr>
                                            <tr data-node-id='Voucher-List' data-node-pid='account-books'>
                                                <td>Voucher List </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_voucher_list"></td>
                                            </tr>
                                            <tr data-node-id='day-book' data-node-pid='account-books'>
                                                <td>Day Book </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_day_book"></td>
                                            </tr>
                                            <tr data-node-id='cash-book' data-node-pid='account-books'>
                                                <td>Cash Book </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_cash_book"></td>
                                            </tr>
                                            <tr data-node-id='bank-book' data-node-pid='account-books'>
                                                <td>Bank Book </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_bank_book"></td>
                                            </tr>
                                        <tr data-node-id='outstading' data-node-pid='report'>  <!-- outstanding  -->
                                            <td>Outstanding</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_outstanding"></td>
                                        </tr>
                                            <tr data-node-id='receivable' data-node-pid='outstading'>
                                                <td>Receivable </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_receivable"></td>
                                            </tr>
                                            <tr data-node-id='Payable' data-node-pid='outstading'>
                                                <td>Payable </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_payable"></td>
                                            </tr>
                                        <tr data-node-id='register' data-node-pid='report'>  <!-- register  -->
                                            <td>Register</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_register"></td>
                                        </tr>
                                            <tr data-node-id='sales-register' data-node-pid='register'>
                                                <td>Sales Register </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_sale_register"></td>
                                            </tr>
                                            <tr data-node-id='purchase-register' data-node-pid='register'>
                                                <td>Purchase Register </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_purchase_register"></td>
                                            </tr>
                                            <tr data-node-id='credit-note-with-stock-register' data-node-pid='register'>
                                                <td>Credit Note with Stock Register </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_credit_note_with_stock_register"></td>
                                            </tr>
                                            <tr data-node-id='debit-note-with-stock-register' data-node-pid='register'>
                                                <td>Debit Note with Stock Register </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_debit_note_with_stock_register"></td>
                                            </tr>
                                            <tr data-node-id='credit-note-without-stock-register' data-node-pid='register'>
                                                <td>Credit Note w/o Stock Register </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_credit_note_wo_stock_register"></td>
                                            </tr>
                                            <tr data-node-id='debit-note-without-stock-register' data-node-pid='register'>
                                                <td>Debit Note w/o Stock Register </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_debit_note_wo_stock_register"></td>
                                            </tr>
                                        <tr data-node-id='balance-sheet' data-node-pid='report'>  <!-- balance sheet  -->
                                            <td>Balance Sheet</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_balance_sheet"></td>
                                        </tr>
                                            <tr data-node-id='trial-balance' data-node-pid='balance-sheet'>  <!-- trial balance  -->
                                                <td>Trial Balance </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_trial_balance"></td>
                                            </tr>
                                                <tr data-node-id='trial1-balance' data-node-pid='trial-balance'>
                                                    <td>Trial Balance </td>
                                                    <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_sub_trial_balance"></td>
                                                </tr>
                                                <tr data-node-id='opening-balance' data-node-pid='trial-balance'>  
                                                    <td>Opening Balance </td>
                                                    <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_opening_balance"></td>
                                                </tr>
                                            <tr data-node-id='trading-account' data-node-pid='balance-sheet'>
                                                <td>Trading Account </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_trending_account"></td>
                                            </tr>
                                            <tr data-node-id='pl-statement' data-node-pid='balance-sheet'>
                                                <td>PL Statement </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_pl_statement"></td>
                                            </tr>
                                            <tr data-node-id='b-sheet' data-node-pid='balance-sheet'>
                                                <td>Balance Sheet </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_balance_sheet"></td>
                                            </tr>
                                            <tr data-node-id='trading-pl' data-node-pid='balance-sheet'>
                                                <td>Trading + P L </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_trending_pl"></td>
                                            </tr>  
                                        <tr data-node-id='analysis-report' data-node-pid='report'>   <!-- analysis report  -->
                                            <td>Analysis Report</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_analysis_report"></td>
                                        </tr> 
                                            <tr data-node-id='perform-report' data-node-pid='analysis-report'>
                                                <td>Performance Report </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_performance_report"></td>
                                            </tr>
                                            <tr data-node-id='sales_pur_report' data-node-pid='analysis-report'>
                                                <td>Sales/Purchase Report </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_sale_purchase_report"></td>
                                            </tr>
                                            <tr data-node-id='partywise-report' data-node-pid='analysis-report'>
                                                <td>Partywise Report </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_partywise_report"></td>
                                            </tr>
                                            <tr data-node-id='account-analysis' data-node-pid='analysis-report'>
                                                <td>Account Analysis </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_account_analysis"></td>
                                            </tr> 
                                            <tr data-node-id='fund-flow' data-node-pid='analysis-report'>
                                                <td>Fund Flow</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_fund_flow"></td>
                                            </tr> 
                                            <tr data-node-id='cash-flow' data-node-pid='analysis-report'>
                                                <td>Cash  Flow</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_cash_flow"></td>
                                            </tr> 
                                            <tr data-node-id='daily-status' data-node-pid='analysis-report'>
                                                <td>Daily Status</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_daily_status"></td>
                                            </tr> 
                                        <tr data-node-id='stock-report' data-node-pid='report'>   <!-- stock report  -->
                                            <td>Stock Report</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_stock_report"></td>
                                        </tr> 
                                            <tr data-node-id='product-ledger' data-node-pid='stock-report'>
                                                <td>Product Ledger </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_product_ledger"></td>
                                            </tr>
                                            <tr data-node-id='Partywise-report' data-node-pid='stock-report'>
                                                <td>Partywise Report</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_stock_partywise_report"></td>
                                            </tr>
                                        <tr data-node-id='other-report' data-node-pid='report'>   <!-- other report  -->
                                            <td>Other Reports</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_other_reports"></td>
                                        </tr> 
                                            <tr data-node-id='interest-report' data-node-pid='other-report'>
                                                <td>Interest Report </td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_intrest_report"></td>
                                            </tr>
                                            <tr data-node-id='sms-report' data-node-pid='other-report'>
                                                <td>SMS Report</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_sms_report"></td>
                                            </tr>
                                            <tr data-node-id='template-list' data-node-pid='other-report'>
                                                <td>Template List</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_template_list"></td>
                                            </tr>
                                            <tr data-node-id='Missing-Vou-No-Report' data-node-pid='other-report'>
                                                <td>Missing Vou No Report</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_missing_vou_no_report"></td>
                                            </tr>
                                            <tr data-node-id='e-report' data-node-pid='other-report'> <!-- email report  -->
                                                <td>Email Report</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_email_report"></td>
                                            </tr>
                                                <tr data-node-id='profile-email' data-node-pid='e-report'>
                                                    <td>Profile Email</td>
                                                    <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_profile_email"></td>
                                                </tr>
                                                <tr Profile data-node-id='other-e-report' data-node-pid='e-report'> 
                                                    <td>Other Email</td>
                                                    <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_other_email"></td>
                                                </tr>
                                            <tr Profile data-node-id='cancel-voucher-report' data-node-pid='other-report'> 
                                                <td>Cancel Voucher Report</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.report_cancel_voucher_report"></td>
                                            </tr>
                                            

                                        <!-- utility -->
                                        <tr data-node-id='utility' >
                                            <td class="text-danger" colspan="2">Utility</td>
                                        </tr>
                                        <tr data-node-id='system-utility' data-node-pid='utility'> <!-- system uitlity  -->
                                            <td>System Utility</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.utility_system_utility"></td>
                                        </tr>
                                            <tr data-node-id='backup' data-node-pid='system-utility'>
                                                <td>Backup</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.utility_backup"></td>
                                            </tr>
                                        <tr data-node-id='advance-utility' data-node-pid='utility'> <!-- advance uitlity  -->
                                            <td>Advance Utility</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.utility_advance_utility"></td>
                                        </tr>
                                            <tr data-node-id='account-merge' data-node-pid='advance-utility'>
                                                <td>Account Merge</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.utility_account_merge"></td>
                                            </tr>
                                            <tr data-node-id='product-merge' data-node-pid='advance-utility'>
                                                <td>Product Merge</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.utility_product_merge"></td>
                                            </tr>
                                            <tr data-node-id='data-delete' data-node-pid='advance-utility'>
                                                <td>Data Delete</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.utility_data_delete"></td>
                                            </tr>
                                            <tr data-node-id='voucher-renumber' data-node-pid='advance-utility'>
                                                <td>Voucher Renumber</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.utility_voucher_renumber"></td>
                                            </tr>
                                        <tr data-node-id='data-utility' data-node-pid='utility'> <!-- data uitlity  -->
                                            <td>Data Utility</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.utility_data_utility"></td>
                                        </tr>
                                            <tr data-node-id='data-export' data-node-pid='data-utility'>
                                                <td>Data Export</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.utility_data_export"></td>
                                            </tr>
                                            <tr data-node-id='data-import' data-node-pid='data-utility'>
                                                <td>Data Import</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.utility_data_import"></td>
                                            </tr>
                                            <tr data-node-id='fin-year-delete' data-node-pid='data-utility'>
                                                <td>Fin. Year Delete</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.utility_fin_year_delete"></td>
                                            </tr>
                                        <tr data-node-id='havala' data-node-pid='utility'> <!-- havala   -->
                                            <td>Havala</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.utility_havala"></td>
                                        </tr>
                                            <tr data-node-id='capital' data-node-pid='havala'>
                                                <td>Capital</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.utility_capital"></td>
                                            </tr>
                                            <tr data-node-id='depreciation' data-node-pid='havala'>
                                                <td>Depriciation</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.utility_depriciation"></td>
                                            </tr>
                                            <tr data-node-id='interest' data-node-pid='havala'>
                                                <td>Interest</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.utility_interest"></td>
                                            </tr>
                                            <tr data-node-id='havala_setup' data-node-pid='havala'>
                                                <td>Havala Setup</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.utility_havala_setup"></td>
                                            </tr>
                                        <tr data-node-id='year-end' data-node-pid='utility'> <!-- year end    -->
                                            <td>Year End</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.utility_year_end"></td>
                                        </tr>
                                            <tr data-node-id='update-balance' data-node-pid='year-end'>
                                                <td>Update Balance</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.utility_update_balance"></td>
                                            </tr>
                                            <tr data-node-id='new-fin-year' data-node-pid='year-end'>
                                                <td>New Fin. Year</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.utility_new_fin_year"></td>
                                            </tr>
                                        <tr data-node-id='diary' data-node-pid='utility'> <!-- personal diary    -->
                                            <td>Personal Diary</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.utility_personal_diary"></td>
                                        </tr>
                                            <tr data-node-id='address-book' data-node-pid='diary'>
                                                <td>Address Book</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.utility_address_book"></td>
                                            </tr>
                                            <tr data-node-id='mailing-letter' data-node-pid='diary'>
                                                <td>Mailing Letter</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.utility_mailing_latter"></td>
                                            </tr>
                                            <tr data-node-id='reminder' data-node-pid='diary'>
                                                <td>Reminder</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.utility_reminder"></td>
                                            </tr>
                                            <tr data-node-id='calen_diary' data-node-pid='diary'>
                                                <td>Calender/Diary</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.utility_calender_diary"></td>
                                            </tr>
                                        <tr data-node-id='voucher_import' data-node-pid='utility'>
                                            <td>Voucher Import</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.utility_voucher_import"></td>
                                        </tr>
                                        <tr data-node-id='data_freeze' data-node-pid='utility'> <!-- data freeze   -->
                                            <td>Data Freeze</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.utility_data_freeze"></td>
                                        </tr>
                                            <tr data-node-id='df' data-node-pid='data_freeze'>
                                                <td>Data Freeze</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.utility_sub_data_freeze"></td>
                                            </tr>
                                            <tr data-node-id='data_unfreeze' data-node-pid='data_freeze'>
                                                <td>Data Unfreeze</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.utility_data_unfreeze"></td>
                                            </tr>
                                            <tr data-node-id='gst_data_freeze' data-node-pid='data_freeze'>
                                                <td>GST Data Freeze</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.utility_gst_data_freeze"></td>
                                            </tr>
                                            <tr data-node-id='gst_data_unfreeze' data-node-pid='data_freeze'>
                                                <td>GST Data Unfreeze</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.utility_gst_data_unfreeze"></td>
                                            </tr>
                                    <tr data-node-id='setup' > <!-- setup   -->
                                        <td class="text-danger" colspan="2">Setup</td>
                                    </tr>
                                        <tr data-node-id='comp_set' data-node-pid='setup'>
                                            <td>Company Setup</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.setup_company_setup"></td>
                                        </tr>
                                        <tr data-node-id='vou_set' data-node-pid='setup'>
                                            <td>Voucher Setup</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.setup_voucher_setup"></td>
                                        </tr>
                                        <tr data-node-id='vou_number' data-node-pid='setup'>
                                            <td>Voucher Number</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.setup_voucher_number"></td>
                                        </tr>
                                        <tr data-node-id='sales_setup' data-node-pid='setup'>       <!--sales  setup   -->
                                            <td>Sales Setup</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.setup_sales_setup"></td>
                                        </tr>
                                            <tr data-node-id='exp_det' data-node-pid='sales_setup'>
                                                <td>Expense Details</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.setup_sales_expense_detail"></td>
                                            </tr>
                                            <tr data-node-id='in_type' data-node-pid='sales_setup'>
                                                <td>Invoice Type</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.setup_sales_invoice_type"></td>
                                            </tr>
                                        <tr data-node-id='purchase_setup' data-node-pid='setup'>       <!--purchase  setup   -->
                                            <td>Purchase  Setup</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.setup_purchase_setup"></td>
                                        </tr>
                                            <tr data-node-id='pur_exp_det' data-node-pid='purchase_setup'>
                                                <td>Expense Details</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.setup_purchase_expense_detail"></td>
                                            </tr>
                                            <tr data-node-id='pur_invoice_type' data-node-pid='purchase_setup'>
                                                <td>Invoice Type</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.setup_purchase_invoice_type"></td>
                                            </tr>
                                        <tr data-node-id='advance_setup' data-node-pid='setup'>       <!--advance  setup   -->
                                            <td>Advance  Setup</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.setup_advance_setup"></td>
                                        </tr>
                                            <tr data-node-id='macr_setting' data-node-pid='advance_setup'>
                                                <td>Macro Setting</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.setup_macro_setting"></td>
                                            </tr>
                                            <tr data-node-id='user_field' data-node-pid='advance_setup'>
                                                <td>User Field</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.setup_user_field"></td>
                                            </tr>
                                            <tr data-node-id='user_master' data-node-pid='advance_setup'>
                                                <td>User Master</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.setup_user_master"></td>
                                            </tr>
                                            <tr data-node-id='equation' data-node-pid='advance_setup'>
                                                <td>Equation</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.setup_equation"></td>
                                            </tr>
                                            <tr data-node-id='auto_number' data-node-pid='advance_setup'>
                                                <td>Auto Number</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.setup_auto_number"></td>
                                            </tr>
                                        <tr data-node-id='software_setup' data-node-pid='setup'>
                                            <td>Software Setup</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.setup_software_setup"></td>
                                        </tr>
                                        <tr data-node-id='vou_format' data-node-pid='setup'>
                                            <td>Voucher Format</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.setup_voucher_format"></td>
                                        </tr>
                                        <tr data-node-id='credit_note_setup' data-node-pid='setup'>       <!-- credit note  setup   -->
                                            <td>Credit Note Setup</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.setup_credit_note_setup"></td>
                                        </tr>
                                            <tr data-node-id='credit_exp_det' data-node-pid='credit_note_setup'>
                                                <td>Expense Details</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.setup_credit_expense_detail"></td>
                                            </tr>
                                            <tr data-node-id='cre_nvoice_type' data-node-pid='credit_note_setup'>
                                                <td>Invoice Type</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.setup_credit_invoice_type"></td>
                                            </tr>
                                        <tr data-node-id='debit_note_setup' data-node-pid='setup'>       <!-- debit note  setup   -->
                                            <td>Debit Note Setup</td>
                                            <td><input type="checkbox" class="form-check" wire:model.defer="menus.setup_debit_note_setup"></td>
                                        </tr>
                                            <tr data-node-id='debit_exp_det' data-node-pid='debit_note_setup'>
                                                <td>Expense Details</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.setup_debit_expense_detail"></td>
                                            </tr>
                                            <tr data-node-id='debit_invoice_type' data-node-pid='debit_note_setup'>
                                                <td>Invoice Type</td>
                                                <td><input type="checkbox" class="form-check" wire:model.defer="menus.setup_debit_invoice_type"></td>
                                            </tr>
                                </table>
                            </div>
                            <div class="col-auto ms-auto d-print-none pe-0">
                                <div class="btn-list">
                                <a href="#" class="btn btn-primary btn-sm me-1" wire:click="save">
                                    Save
                                </a>
                                
                                <a href="#" class="btn btn-primary btn-sm me-1">
                                    Reset
                                </a>
                                
                                <a href="#" class="btn btn-primary btn-sm me-1" data-bs-dismiss="modal" aria-label="Close">
                                    Cancel
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{asset('js/jquery-simple-tree-table.js')}}"></script>
    <script>
        $('#basic').simpleTreeTable({
            opened: false
        })
    </script>

</div>
