<?php

namespace App\Http\Controllers\Livewire\Erp\Transaction\QuickEntry;

use Livewire\Component;
use App\Enum\Enum;
use App\Models\QuickEntry;
use App\Models\Account;
use App\Models\CurrencyMaster;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Validator;
use App\Models\LedgerAccountBalance;
use App\Models\AccountTransaction;
use App\Http\Traits\LedgerAccountBalanceTrait;

class AddCashBankEntry extends Component
{
    use LivewireAlert, LedgerAccountBalanceTrait;

	public $accounts = [];
	public $currencies = [];
	public $types;
    public $cashBankAccounts = [];
    public $start_date;
    public $end_date;
    public $account_entries = [];
    public $vou_no_enable = 1;
    public $is_audit = [];
    public $main_account_balance;

	public $main_account_id;
	public $type;
	public $vou_type;
	public $date;
	public $day;
	public $vou_no;
	public $doc_no;
	public $account_id;
	public $currency_id;
	public $exchange_rate;
	public $amount;
	public $narration;

    public $module;
    public $balance_type;
	public function mount()
	{
		$this->cashBankAccounts = Account::where('company_id', auth()->user()->company->id)->whereHas('account_group', function ($ag) {
            $ag->whereIn('name', ['Bank Accounts (Banks)', 'Bank OCC a/c', 'Cash-in-hand']);
        })->get();
        $this->accounts = Account::where('company_id', auth()->user()->company->id)->get();
		$this->currencies = CurrencyMaster::where('company_id', auth()->user()->company->id)->get();
		// $this->types = Enum::QUICK_ENTRY_CASH_BANK_TYPE;
		$this->vou_type = 'Rcpt';
		$this->date = date('Y-m-d');
		$this->day = date('D');
        $this->type = 'Receipt';
        $this->balance_type = 'debit';
        $this->start_date = date('Y-04-01');
        $this->end_date = date('Y-03-31', strtotime('+1 year'));
        $this->main_account_id = $this->cashBankAccounts->first()->id;
        $lastLedgerAccountBalance = LedgerAccountBalance::where('account_id', $this->main_account_id)->orderBy('created_at','desc')->first();
        if ($lastLedgerAccountBalance) {
            $this->main_account_balance = $lastLedgerAccountBalance->closing_balance;
        }

        if ($this->cashBankAccounts->first()->account_group->name == 'Cash-in-hand') {
            $this->module = 'cash_receipt';          
        } else {
            $this->module = 'bank_receipt';
        }
        $quick_entries = AccountTransaction::where('company_id', auth()->user()->company->id)->where('module', $this->module)->where('account_id', $this->main_account_id)->where('type', $this->vou_type)->get();

        foreach ($quick_entries as $key => $quick_entry) {

            $day = date('D',strtotime($quick_entry->date));
            $this->account_entries[] = [
                'id' => $quick_entry->id,
                'vou_type' => $quick_entry->type,
                'date' => $quick_entry->date,
                'day' => $day,
                'vou_no' => $quick_entry->voucher_no,
                'doc_no' => $quick_entry->doc_no,
                'account_id' => $quick_entry->opposite_account_id,
                'currency_id' => $quick_entry->currency_id,
                'exchange_rate' => $quick_entry->exchange_rate,
                'amount' => $quick_entry->amount,
                'narration' => $quick_entry->narration,
            ];
            $this->is_audit[$key] = ($quick_entry->is_audit == 1) ? $quick_entry->is_audit : null;
        }
	}

    public function updatedMainAccountId()
    {
        $this->reset('account_entries');
        $this->reset('is_audit');
        $this->reset('main_account_balance');
        
        $quick_entries = AccountTransaction::where('company_id', auth()->user()->company->id)->where('account_id', $this->main_account_id)->where('type', $this->type == 'Receipt' ? 'Rcpt' : 'Pymt' )->get();

        foreach ($quick_entries as $key => $quick_entry) {
            $ladgerAccount = LedgerAccountBalance::where('account_id', $quick_entry->account_id)->first();

            $day = date('D',strtotime($quick_entry->date));
            $this->account_entries[] = [
                'id' => $quick_entry->id,
                'vou_type' => $quick_entry->type,
                'date' => $quick_entry->date,
                'day' => $day,
                'vou_no' => $quick_entry->voucher_no,
                'doc_no' => $quick_entry->doc_no,
                'account_id' => $quick_entry->opposite_account_id,
                'balance' => $ladgerAccount ? $ladgerAccount->balance : null,
                'currency_id' => $quick_entry->currency_id,
                'exchange_rate' => $quick_entry->exchange_rate,
                'amount' => $quick_entry->amount,
                'narration' => $quick_entry->narration,
            ];
            $this->is_audit[$key] = ($quick_entry->is_audit == 1) ? $quick_entry->is_audit : null;
        }
        $account = Account::find($this->main_account_id);
        if ($account->account_group->name == 'Cash-in-hand' && $this->type == 'Receipt') {
            $this->module = 'cash_receipt';            
        } elseif ($account->account_group->name == 'Cash-in-hand' && $this->type == 'Payment') {
            $this->module = 'cash_payment';
        } elseif (($account->account_group->name == 'Bank OCC a/c' || $account->account_group->name == 'Bank Accounts (Banks)') && $this->type == 'Payment') {
            $this->module = 'bank_payment';
        } elseif (($account->account_group->name == 'Bank OCC a/c' || $account->account_group->name == 'Bank Accounts (Banks)') && $this->type == 'Receipt') {
            $this->module = 'bank_receipt';
        }
        $this->dispatchBrowserEvent('entry-table');
    }

	public function changeType()
	{
		if ($this->type == 'Receipt') {
			$this->vou_type = 'Rcpt';
            $this->vou_no_enable = 1;
            $this->balance_type = 'debit';
		} elseif ($this->type == 'Payment') {
            $this->vou_no_enable = 0;
			$this->vou_type = 'Pymt';
            $this->balance_type = 'credit';
		}
        $this->reset('account_entries');
        $this->reset('is_audit');
        $quick_entries = AccountTransaction::where('company_id', auth()->user()->company->id)->where('account_id', $this->main_account_id)->where('type', $this->type == 'Receipt' ? 'Rcpt' : 'Pymt' )->get();
        
        foreach ($quick_entries as $key => $quick_entry) {
            $ladgerAccount = LedgerAccountBalance::where('account_id', $quick_entry->account_id)->first();

            $day = date('D',strtotime($quick_entry->date));
            $this->account_entries[] = [
                'id' => $quick_entry->id,
                'vou_type' => $quick_entry->type,
                'date' => $quick_entry->date,
                'day' => $day,
                'vou_no' => $quick_entry->voucher_no,
                'doc_no' => $quick_entry->doc_no,
                'account_id' => $quick_entry->opposite_account_id,
                'currency_id' => $quick_entry->currency_id,
                'exchange_rate' => $quick_entry->exchange_rate,
                'amount' => $quick_entry->amount,
                'narration' => $quick_entry->narration,
            ];
            $this->is_audit[$key] = ($quick_entry->is_audit == 1) ? $quick_entry->is_audit : null;
        }
        $account = Account::find($this->main_account_id);
        if ($account->account_group->name == 'Cash-in-hand' && $this->type == 'Receipt') {
            $this->module = 'cash_receipt';         
        } elseif ($account->account_group->name == 'Cash-in-hand' && $this->type == 'Payment') {
            $this->module = 'cash_payment';
        } elseif (($account->account_group->name == 'Bank OCC a/c' || $account->account_group->name == 'Bank Accounts (Banks)') && $this->type == 'Payment') {
            $this->module = 'bank_payment';
        } elseif (($account->account_group->name == 'Bank OCC a/c' || $account->account_group->name == 'Bank Accounts (Banks)') && $this->type == 'Receipt') {
            $this->module = 'bank_receipt';
        }

        $this->dispatchBrowserEvent('entry-table');
	}

	public function updatedDate()
	{
		$this->day = Carbon::createFromFormat('Y-m-d', $this->date)->format('D');
        $this->dispatchBrowserEvent('entry-table');
	}

    public function isAudit($id)
    {
        $quick_entry = AccountTransaction::find($id);
        if (in_array($id, $this->is_audit)) {
            $quick_entry->is_audit = 1;
        } else {
            $quick_entry->is_audit = 0;
        }
        $quick_entry->save();
        $this->dispatchBrowserEvent('entry-table');
    }

    public function addEntry()
    {
        $validator = Validator::make($this->all(), [
            'account_id' => 'required',
            'currency_id' => 'required',
            'exchange_rate' => 'required',
            'amount' => 'required'
        ],
        [
           'account_id.required' => 'Select Account',
           'currency_id.required' => 'Select Currency',
           'exchange_rate.required' => 'Enter Exchange Rate',
           'amount.required' => 'Enter Amount'
        ]
        );

        if ($validator->fails()) {
            $this->alert('error', $validator->errors()->first(), [
                'position' => 'center',
                'toast' => true,
            ]);
        } else {
            $data = [
                'account_id' => $this->main_account_id,
                'type' => $this->type == "Receipt" ? 'Rcpt' : 'Pymt',
                'date' => $this->date,
                'voucher_no' => $this->vou_no,
                'opposite_account_id' => $this->account_id,
                'amount' => $this->amount,
                'narration' => $this->narration,
                'doc_no' => $this->doc_no,
                'company_id' => auth()->user()->company ? auth()->user()->company->id : null,
                'module' => $this->module
            ];

            $quickEntry = AccountTransaction::create($data);
            if ($this->module == 'bank_payment') {
                $type =  'BPymt';
            } elseif ($this->module == 'bank_receipt') {
                $type =  'BRcpt';
            } elseif ($this->module == 'cash_receipt') {
                $type =  'CRcpt';
            } elseif ($this->module == 'cash_payment') {
                $type =  'CPymt';
            }
            $ledgerdata = [
                'account_id' => $quickEntry->account_id,
                'opposite_account_id' => $quickEntry->opposite_account_id,
                'balance' => $quickEntry->amount,
                'type' => $type,
                'balance_type' => $this->balance_type == 'credit' ? 'debit' : 'credit',
                'date' => $quickEntry->date,
                'vou_doc_no' => $quickEntry->voucher_no,
                'type_id' => $quickEntry->id,
            ];
            $this->LedgerAccountBalanceCreateOrUpdate($ledgerdata);

            $ledgerdata = [
                'account_id' => $quickEntry->opposite_account_id,
                'opposite_account_id' => $quickEntry->account_id,
                'balance' => $quickEntry->amount,
                'type' => $type,
                'balance_type' => $this->balance_type,
                'date' => $quickEntry->date,
                'vou_doc_no' => $quickEntry->voucher_no,
                'type_id' => $quickEntry->id
            ];
            $this->LedgerAccountBalanceCreateOrUpdate($ledgerdata);

            $day = date('D',strtotime($this->date));
            $this->account_entries[] = [
                'id' => $quickEntry->id,
                'vou_type' => $this->vou_type,
                'date' => $this->date,
                'day' => $day,
                'vou_no' => $this->vou_no,
                'doc_no' => $this->doc_no,
                'account_id' => $this->account_id,
                'currency_id' => $this->currency_id,
                'exchange_rate' => $this->exchange_rate,
                'amount' => $this->amount,
                'narration' => $this->narration,
            ];
            $this->reset('vou_no');
            $this->reset('doc_no');
            $this->reset('account_id');
            $this->reset('currency_id');
            $this->reset('exchange_rate');
            $this->reset('amount');
            $this->reset('narration');
        }
        $this->dispatchBrowserEvent('entry-table');
    }

    public function deleteEntry($key, $id)
    {
        $quick_entry = AccountTransaction::find($id);
        if($quick_entry->is_audit == 1) {
            $this->dispatchBrowserEvent('is-audit-model-show');
        } else {
            unset($this->account_entries[$key]);
            if ($quick_entry->module == 'cash_receipt') {
                $type = 'CRcpt';
            } elseif ($quick_entry->module == 'cash_payment') {
                $type = 'CPymt';
            } elseif ($quick_entry->module == 'bank_payment') {
                $type = 'BPymt';
            } elseif ($quick_entry->module == 'bank_receipt') {
                $type = 'BRcpt';
            }
            $ledgerAccountBalances = LedgerAccountBalance::where('type_id', $id)->where('type', $type)->get();

            foreach ($ledgerAccountBalances as $key => $ledgerAccountBalance) {

                $lastLedgerAccountBalance = LedgerAccountBalance::where('created_at', '<', $ledgerAccountBalance->created_at)
                ->where('account_id', $ledgerAccountBalance->account_id)->orderBy('created_at','desc')->first();

                $closingBalanceUpdatesLedgers = LedgerAccountBalance::where('created_at', '>=', $ledgerAccountBalance->created_at)
                ->where('id', '!=', $ledgerAccountBalance->id)->where('account_id', $ledgerAccountBalance->account_id)->get();

                    $updatedClosingBalance = $lastLedgerAccountBalance ? $lastLedgerAccountBalance->closing_balance : 0;

                    foreach ($closingBalanceUpdatesLedgers as $key => $closingBalanceUpdatesLedger) {
                        if ($closingBalanceUpdatesLedger->balance_type == 'credit') {
                            $updatedClosingBalance = (int)$updatedClosingBalance + (int)$closingBalanceUpdatesLedger->balance;
                        } else {
                            $updatedClosingBalance = (int)$updatedClosingBalance - (int)$closingBalanceUpdatesLedger->balance;
                        }
                        $closingBalanceUpdatesLedger->closing_balance = $updatedClosingBalance;
                        $closingBalanceUpdatesLedger->save();
                    }
                $ledgerAccountBalance->delete();
            }
            $quick_entry->delete();
        }
        $this->dispatchBrowserEvent('entry-table');
    }

    public function render()
    {
    	return <<<'blade'
            <div>
                <form>
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <label class="form-label">Account</label>
                            <select name="main_account_id" class="form-control form-control-sm form-select" wire:model="main_account_id">
                                @foreach ($cashBankAccounts as $account)
                                    <option value="{{ $account->id }}">
                                        {{ $account->name }}
                                    </option>
                                @endforeach
                            </select>
                            <label class="form-label">Balance : {{ $main_account_balance }}</label>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label class="form-label">Receipt/Payment</label>
                            <select class="form-control form-control-sm form-select" wire:model="type" wire:change="changeType">
                                <option value="Receipt">Receipt</option>
                                <option value="Payment">Payment</option>
                            </select>
                        </div>

                        <div class="col-md-2 mb-4">
                            <label class="form-label">From</label>
                            <input type="date" class="form-control form-control-sm" wire:model.defer="start_date">
                        </div>

                        <div class="col-md-2 mb-4">
                            <label class="form-label">To</label>
                            <input type="date" class="form-control form-control-sm" wire:model.defer="end_date">
                        </div>
                    </div>
                </form>
                <table class="table-responsive table table-bordered text-nowrap border-bottom entry-table">
                    <thead>
                        <tr>
                            <th class="bg-primary text-white">Vou. Type</th>
                            <th class="bg-primary text-white">Date</th>
                            <th class="bg-primary text-white">Day</th>
                            <th class="bg-primary text-white"></th>
                            <th class="bg-primary text-white">Vou No</th>
                            <th class="bg-primary text-white">Doc. No.</th>
                            <th class="bg-primary text-white">Account Name</th>
                            <th class="bg-primary text-white">Currency</th>
                            <th class="bg-primary text-white">Exchange Rate</th>
                            <th class="bg-primary text-white">Amount</th>
                            <th class="bg-primary text-white">Narration</th>
                            <th class="bg-primary text-white">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="text" class="form-control form-control-sm" disabled wire:model.defer="vou_type">
                            </td>
                            <td>
                                <input type="date" class="form-control form-control-sm" wire:model="date">
                            </td>
                            <td>
                                <input type="text" class="form-control form-control-sm" wire:model="day" disabled>
                            </td>
                            <td></td>
                            <td>
                                <input type="text" class="form-control form-control-sm" wire:model.defer="vou_no" {{ $vou_no_enable == 1 ? '' : 'disabled'}}
                            </td>
                            <td>
                                <input type="text" class="form-control form-control-sm" wire:model.defer="doc_no">
                            </td>
                            <td>
                                <select name="account_id" class="form-control form-control-sm form-select" wire:model.defer="account_id">
                                    <option value="">Select Account</option>
                                    @foreach ($accounts as $account)
                                        <option value="{{ $account->id }}">
                                            {{ $account->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="currency_id" class="form-control form-control-sm form-select" wire:model.defer="currency_id">
                                    <option value="">Select Commodity</option>    
                                    @foreach ($currencies as $currency)
                                        <option value="{{ $currency->id }}">
                                            {{ $currency->gc_code.' | '.$currency->symbol }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="number" class="form-control form-control-sm" wire:model.defer="exchange_rate">
                            </td>
                            <td>
                                <input type="number" class="form-control form-control-sm" wire:model.defer="amount">
                            </td>
                            <td>
                                <input type="text" class="form-control form-control-sm" wire:model.defer="narration">
                            </td>
                            <td>
                                <input type="button" class="btn btn-sm btn-primary" value="Save" wire:click=addEntry>
                            </td>
                        </tr>
                        @foreach ($account_entries as $key => $account_entry)
                            <tr>
                                <td>
                                    {{$account_entry['vou_type']}}
                                </td>
                                <td>
                                    {{$account_entry['date']}}
                                </td>
                                <td>
                                    {{$account_entry['day']}}
                                </td>
                                <td>
                                    <input type="checkbox" value="{{$account_entry['id']}}" wire:model={{"is_audit.".$key}} wire:change="isAudit({{ $account_entry['id'] }})">
                                </td>
                                <td>      
                                    {{$account_entry['vou_no']}}
                                </td>
                                <td>
                                    {{$account_entry['doc_no']}}
                                </td>
                                <td>
                                    @foreach($accounts as $account)
                                        {{$account->id == $account_entry['account_id'] ? $account->name : ''}}
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($currencies as $currency)
                                        {{$currency->id == $account_entry['currency_id'] ? $currency->symbol : ''}}
                                    @endforeach
                                </td>
                                <td>
                                    {{$account_entry['exchange_rate']}}
                                </td>
                                <td>
                                    {{$account_entry['amount']}}
                                </td>

                                <td>
                                    {{$account_entry['narration']}}
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-danger" wire:click="deleteEntry({{$key}}, {{ $account_entry['id'] }}) data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        blade;
    }
}
