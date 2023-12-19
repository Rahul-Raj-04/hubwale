<?php

namespace App\Http\Controllers\Livewire\Erp\Gst;

use Livewire\Component;

class Gstr2BMatch extends Component
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
     * render method
     *
     * @return \Illuminate\Http\Response
     * @author Ibrahim Mustapha
     */ 
    public function render()
    {
        return view('livewire.erp.gst.gstr2-b-match')->extends('erp.app');
    }
}
