<?php

namespace App\Http\Controllers\Livewire\Erp\Utility\DataUtility;

use Livewire\Component;

class DataImport extends Component
{
    public function render()
    {
        return view('livewire.erp.utility.data-utility.data-import')->extends('erp.app');
    }
}
