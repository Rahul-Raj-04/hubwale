<?php

namespace App\Http\Controllers\Livewire\Erp\Consultant\ProvisionalInvoice;

use Livewire\Component;
use App\Enum\Enum;
use App\Models\ProvisionalInvoice;
use App\Models\Service;
use App\Models\Account;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Validator;
use App\Http\Traits\LedgerAccountBalanceTrait;
use App\Models\LedgerAccountBalance;

class AddProvisionalInvoice extends Component
{
    use LivewireAlert, LedgerAccountBalanceTrait;

	public $accounts = [];
	public $invoiceTypes = [];
	public $particulars = [];
    public $invoice_entries = [];
    public $add_invoice_entry = [];
    public $bill_amount;
    public $balance;

	public $account_id;
	public $invoice_type;
	public $bill_no;
	public $bill_date;
	public $narration;

    public function mount()
    {
        $this->particulars = Service::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
        $this->accounts = Account::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
        $this->invoiceTypes = Enum::PROVISIONAL_INVOICE_TYPES;
        $this->bill_date = date('Y-m-d');

        $this->add_invoice_entry = [
            'particular' => null,
            'amount' => null
        ];
    }

    public function updatedAccountId()
    {
        if ($this->account_id) {
            $ladgerAccount = LedgerAccountBalance::where('account_id', $this->account_id)->first();
            if ($ladgerAccount) {
                $this->balance = $ladgerAccount->balance;
            }
        }
        $this->dispatchBrowserEvent('invoice-table');
    }

    public function addEntry()
    {
        $validator = Validator::make($this->all(),
            [
                'add_invoice_entry.particular' => 'required',
                'add_invoice_entry.amount' => 'required',
            ],
            [
                'add_invoice_entry.particular.required' => 'Select particular',
                'add_invoice_entry.amount.required' => 'Enter amount',
            ]
        );

        if ($validator->fails()) {
            $this->alert('error', $validator->errors()->first(), [
                'position' => 'center',
                'toast' => true
            ]);
        } else {
            $this->invoice_entries[] = [
                'particular' => $this->add_invoice_entry['particular'],
                'amount' => $this->add_invoice_entry['amount']
            ];
            $this->bill_amount = $this->bill_amount + $this->add_invoice_entry['amount'];
            $this->reset('add_invoice_entry');
        }
        $this->dispatchBrowserEvent('invoice-table');
    }

    public function deleteEntry($key)
    {
        $this->bill_amount = $this->bill_amount - $this->invoice_entries[$key]['amount'];
        unset($this->invoice_entries[$key]);
        $this->dispatchBrowserEvent('invoice-table');
    }

    public function submit()
    {
        $this->validate([
            'account_id' => 'required',
            'invoice_type' => 'required'
        ]);

        if (count($this->invoice_entries) == 0) {
            $this->alert('error', 'No account entry entered', [
                'position' => 'top-right',
                'toast' => true,
            ]);
            $this->dispatchBrowserEvent('invoice-table');
        } else {
            foreach ($this->invoice_entries as $key => $invoice_entry) {
                ProvisionalInvoice::create([
                    'account_id' => $this->account_id,
                    'invoice_type' => $this->invoice_type,
                    'bill_no' => $this->bill_no,
                    'bill_date' => $this->bill_date,
                    'narration' => $this->narration,
                    'particulars' => $invoice_entry['particular'],
                    'amount' => $invoice_entry['amount'],
                    'company_id' => auth()->user()->company ? auth()->user()->company->id : null
                ]);

                // create ledger 
                $data = [
                    'account_id' => $this->account_id,
                    'balance' => $invoice_entry['amount'],
                ];
                $this->LedgerAccountBalanceCreateOrUpdate($data);
            }
            toast('Provisional invoice created successfully!', 'success');
            return redirect()->route('erp.consultant.provisional-invoice.index');
        }
    }


    public function render()
    {
        return <<<'blade'
        <div>
            <form wire:submit.prevent="submit">
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Party A/c.</label>
                        <select class="form-control form-control-sm form-select" wire:model="account_id" required>
                            <option value="">Select Party A/c</option>
                            @foreach ($accounts as $account)
                                <option value="{{ $account->id }}">{{ $account->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('account_id')
                            <span class="text-danger small wow flash">{{ $message }}</span>
                        @enderror
                        <label class="form-label">Prov.Out. : {{$balance}}</label>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Invoice Type<i class="text-danger">*</i></label>
                        <select class="form-control form-control-sm form-select" wire:model.defer="invoice_type" required>
                            <option value="">Select Invoice Type</option>
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
                        <label class="form-label"> Bill No <i class="text-danger">*</i></label>
                        <input type="text" class="form-control form-control-sm wire:model.defer="bill_no" placeholder="Enter Bill No">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label"> Bill Date <i class="text-danger">*</i></label>
                        <input type="date" class="form-control form-control-sm" wire:model.defer="bill_date">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Narration</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Enter narration" wire:model.defer="narration">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Bill Amount</label>
                        <input type="text" class="form-control form-control-sm" wire:model.defer="bill_amount" disabled>
                    </div>
                </div>
                <div>
                    <input type="submit" value="save" id="formSubmitBtn" class="d-none">
                </div>
            </form>

            <div class="pt-5">
                <table class="table table-bordered text-nowrap border-bottom invoice-table">
                    <thead>
                        <tr>
                            <th class="bg-primary text-white">Particulars</th>
                            <th class="bg-primary text-white">Amount</th>
                            <th class="bg-primary text-white">Action</th>
                        </tr>
                   </thead>
                   <tbody>
                        <form>
                            <tr>
                                <td>
                                    <select class="form-control form-control-sm form-select" wire:model.defer={{"add_invoice_entry.particular"}}>
                                        <option value=""> Select Particular </option>
                                        @foreach ($particulars as $particular)
                                            <option value="{{ $particular->id }}">
                                                {{ $particular->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" class="form-control form-control-sm" wire:model.defer={{"add_invoice_entry.amount"}}>
                                </td>
                                <td>
                                    <input type="button" class="btn btn-primary btn-sm" value="Add" wire:click=addEntry>
                                </td>
                            </tr>
                        </form>
                        @foreach ($invoice_entries as $key => $invoice_entry)
                            <tr>
                                <td>
                                    @foreach ($particulars as $key => $particular)
                                        {{$particular->id == $invoice_entry['particular'] ? $particular->name : ''}}
                                    @endforeach
                                </td>
                                <td>
                                    {{$invoice_entry['amount']}}
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
