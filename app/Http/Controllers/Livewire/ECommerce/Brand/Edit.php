<?php

namespace App\Http\Controllers\Livewire\ECommerce\Brand;

use Livewire\Component;
use App\Models\ECommerceBrand;

class Edit extends Component
{
    public $brand_name;
    public $brand_type;
    public $brandId;
    public $brand;

    public function render()
    {
        return view('livewire.e-commerce.brand.edit')->extends('livewire.e-commerce.app');
    }

    public function mount()
    {
        $this->brand = ECommerceBrand::find($this->brandId);
        $this->brand_name = $this->brand->name;
        $this->brand_type = $this->brand->type;
    }

    public function updateCategory()
    {
        $this->validate([
            'brand_name' => ['required'],
            'brand_type' => ['required']
        ]);

        $this->brand->name = $this->brand_name;
        $this->brand->type = $this->brand_type;
        $this->brand->save();
        toast('Brand updated successfully.','success');
        return redirect()->route('e-commerce.brand.index');
    }
}
