<?php

namespace App\Http\Controllers\Livewire\Erp\Consultant\DirectInvoice;

use Livewire\Component;

class Edit extends Component
{
	public $particulars = [];
	public $accounts = [];
	public $invoiceTypes = [];
	public $taxRetails = [];
	public $particular_entries = [];
	public $currencies = [];
	public $bill_amount;
	public $balance;

	public function mount($id)
	{
		
	}

	public function addEntry()
	{
    	$this->dispatchBrowserEvent('entry_table');
	}

	public function deleteEntry($key)
	{
    	$this->dispatchBrowserEvent('entry_table');
	}
	
    public function render()
    {
        
        return <<<'blade'
        <div>
            <form wire:submit.prevent="submit">
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Cash/Debit</label>
                        <select  class="form-control form-control-sm form-select" wire:model.defer="c_d" required>
                                <option value="cash">Cash</option>
                                <option value="debit">Debit</option>
                        </select>
                        @error('c_d')
                            <span class="text-danger small wow flash">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Party A/c. <i class="text-danger">*</i></label>
                        <select class="form-control form-control-sm form-select" wire:model="account_id" required>
                            <option value=>Select Party A/c</option>
                            @foreach ($accounts as $account)
                                <option value="{{ $account->id }}">{{ $account->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('account_id')
                            <span class="text-danger small wow flash">{{ $message }}</span>
                        @enderror
                        <label class="form-label">Bal. : {{$balance}}</label>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Invoice Type<i class="text-danger">*</i></label>
                        <select class="form-control form-control-sm form-select" wire:model.defer="invoice_type" required>
                            <option value=>Select Invoice Type</option>
                            @foreach ($invoiceTypes as $key => $val)
                                <option value="{{ $key }}">{{ $val }}
                                </option>
                            @endforeach
                        </select>
                        @error('invoice_type')
                            <span class="text-danger small wow flash">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tax/Retail</label>
                        <select class="form-control form-control-sm form-select" wire:model.defer="tax_retail" required>
                            @foreach ($taxRetails as $key => $val)
                                <option value="{{ $key }}">{{ $val }}
                                </option>
                            @endforeach
                        </select>
                        @error('tax_retail')
                            <span class="text-danger small wow flash">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label"> Bill No</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Enter Bill No" wire:model.defer="bill_no">
                        @error('bill_no')
                            <span class="text-danger small wow flash">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label"> Bill Date</label>
                        <input type="date" class="form-control form-control-sm" required wire:model.defer="bill_date">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label"> Doc No </label>
                        <input type="text" class="form-control form-control-sm" placeholder="Enter Doc No" wire:model.defer="doc_no" disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label"> Doc Date</label>
                        <input type="date" class="form-control form-control-sm" wire:model.defer="doc_date" disabled>
                        @error('doc_date')
                            <span class="text-danger small wow flash">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label"> Narration </label>
                        <input type="text" class="form-control form-control-sm" placeholder="Enter Narration" wire:model.defer="narration">
                        @error('narration')
                            <span class="text-danger small wow flash">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label"> Bill Amount <i class="text-danger">*</i></label>
                        <input type="text" class="form-control form-control-sm" wire:model.defer="bill_amount" required disabled>
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
                            <th class="bg-primary text-white">Particulars</th>
                            <th class="bg-primary text-white">Currency</th>
                            <th class="bg-primary text-white">Amount</th>
                            <th class="bg-primary text-white">Action</th>
                        </tr>
                   </thead>
                   <tbody>
                        <form>
                            <tr>
                                <td>
                                    <select class="form-control form-control-sm form-select" wire:model.defer="service_id">
                                        <option value=""> Select Particular </option>
                                        @foreach ($particulars as $particular)
                                            <option value="{{ $particular->id }}">
                                                {{ $particular->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control form-control-sm form-select" wire:model.defer="currency">
                                        <option value=""> Select currency </option>
                                        @foreach ($currencies as $currency)
                                            <option value="{{ $currency->id }}">
                                                {{ $currency->symbol }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" class="form-control form-control-sm" placeholder="Enter Amount" wire:model.defer="amount" required>
                                </td>
                                <td>
                                    <input type="button" class="btn btn-primary btn-sm" value="Add" wire:click="addEntry">
                                </td>
                            </tr>
                        </form>
                        @foreach ($particular_entries as $key => $particular_entry)
                            <tr>
                                <td>
                                    @foreach ($particulars as $particular)
                                        {{ $particular->id == $particular_entry['service_id'] ? $particular->name : '' }}
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($currencies as $currency)
                                        {{ $currency->id == $particular_entry['currency'] ? $currency->symbol : '' }}
                                    @endforeach
                                </td>
                                <td>
                                    {{$particular_entry['amount']}}
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" wire:click=deleteEntry({{$key}})>
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
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
