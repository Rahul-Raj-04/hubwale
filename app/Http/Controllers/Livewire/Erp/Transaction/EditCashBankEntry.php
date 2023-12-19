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
use Illuminate\Http\Request;

class EditCashBankEntry extends Component
{
    use LivewireAlert, LedgerAccountBalanceTrait;

    public $accounts = [];
    public $accountTransaction; 

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

    // Bank Receipt, Payment route true or false
    public $isRouteBankPymt = false;    
    public $isRouteBankRecpt = false;    

    // Cash Receipt, Payment route true or false
    public $isRouteCashPymt = false;    
    public $isRouteCashRecpt = false;    
    public $isRouteContra = false; 

    public $module;   
    
    public $balance_type;

    public $edit_type;
    public $request;
    public $slug_account_id;

    public function mount(Request $request ,$id)
    {   
        $this->edit_type = $request->edit_type;
        $this->slug_account_id = $request->account_id;
        $this->accountTransaction = AccountTransaction::find($id);
        
        $this->type = $this->accountTransaction->type == 'Pymt' ? 'Payment' : 'Receipt';
        $this->balance_type = $this->type == 'Receipt' ? 'debit' : 'credit';
        $this->account_id = $this->accountTransaction->account_id;
        $this->date = date('Y-m-d', strtotime($this->accountTransaction->date));
        $this->voucher_no = $this->accountTransaction->voucher_no;
        $this->opposite_account_id = $this->accountTransaction->opposite_account_id;
        $this->amount = $this->accountTransaction->amount;
        $this->payment_method = $this->accountTransaction->payment_method;
        $this->narration = $this->accountTransaction->narration;

        if (Route::currentRouteName() == 'erp.account-transaction.cash-bank-entry.bank-payment.edit') {
            $this->module = 'bank_payment';
            $this->isRouteBankPymt = true;
            $this->reference_no = $this->accountTransaction->reference_no;
            $this->transaction_date = date('Y-m-d', strtotime($this->accountTransaction->transaction_date));
            $this->accountGroupsForBankOrCash = Enum::TRANSACTION_BANK_PARENT_ACCOUNT_GROUPS;
        } elseif (Route::currentRouteName() == 'erp.account-transaction.cash-bank-entry.bank-receipt.edit') {
            $this->module = 'bank_receipt';
            $this->isRouteBankRecpt = true;
            $this->reference_no = $this->accountTransaction->reference_no;
            $this->transaction_date = date('Y-m-d', strtotime($this->accountTransaction->transaction_date));
            $this->accountGroupsForBankOrCash = Enum::TRANSACTION_BANK_PARENT_ACCOUNT_GROUPS;

        } elseif (Route::currentRouteName() == 'erp.account-transaction.cash-bank-entry.cash-payment.edit') {
            $this->module = 'cash_payment';
            $this->isRouteCashPymt = true;
            $this->doc_no = $this->accountTransaction->doc_no;
            $this->doc_date = $this->accountTransaction->doc_date ? date('Y-m-d', strtotime($this->accountTransaction->doc_date)) : null;
            $this->accountGroupsForBankOrCash = Enum::TRANSACTION_CASH_PARENT_ACCOUNT_GROUPS;

        } elseif (Route::currentRouteName() == 'erp.account-transaction.cash-bank-entry.cash-receipt.edit') {
            $this->module = 'cash_receipt';
            $this->isRouteCashRecpt = true;
            $this->doc_no = $this->accountTransaction->doc_no;
            $this->doc_date = $this->accountTransaction->doc_date ? date('Y-m-d', strtotime($this->accountTransaction->doc_date)) : null;
            $this->accountGroupsForBankOrCash = Enum::TRANSACTION_CASH_PARENT_ACCOUNT_GROUPS;
        
        } elseif (Route::currentRouteName() == 'erp.account-transaction.cash-bank-entry.contra.edit') {
            $this->module = 'contra';
            $this->isRouteContra = true;
            $this->reference_no = $this->accountTransaction->reference_no;
            $this->transaction_date = date('Y-m-d', strtotime($this->accountTransaction->transaction_date));
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
            'opposite_account_id' => $this->opposite_account_id,
            'amount' => $this->amount,
            'narration' => $this->narration,
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

        $this->accountTransaction->update($data);    
        if ($this->module == 'bank_payment') {
            $type =  $this->type == "Receipt" ? 'BRcpt' : 'BPymt';
        } elseif ($this->module == 'bank_receipt') {
            $type =  $this->type == "Receipt" ? 'BRcpt' : 'BPymt';
        } elseif ($this->module == 'cash_receipt') {
            $type =  $this->type == "Receipt" ? 'CRcpt' : 'CPymt';
        } elseif ($this->module == 'cash_payment') {
            $type =  $this->type == "Receipt" ? 'CRcpt' : 'CPymt';
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
                'type_id' => $this->accountTransaction->id,
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
                'type_id' => $this->accountTransaction->id,
                'model_name' => 'AccountTransaction'
            ];
            $this->LedgerAccountBalanceCreateOrUpdate($ledgerdata);
        }

        if ($this->isRouteBankPymt) {

            toast('Bank Payment updated successfully!', 'success');
            
            if (isset($this->edit_type) && $this->edit_type == 'cash_book') {
                if (!$this->slug_account_id) {
                    toast('Something went wrong!', 'error');
                    return redirect()->route('erp.report.account-book.ledger.index');
                }
                return redirect()->route('erp.report.account-book.cash-book.show', $this->slug_account_id);
            } elseif (isset($this->edit_type) && $this->edit_type == 'bank_book') {
                if (!$this->slug_account_id) {

                    toast('Something went wrong!', 'error');
                    return redirect()->route('erp.report.account-book.ledger.index');
                }
                return redirect()->route('erp.report.account-book.bank-book.show', $this->slug_account_id);
            } elseif (isset($this->edit_type) && $this->edit_type == 'day_book') {

                return redirect()->route('erp.report.account-book.day-book.index');
            } elseif (isset($this->edit_type) && $this->edit_type == 'ledger') {
                if (!$this->slug_account_id) {
                    toast('Something went wrong!', 'error');
                    return redirect()->route('erp.report.account-book.ledger.index');
                }
                return redirect()->route('erp.report.account-book.ledger.allShow', ['id' => $this->slug_account_id, 'type' => 'account_ladger']);
            }
            return redirect()->route('erp.account-transaction.cash-bank-entry.bank-payment.index');
        } elseif ($this->isRouteBankRecpt) {
            
            toast('Bank Receipt updated successfully!', 'success');
            
            if (isset($this->edit_type) && $this->edit_type == 'cash_book') {
                if (!$this->slug_account_id) {
                    toast('Something went wrong!', 'error');
                    return redirect()->route('erp.report.account-book.ledger.index');
                }
                return redirect()->route('erp.report.account-book.cash-book.show', $this->slug_account_id);
            } elseif (isset($this->edit_type) && $this->edit_type == 'bank_book') {
                if (!$this->slug_account_id) {
                    toast('Something went wrong!', 'error');
                    return redirect()->route('erp.report.account-book.ledger.index');
                }
                return redirect()->route('erp.report.account-book.bank-book.show', $this->slug_account_id);
            } elseif (isset($this->edit_type) && $this->edit_type == 'day_book') {
                return redirect()->route('erp.report.account-book.day-book.index');
            } elseif (isset($this->edit_type) && $this->edit_type == 'ledger') {
                if (!$this->slug_account_id) {
                    toast('Something went wrong!', 'error');
                    return redirect()->route('erp.report.account-book.ledger.index');
                }
                return redirect()->route('erp.report.account-book.ledger.allShow', ['id' => $this->slug_account_id, 'type' => 'account_ladger']);
            }
            return redirect()->route('erp.account-transaction.cash-bank-entry.bank-receipt.index');
        } elseif ($this->isRouteCashPymt) {
            
            toast('Cash Payment updated successfully!', 'success');
            if (isset($this->edit_type) && $this->edit_type == 'cash_book') {
                if (!$this->slug_account_id) {
                    toast('Something went wrong!', 'error');
                    return redirect()->route('erp.report.account-book.ledger.index');
                }
                return redirect()->route('erp.report.account-book.cash-book.show', $this->slug_account_id);
            } elseif (isset($this->edit_type) && $this->edit_type == 'bank_book') {
                if (!$this->slug_account_id) {
                    toast('Something went wrong!', 'error');
                    return redirect()->route('erp.report.account-book.ledger.index');
                }
                return redirect()->route('erp.report.account-book.bank-book.show', $this->slug_account_id);
            } elseif (isset($this->edit_type) && $this->edit_type == 'day_book') {

                return redirect()->route('erp.report.account-book.day-book.index');
            } elseif (isset($this->edit_type) && $this->edit_type == 'ledger') {
                if (!$this->slug_account_id) {
                    toast('Something went wrong!', 'error');
                    return redirect()->route('erp.report.account-book.ledger.index');
                }
                return redirect()->route('erp.report.account-book.ledger.allShow', ['id' => $this->slug_account_id, 'type' => 'account_ladger']);
            }
            return redirect()->route('erp.account-transaction.cash-bank-entry.cash-payment.index');
        } elseif ($this->isRouteCashRecpt) {
            
            toast('Cash Receipt updated successfully!', 'success');
            if (isset($this->edit_type) && $this->edit_type == 'cash_book') {
                if (!$this->slug_account_id) {
                    toast('Something went wrong!', 'error');
                    return redirect()->route('erp.report.account-book.ledger.index');
                }
                return redirect()->route('erp.report.account-book.cash-book.show', $this->slug_account_id);
            } elseif (isset($this->edit_type) && $this->edit_type == 'bank_book') {
                if (!$this->slug_account_id) {
                    toast('Something went wrong!', 'error');
                    return redirect()->route('erp.report.account-book.ledger.index');
                }
                return redirect()->route('erp.report.account-book.bank-book.show', $this->slug_account_id);
            } elseif (isset($this->edit_type) && $this->edit_type == 'day_book') {
                return redirect()->route('erp.report.account-book.day-book.index');
            } elseif (isset($this->edit_type) && $this->edit_type == 'ledger') {
                if (!$this->slug_account_id) {
                    toast('Something went wrong!', 'error');
                    return redirect()->route('erp.report.account-book.ledger.index');
                }
                return redirect()->route('erp.report.account-book.ledger.allShow', ['id' => $this->slug_account_id, 'type' => 'account_ladger']);
            }
            return redirect()->route('erp.account-transaction.cash-bank-entry.cash-receipt.index');
        } elseif ($this->isRouteContra) {

            toast('Contra updated successfully!', 'success');
            if (isset($this->edit_type) && $this->edit_type == 'cash_book') {
                if (!$this->slug_account_id) {
                    toast('Something went wrong!', 'error');
                    return redirect()->route('erp.report.account-book.ledger.index');
                }
                return redirect()->route('erp.report.account-book.cash-book.show', $this->slug_account_id);
            } elseif (isset($this->edit_type) && $this->edit_type == 'bank_book') {
                if (!$this->slug_account_id) {
                    toast('Something went wrong!', 'error');
                    return redirect()->route('erp.report.account-book.ledger.index');
                }
                return redirect()->route('erp.report.account-book.bank-book.show', $this->slug_account_id);
            } elseif (isset($this->edit_type) && $this->edit_type == 'day_book') {
                return redirect()->route('erp.report.account-book.day-book.index');
            } elseif (isset($this->edit_type) && $this->edit_type == 'ledger') {
                if (!$this->slug_account_id) {
                    toast('Something went wrong!', 'error');
                    return redirect()->route('erp.report.account-book.ledger.index');
                }
                return redirect()->route('erp.report.account-book.ledger.allShow', ['id' => $this->slug_account_id, 'type' => 'account_ladger']);
            }
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
                            <label class="form-label"> Rcpt/Pymt <i class="text-danger">* </i></label>
                                <select wire:model.defer='type' class="form-control form-control-sm form-select @error('type') is-invalid @enderror" required>
                                    <option value="Receipt" disabled>Receipt</option>
                                    <option value="Payment" disabled>Payment</option>
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
                            <label class="form-label"> Bank Amount <i class="text-danger">* {{$balance_type}}</i></label>
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
                                <label class="form-label"> Doc. No. <i class="text-danger">*</i></label>
                                <input type="text" class="form-control form-control-sm @error('doc_no') is-invalid @enderror" 
                                    wire:model.defer="doc_no" placeholder="Enter Doc No" disabled>
                                @error('doc_no')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label"> Doc Date <i class="text-danger">*</i></label>
                                <input type="date" class="form-control form-control-sm @error('doc_date') is-invalid @enderror" 
                                    wire:model.defer="doc_date" disabled>
                                @error('doc_date')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        @endif
                        <div class="col-md-6 mb-4">
                            <label class="form-label"> Narration </label>
                            <textarea class="form-control form-control-sm @error('narration') is-invalid @enderror" 
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
