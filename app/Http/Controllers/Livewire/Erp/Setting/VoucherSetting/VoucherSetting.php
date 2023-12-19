<?php

namespace App\Http\Controllers\Livewire\Erp\Setting\VoucherSetting;

use Livewire\Component;
use App\Models\AccountGroup;
use App\Enum\Enum;
use App\Models\Setting;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class VoucherSetting extends Component
{
	use LivewireAlert;

	public $account_groups = [];

	public $bank_receipts = [];
	public $bank_payments = [];
	public $contra = [];
	public $cash_payments = [];
	public $cash_receipts = [];
	public $journal = [];
	public $credit_note = [];
	public $debit_note = [];

	public $purchase_invoices = [];
	public $purchase_return = [];
	public $purchase_quotation = [];
	public $sales_invoice = [];
	public $sales_return = [];
	public $sales_quotation = [];

	public $credit_with_stock = [];
	public $debit_with_stock = [];
	public $credit_with_out_stock = [];
	public $debit_with_out_stock = [];

    public $production = [];
    public $stock_transfer = [];
    public $gst_expense = [];
    public $gst_income = [];
    public $gst_journal = [];
    public $utilization_entry = [];
    public $gst_bank_payment = [];
    public $gst_cash_payment = [];
    public $rcm_bank_payment = [];
    public $rcm_cash_payment = [];

    public $openMenu;

	public function mount()
	{
		$this->account_groups = AccountGroup::where('company_id', auth()->user()->company->id)->get();
		
		$bank_receipts = Setting::where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::BANK_RECEIPT_SETUP)->where('company_id', auth()->user()->company->id)->get();
        foreach ($bank_receipts as $key => $bank_receipt) {
            if ($bank_receipt->type == 'checkbox') {
                $this->bank_receipts[$bank_receipt->key] = $bank_receipt->value == 1 ? true : false;
            } else {
                $this->bank_receipts[$bank_receipt->key] = $bank_receipt->value;
            }
        }
		$bank_payments = Setting::where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::BANK_PAYMENT_SETUP)->where('company_id', auth()->user()->company->id)->get();
        foreach ($bank_payments as $key => $bank_payment) {
            if ($bank_payment->type == 'checkbox') {
                $this->bank_payments[$bank_payment->key] = $bank_payment->value == 1 ? true : false;
            } else {
                $this->bank_payments[$bank_payment->key] = $bank_payment->value;
            }
        }
        $contras = Setting::where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::CONTRA_SETUP)->where('company_id', auth()->user()->company->id)->get();
        foreach ($contras as $key => $contra) {
            if ($contra->type == 'checkbox') {
                $this->contra[$contra->key] = $contra->value == 1 ? true : false;
            } else {
                $this->contra[$contra->key] = $contra->value;
            }
        }
        $cash_receipts = Setting::where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::CASH_RECEIPT_SETUP)->where('company_id', auth()->user()->company->id)->get();
        foreach ($cash_receipts as $key => $cash_receipt) {
            if ($cash_receipt->type == 'checkbox') {
                $this->cash_receipts[$cash_receipt->key] = $cash_receipt->value == 1 ? true : false;
            } else {
                $this->cash_receipts[$cash_receipt->key] = $cash_receipt->value;
            }
        }
        $cash_payments = Setting::where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::CASH_PAYMENT_SETUP)->where('company_id', auth()->user()->company->id)->get();
        foreach ($cash_payments as $key => $cash_payment) {
            if ($cash_payment->type == 'checkbox') {
                $this->cash_payments[$cash_payment->key] = $cash_payment->value == 1 ? true : false;
            } else {
                $this->cash_payments[$cash_payment->key] = $cash_payment->value;
            }
        }
        $journals = Setting::where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::JOURNAL_SETUP)->where('company_id', auth()->user()->company->id)->get();
        foreach ($journals as $key => $journal) {
            if ($journal->type == 'checkbox') {
                $this->journal[$journal->key] = $journal->value == 1 ? true : false;
            } else {
                $this->journal[$journal->key] = $journal->value;
            }
        }

        $credit_notes = Setting::where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::CREDIT_NOTE_SETUP)->where('company_id', auth()->user()->company->id)->get();
        foreach ($credit_notes as $key => $credit_note) {
            if ($credit_note->type == 'checkbox') {
                $this->credit_note[$credit_note->key] = $credit_note->value == 1 ? true : false;
            } else {
                $this->credit_note[$credit_note->key] = $credit_note->value;
            }
        }

        $debit_notes = Setting::where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::DEBIT_NOTE_SETUP)->where('company_id', auth()->user()->company->id)->get();
        foreach ($debit_notes as $key => $debit_note) {
            if ($debit_note->type == 'checkbox') {
                $this->debit_note[$debit_note->key] = $debit_note->value == 1 ? true : false;
            } else {
                $this->debit_note[$debit_note->key] = $debit_note->value;
            }
        }
        $purchase_invoices = Setting::where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::PURCHASE_INVOICE_SETUP)->where('company_id', auth()->user()->company->id)->get();
        foreach ($purchase_invoices as $key => $purchase_invoice) {
            if ($purchase_invoice->type == 'checkbox') {
                $this->purchase_invoices[$purchase_invoice->key] = $purchase_invoice->value == 1 ? true : false;
            } else {
                $this->purchase_invoices[$purchase_invoice->key] = $purchase_invoice->value;
            }
        }
        $purchase_returns = Setting::where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::PURCHASE_RETURN_SETUP)->where('company_id', auth()->user()->company->id)->get();
        foreach ($purchase_returns as $key => $purchase_return) {
            if ($purchase_return->type == 'checkbox') {
                $this->purchase_return[$purchase_return->key] = $purchase_return->value == 1 ? true : false;
            } else {
                $this->purchase_return[$purchase_return->key] = $purchase_return->value;
            }
        }
        $purchase_quotations = Setting::where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::PURCHASE_QUOTATION_SETUP)->where('company_id', auth()->user()->company->id)->get();
        foreach ($purchase_quotations as $key => $purchase_quotation) {
            if ($purchase_quotation->type == 'checkbox') {
                $this->purchase_quotation[$purchase_quotation->key] = $purchase_quotation->value == 1 ? true : false;
            } else {
                $this->purchase_quotation[$purchase_quotation->key] = $purchase_quotation->value;
            }
        }
        $sales_invoices = Setting::where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::SALES_INVOICE_SETUP)->where('company_id', auth()->user()->company->id)->get();
        foreach ($sales_invoices as $key => $sales_invoice) {
            if ($sales_invoice->type == 'checkbox') {
                $this->sales_invoice[$sales_invoice->key] = $sales_invoice->value == 1 ? true : false;
            } else {
                $this->sales_invoice[$sales_invoice->key] = $sales_invoice->value;
            }
        }
        $sales_returns = Setting::where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::SALES_RETURN_SETUP)->where('company_id', auth()->user()->company->id)->get();
        foreach ($sales_returns as $key => $sales_return) {
            if ($sales_return->type == 'checkbox') {
                $this->sales_return[$sales_return->key] = $sales_return->value == 1 ? true : false;
            } else {
                $this->sales_return[$sales_return->key] = $sales_return->value;
            }
        }
        $sales_quotations = Setting::where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::SALES_QUOTATION_SETUP)->where('company_id', auth()->user()->company->id)->get();
        foreach ($sales_quotations as $key => $sales_quotation) {
            if ($sales_quotation->type == 'checkbox') {
                $this->sales_quotation[$sales_quotation->key] = $sales_quotation->value == 1 ? true : false;
            } else {
                $this->sales_quotation[$sales_quotation->key] = $sales_quotation->value;
            }
        }
        $credit_with_stocks = Setting::where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::CREDIT_WITH_STOCK_SETUP)->where('company_id', auth()->user()->company->id)->get();
        foreach ($credit_with_stocks as $key => $credit_with_stock) {
            if ($credit_with_stock->type == 'checkbox') {
                $this->credit_with_stock[$credit_with_stock->key] = $credit_with_stock->value == 1 ? true : false;
            } else {
                $this->credit_with_stock[$credit_with_stock->key] = $credit_with_stock->value;
            }
        }
        $debit_with_stocks = Setting::where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::DEBIT_WITH_STOCK_SETUP)->where('company_id', auth()->user()->company->id)->get();
        foreach ($debit_with_stocks as $key => $debit_with_stock) {
            if ($debit_with_stock->type == 'checkbox') {
                $this->debit_with_stock[$debit_with_stock->key] = $debit_with_stock->value == 1 ? true : false;
            } else {
                $this->debit_with_stock[$debit_with_stock->key] = $debit_with_stock->value;
            }
        }
        $credit_with_out_stocks = Setting::where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::CREDIT_WITH_OUT_STOCK_SETUP)->where('company_id', auth()->user()->company->id)->get();
        foreach ($credit_with_out_stocks as $key => $credit_with_out_stock) {
            if ($credit_with_out_stock->type == 'checkbox') {
                $this->credit_with_out_stock[$credit_with_out_stock->key] = $credit_with_out_stock->value == 1 ? true : false;
            } else {
                $this->credit_with_out_stock[$credit_with_out_stock->key] = $credit_with_out_stock->value;
            }
        }
        $debit_with_out_stocks = Setting::where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::DEBIT_WITH_OUT_STOCK_SETUP)->where('company_id', auth()->user()->company->id)->get();
        foreach ($debit_with_out_stocks as $key => $debit_with_out_stock) {
            if ($debit_with_out_stock->type == 'checkbox') {
                $this->debit_with_out_stock[$debit_with_out_stock->key] = $debit_with_out_stock->value == 1 ? true : false;
            } else {
                $this->debit_with_out_stock[$debit_with_out_stock->key] = $debit_with_out_stock->value;
            }
        }
        $productions = Setting::where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::PRODUCTION_SETUP)->where('company_id', auth()->user()->company->id)->get();
        foreach ($productions as $key => $production) {
            if ($production->type == 'checkbox') {
                $this->production[$production->key] = $production->value == 1 ? true : false;
            } else {
                $this->production[$production->key] = $production->value;
            }
        }
        $stock_transfers = Setting::where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::STOCK_TRANSFER_SETUP)->where('company_id', auth()->user()->company->id)->get();
        foreach ($stock_transfers as $key => $stock_transfer) {
            if ($stock_transfer->type == 'checkbox') {
                $this->stock_transfer[$stock_transfer->key] = $stock_transfer->value == 1 ? true : false;
            } else {
                $this->stock_transfer[$stock_transfer->key] = $stock_transfer->value;
            }
        }
        $gst_expenses = Setting::where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::GST_EXPENSE_SETUP)->where('company_id', auth()->user()->company->id)->get();
        foreach ($gst_expenses as $key => $gst_expense) {
            if ($gst_expense->type == 'checkbox') {
                $this->gst_expense[$gst_expense->key] = $gst_expense->value == 1 ? true : false;
            } else {
                $this->gst_expense[$gst_expense->key] = $gst_expense->value;
            }
        }
        $gst_incomes = Setting::where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::GST_INCOME_SETUP)->where('company_id', auth()->user()->company->id)->get();
        foreach ($gst_incomes as $key => $gst_income) {
            if ($gst_income->type == 'checkbox') {
                $this->gst_income[$gst_income->key] = $gst_income->value == 1 ? true : false;
            } else {
                $this->gst_income[$gst_income->key] = $gst_income->value;
            }
        }
        $gst_journals = Setting::where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::GST_JOURNAL_SETUP)->where('company_id', auth()->user()->company->id)->get();
        foreach ($gst_journals as $key => $gst_journal) {
            if ($gst_journal->type == 'checkbox') {
                $this->gst_journal[$gst_journal->key] = $gst_journal->value == 1 ? true : false;
            } else {
                $this->gst_journal[$gst_journal->key] = $gst_journal->value;
            }
        }
        $utilization_entries = Setting::where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::UTILIZATION_ENTRY_SETUP)->where('company_id', auth()->user()->company->id)->get();
        foreach ($utilization_entries as $key => $utilization_entry) {
            if ($utilization_entry->type == 'checkbox') {
                $this->utilization_entry[$utilization_entry->key] = $utilization_entry->value == 1 ? true : false;
            } else {
                $this->utilization_entry[$utilization_entry->key] = $utilization_entry->value;
            }
        }
        $gst_bank_payments = Setting::where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::GST_BANK_PAYMENT_SETUP)->where('company_id', auth()->user()->company->id)->get();
        foreach ($gst_bank_payments as $key => $gst_bank_payment) {
            if ($gst_bank_payment->type == 'checkbox') {
                $this->gst_bank_payment[$gst_bank_payment->key] = $gst_bank_payment->value == 1 ? true : false;
            } else {
                $this->gst_bank_payment[$gst_bank_payment->key] = $gst_bank_payment->value;
            }
        }
        $gst_cash_payments = Setting::where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::GST_CASH_PAYMENT_SETUP)->where('company_id', auth()->user()->company->id)->get();
        foreach ($gst_cash_payments as $key => $gst_cash_payment) {
            if ($gst_cash_payment->type == 'checkbox') {
                $this->gst_cash_payment[$gst_cash_payment->key] = $gst_cash_payment->value == 1 ? true : false;
            } else {
                $this->gst_cash_payment[$gst_cash_payment->key] = $gst_cash_payment->value;
            }
        }
        $rcm_bank_payments = Setting::where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::RCM_BANK_PAYMENT_SETUP)->where('company_id', auth()->user()->company->id)->get();
        foreach ($rcm_bank_payments as $key => $rcm_bank_payment) {
            if ($rcm_bank_payment->type == 'checkbox') {
                $this->rcm_bank_payment[$rcm_bank_payment->key] = $rcm_bank_payment->value == 1 ? true : false;
            } else {
                $this->rcm_bank_payment[$rcm_bank_payment->key] = $rcm_bank_payment->value;
            }
        }
        $rcm_cash_payments = Setting::where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::RCM_CASH_PAYMENT_SETUP)->where('company_id', auth()->user()->company->id)->get();
        foreach ($rcm_cash_payments as $key => $rcm_cash_payment) {
            if ($rcm_cash_payment->type == 'checkbox') {
                $this->rcm_cash_payment[$rcm_cash_payment->key] = $rcm_cash_payment->value == 1 ? true : false;
            } else {
                $this->rcm_cash_payment[$rcm_cash_payment->key] = $rcm_cash_payment->value;
            }
        }
	}

	public function openMenu($menu)
    {
        $this->openMenu = $menu;
    }

    public function submit()
    {
    	foreach ($this->bank_receipts as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::BANK_RECEIPT_SETUP)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }
        foreach ($this->bank_payments as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::BANK_PAYMENT_SETUP)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }
        foreach ($this->contra as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::CONTRA_SETUP)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }
        foreach ($this->cash_payments as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::CASH_PAYMENT_SETUP)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }
        foreach ($this->cash_receipts as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::CASH_RECEIPT_SETUP)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }
        foreach ($this->journal as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::JOURNAL_SETUP)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }
        foreach ($this->credit_note as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::CREDIT_NOTE_SETUP)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }
        foreach ($this->debit_note as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::DEBIT_NOTE_SETUP)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }
        foreach ($this->purchase_invoices as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::PURCHASE_INVOICE_SETUP)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }

        foreach ($this->purchase_return as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::PURCHASE_RETURN_SETUP)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }
        foreach ($this->purchase_quotation as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::PURCHASE_QUOTATION_SETUP)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }
        foreach ($this->sales_invoice as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::SALES_INVOICE_SETUP)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }
        foreach ($this->sales_return as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::SALES_RETURN_SETUP)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }

        foreach ($this->sales_quotation as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::SALES_QUOTATION_SETUP)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }
        foreach ($this->credit_with_stock as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::CREDIT_WITH_STOCK_SETUP)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }
        foreach ($this->debit_with_stock as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::DEBIT_WITH_STOCK_SETUP)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }
        foreach ($this->credit_with_out_stock as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::CREDIT_WITH_OUT_STOCK_SETUP)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }

        foreach ($this->debit_with_out_stock as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::DEBIT_WITH_OUT_STOCK_SETUP)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }
        foreach ($this->production as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::PRODUCTION_SETUP)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }
        foreach ($this->stock_transfer as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::STOCK_TRANSFER_SETUP)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }
        foreach ($this->gst_expense as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::GST_EXPENSE_SETUP)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }
        foreach ($this->gst_income as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::GST_INCOME_SETUP)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }
        foreach ($this->gst_journal as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::GST_JOURNAL_SETUP)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }
        foreach ($this->utilization_entry as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::UTILIZATION_ENTRY_SETUP)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }
        foreach ($this->gst_bank_payment as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::GST_BANK_PAYMENT_SETUP)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }

        foreach ($this->gst_cash_payment as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::GST_CASH_PAYMENT_SETUP)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }
        foreach ($this->rcm_bank_payment as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::RCM_BANK_PAYMENT_SETUP)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }

        foreach ($this->rcm_cash_payment as $key => $value) {
            $setting = Setting::where('key', $key)->where('menu', Enum::VOUCHER_SETUP_MENU)->where('sub_menu', Enum::RCM_CASH_PAYMENT_SETUP)->where('company_id', auth()->user()->company->id)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }

        $this->alert('success', 'Voucher Setting Updated', [
            'position' => 'center',
            'toast' => true
        ]);
    }
    public function render()
    {
        return view('livewire.erp.setting.voucher-setting.voucher-setting')->extends('erp.app');
    }
}
