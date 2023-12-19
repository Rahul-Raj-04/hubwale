<?php

namespace App\Http\Controllers\Livewire\Erp\Transaction\ForexAdjustment;

use Livewire\Component;
use App\Enum\Enum;
use App\Models\Account;
use App\Models\ForexAdjustment;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Validator;
use App\Models\LedgerAccountBalance;
use App\Http\Traits\LedgerAccountBalanceTrait;

class Edit extends Component
{
    use LivewireAlert;

    public $account_entries = [];
    public $accounts = [];
    public $balance_types = [];

    public $enable_debit = 0;
    public $enable_credit = 1;

    public $vou_type;
    public $vou_date;
    public $vou_no;
    public $doc_no;
    public $doc_date;
    public $balance_type;
    public $account_id;
    public $debit;
    public $credit;
    public $narration;

    public $forexAdjustments = [];

    public function mount($forexAdjustment)
    {
        $this->forexAdjustments = ForexAdjustment::where('group_id', $forexAdjustment->group_id)->get();
        foreach ($this->forexAdjustments as $key => $forexAdjustment) {
            $this->account_entries[] = [
                'id' => $forexAdjustment->id,
                'balance_type' => $forexAdjustment->balance_type,
                'account_id' => $forexAdjustment->account_id,
                'balance' => $forexAdjustment->account->ldger_account_balance ? $forexAdjustment->account->ldger_account_balance->balance : null,
                'debit' => $forexAdjustment->debit,
                'credit' => $forexAdjustment->credit
            ];
        }
        $this->vou_type = $forexAdjustment->vou_type;
        $this->vou_date = $forexAdjustment->vou_date;
        $this->vou_no = $forexAdjustment->vou_no;
        $this->doc_no = $forexAdjustment->doc_no;
        $this->doc_date = $forexAdjustment->doc_date;
        $this->narration = $forexAdjustment->narration;
        if (end($this->account_entries)['balance_type'] == 'DB'){
            $this->enable_debit = 0;
            $this->enable_credit = 1;
            $this->balance_type = 'CR';
        } elseif (end($this->account_entries)['balance_type'] == 'CR') {
            $this->enable_credit = 0;
            $this->enable_debit = 1;
            $this->balance_type = 'DB';
        }

        $this->accounts = Account::Where('company_id', auth()->user()->company->id)->get();
        $this->balance_types = Enum::BALANCE_TYPE;
    }

    public function changeBalanceType()
    {
        if ($this->balance_type == 'CR') {
            $this->enable_credit = 1;
            $this->enable_debit = 0;
        } elseif($this->balance_type == 'DB') {
            $this->enable_debit = 1;
            $this->enable_credit = 0;
        }
        $this->dispatchBrowserEvent('entry-table');
    }

    public function addEntry()
    {
        $validator = Validator::make($this->all(), [
            'account_id' => 'required',
            $this->enable_credit == 1 ? 'credit' : 'debit'  => 'required'
        ],
        [
            'account_id.required' => 'Account required',
            'credit.required'=> 'Credit required',
            'debit.required'=> 'Debit required'
        ]);

        if ($validator->fails()) {
            $this->alert('error', $validator->errors()->first(), [
                'position' => 'center',
                'toast' => true,
            ]);
        } else {
            $ladgerAccount = LedgerAccountBalance::where('account_id', $this->account_id)->first();
            $this->account_entries[] = [
                'id' => null,
                'balance_type' => $this->balance_type,
                'account_id' => $this->account_id,
                'balance' => $ladgerAccount ? $ladgerAccount->balance : null,
                'debit' => $this->debit,
                'credit' => $this->credit
            ];
            $this->reset('balance_type');
            $this->reset('account_id');
            $this->reset('debit');
            $this->reset('credit');
            if (end($this->account_entries)['balance_type'] == 'DB'){
                $this->enable_debit = 0;
                $this->enable_credit = 1;
                $this->balance_type = 'CR';
            } elseif (end($this->account_entries)['balance_type'] == 'CR') {
                $this->enable_credit = 0;
                $this->enable_debit = 1;
                $this->balance_type = 'DB';
            }
        }
        $this->dispatchBrowserEvent('entry-table');
    }

    public function deleteEntry($key)
    {
        if (end($this->account_entries)['balance_type'] == 'DB'){
            $this->enable_debit = 0;
            $this->enable_credit = 1;
            $this->balance_type = 'CR';
        } elseif (end($this->account_entries)['balance_type'] == 'CR') {
            $this->enable_credit = 0;
            $this->enable_debit = 1;
            $this->balance_type = 'DB';
        }
        if($this->account_entries[$key]['id']) {
            $forexAdjustment = ForexAdjustment::find($this->account_entries[$key]['id']);
            $forexAdjustment->delete();
        }
        unset($this->account_entries[$key]);
        $this->dispatchBrowserEvent('entry-table');
    }

    public function submit()
    {
        $credit = 0;
        $debit = 0;

        foreach ($this->account_entries as $key => $account_antrie) {
            $credit = $credit + $account_antrie['credit'];
            $debit = $debit + $account_antrie['debit'];
        }

        if ( $credit != $debit){
            $this->alert('error', 'Credit and Debit forex amount  is not same', [
                'position' => 'top-right',
                'toast' => true,
            ]);
        } elseif ( $credit == 0 || $debit == 0){
            $this->alert('error', 'Blank Transaction Amount Not Allowed.', [
                'position' => 'top-right',
                'toast' => true,
            ]);
        } elseif (count($this->account_entries) == 0) {
            $this->alert('error', 'No account entry entered', [
                'position' => 'top-right',
                'toast' => true,
            ]);
        } else {
        $this->dispatchBrowserEvent('entry-table');
            foreach ($this->account_entries as $key => $account_antry) {
                if (!$account_antry['id']) {
                    ForexAdjustment::create([
                        'vou_type' => $this->vou_type,
                        'vou_date' => $this->vou_date,
                        'vou_no' => $this->vou_no,
                        'doc_no' => $this->doc_no,
                        'doc_date' => $this->doc_date,
                        'balance_type' => $account_antry['balance_type'],
                        'account_id' => $account_antry['account_id'],
                        'debit' => $account_antry['debit'],
                        'credit' => $account_antry['credit'],
                        'narration' => $this->narration,
                        'company_id' => auth()->user()->company->id,
                        'group_id' => $this->forexAdjustments[0]->group_id
                    ]);
                } else {
                    $forexAdjustment = ForexAdjustment::find($account_antry['id']);
                    $forexAdjustment->vou_type = $this->vou_type; 
                    $forexAdjustment->vou_date = $this->vou_date; 
                    $forexAdjustment->vou_no = $this->vou_no; 
                    $forexAdjustment->doc_no = $this->doc_no; 
                    $forexAdjustment->doc_date = $this->doc_date; 
                    $forexAdjustment->narration = $this->narration;
                    $forexAdjustment->save();
                }
            }
            toast('Forex adjustment created successfully!', 'success');
            return redirect()->route('erp.account-transaction.forex-adjustment.index');
        }
        $this->dispatchBrowserEvent('entry-table');
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <form wire:submit.prevent="submit">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Vou. Type</label>
                            <input type="text" class="form-control form-control-sm" wire:model.defer="vou_type" disabled>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Vou Date</label>
                            <input type="date" class="form-control form-control-sm"
                                   placeholder="Enter Vou Date" wire:model.defer="vou_date">
                            @error('vou_date')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Vou No</label>
                            <input type="text" class="form-control form-control-sm"
                                   placeholder="Enter Vou No" wire:model.defer="vou_no" disabled>
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
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Doc Date</label>
                            <input type="date" class="form-control form-control-sm" wire:model.defer="doc_date" disabled>
                            @error('doc_date')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Narration</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter narration" wire:model.defer="narration">
                        </div>
                    </div>
                    <input type="submit" id="FormSubmit" class="d-none">
                </form>
                <table class="table table-bordered text-nowrap border-bottom entry-table">
                    <thead>
                        <tr>
                            <th class="bg-primary text-white">CR/DB</th>
                            <th class="bg-primary text-white">Account name</th>
                            <th class="bg-primary text-white">Debit</th>
                            <th class="bg-primary text-white">Credit</th>
                            <th class="bg-primary text-white">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form>
                            <tr>
                                <td>
                                    <select class="form-control form-control-sm form-select" wire:model.defer="balance_type" wire:change="changeBalanceType">
                                        @foreach ($balance_types as $balance_type)
                                            <option value="{{ $balance_type }}">
                                                {{ $balance_type }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control form-control-sm form-select" wire:model.defer="account_id">
                                        <option value="">Select Account</option>
                                        @foreach ($accounts as $account)
                                            <option value="{{ $account->id }}">
                                                {{ $account->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" class="form-control form-control-sm" wire:model.defer="debit" {{ $enable_debit == 1 ? '' : 'disabled'}}>
                                </td>
                                <td>
                                    <input type="number" class="form-control form-control-sm" wire:model.defer="credit" {{ $enable_credit == 1 ? '' : 'disabled'}}>
                                </td>
                                <td>
                                    <input type="button" class="btn btn-sm btn-primary" value="Add" wire:click=addEntry>
                                </td>
                            </tr>
                        </form>
                        @foreach ($account_entries as $key => $account_entry)
                            <tr>
                                <td>
                                    {{$account_entry['balance_type']}}
                                </td>
                                <td>
                                    @foreach ($accounts as $account)
                                        {{$account->id == $account_entry['account_id'] ? $account->name : ''}}
                                    @endforeach
                                </td>
                                <td>
                                    {{$account_entry['debit']}}
                                </td>
                                <td>
                                    {{$account_entry['credit']}}
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
        blade;
    }
}
