<?php

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [\App\Http\Controllers\Erp\HomeController::class, 'index'])->name('home');

// home protected route
Route::middleware(['auth', 'plan.check', 'isCustomer'])->group(function () {

    //auth and company check routes
    Route::middleware(['company.check'])->group(function ()
    {
        Route::resource('products', \App\Http\Controllers\Erp\Product\ProductController::class); 

        //Setting routes
        Route::prefix('setting')->as('setting.')->group(function (){
            Route::get('/', [\App\Http\Controllers\Erp\Setting\SettingController::class, 'index'])->name('home');
            Route::get('/company-setup', [\App\Http\Controllers\Livewire\Erp\Setting\CompanySetup\CompanySetting::class, '__invoke'])->name('company-setup');
            Route::get('/voucher-setup', [\App\Http\Controllers\Livewire\Erp\Setting\VoucherSetting\VoucherSetting::class, '__invoke'])->name('voucher-setup');

            //sales setup
            Route::prefix('/sales-setup')->as('sales-setup.')->group(function (){
                Route::get('/expense-details', [App\Http\Controllers\Livewire\Erp\Setting\SalesSetup\ExpenseDetails::class, '__invoke'])->name('expense-details');
                Route::get('/invoice-type', [App\Http\Controllers\Livewire\Erp\Setting\SalesSetup\InvoiceType::class, '__invoke'])->name('invoice-type');
            });

            //purchase setup
            Route::prefix('/purchase-setup')->as('purchase-setup.')->group(function (){
                Route::get('/expense-details', [App\Http\Controllers\Livewire\Erp\Setting\PurchaseSetup\ExpenseDetails::class, '__invoke'])->name('expense-details');
                Route::get('/invoice-type', [App\Http\Controllers\Livewire\Erp\Setting\PurchaseSetup\InvoiceType::class, '__invoke'])->name('invoice-type');
            });

            //credit-note setup
            Route::prefix('/credit-note-setup')->as('credit-note-setup.')->group(function (){
                Route::get('/expense-details', [App\Http\Controllers\Livewire\Erp\Setting\CreditNoteSetup\ExpenseDetails::class, '__invoke'])->name('expense-details');
                Route::get('/invoice-type', [App\Http\Controllers\Livewire\Erp\Setting\CreditNoteSetup\InvoiceType::class, '__invoke'])->name('invoice-type');
            });

            //debit-note setup
            Route::prefix('/debit-note-setup')->as('debit-note-setup.')->group(function (){
                Route::get('/expense-details', [App\Http\Controllers\Livewire\Erp\Setting\DebitNoteSetup\ExpenseDetails::class, '__invoke'])->name('expense-details');
                Route::get('/invoice-type', [App\Http\Controllers\Livewire\Erp\Setting\DebitNoteSetup\InvoiceType::class, '__invoke'])->name('invoice-type');
            });


            // Company setup
            Route::prefix('company-setup')->as('company-setup.')->group(function () {
                
                Route::get('address-details', [\App\Http\Controllers\Livewire\Erp\Setting\CompanySetup\AddressDetails::class, '__invoke'])->name('address.details');   

                Route::get('bank-details', [\App\Http\Controllers\Livewire\Erp\Setting\CompanySetup\BankDetails::class, '__invoke'])->name('bank.details');

                Route::get('company-details', [\App\Http\Controllers\Livewire\Erp\Setting\CompanySetup\CompanyDetails::class, '__invoke'])->name('company.details');

                Route::get('statutory-details', [\App\Http\Controllers\Livewire\Erp\Setting\CompanySetup\StatutoryDetails::class, '__invoke'])->name('statutory.details');   

                Route::get('alter-language', [\App\Http\Controllers\Livewire\Erp\Setting\CompanySetup\AlterLanguage::class, '__invoke'])->name('alter.language');   
            });

            Route::get('/shoftware-setup', [\App\Http\Controllers\Livewire\Erp\Setting\ShoftwareSetup\Index::class, '__invoke'])->name('shoftware-setup');
            
            //advance-setup setup
            Route::prefix('/advance-setup')->as('advance-setup.')->group(function (){
                Route::get('/macro-setting', [App\Http\Controllers\Livewire\Erp\Setting\AdvanceSetup\MacroSetting\Index::class, '__invoke'])->name('macro-setting.index');
                Route::get('/user-field', [App\Http\Controllers\Livewire\Erp\Setting\AdvanceSetup\UserField::class, '__invoke'])->name('user-field.index');
                Route::get('/auto-number', [App\Http\Controllers\Livewire\Erp\Setting\AdvanceSetup\AutoNumber::class, '__invoke'])->name('auto-number.index');
                Route::get('/user-master', [App\Http\Controllers\Livewire\Erp\Setting\AdvanceSetup\UserMaster::class, '__invoke'])->name('user-master.index');
                Route::get('/equation', [App\Http\Controllers\Livewire\Erp\Setting\AdvanceSetup\Equation::class, '__invoke'])->name('equation.index');
            });
        });

        // GST routes
        Route::prefix('gst')->as('gst.')->group(function ()
        {
            // Gst Slab Setup routes
            Route::prefix('slab')->as('slab.')->group(function ()
            {   
                Route::get('/', [\App\Http\Controllers\Erp\Gst\GstController::class, 'gstSlabIndex'])->name('index');
                Route::get('/create', [\App\Http\Controllers\Erp\Gst\GstController::class, 'gstSlabCreate'])->name('create');
                Route::get('/{id}/edit', [\App\Http\Controllers\Erp\Gst\GstController::class, 'gstSlabEdit'])->name('edit');
                Route::delete('/{id}/destroy', [\App\Http\Controllers\Erp\Gst\GstController::class, 'gstSlabDestroy'])->name('destroy');
            });

            // Gst Commodity routes
            Route::prefix('gst-commodity')->as('gst-commodity.')->group(function ()
            {   
                Route::get('/', [\App\Http\Controllers\Erp\Gst\GstController::class, 'gstCommodityIndex'])->name('index');
                Route::get('/create', [\App\Http\Controllers\Erp\Gst\GstController::class, 'gstCommodityCreate'])->name('create');
                Route::get('/{id}/edit', [\App\Http\Controllers\Erp\Gst\GstController::class, 'gstCommodityEdit'])->name('edit');
                Route::delete('/{id}/destroy', [\App\Http\Controllers\Erp\Gst\GstController::class, 'gstCommodityDestroy'])->name('destroy');
            });

            Route::prefix('rcm')->as('rcm.')->group(function ()
            {
                Route::resource('bank-payment', \App\Http\Controllers\Erp\RCMVoucher\BankPaymentController::class);
                Route::resource('cash-payment', \App\Http\Controllers\Erp\RCMVoucher\CashPaymentController::class);
            });   

            Route::resource('gst-expense', \App\Http\Controllers\Erp\GstExpense\GstExpenseController::class);
            Route::resource('gst-income', \App\Http\Controllers\Erp\GstIncome\GstIncomeController::class);

            Route::prefix('rcm-report')->as('rcm-report.')->group(function ()
            {
                Route::get('date-wise', [\App\Http\Controllers\Livewire\Erp\Gst\RcmReport\IndexDateWiseSummary::class, '__invoke'])->name('date-wise.index');
                Route::get('account-wise', [\App\Http\Controllers\Livewire\Erp\Gst\RcmReport\IndexAccountWiseSummary::class, '__invoke'])->name('account-wise.index');
                Route::get('account-wise-entry/{id}/show', [\App\Http\Controllers\Livewire\Erp\Gst\RcmReport\ShowAccountWiseSummary::class, '__invoke'])->name('account-wise.show');
                Route::get('notified-rcm', [\App\Http\Controllers\Livewire\Erp\Gst\RcmReport\IndexNotifiedRCM::class, '__invoke'])->name('notified-rcm.index');
            });
            
            Route::prefix('gst-report')->as('gst-report.')->group(function ()
            {
                Route::get('account-wise', [\App\Http\Controllers\Livewire\Erp\Gst\GstReport\AccountWise::class, '__invoke'])->name('account-wise.index');
                Route::get('expense-audit', [\App\Http\Controllers\Livewire\Erp\Gst\GstReport\ExpenseAudit::class, '__invoke'])->name('expense-audit.index');
                Route::get('hsn-wise-summary', [\App\Http\Controllers\Livewire\Erp\Gst\GstReport\HsnWiseSummary::class, '__invoke'])->name('hsn-wise-summary.index');
                Route::get('percentage-wise', [\App\Http\Controllers\Livewire\Erp\Gst\GstReport\PercentageWise::class, '__invoke'])->name('percentage-wise.index');
                Route::get('registration-type-wise', [\App\Http\Controllers\Livewire\Erp\Gst\GstReport\RegistrationTypeWise::class, '__invoke'])->name('registration-type-wise.index');
                Route::get('summary-section-wise', [\App\Http\Controllers\Livewire\Erp\Gst\GstReport\SummarySectionWise::class, '__invoke'])->name('summary-section-wise.index');
            });

            Route::prefix('gst-register')->as('gst-register.')->group(function ()
            {
                Route::get('tax-liability-register', [\App\Http\Controllers\Livewire\Erp\Gst\GstRegister\TaxLiabilityRegisterController::class, '__invoke'])->name('tax-liability-register.index');
                Route::get('cash-ledger', [\App\Http\Controllers\Livewire\Erp\Gst\GstRegister\CashLedgerController::class, '__invoke'])->name('cash-ledger.index');
                Route::get('itc-register', [\App\Http\Controllers\Livewire\Erp\Gst\GstRegister\ItcRegisterController::class, '__invoke'])->name('itc-register.index');
                Route::get('gst-outward-register', [\App\Http\Controllers\Livewire\Erp\Gst\GstRegister\GstOutwardRegisterController::class, '__invoke'])->name('gst-outward-register.index');
                Route::get('gst-inward-register', [\App\Http\Controllers\Livewire\Erp\Gst\GstRegister\GstInwardRegisterController::class, '__invoke'])->name('gst-inward-register.index');
                Route::get('gst-expense-register', [\App\Http\Controllers\Livewire\Erp\Gst\GstRegister\GstExpenseRegisterController::class, '__invoke'])->name('gst-expense-register.index');
                Route::get('gst-income-register', [\App\Http\Controllers\Livewire\Erp\Gst\GstRegister\GstIncomeRegisterController::class, '__invoke'])->name('gst-income-register.index');
            });
            
            Route::get('gstr-2-b-match', [\App\Http\Controllers\Livewire\Erp\Gst\Gstr2BMatch::class, '__invoke'])->name('gstr-2-b-match.index');
            Route::get('e-way-bill', [\App\Http\Controllers\Livewire\Erp\Gst\EWayBill::class, '__invoke'])->name('e-way-bill.index');
            Route::get('gst-pymt-assist', [\App\Http\Controllers\Livewire\Erp\Gst\GstPymtAssist::class, '__invoke'])->name('gst-pymt-assist.index');
            
            Route::prefix('gstr-return')->as('gstr-return.')->group(function ()
            {
                Route::get('gstr-3-b-as-per-books', [\App\Http\Controllers\Livewire\Erp\Gst\GstrReturn\Gstr3BAsPerBooks\Gstr3BAsPerBooks::class, '__invoke'])->name('gstr-3-b-as-per-books.index');
                Route::get('gstr-3-b-as-per-books/show', [\App\Http\Controllers\Livewire\Erp\Gst\GstrReturn\Gstr3BAsPerBooks\Show::class, '__invoke'])->name('gstr-3-b-as-per-books.show');
                Route::get('gstr-3-b-as-per-gstr-2-b', [\App\Http\Controllers\Livewire\Erp\Gst\GstrReturn\Gstr3BAsPerGstr2B\Gstr3BAsPerGstr2B::class, '__invoke'])->name('gstr-3-b-as-per-gstr-2-b.index');
                Route::get('gstr-3-b-as-per-gstr-2-b/show', [\App\Http\Controllers\Livewire\Erp\Gst\GstrReturn\Gstr3BAsPerGstr2B\Show::class, '__invoke'])->name('gstr-3-b-as-per-gstr-2-b.show');
                Route::get('gstr-1', [\App\Http\Controllers\Livewire\Erp\Gst\GstrReturn\Gstr1::class, '__invoke'])->name('gstr-1.index');
                // Route::get('gstr-1/show/{id}', [\App\Http\Controllers\Livewire\Erp\Gst\GstrReturn\Gstr1\Show::class, '__invoke'])->name('gstr-1.show');
                Route::get('gstr-1-hsn-summary', [\App\Http\Controllers\Livewire\Erp\Gst\GstrReturn\Gstr1HsnSummary::class, '__invoke'])->name('gstr-1-hsn-summary.index');
                Route::get('gstr-2', [\App\Http\Controllers\Livewire\Erp\Gst\GstrReturn\Gstr2::class, '__invoke'])->name('gstr-2.index');
                Route::get('gstr-2-hsn-summary', [\App\Http\Controllers\Livewire\Erp\Gst\GstrReturn\Gstr2HsnSummary::class, '__invoke'])->name('gstr-2-hsn-summary.index');
                Route::get('gstr-9', [\App\Http\Controllers\Livewire\Erp\Gst\GstrReturn\Gstr9::class, '__invoke'])->name('gstr-9.index');
                Route::get('itc-04', [\App\Http\Controllers\Livewire\Erp\Gst\GstrReturn\Itc04::class, '__invoke'])->name('itc-04.index');
            });

            Route::prefix('gst-entry')->as('gst-entry.')->group(function ()
            {
                Route::resource('bank-payment', \App\Http\Controllers\Erp\GstEntry\BankPaymentController::class);
                Route::resource('cash-payment', \App\Http\Controllers\Erp\GstEntry\CashPaymentController::class);
                Route::resource('utilization-entry', \App\Http\Controllers\Erp\GstEntry\UtilizationEntryController::class);
                Route::resource('journal-entry', \App\Http\Controllers\Erp\GstEntry\GstJournalEntryController::class);
            });

            // Gst Audit routes
            Route::prefix('gst-audit')->as('gst-audit.')->group(function ()
            {   
                Route::get('gstr-1-b2b-summary', [\App\Http\Controllers\Livewire\Erp\Gst\GstAudit\Gstr1B2bSummaryController::class, '__invoke'])->name('gstr-1-b2b-summary.index');
                Route::get('gstr-2-b2b-summary', [\App\Http\Controllers\Livewire\Erp\Gst\GstAudit\Gstr2B2bSummaryController::class, '__invoke'])->name('gstr-2-b2b-summary.index');
                Route::get('gstr-2a-match', [\App\Http\Controllers\Livewire\Erp\Gst\GstAudit\Gstr2AMatchController::class, '__invoke'])->name('gstr-2a-match.index');
                Route::get('itc-As-per-gstr-2b', [\App\Http\Controllers\Livewire\Erp\Gst\GstAudit\ItcAsPerGstr2BController::class, '__invoke'])->name('itc-As-per-gstr-2b.index');
             });

            Route::prefix('gstr-integrity')->as('gstr-integrity.')->group(function ()
            {
                Route::get('tax-liability', [\App\Http\Controllers\Livewire\Erp\Gst\GstrIntegrity\IndexTaxLiability::class, '__invoke'])->name('tax-liability.index');
                Route::get('itc', [\App\Http\Controllers\Livewire\Erp\Gst\GstrIntegrity\IndexItc::class, '__invoke'])->name('itc.index');
            });
        });

        // Master
        Route::prefix('master')->as('master.')->group(function ()
        {
            Route::resource('service', \App\Http\Controllers\Erp\Service\ServiceController::class);
            Route::get('services/export', [\App\Http\Controllers\Erp\Service\ServiceController::class, 'export'])->name('service.export');
            Route::resource('price-list', \App\Http\Controllers\Erp\PriceList\PriceListController::class);
            Route::post('price-list/status', [\App\Http\Controllers\Erp\PriceList\PriceListController::class, 'updateActiveStatus'])->name('price-list.active-deactive');
            Route::get('price-list/entry/show/{id}', [\App\Http\Controllers\Erp\PriceList\PriceListController::class, 'entryShow'])->name('price-list.entry.show');
            Route::get('price-list/entry/export', [\App\Http\Controllers\Erp\PriceList\PriceListController::class, 'export'])->name('price-list.export');
            Route::resource('account-group', \App\Http\Controllers\Erp\Account\AccountGroupController::class);
            Route::resource('account', \App\Http\Controllers\Erp\Account\AccountController::class);
            Route::get('account-group/export/{format}', [\App\Http\Controllers\Erp\Account\AccountGroupController::class, 'export'])->name('account-group.export');
            Route::get('accounts/export', [\App\Http\Controllers\Erp\Account\AccountController::class, 'export'])->name('account.export');
            Route::get('accounts/filter', [\App\Http\Controllers\Erp\Account\AccountController::class, 'filter'])->name('account.filter');
            Route::resource('product', \App\Http\Controllers\Erp\Product\ErpProductController::class);
            
            // GST Route
            Route::prefix('gst')->as('gst.')->group(function ()
            {
                    // Sales Setup routes
                Route::prefix('sales-setup')->as('sales-setup.')->group(function ()
                {   
                    Route::get('/', [\App\Http\Controllers\Erp\Gst\GstController::class, 'salesSetupIndex'])->name('index');
                    Route::get('/create', [\App\Http\Controllers\Erp\Gst\GstController::class, 'salesSetupCreate'])->name('create');
                    Route::get('/{id}/edit', [\App\Http\Controllers\Erp\Gst\GstController::class, 'salesSetupEdit'])->name('edit');
                    Route::delete('/{id}/destroy', [\App\Http\Controllers\Erp\Gst\GstController::class, 'salesSetupDestroy'])->name('destroy');
                });
                
                // JW out Setup routes
                Route::prefix('jw-out-setup')->as('jw-out-setup.')->group(function ()
                {   
                    Route::get('/', [\App\Http\Controllers\Erp\Gst\GstController::class, 'jwOutSetupIndex'])->name('index');
                    Route::get('/create', [\App\Http\Controllers\Erp\Gst\GstController::class, 'jwOutSetupCreate'])->name('create');
                    Route::get('/{id}/edit', [\App\Http\Controllers\Erp\Gst\GstController::class, 'jwOutSetupEdit'])->name('edit');
                    Route::delete('/{id}/destroy', [\App\Http\Controllers\Erp\Gst\GstController::class, 'jwOutSetupDestroy'])->name('destroy');
                });

                // JW out Setup routes
                Route::prefix('jw-in-setup')->as('jw-in-setup.')->group(function ()
                {   
                    Route::get('/', [\App\Http\Controllers\Erp\Gst\GstController::class, 'jwInSetupIndex'])->name('index');
                    Route::get('/create', [\App\Http\Controllers\Erp\Gst\GstController::class, 'jwInSetupCreate'])->name('create');
                    Route::get('/{id}/edit', [\App\Http\Controllers\Erp\Gst\GstController::class, 'jwInSetupEdit'])->name('edit');
                    Route::delete('/{id}/destroy', [\App\Http\Controllers\Erp\Gst\GstController::class, 'jwInSetupDestroy'])->name('destroy');
                });

                // Credit note stock setup
                Route::prefix('credit-note-setup')->as('credit-note-setup.')->group(function ()
                {   
                    Route::get('/', [\App\Http\Controllers\Erp\Gst\GstController::class, 'creditNoteStockSetupIndex'])->name('index');
                    Route::get('/create', [\App\Http\Controllers\Erp\Gst\GstController::class, 'creditNoteStockCreate'])->name('create');
                    Route::get('/{id}/edit', [\App\Http\Controllers\Erp\Gst\GstController::class, 'creditNoteStockEdit'])->name('edit');
                    Route::delete('/{id}/destroy', [\App\Http\Controllers\Erp\Gst\GstController::class, 'creditNoteStockDestroy'])->name('destroy');
                });

                // Debit note stock setup
                Route::prefix('debit-note-setup')->as('debit-note-setup.')->group(function ()
                {   
                    Route::get('/', [\App\Http\Controllers\Erp\Gst\GstController::class, 'debitNoteStockSetupIndex'])->name('index');
                    Route::get('/create', [\App\Http\Controllers\Erp\Gst\GstController::class, 'debitNoteStockCreate'])->name('create');
                    Route::get('/{id}/edit', [\App\Http\Controllers\Erp\Gst\GstController::class, 'debitNoteStockEdit'])->name('edit');
                    Route::delete('/{id}/destroy', [\App\Http\Controllers\Erp\Gst\GstController::class, 'debitNoteStockDestroy'])->name('destroy');
                });
            });

            // GST Route
            Route::prefix('cost-centre')->as('cost-centre.')->group(function ()
            {
                Route::resource('cost-category', App\Http\Controllers\Erp\CostCentre\CostCategoryController::class);
                Route::get('cost-categories/export', [App\Http\Controllers\Erp\CostCentre\CostCategoryController::class, 'export'])->name('cost-category.export');
                Route::resource('cost-centre', App\Http\Controllers\Erp\CostCentre\CostCentreController::class);
                Route::get('cost-centres/export', [App\Http\Controllers\Erp\CostCentre\CostCentreController::class, 'export'])->name('cost-centre.export');
            });

            // GST Route
            Route::prefix('multi-currency')->as('multi-currency.')->group(function ()
            {
                Route::resource('currency-master', App\Http\Controllers\Erp\MultiCurrency\CurrencyMasterController::class);
                Route::resource('rate-exchange-master', App\Http\Controllers\Erp\MultiCurrency\RateExchangeMasterController::class);
            });
        });

        // Utility 
        Route::prefix('utility')->as('utility.')->group(function ()
        {
            Route::prefix('personal-diary')->as('personal-diary.')->group(function ()
            {
                Route::resource('address-book', App\Http\Controllers\Erp\AddressBook\AddressBookController::class);
                Route::resource('calender-diary', App\Http\Controllers\Erp\CalenderDiary\CalenderDiaryController::class);
                Route::resource('reminder', App\Http\Controllers\Erp\Reminder\ReminderController::class);
                Route::resource('mailing-letter', App\Http\Controllers\Erp\MailingLetter\MailingLetterController::class);
            });
            Route::prefix('system-utility')->as('system-utility.')->group(function ()
            {
                Route::get('/back-up', [\App\Http\Controllers\Livewire\Erp\Utility\SystemUtility\BackUp::class, '__invoke'])->name('back-up');
            });
            Route::prefix('data-freeze')->as('data-freeze.')->group(function ()
            {
                Route::get('/data-freeze', [\App\Http\Controllers\Livewire\Erp\Utility\DataFreeze\DataFreeze::class, '__invoke'])->name('data-freeze');
                Route::get('/data-unfreeze', [\App\Http\Controllers\Livewire\Erp\Utility\DataFreeze\DataUnfreeze::class, '__invoke'])->name('data-unfreeze');
                Route::get('/gst-data-freeze', [\App\Http\Controllers\Livewire\Erp\Utility\DataFreeze\GstDataFreeze::class, '__invoke'])->name('gst-data-freeze');
                Route::get('/gst-data-unfreeze', [\App\Http\Controllers\Livewire\Erp\Utility\DataFreeze\GstDataUnfreeze::class, '__invoke'])->name('gst-data-unfreeze');
            });
            Route::prefix('advance-utility')->as('advance-utility.')->group(function ()
            {
                Route::get('/account-merge', [\App\Http\Controllers\Livewire\Erp\Utility\AdvanceUtility\AccountMerge::class, '__invoke'])->name('account-merge');
                Route::get('/product-merge', [\App\Http\Controllers\Livewire\Erp\Utility\AdvanceUtility\ProductMerge::class, '__invoke'])->name('product-merge');
                Route::get('/voucher-renumber', [\App\Http\Controllers\Livewire\Erp\Utility\AdvanceUtility\VoucherRenumber::class, '__invoke'])->name('voucher-renumber');
                Route::get('/data-delete', [\App\Http\Controllers\Livewire\Erp\Utility\AdvanceUtility\DataDelete::class, '__invoke'])->name('data-delete');
            });
            Route::prefix('data-utility')->as('data-utility.')->group(function ()
            {
                Route::get('/data-export', [\App\Http\Controllers\Livewire\Erp\Utility\DataUtility\DataExport::class, '__invoke'])->name('data-export');
                Route::get('/data-import', [\App\Http\Controllers\Livewire\Erp\Utility\DataUtility\DataImport::class, '__invoke'])->name('data-import');
                Route::get('/financial-year-delete', [\App\Http\Controllers\Livewire\Erp\Utility\DataUtility\FinancialYearDelete::class, '__invoke'])->name('financial-year-delete');
            });
            Route::prefix('havala')->as('havala.')->group(function ()
            {
               Route::get('/capital', [\App\Http\Controllers\Livewire\Erp\Utility\Havala\Capital\Index::class, '__invoke'])->name('capital.index');
               Route::get('/capital/create', [\App\Http\Controllers\Livewire\Erp\Utility\Havala\Capital\AddCapital::class, '__invoke'])->name('capital.create');
               Route::get('/depreciation', [\App\Http\Controllers\Livewire\Erp\Utility\Havala\Depreciation\Index::class, '__invoke'])->name('depreciation.index');
               Route::get('/depreciation/create', [App\Http\Controllers\Livewire\Erp\Utility\Havala\Depreciation\AddDepreciation::class, '__invoke'])->name('depreciation.create');
               Route::get('/havala-setup', [App\Http\Controllers\Livewire\Erp\Utility\Havala\HavalaSetup\Index::class, '__invoke'])->name('havala-setup.index');
            });
            Route::prefix('year-end')->as('year-end.')->group(function ()
            {
               Route::get('/new-financial-year', [App\Http\Controllers\Livewire\Erp\Utility\YearEnd\NewFinancialYear::class, '__invoke'])->name('new-financial-year.index');
               Route::get('/update-balance', [App\Http\Controllers\Livewire\Erp\Utility\YearEnd\UpdateBalance::class, '__invoke'])->name('update-balance');
            });
        });

        // Account Transaction routes
        Route::prefix('account-transaction')->as('account-transaction.')->group(function ()
        {
            // Cash/Bank Entry routes
            Route::prefix('cash-bank-entry')->as('cash-bank-entry.')->group(function ()
            {

                // Bank Payment routes
                Route::prefix('bank-payment')->as('bank-payment.')->group(function ()
                {   
                    Route::get('/', [\App\Http\Controllers\Erp\Account\AccountTransactionController::class, 'bankPaymentIndex'])->name('index');
                    Route::get('/create', [\App\Http\Controllers\Erp\Account\AccountTransactionController::class, 'bankPaymentCreate'])->name('create');
                    Route::get('/{id}/edit', [\App\Http\Controllers\Erp\Account\AccountTransactionController::class, 'bankPaymentEdit'])->name('edit');
                    Route::get('/filter', [\App\Http\Controllers\Erp\Account\AccountTransactionController::class, 'bankPaymentFilter'])->name('filter');
                    Route::delete('/{id}/destroy', [\App\Http\Controllers\Erp\Account\AccountTransactionController::class, 'bankPaymentDestroy'])->name('destroy');
                });

                // Bank Receipt routes
                Route::prefix('bank-receipt')->as('bank-receipt.')->group(function ()
                {   
                    Route::get('/', [\App\Http\Controllers\Erp\Account\AccountTransactionController::class, 'bankReceiptIndex'])->name('index');
                    Route::get('/create', [\App\Http\Controllers\Erp\Account\AccountTransactionController::class, 'bankReceiptCreate'])->name('create');
                    Route::get('/{id}/edit', [\App\Http\Controllers\Erp\Account\AccountTransactionController::class, 'bankReceiptEdit'])->name('edit');
                    Route::get('/filter', [\App\Http\Controllers\Erp\Account\AccountTransactionController::class, 'bankReceiptFilter'])->name('filter');
                    Route::delete('/{id}/destroy', [\App\Http\Controllers\Erp\Account\AccountTransactionController::class, 'bankReceiptDestroy'])->name('destroy');
                });

                // Cash Payment routes
                Route::prefix('cash-payment')->as('cash-payment.')->group(function ()
                {   
                    Route::get('/', [\App\Http\Controllers\Erp\Account\AccountTransactionController::class, 'cashPaymentIndex'])->name('index');
                    Route::get('/create', [\App\Http\Controllers\Erp\Account\AccountTransactionController::class, 'cashPaymentCreate'])->name('create');
                    Route::get('/{id}/edit', [\App\Http\Controllers\Erp\Account\AccountTransactionController::class, 'cashPaymentEdit'])->name('edit');
                    Route::get('/filter', [\App\Http\Controllers\Erp\Account\AccountTransactionController::class, 'cashPaymentFilter'])->name('filter');
                    Route::delete('/{id}/destroy', [\App\Http\Controllers\Erp\Account\AccountTransactionController::class, 'cashPaymentDestroy'])->name('destroy');
                });

                // Cash Receipt routes
                Route::prefix('cash-receipt')->as('cash-receipt.')->group(function ()
                {   
                    Route::get('/', [\App\Http\Controllers\Erp\Account\AccountTransactionController::class, 'cashReceiptIndex'])->name('index');
                    Route::get('/create', [\App\Http\Controllers\Erp\Account\AccountTransactionController::class, 'cashReceiptCreate'])->name('create');
                    Route::get('/{id}/edit', [\App\Http\Controllers\Erp\Account\AccountTransactionController::class, 'cashReceiptEdit'])->name('edit');
                    Route::get('/filter', [\App\Http\Controllers\Erp\Account\AccountTransactionController::class, 'cashReceiptFilter'])->name('filter');
                    Route::delete('/{id}/destroy', [\App\Http\Controllers\Erp\Account\AccountTransactionController::class, 'cashReceiptDestroy'])->name('destroy');
                });

                // Cash Receipt routes
                Route::prefix('contra')->as('contra.')->group(function ()
                {   
                    Route::get('/', [\App\Http\Controllers\Erp\Account\AccountTransactionController::class, 'contraIndex'])->name('index');
                    Route::get('/create', [\App\Http\Controllers\Erp\Account\AccountTransactionController::class, 'contraCreate'])->name('create');
                    Route::get('/{id}/edit', [\App\Http\Controllers\Erp\Account\AccountTransactionController::class, 'contraEdit'])->name('edit');
                    Route::get('/filter', [\App\Http\Controllers\Erp\Account\AccountTransactionController::class, 'contraFilter'])->name('filter');
                    Route::delete('/{id}/destroy', [\App\Http\Controllers\Erp\Account\AccountTransactionController::class, 'contraDestroy'])->name('destroy');
                });
                
                // Edit Audit route
                Route::post('edit/is_audit', [\App\Http\Controllers\Erp\Account\AccountTransactionController::class, 'editAudit'])->name('edit.audit');
            });
            
            Route::prefix('cn-dn-entry')->as('cn-dn-entry.')->group(function ()
            {
                Route::resource('cn-entry-with-out-stock', App\Http\Controllers\Erp\CNDNEntry\CNEntryWithOutStockController::class);
                Route::resource('dn-entry-with-out-stock', App\Http\Controllers\Erp\CNDNEntry\DNEntryWithOutStockController::class);
                Route::resource('cn-entry-with-stock', App\Http\Controllers\Erp\CNDNEntry\CNEntryWithStockController::class);
                Route::resource('dn-entry-with-stock', App\Http\Controllers\Erp\CNDNEntry\DNEntryWithStockController::class);
                Route::post('cn-entry-with-out-stock/edit/is_audit', [\App\Http\Controllers\Erp\CNDNEntry\CNEntryWithOutStockController::class, 'updateIsAudit'])->name('cn-entry-with-out-stock.update-is-audit');
                Route::post('dn-entry-with-out-stock/edit/is_audit', [\App\Http\Controllers\Erp\CNDNEntry\DNEntryWithOutStockController::class, 'updateIsAudit'])->name('dn-entry-with-out-stock.update-is-audit');
                Route::post('cn-entry-with-stock/edit/is_audit', [\App\Http\Controllers\Erp\CNDNEntry\CNEntryWithStockController::class, 'updateIsAudit'])->name('cn-entry-with-stock.update-is-audit');
                Route::post('dn-entry-with-stock/edit/is_audit', [\App\Http\Controllers\Erp\CNDNEntry\DNEntryWithStockController::class, 'updateIsAudit'])->name('dn-entry-with-stock.update-is-audit');

                Route::get('cn-entry-with-out-stocks/filter', [App\Http\Controllers\Erp\CNDNEntry\CNEntryWithOutStockController::class, 'filter'])->name('cn-entry-with-out-stock.filter');
                Route::get('cn-entry-with-stocks/filter', [App\Http\Controllers\Erp\CNDNEntry\CNEntryWithStockController::class, 'filter'])->name('cn-entry-with-stock.filter');

                Route::get('dn-entry-with-out-stocks/filter', [\App\Http\Controllers\Erp\CNDNEntry\DNEntryWithOutStockController::class, 'filter'])->name('dn-entry-with-out-stock.filter');
                Route::get('dn-entry-with-stocks/filter', [\App\Http\Controllers\Erp\CNDNEntry\DNEntryWithStockController::class, 'filter'])->name('dn-entry-with-stock.filter');
            });

            // Purchase Entry Routes
            Route::resource('purchase-entry', App\Http\Controllers\Erp\Transactions\PurchaseEntryController::class);
            Route::get('purchase-entries/filter', [App\Http\Controllers\Erp\Transactions\PurchaseEntryController::class, 'filter'])->name('purchase-entry.filter');
            
            // Sale Entry Routes
            Route::resource('sale-entry', App\Http\Controllers\Erp\Transactions\SaleEntryController::class);

            // Journal Entry
            Route::prefix('journal-entry')->as('journal-entry.')->group(function ()
            {
                Route::get('/index', [\App\Http\Controllers\Erp\JournalEntry\JournalEntryController::class, 'index'])->name('index');
                Route::get('create/', [\App\Http\Controllers\Erp\JournalEntry\JournalEntryController::class, 'create'])->name('create');
                Route::get('edit/{id}', [\App\Http\Controllers\Erp\JournalEntry\JournalEntryController::class, 'edit'])->name('edit');
                Route::delete('destroy/{id}', [\App\Http\Controllers\Erp\JournalEntry\JournalEntryController::class, 'destroy'])->name('destroy');
                Route::post('edit/is_audit', [\App\Http\Controllers\Erp\JournalEntry\JournalEntryController::class, 'updateIsAudit'])->name('update-is-audit');
                Route::get('/filter', [\App\Http\Controllers\Erp\JournalEntry\JournalEntryController::class, 'filter'])->name('filter');
            });
            // Jobwork out routes
            Route::resource('jobwork-out', \App\Http\Controllers\Erp\Transactions\JobworkOutController::class);// Jobwork out routes
            Route::post('jobwork-out/edit/is_audit', [\App\Http\Controllers\Erp\Transactions\JobworkOutController::class, 'updateIsAudit'])->name('jobwork-out.update-is-audit');// Jobwork out routes
            Route::get('jobwork-outs/filter', [\App\Http\Controllers\Erp\Transactions\JobworkOutController::class, 'filter'])->name('jobwork-out.filter');// Jobwork out routes

            Route::resource('jobwork-in', \App\Http\Controllers\Erp\Transactions\JobworkInController::class);
            Route::get('jobwork-ins/filter', [\App\Http\Controllers\Erp\Transactions\JobworkInController::class, 'filter'])->name('jobwork-in.filter');
            Route::post('jobwork-ins/edit/is_audit', [\App\Http\Controllers\Erp\Transactions\JobworkInController::class, 'updateIsAudit'])->name('jobwork-in.update-is-audit');


            // Quick Entry
            Route::prefix('quick-entry')->as('quick-entry.')->group(function ()
            {
                Route::prefix('cash-bank-entry')->as('cash-bank-entry.')->group(function ()
                {
                    Route::get('/', [App\Http\Controllers\Erp\QuickEntry\QuickEntryController::class, 'cashBankIndex'])->name('index');
                });

                Route::prefix('journal-entry')->as('journal-entry.')->group(function ()
                {
                    Route::get('/', [App\Http\Controllers\Erp\QuickEntry\QuickEntryController::class, 'journalIndex'])->name('index');
                });
            });

            Route::resource('forex-adjustment', \App\Http\Controllers\Erp\Transactions\ForexAdjustment\ForexAdjustmentController::class);
            Route::post('forex-adjustment/edit/is_audit', [\App\Http\Controllers\Erp\Transactions\ForexAdjustment\ForexAdjustmentController::class, 'updateIsAudit'])->name('forex-adjustment.update-is-audit');
            Route::get('forex-adjustments/filter', [\App\Http\Controllers\Erp\Transactions\ForexAdjustment\ForexAdjustmentController::class, 'filter'])->name('forex-adjustment.filter');
        });

        // Consultant routes
        Route::prefix('consultant')->as('consultant.')->group(function ()
        {
            Route::resource('provisional-invoice', \App\Http\Controllers\Erp\Consultant\ProvisionalInvoiceController::class);
            Route::post('provisional-invoice/edit/is_audit', [\App\Http\Controllers\Erp\Consultant\ProvisionalInvoiceController::class, 'updateIsAudit'])->name('provisional-invoice.update-is-audit');

            // Changes made by khimaji
            Route::resource('direct-invoice', \App\Http\Controllers\Erp\Consultant\DirectInvoiceController::class);
            Route::post('direct-invoice/edit/is_audit', [\App\Http\Controllers\Erp\Consultant\DirectInvoiceController::class, 'updateIsAudit'])->name('direct-invoice.update-is-audit');

            // Changes made by dev 
            Route::resource('bank-receipt', \App\Http\Controllers\Erp\CashBankReceipt\BankReceiptController::class);
            Route::post('bank-receipt/edit/is_audit', [\App\Http\Controllers\Erp\CashBankReceipt\BankReceiptController::class, 'updateIsAudit'])->name('bank-receipt.update-is-audit');

            Route::resource('cash-receipt', \App\Http\Controllers\Erp\CashBankReceipt\CashReceiptController::class);
            Route::post('cash-receipt/edit/is_audit', [\App\Http\Controllers\Erp\CashBankReceipt\CashReceiptController::class, 'updateIsAudit'])->name('cash-receipt.update-is-audit');
            Route::get('pending-invoice', [\App\Http\Controllers\Livewire\Erp\Consultant\PendingInvoice\ExportPendingInvoice::class, '__invoke'])->name('pending-invoice.index');

            Route::get('bill-from-prov', [\App\Http\Controllers\Livewire\Erp\Consultant\BillFromProv\Filter::class, '__invoke'])->name('bill-from-prov.filter');
            Route::resource('final-invoice', \App\Http\Controllers\Erp\Consultant\FinalInvoice\FinalInvoiceController::class);
            Route::resource('provisional-outstanding', \App\Http\Controllers\Erp\Consultant\ProvisionalOutstanding\ProvisionalOutstandingController::class);
        });

        // Report routes
        Route::prefix('report')->as('report.')->group(function ()
        {
            Route::prefix('account-book')->as('account-book.')->group(function ()
            {
                Route::resource('ledger', \App\Http\Controllers\Erp\Report\AccountBook\LedgerController::class);
                Route::get('ledgers/export/{id}/{type}', [\App\Http\Controllers\Erp\Report\AccountBook\LedgerController::class, 'allShow'])->name('ledger.allShow');
                Route::get('voucher-list', [\App\Http\Controllers\Livewire\Erp\Report\AccountBook\VoucherList::class, '__invoke'])->name('voucher-list.index');
                Route::resource('day-book', \App\Http\Controllers\Erp\Report\AccountBook\DayBookController::class);
                Route::resource('cash-book', \App\Http\Controllers\Erp\Report\AccountBook\CashBookController::class);
                Route::resource('bank-book', \App\Http\Controllers\Erp\Report\AccountBook\BankBookController::class);
            });

            Route::prefix('outstanding')->as('outstanding.')->group(function ()
            {
                Route::resource('receivable', \App\Http\Controllers\Erp\Report\Outstanding\ReceivableController::class);
                Route::resource('payable', \App\Http\Controllers\Erp\Report\Outstanding\PayableController::class);
                Route::resource('billwise-receivable', \App\Http\Controllers\Erp\Report\Outstanding\BillwiseReceivableController::class);
                Route::resource('billwise-payable', \App\Http\Controllers\Erp\Report\Outstanding\BillwisePayableController::class);
            });

            Route::prefix('register')->as('register.')->group(function ()
            {
                Route::resource('sales-register', \App\Http\Controllers\Erp\Report\Register\SalesRegisterController::class);
                Route::resource('parchase-register', \App\Http\Controllers\Erp\Report\Register\PurchaseRegisterController::class);
                Route::resource('credit-note-with-stock-register', \App\Http\Controllers\Erp\Report\Register\CreditNoteWithStockRegisterController::class);
                Route::resource('credit-note-w_o-stock-register', \App\Http\Controllers\Erp\Report\Register\CreditNoteWithOutStockRegisterController::class);
                Route::resource('debit-note-with-stock-register', \App\Http\Controllers\Erp\Report\Register\DebitNoteWithStockRegisterController::class);
                Route::resource('debit-note-w_o-stock-register', \App\Http\Controllers\Erp\Report\Register\DebitNoteWithOutStockRegisterController::class);
            });

            Route::prefix('balance-sheet')->as('balance-sheet.')->group(function ()
            {
                Route::prefix('trial-balance')->as('trial-balance.')->group(function ()
                {
                    Route::get('/trial-balance', [\App\Http\Controllers\Livewire\Erp\Report\BalanceSheet\TrialBalance\TrialBalance::class, '__invoke'])->name('trial-balance');
                    Route::get('/opening-balance', [\App\Http\Controllers\Livewire\Erp\Report\BalanceSheet\TrialBalance\OpeningBalance::class, '__invoke'])->name('opening-balance');
                });
                Route::get('/trading-account', [\App\Http\Controllers\Livewire\Erp\Report\BalanceSheet\TradingAccount::class, '__invoke'])->name('trading-account');
                Route::get('/pl-statement', [\App\Http\Controllers\Livewire\Erp\Report\BalanceSheet\PLStatement::class, '__invoke'])->name('pl-statement');
                Route::get('/balance-sheet', [\App\Http\Controllers\Livewire\Erp\Report\BalanceSheet\BalanceSheet::class, '__invoke'])->name('balance-sheet');
                Route::get('/trending-pl', [\App\Http\Controllers\Livewire\Erp\Report\BalanceSheet\TrendingPl::class, '__invoke'])->name('trending-pl');    
            });

            Route::prefix('stock-report')->as('stock-report.')->group(function ()
            {
                Route::get('/product-ledger', [\App\Http\Controllers\Livewire\Erp\Report\StockReport\ProductLedger\Index::class, '__invoke'])->name('product-ledger.index');
                Route::get('/product-ledger/show/{id}', [\App\Http\Controllers\Livewire\Erp\Report\StockReport\ProductLedger\Show::class, '__invoke'])->name('product-ledger.show');
                Route::get('/partywise-report', [\App\Http\Controllers\Livewire\Erp\Report\StockReport\PartywiseReport\Index::class, '__invoke'])->name('partywise-report.index');
                Route::get('/partywise-report/show/{id}', [\App\Http\Controllers\Livewire\Erp\Report\StockReport\PartywiseReport\Show::class, '__invoke'])->name('partywise-report.show');
            });
            Route::prefix('other-report')->as('other-report.')->group(function ()
            {
                Route::get('/interest-report', [\App\Http\Controllers\Livewire\Erp\Report\OtherReport\IntrestReport::class, '__invoke'])->name('interest-report');
                Route::get('/sms-report', [\App\Http\Controllers\Livewire\Erp\Report\OtherReport\SmsReport::class, '__invoke'])->name('sms-report');
                Route::prefix('email-report')->as('email-report.')->group(function ()
                {
                    Route::get('/profile-email', [\App\Http\Controllers\Livewire\Erp\Report\OtherReport\EmailReport\ProfileEmail::class, '__invoke'])->name('profile-email');
                    Route::get('/other-email', [\App\Http\Controllers\Livewire\Erp\Report\OtherReport\EmailReport\OtherEmail::class, '__invoke'])->name('other-email');
                });
                Route::get('/template-list', [\App\Http\Controllers\Livewire\Erp\Report\OtherReport\TemplateList::class, '__invoke'])->name('template-list');
                Route::get('/missing-voucher-number', [\App\Http\Controllers\Livewire\Erp\Report\OtherReport\MissingVoucherNumber::class, '__invoke'])->name('missing-voucher-number');
                Route::get('/cancel-voucher-report', [\App\Http\Controllers\Livewire\Erp\Report\OtherReport\CancelVoucherReport::class, '__invoke'])->name('cancel-voucher-report');
            });
            Route::prefix('analysis-report')->as('analysis-report.')->group(function ()
            {
                Route::get('/daily-status', [\App\Http\Controllers\Livewire\Erp\Report\AnalysisReport\DailyStatus::class, '__invoke'])->name('daily-status');
                Route::get('/performance-report', [\App\Http\Controllers\Livewire\Erp\Report\AnalysisReport\PerformanceReport::class, '__invoke'])->name('performance-report');
                Route::get('/sales-purchase-report', [\App\Http\Controllers\Livewire\Erp\Report\AnalysisReport\SalesPurchaseReport::class, '__invoke'])->name('sales-purchase-report');
                Route::get('/partywise-report', [\App\Http\Controllers\Livewire\Erp\Report\AnalysisReport\PartywiseReport::class, '__invoke'])->name('partywise-report');
                Route::get('/account-analysis', [\App\Http\Controllers\Livewire\Erp\Report\AnalysisReport\AccountAnalysis::class, '__invoke'])->name('account-analysis');
                Route::get('/fund-flow', [\App\Http\Controllers\Livewire\Erp\Report\AnalysisReport\FundFlow::class, '__invoke'])->name('fund-flow');
                Route::get('/cash-flow', [\App\Http\Controllers\Livewire\Erp\Report\AnalysisReport\CashFlow::class, '__invoke'])->name('cash-flow');
            });
        });
    });
});