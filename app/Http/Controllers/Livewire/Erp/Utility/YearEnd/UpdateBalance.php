<?php

namespace App\Http\Controllers\Livewire\Erp\Utility\YearEnd;

use Livewire\Component;

class UpdateBalance extends Component
{
    public function render()
    {
        return view('livewire.erp.utility.year-end.update-balance')->extends('erp.app');
    }
}
