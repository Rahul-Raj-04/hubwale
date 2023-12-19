<?php

namespace App\Http\Controllers\Livewire\Erp\Gst\GstExpense;

use Livewire\Component;
use App\Models\Account;
use App\Enum\Enum;
use App\Models\GstCommodity;
use App\Models\GstExpense;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Validator;

class AddGstExpense extends Component
{
	use LivewireAlert;

	public $party_account_id;
	public $type;
	public $vou_date;
	public $vou_no;
	public $bill_no;
	public $bill_date;
	public $expense_account_id;
	public $gst_commodity_id;
	public $assess_amt;
	public $central_tax;
	public $state_tax;
	public $integrated_tax;
	public $total_amount;
	public $narration;

	public $accounts;
	public $gstCommodities;
	public $types;
	public $expense_entries = [];
	public $expenseAccounts;

	public $disabled_state_tax = 1;
	public $disabled_central_tax = 1;
	public $disabled_integrated_tax = 0;

	public function mount()
	{	
		$this->expenseAccounts = Account::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
		$this->accounts = Account::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get()->filter(function ($a)
        {
            return $a->account_group->name == 'Debtors (Retail)' || 
            	   $a->account_group->name == 'Debtors (Wholesale)' || 
            	   $a->account_group->name == 'Sundry Creditors' || 
            	   $a->account_group->name == 'Bank Accounts (Banks)' || 
            	   $a->account_group->name == 'Bank OCC a/c' || 
            	   $a->account_group->name == 'Cash-in-hand' ;
        });
		$this->gstCommodities = GstCommodity::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
		$this->types = Enum::GST_EXPENSE_TYPE;
		$this->vou_date = date('Y-m-d');
		$this->type = 'gst';
	}

	public function updatedType()
	{
        $this->reset('expense_account_id');
		$this->reset('gst_commodity_id');
		$this->reset('assess_amt');
		$this->reset('central_tax');
		$this->reset('state_tax');
		$this->reset('integrated_tax');
		$this->reset('total_amount');
		$this->reset('expense_entries');

		if ($this->type == 'igst') {
			$this->disabled_integrated_tax = 1;
			$this->disabled_central_tax = 0;
			$this->disabled_state_tax = 0;
		} elseif ($this->type == 'gst_inter_state') {
			$this->disabled_integrated_tax = 0;
			$this->disabled_central_tax = 1;
			$this->disabled_state_tax = 1;
		} elseif ($this->type == 'igst_intra_state') {
			$this->disabled_integrated_tax = 1;
			$this->disabled_central_tax = 0;
			$this->disabled_state_tax = 0;
		} elseif ($this->type == 'gst_cap_goods') {
			$this->disabled_integrated_tax = 0;
			$this->disabled_central_tax = 1;
			$this->disabled_state_tax = 1;
		} elseif ($this->type == 'igst_cap_goods') {
			$this->disabled_integrated_tax = 1;
			$this->disabled_central_tax = 0;
			$this->disabled_state_tax = 0;
		} elseif ($this->type == 'composite') {
			$this->disabled_integrated_tax = 0;
			$this->disabled_central_tax = 0;
			$this->disabled_state_tax = 0;
		} elseif ($this->type == 'urd_rcm') {
			$this->disabled_integrated_tax = 0;
			$this->disabled_central_tax = 1;
			$this->disabled_state_tax = 1;
		} elseif ($this->type == 'urd_rcm_no_itc') {
			$this->disabled_integrated_tax = 0;
			$this->disabled_central_tax = 1;
			$this->disabled_state_tax = 1;
		} elseif ($this->type == 'exempt') {
			$this->disabled_integrated_tax = 0;
			$this->disabled_central_tax = 0;
			$this->disabled_state_tax = 0;
		} elseif ($this->type == 'non_gst') {
			$this->disabled_integrated_tax = 0;
			$this->disabled_central_tax = 0;
			$this->disabled_state_tax = 0;
		}
		$this->dispatchBrowserEvent('entry_table');
	}

	public function updatedGstCommodityId()
	{
		$this->reset('assess_amt');
		$this->reset('state_tax');
		$this->reset('central_tax');
		$this->reset('integrated_tax');
		$this->reset('total_amount');
		$this->dispatchBrowserEvent('entry_table');
	}

	public function updatedAssessAmt()
	{
		if($this->gst_commodity_id){
			$gstCommodity = GstCommodity::find($this->gst_commodity_id);

			if ($this->type == 'gst'){
				$this->central_tax = ((float)$this->assess_amt * (float)$gstCommodity->gst_slab->central_tax) / 100;
				$this->state_tax = ((float)$this->assess_amt * (float)$gstCommodity->gst_slab->state_ut_tax) / 100;
			}elseif ($this->type == 'igst') {
				$this->integrated_tax = ((float)$this->assess_amt * (float)$gstCommodity->gst_slab->integrated_tax) / 100;
			} elseif ($this->type == 'gst_inter_state') {
				$this->central_tax = ((float)$this->assess_amt * (float)$gstCommodity->gst_slab->central_tax) / 100;
				$this->state_tax = ((float)$this->assess_amt * (float)$gstCommodity->gst_slab->state_ut_tax) / 100;
			} elseif ($this->type == 'igst_intra_state') {
				$this->integrated_tax = ((float)$this->assess_amt * (float)$gstCommodity->gst_slab->integrated_tax) / 100;
			} elseif ($this->type == 'gst_cap_goods') {
				$this->central_tax = ((float)$this->assess_amt * (float)$gstCommodity->gst_slab->central_tax) / 100;
				$this->state_tax = ((float)$this->assess_amt * (float)$gstCommodity->gst_slab->state_ut_tax) / 100;
			} elseif ($this->type == 'igst_cap_goods') {
				$this->integrated_tax = ((float)$this->assess_amt * (float)$gstCommodity->gst_slab->integrated_tax) / 100;
			} elseif ($this->type == 'urd_rcm') {
				$this->central_tax = ((float)$this->assess_amt * (float)$gstCommodity->gst_slab->central_tax) / 100;
				$this->state_tax = ((float)$this->assess_amt * (float)$gstCommodity->gst_slab->state_ut_tax) / 100;
			} elseif ($this->type == 'urd_rcm_no_itc') {
				$this->central_tax = ((float)$this->assess_amt * (float)$gstCommodity->gst_slab->central_tax) / 100;
				$this->state_tax = ((float)$this->assess_amt * (float)$gstCommodity->gst_slab->state_ut_tax) / 100;
			}

		}
		$this->reset('total_amount');
		$this->total_amount = (float)$this->assess_amt;
		$this->total_amount = round(($this->total_amount + (float)$this->central_tax + (float)$this->state_tax + (float)$this->integrated_tax), 2);
		$this->dispatchBrowserEvent('entry_table');
	}

	public function updatedStateTax()
	{
		$this->reset('total_amount');
		$this->total_amount = (float)$this->assess_amt;
		$this->total_amount = round(($this->total_amount + (float)$this->central_tax + (float)$this->state_tax + (float)$this->integrated_tax), 2);
		$this->dispatchBrowserEvent('entry_table');
	}

	public function updatedCentralTax()
	{
		$this->reset('total_amount');
		$this->total_amount = (float)$this->assess_amt;
		$this->total_amount = round(($this->total_amount + (float)$this->central_tax + (float)$this->state_tax + (float)$this->integrated_tax), 2);
		$this->dispatchBrowserEvent('entry_table');
	}

	public function updatedIntegratedTax()
	{
		$this->reset('total_amount');
		$this->total_amount = (float)$this->assess_amt;
		$this->total_amount = round(($this->total_amount + (float)$this->central_tax + (float)$this->state_tax + (float)$this->integrated_tax), 2);
		$this->dispatchBrowserEvent('entry_table');
	}

	public function addEntry()
	{
		$validator = Validator::make($this->all(), 
			[
				'expense_account_id' => 'required',
				'gst_commodity_id' => 'required',
				'assess_amt' => 'required',
			],
			[
				'expense_account_id.required' => 'Select Expense Account',
				'gst_commodity_id.required' => 'Select Gst Commodity',
				'assess_amt.required' => 'Enter Assess Amt'
			]);
        if ($validator->fails()) {
        	$this->alert('error', $validator->errors()->first(), [
                'position' => 'center',
                'toast' => true
            ]);
        } else {
	        $this->expense_entries[] = [
	        	'expense_account_id' => $this->expense_account_id,
                'gst_commodity_id' => $this->gst_commodity_id,
                'assess_amt' => $this->assess_amt,
                'central_tax' => $this->central_tax,
				'state_tax' => $this->state_tax,
				'integrated_tax' => $this->integrated_tax,
				'total_amount' => $this->total_amount
	        ];
	        $this->reset('expense_account_id');
			$this->reset('gst_commodity_id');
			$this->reset('assess_amt');
			$this->reset('central_tax');
			$this->reset('state_tax');
			$this->reset('integrated_tax');
			$this->reset('total_amount');
        }
        $this->dispatchBrowserEvent('entry_table');
	}

	public function deleteEntry($key)
	{
		unset($this->expense_entries[$key]);
        $this->dispatchBrowserEvent('entry_table');
	}

	public function submit()
	{
		$this->validate([
			'party_account_id' => 'required',
		]);

		if (count($this->expense_entries) == 0) {
			$this->alert('error', 'No account entry entered', [
                'position' => 'top-right',
                'toast' => true,
            ]);
		} else {
	    	foreach ($this->expense_entries as $key => $expense_entry) {
				GstExpense::create([
					'party_account_id' => $this->party_account_id,
					'type' => $this->type,
					'vou_date' => $this->vou_date,
					'vou_no' => $this->vou_no,
					'bill_no' => $this->bill_no,
					'bill_date' => $this->bill_date,
					'expense_account_id' => $expense_entry['expense_account_id'],
					'gst_commodity_id' => $expense_entry['gst_commodity_id'],
					'assess_amt' => $expense_entry['assess_amt'],
					'central_tax' => $expense_entry['central_tax'],
					'state_tax' => $expense_entry['state_tax'],
					'integrated_tax' => $expense_entry['integrated_tax'],
					'total_amount' => $expense_entry['total_amount'],
					'narration' => $this->narration,
					'company_id' => auth()->user()->company ? auth()->user()->company->id : null
				]);
			}
	        toast('GST expense created successfully!', 'success');
	        return redirect()->route('erp.gst.gst-expense.index');
		}
        $this->dispatchBrowserEvent('entry_table');
	}

    public function render()
    {
        return <<<'blade'
            <div>
        		<form wire:submit.prevent="submit">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Party A/C<i class="text-danger">*</i></label>
                            <select wire:model.defer='party_account_id' class="form-control form-control-sm form-select" required>
                                <option value=>Select account</option>
                                @foreach ($accounts as $account)
                                    <option value="{{ $account->id }}">{{ $account->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('party_account_id')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Type<i class="text-danger">*</i></label>
                            <select wire:model='type' class="form-control form-control-sm form-select" required>
                                @foreach ($types as $key => $type)
                                    <option value="{{ $key }}">{{ $type }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Vou Date</label>
                            <input type="date" class="form-control form-control-sm" wire:model.defer="vou_date">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Vou No</label>
                            <input type="text" class="form-control form-control-sm" wire:model.defer="vou_no" placeholder="Enter vou no" disabled>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Bill No</label>
                            <input type="text" class="form-control form-control-sm" wire:model.defer="bill_no" placeholder="Enter bill no">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Bill Date</label>
                            <input type="date" class="form-control form-control-sm" wire:model.defer="bill_date">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Narration</label>
                            <input type="text" class="form-control form-control-sm" wire:model.defer="narration" placeholder="Enter narration">
                        </div>
                    </div>
                    <div>
                        <input type="submit" value="save" id="formSubmitBtn" class="d-none">
                    </div>
                </form>

                <div class="pt-5">
                    <table class="table table-bordered text-nowrap border-bottom entry_table">
           	         	<thead>
                             <tr>
                                <th class="bg-primary text-white">Expense A/C.</th>
                                <th class="bg-primary text-white">Commodity </th>
                                <th class="bg-primary text-white">Assess Amt</th>
                                <th class="bg-primary text-white">Central Tax</th>
                                <th class="bg-primary text-white">State/Ut Tax</th>
                                <th class="bg-primary text-white">Integrated Tax</th>
                                <th class="bg-primary text-white">Total Amount</th>
                                <th class="bg-primary text-white">Action</th>
                             </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select class="form-control form-control-sm form-select" wire:model.defer="expense_account_id">
                                        <option value="">Select Account</option>
                                        @foreach ($expenseAccounts as $account)
                                            <option value="{{ $account->id }}">
                                                {{ $account->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control form-control-sm form-select" wire:model="gst_commodity_id">
                                        <option value="">Select gstCommodity</option>
                                        @foreach ($gstCommodities as $key => $gstCommodity)
                                            <option value="{{ $gstCommodity->id }}">
                                                {{ $gstCommodity->description }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" class="form-control form-control-sm" wire:model="assess_amt">
                                </td>
                                <td>
                                    <input type="number" class="form-control form-control-sm" wire:model="central_tax" {{ $disabled_central_tax == 1 ? '' : 'disabled'}}>
                                </td>
                                <td>
                                    <input type="number" class="form-control form-control-sm" wire:model="state_tax" {{ $disabled_state_tax == 1 ? '' : 'disabled'}}>
                                </td>
                                <td>
                                    <input type="number" class="form-control form-control-sm" wire:model="integrated_tax" {{ $disabled_integrated_tax == 1 ? '' : 'disabled'}}>
                                </td>
                                <td>
                                    <input type="number" class="form-control form-control-sm" wire:model.defer="total_amount">
                                </td>
                                <td>
                                    <input type="button" class="btn btn-primary btn-sm" value="Add" wire:click=addEntry>
                                </td>
                            </tr>
                            @foreach ($expense_entries as $key => $expense_entry)
                                 <tr>
                                     <td>
                                        @foreach ($expenseAccounts as $account)
                                             {{$account->id == $expense_entry['expense_account_id'] ? $account->name : ''}}
                                        @endforeach
                                     </td>
                                     <td>
                                         @foreach ($gstCommodities as $gstCommodity)
                                            {{$gstCommodity->id == $expense_entry['gst_commodity_id'] ? $gstCommodity->description : ''}}
                                         @endforeach
                                     </td>
                                     <td>
                                         	{{$expense_entry['assess_amt']}}
                                     </td>
                                     <td>
                                         	{{$expense_entry['central_tax']}}
                                     </td>
                                     <td>
                                         	{{$expense_entry['state_tax']}}
                                     </td>
                                     <td>
                                         	{{$expense_entry['integrated_tax']}}
                                     </td>
                                     <td>
                                         	{{$expense_entry['total_amount']}}
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
