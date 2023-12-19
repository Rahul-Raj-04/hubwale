<?php

namespace App\Http\Controllers\Livewire\ECommerce\Tax;

use Livewire\Component;
use App\Models\ECommerceTax;

class Create extends Component
{
    public $tax_name;
    public $tax_number;

    public function render()
    {
        return view('livewire.e-commerce.tax.create')->extends('livewire.e-commerce.app');
    }

    public function saveRecord()
    {
        $this->validate([
            'tax_name' => ['required'],
            'tax_number' => ['required', 'numeric', 'min:1', 'max:100']
        ]);
        ECommerceTax::create([
            'company_id' => auth()->user()->company_id,
            'name' => $this->tax_name,
            'tax' => $this->tax_number
        ]);
        toast('Record created successfully.','success');
        return redirect()->route('e-commerce.tax.index');
    }
}
