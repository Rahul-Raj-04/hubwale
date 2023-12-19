<?php

namespace App\Http\Controllers\Livewire\Erp\Gst\GstEntry\UtilizationEntry;

use Livewire\Component;
use App\Models\Account;
use App\Models\UtilizationEntry;
use App\Enum\Enum;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Validator;

class Create extends Component
{
	use LivewireAlert;

	public $accounts = [];
	public $utilization_froms = [];
	public $utilization_fors = [];
	public $utilization_entries = [];
	public $add_utilization_entry;
	public $periods = [];

	public $vou_type;
	public $period_of_utilization;
	public $vou_date;
	public $vou_no;
	public $doc_no;
	public $doc_date;
	public $narration;

	public function mount()
	{
		$this->accounts = Account::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
		$this->add_utilization_entry = [
			'utilization_from' => null,
			'from_account_id' => null,
			'utilization_for' => null,
			'for_account_id' => null,
			'amount' => null
		];

		$this->utilization_froms = Enum::UTILIZATION_FROM;
		$this->utilization_fors = Enum::UTILIZATION_FOR;
		$this->vou_date = date('Y-m-d');
		$this->vou_type = 'Utilization Entry';
		$this->period_of_utilization = 'Not Applied';

		for ($m=1; $m<=12; $m++) {
	     	$month = date('F', mktime(0,0,0,$m, 1, date('Y')));
	     	$this->periods[] = $month." - ".date('Y');
	    }
		for ($m=1; $m<=3; $m++) {
			$month = date('F', mktime(0,0,0,$m, 1, date('Y', strtotime('+1 year'))));
			$this->periods[] = $month." - ".date('Y', strtotime('+1 year'));
		}
	}

	public function addEntry()
	{
		$validator = Validator::make($this->all(), [
            'add_utilization_entry.utilization_from' => 'required',
			'add_utilization_entry.from_account_id' => 'required',
			'add_utilization_entry.utilization_for' => 'required',
			'add_utilization_entry.for_account_id' => 'required',
			'add_utilization_entry.amount' => 'required'
        ],
        [
        	'add_utilization_entry.utilization_from.required' => 'Please select utilization form',
			'add_utilization_entry.from_account_id.required' => 'Please select from account',
			'add_utilization_entry.utilization_for.required' => 'Please select utilization for',
			'add_utilization_entry.for_account_id.required' => 'Please select for account',
			'add_utilization_entry.amount.required' => 'Please enter amount'
        ]);

        if ($validator->fails()) {
        	$this->alert('error', $validator->errors()->first(), [
                'position' => 'center',
                'toast' => true
            ]);
        } else {
	        $this->utilization_entries[] = [
	        	'utilization_from' => $this->add_utilization_entry['utilization_from'],
				'from_account_id' => $this->add_utilization_entry['from_account_id'],
				'utilization_for' => $this->add_utilization_entry['utilization_for'],
				'for_account_id' => $this->add_utilization_entry['for_account_id'],
				'amount' => $this->add_utilization_entry['amount']
	        ];
        }
	    $this->reset('add_utilization_entry');
	}

	public function deleteEntry($key)
	{
		unset($this->utilization_entries[$key]);
	}

	public function submit()
	{
		if (count($this->utilization_entries) == 0) {
			$this->alert('error', 'No account entry entered', [
                'position' => 'top-right',
                'toast' => true,
            ]);
		} else {
			foreach ($this->utilization_entries as $key => $utilization_entry) {
				UtilizationEntry::create([
					'vou_type' => $this->vou_type,
					'period_of_utilization' => $this->period_of_utilization,
					'utilization_type' => 'Normal',
					'vou_date' => $this->vou_date,
					'vou_no' => $this->vou_no,
					'doc_no' => $this->doc_no,
					'doc_date' => $this->doc_date,
					'narration' => $this->narration,
					'utilization_from' => $utilization_entry['utilization_from'],
					'from_account_id' => $utilization_entry['from_account_id'],
					'utilization_for' => $utilization_entry['utilization_for'],
					'for_account_id' => $utilization_entry['for_account_id'],
					'amount' => $utilization_entry['amount'],
					'company_id' => auth()->user()->company ? auth()->user()->company->id : null
				]);
			}
        	toast('Utilization entry created successfully!', 'success');
			return redirect()->route('erp.gst.gst-entry.utilization-entry.index');
		}
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
                    <label class="form-label">Vou No</label>
                    <input type="text" class="form-control form-control-sm"
                           placeholder="Enter Vou No" wire:model.defer="vou_no" disabled>
                    @error('vou_no')
                        <span class="text-danger small wow flash">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Period Of Utilization</label>
                    <select class="form-control form-control-sm" wire:model="period_of_utilization">
                    	<option value='Not Applied'> Not Applied</option>
                        @foreach($periods as $period)
                            <option value="{{$period}}">{{$period}}</option>
                        @endforeach
                    </select>
                    @error('period')
                        <span class="text-danger small wow flash">{{ $message }}</span>
                    @enderror
                </div
           	        </div>
           	        <div class="row">
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
                    </div>
                    <div class="row">
                <div class="col-md-6 mb-4">
                    <label class="form-label">Narration</label>
                    <input type="text" class="form-control form-control-sm"
                           placeholder="Enter narration" wire:model.defer="narration">
                </div>
                    </div>
                    <table class="table table-bordered text-nowrap border-bottom">
           		<thead>
                    <tr>
                        <th class="bg-primary text-white">Utilization From</th>
                        <th class="bg-primary text-white">From A/C</th>
                        <th class="bg-primary text-white">Utilization For </th>
                        <th class="bg-primary text-white">For A/C </th>
                        <th class="bg-primary text-white">Amount</th>
                        <th class="bg-primary text-white">Action</th>
                    </tr>
               </thead>
               <tbody>
                    @foreach ($utilization_entries as $key => $utilization_entry)
                        <tr>
                            <td>
                                {{$utilization_entry['utilization_from']}}
                            </td>
                            <td>
                                @foreach ($accounts as $account)
                                    {{$account->id == $utilization_entry['from_account_id'] ? $account->name : ''}}
                                @endforeach
                            </td>
                            <td>
                                {{$utilization_entry['utilization_for']}}
                            </td>
                            <td>
                                @foreach ($accounts as $account)
                                    {{$account->id == $utilization_entry['for_account_id'] ? $account->name : ''}}
                                @endforeach
                            </td>
                            <td>
                                {{$utilization_entry['amount']}}
                            </td>
                            <td>
                                <input type="button" class="btn btn-primary" value="Delete" wire:click=deleteEntry({{$key}})>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>
                            <select class="form-control form-control-sm form-select" wire:model.defer={{"add_utilization_entry.utilization_from"}}>
                                <option value="">Select from</option>
                                @foreach ($utilization_froms as $utilization_from)
                                    <option value="{{ $utilization_from }}">
                                        {{ $utilization_from }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="form-control form-control-sm form-select" wire:model.defer={{"add_utilization_entry.from_account_id"}}>
                                <option value="">Select Account</option>
                                @foreach ($accounts as $account)
                                    <option value="{{ $account->id }}">
                                        {{ $account->name }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="form-control form-control-sm form-select" wire:model.defer={{"add_utilization_entry.utilization_for"}}>
                                <option value="">Select for</option>
                                @foreach ($utilization_fors as $utilization_for)
                                    <option value="{{ $utilization_for }}">
                                        {{ $utilization_for }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="form-control form-control-sm form-select" wire:model.defer={{"add_utilization_entry.for_account_id"}}>
                                <option value="">Select Account</option>
                                @foreach ($accounts as $account)
                                    <option value="{{ $account->id }}">
                                        {{ $account->name }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="number" class="form-control form-control-sm" placeholder="Enter amount" wire:model.defer={{"add_utilization_entry.amount"}}>
                        </td>
                        <td>
                            <input type="button" class="btn btn-primary" value="Add" wire:click=addEntry>
                        </td>
                    </tr>
               </tbody>
                    </table>
                    <input type="submit" class="d-none" id="formSubmitBtn">
                </form>
            </div>
        blade;
    }
}
