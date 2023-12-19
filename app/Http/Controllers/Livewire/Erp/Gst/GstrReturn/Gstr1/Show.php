<?php

namespace App\Http\Controllers\Livewire\Erp\Gst\GstrReturn\Gstr1;

use App\Models\SaleEntry;
use Livewire\Component;
use Illuminate\Http\Request;

class Show extends Component
{
    public $saleEntry;
    public $gstr1_type;

    public function mount(Request $request, $id)
    {
        $this->saleEntry = SaleEntry::find($id);
        $this->gstr1_type = $request->gstr1_type;

    }

    public function render()
    {
        return view('livewire.erp.gst.gstr-return.gstr1.show')->extends('erp.app');
    }
}
