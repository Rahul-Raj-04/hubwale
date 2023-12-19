<?php

namespace App\Http\Controllers\Livewire\Erp\Utility\AdvanceUtility;

use Livewire\Component;
use App\Models\ErpProduct;

class ProductMerge extends Component
{
    public $products = [];

    public function mount()
    {
        $this->products = ErpProduct::where('company_id', auth()->user()->company->id)->get();
    }

    public function render()
    {
        return view('livewire.erp.utility.advance-utility.product-merge')->extends('erp.app');
    }
}
