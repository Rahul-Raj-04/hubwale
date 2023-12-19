<?php

namespace App\Http\Controllers\Livewire\Erp\Transaction\JournalEntry;

use Livewire\Component;
use App\Models\CurrencyMaster;
use App\Models\Account;
use App\Models\JournalEntry;
use App\Enum\Enum;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Validator;
use App\Models\LedgerAccountBalance;
use App\Http\Traits\LedgerAccountBalanceTrait;
use Illuminate\Http\Request;

class Edit extends Component
{
    use LivewireAlert, LedgerAccountBalanceTrait;
	
	public $vou_type;
	public $get_vou_type;
	public $tax_type;
	public $vou_date;
	public $vou_no;
	public $chq_dd_no;
	public $chq_dd_date;
	public $narration;
	public $doc_no;
	public $doc_date;
	public $company_id;

	public $vouTypes;
	public $balance_types;

	public $credit = 1;
	public $debit = 0;

	public $accounts = [];
	public $currencies;
	public $account_entries = [];
	public $add_account_entries;

    public $journalEntries = [];

    public $parent_amount;

    public $allAccounts;
    public $edit_type;
    public $slug_account_id;

	public function mount(Request $request, $vou_type, $journalEntry)
	{
        $this->edit_type = $request->edit_type;
        $this->slug_account_id = $request->account_id;

        $this->journalEntries = JournalEntry::where('group_id', $journalEntry ? $journalEntry->group_id : null)->get();
        foreach ($this->journalEntries as $journalEntry) {
                $this->account_entries[] = [
                'id' => $journalEntry->id,
                'balance_type' => $journalEntry->balance_type,
                'account_id' => $journalEntry->account_id,
                'balance' => $journalEntry->balance,
                'chq_no' => $journalEntry->chq_no,
                'chq_date' => $journalEntry->chq_date,
                'exchange_rate' => $journalEntry->exchange_rate,
                'debit' => $journalEntry->debit,
                'credit' => $journalEntry->credit,
            ];
        }
        if($journalEntry)
        {
            $this->vou_type = $journalEntry->vou_type;
            $this->tax_type = $journalEntry->tax_type;
            $this->vou_date = $journalEntry->vou_date;
            $this->vou_no = $journalEntry->vou_no;
            $this->chq_dd_no = $journalEntry->chq_dd_no;
            $this->chq_dd_date = $journalEntry->chq_dd_date;
            $this->narration = $journalEntry->narration;
            $this->doc_no = $journalEntry->doc_no;
            $this->doc_date = $journalEntry->doc_date;
        } else {
            $this->vou_date = date('Y-m-d');
        }
		$this->get_vou_type = $vou_type;
		$this->vou_type = $vou_type;
        if($vou_type == 'bank_payment' || $vou_type == 'bank_receipt') {
		    $this->accounts = Account::Where('company_id', auth()->user()->company->id)->whereHas('account_group', function($ag)
            {
                $ag->whereIn('name', ['Bank Accounts (Banks)', 'Bank OCC a/c']);
            })->get();
        } elseif($vou_type == 'cash_payment' || $vou_type == 'cash_receipt') {
            $this->accounts = Account::Where('company_id', auth()->user()->company->id)->whereHas('account_group', function($ag)
            {
                $ag->whereIn('name', ['Cash-in-hand']);
            })->get();

        } elseif($vou_type == 'journal') {
            $this->accounts = Account::Where('company_id', auth()->user()->company->id)->get();
        } else {
            $this->accounts = Account::Where('company_id', auth()->user()->company->id)->whereHas('account_group', function($ag)
            {
                $ag->whereIn('name', ['Cash-in-hand', 'Bank Accounts (Banks)', 'Bank OCC a/c']);
            })->get();
        }
        $this->allAccounts = Account::Where('company_id', auth()->user()->company->id)->get();
		$this->vouTypes = Enum::JOURNAL_ENTRY_VOU_TYPE;
		$this->balance_types = Enum::BALANCE_TYPE;
        if($this->vou_type == 'bank_payment'){
            $balance_type = 'CR';
        } else if($this->vou_type == 'bank_receipt'){
            $balance_type = 'DB';
        } else if($this->vou_type == 'cash_payment'){
            $balance_type = 'CR';
        } else if($this->vou_type == 'cash_receipt'){
            $balance_type = 'DB';
        } else if($this->vou_type == 'credit_note'){
            $balance_type = 'CR';
        } else if($this->vou_type == 'debit_note'){
            $balance_type = 'DB';
        } else {
            $balance_type = 'CR';
        }
        if($balance_type == 'CR') {
            $this->credit = 1;
            $this->debit = 0;
        } else {
            $this->credit = 0;
            $this->debit = 1;
        }
		$this->add_account_entries = [
            'balance_type' => $balance_type,
            'account_id' => null,
            'chq_no' => null,
            'chq_date' => null,
            'exchange_rate' => null,
            'debit' => null,
            'credit' => null,
            'parent_amount' => null,
            'parent_id' => 0
        ];
	}

	public function submit()
	{
		$credit = 0;
		$debit = 0;

		foreach ($this->account_entries as $key => $account_antrie) {
			$credit = $credit + (int)$account_antrie['credit'];
			$debit = $debit + (int)$account_antrie['debit'];
		}

		if ( $credit != $debit){
			$this->alert('error', 'Credit and Debit forex amount  is not same', [
                'position' => 'top-right',
                'toast' => true,
            ]);
		} else {
			if (count($this->account_entries) == 0) {
				$this->alert('error', 'No account entry entered', [
	                'position' => 'top-right',
	                'toast' => true,
	            ]);
			} else {
                if(count($this->journalEntries) == 0)
                {
                    do{
                        $group_id = rand(1111111111, 9999999999);
                        $journalEntries = JournalEntry::where('group_id', $group_id)->get();    
                    }while (count($journalEntries) > 0);
                }
				foreach ($this->account_entries as $key => $account_entry) {

                    if (!$account_entry['id']) {
    					$accountTransaction = JournalEntry::create([
    						'vou_type' => $this->vou_type,
    						'tax_type' => $this->tax_type,
    						'vou_date' => $this->vou_date,
    						'vou_no' => $this->vou_no,
    						'chq_dd_no' => $this->chq_dd_no,
    						'chq_dd_date' => $this->chq_dd_date,
    						'narration' => $this->narration,
    						'doc_no' => $this->doc_no,
    						'doc_date' => $this->doc_date,

    						'balance_type' => $account_entry['balance_type'],
    						'account_id' => $account_entry['account_id'],
    						'chq_no' => $account_entry['chq_no'],
    						'chq_date' => $account_entry['chq_date'],
    						'exchange_rate' => $account_entry['exchange_rate'],
    						'debit' => $account_entry['debit'],
    						'credit' => $account_entry['credit'],
    						'company_id' => auth()->user()->company ? auth()->user()->company->id : null,
                            'group_id' => count($this->journalEntries) > 0  ? $this->journalEntries[0]->group_id : $group_id
    					]);
                        if($this->vou_type == 'bank_payment'){
                            $type = 'BPymt';
                        } else if($this->vou_type == 'bank_receipt'){
                            $type = 'BRcpt';
                        } else if($this->vou_type == 'cash_payment'){
                            $type = 'CPymt';
                        } else if($this->vou_type == 'cash_receipt'){
                            $type = 'CRcpt';
                        } else if($this->vou_type == 'credit_note'){
                            $type = 'C/N';
                        } else if($this->vou_type == 'debit_note'){
                            $type = 'D/N';
                        } else if($this->vou_type == 'journal') {
                            $type = 'Jrnl';
                        } else if ($this->vou_type == 'contra') {
                            $type = 'Ctra';
                        }
                        // create ledger 
                        $ledgerdata = [
                            'account_id' => $account_entry['account_id'],
                            'opposite_account_id' => null,
                            'balance' => $account_entry['balance_type'] == 'CR' ? $account_entry['credit'] : $account_entry['debit'],
                            'type' => $type,
                            'balance_type' => $account_entry['balance_type'] == 'CR' ? 'credit' : 'debit',
                            'date' => $this->vou_date,
                            'vou_doc_no' => $this->vou_no,
                            'type_id' => $accountTransaction->id,
                            'model_name' => 'JournalEntry'
                        ];
                        $this->LedgerAccountBalanceCreateOrUpdate($ledgerdata);
                    } else {
                        $journalEntry = JournalEntry::find($account_entry['id']);
                        $journalEntry->vou_type = $this->vou_type;
                        $journalEntry->tax_type = $this->tax_type;
                        $journalEntry->vou_date = $this->vou_date;
                        $journalEntry->vou_no = $this->vou_no;
                        $journalEntry->chq_dd_no = $this->chq_dd_no;
                        $journalEntry->chq_dd_date = $this->chq_dd_date;
                        $journalEntry->narration = $this->narration;
                        $journalEntry->doc_no = $this->doc_no;
                        $journalEntry->doc_date = $this->doc_date;
                        $journalEntry->save();
                    }
				}   
                toast(ucfirst(str_replace( '_', ' ', $this->vou_type)).' updated successfully!', 'success');
                if (isset($this->edit_type) && $this->edit_type == 'ledger') {
                    if (!$this->slug_account_id) {
                        toast('Something went wrong!', 'error');
                        return redirect()->route('erp.report.account-book.ledger.index');
                    }
                    return redirect()->route('erp.report.account-book.ledger.allShow', ['id' => $this->slug_account_id, 'type' => 'account_ladger']);
                } elseif (isset($this->edit_type) && $this->edit_type == 'day_book') {

                    return redirect()->route('erp.report.account-book.day-book.index');
                } elseif (isset($this->edit_type) && $this->edit_type == 'cash_book') {
                    if (!$this->slug_account_id) {
                        toast('Something went wrong!', 'error');
                        return redirect()->route('erp.report.account-book.ledger.index');
                    }
                    return redirect()->route('erp.report.account-book.cash-book.show', $this->slug_account_id);
                } elseif (isset($this->edit_type) && $this->edit_type == 'bank_book') {
                    if (!$this->slug_account_id) {
    
                        toast('Something went wrong!', 'error');
                        return redirect()->route('erp.report.account-book.ledger.index');
                    }
                    return redirect()->route('erp.report.account-book.bank-book.show', $this->slug_account_id);
                }
				return redirect()->route('erp.account-transaction.journal-entry.index', ['vouType' => $this->vou_type]);
			}
		}
        $this->dispatchBrowserEvent('entry-table');
	}

	public function changeBalanceType()
	{
		if ($this->add_account_entries['balance_type'] == 'CR') {
			$this->credit = 1;
			$this->debit = 0;
		} elseif($this->add_account_entries['balance_type'] == 'DB') {
			$this->debit = 1;
			$this->credit = 0;
		}
        $this->dispatchBrowserEvent('entry-table');
	}

	public function addEntry()
	{
		$validator = Validator::make($this->all(), [
            'add_account_entries.balance_type' => 'required',
            'add_account_entries.account_id' => 'required',
            'add_account_entries.exchange_rate' => 'required',
            $this->credit == 1 ? 'add_account_entries.credit' : 'add_account_entries.debit'  => 'required|numeric|'. ($this->add_account_entries['parent_amount'] != null ? 'max:'.$this->add_account_entries['parent_amount'] : '')
        ],
        [
        	'add_account_entries.balance_type.required' => 'Select CR/DB',
			'add_account_entries.account_id.required' => 'Account required',
			'add_account_entries.exchange_rate.required'=> 'Exchange rate required',
			'add_account_entries.credit.required'=> 'Credit required',
			'add_account_entries.debit.required'=> 'Debit required'
        ]
    	);

        if ($validator->fails()) {
        	$this->alert('error', $validator->errors()->first(), [
                'position' => 'center',
                'toast' => true,
            ]);
        } else {
	        $this->account_entries[] = [
                'id' => null,
	        	'balance_type' => $this->add_account_entries['balance_type'],
				'account_id' => $this->add_account_entries['account_id'],
				'chq_no' => array_key_exists("chq_no",$this->add_account_entries) ? $this->add_account_entries['chq_no'] : null ,
				'chq_date' => array_key_exists("chq_date",$this->add_account_entries) ? $this->add_account_entries['chq_date'] : null ,
				'exchange_rate' => $this->add_account_entries['exchange_rate'],
				'debit' => array_key_exists("debit",$this->add_account_entries) ? $this->add_account_entries['debit'] : null ,
				'credit' => array_key_exists("credit",$this->add_account_entries) ? $this->add_account_entries['credit'] : null
	        ];
	        if ($this->add_account_entries['parent_amount']) {
                
                $this->add_account_entries['parent_amount'] = $this->add_account_entries['parent_amount'] - ($this->add_account_entries['debit'] ? $this->add_account_entries['debit'] : $this->add_account_entries['credit']);

            } else {
                $this->add_account_entries['parent_amount'] = $this->add_account_entries['debit'] ? $this->add_account_entries['debit'] : $this->add_account_entries['credit'];
            }

            if($this->add_account_entries['parent_amount'] !== 0 && $this->add_account_entries['parent_amount'] > 0){
                $this->add_account_entries['parent_id'] = $this->add_account_entries['parent_id'];
                $this->account_entries[count($this->account_entries) - 1]['parent_id'] = $this->add_account_entries['parent_id'];

                if($this->vou_type == 'bank_payment'){
                    $balance_type = 'CR';
                } else if($this->vou_type == 'bank_receipt'){
                    $balance_type = 'DB';
                } else if($this->vou_type == 'cash_payment'){
                    $balance_type = 'CR';
                } else if($this->vou_type == 'cash_receipt'){
                    $balance_type = 'DB';
                } else if($this->vou_type == 'credit_note'){
                    $balance_type = 'CR';
                } else if($this->vou_type == 'debit_note'){
                    $balance_type = 'DB';
                } else {
                    $balance_type = 'CR';
                }
                $this->add_account_entries['balance_type'] = $balance_type == 'DB' ? 'CR' : 'DB';
            } 
            else {
                if($this->vou_type == 'bank_payment'){
                    $balance_type = 'CR';
                } else if($this->vou_type == 'bank_receipt'){
                    $balance_type = 'DB';
                } else if($this->vou_type == 'cash_payment'){
                    $balance_type = 'CR';
                } else if($this->vou_type == 'cash_receipt'){
                    $balance_type = 'DB';
                } else if($this->vou_type == 'credit_note'){
                    $balance_type = 'CR';
                } else if($this->vou_type == 'debit_note'){
                    $balance_type = 'DB';
                } else {
                    $balance_type = 'CR';
                }
                $this->add_account_entries['balance_type'] = $balance_type;
                $this->account_entries[count($this->account_entries) - 1]['parent_id'] = count($this->account_entries) - 1;
            }
            if ($this->add_account_entries['balance_type'] == 'CR') {
                $this->debit = 0;
                $this->credit = 1;
            } else if ($this->add_account_entries['balance_type'] == 'DB') {
                $this->credit = 0;
                $this->debit = 1;
            }
            $this->add_account_entries['account_id'] = null;
            $this->add_account_entries['chq_no'] = null; 
            $this->add_account_entries['chq_date'] = null; 
            $this->add_account_entries['debit'] = null; 
            $this->add_account_entries['credit'] = null;
            $this->add_account_entries['exchange_rate'] = null;
        }
        $this->dispatchBrowserEvent('entry-table');
	}

	public function deleteEntry($key)
	{
		if (end($this->account_entries)['balance_type'] == 'DB'){
        	$this->debit = 0;
        	$this->credit = 1;
        	$this->add_account_entries['balance_type'] = 'CR';
        } elseif (end($this->account_entries)['balance_type'] == 'CR') {
        	$this->credit = 0;
        	$this->debit = 1;
        	$this->add_account_entries['balance_type'] = 'DB';
        }
        if($this->account_entries[$key]['id'] != null)
        {
            $journalEntry = JournalEntry::find($this->account_entries[$key]['id']);
            
            if($this->vou_type == 'bank_payment'){
                $type = 'BPymt';
            } else if($this->vou_type == 'bank_receipt'){
                $type = 'BRcpt';
            } else if($this->vou_type == 'cash_payment'){
                $type = 'BPymt';
            } else if($this->vou_type == 'cash_receipt'){
                $type = 'CRcpt';
            } else if($this->vou_type == 'credit_note'){
                $type = 'C/N';
            } else if($this->vou_type == 'debit_note'){
                $type = 'D/N';
            } else if($this->vou_type == 'journal') {
                $type = 'Jrnl';
            } else if ($this->vou_type == 'contra') {
                $type = 'Ctra';
            }
            $ledgerAccountBalances = LedgerAccountBalance::where('type_id', $journalEntry->id)->where('type', $type)->get();
            foreach ($ledgerAccountBalances as $key => $ledgerAccountBalance) {

                $lastLedgerAccountBalance = LedgerAccountBalance::where('created_at', '<', $ledgerAccountBalance->created_at)
                ->where('account_id', $ledgerAccountBalance->account_id)->orderBy('created_at','desc')->first();

                $closingBalanceUpdatesLedgers = LedgerAccountBalance::where('created_at', '>=', $ledgerAccountBalance->created_at)
                ->where('id', '!=', $ledgerAccountBalance->id)->where('account_id', $ledgerAccountBalance->account_id)->get();
                    if ($lastLedgerAccountBalance) {
                        $updatedClosingBalance = $lastLedgerAccountBalance->closing_balance;
                    
                        foreach ($closingBalanceUpdatesLedgers as $key => $closingBalanceUpdatesLedger) {
                            if ($closingBalanceUpdatesLedger->balance_type == 'credit') {
                                $updatedClosingBalance = (int)$updatedClosingBalance + (int)$closingBalanceUpdatesLedger->balance;
                            } else {
                                $updatedClosingBalance = (int)$updatedClosingBalance - (int)$closingBalanceUpdatesLedger->balance;
                            }
                            $closingBalanceUpdatesLedger->closing_balance = $updatedClosingBalance;
                            $closingBalanceUpdatesLedger->save();
                        }
                    }
                $ledgerAccountBalance->delete();
            }
            $journalEntry->delete();
        }
		unset($this->account_entries[$key]);
        $this->dispatchBrowserEvent('entry-table');
	}

    public function render()
    {
        return <<<'blade'
            <div>
            	<form wire:submit.prevent="submit">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Vou. Type</label>
                        <select class="form-control form-control-sm form-select" wire:model.defer="vou_type" disabled>
                            @foreach ($vouTypes as $vouType)
                                <option value="{{ $vouType }}">
                                    {{ ucfirst(str_replace( '_', ' ', $vouType)) }}
                                </option>
                            @endforeach
                        </select>
                        @error('vou_type')
                            <span class="text-danger small wow flash">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Tax Type</label>
                        <select class="form-control form-control-sm form-select" wire:model.defer="tax_type">
                            <option value="none">None</option>
                        </select>
                        @error('tax_type')
                            <span class="text-danger small wow flash">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Vou Date</label>
                        <input type="date" class="form-control form-control-sm"
                               placeholder="Enter Vou Date" wire:model.defer="vou_date">
                        @error('vou_date')
                            <span class="text-danger small wow flash">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Vou No</label>
                        <input type="text" class="form-control form-control-sm"
                               placeholder="Enter Vou No" wire:model.defer="vou_no" {{ $get_vou_type == 'cash_receipt' ? '' : 'disabled'}}>
                        @error('vou_no')
                            <span class="text-danger small wow flash">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    @if($get_vou_type == 'bank_payment' || $get_vou_type == 'bank_receipt' || $get_vou_type == 'contra')
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Chq/DD No</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter Chq/DD No" wire:model.defer="chq_dd_no" {{ $get_vou_type == 'contra' ? '' : 'disabled'}}>
                            @error('chq_dd_no')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Chq/DD Date</label>
                            <input type="date" class="form-control form-control-sm" wire:model.defer="chq_dd_date" {{ $get_vou_type == 'contra' ? '' : 'disabled'}}>
                            @error('chq_dd_date')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                    @else
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Doc No</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter Doc No" wire:model.defer="doc_no" disabled>
                            @error('doc_no')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Doc Date</label>
                            <input type="date" class="form-control form-control-sm" wire:model.defer="doc_date" disabled>
                            @error('doc_date')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Narration</label>
                        <input type="text" class="form-control form-control-sm"
                               placeholder="Enter narration" wire:model.defer="narration">
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom entry-table">
                        <thead>
                            <tr>
                                <th class="bg-primary text-white">CR/DB</th>
                                <th class="bg-primary text-white">Account name</th>
                                <th class="bg-primary text-white {{ $get_vou_type == 'bank_payment' || $get_vou_type == 'bank_receipt' ? '' : 'd-none'}}">Chq.No</th>
                                <th class="bg-primary text-white {{ $get_vou_type == 'bank_payment' || $get_vou_type == 'bank_receipt' ? '' : 'd-none'}}">Chq.Date</th>
                                <th class="bg-primary text-white">Exchange Rate</th>
                                <th class="bg-primary text-white">Debit</th>
                                <th class="bg-primary text-white">Credit</th>
                                <th class="bg-primary text-white">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select class="form-control form-control-sm form-select" wire:model.defer={{"add_account_entries.balance_type"}} wire:change="changeBalanceType">
                                        <option value="">Select CR/DB</option>
                                        @foreach ($balance_types as $balance_type)
                                            <option value="{{ $balance_type }}">
                                                {{ $balance_type }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    @if(empty($account_entries))
                                        <select class="form-control form-control-sm form-select" wire:model.defer={{"add_account_entries.account_id"}}>
                                            <option value="">Select Account</option>
                                            @foreach ($accounts as $account)
                                                <option value="{{ $account->id }}">
                                                    {{ $account->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @else
                                        <select class="form-control form-control-sm form-select" wire:model.defer={{"add_account_entries.account_id"}}>
                                            <option value="">Select Account</option>
                                            @foreach ($allAccounts as $account)
                                                <option value="{{ $account->id }}">
                                                    {{ $account->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @endif
                                </td>
                                <td class="{{ $get_vou_type == 'bank_payment' || $get_vou_type == 'bank_receipt' ? '' : 'd-none'}}">
                                    <input type="text" class="form-control form-control-sm" wire:model.defer={{"add_account_entries.chq_no"}}>
                                </td>
                                <td class="{{ $get_vou_type == 'bank_payment' || $get_vou_type == 'bank_receipt' ? '' : 'd-none'}}">
                                    <input type="date" class="form-control form-control-sm" wire:model.defer={{"add_account_entries.chq_date"}}>
                                </td>
                                <td>
                                    <input type="number" class="form-control form-control-sm" wire:model.defer={{"add_account_entries.exchange_rate"}}>
                                </td>

                                <td>
                                    <input type="number" class="form-control form-control-sm" wire:model.defer={{"add_account_entries.debit"}} {{ $debit == 1 ? '' : 'disabled'}}>
                                </td>
                                <td>
                                    <input type="number" class="form-control form-control-sm" wire:model.defer={{"add_account_entries.credit"}} {{ $credit == 1 ? '' : 'disabled'}}>
                                </td>
                                <td>
                                    <input type="button" class="btn btn-sm btn-primary" value="Add" wire:click=addEntry>
                                </td>
                            </tr>
                            @foreach ($account_entries as $key => $account_entry)
                                <tr>
                                    <td>
                                        {{$account_entry['balance_type']}}
                                    </td>

                                    <td>
                                        @foreach ($allAccounts as $account)
                                            {{$account->id == $account_entry['account_id'] ? $account->name : ''}}
                                        @endforeach
                                    </td>

                                    <td class="{{ $get_vou_type == 'bank_payment' || $get_vou_type == 'bank_receipt' ? '' : 'd-none'}}">                          
                                        {{$account_entry['chq_no']}}
                                    </td>

                                    <td class="{{ $get_vou_type == 'bank_payment' || $get_vou_type == 'bank_receipt' ? '' : 'd-none'}}">
                                        {{$account_entry['chq_date']}}
                                    </td>

                                    <td>
                                        {{$account_entry['exchange_rate']}}
                                    </td>

                                    <td>
                                        {{$account_entry['debit']}}
                                    </td>

                                    <td>
                                        {{$account_entry['credit']}}
                                    </td>

                                    <td>
                                        <input type="button" class="btn btn-sm btn-danger" value="Delete" wire:click=deleteEntry({{$key}})>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <input type="submit" id="FormSubmit" class="d-none">
        	</form>
            </div>
        blade;
    }
}
