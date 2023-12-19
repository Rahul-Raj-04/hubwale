<?php

namespace App\Http\Controllers\Livewire\Erp\Consultant\PendingInvoice;

use Livewire\Component;

class ExportPendingInvoice extends Component
{
	public function mount()
	{
		# code...
	}
	
	public function export()
	{
        $this->dispatchBrowserEvent('report-table');
	}

    public function render()
    {
        return view('livewire.erp.consultant.pending-invoice.export-pending-invoice')->extends('erp.app');
    }
}
