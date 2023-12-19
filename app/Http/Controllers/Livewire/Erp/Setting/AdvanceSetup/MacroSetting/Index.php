<?php

namespace App\Http\Controllers\Livewire\Erp\Setting\AdvanceSetup\MacroSetting;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.erp.setting.advance-setup.macro-setting.index')->extends('erp.app');
    }

    public function addMacro()
    {
        
    }

    public function editRecord($id)
    {
        $this->dispatchBrowserEvent('openMacroEditModal');
        
    }
    
    public function updateMacro()
    {
        
    }
    
    public function deleteRecord($id)
    {
        
    }
}