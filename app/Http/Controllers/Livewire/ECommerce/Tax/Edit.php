<?php

namespace App\Http\Controllers\Livewire\ECommerce\Tax;

use Livewire\Component;
use App\Models\ECommerceTax;

class Edit extends Component
{
    public $tax_name;
    public $tax_number;
    public $taxId;
    public $tax;

    public function render()
    {
        return view('livewire.e-commerce.tax.edit')->extends('livewire.e-commerce.app');
    }

    public function mount()
    {
        $this->tax = ECommerceTax::find($this->taxId);
        $this->tax_name = $this->tax->name;
        $this->tax_number = $this->tax->tax;
    }

    public function updateRecord()
    {
        $this->validate([
            'tax_name' => ['required'],
            'tax_number' => ['required', 'required', 'min:1', 'max:100']
        ]);

        $this->tax->name = $this->tax_name;
        $this->tax->tax = $this->tax_number;
        $this->tax->save();
        toast('Record updated successfully.','success');
        return redirect()->route('e-commerce.tax.index');
    }
}
