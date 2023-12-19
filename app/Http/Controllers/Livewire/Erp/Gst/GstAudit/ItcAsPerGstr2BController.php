<?php

namespace App\Http\Controllers\Livewire\Erp\Gst\GstAudit;


use Livewire\Component;


class ItcAsPerGstr2BController extends Component
{


    public $report_period = "monthly";
    public $isReportModal  = true;
    public $return_period = 4;
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
    }


    /**
     * render method.
     *
     * @return \Illuminate\Http\Response
     * @author Ibrahim Mustapha
     */
    public function render()
    {
        return view('livewire.erp.gst.gst-audit.itc-As-per-gstr-2b')->extends('erp.app');
    }

}
