<?php

namespace App\Http\Controllers\Livewire\Erp\Transaction\CnDnEntry\DnEntryWithStock;

use Livewire\Component;
use App\Models\CNDNEntry;
use App\Models\Account;
use App\Models\Service;
use App\Models\CurrencyMaster;
use App\Enum\Enum;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Validator;
use App\Http\Traits\LedgerAccountBalanceTrait;

class Edit extends Component
{
	use LivewireAlert, LedgerAccountBalanceTrait;

    public $balance_type;
    public $party_account_id;
    public $stock_effect;
    public $invoice_type;
    public $effect;
    public $tax_bill_of_supply;
    public $reason;
    public $vou_date;
    public $voucher_no;
    public $doc_no;
    public $doc_date;
    public $original_bill_no;
    public $original_bill_date;
    public $service_id;
    public $qty;
    public $currency_master_id;
    public $rate;
    public $amount;
    public $narration;

    public $account_balance;

    public $services = [];
    public $currencies = [];
    public $selectOptions = [];
    public $partyAccounts = [];
    public $gstCommodities = [];
    public $account_entries = [];

    public $dnEntryWithStocks = [];

    public function mount($dnEntryWithStock)
    {
        $this->dnEntryWithStocks = CNDNEntry::where('group_id', $dnEntryWithStock->group_id)->get();
        foreach ($this->dnEntryWithStocks as $key => $dnEntryWithStock) {
            $this->account_entries[] = [
                'id' => $dnEntryWithStock->id,
                'service_id' => $dnEntryWithStock->service_id,
                'qty' => $dnEntryWithStock->qty,
                'currency_master_id' => $dnEntryWithStock->currency_master_id,
                'rate' => $dnEntryWithStock->rate,
                'amount' => $dnEntryWithStock->amount
            ];
        }

        $this->balance_type = $dnEntryWithStock->balance_type;
        $this->party_account_id = $dnEntryWithStock->party_account_id;
        $this->stock_effect = $dnEntryWithStock->stock_effect;
        $this->invoice_type = $dnEntryWithStock->invoice_type;
        $this->effect = $dnEntryWithStock->effect;
        $this->tax_bill_of_supply = $dnEntryWithStock->tax_bill_of_supply;
        $this->reason = $dnEntryWithStock->reason;
        $this->vou_date = $dnEntryWithStock->vou_date;
        $this->voucher_no = $dnEntryWithStock->voucher_no;
        $this->doc_no = $dnEntryWithStock->doc_no;
        $this->doc_date = $dnEntryWithStock->doc_date;
        $this->original_bill_no = $dnEntryWithStock->original_bill_no;
        $this->original_bill_date = $dnEntryWithStock->original_bill_date;
        $this->narration = $dnEntryWithStock->narration;

        $this->services = Service::where('company_id', auth()->user()->company->id)->get();
        $this->currencies = CurrencyMaster::where('company_id', auth()->user()->company->id)->get();
        $this->selectOptions = Enum::CN_DN_ENTRY_SELECT_OPTION;
        $this->partyAccounts = Account::where('company_id', auth()->user()->company->id)->whereHas('account_group', function($ag) {
            $ag->where('name', 'Sundry Debtors');
        })->get();
    }

    public function updatedPartyAccountId()
    {
        if ($this->party_account_id) {
            $account = Account::find($this->party_account_id);
            $this->account_balance = $account->opening_balance;
        }
        $this->dispatchBrowserEvent('entry_table');
    }

    public function updatedQty()
    {
        if ($this->rate) {
            $this->amount = (int)$this->qty * (int)$this->rate;
        }
        $this->dispatchBrowserEvent('entry_table');
    }

    public function updatedRate()
    {
        $this->amount = (int)$this->qty * (int)$this->rate;
        $this->dispatchBrowserEvent('entry_table');
    }

    public function addEntry()
    {
        $validator = Validator::make($this->all(), 
            [
                'service_id' => 'required',
                'qty' => 'required',
                'currency_master_id' => 'required',
                'rate' => 'required',
            ],
            [
                'service_id.required' => 'Select Product',
                'qty.required' => 'Enter Qty',
                'currency_master_id.required' => 'Select Currency',
                'rate.required' => 'Enter Rate'
            ]);
        if ($validator->fails()) {
            $this->alert('error', $validator->errors()->first(), [
                'position' => 'center',
                'toast' => true
            ]);
        } else {
            $this->account_entries[] = [
                'id' => null,
                'service_id' => $this->service_id,
                'qty' => $this->qty,
                'currency_master_id' => $this->currency_master_id,
                'rate' => $this->rate,
                'amount' => $this->amount
            ];
            $this->reset('service_id');
            $this->reset('qty');
            $this->reset('currency_master_id');
            $this->reset('rate');
            $this->reset('amount');
        }
        $this->dispatchBrowserEvent('entry_table');
    }

    public function deleteEntry($key)
    {
        if($this->account_entries[$key]['id']) {
            $dnEntryWithStock = CNDNEntry::find($this->account_entries[$key]['id']);
            $dnEntryWithStock->delete();
        }
        unset($this->account_entries[$key]);
        $this->dispatchBrowserEvent('entry_table');
    }

    public function submit()
    {
        $this->validate([
            'party_account_id' => 'required',
        ]);

        if (count($this->account_entries) == 0) {
            $this->alert('error', 'No account entry entered', [
                'position' => 'top-right',
                'toast' => true,
            ]);
        } else {

            foreach ($this->account_entries as $key => $account_entry) {
                if (!$account_entry['id']) {
                    CNDNEntry::create([
                        'balance_type' => $this->balance_type,
                        'party_account_id' => $this->party_account_id,
                        'stock_effect' => $this->stock_effect,
                        'invoice_type' => $this->invoice_type,
                        'effect' => $this->effect,
                        'tax_bill_of_supply' => $this->tax_bill_of_supply,
                        'reason' => $this->reason,
                        'vou_date' => $this->vou_date,
                        'voucher_no' => $this->voucher_no,
                        'doc_no' => $this->doc_no,
                        'doc_date' => $this->doc_date,
                        'original_bill_no' => $this->original_bill_no,
                        'original_bill_date' => $this->original_bill_date,
                        'service_id' => $account_entry['service_id'],
                        'qty' => $account_entry['qty'],
                        'currency_master_id' => $account_entry['currency_master_id'],
                        'rate' => $account_entry['rate'],
                        'amount' => $account_entry['amount'],
                        'narration' => $this->narration,
                        'company_id' => auth()->user()->company->id,
                        'model_name' => Enum::DN_ENTRY_WITH_STOCK,
                        'group_id' => $this->dnEntryWithStocks[0]->group_id
                    ]);

                    // create ledger 
                    $data = [
                        'account_id' => $this->party_account_id,
                        'balance' => $account_entry['amount']
                    ];
                    $this->LedgerAccountBalanceCreateOrUpdate($data);
                } else {

                    $dnEntryWithStock = CNDNEntry::find($account_entry['id']);

                    $dnEntryWithStock->balance_type = $this->balance_type;
                    $dnEntryWithStock->party_account_id = $this->party_account_id;
                    $dnEntryWithStock->stock_effect = $this->stock_effect;
                    $dnEntryWithStock->invoice_type = $this->invoice_type;
                    $dnEntryWithStock->effect = $this->effect;
                    $dnEntryWithStock->tax_bill_of_supply = $this->tax_bill_of_supply;
                    $dnEntryWithStock->reason = $this->reason;
                    $dnEntryWithStock->vou_date = $this->vou_date;
                    $dnEntryWithStock->voucher_no = $this->voucher_no;
                    $dnEntryWithStock->doc_no = $this->doc_no;
                    $dnEntryWithStock->doc_date = $this->doc_date;
                    $dnEntryWithStock->original_bill_no = $this->original_bill_no;
                    $dnEntryWithStock->original_bill_date = $this->original_bill_date;
                    $dnEntryWithStock->narration = $this->narration;
                    $dnEntryWithStock->save();
                }
            }
            toast('DN entry with stock created successfully!', 'success');
            return redirect()->route('erp.account-transaction.cn-dn-entry.dn-entry-with-stock.index');
        }
        $this->dispatchBrowserEvent('entry_table'); 
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <form wire:submit.prevent="submit">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Cash/Debit</label>
                            <select class="form-control form-control-sm form-select" wire:model.defer="balance_type">
                                @foreach ($selectOptions['balance_type'] as $balance_type)
                                    <option value="{{ $balance_type['key'] }}">
                                        {{ $balance_type['val'] }}
                                    </option>
                                @endforeach
                            </select>
                            @error('balance_type')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Party A/C <i class="text-danger">*</i></label>
                            <select class="form-control form-control-sm form-select" wire:model="party_account_id">
                                <option value="">Select Account</option>
                                @foreach ($partyAccounts as $account)
                                    <option value="{{ $account->id }}">
                                        {{ $account->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('party_account_id')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Account Balance</label>
                            <input type="text" class="form-control form-control-sm" disabled wire:model.defer="account_balance">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Stock Effect</label>
                            <select class="form-control form-control-sm form-select" wire:model="stock_effect">
                                @foreach ($selectOptions['stock_effect'] as $stock_effect)
                                    <option value="{{ $stock_effect['key'] }}">
                                        {{ $stock_effect['val'] }}
                                    </option>
                                @endforeach
                            </select>
                            @error('stock_effect')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Invoice Type</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter Invoice Type" disabled wire:model.defer="invoice_type">
                            @error('invoice_type')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Effect</label>
                            <select class="form-control form-control-sm form-select" wire:model.defer="effect">
                                @foreach ($selectOptions['effect'] as $effect)
                                    <option value="{{ $effect['val'] }}">
                                        {{ $effect['val'] }}
                                    </option>
                                @endforeach
                            </select>
                            @error('effect')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Tax/Bill of Suppl</label>
                            <select class="form-control form-control-sm form-select" wire:model.defer="tax_bill_of_supply">
                                @foreach ($selectOptions['tax_bill_of_supply'] as $tax_bill)
                                    <option value="{{ $tax_bill['val'] }}">
                                        {{ $tax_bill['val'] }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tax_bill_of_supply')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Reason</label>
                            <select class="form-control form-control-sm form-select" wire:model.defer="reason">
                                <option value="">Select reason</option>
                                @foreach ($selectOptions['reason'] as $reason)
                                    <option value="{{ $reason['val'] }}">
                                        {{ $reason['val'] }}
                                    </option>
                                @endforeach
                            </select>
                            @error('reason')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Vou Date</label>
                            <input type="date" class="form-control form-control-sm" wire:model.defer="vou_date">
                            @error('vou_date')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Voucher No</i></label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter Voucher No" wire:model.defer="voucher_no">
                            @error('voucher_no')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="col-md-6 mb-4">
                            <label class="form-label">Doc No</label>
                            <input type="number" class="form-control form-control-sm" disabled wire:model.defer="doc_no">
                            @error('doc_no')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Doc Date</label>
                            <input type="date" class="form-control form-control-sm" disabled wire:model.defer="doc_date">
                            @error('doc_date')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="form-label">Original Bill No</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter Original Bill No" wire:model.defer="original_bill_no">
                            @error('original_bill_no')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Original Bill Date</label>
                            <input type="date" class="form-control form-control-sm" wire:model.defer="original_bill_date">
                            @error('original_bill_date')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="form-label">Narration</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter Narration" wire:model.defer="narration">
                            @error('narration')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <input type="submit" id="FormSubmit" class="d-none">
            </form>

                <div class="pt-5">
                    <table class="table table-bordered text-nowrap border-bottom entry_table">
                        <thead>
                             <tr>
                                <th class="bg-primary text-white">Product Name</th>
                                <th class="bg-primary text-white">Qty</th>
                                <th class="bg-primary text-white">Currency</th>
                                <th class="bg-primary text-white">Rate</th>
                                <th class="bg-primary text-white">Amount</th>
                                <th class="bg-primary text-white">Action</th>
                             </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select class="form-control form-control-sm form-select" wire:model.defer="service_id">
                                        <option value="">Select Product Name</option>    
                                        @foreach ($services as $cervice)
                                            <option value="{{ $cervice->id }}">
                                                {{ $cervice->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" class="form-control form-control-sm" wire:model="qty">
                                </td>
                                <td>
                                    <select class="form-control form-control-sm form-select" wire:model.defer="currency_master_id">
                                        <option value="">Select Currency</option>
                                        @foreach ($currencies as $key => $currency)
                                            <option value="{{ $currency->id }}">
                                                {{ $currency->symbol }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" class="form-control form-control-sm" wire:model="rate">
                                </td>
                                <td>
                                    <input type="number" class="form-control form-control-sm" wire:model.defer="amount">
                                </td>
                                <td>
                                    <input type="button" class="btn btn-primary btn-sm" value="Add" wire:click.defer=addEntry>
                                </td>
                            </tr>
                            @foreach ($account_entries as $key => $account_entry)
                                 <tr>
                                     <td>
                                        @foreach ($services as $service)
                                            {{$service->id == $account_entry['service_id'] ? $service->name : ''}}
                                        @endforeach
                                     </td>
                                     <td>
                                        {{$account_entry['qty']}}
                                     </td>
                                     <td>
                                        @foreach ($currencies as $currency)
                                            {{$currency->id == $account_entry['currency_master_id'] ? $currency->symbol : ''}}
                                        @endforeach
                                     </td>
                                     <td>
                                        {{$account_entry['rate']}}
                                     </td>
                                     <td>
                                        {{$account_entry['amount']}}
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
