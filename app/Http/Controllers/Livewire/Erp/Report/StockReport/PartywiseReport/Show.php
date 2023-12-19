<?php

namespace App\Http\Controllers\Livewire\Erp\Report\StockReport\PartywiseReport;

use Livewire\Component;
use App\Models\SaleEntry;
use App\Models\PurchaseEntry;
use App\Models\Account;

class Show extends Component
{
    public $productEntries;
    public $account;

    public $receipt_qty_total;
    public $receipt_amount_total;
    public $issue_qty_total;
    public $issue_amount_total;

    public $saleEntries = [];
    public $purchaseEntries = [];

    public function mount($id)
    {
        $this->account = Account::find($id);
        $this->saleEntries = SaleEntry::where('party_ac_id', $id)->where('company_id', auth()->user()->company->id)->get();
        $this->purchaseEntries = PurchaseEntry::where('party_ac_id', $id)->where('company_id', auth()->user()->company->id)->get();
        // $this->productEntries = array_merge($saleEntries, $purchaseEntries);
    }

    public function purchaseEntryDelete($id, $key)
    {
        $purchaseEntry = PurchaseEntry::find($id);
        $purchaseEntry->delete();
        unset($this->purchaseEntries[$key]);
        $this->dispatchBrowserEvent('entry_table');
    }
    
    public function saleEntryDelete($id, $key)
    {
        $saleEntry = SaleEntry::find($id);
        $saleEntry->delete();
        unset($this->saleEntries[$key]);
        $this->dispatchBrowserEvent('entry_table');
    }

    public function render()
    {
        return view('livewire.erp.report.stock-report.partywise-report.show')->extends('erp.app');
    }
}
