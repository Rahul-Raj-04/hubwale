<?php

namespace App\Http\Controllers\Livewire\Erp\Report\StockReport\ProductLedger;

use App\Models\ErpProduct;
use Livewire\Component;
use App\Models\SaleEntry;
use App\Models\PurchaseEntry;

class Show extends Component
{
    public $productEntries;
    public $product;

    public $receipt_qty_total;
    public $receipt_amount_total;
    public $issue_qty_total;
    public $issue_amount_total;

    public function mount($id)
    {
        $this->product = ErpProduct::find($id);
        $saleEntries = SaleEntry::where('erp_product_id', $id)->where('company_id', auth()->user()->company->id)->get()->toArray();
        $purchaseEntries = PurchaseEntry::where('erp_product_id', $id)->where('company_id', auth()->user()->company->id)->get()->toArray();
        $this->productEntries = array_merge($saleEntries, $purchaseEntries);

        $this->receipt_qty_total = array_sum(array_column($purchaseEntries, 'qty'));
        $this->issue_qty_total = array_sum(array_column($saleEntries, 'qty'));
        $this->receipt_amount_total = array_sum(array_column($purchaseEntries, 'amount'));
        $this->issue_amount_total = array_sum(array_column($saleEntries, 'amount'));
    }

    public function edit($key)
    {
        if($this->productEntries[$key]['type'] == 'sales_invoice' || $this->productEntries[$key]['type'] == 'sales_return')
        {
            $this->dispatchBrowserEvent('entry_table');
            return redirect()->route('erp.account-transaction.sale-entry.edit', [ 'sale_entry' => $this->productEntries[$key]['id'], 'type' => $this->productEntries[$key]['type'], 'return_type' => 'product_ledger', 'return_id' => $this->productEntries[$key]['erp_product_id']]);
        } else {
            $this->dispatchBrowserEvent('entry_table');
            return redirect()->route('erp.account-transaction.purchase-entry.edit', [ 'purchase_entry' => $this->productEntries[$key]['id'], 'type' => $this->productEntries[$key]['type'], 'return_type' => 'product_ledger', 'return_id' => $this->productEntries[$key]['erp_product_id']]);
        }
    }

    public function delete($key)
    {
        if($this->productEntries[$key]['type'] == 'sales_invoice' || $this->productEntries[$key]['type'] == 'sales_return')
        {
            $saleEntry = SaleEntry::find($this->productEntries[$key]['id']);
            if($saleEntry){
                $saleEntry->delete();
            }
        } else {
            $purchaseEntry = PurchaseEntry::find($this->productEntries[$key]['id']);
            if($purchaseEntry){
                $purchaseEntry->delete();
            }
        }
        unset($this->productEntries[$key]);
        $this->dispatchBrowserEvent('entry_table');
    }

    public function render()
    {
        return view('livewire.erp.report.stock-report.product-ledger.show')->extends('erp.app');
    }
}
