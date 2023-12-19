<?php

namespace App\Http\Controllers\Livewire\Erp\Gst;

use Livewire\Component;

class EWayBill extends Component
{

    public $from_date = '';
    public $to_date = '';



    /**
     * render method.
     *
     * @return \Illuminate\Http\Response
     * @author Ibrahim Mustapha
     */
    public function render()
    {
        return view('livewire.erp.gst.e-way-bill')->extends('erp.app');
    }
}
