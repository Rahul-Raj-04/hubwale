<?php

namespace App\Http\Controllers\Livewire\Erp\Gst\GstAudit;

use Livewire\Component;


class Gstr1B2bSummaryController extends Component
{


    /**
     * render method.
     *
     * @return \Illuminate\Http\Response
     * @author Ibrahim Mustapha
     */
    public function render()
    {
        return view('livewire.erp.gst.gst-audit.gstr1_b2b_summary')->extends('erp.app');
    }


}
