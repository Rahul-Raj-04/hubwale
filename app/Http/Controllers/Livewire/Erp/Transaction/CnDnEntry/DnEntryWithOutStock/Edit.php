<?php

namespace App\Http\Controllers\Livewire\Erp\Transaction\CnDnEntry\DnEntryWithOutStock;

use Livewire\Component;
use App\Models\CNDNEntry;
use App\Models\Account;
use App\Models\GstCommodity;
use App\Enum\Enum;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Validator;
use App\Http\Traits\LedgerAccountBalanceTrait;

class Edit extends Component
{
	use LivewireAlert, LedgerAccountBalanceTrait;

    public $balance_type;
    public $party_account_id;
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
    public $sales_purchase_ac_id;
    public $gst_commodity_id;
    public $assess_amt;
    public $narration;

    public $account_balance;

    public $selectOptions = [];
    public $gstCommodities = [];
    public $partyAccounts = [];
    public $saleAccounts = [];
    public $account_entries = [];

    public $dnEntryWithOutStocks = [];

    public function mount($dnEntryWithOutStock)
    {   $this->dnEntryWithOutStocks = CNDNEntry::where('group_id', $dnEntryWithOutStock->group_id)->get();

        foreach ($this->dnEntryWithOutStocks as $key => $dnEntryWithOutStock) {
            $this->account_entries[] = [
                'id' => $dnEntryWithOutStock->id,
                'sales_purchase_ac_id' => $dnEntryWithOutStock->sales_purchase_ac_id,
                'gst_commodity_id' => $dnEntryWithOutStock->gst_commodity_id,
                'assess_amt' => $dnEntryWithOutStock->assess_amt,
            ];
        }
        $this->balance_type = $dnEntryWithOutStock->balance_type;
        $this->party_account_id = $dnEntryWithOutStock->party_account_id;
        $this->invoice_type = $dnEntryWithOutStock->invoice_type;
        $this->effect = $dnEntryWithOutStock->effect;
        $this->tax_bill_of_supply = $dnEntryWithOutStock->tax_bill_of_supply;
        $this->reason = $dnEntryWithOutStock->reason;
        $this->vou_date = $dnEntryWithOutStock->vou_date;
        $this->voucher_no = $dnEntryWithOutStock->voucher_no;
        $this->doc_no = $dnEntryWithOutStock->doc_no;
        $this->doc_date = $dnEntryWithOutStock->doc_date;
        $this->original_bill_no = $dnEntryWithOutStock->original_bill_no;
        $this->original_bill_date = $dnEntryWithOutStock->original_bill_date;
        $this->narration = $dnEntryWithOutStock->narration;

        $this->selectOptions = Enum::CN_DN_ENTRY_SELECT_OPTION;
        $this->partyAccounts = Account::where('company_id', auth()->user()->company->id)->whereHas('account_group', function($ag) {
            $ag->where('name', 'Sundry Debtors');
        })->get();
        $this->saleAccounts = Account::where('company_id', auth()->user()->company->id)->get();
        $this->gstCommodities = GstCommodity::where('company_id', auth()->user()->company->id)->get();
    }

    public function updatedPartyAccountId()
    {
        if ($this->party_account_id) {
            $account = Account::find($this->party_account_id);
            $this->account_balance = $account->opening_balance;
        }
        $this->dispatchBrowserEvent('entry_table');
    }

    public function addEntry()
    {
        $validator = Validator::make($this->all(),
            [
                'sales_purchase_ac_id' => 'required',
                'gst_commodity_id' => 'required',
                'assess_amt' => 'required',
            ],
            [
                'sales_purchase_ac_id.required' => 'Select Account',
                'gst_commodity_id.required' => 'Select Gst Commodity',
                'assess_amt.required' => 'Enter Assess Amt'
            ]);
        if ($validator->fails()) {
            $this->alert('error', $validator->errors()->first(), [
                'position' => 'center',
                'toast' => true
            ]);
        } else {
            $this->account_entries[] = [
                'id' => null,
                'sales_purchase_ac_id' => $this->sales_purchase_ac_id,
                'gst_commodity_id' => $this->gst_commodity_id,
                'assess_amt' => $this->assess_amt,
            ];
            $this->reset('sales_purchase_ac_id');
            $this->reset('gst_commodity_id');
            $this->reset('assess_amt');
        }
        $this->dispatchBrowserEvent('entry_table');
    }

    public function deleteEntry($key)
    {
        if($this->account_entries[$key]['id']) {
            $dnEntryWithOutStock = CNDNEntry::find($this->account_entries[$key]['id']);
            $dnEntryWithOutStock->delete();
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
                        'sales_purchase_ac_id' => $account_entry['sales_purchase_ac_id'],
                        'gst_commodity_id' => $account_entry['gst_commodity_id'],
                        'assess_amt' => $account_entry['assess_amt'],
                        'narration' => $this->narration,
                        'company_id' => auth()->user()->company ? auth()->user()->company->id : null,
                        'model_name' => Enum::DN_ENTRY_W_O_STOCK,
                        'group_id' => $this->dnEntryWithOutStocks[0]->group_id
                    ]);

                    // create ledger 
                    $data = [
                        'account_id' => $this->party_account_id,
                        'balance' => $account_entry['assess_amt']
                    ];
                    $this->LedgerAccountBalanceCreateOrUpdate($data);
                } else {
                    $dnEntryWithOutStock = CnDnEntry::find($account_entry['id']);
                    $dnEntryWithOutStock->balance_type = $this->balance_type;
                    $dnEntryWithOutStock->party_account_id = $this->party_account_id;
                    $dnEntryWithOutStock->invoice_type = $this->invoice_type;
                    $dnEntryWithOutStock->effect = $this->effect;
                    $dnEntryWithOutStock->tax_bill_of_supply = $this->tax_bill_of_supply;
                    $dnEntryWithOutStock->reason = $this->reason;
                    $dnEntryWithOutStock->vou_date = $this->vou_date;
                    $dnEntryWithOutStock->voucher_no = $this->voucher_no;
                    $dnEntryWithOutStock->doc_no = $this->doc_no;
                    $dnEntryWithOutStock->doc_date = $this->doc_date;
                    $dnEntryWithOutStock->original_bill_no = $this->original_bill_no;
                    $dnEntryWithOutStock->original_bill_date = $this->original_bill_date;
                    $dnEntryWithOutStock->narration = $this->narration;
                    $dnEntryWithOutStock->save();
                }
            }
            toast('DN entry w/o stock updated successfully!', 'success');
            return redirect()->route('erp.account-transaction.cn-dn-entry.dn-entry-with-out-stock.index');
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
                                <th class="bg-primary text-white">Sales/Parchase A/C.</th>
                                <th class="bg-primary text-white">Commodity </th>
                                <th class="bg-primary text-white">Assess Amt</th>
                                <th class="bg-primary text-white">Action</th>
                             </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select class="form-control form-control-sm form-select" wire:model.defer="sales_purchase_ac_id">
                                        <option value="">Select Account</option>    
                                        @foreach ($saleAccounts as $account)
                                            <option value="{{ $account->id }}">
                                                {{ $account->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control form-control-sm form-select" wire:model.defer="gst_commodity_id">
                                        <option value="">Select gstCommodity</option>
                                        @foreach ($gstCommodities as $key => $gstCommodity)
                                            <option value="{{ $gstCommodity->id }}">
                                                {{ $gstCommodity->description }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" class="form-control form-control-sm" wire:model.defer="assess_amt">
                                </td>
                                <td>
                                    <input type="button" class="btn btn-primary btn-sm" value="Add" wire:click="addEntry">
                                </td>
                            </tr>
                            @foreach ($account_entries as $key => $account_entry)
                                <tr>
                                     <td>
                                        @foreach ($saleAccounts as $account)
                                            {{$account->id == $account_entry['sales_purchase_ac_id'] ? $account->name : ''}}
                                        @endforeach
                                     </td>
                                     <td>
                                         @foreach ($gstCommodities as $gstCommodity)
                                            {{$gstCommodity->id == $account_entry['gst_commodity_id'] ? $gstCommodity->description : ''}}
                                         @endforeach
                                     </td>
                                     <td>
                                            {{$account_entry['assess_amt']}}
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
