<?php

namespace App\Http\Controllers\Livewire\Erp\Transaction;

use Livewire\Component;
use Illuminate\Support\Facades\Route;
use App\Models\Account;
use App\Models\AccountGroup;
use App\Models\AccountTransaction;
use App\Enum\Enum;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Http\Traits\LedgerAccountBalanceTrait;

class AddCashBankEntry extends Component
{
    use LivewireAlert, LedgerAccountBalanceTrait;
    
    public $accounts = [];

    // Accounts for Bank Or Cash 
    public $accountsForBankOrCash  = [];
    public $accountGroupsForBankOrCash = []; 

    //Form fiels
    public $account_id;
    public $type;
    public $date;
    public $voucher_no;
    public $opposite_account_id;
    public $amount;
    public $payment_method;
    public $reference_no;
    public $transaction_date;
    public $doc_no;
    public $doc_date;
    public $narration;
    public $module;

    public $balance_type;

    // Bank Receipt, Payment route true or false
    public $isRouteBankPymt = false;    
    public $isRouteBankRecpt = false;    

    // Cash Receipt, Payment route true or false
    public $isRouteCashPymt = false;    
    public $isRouteCashRecpt = false;    
    public $isRouteContra = false;    

    public function mount()
    {           
        $this->payment_method = 'bank_transfer';
        $this->balance_type = 'debit';
        $this->date = date('Y-m-d');

        if (Route::currentRouteName() == 'erp.account-transaction.cash-bank-entry.bank-payment.create') {

            $this->isRouteBankPymt = true;
            $this->module = 'bank_payment';
            $this->type = 'Payment';
            $this->balance_type = 'credit';
            $this->accountGroupsForBankOrCash = Enum::TRANSACTION_BANK_PARENT_ACCOUNT_GROUPS;
        } elseif (Route::currentRouteName() == 'erp.account-transaction.cash-bank-entry.bank-receipt.create') {

            $this->isRouteBankRecpt = true;
            $this->module = 'bank_receipt';
            $this->type = 'Receipt';
            $this->balance_type = 'debit';
            $this->accountGroupsForBankOrCash = Enum::TRANSACTION_BANK_PARENT_ACCOUNT_GROUPS;

        } elseif (Route::currentRouteName() == 'erp.account-transaction.cash-bank-entry.cash-payment.create') {

            $this->isRouteCashPymt = true;
            $this->module = 'cash_payment';
            $this->type = 'Payment';
            $this->balance_type = 'credit';
            $this->accountGroupsForBankOrCash = Enum::TRANSACTION_CASH_PARENT_ACCOUNT_GROUPS;

        } elseif (Route::currentRouteName() == 'erp.account-transaction.cash-bank-entry.cash-receipt.create') {

            $this->isRouteCashRecpt = true;
            $this->module = 'cash_receipt';
            $this->type = 'Receipt';
            $this->balance_type = 'debit';
            $this->accountGroupsForBankOrCash = Enum::TRANSACTION_CASH_PARENT_ACCOUNT_GROUPS;
        } elseif (Route::currentRouteName() == 'erp.account-transaction.cash-bank-entry.contra.create') {

            $this->isRouteContra = true;
            $this->module = 'contra';
            $this->accountGroupsForBankOrCash = Enum::TRANSACTION_BANK_PARENT_ACCOUNT_GROUPS;
        }
        
        $this->accountsForBankOrCash = Account::Where('company_id', auth()->user()->company->id)->whereHas('account_group', function($ag)
        {
            $ag->whereIn('name', $this->accountGroupsForBankOrCash);
        })->get();

        $this->accounts = Account::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->whereNotIn('id', $this->accountsForBankOrCash->pluck('id')->toArray())->get();
    }

    public function updatedType()
    {
        if ($this->type == 'Receipt') {
            $this->balance_type = 'debit';
        } elseif ($this->type == 'Payment') {
            $this->balance_type = 'credit';
        }
    }

    public function submit()
    {
        $rules = [
            'account_id' => 'required',
            'type' => 'required|in:Receipt,Payment',
            'date' => 'required',
            'opposite_account_id' => 'required',
            'amount' => 'required',
        ];

        if ($this->isRouteBankPymt || $this->isRouteBankRecpt || $this->isRouteContra) {

            $rules['payment_method'] = 'required|in:upi,cheque,bank_transfer';
            $rules['reference_no'] = 'required';
            $rules['transaction_date'] = 'required';
        
        }

        $this->validate($rules);

        $data = [
            'account_id' => $this->account_id,
            'type' => $this->type == "Receipt" ? 'Rcpt' : 'Pymt',
            'date' => $this->date,
            'voucher_no' => $this->voucher_no,
            'opposite_account_id' => $this->opposite_account_id,
            'amount' => $this->amount,
            'narration' => $this->narration,
            'company_id' => auth()->user()->company ? auth()->user()->company->id : null,
        ];

        if (!empty($this->voucher_no)) {
            $data['voucher_no'] = $this->voucher_no;            
        }

        if ($this->isRouteBankPymt || $this->isRouteBankRecpt || $this->isRouteContra) {

            $data['payment_method'] = $this->payment_method;
            $data['reference_no'] = $this->reference_no;
            $data['transaction_date'] = $this->transaction_date;
        
        } elseif ($this->isRouteCashPymt || $this->isRouteCashRecpt) {
            
            $data['doc_no'] = $this->doc_no;
            $data['doc_date'] = $this->doc_date;
        }

        $data['module'] = $this->module;

        // if ($this->type == "Payment") {
            
        //     if ($oppositeAccount->opening_balance >= $this->amount) {
        //         $oppositeAccount->opening_balance = $oppositeAccount->opening_balance - $this->amount;
        //         $account->opening_balance = $account->opening_balance + $this->amount; 
        //         $account->save();
        //         $oppositeAccount->save();
        //     } else {

        //         $this->alert('error', "You don't have sufficient balance in $oppositeAccount->name.", [
        //             'position' => 'top-right',
        //             'toast' => true,
        //         ]);
        //         return '';
        //     }
        // } elseif ($this->type == "Receipt") {

        //     if ($account->opening_balance >= $this->amount) {
        //         $account->opening_balance = $account->opening_balance - $this->amount;
        //         $oppositeAccount->opening_balance = $oppositeAccount->opening_balance + $this->amount;
        //         $account->save();
        //         $oppositeAccount->save();
        //     } else {
        //         $this->alert('error', "You don't have sufficient balance in $account->name.", [
        //             'position' => 'top-right',
        //             'toast' => true,
        //         ]);
        //         return '';
        //     }
        // }

        // Check Given amount have in account end

        // Create Account Transaction
        $accountTransaction = AccountTransaction::create($data);    

        if ($this->module == 'bank_payment') {
            $type =  'BPymt';
        } elseif ($this->module == 'bank_receipt') {
            $type =  'BRcpt';
        } elseif ($this->module == 'cash_receipt') {
            $type =  'CRcpt';
        } elseif ($this->module == 'cash_payment') {
            $type =  'CPymt';
        }
        if ($this->module != 'contra') {
            $ledgerdata = [
                'account_id' => $this->account_id,
                'opposite_account_id' => $this->opposite_account_id,
                'balance' => $this->amount,
                'type' => $type,
                'balance_type' => $this->balance_type == 'credit' ? 'debit' : 'credit',
                'date' => $this->date,
                'vou_doc_no' => $this->voucher_no,
                'type_id' => $accountTransaction->id,
                'model_name' => 'AccountTransaction'
            ];
            $this->LedgerAccountBalanceCreateOrUpdate($ledgerdata);

            $ledgerdata = [
                'account_id' => $this->opposite_account_id,
                'opposite_account_id' => $this->account_id,
                'balance' => $this->amount,
                'type' => $type,
                'balance_type' => $this->balance_type,
                'date' => $this->date,
                'vou_doc_no' => $this->voucher_no,
                'type_id' => $accountTransaction->id,
                'model_name' => 'AccountTransaction'
            ];
            $this->LedgerAccountBalanceCreateOrUpdate($ledgerdata);
        }

        // redirect home
        if ($this->isRouteBankPymt) {

            toast('Bank Payment created successfully!', 'success');
            return redirect()->route('erp.account-transaction.cash-bank-entry.bank-payment.index');
        } elseif ($this->isRouteBankRecpt) {
            
            toast('Bank Receipt created successfully!', 'success');
            return redirect()->route('erp.account-transaction.cash-bank-entry.bank-receipt.index');
        } elseif ($this->isRouteCashPymt) {
            
            toast('Cash Payment created successfully!', 'success');
            return redirect()->route('erp.account-transaction.cash-bank-entry.cash-payment.index');
        } elseif ($this->isRouteCashRecpt) {
            
            toast('Cash Receipt created successfully!', 'success');
            return redirect()->route('erp.account-transaction.cash-bank-entry.cash-receipt.index');
        } elseif ($this->isRouteContra) {

            toast('Contra created successfully!', 'success');
            return redirect()->route('erp.account-transaction.cash-bank-entry.contra.index');
        }
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <form wire:submit.prevent="submit">
                    
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label"> Bank/Cash <i class="text-danger">*</i></label>
                            <select wire:model.defer='account_id' class="form-control form-control-sm form-select @error('account_id') is-invalid @enderror" required>
                                <option value="">Select bank account</option>
                                @foreach ($accountsForBankOrCash as $account)
                                    <option value="{{ $account->id }}">
                                    {{ $account->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('account_id')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label"> Rcpt/Pymt <i class="text-danger">*</i></label> 
                            <select wire:model='type' class="form-control form-control-sm form-select @error('type') is-invalid @enderror" required>
                                <option value="Receipt" {{ $module == 'contra' ? '' : 'disabled'}}>Receipt</option>
                                <option value="Payment" {{ $module == 'contra' ? '' : 'disabled'}}>Payment</option>
                            </select>
                            @error('type')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label"> Date <i class="text-danger">*</i></label>
                            <input type="date" class="form-control form-control-sm @error('date') is-invalid @enderror" 
                                wire:model.defer="date" required>
                            @error('date')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label"> Vou No</label>
                            <input type="text" class="form-control form-control-sm @error('voucher_no') is-invalid @enderror" 
                                wire:model.defer="voucher_no" placeholder="Enter Voucher Number">
                            @error('voucher_no')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label"> Opp. A/c. <i class="text-danger">*</i></label>
                            <select wire:model.defer='opposite_account_id' class="form-control form-control-sm form-select @error('opposite_account_id') is-invalid @enderror" required>
                                <option value="">Select Opposite Account</option>
                                @foreach ($accounts as $account)
                                    <option value="{{ $account->id }}">
                                    {{ $account->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('opposite_account_id')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label"> Bank Amount <i class="text-danger">* </i>{{$balance_type}}</label>
                            <input type="number" class="form-control form-control-sm @error('amount') is-invalid @enderror" 
                                wire:model.defer="amount" placeholder="Enter Amount" required>
                            @error('amount')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label"> Payment Method <i class="text-danger">*</i></label>
                            <select wire:model.defer='payment_method' class="form-control form-control-sm form-select @error('payment_method') is-invalid @enderror" required>
                                <option value="upi">UPI</option>
                                <option value="cheque">Cheque</option>
                                <option value="bank_transfer">Bank Transfer</option>

                                {{-- @foreach ($gst_slabs as $gst_slab)
                                    <option value="{{ $gst_slab->id }}">
                                    {{ ucfirst($gst_slab->gst_slab) }}
                                    </option>
                                @endforeach --}}

                            </select>
                            @error('payment_method')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>

                        @if($this->isRouteBankPymt || $this->isRouteBankRecpt || $this->isRouteContra)
                            <div class="col-md-6 mb-4">
                                <label class="form-label"> Chq/DD No. <i class="text-danger">*</i></label>
                                <input type="text" class="form-control form-control-sm @error('reference_no') is-invalid @enderror" 
                                    wire:model.defer="reference_no" placeholder="Enter Chq/DD No" required>
                                @error('reference_no')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label"> Chq/DD Date <i class="text-danger">*</i></label>
                                <input type="date" class="form-control form-control-sm @error('transaction_date') is-invalid @enderror" 
                                    wire:model.defer="transaction_date" required>
                                @error('transaction_date')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        @endif

                        @if($this->isRouteCashPymt || $this->isRouteCashRecpt)
                            <div class="col-md-6 mb-4">
                                <label class="form-label"> Doc. No. </label>
                                <input type="text" class="form-control form-control-sm @error('doc_no') is-invalid @enderror" 
                                    wire:model.defer="doc_no" placeholder="Enter Doc No" disabled>
                                @error('doc_no')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label"> Doc Date </label>
                                <input type="date" class="form-control form-control-sm @error('doc_date') is-invalid @enderror" 
                                    wire:model.defer="doc_date" disabled>
                                @error('doc_date')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        @endif
                        <div class="col-md-6 mb-4">
                            <label class="form-label"> Narration </label>
                            <textarea class="form-control form-control-sm" 
                                wire:model.defer="narration" placeholder="Enter Narration"></textarea>
                            @error('narration')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <input type="submit" id="formSubmit" class="d-none">
                </form>
            </div>
        blade;
    }
}
