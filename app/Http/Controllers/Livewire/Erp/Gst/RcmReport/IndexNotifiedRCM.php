<?php

namespace App\Http\Controllers\Livewire\Erp\Gst\RcmReport;

use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;


class IndexNotifiedRCM extends Component
{


    public $report_period = "monthly";
    public $isReportModal  = true;
    public $return_period = "";
    public $from_date = "";
    public $to_date = "";


    /**
     * set report period
     *
     * @return void
     * @author Ibrahim Mustapha
     */
    public function setReportPeriod()
    {
        $this->validate([
            'return_period' => 'required',
        ]);

        $this->isReportModal = false;
        $this->dispatchBrowserEvent('report_table');
    }



    
    public function export()
    {
		$this->dispatchBrowserEvent('report-table');
        // return Excel::download(new DateWiseExport($this->date), 'notifiec-r-c-m.xlsx');
    }


    /**
     * render method.
     *
     * @return \Illuminate\Http\Response
     * @author Ibrahim Mustapha
     */
    public function render()
    {
        return view('livewire.erp.gst.rcm-report.notified-rcm.index-notified-r-c-m')
            ->extends('erp.app');
    }


}
