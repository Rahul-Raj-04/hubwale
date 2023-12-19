<?php

namespace App\Http\Controllers\Livewire\ECommerce\Brand;

use Livewire\Component;
use App\Models\ECommerceBrand;

class Create extends Component
{
    public $brand_name;
    public $brand_type = 'own';

    public function render()
    {
        return view('livewire.e-commerce.brand.create')->extends('livewire.e-commerce.app');
    }

    public function saveCategory()
    {
        $this->validate([
            'brand_name' => ['required'],
            'brand_type' => ['required']
        ]);
        ECommerceBrand::create([
            'company_id' => auth()->user()->company_id,
            'name' => $this->brand_name,
            'type' => $this->brand_type
        ]);
        toast('Brand created successfully.','success');
        return redirect()->route('e-commerce.brand.index');
    }
}
