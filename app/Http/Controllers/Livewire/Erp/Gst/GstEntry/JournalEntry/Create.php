<?php

namespace App\Http\Controllers\Livewire\Erp\Gst\GstEntry\JournalEntry;

use Livewire\Component;
use App\Models\Account;
use App\Models\GstJournalEntry;
use App\Models\GstCommodity;
use App\Models\CurrencyMaster;
use App\Enum\Enum;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Validator;

class Create extends Component
{
	use LivewireAlert;

	public $accounts = [];
	public $gstCommodities = [];
	public $currencies = [];
	public $add_journal_entry = [];
    public $journal_entries = [];
    public $types;
    public $sub_types = [];
    public $entry_types;
    public $balance_types;

    public $debit_enable = 0;
    public $credit_enable = 1;
    public $reference_enable = 0;
    public $entry_type_enable = 0;
    public $gst_commodity_enable = 0;
    public $assess_amt_enable = 0;

	public $vou_type;
	public $type;
	public $sub_type;
    public $reference_no;
	public $vou_date;
	public $vou_no;
	public $doc_no;
	public $doc_date;
    public $narration;

	public function mount()
	{
		$this->accounts = Account::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
        $this->gstCommodities = GstCommodity::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
        $this->currencies = CurrencyMaster::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();

        $this->balance_types = Enum::BALANCE_TYPE;
        $this->types = Enum::GST_JOURNAL_TYPE;
        $this->entry_types = Enum::GST_JOURNAL_ENTRY_TYPE;
        $this->vou_date = date('Y-m-d');
		$this->add_journal_entry = [
			'balance_type' => 'CR',
            'account_id' => null,
            'entry_type' => null,
            'gst_commodity_id' => null,
            'assess_amt' => null,
            'currency_id' => null,
            'exchange_rate' => null,
            'debit' => null,
            'credit' => null
		];
	}

    public function updatedType()
    {
        $this->reset('sub_types');
        $this->reset('journal_entries');
        if($this->type == 'opening') {
            $this->sub_types = Enum::GST_JOURNAL_ENTRY_SUB_TYPE['opening'];
        } elseif ($this->type == 'itc_increase') {
            $this->sub_types = Enum::GST_JOURNAL_ENTRY_SUB_TYPE['itc_increase'];
        } elseif ($this->type == 'itc_decrease') {
            $this->sub_types = Enum::GST_JOURNAL_ENTRY_SUB_TYPE['itc_decrease'];
        } elseif ($this->type == 'tax_liability_increase') {
            $this->sub_types = Enum::GST_JOURNAL_ENTRY_SUB_TYPE['tax_liability_increase'];
        } elseif ($this->type == 'cash_ledger_credit') {
            $this->sub_types = Enum::GST_JOURNAL_ENTRY_SUB_TYPE['cash_ledger_credit'];
        }
        
        if($this->type == 'import_rcm') {
            $this->gst_commodity_enable = 1;
            $this->assess_amt_enable = 1;
        } else {
            $this->gst_commodity_enable = 0;
            $this->assess_amt_enable = 0;
        }
        $this->dispatchBrowserEvent('report-table');        
    }

    public function updatedSubType()
    {
        $this->reset('journal_entries');
        if($this->sub_type == 'Cash Ledger') {
            $this->entry_type_enable = 1;
        } else {
            $this->entry_type_enable = 0;
        }

        if($this->sub_type == 'RCM-URD ITC') {
            $this->reference_enable = 1;
        } else {
            $this->reference_enable = 0;
        }
        $this->dispatchBrowserEvent('report-table');
    }

    public function updatedAddJournalEntryBalanceType()
    {
        if ($this->add_journal_entry['balance_type'] == 'CR') {
            $this->debit_enable = 0;
            $this->credit_enable = 1;
        } elseif ($this->add_journal_entry['balance_type'] == 'DB') {
            $this->debit_enable = 1;
            $this->credit_enable = 0;
        }
        $this->dispatchBrowserEvent('report-table');
    }

	public function addEntry()
	{
        $validation = ['add_journal_entry.account_id' => 'required'];
        $message = ['add_journal_entry.account_id.required' => 'Please select account'];
        if ($this->gst_commodity_enable == 1) {
            $validation['add_journal_entry.gst_commodity_id'] = 'required';
            $message['add_journal_entry.gst_commodity_id.required'] = 'Please select gst commodity';
        }

        $validation['add_journal_entry.currency_id'] = 'required';
        $validation['add_journal_entry.exchange_rate'] = 'required';
        $validation[$this->credit_enable == 1 ? 'add_journal_entry.credit' : 'add_journal_entry.debit'] = 'required';

        $message['add_journal_entry.currency_id.required'] = 'Please select currency';
        $message['add_journal_entry.exchange_rate.required'] = 'Please enter exchange rate';
        $message[$this->credit_enable == 1 ? 'add_journal_entry.credit.required' : 'add_journal_entry.debit.required'] = 'Please enter '.$this->credit_enable == 1 ? 'credit' : 'debit';

		$validator = Validator::make($this->all(), $validation, $message);

        if ($validator->fails()) {
        	$this->alert('error', $validator->errors()->first(), [
                'position' => 'center',
                'toast' => true
            ]);
        } else {
	        $this->journal_entries[] = [
	        	'balance_type' => $this->add_journal_entry['balance_type'],
                'account_id' => $this->add_journal_entry['account_id'],
                'entry_type' => array_key_exists('entry_type', $this->add_journal_entry) ? $this->add_journal_entry['entry_type'] : null,
                'gst_commodity_id' => array_key_exists('gst_commodity_id', $this->add_journal_entry) ? $this->add_journal_entry['gst_commodity_id'] : null,
                'assess_amt' => array_key_exists('assess_amt', $this->add_journal_entry) ? $this->add_journal_entry['assess_amt'] : null,
                'currency_id' => $this->add_journal_entry['currency_id'],
                'exchange_rate' => $this->add_journal_entry['exchange_rate'],
                'debit' => array_key_exists('debit', $this->add_journal_entry) ? $this->add_journal_entry['debit'] : null,
                'credit' => array_key_exists('credit', $this->add_journal_entry) ? $this->add_journal_entry['credit'] : null,
	        ];
            if (end($this->journal_entries)['balance_type'] == 'DB'){
                $this->debit_enable = 0;
                $this->credit_enable = 1;
                $this->reset('add_journal_entry');
                $this->add_journal_entry['balance_type'] = 'CR';
            } elseif (end($this->journal_entries)['balance_type'] == 'CR') {
                $this->credit_enable = 0;
                $this->debit_enable = 1;
                $this->reset('add_journal_entry');
                $this->add_journal_entry['balance_type'] = 'DB';
            }
        }
        $this->dispatchBrowserEvent('report-table');
	}

	public function deleteEntry($key)
	{
		unset($this->journal_entries[$key]);
        $this->dispatchBrowserEvent('report-table');
	}

	public function submit()
	{
        $error = [
            'type' => 'required'
        ];
        if (count($this->sub_types) != 0){
            $error['sub_type'] = 'required';
        }
        $this->validate($error);

		if (count($this->journal_entries) == 0) {
			$this->alert('error', 'No account entry entered', [
                'position' => 'top-right',
                'toast' => true,
            ]);
		} else {
            $credit = 0;
            $debit = 0;
            foreach ($this->journal_entries as $key => $journal_entry) {
                $credit = $credit + $journal_entry['credit'];
                $debit = $debit + $journal_entry['debit'];
            }

            if ( $credit != $debit){
                $this->alert('error', 'Credit and Debit forex amount  is not same', [
                    'position' => 'center',
                    'toast' => true,
                ]);
            } else {
    			foreach ($this->journal_entries as $key => $journal_entry) {
    				GstJournalEntry::create([
    					'vou_type' => $this->vou_type,
                        'type' => $this->type,
                        'sub_type' => $this->sub_type,
                        'reference_no' => $this->reference_no,
                        'vou_date' => $this->vou_date,
                        'vou_no' => $this->vou_no,
                        'doc_no' => $this->doc_no,
                        'doc_date' => $this->doc_date,
                        'balance_type' => $journal_entry['balance_type'],
                        'account_id' => $journal_entry['account_id'],
                        'entry_type' => $journal_entry['entry_type'],
                        'gst_commodity_id' => $journal_entry['gst_commodity_id'],
                        'assess_amt' => $journal_entry['assess_amt'],
                        'currency_id' => $journal_entry['currency_id'],
                        'exchange_rate' => $journal_entry['exchange_rate'],
                        'debit' => $journal_entry['debit'],
                        'credit' => $journal_entry['credit'],
                        'narration' => $this->narration,
    					'company_id' => auth()->user()->company ? auth()->user()->company->id : null
    				]);
    			}
            	toast('Journal entry created successfully!', 'success');
    			return redirect()->route('erp.gst.gst-entry.journal-entry.index');
            }
		}
        $this->dispatchBrowserEvent('report-table');
	}

    public function render()
    {
        return <<<'blade'
            <div>
                <form wire:submit.prevent="submit">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Vou. Type</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter Vou Type" wire:model.defer="vou_type" disabled>
                            @error('vou_type')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Vou Date</label>
                            <input type="date" class="form-control form-control-sm"
                                   placeholder="Enter Vou Date" wire:model.defer="vou_date">
                            @error('vou_date')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Type</label>                    
                            <select class="form-control form-control-sm" wire:model="type">
                                <option value=''>Select Type</option>
                                @foreach($types as $key => $type)
                                    <option value="{{$key}}">{{$type}}</option>
                                @endforeach
                            </select>
                            @error('type')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Sub Type</label>
                            <select class="form-control form-control-sm" wire:model="sub_type" {{ count($sub_types) == 0 ? 'disabled' : '' }}>
                                <option value=''>Select Sub Type</option>
                                @foreach($sub_types as $key => $sub_type)
                                    <option value="{{$sub_type}}">{{$sub_type}}</option>
                                @endforeach
                            </select>
                            @error('sub_type')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Vou No</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter Vou No" wire:model.defer="vou_no" disabled>
                            @error('vou_no')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Doc No</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter Doc No" wire:model.defer="doc_no" disabled>
                            @error('doc_no')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
           	        </div>
           	        <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Doc Date</label>
                            <input type="date" class="form-control form-control-sm" wire:model.defer="doc_date" disabled>
                            @error('doc_date')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Narration</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter Narration" wire:model.defer="narration">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4  {{ $reference_enable == 1 ? '' : 'd-none'}}">
                            <label class="form-label">Reference No</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter Reference No" wire:model.defer="reference_no">
                        </div>
                    </div>

                    <input type="submit" class="d-none" id="formSubmitBtn">
                </form>

                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom report_table">
                   		<thead>
                            <tr>
                                <th class="bg-primary text-white">Cr/Db</th>
                                <th class="bg-primary text-white">Account Name </th>
                                <th class="bg-primary text-white">Type</th>
                                <th class="bg-primary text-white">Commodity</th>
                                <th class="bg-primary text-white">Assess Amt</th>
                                <th class="bg-primary text-white">Currency</th>
                                <th class="bg-primary text-white">Exchange Rate</th>
                                <th class="bg-primary text-white">Debit</th>
                                <th class="bg-primary text-white">Credit</th>
                                <th class="bg-primary text-white">Action</th>
                            </tr>
                       </thead>
                       <tbody>
                            <tr>
                                <td>
                                    <select class="form-control form-control-sm form-select" wire:model={{"add_journal_entry.balance_type"}}>
                                        @foreach ($balance_types as $balance_type)
                                            <option value="{{ $balance_type }}">
                                                {{ $balance_type }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control form-control-sm form-select" wire:model.defer={{"add_journal_entry.account_id"}}>
                                        <option value="">Select Account</option>
                                        @foreach ($accounts as $account)
                                            <option value="{{ $account->id }}">
                                                {{ $account->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control form-control-sm form-select" wire:model.defer={{"add_journal_entry.type"}} {{$entry_type_enable == 1 ? '' : 'disabled'}}>
                                        <option value="">Select type</option>
                                        @foreach ($entry_types as $key => $type)
                                            <option value="{{ $key }}">
                                                {{ $type }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control form-control-sm form-select" wire:model.defer={{"add_journal_entry.gst_commodity_id"}} {{$gst_commodity_enable == 1 ? '' : 'disabled'}}>
                                        <option value="">Select Commodity</option>
                                        @foreach ($gstCommodities as $gstCommodity)
                                            <option value="{{ $gstCommodity->id }}">
                                                {{ $gstCommodity->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" class="form-control form-control-sm" wire:model.defer={{"add_journal_entry.assess_amt"}} {{$assess_amt_enable == 1 ? '' : 'disabled'}}>
                                </td>
                                <td>
                                    <select class="form-control form-control-sm form-select" wire:model.defer={{"add_journal_entry.currency_id"}}>
                                        <option value="">Select Currency</option>
                                        @foreach ($currencies as $currency)
                                            <option value="{{ $currency->id }}">
                                                {{ $currency->symbol }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" class="form-control form-control-sm" wire:model.defer={{"add_journal_entry.exchange_rate"}}>
                                </td>
                                <td>
                                    <input type="number" class="form-control form-control-sm" wire:model.defer={{"add_journal_entry.debit"}} {{ $debit_enable == 1 ? '' : 'disabled' }}>
                                </td>
                                <td>
                                    <input type="number" class="form-control form-control-sm" wire:model.defer={{"add_journal_entry.credit"}} {{ $credit_enable == 1 ? '' : 'disabled' }}>
                                </td>
                                <td>
                                    <input type="button" class="btn btn-primary btn-sm" value="Add" wire:click=addEntry>
                                </td>
                            </tr>
                            @foreach ($journal_entries as $key => $journal_entry)
                                <tr>
                                    <td>
                                        {{$journal_entry['balance_type']}}
                                    </td>
                                    <td>
                                        @foreach ($accounts as $account)
                                            {{$account->id == $journal_entry['account_id'] ? $account->name : ''}}
                                        @endforeach
                                    </td>
                                    <td>
                                        {{$journal_entry['entry_type']}}
                                    </td>
                                    <td>
                                        @foreach ($gstCommodities as $gstCommodity)
                                            {{$gstCommodity->id == $journal_entry['gst_commodity_id'] ? $gstCommodity->name : ''}}
                                        @endforeach
                                    </td>
                                    <td>
                                        {{$journal_entry['assess_amt']}}
                                    </td>
                                    <td>
                                        @foreach ($currencies as $currency)
                                            {{$currency->id == $journal_entry['currency_id'] ? $currency->symbol : ''}}
                                        @endforeach
                                    </td>
                                    <td>
                                        {{$journal_entry['exchange_rate']}}
                                    </td>
                                    <td>
                                        {{$journal_entry['debit']}}
                                    </td>
                                    <td>
                                        {{$journal_entry['credit']}}
                                    </td>
                                    <td>
                                        <input type="button" class="btn btn-sm btn-outline-danger" value="Delete" wire:click=deleteEntry({{$key}})>
                                    </td>
                                </tr>
                            @endforeach
                       </tbody>
                    </table>
                </div>
            </div>
        blade;
    }
}
