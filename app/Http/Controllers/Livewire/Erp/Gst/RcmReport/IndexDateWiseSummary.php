<?php

namespace App\Http\Controllers\Livewire\Erp\Gst\RcmReport;
use Livewire\Component;
use App\Models\RCMVoucher;
use App\Exports\RcmReport\DateWiseExport;
use Maatwebsite\Excel\Facades\Excel;

class IndexDateWiseSummary extends Component
{
	public $rcmVouchers = [];
	public $date;
	
	public function mount()
	{
		$this->date = date('Y-m-d');
		$this->rcmVouchers = RCMVoucher::whereDate('date', $this->date)->Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
	}

	public function updatedDate()
	{
		$this->reset('rcmVouchers');
		$this->rcmVouchers = RCMVoucher::whereDate('date', $this->date)->Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
		$this->dispatchBrowserEvent('report-table');
	}

	public function export()
    {
		$this->dispatchBrowserEvent('report-table');
        return Excel::download(new DateWiseExport($this->date), 'date-wise-summary.xlsx');
    }

    public function render()
    {
        return view('livewire.erp.gst.rcm-report.date-wise-summary.index')->extends('erp.app');
    }
}
