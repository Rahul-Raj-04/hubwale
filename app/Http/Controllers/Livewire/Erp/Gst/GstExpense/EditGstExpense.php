<?php

namespace App\Http\Controllers\Livewire\Erp\Gst\GstExpense;

use Livewire\Component;
use App\Models\Account;
use App\Enum\Enum;
use App\Models\GstCommodity;
use App\Models\GstExpense;

class EditGstExpense extends Component
{
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

	public $disabled_state_tax;
	public $disabled_central_tax;
	public $disabled_integrated_tax;

	public $state_tax_amount;
	public $central_tax_amount;
	public $integrated_tax_amount;
	public $gstExpense;

	public function mount($id)
	{
        $this->gstExpense = GstExpense::find($id);
		$this->party_account_id = $this->gstExpense->party_account_id;
		$this->type = $this->gstExpense->type;
		$this->vou_date = $this->gstExpense->vou_date;
		$this->vou_no = $this->gstExpense->vou_no;
		$this->bill_no = $this->gstExpense->bill_no;
		$this->bill_date = $this->gstExpense->bill_date;
		$this->expense_account_id = $this->gstExpense->expense_account_id;
		$this->gst_commodity_id = $this->gstExpense->gst_commodity_id;
		$this->assess_amt = $this->gstExpense->assess_amt;
		$this->central_tax = $this->gstExpense->central_tax;
		$this->state_tax = $this->gstExpense->state_tax;
		$this->integrated_tax = $this->gstExpense->integrated_tax;
		$this->total_amount = $this->gstExpense->total_amount;
		$this->narration = $this->gstExpense->narration;
		
		if ($this->gstExpense->type == 'gst') {
			$this->disabled_integrated_tax = 0;
			$this->disabled_central_tax = 1;
			$this->disabled_state_tax = 1;
		} elseif ($this->gstExpense->type == 'igst') {
			$this->disabled_integrated_tax = 1;
			$this->disabled_central_tax = 0;
			$this->disabled_state_tax = 0;
		} elseif ($this->gstExpense->type == 'gst_inter_state') {
			$this->disabled_integrated_tax = 0;
			$this->disabled_central_tax = 1;
			$this->disabled_state_tax = 1;
		} elseif ($this->gstExpense->type == 'igst_intra_state') {
			$this->disabled_integrated_tax = 1;
			$this->disabled_central_tax = 0;
			$this->disabled_state_tax = 0;
		} elseif ($this->gstExpense->type == 'gst_cap_goods') {
			$this->disabled_integrated_tax = 0;
			$this->disabled_central_tax = 1;
			$this->disabled_state_tax = 1;
		} elseif ($this->gstExpense->type == 'igst_cap_goods') {
			$this->disabled_integrated_tax = 1;
			$this->disabled_central_tax = 0;
			$this->disabled_state_tax = 0;
		} elseif ($this->gstExpense->type == 'composite') {
			$this->disabled_integrated_tax = 0;
			$this->disabled_central_tax = 0;
			$this->disabled_state_tax = 0;
		} elseif ($this->gstExpense->type == 'urd_rcm') {
			$this->disabled_integrated_tax = 0;
			$this->disabled_central_tax = 1;
			$this->disabled_state_tax = 1;
		} elseif ($this->gstExpense->type == 'urd_rcm_no_itc') {
			$this->disabled_integrated_tax = 0;
			$this->disabled_central_tax = 1;
			$this->disabled_state_tax = 1;
		} elseif ($this->gstExpense->type == 'exempt') {
			$this->disabled_integrated_tax = 0;
			$this->disabled_central_tax = 0;
			$this->disabled_state_tax = 0;
		} elseif ($this->gstExpense->type == 'non_gst') {
			$this->disabled_integrated_tax = 0;
			$this->disabled_central_tax = 0;
			$this->disabled_state_tax = 0;
		}

		$this->accounts = Account::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
		$this->gstCommodities = GstCommodity::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
		$this->types = Enum::GST_EXPENSE_TYPE;
	}

	public function updatedType()
	{

		$this->reset('assess_amt');
		$this->reset('gst_commodity_id');
		$this->reset('expense_account_id');
		$this->reset('state_tax');
		$this->reset('central_tax');
		$this->reset('integrated_tax');
		$this->reset('total_amount');

		if ($this->type == 'gst') {
			$this->disabled_integrated_tax = 0;
			$this->disabled_central_tax = 1;
			$this->disabled_state_tax = 1;
		}elseif ($this->type == 'igst') {
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
	}

	public function updatedGstCommodityId()
	{
		$this->reset('assess_amt');
		$this->reset('state_tax');
		$this->reset('central_tax');
		$this->reset('integrated_tax');
		$this->reset('total_amount');
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
	}

	public function updatedCentralTax()
	{
		$this->reset('total_amount');
		$this->total_amount = (float)$this->assess_amt;
		$this->total_amount = round(($this->total_amount + (float)$this->central_tax + (float)$this->state_tax + (float)$this->integrated_tax), 2);
	}

	public function updatedStateTax()
	{
		$this->reset('total_amount');
		$this->total_amount = (float)$this->assess_amt;
		$this->total_amount = round(($this->total_amount + (float)$this->central_tax + (float)$this->state_tax + (float)$this->integrated_tax), 2);
	}

	public function updatedIntegratedTax()
	{
		$this->reset('total_amount');
		$this->total_amount = (float)$this->assess_amt;
		$this->total_amount = round(($this->total_amount + (float)$this->central_tax + (float)$this->state_tax + (float)$this->integrated_tax), 2);
	}

	public function submit()
	{
		$this->validate([
			'party_account_id' => 'required',
			'expense_account_id' => 'required',
			'gst_commodity_id' => 'required',
			'assess_amt' => 'required'
		]);

		$this->gstExpense->party_account_id = $this->party_account_id;
		$this->gstExpense->type = $this->type;
		$this->gstExpense->vou_date = $this->vou_date;
		$this->gstExpense->vou_no = $this->vou_no;
		$this->gstExpense->bill_no = $this->bill_no;
		$this->gstExpense->bill_date = $this->bill_date;
		$this->gstExpense->expense_account_id = $this->expense_account_id;
		$this->gstExpense->gst_commodity_id = $this->gst_commodity_id;
		$this->gstExpense->assess_amt = $this->assess_amt;
		$this->gstExpense->central_tax = $this->central_tax;
		$this->gstExpense->state_tax = $this->state_tax;
		$this->gstExpense->integrated_tax = $this->integrated_tax;
		$this->gstExpense->total_amount = $this->total_amount;
		$this->gstExpense->narration = $this->narration;
		$this->gstExpense->save();

        toast('GST expense updated successfully!', 'success');

        return redirect()->route('erp.gst.gst-expense.index');
	}

    public function render()
    {
        return <<<'blade'
            <div>
        		<form wire:submit.prevent="submit">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Party A/C<i class="text-danger">*</i></label>
                            <select wire:model='party_account_id' class="form-control form-control-sm form-select" required>
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
                            <input type="date" class="form-control form-control-sm" wire:model="vou_date">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Vou No</label>
                            <input type="text" class="form-control form-control-sm" wire:model="vou_no" placeholder="Enter vou no" disabled>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Bill No</label>
                            <input type="text" class="form-control form-control-sm" wire:model="bill_no" placeholder="Enter bill no">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Bill Date</label>
                            <input type="date" class="form-control form-control-sm" wire:model="bill_date">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Expense A/C<i class="text-danger">*</i></label>
                            <select wire:model='expense_account_id' class="form-control form-control-sm form-select" required>
                                <option value=>Select account</option>
                                @foreach ($accounts as $account)
                                    <option value="{{ $account->id }}">{{ $account->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('expense_account_id')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">GST Commodity<i class="text-danger">*</i></label>
                            <select wire:model='gst_commodity_id' class="form-control form-control-sm form-select" required>
                                <option value="">Select GST Commodity</option>
                                @foreach ($gstCommodities as $gstCommodity)
                                    <option value="{{ $gstCommodity->id }}">
                                    {{ $gstCommodity->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('gst_commodity_id')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Assess Amt <i class="text-danger">*</i></label>
                            <input type="number" class="form-control form-control-sm" wire:model="assess_amt" step="any" placeholder="Enter assess amt" required>
                            @error('assess_amt')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>  

                        <div class="col-md-6">
                            <label class="form-label">Central Tax</label>
                            <input type="number" class="form-control form-control-sm" wire:model="central_tax" step="any" placeholder="Enter central tax" {{ $disabled_central_tax == 1 ? '' : 'disabled'}}>
                            @error('central_tax')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">State Tax</label>
                            <input type="number" class="form-control form-control-sm" wire:model="state_tax" step="any" placeholder="Enter state tax" {{ $disabled_state_tax == 1 ? '' : 'disabled'}}>
                            @error('state_tax')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Integrated Tax</label>
                            <input type="number" class="form-control form-control-sm" wire:model="integrated_tax" step="any" placeholder="Enter integrated tax" {{ $disabled_integrated_tax == 1 ? '' : 'disabled'}}>
                            @error('integrated_tax')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Total Amount</label>
                            <input type="number" class="form-control form-control-sm" placeholder="Total amount" step="any" wire:model="total_amount">
                            @error('total_amount')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Narration</label>
                            <input type="text" class="form-control form-control-sm" wire:model="narration" placeholder="Enter narration">
                        </div>
                    </div>
                    <div>
                        <input type="submit" value="save" id="formSubmitBtn" class="d-none">
                    </div>
                </form>     
            </div>
        blade;
    }
}
