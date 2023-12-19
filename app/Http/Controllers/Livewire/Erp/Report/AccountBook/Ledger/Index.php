<?php

namespace App\Http\Controllers\Livewire\Erp\Report\AccountBook\Ledger;

use Livewire\Component;
use App\Models\Account;

class Index extends Component
{
	public $ledger_type;
    public $accounts;
	public function mount()
	{
		$this->ledger_type = 'Account Ledger';	
        $this->accounts = Account::where('company_id', auth()->user()->company->id)->get();

	}

	public function updatedLedgerType()
	{
		$this->dispatchBrowserEvent('report_table');
	}
    public function render()
    {
        return <<<'blade'
        <div class="row row-sm m-1">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header p-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Report</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Account Book</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ledger</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none pe-0">
                        <div class="d-flex">
                            <form class="me-3 d-none">
                                <select class="form-control form-control-sm form-control form-control-sm-sm" wire:model="ledger_type">
                                    <option value="Account Ledger">Account Ledger</option>
                                    <option value="Group Summary">Group Summary</option>
                                    <option value="Group Ledger">Group Ledger</option>
                                    <option value="Cash/Bank Fund Flow">Cash/Bank Fund Flow</option>
                                </select>
                            </form>
                            <div class="btn-list">
                                <a href="{{ route('erp.master.account.create', ['add_type' => 'ledger']) }}" class="btn btn-sm btn-primary d-none d-sm-inline-block me-0">
                                    <i class="fas fa-plus me-1"></i>
                                    {{ __('lang.add') }}
                                </a>
                                <a href="{{ route('erp.master.account.create', ['add_type' => 'ledger']) }}" class="btn btn-sm btn-primary d-sm-none me-0">
                                    <i class="fas fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                @if($ledger_type == 'Account Ledger') 
                	@include('erp.report.account-book.ledger.account-ledger.index')
                @elseif($ledger_type == 'Group Ledger')
                	@include('erp.report.account-book.ledger.group-ledger.index')
                @elseif($ledger_type == 'Group Summary')
                	@include('erp.report.account-book.ledger.group-summary.index')
                @elseif($ledger_type == 'Cash/Bank Fund Flow')
                	@include('erp.report.account-book.ledger.cash-bank-fund.index')
                @endif
            </div>
            </div>
        </div>
    </div>
    blade;
    }
}
