<?php

namespace App\Http\Controllers\Livewire\Erp\Gst\GstEntry\BankPayment;

use Livewire\Component;
use App\Models\Account;
use App\Models\GstEntry;
use App\Enum\Enum;

class Create extends Component
{
	public $accounts;
	public $periods = [];

	public $account_id;
	public $date;
	public $utilization_type;
	public $vou_no;
	public $period;
	public $chq_dd_date;
	public $chq_dd_no;
	public $challan_date;
	public $challan_no;
	public $tax = [];
	public $interest = [];
	public $penalty = [];
	public $fees = [];
	public $other = [];
	public $total = [];
	public $amount;
	public $narration;

	public function mount()
	{
		$this->accounts = Account::where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
		$this->date = date('Y-m-d');
		$this->period = 'Not Applied';
		$this->chq_dd_date = date('Y-m-d');
		$this->utilization_type = 'Normal';
		$this->amount = 0;

        for ($m=1; $m<=12; $m++) {
	     	$month = date('F', mktime(0,0,0,$m, 1, date('Y')));
	     	$this->periods[] = $month." - ".date('Y');
	    }
		for ($m=1; $m<=3; $m++) {
			$month = date('F', mktime(0,0,0,$m, 1, date('Y', strtotime('+1 year'))));
			$this->periods[] = $month." - ".date('Y', strtotime('+1 year'));
		}
		$this->tax = [
			'central_tax' => 0,
			'integrated_tax' => 0,
			'state_ut_tax' => 0,
			'total' => 0
		];
		$this->interest = [
			'central_tax' => 0,
			'integrated_tax' => 0,
			'state_ut_tax' => 0,
			'total' => 0
		];
		$this->penalty = [
			'central_tax' => 0,
			'integrated_tax' => 0,
			'state_ut_tax' => 0,
			'total' => 0
		];
		$this->fees = [
			'central_tax' => 0,
			'integrated_tax' => 0,
			'state_ut_tax' => 0,
			'total' => 0
		];
		$this->other = [
			'central_tax' => 0,
			'integrated_tax' => 0,
			'state_ut_tax' => 0,
			'total' => 0
		];
		$this->total = [
			'central_tax' => 0,
			'integrated_tax' => 0,
			'state_ut_tax' => 0,
			'total' => 0
		];
	}

	public function updatedTaxCentralTax()
	{
		$this->total['central_tax'] = 0 ;
		$this->tax['total'] = 0 ;
		$this->total['central_tax'] = (int)$this->tax['central_tax'] + (int)$this->interest['central_tax'] + (int)$this->penalty['central_tax'] + (int)$this->fees['central_tax'] + (int)$this->other['central_tax'];
		$this->tax['total'] = array_sum($this->tax);
		$this->total['total'] = $this->tax['total'] + $this->interest['total'] + $this->penalty['total'] + $this->fees['total'] + $this->other['total'];
		$this->amount = $this->total['total'];
	}
	public function updatedTaxIntegratedTax()
	{
		$this->total['integrated_tax'] = 0 ;
		$this->tax['total'] = 0 ;
		$this->total['integrated_tax'] = (int)$this->tax['integrated_tax'] + (int)$this->interest['integrated_tax'] + (int)$this->penalty['integrated_tax'] + (int)$this->fees['integrated_tax'] + (int)$this->other['integrated_tax'];
		$this->tax['total'] = array_sum($this->tax);
		$this->total['total'] = $this->tax['total'] + $this->interest['total'] + $this->penalty['total'] + $this->fees['total'] + $this->other['total'];
		$this->amount = $this->total['total'];
	}
	public function updatedTaxStateUtTax()
	{
		$this->total['state_ut_tax'] = 0 ;
		$this->tax['total'] = 0 ;
		$this->total['state_ut_tax'] = (int)$this->tax['state_ut_tax'] + (int)$this->interest['state_ut_tax'] + (int)$this->penalty['state_ut_tax'] + (int)$this->fees['state_ut_tax'] + (int)$this->other['state_ut_tax'];
		$this->tax['total'] = array_sum($this->tax);
		$this->total['total'] = $this->tax['total'] + $this->interest['total'] + $this->penalty['total'] + $this->fees['total'] + $this->other['total'];
		$this->amount = $this->total['total'];
	}

	public function updatedInterestCentralTax()
	{
		$this->total['central_tax'] = 0 ;
		$this->interest['total'] = 0 ;
		$this->total['central_tax'] = (int)$this->tax['central_tax'] + (int)$this->interest['central_tax'] + (int)$this->penalty['central_tax'] + (int)$this->fees['central_tax'] + (int)$this->other['central_tax'];
		$this->interest['total'] = array_sum($this->interest);
		$this->total['total'] = $this->tax['total'] + $this->interest['total'] + $this->penalty['total'] + $this->fees['total'] + $this->other['total'];
		$this->amount = $this->total['total'];
	}
	public function updatedInterestIntegratedTax()
	{
		$this->total['integrated_tax'] = 0 ;
		$this->interest['total'] = 0 ;
		$this->total['integrated_tax'] = (int)$this->tax['integrated_tax'] + (int)$this->interest['integrated_tax'] + (int)$this->penalty['integrated_tax'] + (int)$this->fees['integrated_tax'] + (int)$this->other['integrated_tax'];
		$this->interest['total'] = array_sum($this->interest);
		$this->total['total'] = $this->tax['total'] + $this->interest['total'] + $this->penalty['total'] + $this->fees['total'] + $this->other['total'];
		$this->amount = $this->total['total'];
	}
	public function updatedInterestStateUtTax()
	{
		$this->total['state_ut_tax'] = 0 ;
		$this->interest['total'] = 0 ;
		$this->total['state_ut_tax'] = (int)$this->tax['state_ut_tax'] + (int)$this->interest['state_ut_tax'] + (int)$this->penalty['state_ut_tax'] + (int)$this->fees['state_ut_tax'] + (int)$this->other['state_ut_tax'];
		$this->interest['total'] = array_sum($this->interest);
		$this->total['total'] = $this->tax['total'] + $this->interest['total'] + $this->penalty['total'] + $this->fees['total'] + $this->other['total'];
		$this->amount = $this->total['total'];
	}

	public function updatedPenaltyCentralTax()
	{
		$this->total['central_tax'] = 0 ;
		$this->penalty['total'] = 0 ;
		$this->total['central_tax'] = (int)$this->tax['central_tax'] + (int)$this->interest['central_tax'] + (int)$this->penalty['central_tax'] + (int)$this->fees['central_tax'] + (int)$this->other['central_tax'];
		$this->penalty['total'] = array_sum($this->penalty);
		$this->total['total'] = $this->tax['total'] + $this->interest['total'] + $this->penalty['total'] + $this->fees['total'] + $this->other['total'];
		$this->amount = $this->total['total'];
	}
	public function updatedPenaltyIntegratedTax()
	{
		$this->total['integrated_tax'] = 0 ;
		$this->penalty['total'] = 0 ;
		$this->total['integrated_tax'] = (int)$this->tax['integrated_tax'] + (int)$this->interest['integrated_tax'] + (int)$this->penalty['integrated_tax'] + (int)$this->fees['integrated_tax'] + (int)$this->other['integrated_tax'];
		$this->penalty['total'] = array_sum($this->penalty);
		$this->total['total'] = $this->tax['total'] + $this->interest['total'] + $this->penalty['total'] + $this->fees['total'] + $this->other['total'];
		$this->amount = $this->total['total'];
	}
	public function updatedPenaltyStateUtTax()
	{
		$this->total['state_ut_tax'] = 0 ;
		$this->penalty['total'] = 0 ;
		$this->total['state_ut_tax'] = (int)$this->tax['state_ut_tax'] + (int)$this->interest['state_ut_tax'] + (int)$this->penalty['state_ut_tax'] + (int)$this->fees['state_ut_tax'] + (int)$this->other['state_ut_tax'];
		$this->penalty['total'] = array_sum($this->penalty);
		$this->total['total'] = $this->tax['total'] + $this->interest['total'] + $this->penalty['total'] + $this->fees['total'] + $this->other['total'];
		$this->amount = $this->total['total'];
	}

	public function updatedFeesCentralTax()
	{
		$this->total['central_tax'] = 0 ;
		$this->fees['total'] = 0 ;
		$this->total['central_tax'] = (int)$this->tax['central_tax'] + (int)$this->interest['central_tax'] + (int)$this->penalty['central_tax'] + (int)$this->fees['central_tax'] + (int)$this->other['central_tax'];
		$this->fees['total'] = array_sum($this->fees);
		$this->total['total'] = $this->tax['total'] + $this->interest['total'] + $this->penalty['total'] + $this->fees['total'] + $this->other['total'];
		$this->amount = $this->total['total'];
	}
	public function updatedFeesIntegratedTax()
	{
		$this->total['integrated_tax'] = 0 ;
		$this->fees['total'] = 0 ;
		$this->total['integrated_tax'] = (int)$this->tax['integrated_tax'] + (int)$this->interest['integrated_tax'] + (int)$this->penalty['integrated_tax'] + (int)$this->fees['integrated_tax'] + (int)$this->other['integrated_tax'];
		$this->fees['total'] = array_sum($this->fees);
		$this->total['total'] = $this->tax['total'] + $this->interest['total'] + $this->penalty['total'] + $this->fees['total'] + $this->other['total'];
		$this->amount = $this->total['total'];
	}
	public function updatedFeesStateUtTax()
	{
		$this->total['state_ut_tax'] = 0 ;
		$this->fees['total'] = 0 ;
		$this->total['state_ut_tax'] = (int)$this->tax['state_ut_tax'] + (int)$this->interest['state_ut_tax'] + (int)$this->penalty['state_ut_tax'] + (int)$this->fees['state_ut_tax'] + (int)$this->other['state_ut_tax'];
		$this->fees['total'] = array_sum($this->fees);
		$this->total['total'] = $this->tax['total'] + $this->interest['total'] + $this->penalty['total'] + $this->fees['total'] + $this->other['total'];
		$this->amount = $this->total['total'];
	}

	public function updatedOtherCentralTax()
	{
		$this->total['central_tax'] = 0 ;
		$this->other['total'] = 0 ;
		$this->total['central_tax'] = (int)$this->tax['central_tax'] + (int)$this->interest['central_tax'] + (int)$this->penalty['central_tax'] + (int)$this->fees['central_tax'] + (int)$this->other['central_tax'];
		$this->other['total'] = array_sum($this->other);
		$this->total['total'] = $this->tax['total'] + $this->interest['total'] + $this->penalty['total'] + $this->fees['total'] + $this->other['total'];
		$this->amount = $this->total['total'];
	}
	public function updatedOtherIntegratedTax()
	{
		$this->total['integrated_tax'] = 0 ;
		$this->other['total'] = 0 ;
		$this->total['integrated_tax'] = (int)$this->tax['integrated_tax'] + (int)$this->interest['integrated_tax'] + (int)$this->penalty['integrated_tax'] + (int)$this->fees['integrated_tax'] + (int)$this->other['integrated_tax'];
		$this->other['total'] = array_sum($this->other);
		$this->total['total'] = $this->tax['total'] + $this->interest['total'] + $this->penalty['total'] + $this->fees['total'] + $this->other['total'];
		$this->amount = $this->total['total'];
	}
	public function updatedOtherStateUtTax()
	{
		$this->total['state_ut_tax'] = 0 ;
		$this->other['total'] = 0 ;
		$this->total['state_ut_tax'] = (int)$this->tax['state_ut_tax'] + (int)$this->interest['state_ut_tax'] + (int)$this->penalty['state_ut_tax'] + (int)$this->fees['state_ut_tax'] + (int)$this->other['state_ut_tax'];
		$this->other['total'] = array_sum($this->other);
		$this->total['total'] = $this->tax['total'] + $this->interest['total'] + $this->penalty['total'] + $this->fees['total'] + $this->other['total'];
		$this->amount = $this->total['total'];
	}

	public function submit()
	{
		$this->validate([
			'account_id' => 'required'
		]);
		
		GstEntry::create([
			'account_id' => $this->account_id,
			'date' => $this->date,
			'utilization_type' => $this->utilization_type,
			'vou_no' => $this->vou_no,
			'period' => $this->period,
			'chq_dd_date' => $this->chq_dd_date,
			'chq_dd_no' => $this->chq_dd_no,
			'challan_date' => $this->challan_date,
			'challan_no' => $this->challan_no,
			'tax' => json_encode($this->tax),
			'interest' => json_encode($this->interest),
			'penalty' => json_encode($this->penalty),
			'fees' => json_encode($this->fees),
			'other' => json_encode($this->other),
			'total' => json_encode($this->total),
			'amount' => $this->amount,
			'narration' => $this->narration,
			'gst_entry_type' => Enum::GST_BANK_PAYMENT,
			'company_id' => auth()->user()->company ? auth()->user()->company->id : null
		]);

        toast('Bank payment created successfully!', 'success');

        return redirect()->route('erp.gst.gst-entry.bank-payment.index');
	}

    public function render()
    {
    	return <<<'blade'
            <div>
        		<form wire:submit.prevent="submit">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Bank/Cash<i class="text-danger">*</i></label>
                            <select class="form-control form-control-sm form-select" required wire:model="account_id">
                                <option value=>Select account</option>
                                @foreach ($accounts as $account)
                                    <option value="{{ $account->id }}"
                                        {{ old('account_id') == $account->id ? 'selected' : '' }}>{{ $account->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('account_id')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Date <i class="text-danger">*</i></label>
                            <input type="date" class="form-control form-control-sm" required wire:model="date">
                            @error('date')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Utilization Type</label>
                            <input type="text" class="form-control form-control-sm" wire:model="utilization_type" disabled>
                            @error('utilization_type')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Vou No</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter vou no" wire:model="vou_no" disabled>
                            @error('vou_no')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Period</label>
                            <select class="form-control form-control-sm" wire:model="period">
                            	<option value='Not Applied'> Not Applied</option>
                                @foreach($periods as $period)
                                    <option value="{{$period}}">{{$period}}</option>
                                @endforeach
                            </select>
                            @error('period')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Chq DD Date</label>
                            <input type="date" class="form-control form-control-sm" wire:model="chq_dd_date">
                            @error('chq_dd_date')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Chq DD No</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter chq dd no" wire:model="chq_dd_no">
                            @error('chq_dd_no')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Challan Date</label>
                            <input type="date" class="form-control form-control-sm" wire:model="challan_date">
                            @error('challan_date')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Challan No</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter challan no" wire:model="challan_no">
                            @error('challan_no')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Narration</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter narration" wire:model="narration">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Bank Amount</label>
                            <input type="number" class="form-control form-control-sm" wire:model="amount" disabled>
                        </div>
                    </div>
                    <div>
                    <h3 class="pt-5">Payment Detail</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered border text-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Tax</th>
                                    <th>Interest</th>
                                    <th>Penalty</th>
                                    <th>Fees</th>
                                    <th>Other</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                	<td>Central Tax</td>
                                    <td><input type="number" class="form-control form-control-sm" wire:model="tax.central_tax"></td>
                                    <td><input type="number" class="form-control form-control-sm" wire:model="interest.central_tax"></td>
                                    <td><input type="number" class="form-control form-control-sm" wire:model="penalty.central_tax"></td>
                                    <td><input type="number" class="form-control form-control-sm" wire:model="fees.central_tax"></td>
                                    <td><input type="number" class="form-control form-control-sm" wire:model="other.central_tax"></td>
                                    <td><input type="number" class="form-control form-control-sm" wire:model="total.central_tax" disabled></td>
                                </tr>
                                <tr>
                                	<td>Integrated Tax</td>
                                    <td><input type="number" class="form-control form-control-sm" wire:model="tax.integrated_tax"></td>
                                    <td><input type="number" class="form-control form-control-sm" wire:model="interest.integrated_tax"></td>
                                    <td><input type="number" class="form-control form-control-sm" wire:model="penalty.integrated_tax"></td>
                                    <td><input type="number" class="form-control form-control-sm" wire:model="fees.integrated_tax"></td>
                                    <td><input type="number" class="form-control form-control-sm" wire:model="other.integrated_tax"></td>
                                    <td><input type="number" class="form-control form-control-sm" wire:model="total.integrated_tax" disabled></td>
                                </tr>
                                <tr>
                                	<td>State/UT Tax</td>
                                    <td><input type="number" class="form-control form-control-sm" wire:model="tax.state_ut_tax"></td>
                                    <td><input type="number" class="form-control form-control-sm" wire:model="interest.state_ut_tax"></td>
                                    <td><input type="number" class="form-control form-control-sm" wire:model="penalty.state_ut_tax"></td>
                                    <td><input type="number" class="form-control form-control-sm" wire:model="fees.state_ut_tax"></td>
                                    <td><input type="number" class="form-control form-control-sm" wire:model="other.state_ut_tax"></td>
                                    <td><input type="number" class="form-control form-control-sm" wire:model="total.state_ut_tax" disabled></td>
                                </tr>
                                <tr>
                                	<td>Total</td>
                                    <td><input type="number" class="form-control form-control-sm" wire:model="tax.total" disabled></td>
                                    <td><input type="number" class="form-control form-control-sm" wire:model="interest.total" disabled></td>
                                    <td><input type="number" class="form-control form-control-sm" wire:model="penalty.total" disabled></td>
                                    <td><input type="number" class="form-control form-control-sm" wire:model="fees.total" disabled></td>
                                    <td><input type="number" class="form-control form-control-sm" wire:model="other.total" disabled></td>
                                    <td><input type="number" class="form-control form-control-sm" wire:model="total.total" disabled></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                        <input type="submit" value="save" id="formSubmitBtn" class="d-none">
                    </div>
                </form>
            </div>
        blade;
    }
}
