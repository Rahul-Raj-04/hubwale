<?php

namespace App\Http\Controllers\Livewire\Erp\Report\AccountBook;

use Livewire\Component;

class VoucherList extends Component
{
	public function export()
	{
		$this->dispatchBrowserEvent('report_table');
	}
    public function render()
    {
        return view('livewire.erp.report.account-book.voucher-list')->extends('erp.app');
    }
}
