<?php

namespace App\Http\Controllers\Livewire\Erp\Utility\Havala\Depreciation;

use Livewire\Component;

class AddDepreciation extends Component
{
    public function render()
    {
        return view('livewire.erp.utility.havala.depreciation.add-depreciation')->extends('erp.app');
    }
}
