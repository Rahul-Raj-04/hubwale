<?php

namespace App\Http\Controllers\Livewire\Erp\Gst\GstReport;

use Livewire\Component;

class HsnWiseSummary extends Component
{

    public $reportType    = null;
    public $isReportModal = true;
    public $report_period = "monthly";
    public $report_for    = "4";


    /**
     * set report period
     *
     * @return void
     * @author Ibrahim Mustapha
     */
    public function setReportPeriod()
    {
        $this->validate([
            'report_period' => 'required',
            'report_for'    => 'required',
        ]);

        $this->isReportModal = false;
        $this->dispatchBrowserEvent('report_table');
    }

    
    /**
     * render method.
     *
     * @return \Illuminate\Http\Response
     * @author Ibrahim Mustapha
     */
    public function render()
    {
        return view('livewire.erp.gst.gst-report.hsn-wise-summary')
            ->extends('erp.app');
    }
}
