<?php

namespace App\Http\Controllers\Livewire\Erp\Report\StockReport\ProductLedger;

use Livewire\Component;
use App\Models\ErpProduct;

class Index extends Component
{
    public $products;

    public function mount()
    {
        $this->products = ErpProduct::where('company_id', auth()->user()->company->id)->get();
    }

    public function edit($id)
    {
        $this->dispatchBrowserEvent('entry_table');
        return redirect()->route('erp.master.product.edit', ['product' => $id, 'return_type' => 'product_ledger']);
    }

    public function delete($id)
    {
        $this->dispatchBrowserEvent('entry_table');
        $product = ErpProduct::find($id);
        if($product){
            $product->delete();
        }
        $this->products = ErpProduct::where('company_id', auth()->user()->company->id)->get();
    }

    public function render()
    {
        return view('livewire.erp.report.stock-report.product-ledger.index')->extends('erp.app');
    }
}
