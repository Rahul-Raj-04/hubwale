<?php

namespace App\Http\Controllers\Livewire\ECommerce\Size;

use Livewire\Component;
use App\Models\ECommerceSize;

class Create extends Component
{
    public $size_name;

    public function render()
    {
        return view('livewire.e-commerce.size.create')->extends('livewire.e-commerce.app');
    }

    public function saveRecord()
    {
        $this->validate([
            'size_name' => ['required'],
        ]);
        ECommerceSize::create([
            'company_id' => auth()->user()->company_id,
            'name' => $this->size_name,
        ]);
        toast('Size created successfully.','success');
        return redirect()->route('e-commerce.size.index');
    }
}
