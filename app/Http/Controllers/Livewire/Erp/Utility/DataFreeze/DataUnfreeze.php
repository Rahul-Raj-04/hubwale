<?php

namespace App\Http\Controllers\Livewire\Erp\Utility\DataFreeze;

use Livewire\Component;

class DataUnfreeze extends Component
{
    public function mount()
    {
        # code...
    }

    public function render()
    {
        return view('livewire.erp.utility.data-freeze.data-unfreeze')->extends('erp.app');
    }
}
