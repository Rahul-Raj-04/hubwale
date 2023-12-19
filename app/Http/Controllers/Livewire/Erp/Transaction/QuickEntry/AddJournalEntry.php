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
use App\Http\Traits\LedgerAccountBalanceTrait;
use App\Models\LedgerAccountBalance;

class AddJournalEntry extends Component
{
    use LivewireAlert, LedgerAccountBalanceTrait;

	public $accounts;
	public $currencies;
	public $types;
	public $balance_types;
    public $mainAccounts = [];
    public $start_date;
    public $end_date;
    public $account_entries = [];
    public $vou_no_enable = 1;
    public $is_audit = [];
    public $main_account_balance;

	public $main_account_id;
	public $type;
	public $date;
	public $day;
	public $vou_no;
	public $doc_no;
	public $account_id;
	public $currency_id;
	public $exchange_rate;
	public $amount;
	public $narration;
	public $balance_type;

	public function mount()
	{
        $this->mainAccounts = Account::where('company_id', auth()->user()->company->id)->get();
        $this->accounts = Account::where('company_id', auth()->user()->company->id)->get();
        $this->currencies = CurrencyMaster::where('company_id', auth()->user()->company->id)->get();
        $this->types = Enum::QUICK_ENTRY_JOURNAL_TYPE;
        $this->date = date('Y-m-d');
        $this->day = date('D');
        $this->type = 'journal';
		$this->balance_types = Enum::BALANCE_TYPE;
		$this->balance_type = 'credit';
        $this->start_date = date('Y-04-01');
        $this->end_date = date('Y-03-31', strtotime('+1 year'));
        $this->main_account_id = $this->mainAccounts->first()->id;
        $ladgerAccount = LedgerAccountBalance::where('account_id', $this->main_account_id)->first();
        if ($ladgerAccount) {
            $this->main_account_balance = $ladgerAccount->balance;
        }
        $quick_entries = QuickEntry::where('company_id', auth()->user()->company->id)->where('module_name', Enum::QUICK_ENTRY_JOURNAL_MODULE)->where('main_account_id', $this->main_account_id)->where('type', $this->type)->get();

        foreach ($quick_entries as $key => $quick_entry) {

            $ladgerAccount = LedgerAccountBalance::where('account_id', $quick_entry->account_id)->first();

            $this->account_entries[] = [
                'id' => $quick_entry->id,
                'date' => $quick_entry->date,
                'day' => $quick_entry->day,
                'balance_type' => $quick_entry->balance_type,
                'vou_no' => $quick_entry->vou_no,
                'doc_no' => $quick_entry->doc_no,
                'account_id' => $quick_entry->account_id,
                'balance' => $ladgerAccount ? $ladgerAccount->balance : null,
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
        $ladgerAccount = LedgerAccountBalance::where('account_id', $this->main_account_id)->first();
        if ($ladgerAccount) {
            $this->main_account_balance = $ladgerAccount->balance;
        }
        $quick_entries = QuickEntry::where('company_id', auth()->user()->company->id)->where('module_name', Enum::QUICK_ENTRY_JOURNAL_MODULE)->where('main_account_id', $this->main_account_id)->where('type', $this->type)->get();

        foreach ($quick_entries as $key => $quick_entry) {

            $ladgerAccount = LedgerAccountBalance::where('account_id', $quick_entry->account_id)->first();

            $this->account_entries[] = [
                'id' => $quick_entry->id,
                'date' => $quick_entry->date,
                'day' => $quick_entry->day,
                'balance_type' => $quick_entry->balance_type,
                'vou_no' => $quick_entry->vou_no,
                'doc_no' => $quick_entry->doc_no,
                'account_id' => $quick_entry->account_id,
                'balance' => $ladgerAccount ? $ladgerAccount->balance : null,
                'currency_id' => $quick_entry->currency_id,
                'exchange_rate' => $quick_entry->exchange_rate,
                'amount' => $quick_entry->amount,
                'narration' => $quick_entry->narration,
            ];
            $this->is_audit[$key] = ($quick_entry->is_audit == 1) ? $quick_entry->is_audit : null;
        }
        $this->dispatchBrowserEvent('entry-table');
    }

	public function changeType()
	{
		if ($this->type == 'credit_note') {
			$this->balance_type = 'credit';
		} elseif ($this->type == 'debit_note') {
			$this->balance_type = 'debit';
		}
        $this->reset('account_entries');
        $this->reset('is_audit');
        $quick_entries = QuickEntry::where('company_id', auth()->user()->company->id)->where('module_name', Enum::QUICK_ENTRY_JOURNAL_MODULE)->where('main_account_id', $this->main_account_id)->where('type', $this->type)->get();

        foreach ($quick_entries as $key => $quick_entry) {

            $ladgerAccount = LedgerAccountBalance::where('account_id', $quick_entry->account_id)->first();

            $this->account_entries[] = [
                'id' => $quick_entry->id,
                'date' => $quick_entry->date,
                'day' => $quick_entry->day,
                'balance_type' => $quick_entry->balance_type,
                'vou_no' => $quick_entry->vou_no,
                'doc_no' => $quick_entry->doc_no,
                'account_id' => $quick_entry->account_id,
                'balance' => $ladgerAccount ? $ladgerAccount->balance : null,
                'currency_id' => $quick_entry->currency_id,
                'exchange_rate' => $quick_entry->exchange_rate,
                'amount' => $quick_entry->amount,
                'narration' => $quick_entry->narration,
            ];
            $this->is_audit[$key] = ($quick_entry->is_audit == 1) ? $quick_entry->is_audit : null;
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
        $quick_entry = QuickEntry::find($id);
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
            $quickEntry = QuickEntry::create([
                'main_account_id' => $this->main_account_id,
                'type' => $this->type,
                'date' => $this->date,
                'day' => $this->day,
                'balance_type' => $this->balance_type,
                'vou_no' => $this->vou_no,
                'doc_no' => $this->doc_no,
                'account_id' => $this->account_id,
                'currency_id' => $this->currency_id,
                'exchange_rate' => $this->exchange_rate,
                'amount' => $this->amount,
                'narration' => $this->narration,
                'module_name' => Enum::QUICK_ENTRY_JOURNAL_MODULE,
                'company_id' => auth()->user()->company->id
            ]);

            // // create ledger 
            // $data = [
            //     'account_id' => $this->main_account_id,
            //     'balance' => $this->amount
            // ];
            // $this->LedgerAccountBalanceCreateOrUpdate($data);
            // $data = [
            //     'account_id' => $this->account_id,
            //     'balance' => $this->amount
            // ];

            // $ledgerAccount = $this->LedgerAccountBalanceCreateOrUpdate($data);
            // foreach ($this->account_entries as $key => $account_entry) {
            //     if ($account_entry['account_id'] == $ledgerAccount->account_id) {
            //         $this->account_entries[$key]['balance'] = $ledgerAccount->balance;
            //     }
            // }

            $this->account_entries[] = [
                'id' => $quickEntry->id,
                'date' => $this->date,
                'day' => $this->day,
                'balance_type' => $this->balance_type,
                'vou_no' => $this->vou_no,
                'doc_no' => $this->doc_no,
                'account_id' => $this->account_id,
                'balance' => null,
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
        $quick_entry = QuickEntry::find($id);
        if($quick_entry->is_audit == 1) {
            $this->dispatchBrowserEvent('is-audit-model-show');
        } else {
            unset($this->account_entries[$key]);
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
                                @foreach ($mainAccounts as $account)
                                    <option value="{{ $account->id }}">
                                        {{ $account->name }}
                                    </option>
                                @endforeach
                            </select>
                            <label class="form-label">Balance : {{ $main_account_balance }}</label>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label class="form-label">Type</label>
                            <select class="form-control form-control-sm form-select" wire:model.defer="type" wire:change="changeType">
                                @foreach ($types as $key => $type)
                                    <option value="{{ $key }}">
                                        {{ $type }}
                                    </option>
                                @endforeach
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
                            <th class="bg-primary text-white">Date</th>
                            <th class="bg-primary text-white">Day</th>
                            <th class="bg-primary text-white"></th>
                            <th class="bg-primary text-white">C/D</th>
                            <th class="bg-primary text-white">Vou No</th>
                            <th class="bg-primary text-white">Doc. No.</th>
                            <th class="bg-primary text-white">Account Name</th>
                            <th class="bg-primary text-white">Balance</th>
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
                                <input type="date" class="form-control form-control-sm" wire:model="date">
                            </td>
                            <td>
                                <input type="text" class="form-control form-control-sm" wire:model="day" disabled>
                            </td>
                            <td></td>
                            <td>
                                <select name="main_account_id" class="form-control form-control-sm form-select" wire:model.defer="balance_type">
                                    @foreach ($balance_types as $key => $type)
                                        <option value="{{ $key }}">
                                            {{ $key }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control form-control-sm" wire:model.defer="vou_no" disabled>
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
                            <td></td>
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
                                    {{$account_entry['date']}}
                                </td>
                                <td>
                                    {{$account_entry['day']}}
                                </td>
                                <td>
                                    <input type="checkbox" value="{{$account_entry['id']}}" wire:model={{"is_audit.".$key}} wire:change="isAudit({{ $account_entry['id'] }})">
                                </td>
                                <td>
                                    {{$account_entry['balance_type']}}
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
                                    {{$account_entry['balance']}}
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
                                    <input type="button" class="btn btn-sm btn-danger" value="Delete" wire:click="deleteEntry({{$key}}, {{$account_entry['id']}})">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        blade;
    }
}
