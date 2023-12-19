<?php

namespace App\Http\Controllers\Livewire\Crm;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.crm.home')->extends('livewire.crm.app');
    }
}
