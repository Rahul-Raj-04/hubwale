<?php

namespace App\Http\Controllers\Livewire\Erp\Gst\GstrReturn\Gstr3BAsPerBooks;

use Livewire\Component;
use Illuminate\Http\Request;

class Show extends Component
{
    public $report_period;
    public $parent_text;
    public $sub_text;

    public function mount(Request $request)
    {
        $this->report_period = $request->report_period;
        $this->parent_text = $request->parent_text;
        $this->sub_text = $request->sub_text;
    }

    public function render()
    {
        return view('livewire.erp.gst.gstr-return.gstr3-b-as-per-books.show')->extends('erp.app');
    }
}
