<?php

namespace App\Http\Controllers\Livewire\Erp\Utility\DataFreeze;

use Livewire\Component;

class GstDataFreeze extends Component
{
    public function mount()
    {
        # code...
    }
    
    public function render()
    {
        return view('livewire.erp.utility.data-freeze.gst-data-freeze')->extends('erp.app');
    }
}
