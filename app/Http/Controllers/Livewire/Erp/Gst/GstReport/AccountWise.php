<?php

namespace App\Http\Controllers\Livewire\Erp\Gst\GstReport;

use Livewire\Component;

class AccountWise extends Component
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

        $this->dispatchBrowserEvent('report_table');
        $this->isReportModal = false;

    }


    /**
     * render method.
     *
     * @return \Illuminate\Http\Response
     * @author Ibrahim Mustapha
     */
    public function render()
    {
        return view('livewire.erp.gst.gst-report.account-wise')
            ->extends('erp.app');
    }
}
