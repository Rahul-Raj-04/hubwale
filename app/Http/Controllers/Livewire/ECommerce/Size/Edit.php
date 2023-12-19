<?php

namespace App\Http\Controllers\Livewire\ECommerce\Size;

use Livewire\Component;
use App\Models\ECommerceSize;

class Edit extends Component
{
    public $size_name;
    public $sizeId;
    public $size;

    public function render()
    {
        return view('livewire.e-commerce.size.edit')->extends('livewire.e-commerce.app');
    }

    public function mount()
    {
        $this->size = ECommerceSize::find($this->sizeId);
        $this->size_name = $this->size->name;
    }

    public function updateRecord()
    {
        $this->validate([
            'size_name' => ['required']
        ]);

        $this->size->name = $this->size_name;
        $this->size->save();
        toast('Size updated successfully.','success');
        return redirect()->route('e-commerce.size.index');
    }
}
