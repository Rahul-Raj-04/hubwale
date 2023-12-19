<?php

namespace App\Http\Controllers\Livewire\Erp\Gst\GstIncome;

use Livewire\Component;
use App\Models\Account;
use App\Enum\Enum;
use App\Models\GstCommodity;
use App\Models\GstIncome;

class AddGstIncome extends Component
{
	public $party_account_id;
	public $type;
	public $doc_date;
	public $doc_no;
	public $bill_no;
	public $bill_date;
	public $income_account_id;
	public $gst_commodity_id;
	public $assess_amt;
	public $central_tax = 0;
	public $state_tax = 0;
	public $integrated_tax = 0;
	public $total_amount;
	public $narration;

	public $accounts;
	public $gstCommodities;
	public $types;

	public $disabled_state_tax = 1;
	public $disabled_central_tax = 1;
	public $disabled_integrated_tax = 0;

	public function mount()
	{
		$this->accounts = Account::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
		$this->gstCommodities = GstCommodity::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
		$this->types = Enum::GST_INCOME_TYPE;
		$this->bill_date = date('Y-m-d');
		$this->type = 'gst';
	}

	public function updatedType()
	{
		$this->reset('assess_amt');
		$this->reset('gst_commodity_id');
		$this->reset('income_account_id');
		$this->reset('state_tax');
		$this->reset('central_tax');
		$this->reset('integrated_tax');
		$this->reset('total_amount');

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
		} elseif ($this->type == 'exempt') {
			$this->disabled_integrated_tax = 0;
			$this->disabled_central_tax = 0;
			$this->disabled_state_tax = 0;
		} elseif ($this->type == 'export') {
			$this->disabled_integrated_tax = 0;
			$this->disabled_central_tax = 0;
			$this->disabled_state_tax = 0;
		} elseif ($this->type == 'export_rebate') {
			$this->disabled_integrated_tax = 1;
			$this->disabled_central_tax = 0;
			$this->disabled_state_tax = 0;
		} elseif ($this->type == 'export_with_pay') {
			$this->disabled_integrated_tax = 1;
			$this->disabled_central_tax = 0;
			$this->disabled_state_tax = 0;
		} elseif ($this->type == 'sez') {
			$this->disabled_integrated_tax = 0;
			$this->disabled_central_tax = 0;
			$this->disabled_state_tax = 0;
		} elseif ($this->type == 'sez_rebate') {
			$this->disabled_integrated_tax = 1;
			$this->disabled_central_tax = 0;
			$this->disabled_state_tax = 0;
		} elseif ($this->type == 'sez_with_pay') {
			$this->disabled_integrated_tax = 1;
			$this->disabled_central_tax = 0;
			$this->disabled_state_tax = 0;
		} elseif ($this->type == 'export_gst') {
			$this->disabled_integrated_tax = 0;
			$this->disabled_central_tax = 1;
			$this->disabled_state_tax = 1;
		} elseif ($this->type == 'export_igst') {
			$this->disabled_integrated_tax = 1;
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
		$this->validate(['gst_commodity_id' => 'required']);
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
			} elseif ($this->type == 'export_rebate') {
				$this->integrated_tax = ((float)$this->assess_amt * (float)$gstCommodity->gst_slab->integrated_tax) / 100;
			} elseif ($this->type == 'export_with_pay') {
				$this->integrated_tax = ((float)$this->assess_amt * (float)$gstCommodity->gst_slab->integrated_tax) / 100;
			} elseif ($this->type == 'sez_rebate') {
				$this->integrated_tax = ((float)$this->assess_amt * (float)$gstCommodity->gst_slab->integrated_tax) / 100;
			} elseif ($this->type == 'sez_with_pay') {
				$this->integrated_tax = ((float)$this->assess_amt * (float)$gstCommodity->gst_slab->integrated_tax) / 100;
			} elseif ($this->type == 'export_gst') {
				$this->central_tax = ((float)$this->assess_amt * 0.05) / 100;
				$this->state_tax = ((float)$this->assess_amt * 0.05) / 100;
			} elseif ($this->type == 'export_igst') {
				$this->integrated_tax = ((float)$this->assess_amt * 0.1) / 100;
			}
		}

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

	public function updatedCentralTax()
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
			'income_account_id' => 'required',
			'gst_commodity_id' => 'required',
			'assess_amt' => 'required'
		]);

		GstIncome::create([
			'party_account_id' => $this->party_account_id,
			'type' => $this->type,
			'doc_date' => $this->doc_date,
			'doc_no' => $this->doc_no,
			'bill_no' => $this->bill_no,
			'bill_date' => $this->bill_date,
			'income_account_id' => $this->income_account_id,
			'gst_commodity_id' => $this->gst_commodity_id,
			'assess_amt' => $this->assess_amt,
			'central_tax' => $this->central_tax,
			'state_tax' => $this->state_tax,
			'integrated_tax' => $this->integrated_tax,
			'total_amount' => $this->total_amount,
			'narration' => $this->narration,
			'company_id' => auth()->user()->company ? auth()->user()->company->id : null
		]);

        toast('GST income created successfully!', 'success');

        return redirect()->route('erp.gst.gst-income.index');
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
                            <label class="form-label">Bill No</label>
                            <input type="text" class="form-control form-control-sm" wire:model="bill_no" placeholder="Enter bill no">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Bill Date</label>
                            <input type="date" class="form-control form-control-sm" wire:model="bill_date">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Doc Date</label>
                            <input type="date" class="form-control form-control-sm" wire:model="doc_date" disabled>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Doc No</label>
                            <input type="text" class="form-control form-control-sm" wire:model="doc_no" placeholder="Enter doc no" disabled>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Income A/C<i class="text-danger">*</i></label>
                            <select wire:model='income_account_id' class="form-control form-control-sm form-select" required>
                                <option value=>Select account</option>
                                @foreach ($accounts as $account)
                                    <option value="{{ $account->id }}">{{ $account->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('income_account_id')
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
