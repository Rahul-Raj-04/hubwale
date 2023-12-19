<?php

namespace App\Http\Controllers\Livewire\Erp\Gst\RcmReport;

use Livewire\Component;
use App\Models\RCMVoucher;
use App\Exports\RcmReport\AccountWiseExport;
use Maatwebsite\Excel\Facades\Excel;

class ShowAccountWiseSummary extends Component
{

	public $rcmVouchers;
	public $opposite_account_id;

	public function mount($id)
	{
		$this->opposite_account_id = $id;
		$this->rcmVouchers = RCMVoucher::where('opposite_account_id', $id)->Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
	}

	public function export()
    {
		$this->dispatchBrowserEvent('report-table');
        return Excel::download(new AccountWiseExport($this->opposite_account_id), $this->rcmVouchers[0]->opposite_account->name.'.xlsx');
    }

    public function render()
    {
        return view('livewire.erp.gst.rcm-report.account-wise-summary.show')->extends('erp.app');
    }
}
