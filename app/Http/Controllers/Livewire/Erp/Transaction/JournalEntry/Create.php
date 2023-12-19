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

class Create extends Component
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

	public $credit;
	public $debit;

	public $accounts = [];
	public $currencies;
	public $account_entries = [];
	public $add_account_entries;

    public $parent_amount;

    public $allAccounts;

	public function mount($vou_type)
	{
		$this->vou_date = date('Y-m-d');
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

		$this->vouTypes = Enum::JOURNAL_ENTRY_VOU_TYPE;
		$this->balance_types = Enum::BALANCE_TYPE;
        
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
			$credit = $credit + $account_antrie['credit'];
			$debit = $debit + $account_antrie['debit'];
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
                // Create group id in 10 digit
                do{
                    $group_id = rand(1111111111, 9999999999);
                    $journalEntries = JournalEntry::where('group_id', $group_id)->get();    
                }while (count($journalEntries) > 0);
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
				foreach ($this->account_entries as $key1 => $account_entry) {
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
                        'group_id' => $group_id
					]);

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
				}
				
	        	toast(ucfirst(str_replace( '_', ' ', $this->vou_type)).' created successfully!', 'success');
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
            $this->credit == 1 ? 'add_account_entries.credit' : 'add_account_entries.debit'  => 'required|numeric|'. ($this->add_account_entries['parent_amount'] != null ? 'max:'.$this->add_account_entries['parent_amount'] : ''),
        ],
        [
        	'add_account_entries.balance_type.required' => 'Select CR/DB',
			'add_account_entries.account_id.required' => 'Account required',
			'add_account_entries.exchange_rate.required'=> 'Exchange rate required',
			'add_account_entries.credit.required'=> 'Credit required',
			'add_account_entries.debit.required'=> 'Debit required',
        ]
    	);

        if ($validator->fails()) {
        	$this->alert('error', $validator->errors()->first(), [
                'position' => 'center',
                'toast' => true,
            ]);
        } else {
	        $this->account_entries[] = [
	        	'balance_type' => $this->add_account_entries['balance_type'],
				'account_id' => $this->add_account_entries['account_id'],
				'chq_no' => array_key_exists("chq_no",$this->add_account_entries) ? $this->add_account_entries['chq_no'] : null ,
				'chq_date' => array_key_exists("chq_date",$this->add_account_entries) ? $this->add_account_entries['chq_date'] : null ,
				'exchange_rate' => $this->add_account_entries['exchange_rate'],
				'debit' => array_key_exists("debit",$this->add_account_entries) ? $this->add_account_entries['debit'] : null ,
				'credit' => array_key_exists("credit",$this->add_account_entries) ? $this->add_account_entries['credit'] : null,
                'parent_id' => 0,
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
