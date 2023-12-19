<div class="main-sidemenu container">
    <div class="slide-left">
        <img src="{{ asset('img/new/blue-bg-small.png') }}" class="header-brand-img desktop-logo" alt="logo" style="width: 30px !important;" alt="logo">
    </div>
    <ul class="side-menu flex-nowrap" style="margin-right: 0px; margin-left: 0px;">
        <li class="slide">
            <a class="side-menu__item has-link {{ request()->routeIs('erp.home') ? 'active' : '' }}" data-bs-toggle="slide" href="{{ route('erp.home') }}">
                <span class="side-menu__label">Dashboard</span>
            </a> 
        </li>
        <li class="slide">
            <a class="side-menu__item {{ Request::get('module') == 'master' || request()->routeIs('erp.master.*') ? 'active' : '' }}" data-bs-toggle="slide" href="javascript:void(0)">
                <span class="side-menu__label">Master</span>
                <i class="angle fe fe-chevron-right"></i></a>
            <ul class="slide-menu">
                <li class="side-menu-label1"><a href="javascript:void(0)">Master</a></li>
                <li class="{{checkMenuVisibilty('master_account')}}">
                    <a class="slide-item {{ request()->routeIs('erp.master.account.*') ? 'active' : ' ' }}" data-bs-toggle="slide" href="{{ route('erp.master.account.index') }}">
                        <span class="side-menu__label text-success">Account</span>
                    </a>
                </li>
                <li class="{{checkMenuVisibilty('master_group')}}">
                    <a class="slide-item {{ request()->routeIs('erp.master.account-group.*') ? 'active' : ' ' }}" data-bs-toggle="slide" href="{{ route('erp.master.account-group.index') }}">
                        <span class="side-menu__label text-success">Group</span>
                    </a>
                </li>
                <li class="sub-slide {{checkMenuVisibilty('master_gst')}}">
                    <a class="sub-side-menu__item {{ request()->routeIs('erp.master.gst.*') ? 'active' : '' }}" data-bs-toggle="sub-slide" href="javascript:void(0)">
                        <span class="sub-side-menu__label text-success">GST</span>
                        <i class="sub-angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="sub-slide-menu">
                        <li class="{{checkMenuVisibilty('master_sales_setup')}}"><a class="text-success sub-slide-item {{Request::get('type') == 'sale_setup' ? 'active' : ''}}" href="{{ route('erp.master.gst.sales-setup.index',  ['type' => 'sale_setup']) }}">Sales Setup</a></li>
                        <li class="{{checkMenuVisibilty('master_purchase_setup')}}"><a class="text-success sub-slide-item {{Request::get('type') == 'purchase_setup' ? 'active' : '' }}" href="{{ route('erp.master.gst.sales-setup.index', ['type' => 'purchase_setup']) }}">Purchase Setup</a></li>
                        <li><a class="d-none text-success sub-slide-item {{request()->routeIs('erp.master.gst.jw-out-setup.*') ? 'active' : '' }}" href="{{ route('erp.master.gst.jw-out-setup.index') }}">JW Out Setup</a></li>
                        <li><a class="d-none text-success sub-slide-item {{request()->routeIs('erp.master.gst.jw-in-setup.*') ? 'active' : '' }}" href="{{ route('erp.master.gst.jw-in-setup.index') }}">JW In Setup</a></li>
                        <li class="{{checkMenuVisibilty('master_credit_note_with_stock_setup')}}"><a class="text-success sub-slide-item {{request()->routeIs('erp.master.gst.credit-note-setup.*') ? 'active' : '' }}" href="{{ route('erp.master.gst.credit-note-setup.index') }}">Credit Note With Stock Setup</a></li>
                        <li class="{{checkMenuVisibilty('master_debit_note_with_stock_setup')}}"><a class="text-success sub-slide-item {{request()->routeIs('erp.master.gst.debit-note-setup.*') ? 'active' : '' }}" href="{{ route('erp.master.gst.debit-note-setup.index') }}">Debit Note With Stock Setup</a></li>
                    </ul>
                </li>
                <li class="d-none">
                    <a class="slide-item {{ request()->routeIs('erp.products.*') ? 'active' : ' ' }}"
                        data-bs-toggle="slide" href="{{ route('erp.products.index') }}">
                        <span class="side-menu__label">Products</span>
                    </a>
                </li>
                
                <li class="{{checkMenuVisibilty('master_product')}}">
                    <a class="slide-item {{ request()->routeIs('erp.master.product.*') ? 'active' : ' ' }}"
                        data-bs-toggle="slide" href="{{ route('erp.master.product.index') }}">
                        <span class="side-menu__label text-success">Products</span>
                    </a>
                </li>

                <li class="d-none">
                    <a class="slide-item {{ request()->routeIs('erp.master.service.*') ? 'active' : ' ' }}"
                        data-bs-toggle="slide" href="{{ route('erp.master.service.index') }}">
                        <span class="side-menu__label">Services</span>
                    </a>
                </li>
                <li class="d-none">
                    <a class="slide-item {{ request()->routeIs('erp.master.price-list.*') ? 'active' : ' ' }}"
                        data-bs-toggle="slide" href="{{ route('erp.master.price-list.index') }}">
                        <span class="side-menu__label">Price List</span>
                    </a>
                </li>
                <li class="sub-slide {{checkMenuVisibilty('master_other_info')}}">
                    <a class="sub-side-menu__item {{ (Request::get('module') == 'master') && (request()->routeIs('erp.account-transaction.jobwork-out.*') || request()->routeIs('erp.account-transaction.jobwork-in.*')) ? 'active' : '' }}" data-bs-toggle="sub-slide" href="javascript:void(0)">
                        <span class="sub-side-menu__label text-danger">Other Info</span>
                        <i class="sub-angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="sub-slide-menu">
                        <li class="d-none">
                            <a class="sub-slide-item {{Request::get('type') == \App\Enum\Enum::JOBWORK_OUT_ORDER_OPENING ? 'active' : '' }}" href="{{ route('erp.account-transaction.jobwork-out.index', ['type' => \App\Enum\Enum::JOBWORK_OUT_ORDER_OPENING, 'module' => 'master']) }}">Jobwork Out Order Opening</a>
                        </li>
                        <li class="d-none">
                            <a class="sub-slide-item {{Request::get('type') == \App\Enum\Enum::JOBWORK_OUT_ISSUE_OPENING ? 'active' : '' }}" href="{{ route('erp.account-transaction.jobwork-out.index', ['type' => \App\Enum\Enum::JOBWORK_OUT_ISSUE_OPENING, 'module' => 'master']) }}">Jobwork Out Issue Opening</a>
                        </li>
                        <li class="d-none">
                            <a class="sub-slide-item {{Request::get('type') == \App\Enum\Enum::JOBWORK_IN_ORDER_OPENING ? 'active' : '' }}" href="{{ route('erp.account-transaction.jobwork-in.index', ['type' => \App\Enum\Enum::JOBWORK_IN_ORDER_OPENING, 'module' => 'master']) }}">Jobwork In Order Opening</a>
                        </li>
                        <li class="d-none">
                            <a class="sub-slide-item {{Request::get('type') == \App\Enum\Enum::JOBWORK_IN_RECEIPT_OPENING ? 'active' : '' }}" href="{{ route('erp.account-transaction.jobwork-in.index', ['type' => \App\Enum\Enum::JOBWORK_IN_RECEIPT_OPENING, 'module' => 'master']) }}">Jobwork In Receipt Opening</a>
                        </li>
                        <li class="d-none">
                            <a class="sub-slide-item {{Request::get('type') == \App\Enum\Enum::JOBWORK_IN_PRODUCTION_OPENING ? 'active' : '' }}" href="{{ route('erp.account-transaction.jobwork-in.index', ['type' => \App\Enum\Enum::JOBWORK_IN_PRODUCTION_OPENING, 'module' => 'master']) }}">Jobwork In Production</a>
                        </li>
                        <li class="d-none">
                            <a class="sub-slide-item {{Request::get('type') == \App\Enum\Enum::PHYSICAL_STOCK_VERIFICATION ? 'active' : '' }}" href="{{ route('erp.account-transaction.jobwork-out.index', ['type' => \App\Enum\Enum::PHYSICAL_STOCK_VERIFICATION, 'module' => 'master']) }}">Physical Stock  verification</a>
                        </li>

                        <li>
                            <a class="sub-slide-item text-danger {{checkMenuVisibilty('master_opening_stock')}}" href="#">Opening Stock</a>
                            <a class="sub-slide-item text-danger {{checkMenuVisibilty('master_product_group')}}" href="#">Product Group</a>
                            <a class="sub-slide-item text-danger {{checkMenuVisibilty('master_product_category')}}" href="#">Product Category</a>
                            <a class="sub-slide-item text-danger {{checkMenuVisibilty('master_user_master_entry')}}" href="#">User Master Entry</a>
                            <a class="sub-slide-item text-danger {{checkMenuVisibilty('master_product_label')}}" href="#">Product Label</a>
                        </li>
                    </ul>
                </li>
                <li class="sub-slide d-none">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)">
                        <span class="sub-side-menu__label">Cost Centre</span>
                        <i class="sub-angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item {{request()->routeIs('erp.master.cost-centre.cost-category.*') ? 'active' : '' }}" href="{{ route('erp.master.cost-centre.cost-category.index') }}">Cost Category</a></li>
                        <li><a class="sub-slide-item {{request()->routeIs('erp.master.cost-centre.cost-centre.*') ? 'active' : '' }}" href="{{ route('erp.master.cost-centre.cost-centre.index') }}">Cost Centre</a></li>
                    </ul>
                </li>
                <li class="sub-slide d-none">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label">Multi Currency</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item {{request()->routeIs('erp.master.multi-currency.currency-master.*') ? 'active' : '' }}" href="{{ route('erp.master.multi-currency.currency-master.index') }}">Currency Master</a></li>
                        <li><a class="sub-slide-item {{request()->routeIs('erp.master.multi-currency.rate-exchange-master.*') ? 'active' : '' }}" href="{{ route('erp.master.multi-currency.rate-exchange-master.index') }}">Rate Exchange Master</a></li>
                    </ul>
                </li>
                <li>
                    <a class="slide-item" data-bs-toggle="slide" href="#">
                        <span class="side-menu__label text-danger">Change Year</span>
                    </a>
                </li>
                <li>
                    <a class="slide-item" data-bs-toggle="slide" href="#">
                        <span class="side-menu__label text-danger">Change Company</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Transaction menu -->
        <li class="slide">
            <a class="side-menu__item {{ !Request::get('module') && request()->routeIs('erp.account-transaction.*') ? 'active' : '' }}" data-bs-toggle="slide" href="javascript:void(0)">
                <span class="side-menu__label">Transactions</span>
                <i class="angle fe fe-chevron-right"></i>
            </a>
            <ul class="slide-menu {{ !Request::get('module') && request()->routeIs('erp.account-transaction.*') ? 'open' : ''}}">
                <li class="side-menu-label1">
                    <a href="javascript:void(0)">Transactions</a>
                </li>
                <li class="sub-slide {{checkMenuVisibilty('transaction_cash_bank_entry')}}">
                    <a class="sub-side-menu__item {{ !Request::get('module') && request()->routeIs('erp.account-transaction.cash-bank-entry.*') ? 'active' : '' }}" data-bs-toggle="sub-slide" href="javascript:void(0)">
                        <span class="sub-side-menu__label text-success">Cash/Bank Entry</span>
                        <i class="sub-angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="sub-slide-menu">
                        <li>
                            <a class="text-success sub-slide-item {{request()->routeIs('erp.account-transaction.cash-bank-entry.bank-payment.*') ? 'active' : '' }}" href="{{ route('erp.account-transaction.cash-bank-entry.bank-payment.index') }}">Bank Payment</a>
                        </li>
                        <li>
                            <a class="text-success sub-slide-item {{request()->routeIs('erp.account-transaction.cash-bank-entry.bank-receipt.*') ? 'active' : '' }}" href="{{ route('erp.account-transaction.cash-bank-entry.bank-receipt.index') }}">Bank Receipt</a>
                        </li>
                        <li>
                            <a class="text-success sub-slide-item {{request()->routeIs('erp.account-transaction.cash-bank-entry.cash-payment.*') ? 'active' : '' }}" href="{{ route('erp.account-transaction.cash-bank-entry.cash-payment.index') }}">Cash Payment</a>
                        </li>
                        <li>
                            <a class="text-success sub-slide-item {{request()->routeIs('erp.account-transaction.cash-bank-entry.cash-receipt.*') ? 'active' : '' }}" href="{{ route('erp.account-transaction.cash-bank-entry.cash-receipt.index') }}">Cash Receipt</a>
                        </li>
                        <li>
                            <a class="text-success sub-slide-item {{request()->routeIs('erp.account-transaction.cash-bank-entry.contra.*') ? 'active' : '' }}" href="{{ route('erp.account-transaction.cash-bank-entry.contra.index') }}">Contra</a>
                        </li>
                    </ul>
                </li>
                <li class="sub-slide {{ checkMenuVisibilty('transaction_quick_entry') }}">
                    <a class="sub-side-menu__item {{ request()->routeIs('erp.account-transaction.quick-entry.*') ? 'active' : '' }}" data-bs-toggle="sub-slide" href="javascript:void(0)">
                        <span class="sub-side-menu__label text-success">Quick Entry</span>
                        <i class="sub-angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="sub-slide-menu">
                        <li class="{{ checkMenuVisibilty('transaction_cash_bank') }}">
                            <a class="text-success sub-slide-item {{ request()->routeIs('erp.account-transaction.quick-entry.cash-bank-entry.*') ? 'active' : '' }}" href="{{ route('erp.account-transaction.quick-entry.cash-bank-entry.index') }}">Cash/Bank</a>
                        </li>
                        <li class="{{ checkMenuVisibilty('transaction_journal') }}">
                            <a class="text-success sub-slide-item {{ request()->routeIs('erp.account-transaction.quick-entry.journal-entry.*') ? 'active' : '' }}" href="{{ route('erp.account-transaction.quick-entry.journal-entry.index') }}">Journal</a>
                        </li>
                    </ul>
                </li>
                <li class="sub-slide d-none">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)">
                        <span class="sub-side-menu__label">(TD) APMC Entry</span>
                    </a>
                </li>
                <li class="sub-slide {{ checkMenuVisibilty('transaction_journal_entry') }}">
                    <a class="sub-side-menu__item {{ request()->routeIs('erp.account-transaction.journal-entry.*') ? 'active' : '' }}" data-bs-toggle="sub-slide" href="javascript:void(0)">
                        <span class="sub-side-menu__label text-success">Journal Entry</span>
                        <i class="sub-angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="sub-slide-menu">
                        <li>
                            <a class="text-success sub-slide-item {{Request::get('vouType') == \App\Enum\Enum::JOURNAL_ENTRY_VOU_TYPE[0] ? 'active' : '' }}" href="{{ route('erp.account-transaction.journal-entry.index', ['vouType' => \App\Enum\Enum::JOURNAL_ENTRY_VOU_TYPE[0]]) }}">Bank Payment</a>
                        </li>
                        <li>
                            <a class="text-success sub-slide-item {{Request::get('vouType') == \App\Enum\Enum::JOURNAL_ENTRY_VOU_TYPE[1] ? 'active' : '' }}" href="{{ route('erp.account-transaction.journal-entry.index', ['vouType' => \App\Enum\Enum::JOURNAL_ENTRY_VOU_TYPE[1]]) }}">Bank Receipt</a>
                        </li>
                        <li>
                            <a class="text-success sub-slide-item {{Request::get('vouType') == \App\Enum\Enum::JOURNAL_ENTRY_VOU_TYPE[2] ? 'active' : '' }}" href="{{ route('erp.account-transaction.journal-entry.index', ['vouType' => \App\Enum\Enum::JOURNAL_ENTRY_VOU_TYPE[2]]) }}">Cash Payment</a>
                        </li>
                        <li>
                            <a class="text-success sub-slide-item {{Request::get('vouType') == \App\Enum\Enum::JOURNAL_ENTRY_VOU_TYPE[3] ? 'active' : '' }}" href="{{ route('erp.account-transaction.journal-entry.index', ['vouType' => \App\Enum\Enum::JOURNAL_ENTRY_VOU_TYPE[3]]) }}">Cash Receipt</a>
                        </li>
                        <li>
                            <a class="text-success sub-slide-item {{Request::get('vouType') == \App\Enum\Enum::JOURNAL_ENTRY_VOU_TYPE[4] ? 'active' : '' }}" href="{{ route('erp.account-transaction.journal-entry.index', ['vouType' => \App\Enum\Enum::JOURNAL_ENTRY_VOU_TYPE[4]]) }}">Contra</a>
                        </li>
                        <li>
                            <a class="text-success sub-slide-item {{Request::get('vouType') == \App\Enum\Enum::JOURNAL_ENTRY_VOU_TYPE[5] ? 'active' : '' }}" href="{{ route('erp.account-transaction.journal-entry.index', ['vouType' => \App\Enum\Enum::JOURNAL_ENTRY_VOU_TYPE[5]]) }}">Creadit Note</a>
                        </li>
                        <li>
                            <a class="text-success sub-slide-item {{Request::get('vouType') == \App\Enum\Enum::JOURNAL_ENTRY_VOU_TYPE[6] ? 'active' : '' }}" href="{{ route('erp.account-transaction.journal-entry.index', ['vouType' => \App\Enum\Enum::JOURNAL_ENTRY_VOU_TYPE[6]]) }}">Debit Note</a>
                        </li>
                        <li>
                            <a class="text-success sub-slide-item {{Request::get('vouType') == \App\Enum\Enum::JOURNAL_ENTRY_VOU_TYPE[7] ? 'active' : '' }}" href="{{ route('erp.account-transaction.journal-entry.index', ['vouType' => \App\Enum\Enum::JOURNAL_ENTRY_VOU_TYPE[7]]) }}">Journal</a>
                        </li>
                        
                    </ul>
                </li>
                <li class="sub-slide {{ checkMenuVisibilty('transaction_cn_dn_entry') }}">
                    <a class="sub-side-menu__item {{ request()->routeIs('erp.account-transaction.cn-dn-entry.*') ? 'active' : '' }}" data-bs-toggle="sub-slide" href="javascript:void(0)">
                        <span class="sub-side-menu__label text-success">CN/DN Entry</span>
                        <i class="sub-angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="sub-slide-menu">
                        <li class="{{ checkMenuVisibilty('transaction_cn_entry_wo_stock') }}">
                            <a class="text-success sub-slide-item {{request()->routeIs('erp.account-transaction.cn-dn-entry.cn-entry-with-out-stock.*') ? 'active' : '' }}" href="{{ route('erp.account-transaction.cn-dn-entry.cn-entry-with-out-stock.index') }}">CN Entry w/o Stock</a>
                        </li>
                        <li class="{{ checkMenuVisibilty('transaction_dn_entry_wo_stock') }}">
                            <a class="text-success sub-slide-item {{request()->routeIs('erp.account-transaction.cn-dn-entry.dn-entry-with-out-stock.*') ? 'active' : '' }}" href="{{ route('erp.account-transaction.cn-dn-entry.dn-entry-with-out-stock.index') }}">DN Entry w/o Stock</a>
                        </li>
                        <li class="{{ checkMenuVisibilty('transaction_cn_entry_with_stock') }}">
                            <a class="text-success sub-slide-item {{request()->routeIs('erp.account-transaction.cn-dn-entry.cn-entry-with-stock.*') ? 'active' : '' }}" href="{{ route('erp.account-transaction.cn-dn-entry.cn-entry-with-stock.index') }}">CN Entry with Stock</a>
                        </li>
                        <li class="{{ checkMenuVisibilty('transaction_dn_entry_with_stock') }}">
                            <a class="text-success sub-slide-item {{request()->routeIs('erp.account-transaction.cn-dn-entry.dn-entry-with-stock.*') ? 'active' : '' }}" href="{{ route('erp.account-transaction.cn-dn-entry.dn-entry-with-stock.index') }}">DN Entry with Stock</a>
                        </li>
                    </ul>
                </li>
                <li class="sub-slide {{ checkMenuVisibilty('transaction_purchase_entry') }}">
                    <a class="sub-side-menu__item {{ request()->routeIs('erp.account-transaction.purchase-entry.*') ? 'active' : '' }}" data-bs-toggle="sub-slide" href="javascript:void(0)">
                        <span class="sub-side-menu__label text-success">Purchase Entry</span>
                        <i class="sub-angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="sub-slide-menu">
                        <li class="{{ checkMenuVisibilty('transaction_purchase_invoice') }}">
                            <a class="text-success sub-slide-item {{Request::get('type') == \App\Enum\Enum::PURCHASE_INVOICE ? 'active' : '' }}" href="{{ route('erp.account-transaction.purchase-entry.index', ['type' => \App\Enum\Enum::PURCHASE_INVOICE]) }}">Purchase Invoice</a>
                        </li>
                        <li class="{{ checkMenuVisibilty('transaction_purchase_return') }}">
                            <a class="text-success sub-slide-item {{Request::get('type') == \App\Enum\Enum::PURCHASE_RETURN ? 'active' : '' }}" href="{{ route('erp.account-transaction.purchase-entry.index', ['type' => \App\Enum\Enum::PURCHASE_RETURN]) }}">Purchase Return</a>
                        </li>
                        <li class="{{ checkMenuVisibilty('transaction_check_from_purchase') }}">
                            <a class="text-success sub-slide-item {{Request::get('type') == \App\Enum\Enum::CHEQUE_FROM_PURCHASE ? 'active' : '' }}" href="javascrit:void(0)">Cheque from Purchase</a>
                        </li>
                    </ul>
                </li>
                <li class="sub-slide {{ checkMenuVisibilty('transaction_sale_entry') }}">
                    <a class="sub-side-menu__item {{ request()->routeIs('erp.account-transaction.sale-entry.*') ? 'active' : '' }}" data-bs-toggle="sub-slide" href="javascript:void(0)">
                        <span class="sub-side-menu__label text-success">Sale Entry</span>
                        <i class="sub-angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="sub-slide-menu">
                        <li class="{{ checkMenuVisibilty('transaction_sale_invoice') }}">
                            <a class="text-success sub-slide-item {{Request::get('type') == \App\Enum\Enum::SALES_INVOICE ? 'active' : '' }}" href="{{ route('erp.account-transaction.sale-entry.index', ['type' => \App\Enum\Enum::SALES_INVOICE]) }}">Sales Invoice</a>
                        </li>
                        <li class="{{ checkMenuVisibilty('transaction_sale_return') }}">
                            <a class="text-success sub-slide-item {{Request::get('type') == \App\Enum\Enum::SALES_RETURN ? 'active' : '' }}" href="{{ route('erp.account-transaction.sale-entry.index', ['type' => \App\Enum\Enum::SALES_RETURN]) }}">Sales Return</a>
                        </li>
                    </ul>
                </li>
                <li class="sub-slide {{ $jobwork_out == 1 ? '' : 'd-none'}}">
                    <a class="sub-side-menu__item {{!Request::get('module') && request()->routeIs('erp.account-transaction.jobwork-out.*') ? 'active' : '' }}" data-bs-toggle="sub-slide" href="javascript:void(0)">
                        <span class="sub-side-menu__label">Jobwork Out</span>
                        <i class="sub-angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="sub-slide-menu">
                        <li>
                            <a class="sub-slide-item {{Request::get('type') == \App\Enum\Enum::JOBWORK_OUT_ORDER && request()->routeIs('erp.account-transaction.jobwork-out.*') ? 'active' : '' }}" href="{{ route('erp.account-transaction.jobwork-out.index', ['type' => \App\Enum\Enum::JOBWORK_OUT_ORDER]) }}">Jobwork Order</a>
                        </li>
                        <li>
                            <a class="sub-slide-item {{Request::get('type') == \App\Enum\Enum::JOBWORK_OUT_ISSUE && request()->routeIs('erp.account-transaction.jobwork-out.*') ? 'active' : '' }}" href="{{ route('erp.account-transaction.jobwork-out.index', ['type' => 'issue']) }}">Jobwork Issue</a>
                        </li>
                        <li>
                            <a class="sub-slide-item {{Request::get('type') == \App\Enum\Enum::JOBWORK_OUT_RECEIPT && request()->routeIs('erp.account-transaction.jobwork-out.*') ? 'active' : '' }}" href="{{ route('erp.account-transaction.jobwork-out.index', ['type' => 'receipt']) }}">Jobwork Receipt</a>
                        </li>
                        <li>
                            <a class="sub-slide-item {{Request::get('type') == \App\Enum\Enum::JOBWORK_OUT_BILLING && request()->routeIs('erp.account-transaction.jobwork-out.*') ? 'active' : '' }}" href="{{ route('erp.account-transaction.jobwork-out.index', ['type' => 'billing']) }}">Jobwork Billing</a>
                        </li>
                    </ul>
                </li>
                <li class="sub-slide {{ $jobwork_in == 1 ? '' : 'd-none'}}">
                    <a class="sub-side-menu__item {{!Request::get('module') && request()->routeIs('erp.account-transaction.jobwork-in.*') ? 'active' : '' }}" data-bs-toggle="sub-slide" href="javascript:void(0)">
                        <span class="sub-side-menu__label">
                        Jobwork In</span>
                        <i class="sub-angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="sub-slide-menu">
                        <li>
                            <a class="sub-slide-item {{Request::get('type') == \App\Enum\Enum::JOBWORK_IN_ORDER && request()->routeIs('erp.account-transaction.jobwork-in.*') ? 'active' : '' }}" href="{{ route('erp.account-transaction.jobwork-in.index', ['type' => \App\Enum\Enum::JOBWORK_IN_ORDER]) }}">Jobwork Order</a>
                        </li>
                        <li>
                            <a class="sub-slide-item {{Request::get('type') == \App\Enum\Enum::JOBWORK_IN_RECEIPT && request()->routeIs('erp.account-transaction.jobwork-in.*') ? 'active' : '' }}" href="{{ route('erp.account-transaction.jobwork-in.index', ['type' => \App\Enum\Enum::JOBWORK_IN_RECEIPT]) }}">Jobwork Receipt</a>
                        </li>
                        <li>
                            <a class="sub-slide-item {{Request::get('type') == \App\Enum\Enum::JOBWORK_IN_PRODUCTION && request()->routeIs('erp.account-transaction.jobwork-in.*') ? 'active' : '' }}" href="{{ route('erp.account-transaction.jobwork-in.index', ['type' => \App\Enum\Enum::JOBWORK_IN_PRODUCTION]) }}">Jobwork Production</a>
                        </li>
                        <li>
                            <a class="sub-slide-item {{Request::get('type') == \App\Enum\Enum::JOBWORK_IN_ISSUE && request()->routeIs('erp.account-transaction.jobwork-in.*') ? 'active' : '' }}" href="{{ route('erp.account-transaction.jobwork-in.index', ['type' => \App\Enum\Enum::JOBWORK_IN_ISSUE]) }}">Jobwork Issue</a>
                        </li>
                        <li>
                            <a class="sub-slide-item {{Request::get('type') == \App\Enum\Enum::JOBWORK_IN_ISSUE_OTHER && request()->routeIs('erp.account-transaction.jobwork-in.*') ? 'active' : '' }}" href="{{ route('erp.account-transaction.jobwork-in.index', ['type' => \App\Enum\Enum::JOBWORK_IN_ISSUE_OTHER]) }}">Jobwork Issue (Other)</a>
                        </li>
                        <li>
                            <a class="sub-slide-item" href="#">Jobwork Auto Biling</a>
                        </li>
                        <li>
                            <a class="sub-slide-item {{Request::get('type') == \App\Enum\Enum::JOBWORK_IN_BILLING && request()->routeIs('erp.account-transaction.jobwork-in.*') ? 'active' : '' }}" href="{{ route('erp.account-transaction.jobwork-in.index', ['type' => \App\Enum\Enum::JOBWORK_IN_BILLING]) }}">Jobwork Biling</a>
                        </li>
                    </ul>
                </li>
                <li class="sub-slide d-none">
                    <a class="sub-side-menu__item {{request()->routeIs('erp.account-transaction.forex-adjustment.*') ? 'active' : '' }}" data-bs-toggle="sub-slide" href="{{ route('erp.account-transaction.forex-adjustment.index') }}">
                        <span class="sub-side-menu__label">Forex Adjustment</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Consulatant -->
        <li class="slide d-none">
            <a class="side-menu__item {{request()->routeIs('erp.consultant.*') ? 'active' : '' }}" data-bs-toggle="slide" href="javascript:void(0)">
                <span class="side-menu__label">Consultant</span>
                <i class="angle fe fe-chevron-right"></i>
            </a>
            <ul class="slide-menu">
                <li class="side-menu-label1"><a href="javascript:void(0)">Consultant</a></li>
                <li><a href="{{ route('erp.consultant.provisional-invoice.index') }}" class="slide-item {{request()->routeIs('erp.consultant.provisional-invoice.*') ? 'active' : '' }}">Provisional Invoice</a></li>
                <li><a href="{{ route('erp.consultant.final-invoice.index') }}" class="slide-item {{request()->routeIs('erp.consultant.final-invoice.*') ? 'active' : '' }}"> (F)Final Invoice</a></li>
                <li><a href="{{ route('erp.consultant.bill-from-prov.filter') }}" class="slide-item {{request()->routeIs('erp.consultant.bill-from-prov.*') ? 'active' : '' }}">(F)Bill from Prov. Vou </a></li>

                {{-- Changes made by khimaji --}}
                <li><a href="{{ route('erp.consultant.direct-invoice.index') }}" class="slide-item {{request()->routeIs('erp.consultant.direct-invoice.*') ? 'active' : '' }}">Direct Invoice</a></li>
                <li><a href="{{ route('erp.consultant.bank-receipt.index') }}" class="slide-item {{request()->routeIs('erp.consultant.bank-receipt.*') ? 'active' : '' }}">Bank Receipt</a></li>
                <li><a href="{{ route('erp.consultant.cash-receipt.index') }}" class="slide-item {{request()->routeIs('erp.consultant.cash-receipt.*') ? 'active' : '' }}">Cash Receipt</a></li>

                <li><a href="{{ route('erp.consultant.provisional-outstanding.index') }}" class="slide-item {{request()->routeIs('erp.consultant.provisional-outstanding.*') ? 'active' : '' }}">(F)Provisional Outstanding</a></li>
                <li><a href="{{ route('erp.consultant.pending-invoice.index') }}" class="slide-item {{request()->routeIs('erp.consultant.pending-invoice.*') ? 'active' : '' }}">(F)Pending Invoice</a></li>
            </ul>
        </li>


        {{-- GST START --}}
        <li class="slide">
            <a class="side-menu__item {{ request()->routeIs('erp.gst.*') ? 'active' : '' }}" data-bs-toggle="slide" href="javascript:void(0)">
                <span class="side-menu__label">GST</span>
                <i class="angle fe fe-chevron-right"></i>
            </a>
            <ul class="slide-menu {{request()->routeIs('erp.gst.*') ? 'open' : ''}}">
                <li class="sub-slide {{ checkMenuVisibilty('gst_gst_master') }}">
                    <a class="sub-side-menu__item {{ request()->routeIs('erp.gst.slab.*') || request()->routeIs('erp.gst.gst-commodity.*') ? 'active' : '' }}" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label text-success">GST Master</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li class="{{ checkMenuVisibilty('gst_gst_slab') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.gst.slab.*') ? 'active' : '' }}" href="{{ route('erp.gst.slab.index') }}">GST Slab</a></li>
                        <li class="{{ checkMenuVisibilty('gst_gst_commodity') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.gst.gst-commodity.*') ? 'active' : '' }}" href="{{route('erp.gst.gst-commodity.index') }}">GST Commodity</a></li>
                    </ul>
                </li>
                <li class="sub-slide {{ checkMenuVisibilty('gst_gst_entry') }} {{ request()->routeIs('erp.gst.gst-entry.*') ? 'is-expanded' : '' }}">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)">
                        <span class="sub-side-menu__label text-success">GST Entry</span>
                        <i class="sub-angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="sub-slide-menu">
                        <li class="{{ checkMenuVisibilty('gst_bank_payment') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.gst.gst-entry.bank-payment.*') ? 'active' : '' }}" href="{{route('erp.gst.gst-entry.bank-payment.index') }}">Bank Payment</a></li>
                        <li class="{{ checkMenuVisibilty('gst_cash_payment') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.gst.gst-entry.cash-payment.*') ? 'active' : '' }}" href="{{route('erp.gst.gst-entry.cash-payment.index') }}">Cash Payment</a></li>
                        <li class="{{ checkMenuVisibilty('gst_utilization_entry') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.gst.gst-entry.utilization-entry.*') ? 'active' : '' }}" href="{{route('erp.gst.gst-entry.utilization-entry.index') }}">Utilization Entry</a></li>
                        <li class="{{ checkMenuVisibilty('gst_journal_entry') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.gst.gst-entry.journal-entry.*') ? 'active' : '' }}" href="{{route('erp.gst.gst-entry.journal-entry.index') }}">Journal Entry</a></li>
                    </ul>
                </li>
                
                <li class="sub-slide {{ checkMenuVisibilty('gst_rcm_voucher') }} {{ request()->routeIs('erp.gst.rcm.*') ? 'is-expanded' : ''}}">
                    <a class="sub-side-menu__item {{ request()->routeIs('erp.gst.rcm.*')}}" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label text-success">RCM Voucher</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li><a class="text-success sub-slide-item {{request()->routeIs('erp.gst.rcm.bank-payment.*') ? 'active' : '' }}" href="{{ route('erp.gst.rcm.bank-payment.index') }}">RCM Bank Payment</a></li>
                        <li><a class="text-success sub-slide-item {{request()->routeIs('erp.gst.rcm.cash-payment.*') ? 'active' : '' }}" href="{{ route('erp.gst.rcm.cash-payment.index') }}">RCM Cash Payment</a></li>
                    </ul>
                </li>
                <li class="{{ checkMenuVisibilty('gst_gst_expense') }}">
                    <a class="slide-item {{request()->routeIs('erp.gst.gst-expense.*') ? 'active' : '' }}" data-bs-toggle="slide" href="{{ route('erp.gst.gst-expense.index') }}">
                        <span class="side-menu__label text-success">GST Expense</span>
                    </a>
                </li>
                <li class="{{ checkMenuVisibilty('gst_gst_income') }}">
                    <a class="slide-item {{request()->routeIs('erp.gst.gst-income.*') ? 'active' : '' }}" data-bs-toggle="slide" href="{{ route('erp.gst.gst-income.index') }}">
                        <span class="side-menu__label text-success">GST Income</span>
                    </a>
                </li>
                
                <li class="sub-slide {{ checkMenuVisibilty('gst_gst_report') }} {{ request()->routeIs('erp.gst.gst-report.*') ? 'is-expanded' : ''}}">
                    <a class="sub-side-menu__item {{ request()->routeIs('erp.gst.gst-report.*') ? 'active' : ''}}" data-bs-toggle="sub-slide" href="javascript:void(0)">
                        <span class="sub-side-menu__label text-success">(FR) GST Report</span>
                        <i class="sub-angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="sub-slide-menu">
                      <li class="{{ checkMenuVisibilty('gst_summary_sectionwise') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.gst.gst-report.summary-section-wise.*') ? 'active' : '' }}"
                              href="{{ route('erp.gst.gst-report.summary-section-wise.index') }}">(FR) Summary (Sectionwise)</a></li>
                      <li class="{{ checkMenuVisibilty('gst_percentagewise') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.gst.gst-report.percentage-wise.*') ? 'active' : '' }}"
                              href="{{ route('erp.gst.gst-report.percentage-wise.index') }}">(FR) Percentage wise</a></li>
                      <li class="{{ checkMenuVisibilty('gst_accountwise') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.gst.gst-report.account-wise.*') ? 'active' : '' }}"
                              href="{{ route('erp.gst.gst-report.account-wise.index') }}">(FR) Account wise</a></li>
                      <li class="{{ checkMenuVisibilty('gst_hsn_wise_summary') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.gst.gst-report.hsn-wise-summary.*') ? 'active' : '' }}"
                              href="{{ route('erp.gst.gst-report.hsn-wise-summary.index') }}">(FR) HSN wise summary</a></li>
                      <li class="{{ checkMenuVisibilty('gst_registration_typeWise') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.gst.gst-report.registration-type-wise.*') ? 'active' : '' }}"
                              href="{{ route('erp.gst.gst-report.registration-type-wise.index') }}">(FR) Registration Type wise</a></li>
                      <li class="{{ checkMenuVisibilty('gst_expense_audit') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.gst.gst-report.expense-audit.*') ? 'active' : '' }}"
                              href="{{ route('erp.gst.gst-report.expense-audit.index') }}">(FR) Expense Audit</a></li>
                    </ul>
                </li>
                <li class="sub-slide {{ checkMenuVisibilty('gst_rcm_report') }} {{ request()->routeIs('erp.gst.rcm-report.*') ? 'is-expanded' : ''}}">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)">
                        <span class="sub-side-menu__label text-success">RCM Report</span>
                        <i class="sub-angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="sub-slide-menu">
                        <li class="{{ checkMenuVisibilty('gst_datewise_summary') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.gst.rcm-report.date-wise.*') ? 'active' : '' }}" href="{{ route('erp.gst.rcm-report.date-wise.index') }}">Date Wise Summary</a></li>
                        <li class="{{ checkMenuVisibilty('gst_ac_wise_summary') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.gst.rcm-report.account-wise.*') ? 'active' : '' }}" href="{{ route('erp.gst.rcm-report.account-wise.index') }}">A/C Wise Summary</a></li>
                        <li class="{{ checkMenuVisibilty('gst_notified_rcm') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.gst.rcm-report.notified-rcm.*') ? 'active' : '' }}" href="{{ route('erp.gst.rcm-report.notified-rcm.index') }}">(FR) Notified RCM</a></li>
                    </ul>
                </li>

                <li class="sub-slide {{ checkMenuVisibilty('gst_gst_register') }} {{ request()->routeIs('erp.gst.gst-register.*') ? 'is-expanded' : ''}}">
                    <a class="sub-side-menu__item {{request()->routeIs('erp.gst.gst-register.*') ? 'active' : '' }}" data-bs-toggle="sub-slide" href="javascript:void(0)">
                        <span class="sub-side-menu__label text-success">(FR) GST Register</span>
                        <i class="sub-angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="sub-slide-menu">
                        <li class="{{ checkMenuVisibilty('gst_tax_liability_register') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.gst.gst-register.tax-liability-register.*') ? 'active' : '' }}" href="{{ route('erp.gst.gst-register.tax-liability-register.index') }}">(FR) Tax Liability Register</a></li>
                        <li class="{{ checkMenuVisibilty('gst_cash_ledger') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.gst.gst-register.cash-ledger.*') ? 'active' : '' }}" href="{{ route('erp.gst.gst-register.cash-ledger.index') }}">(FR) Cash Ledger</a></li>
                        <li class="{{ checkMenuVisibilty('gst_itc_register') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.gst.gst-register.itc-register.*') ? 'active' : '' }}" href="{{ route('erp.gst.gst-register.itc-register.index') }}">(FR) ITC Register</a></li>
                        <li class="{{ checkMenuVisibilty('gst_gst_outward_register') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.gst.gst-register.gst-outward-register.*') ? 'active' : '' }}" href="{{ route('erp.gst.gst-register.gst-outward-register.index') }}">(FR) GST Outward Register</a></li>
                        <li class="{{ checkMenuVisibilty('gst_gst_inward_register') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.gst.gst-register.gst-inward-register.*') ? 'active' : '' }}" href="{{ route('erp.gst.gst-register.gst-inward-register.index') }}">(FR) GST Inward Register</a></li>
                        <li class="{{ checkMenuVisibilty('gst_gst_expense_register') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.gst.gst-register.gst-expense-register.*') ? 'active' : '' }}" href="{{ route('erp.gst.gst-register.gst-expense-register.index') }}">(FR) GST Expense Register</a></li>                        
                        <li class="{{ checkMenuVisibilty('gst_gst_income_register') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.gst.gst-register.gst-income-register.*') ? 'active' : '' }}" href="{{ route('erp.gst.gst-register.gst-income-register.index') }}">(FR) GST Income Register</a></li>
                    </ul>
                </li>
                <li class="{{ checkMenuVisibilty('gst_gst_payment') }}">
                    <a class="slide-item {{request()->routeIs('erp.gst.gst-pymt-assist.*') ? 'active' : '' }}" data-bs-toggle="slide" href="{{route('erp.gst.gst-pymt-assist.index')}}">
                        <span class="side-menu__label text-success">(FR) GST Pymt. Assist</span>
                    </a>
                </li>
                <li class="{{ checkMenuVisibilty('gst_gstr_2b_match') }}">
                    <a class="slide-item {{ request()->routeIs('erp.gst.gstr-2-b-match.*') ? 'active' : ''}}" data-bs-toggle="slide" href="{{ route('erp.gst.gstr-2-b-match.index') }}">
                        <span class="side-menu__label text-success">(FR) GSTR 2B Match</span>
                    </a>
                </li>
                <li class="sub-slide {{ checkMenuVisibilty('gst_gst_return') }} {{request()->routeIs('erp.gst.gstr-return.*') ? 'is-expanded' : ''}}">
                    <a class="sub-side-menu__item {{request()->routeIs('erp.gst.gstr-return.*') ? 'active' : ''}}" data-bs-toggle="sub-slide" href="javascript:void(0)">
                        <span class="sub-side-menu__label text-success">(FR) GST Return</span>
                        <i class="sub-angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="sub-slide-menu">
                        <li class="{{ checkMenuVisibilty('gst_gstr3b') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.gst.gstr-return.gstr-3-b-as-per-books.*') ? 'active' : ''}}" href="{{route('erp.gst.gstr-return.gstr-3-b-as-per-books.index')}}">(FR) GSTR 3B (as per books)</a></li>
                        <li class="{{ checkMenuVisibilty('gst_gstr3b_as_per_gstr_2b') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.gst.gstr-return.gstr-3-b-as-per-gstr-2-b.*') ? 'active' : ''}}" href="{{route('erp.gst.gstr-return.gstr-3-b-as-per-gstr-2-b.index')}}">(FR) GSTR 3B (as per GSTR 2B)</a></li>
                        <li class="{{ checkMenuVisibilty('gst_gstr1') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.gst.gstr-return.gstr-1.*') ? 'active' : ''}}" href="{{route('erp.gst.gstr-return.gstr-1.index')}}">(FR) GSTR 1</a></li>
                        <li class="{{ checkMenuVisibilty('gst_gstr1_hsn_summary') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.gst.gstr-return.gstr-1-hsn-summary.*') ? 'active' : ''}}" href="{{route('erp.gst.gstr-return.gstr-1-hsn-summary.index')}}">(FR) GSTR 1 HSN Summary</a></li>
                        <li class="{{ checkMenuVisibilty('gst_gstr2') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.gst.gstr-return.gstr-2.*') ? 'active' : ''}}" href="{{route('erp.gst.gstr-return.gstr-2.index')}}">(FR) GSTR 2</a></li>
                        <li class="{{ checkMenuVisibilty('gst_gstr2_hsn_summary') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.gst.gstr-return.gstr-2-hsn-summary.*') ? 'active' : ''}}" href="{{route('erp.gst.gstr-return.gstr-2-hsn-summary.index')}}">(FR) GSTR 2 HSN Summary</a></li>                        
                        <li class="{{ checkMenuVisibilty('gst_gstr9') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.gst.gstr-return.gstr-9.*') ? 'active' : ''}}" href="{{route('erp.gst.gstr-return.gstr-9.index')}}">(FR) GSTR-9</a></li>
                        <li><a class="text-success sub-slide-item {{request()->routeIs('erp.gst.gstr-return.itc-04.*') ? 'active' : ''}}" href="{{route('erp.gst.gstr-return.itc-04.index')}}">(FR) ITC-04</a></li>
                    </ul>
                </li>
                <li class="sub-slide {{ checkMenuVisibilty('gst_gstr_integrity') }}">
                    <a class="sub-side-menu__item {{request()->routeIs('erp.gst.gstr-integrity.*') ? 'active' : '' }}" data-bs-toggle="sub-slide" href="javascript:void(0)">
                        <span class="sub-side-menu__label text-success">(FR) GSTR Integrity</span>
                        <i class="sub-angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="sub-slide-menu">
                        <li class="{{ checkMenuVisibilty('gst_tax_liability') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.gst.gstr-integrity.tax-liability.*') ? 'active' : '' }}" href="{{ route('erp.gst.gstr-integrity.tax-liability.index') }}">(FR) Tax Liability</a></li>
                        <li class="{{ checkMenuVisibilty('gst_itc') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.gst.gstr-integrity.itc.*') ? 'active' : '' }}" href="{{ route('erp.gst.gstr-integrity.itc.index') }}">(FR) ITC</a></li>
                    </ul>
                </li>
                <li class="sub-slide {{ checkMenuVisibilty('gst_gst_audit') }}">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)">
                        <span class="sub-side-menu__label text-success">(FR) GST Audit</span>
                        <i class="sub-angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="sub-slide-menu">
                        <li class="{{ checkMenuVisibilty('gst_gstr1_b2b_summary') }}"><a class="text-success sub-slide-item" href="{{route('erp.gst.gst-audit.gstr-1-b2b-summary.index')}}">(FR) GSTR 1 B2B Summary</a></li>
                        <li class="{{ checkMenuVisibilty('gst_gstr2_b2b_summary') }}"><a class="text-success sub-slide-item" href="{{route('erp.gst.gst-audit.gstr-2-b2b-summary.index')}}">(FR) GSTR 2 B2B Summary</a></li>
                        <li class="{{ checkMenuVisibilty('gst_gstr2a_match') }}"><a class="text-success sub-slide-item" href="{{route('erp.gst.gst-audit.gstr-2a-match.index')}}">(FR) GSTR 2A Match</a></li>
                        <li class="{{ checkMenuVisibilty('gst_itc_as_per_gstr_2b') }}"><a class="text-success sub-slide-item" href="{{route('erp.gst.gst-audit.itc-As-per-gstr-2b.index')}}">(FR) ITC As per GSTR 2B</a></li>
                    </ul>
                </li>
                
                <li class="{{ checkMenuVisibilty('gst_e_way_bill') }}">
                    <a class="slide-item {{ request()->routeIs('erp.gst.e-way-bill.*') ? 'active' : '' }}" data-bs-toggle="slide" href="{{route('erp.gst.e-way-bill.index')}}">
                        <span class="side-menu__label text-success">(FR) E-Way Bill</span>
                    </a>
                </li>
            </ul>
        <li>
        {{-- GST END --}}

        <!-- Report Menu -->
        <li class="slide">
            <a class="side-menu__item {{request()->routeIs('erp.report.*') ? 'active' : '' }}" data-bs-toggle="slide" href="javascript:void(0)">
                <span class="side-menu__label">Report</span>
                <i class="angle fe fe-chevron-right"></i>
            </a>
            <ul class="slide-menu">
                <li class="sub-slide {{ checkMenuVisibilty('report_account_book') }}">
                    <a class="sub-side-menu__item {{request()->routeIs('erp.report.account-book.*') ? 'active' : '' }}" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label text-success">(FR) Account Books</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li class="{{ checkMenuVisibilty('report_ledger') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.report.account-book.ledger.*') ? 'active' : '' }}" href="{{ route('erp.report.account-book.ledger.index') }}">Ledger</a></li>
                        <li class="{{ checkMenuVisibilty('report_voucher_list') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.report.account-book.voucher-list.*') ? 'active' : '' }}" href="{{ route('erp.report.account-book.voucher-list.index') }}">(FR) Voucher List </a></li>
                        <li class="{{ checkMenuVisibilty('report_day_book') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.report.account-book.day-book.*') ? 'active' : '' }}" href="{{ route('erp.report.account-book.day-book.index') }}">Day Book</a></li>
                        <li class="{{ checkMenuVisibilty('report_cash_book') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.report.account-book.cash-book.*') ? 'active' : '' }}" href="{{ route('erp.report.account-book.cash-book.index') }}">Cash Book</a></li>
                        <li class="{{ checkMenuVisibilty('report_bank_book') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.report.account-book.bank-book.*') ? 'active' : '' }}" href="{{ route('erp.report.account-book.bank-book.index') }}">Bank Book </a></li>
                    </ul>
                </li>
                <li class="sub-slide {{ checkMenuVisibilty('report_outstanding') }}">
                    <a class="sub-side-menu__item {{request()->routeIs('erp.report.outstanding.*') ? 'active' : '' }}" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label text-success">(FR) Outstanding</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li class="{{ checkMenuVisibilty('report_receivable') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.report.outstanding.receivable.*') ? 'active' : '' }}" href="{{ route('erp.report.outstanding.receivable.index') }}">(FR) Receivable </a></li>
                        <li class="{{ checkMenuVisibilty('report_payable') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.report.outstanding.payable.*') ? 'active' : '' }}" href="{{ route('erp.report.outstanding.payable.index') }}">(FR) Payable</a></li>
                        <li class="d-none"><a class="sub-slide-item {{request()->routeIs('erp.report.outstanding.billwise-receivable.*') ? 'active' : '' }}" href="{{ route('erp.report.outstanding.billwise-receivable.index') }}">Billwise Receivable</a></li>
                        <li class="d-none"><a class="sub-slide-item {{request()->routeIs('erp.report.outstanding.billwise-payable.*') ? 'active' : '' }}" href="{{ route('erp.report.outstanding.billwise-payable.index') }}">Biliwise Payable</a></li>
                    </ul>
                </li>
                
                <li class="sub-slide {{ checkMenuVisibilty('report_register') }}">
                    <a class="sub-side-menu__item {{request()->routeIs('erp.report.register.*') ? 'active' : '' }}" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label text-success">(FR) Register</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li class="{{ checkMenuVisibilty('report_sale_register') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.report.register.sales-register.*') ? 'active' : '' }}" href="{{ route('erp.report.register.sales-register.index') }}">(FR) Sales Register </a></li>
                        <li class="{{ checkMenuVisibilty('report_purchase_register') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.report.register.parchase-register.*') ? 'active' : '' }}" href="{{ route('erp.report.register.parchase-register.index') }}">(FR) Purchase Register </a></li>
                        <li class="{{ checkMenuVisibilty('report_credit_note_with_stock_register') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.report.register.credit-note-with-stock-register.*') ? 'active' : '' }}" href="{{ route('erp.report.register.credit-note-with-stock-register.index') }}">(FR) Credit Note With Stock Register </a></li>
                        <li class="{{ checkMenuVisibilty('report_debit_note_with_stock_register') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.report.register.debit-note-with-stock-register.*') ? 'active' : '' }}" href="{{ route('erp.report.register.debit-note-with-stock-register.index') }}">(FR) Debit Note With Stock Register </a></li>
                        <li class="{{ checkMenuVisibilty('report_credit_note_wo_stock_register') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.report.register.credit-note-w_o-stock-register.*') ? 'active' : '' }}" href="{{ route('erp.report.register.credit-note-w_o-stock-register.index') }}">(FR) Credit Note W/O Stock Register </a></li>
                        <li class="{{ checkMenuVisibilty('report_debit_note_wo_stock_register') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.report.register.debit-note-w_o-stock-register.*') ? 'active' : '' }}" href="{{ route('erp.report.register.debit-note-w_o-stock-register.index') }}">(FR) Debit Note W/O Stock Register </a></li>
                    </ul>
                </li>
                
                <li class="sub-slide {{ checkMenuVisibilty('report_balance_sheet') }}">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label text-success">(FR) Balance Sheet</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li class="sub-slide2 {{ checkMenuVisibilty('report_trial_balance') }}">
                            <a class="sub-side-menu__item2" href="javascript:void(0)"
                                data-bs-toggle="sub-slide2"><span
                                    class="sub-side-menu__label2 text-success">(FR) Trial Balance</span><i
                                    class="sub-angle2 fe fe-chevron-right"></i></a>
                            <ul class="sub-slide-menu2">
                                <li class="{{ checkMenuVisibilty('report_sub_trial_balance') }}"><a href="{{ route('erp.report.balance-sheet.trial-balance.trial-balance') }}" class="text-success sub-slide-item2 {{request()->routeIs('erp.report.balance-sheet.trial-balance.trial-balance.*') ? 'active' : '' }}">(FR) Trial Balance </a></li>
                                <li class="{{ checkMenuVisibilty('report_opening_balance') }}"><a href="{{ route('erp.report.balance-sheet.trial-balance.opening-balance') }}" class="text-success sub-slide-item2 {{request()->routeIs('erp.report.balance-sheet.trial-balance.opening-balance.*') ? 'active' : '' }}">(FR) Opening Balance </a></li>
                            </ul>
                        </li>
                        <li class="{{ checkMenuVisibilty('report_trending_account') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.report.balance-sheet.trading-account.*') ? 'active' : '' }}" href="{{ route('erp.report.balance-sheet.trading-account') }}">(FR) Trading Account </a></li>
                        <li class="{{ checkMenuVisibilty('report_pl_statement') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.report.balance-sheet.pl-statement.*') ? 'active' : '' }}" href="{{ route('erp.report.balance-sheet.pl-statement') }}">(FR) P&L Statement </a></li>
                        <li class="{{ checkMenuVisibilty('report_balance_sheet') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.report.balance-sheet.balance-sheet.*') ? 'active' : '' }}" href="{{ route('erp.report.balance-sheet.balance-sheet') }}">(FR) Balance Sheet </a></li>
                        <li class="{{ checkMenuVisibilty('report_trending_pl') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.report.balance-sheet.trending-pl.*') ? 'active' : '' }}" href="{{ route('erp.report.balance-sheet.trending-pl') }}">(FR) Trading + P & L </a></li>
                    </ul>
                </li>

                <li class="sub-slide {{ checkMenuVisibilty('report_analysis_report') }}">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label text-success">(FR) Analysis Report</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li class="{{ checkMenuVisibilty('report_daily_status') }}"><a class="sub-slide-item text-success {{request()->routeIs('erp.report.analysis-report.daily-status.*') ? 'active' : '' }}" href="{{ route('erp.report.analysis-report.daily-status') }}">(FR) Daily Status </a></li>
                        <li class="{{ checkMenuVisibilty('report_performance_report') }}"><a class="sub-slide-item text-success {{request()->routeIs('erp.report.analysis-report.performance-report.*') ? 'active' : '' }}" href="{{ route('erp.report.analysis-report.performance-report') }}">(FR) Performance Report </a></li>
                        <li class="{{ checkMenuVisibilty('report_sale_purchase_report') }}"><a class="sub-slide-item text-success {{request()->routeIs('erp.report.analysis-report.sales-purchase-report.*') ? 'active' : '' }}" href="{{ route('erp.report.analysis-report.sales-purchase-report') }}">(FR) Sale/Purchase Report </a></li>
                        <li class="{{ checkMenuVisibilty('report_partywise_report') }}"><a class="sub-slide-item text-success {{request()->routeIs('erp.report.analysis-report.partywise-report.*') ? 'active' : '' }}" href="{{ route('erp.report.analysis-report.partywise-report') }}">(FR) Partywise Report </a></li>
                        <li class="{{ checkMenuVisibilty('report_account_analysis') }}"><a class="sub-slide-item text-success {{request()->routeIs('erp.report.analysis-report.account-analysis.*') ? 'active' : '' }}" href="{{ route('erp.report.analysis-report.account-analysis') }}">(FR) Account Analysis </a></li>
                        <li class="{{ checkMenuVisibilty('report_fund_flow') }}"><a class="sub-slide-item text-success {{request()->routeIs('erp.report.analysis-report.fund-flow.*') ? 'active' : '' }}" href="{{ route('erp.report.analysis-report.fund-flow') }}">(FR) Fund Flow </a></li>
                        <li class="{{ checkMenuVisibilty('report_cash_flow') }}"><a class="sub-slide-item text-success {{request()->routeIs('erp.report.analysis-report.cash-flow.*') ? 'active' : '' }}" href="{{ route('erp.report.analysis-report.cash-flow') }}">(FR) Cash Flow </a></li>
                    </ul>
                </li>
                <li class="sub-slide d-none">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label">Multi Currency</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) A/C. NameWise Report </a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) A/C. Billwise Detail Report </a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Multi Currency Receivable Report </a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Multi Currency Payable Report </a></li>
                    </ul>
                </li>
                <li class="sub-slide {{ checkMenuVisibilty('report_stock_report') }}">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label text-success">(FR) Stock Report</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li class="{{ checkMenuVisibilty('report_product_ledger') }}"><a class="sub-slide-item text-success {{request()->routeIs('erp.report.stock-report.product-ledger.*') ? 'active' : '' }}" href="{{ route('erp.report.stock-report.product-ledger.index') }}">Product Ledger</a></li>
                        <li class="{{ checkMenuVisibilty('report_stock_partywise_report') }}"><a class="sub-slide-item text-success {{request()->routeIs('erp.report.stock-report.partywise-report.*') ? 'active' : '' }}" href="{{ route('erp.report.stock-report.partywise-report.index') }}">Partywise Report</a></li>
                    </ul>
                </li>
                <li class="sub-slide d-none">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label">Jobwork Out</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Stock Status Report (Wide) </a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Job Work Out Stock Statement </a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Job Work Out Order Report </a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Job Work Out Bill Register </a></li>
                    </ul>
                </li>
                <li class="sub-slide d-none">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label">Jobwork In</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Stock Status Report (Wide) </a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Job Work In Pending Report </a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Job Work In Stock Statement </a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Job Work In Order Report </a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Job Work In Bill Reg. (Issue Details) </a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Job Work In Bill Register </a></li>
                    </ul>
                </li>
                <li class="sub-slide d-none">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label">Cost Center</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Cost Center Wise Summary </a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Cost Category Wise Summary </a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Category Center Summary </a></li>
                    </ul>
                </li>
                

                <li class="sub-slide {{ checkMenuVisibilty('report_other_reports') }}">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label text-success">(FR) Other Reports</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li class="{{ checkMenuVisibilty('report_intrest_report') }}"><a class="sub-slide-item text-success {{request()->routeIs('erp.report.other-report.interest-report.*') ? 'active' : '' }}" href="{{ route('erp.report.other-report.interest-report') }}">(FR) Interest Report </a></li>
                        <li class="{{ checkMenuVisibilty('report_sms_report') }}"><a class="sub-slide-item text-success {{request()->routeIs('erp.report.other-report.sms-report.*') ? 'active' : '' }}" href="{{ route('erp.report.other-report.sms-report') }}">(FR) SMS Report </a></li>
                        <li class="sub-slide2 {{ checkMenuVisibilty('report_email_report') }}">
                            <a class="sub-side-menu__item2" href="javascript:void(0)"
                                data-bs-toggle="sub-slide2"><span
                                    class="sub-side-menu__label2 text-success">(FR) E-Mail Report</span><i
                                    class="sub-angle2 fe fe-chevron-right"></i></a>
                            <ul class="sub-slide-menu2">
                                <li class="{{ checkMenuVisibilty('report_profile_email') }}"><a href="{{ route('erp.report.other-report.email-report.profile-email') }}" class="text-danger sub-slide-item2 {{request()->routeIs('erp.report.other-report.email-report.profile-email.*') ? 'active' : '' }}">(FR) Profile E-Mail </a></li>
                                <li class="{{ checkMenuVisibilty('report_other_email') }}"><a href="{{ route('erp.report.other-report.email-report.other-email') }}" class="text-danger sub-slide-item2 {{request()->routeIs('erp.report.other-report.email-report.other-email.*') ? 'active' : '' }}">(FR) Other E-Mail </a></li>
                            </ul>
                        </li>
                        <li class="{{ checkMenuVisibilty('report_template_list') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.report.other-report.template-list.*') ? 'active' : '' }}" href="{{ route('erp.report.other-report.template-list') }}">(FR) Template List </a></li>
                        <li class="{{ checkMenuVisibilty('report_missing_vou_no_report') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.report.other-report.missing-voucher-number.*') ? 'active' : '' }}" href="{{ route('erp.report.other-report.missing-voucher-number') }}">(FR) Missing Vou No Report </a></li>
                        <li class="{{ checkMenuVisibilty('report_cancel_voucher_report') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.report.other-report.cancel-voucher-report.*') ? 'active' : '' }}" href="{{ route('erp.report.other-report.cancel-voucher-report') }}">(FR) Cancel Voucher Report </a></li>
                    </ul>
                </li>
            </ul>
        <li>

        <!-- Utility -->
        <li class="slide {{ request()->routeIs('erp.utility.*') ? 'is-expanded' : '' }}"> 
            <a class="side-menu__item {{ request()->routeIs('erp.utility.*') ? 'active' : '' }}" data-bs-toggle="slide" href="javascript:void(0)">
                <span class="side-menu__label">Utility</span>
                <i class="angle fe fe-chevron-right"></i>
            </a>
            <ul class="slide-menu {{request()->routeIs('erp.utility.*') ? 'open' : ''}}">
                <li class="side-menu-label1">
                    <a href="javascript:void(0)">Utility</a>
                </li>
                <li class="sub-slide {{ checkMenuVisibilty('utility_system_utility') }}">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label text-danger">System Utility</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li class="{{ checkMenuVisibilty('utility_backup') }}"><a class="sub-slide-item text-success {{request()->routeIs('erp.utility.system-utility.back-up.*') ? 'active' : '' }}" href="{{ route('erp.utility.system-utility.back-up') }}">(FR) Backup </a></li>
                        <li><a class="sub-slide-item text-danger" href="javascript:void(0)">(TD) Indexing </a></li>
                        <li><a class="sub-slide-item text-danger" href="javascript:void(0)">(TD) Reposting </a></li>
                    </ul>
                </li>

                <li class="{{ checkMenuVisibilty('utility_voucher_import') }}">
                    <a class="sub-slide-item text-danger" href="#">(TD) Voucher Import</a>
                </li>

                <li class="sub-slide {{ checkMenuVisibilty('utility_data_freeze') }}">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label text-success">(FR) Data Freeze</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li class="{{ checkMenuVisibilty('utility_sub_data_freeze') }}"><a class="sub-slide-item text-success {{request()->routeIs('erp.utility.data-freeze.data-freeze.*') ? 'active' : '' }}" href="{{ route('erp.utility.data-freeze.data-freeze') }}">(FR) Data Freeze </a></li>
                        <li class="{{ checkMenuVisibilty('utility_data_unfreeze') }}"><a class="sub-slide-item text-success {{request()->routeIs('erp.utility.data-freeze.data-unfreeze.*') ? 'active' : '' }}" href="{{ route('erp.utility.data-freeze.data-unfreeze') }}">(FR) Data Unfreeze </a></li>
                        <li class="{{ checkMenuVisibilty('utility_gst_data_freeze') }}"><a class="sub-slide-item text-success {{request()->routeIs('erp.utility.data-freeze.gst-data-freeze.*') ? 'active' : '' }}" href="{{ route('erp.utility.data-freeze.gst-data-freeze') }}">(FR) GST Data Freeze </a></li>
                        <li class="{{ checkMenuVisibilty('utility_gst_data_unfreeze') }}"><a class="sub-slide-item text-success {{request()->routeIs('erp.utility.data-freeze.gst-data-unfreeze.*') ? 'active' : '' }}" href="{{ route('erp.utility.data-freeze.gst-data-unfreeze') }}">(FR) GST Data Unfreeze </a></li>
                    </ul>
                </li>
                <li class="sub-slide {{ checkMenuVisibilty('utility_advance_utility') }}">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label text-success">(FR) Advance Utility</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li class="{{ checkMenuVisibilty('utility_account_merge') }}"><a class="sub-slide-item text-success {{request()->routeIs('erp.utility.advance-utility.account-merge.*') ? 'active' : '' }}" href="{{ route('erp.utility.advance-utility.account-merge') }}">(FR) Account Merge </a></li>
                        <li class="{{ checkMenuVisibilty('utility_product_merge') }}"><a class="sub-slide-item text-success {{request()->routeIs('erp.utility.advance-utility.product-merge.*') ? 'active' : '' }}" href="{{ route('erp.utility.advance-utility.product-merge') }}">(FR) Product Merge </a></li>
                        <li class="{{ checkMenuVisibilty('utility_data_delete') }}"><a class="sub-slide-item text-success {{request()->routeIs('erp.utility.advance-utility.data-delete.*') ? 'active' : '' }}" href="{{ route('erp.utility.advance-utility.data-delete') }}">(FR) Data Delete </a></li>
                        <li class="{{ checkMenuVisibilty('utility_voucher_renumber') }}"><a class="sub-slide-item text-success {{request()->routeIs('erp.utility.advance-utility.voucher-renumber.*') ? 'active' : '' }}" href="{{ route('erp.utility.advance-utility.voucher-renumber') }}">(FR) Voucher Renumber </a></li>
                    </ul>
                </li>

                <li class="sub-slide {{ checkMenuVisibilty('utility_data_utility') }}">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label text-success">(FR) Data Utility</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li class="{{ checkMenuVisibilty('utility_data_export') }}"><a class="sub-slide-item text-success {{request()->routeIs('erp.utility.data-utility.data-export.*') ? 'active' : '' }}" href="{{ route('erp.utility.data-utility.data-export') }}">(FR) Data Export </a></li>
                        <li class="{{ checkMenuVisibilty('utility_data_import') }}"><a class="sub-slide-item text-success {{request()->routeIs('erp.utility.data-utility.data-import.*') ? 'active' : '' }}" href="{{ route('erp.utility.data-utility.data-import') }}">(FR) Data Import </a></li>
                        <li class="{{ checkMenuVisibilty('utility_fin_year_delete') }}"><a class="sub-slide-item text-success {{request()->routeIs('erp.utility.data-utility.financial-year-delete.*') ? 'active' : '' }}" href="{{ route('erp.utility.data-utility.financial-year-delete') }}">(FR) Fin. Year Delete </a></li>
                    </ul>
                </li>
                <li class="sub-slide {{ checkMenuVisibilty('utility_havala') }}">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label text-danger">Havala</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li class="{{ checkMenuVisibilty('utility_capital') }}"><a class="sub-slide-item text-success {{request()->routeIs('erp.utility.havala.capital.*') ? 'active' : '' }}" href="{{ route('erp.utility.havala.capital.index') }}">(FR) Capital </a></li>
                        <li class="{{ checkMenuVisibilty('utility_depriciation') }}"><a class="sub-slide-item text-success {{request()->routeIs('erp.utility.havala.depreciation.*') ? 'active' : '' }}" href="{{ route('erp.utility.havala.depreciation.index') }}">(FR) Depreciation </a></li>
                        <li class="{{ checkMenuVisibilty('utility_interest') }}"><a class="sub-slide-item text-danger" href="javascript:void(0)">(TD) Interest </a></li>
                        <li class="{{ checkMenuVisibilty('utility_havala_setup') }}"><a class="sub-slide-item text-success {{request()->routeIs('erp.utility.havala.havala-setup.*') ? 'active' : '' }}" href="{{ route('erp.utility.havala.havala-setup.index') }}">(FR) Havala Setup </a></li>
                    </ul>
                </li>

                <li class="sub-slide {{ checkMenuVisibilty('utility_year_end') }}">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label text-success">(FR) Year End</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li class="{{ checkMenuVisibilty('utility_update_balance') }}"><a class="sub-slide-item text-success {{request()->routeIs('erp.utility.year-end.update-balance.*') ? 'active' : '' }}" href="{{ route('erp.utility.year-end.update-balance') }}">(FR) Update Balance </a></li>
                        <li class="{{ checkMenuVisibilty('utility_new_fin_year') }}"><a class="sub-slide-item text-success {{request()->routeIs('erp.utility.year-end.new-financial-year.*') ? 'active' : '' }}" href="{{ route('erp.utility.year-end.new-financial-year.index') }}">(FR) New Fin. Year </a></li>
                    </ul>
                </li>
                <li class="sub-slide {{ checkMenuVisibilty('utility_personal_diary') }}">
                    <a class="sub-side-menu__item {{request()->routeIs('erp.utility.personal-diary.*') ? 'active' : '' }}" data-bs-toggle="sub-slide" href="javascript:void(0)">
                        <span class="sub-side-menu__label text-success">Personal Diary</span>
                        <i class="sub-angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="sub-slide-menu">
                        <li class="{{ checkMenuVisibilty('utility_address_book') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.utility.personal-diary.address-book.*') ? 'active' : '' }}" href="{{ route('erp.utility.personal-diary.address-book.index') }}">Address Book</a></li>
                        <li class="{{ checkMenuVisibilty('utility_mailing_latter') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.utility.personal-diary.mailing-letter.*') ? 'active' : '' }}" href="{{ route('erp.utility.personal-diary.mailing-letter.index') }}">Mailing Letter</a></li>
                        <li class="{{ checkMenuVisibilty('utility_reminder') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.utility.personal-diary.reminder.*') ? 'active' : '' }}" href="{{ route('erp.utility.personal-diary.reminder.index') }}">Reminder</a></li>
                        <li class="{{ checkMenuVisibilty('utility_calender_diary') }}"><a class="text-success sub-slide-item {{request()->routeIs('erp.utility.personal-diary.calender-diary.*') ? 'active' : '' }}" href="{{ route('erp.utility.personal-diary.calender-diary.index') }}">Calendar/Diary</a></li>
                    </ul>
                </li>
            </ul>
        </li>

        <!-- Setup -->
        <li class="slide {{ request()->routeIs('erp.utility.*') ? 'is-expanded' : '' }}">
            <a class="side-menu__item {{ request()->routeIs('erp.utility.*') ? 'active' : '' }}" data-bs-toggle="slide" href="javascript:void(0)">
                <span class="side-menu__label">Setup</span>
                <i class="angle fe fe-chevron-right"></i>
            </a>
            <ul class="slide-menu {{request()->routeIs('erp.utility.*') ? 'open' : ''}}">
                <li class="side-menu-label1">
                    <a href="javascript:void(0)">Setup</a>
                </li>
                <li class="{{ checkMenuVisibilty('setup_company_setup') }}">
                    <a class="slide-item" data-bs-toggle="slide" href="{{ route('erp.setting.company-setup') }}">
                        <span class="side-menu__label text-success">Company Setup</span>
                    </a>
                </li>
                <li class="{{ checkMenuVisibilty('setup_voucher_setup') }}">
                    <a class="slide-item" data-bs-toggle="slide" href="{{ route('erp.setting.voucher-setup') }}">
                        <span class="side-menu__label text-success">Voucher Setup</span>
                    </a>
                </li>
                <li class="{{ checkMenuVisibilty('setup_voucher_number') }}">
                    <a class="slide-item"  href="javascript:void(0)" data-bs-toggle='modal' data-bs-target='#voucher_number_modal' >
                        <span class="side-menu__label text-success">(FR) Voucher Number</span>
                    </a>
                </li>
                <li class="sub-slide {{ checkMenuVisibilty('setup_sales_setup') }}">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label text-success">Sales Setup</span><i class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li class="{{ checkMenuVisibilty('setup_sales_expense_detail') }}"><a class="sub-slide-item text-success" href="{{ route('erp.setting.sales-setup.expense-details') }}">Expense Details</a></li>
                        <li class="{{ checkMenuVisibilty('setup_sales_invoice_type') }}"><a class="sub-slide-item text-success" href="{{ route('erp.setting.sales-setup.invoice-type') }}">Invoice Type</a></li>
                    </ul>
                </li>
                <li class="sub-slide {{ checkMenuVisibilty('setup_purchase_setup') }}">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label text-success">Purchase Setup</span><i class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li class="{{ checkMenuVisibilty('setup_purchase_expense_detail') }}"><a class="sub-slide-item text-success" href="{{ route('erp.setting.purchase-setup.expense-details') }}">Expense Details</a></li>
                        <li class="{{ checkMenuVisibilty('setup_purchase_invoice_type') }}"><a class="sub-slide-item text-success" href="{{ route('erp.setting.purchase-setup.invoice-type') }}">Invoice Type</a></li>
                    </ul>
                </li>
                <li class="sub-slide d-none">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label">(TD) Consultant Setup</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Expense Details</a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Invoice Type</a></li>
                    </ul>
                </li>
                <li class="sub-slide d-none">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label">(TD) Jobwork Out Billing</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Expense Details</a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Invoice Type</a></li>
                    </ul>
                </li>
                <li class="sub-slide d-none">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label">(TD) Jobwork In Billing</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Expense Details</a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Invoice Type</a></li>
                    </ul>
                </li>
                <li class="sub-slide {{ checkMenuVisibilty('setup_credit_note_setup') }}">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label text-success">Credit Note Setup</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li class="{{ checkMenuVisibilty('setup_credit_expense_detail') }}"><a class="sub-slide-item text-success" href="{{ route('erp.setting.credit-note-setup.expense-details') }}">Expense Details</a></li>
                        <li class="{{ checkMenuVisibilty('setup_credit_invoice_type') }}"><a class="sub-slide-item text-success" href="{{ route('erp.setting.credit-note-setup.invoice-type') }}">Invoice Type</a></li>
                    </ul>
                </li>
                <li class="sub-slide {{ checkMenuVisibilty('setup_debit_note_setup') }}">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label text-success">Debit Note Setup</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li class="{{ checkMenuVisibilty('setup_debit_expense_detail') }}"><a class="sub-slide-item text-success" href="{{ route('erp.setting.debit-note-setup.expense-details') }}">Expense Details</a></li>
                        <li class="{{ checkMenuVisibilty('setup_debit_invoice_type') }}"><a class="sub-slide-item text-success" href="{{ route('erp.setting.debit-note-setup.invoice-type') }}">Invoice Type</a></li>
                    </ul>
                </li>
                <li class="sub-slide {{ checkMenuVisibilty('setup_advance_setup') }}">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label text-success">(FR) Advance Setup</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li class="{{ checkMenuVisibilty('setup_macro_setting') }}"><a class="sub-slide-item text-success {{request()->routeIs('erp.setting.advance-setup.macro-setting.*') ? 'active' : '' }}" href="{{ route('erp.setting.advance-setup.macro-setting.index') }}">(FR) Macro Setting</a></li>
                        <li class="{{ checkMenuVisibilty('setup_user_field') }}"><a class="sub-slide-item text-success {{request()->routeIs('erp.setting.advance-setup.user-field.*') ? 'active' : '' }}" href="{{ route('erp.setting.advance-setup.user-field.index') }}">(FR) User Field</a></li>
                        <li class="{{ checkMenuVisibilty('setup_auto_number') }}"><a class="sub-slide-item text-success {{request()->routeIs('erp.setting.advance-setup.auto-number.*') ? 'active' : '' }}" href="{{ route('erp.setting.advance-setup.auto-number.index') }}">(FR) Auto Number</a></li>
                        <li class="{{ checkMenuVisibilty('setup_user_master') }}"><a class="sub-slide-item text-success {{request()->routeIs('erp.setting.advance-setup.user-master.*') ? 'active' : '' }}" href="{{ route('erp.setting.advance-setup.user-master.index') }}">(FR) User Master</a></li>
                        <li class="{{ checkMenuVisibilty('setup_equation') }}"><a class="sub-slide-item text-success {{request()->routeIs('erp.setting.advance-setup.equation.*') ? 'active' : '' }}" href="{{ route('erp.setting.advance-setup.equation.index') }}">(FR) Equation</a></li>
                    </ul>
                </li>
                <li class="sub-slide">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label text-success">Security</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item text-success" data-bs-toggle='modal' data-bs-target='#setup-security' href="javascript:void(0)" ww>Menu Option</a></li>
                    </ul>
                </li>
                <li class="{{ checkMenuVisibilty('setup_software_setup') }}">
                    <a class="slide-item {{request()->routeIs('erp.setting.shoftware-setup.*') ? 'active' : '' }}" data-bs-toggle="slide" href="{{ route('erp.setting.shoftware-setup') }}">
                        <span class="side-menu__label text-success">(FR) Software Setup</span>
                    </a>
                </li>
                <li class="{{ checkMenuVisibilty('setup_voucher_format') }}">
                    <a class="slide-item" data-bs-toggle="modal" href="javascript:void(0)" data-bs-toggle='modal' data-bs-target='#voucher_format' >
                        <span class="side-menu__label text-success">(FR) Voucher Format</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- End Setup -->

        <!-- Setting -->
        <li class="slide d-none">
            <a class="side-menu__item {{ request()->routeIs('erp.setting.*') ? 'active' : ' ' }}" data-bs-toggle="slide" href="{{ route('erp.setting.home') }}"><i class="side-menu__icon fa fa-cog"></i><span class="side-menu__label">(TD) Setup</span></a>
        </li>

        <!-- setup -->
        <li class="slide d-none">
            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                <span class="side-menu__label">Settings</span>
                <i class="angle fe fe-chevron-right"></i>
            </a>
            <ul class="slide-menu">
                
                <li>
                    <a class="slide-item" data-bs-toggle="slide" href="{{ route('erp.setting.company-setup') }}">
                        <span class="side-menu__label">(TD) Company Setup</span>
                    </a>
                </li>

                <li>
                    <a class="slide-item" data-bs-toggle="slide" href="{{ route('erp.setting.voucher-setup') }}">
                        <span class="side-menu__label">(TD) Voucher Setup</span>
                    </a>
                </li>

                <li>
                    <a class="slide-item" data-bs-toggle="slide" href="#">
                        <span class="side-menu__label">(TD) Voucher Number</span>
                    </a>
                </li>
                <li class="sub-slide">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label">Consultant Setup</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Expense Details </a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Invoice Type </a></li>
                    </ul>
                </li>
                <li class="sub-slide">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label">Share Setup</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Expense Detail</a></li>
                    </ul>
                </li>
                <li class="sub-slide">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label">Jobwork Out  Billing</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Expense Detail </a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Invoice Type </a></li>
                    </ul>
                </li>
                <li class="sub-slide">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label">Jobwork In  Billing</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Expense Detail </a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Invoice Type </a></li>
                    </ul>
                </li>
                <li class="sub-slide">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label">Credit Note Setup</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Expense Detail </a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Invoice Type </a></li>
                    </ul>
                </li>
                <li class="sub-slide">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label">Debit Note Setup</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Expense Detail </a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Invoice Type </a></li>
                    </ul>
                </li>
                <li class="sub-slide">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label">Advance Setup</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Macro Setting </a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Equation </a></li>
                    </ul>
                </li>
                <li class="sub-slide">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label">Security</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Menu Option </a></li>
                    </ul>
                </li>
                <li>
                    <a class="slide-item" data-bs-toggle="slide" href="#">
                        <span class="side-menu__label">(TD) Shoftware Setup</span>
                    </a>
                </li>
                <li>
                    <a class="slide-item" data-bs-toggle="slide" href="#">
                        <span class="side-menu__label">(TD) Voucher Format</span>
                    </a>
                </li>
            </ul>
        <li>

        <!-- Share -->
        <li class="slide d-none">
            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                <span class="side-menu__label">Share</span>
                <i class="angle fe fe-chevron-right"></i>
            </a>
            <ul class="slide-menu">
                <li class="sub-slide">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label">Share Entry</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Invoice </a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) IPO </a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Split </a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Bonus </a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Merge/DeMerge </a></li>
                    </ul>
                </li>
                <li class="sub-slide">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label">Capital Gains</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Detail Report </a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Summary Report </a></li>
                    </ul>
                </li>
                <li class="sub-slide">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label">Stock Statement</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Stock Statement </a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Trading Stock Statement </a></li>
                    </ul>
                </li>
                <li class="sub-slide">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label">Other Reports</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Turn Over Report </a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Brokerage/STT Summary </a></li>
                    </ul>
                </li>

                <li class="sub-slide">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label">Mutual Fund (Equit)</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Detail Report </a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Summary Report </a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Stock Statement </a></li>
                    </ul>
                </li>
                <li class="sub-slide">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label">Mutual Fund (Debt)</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Detail Report </a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Summary Report </a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Stock Statemet </a></li>
                    </ul>
                </li>
                <li class="sub-slide">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label">F&O Report</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Stock Detail Report</a></li>

                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) F&O Position </a></li>
                    </ul>
                </li>
                <li class="sub-slide">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label">Commodity Reports</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Stock Detail Report </a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Commodity Position </a></li>
                    </ul>
                </li>
                <li class="sub-slide">
                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                            class="sub-side-menu__label">Share Register</span><i
                            class="sub-angle fe fe-chevron-right"></i></a>
                    <ul class="sub-slide-menu">
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) F&O Register </a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Commodity Register </a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Investment Register </a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Mutual Fund Register </a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Trading Register </a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) IPO Register </a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Bonus Register </a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Split Register </a></li>
                        <li><a class="sub-slide-item" href="javascript:void(0)">(TD) Merge/Demerge Register </a></li>
                    </ul>
                </li>
            </ul>
        <li>


        <!-- Exit -->
        <li class="slide">
            <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                <span class="side-menu__label">Exit</span>
                <i class="angle fe fe-chevron-right"></i>
            </a>
            <ul class="slide-menu">
                <li><a href="{{ route('logout') }}" class="slide-item text-success">Exit (Log-out)</a></li>
                <li><a onclick="window.open('{{ route('home') }}/#Features', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');" class="slide-item text-success" style="cursor: pointer;">About Us </a></li>
                <li><a onclick="window.open('https://www.desmos.com/scientific', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');" class="slide-item text-success" style="cursor: pointer;">Calculator </a></li>
            </ul>
        </li>
    </ul>
    <div class="slide-right d-none" id="slide-right">
        <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24"
            height="24" viewBox="0 0 24 24">
            <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
        </svg>
    </div>
</div>
<div class="ps__rail-x" style="left: 0px; bottom: 0px;">
    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
</div>
<div class="ps__rail-y" style="top: 0px; height: 56px; right: 0px;">
    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
</div>
