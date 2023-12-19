<?php

namespace App\Http\Controllers\Livewire\Erp\Utility\SystemUtility;

use Livewire\Component;

class BackUp extends Component
{
    public function mount()
    {
        
    }

    public function render()
    {
        return view('livewire.erp.utility.system-utility.back-up')->extends('erp.app');
    }
}
