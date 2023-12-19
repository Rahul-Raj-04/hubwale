<?php

namespace App\Http\Controllers\Livewire\Erp\Gst\RcmReport;

use Livewire\Component;
use App\Models\RCMVoucher;
use App\Exports\RCMVoucherExport;
use Maatwebsite\Excel\Facades\Excel;

class IndexAccountWiseSummary extends Component
{
	public $rcmVoucherAccounts = [];
	public $rcmVouchers;
	public $month;
	public $year;
	public $date;
	
	public function mount()
	{
		$this->month = date('m');
		$this->year = date('Y');
		$this->date = date('Y-m');
		$this->rcmVoucherAccounts = RCMVoucher::whereMonth('date', $this->month)->whereYear('date', $this->year)->Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->select('opposite_account_id')->groupBy('opposite_account_id')->get();
	}

	public function updatedDate()
	{
		$this->month = date('m', strtotime($this->date));
		$this->year = date('Y', strtotime($this->date));
		$this->reset('rcmVoucherAccounts');
		$this->rcmVoucherAccounts = RCMVoucher::whereMonth('date', $this->month)->whereYear('date', $this->year)->Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->select('opposite_account_id')->groupBy('opposite_account_id')->get();
		$this->dispatchBrowserEvent('report-table');
	}

    public function render()
    {
        return view('livewire.erp.gst.rcm-report.account-wise-summary.index')->extends('erp.app');
    }
}
