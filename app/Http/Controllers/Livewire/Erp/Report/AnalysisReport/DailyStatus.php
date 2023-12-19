<?php

namespace App\Http\Controllers\Livewire\Erp\Report\AnalysisReport;

use Livewire\Component;

class DailyStatus extends Component
{
    public $openSetup = false;

    public $addModalOpenContent = 0;

    public function mount()
    {
        # code...
    }

    public function openSetup()
    {
        $this->openSetup = true;
    }
    
    public function addFormat()
    {
        $this->dispatchBrowserEvent('format-list-modal-close');
    }

    public function back()
    {
        if($this->addModalOpenContent != 0){
            $this->addModalOpenContent = $this->addModalOpenContent - 1;
        }
        $this->dispatchBrowserEvent('datatable');
    }

    public function next()
    {
        if($this->addModalOpenContent != 3){
            $this->addModalOpenContent = $this->addModalOpenContent + 1;
        }
        $this->dispatchBrowserEvent('datatable');
    }

    public function render()
    {
        return view('livewire.erp.report.analysis-report.daily-status')->extends('erp.app');
    }
}
