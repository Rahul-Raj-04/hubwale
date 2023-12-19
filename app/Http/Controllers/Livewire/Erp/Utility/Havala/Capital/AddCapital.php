<?php

namespace App\Http\Controllers\Livewire\Erp\Utility\Havala\Capital;

use Livewire\Component;

class AddCapital extends Component
{
    public function render()
    {
        return view('livewire.erp.utility.havala.capital.add-capital')->extends('erp.app');
    }
}
