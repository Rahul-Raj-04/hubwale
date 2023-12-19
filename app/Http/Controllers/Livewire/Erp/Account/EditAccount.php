<?php

namespace App\Http\Controllers\Livewire\Erp\Account;

use Livewire\Component;
use App\Models\City;
use App\Models\State;
use App\Models\Account;
use App\Models\AccountGroup;
use App\Models\AccountAddressDetails;
use App\Models\AccountBankDetails;
use App\Models\AccountInterest;
use App\Http\Traits\LocationTrait;
use Illuminate\Support\Facades\Validator;
use App\Http\Traits\LedgerAccountBalanceTrait;
use App\Rules\MatchPanNumber;
use App\Rules\MatchGstNumber;
use App\Models\AccountBillToBill;
use Illuminate\Http\Request;

class EditAccount extends Component
{
    use LocationTrait, LedgerAccountBalanceTrait;

    public $states = [];
    public $cities = [];
    public $accountGroups = [];
    public $balance_methods = [];
    public $balance_types = [];
    
    // Inputs
    public $name; 
    public $alias; 
    public $account_group; 
    public $pincode; 
    public $area; 
    public $mobile; 
    public $pan_no; 
    public $aadhar_no; 
    public $gstin_no; 
    public $balance_method; 
    public $opening_balance; 
    public $balance_type; 
    public $credit_limit; 
    public $credit_days; 
    public $state;
    public $city;
    public $registration_type;

    // Inputs disabled
    public $pincode_disabled;
    public $area_disabled;
    public $mobile_disabled;
    public $pan_no_disabled;
    public $aadhar_no_disabled;
    public $gstin_no_disabled;
    public $balance_method_disabled;
    public $opening_balance_disabled;
    public $balance_type_disabled;
    public $credit_limit_disabled;
    public $credit_days_disabled;
    public $state_disabled;
    public $city_disabled;
    public $registration_type_disabled;

    //External forms show 
    public $account_address_detail_form_show;
    public $account_bank_detail_form_show;
    public $account_interest_form_show;

    //Account address details
    public $contact_person;
    public $address;
    public $city_address_detail;
    public $pincode_address_detail;
    public $area_address_detail;
    public $state_address_detail;
    public $category;

    //Account contact details
    public $mobile_contact_detail;
    public $phone_no;
    public $phone_no_roaming;
    public $fax;
    public $factory_no;
    public $email;
    public $website;

    //Account bank details
    public $bank_name;
    public $branch_name;
    public $bank_address;
    public $ifsc_code;
    public $account_no;

    //Account bank interest
    public $interest;
    public $interest_ac;
    public $tds_ac;
    public $credit_debit;

    // Bill to Bill
    public $bill_to_bill_adjustment_type;
    public $bill_to_bill_date;
    public $bill_to_bill_particular;
    public $bill_to_bill_credit_days;
    public $bill_to_bill_amount;
    public $bill_to_bill_adjusted_amt;
    public $bill_to_bill_balance_type;
    public $bill_to_bill_account_id;
    public $bill_to_bill_company_id;
    public $account_bill_to_bill_form_show = false;

    public $adjustment_types = [];
    public $bill_entries = [];

    // Button
    public $f4AddressFormSubmit = false;
    public $bankDetailFormSubmit = false;
    public $interestDetailFormSubmit = false;

    public $account;

    public $edit_type;

    public function mount(Request $request, $account)
    {
        $this->edit_type = $request->edit_type;
        $this->account = $account;
        $this->name = $account->name;
        $this->alias = $account->alias;
        $this->account_group = $account->account_group_id;
        $this->city = $account->city_id;
        $this->pincode = $account->pincode;
        $this->area = $account->area;
        $this->mobile = $account->mobile;
        $this->state = $account->state_id;
        $this->pan_no = $account->pan_no;
        $this->aadhar_no = $account->aadhar_no;
        $this->gstin_no = $account->gstin_no;
        $this->balance_method = $account->balance_method;
        $this->opening_balance = $account->opening_balance;
        $this->balance_type = $account->balance_type;
        $this->credit_limit = $account->credit_limit;
        $this->credit_days = $account->credit_days;
        $this->registration_type = $account->registration_type;
        
        if ($this->balance_method == 'BTB') {
            $this->account_bill_to_bill_form_show = true;
        }

        if($this->account->account_address_detail){
            $this->contact_person = $this->account->account_address_detail->contact_person;
            $this->address = $this->account->account_address_detail->address;
            $this->city_address_detail = $this->account->account_address_detail->city_id;
            $this->pincode_address_detail = $this->account->account_address_detail->pincode;
            $this->area_address_detail = $this->account->account_address_detail->area;
            $this->state_address_detail = $this->account->account_address_detail->state_id;
            $this->category = $this->account->account_address_detail->category;
            $this->mobile_contact_detail = $this->account->account_address_detail->mobile;
            $this->phone_no = $this->account->account_address_detail->phone_no;
            $this->phone_no_roaming = $this->account->account_address_detail->phone_no_r;
            $this->fax = $this->account->account_address_detail->fax;
            $this->factory_no = $this->account->account_address_detail->factory_no;
            $this->email = $this->account->account_address_detail->email;
            $this->website = $this->account->account_address_detail->website;
        }

        if($this->account->account_bank_detail) {
            $this->bank_name = $this->account->account_bank_detail->bank_name;
            $this->branch_name = $this->account->account_bank_detail->branch_name;
            $this->bank_address = $this->account->account_bank_detail->address;
            $this->ifsc_code = $this->account->account_bank_detail->ifsc_code;
            $this->account_no = $this->account->account_bank_detail->account_no;
        }

        if($this->account->account_interest) {
            $this->interest = $this->account->account_interest->interest;
            $this->interest_ac = $this->account->account_interest->interest_ac;
            $this->tds_ac = $this->account->account_interest->tds_ac;
            $this->credit_debit = $this->account->account_interest->cr_db;
        }

        $accountBillToBills = AccountBillToBill::where('account_id', $this->account->id)->get();
        foreach ($accountBillToBills as $key => $accountBillToBill) {
            $this->bill_entries[] = [
                'id' => $accountBillToBill->id,
                'bill_to_bill_adjustment_type' => $accountBillToBill->adjustment_type,
                'bill_to_bill_date' => $accountBillToBill->date,
                'bill_to_bill_particular' => $accountBillToBill->particular,
                'bill_to_bill_credit_days' => $accountBillToBill->credit_days,
                'bill_to_bill_amount' => $accountBillToBill->amount,
                'bill_to_bill_adjusted_amt' => $accountBillToBill->adjusted_amt,
                'bill_to_bill_balance_type' => $accountBillToBill->balance_type,
                'bill_to_bill_account_id' => $accountBillToBill->account_id,
                'bill_to_bill_company_id' => $accountBillToBill->company_id,
            ];
        }

        $this->adjustment_types = [
            'No Account',
            'Adv.Payment',
            'New Reference'
        ];
        
        $this->accountGroups = AccountGroup::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
        $this->states = State::all();
        $this->cities = City::all();
        $this->balance_types = ["credit", "debit"];
        $this->balance_methods = ["B.Only"];
        $this->updatedAccountGroup();
    }

    public function updatedAccountGroup()
    {
        $accountGroup = AccountGroup::find($this->account_group);

        if ($accountGroup) {

            // Inputs disabled and store default value
            $accountGroup->pincode ? (($this->pincode_disabled = 'disabled') && ($this->pincode = $accountGroup->pincode_default)) : ($this->pincode_disabled = '');

            $accountGroup->area ? (($this->area_disabled = 'disabled') && ($this->area = $accountGroup->area_default)) : ($this->area_disabled = '');

            $accountGroup->mobile ? (($this->mobile_disabled = 'disabled') && ($this->mobile = $accountGroup->mobile_default)) : ($this->mobile_disabled = '');
            
            $accountGroup->pan_no ? (($this->pan_no_disabled = 'disabled') && ($this->pan_no = $accountGroup->pan_no_default)) : ($this->pan_no_disabled = '');
            
            $accountGroup->aadhar_no ? (($this->aadhar_no_disabled = 'disabled') && ($this->aadhar_no = $accountGroup->aadhar_no_default)) : ($this->aadhar_no_disabled = '');
            
            $accountGroup->gstin_no ? (($this->gstin_no_disabled = 'disabled') && ($this->gstin_no = $accountGroup->gstin_no_default)) : ($this->gstin_no_disabled = '');
            
            $accountGroup->opening_balance ? (($this->opening_balance_disabled = 'disabled') && ($this->opening_balance = $accountGroup->opening_balance_default)) : ($this->opening_balance_disabled = '');

            // $accountGroup->balance_method ? (($this->balance_method_disabled = 'disabled') && ($this->balance_method = $accountGroup->balance_method_default)) : ($this->balance_method_disabled = '');

            // $accountGroup->balance_type ? (($this->balance_type_disabled = 'disabled') && ($this->balance_type = $accountGroup->balance_type_default)) : ($this->balance_type_disabled = '');

            !empty($accountGroup->balance_method_default) ? ($this->balance_methods = unserialize($accountGroup->balance_method_default)) : ($this->balance_methods = ["B.Only"]);  

            !empty($accountGroup->balance_type_default) ? ($this->balance_type = unserialize($accountGroup->balance_type_default)[0]) : ($this->balance_types = ["credit", "debit"]);
            
            // $this->balance_method = $this->balance_methods[0]; 
            
            $accountGroup->credit_limit ? (($this->credit_limit_disabled = 'disabled') && ($this->credit_limit = $accountGroup->credit_limit_default)) : ($this->credit_limit_disabled = '');
            
            $accountGroup->credit_days ? (($this->credit_days_disabled = 'disabled') && ($this->credit_days = $accountGroup->credit_days_default)) : ($this->credit_days_disabled = '');
            
            $accountGroup->state_id ? (($this->state_disabled = 'disabled') && ($this->state = $accountGroup->state_id_default)) : ($this->state_disabled = '');
            
            $accountGroup->city_id ? (($this->city_disabled = 'disabled') && ($this->city = $accountGroup->city_id_default)) : ($this->city_disabled = '');
            $accountGroup->registration_type ? $this->registration_type_disabled = 'disabled' : ($this->registration_type_disabled = '');        

            // External forms       
            $this->account_address_detail_form_show = $accountGroup->account_address_details;
            $this->account_bank_detail_form_show = $accountGroup->account_bank_details;
            $this->account_interest_form_show = $accountGroup->account_interest;

            if($this->account_interest_form_show) {
                $this->credit_debit = 'credit';
            }
        
        } else {

            $this->pincode_disabled = '';
            $this->area_disabled = '';
            $this->mobile_disabled = '';
            $this->pan_no_disabled = '';
            $this->aadhar_no_disabled = '';
            $this->gstin_no_disabled = '';
            $this->balance_method_disabled = '';
            $this->opening_balance_disabled = '';
            $this->balance_type_disabled = '';
            $this->credit_limit_disabled = '';
            $this->credit_days_disabled = '';
            $this->state_disabled = '';
            $this->city_disabled = '';

            $this->account_address_detail_form_show = false;
            $this->account_bank_detail_form_show = false;
            $this->account_interest_form_show = false;
        }
    }

    public function saveAccount()
    {
        // Rules
        $rules = [
            'name' => ['required'],
            // 'alias' => ['required'],
            'account_group' => ['required'],
        ];
        
        // Rules If input not disabled
        // $this->pincode_disabled == 'disabled' ? '' : ($rules['pincode'] = 'required|numeric');
        // $this->area_disabled == 'disabled' ? '' : ($rules['area'] = 'required');
        $this->mobile_disabled == 'disabled' ? '' : ($rules['mobile'] = 'nullable|numeric|digits:10');
        $this->pan_no_disabled == 'disabled' ? '' : ($rules['pan_no'] = ['nullable', 'digits:10', new MatchPanNumber()]);
        $this->aadhar_no_disabled == 'disabled' ? '' : ($rules['aadhar_no'] = 'nullable|numeric|digits:10');
        $this->gstin_no_disabled == 'disabled' ? '' : ($rules['gstin_no'] = ['nullable', 'digits:15', new MatchGstNumber() ]);
        // $this->balance_method_disabled == 'disabled' ? '' : ($rules['balance_method'] = 'required');
        // $this->opening_balance_disabled == 'disabled' ? '' : ($rules['opening_balance'] = 'required|regex:/[0-9]/|max:6');
        // $this->balance_type_disabled == 'disabled' ? '' : ($rules['balance_type'] = 'required');
        // $this->credit_limit_disabled == 'disabled' ? '' : ($rules['credit_limit'] = 'required|regex:/[0-9]/|max:6');
        // $this->credit_days_disabled == 'disabled' ? '' : ($rules['credit_days'] = 'required|numeric');
        // $this->state_disabled == 'disabled' ? '' : ($rules['state'] = 'required');
        // $this->city_disabled == 'disabled' ? '' : ($rules['city'] = 'required');
        $this->registration_type_disabled == 'disabled' ? '' : ($rules['registration_type'] = 'required');

        $this->validate(array_merge($rules));

        try {
            //Edit account
            $this->account->name = $this->name;
            $this->account->alias = $this->alias;
            $this->account->account_group_id = $this->account_group;
            $this->account->city_id = $this->city;
            $this->account->pincode = $this->pincode;
            $this->account->area = $this->area;
            $this->account->mobile = $this->mobile;
            $this->account->state_id = $this->state;
            $this->account->pan_no = $this->pan_no;
            $this->account->aadhar_no = $this->aadhar_no;
            $this->account->gstin_no = $this->gstin_no;
            $this->account->balance_method = $this->balance_method;
            $this->account->opening_balance = $this->opening_balance;
            $this->account->balance_type = $this->balance_type;
            $this->account->credit_limit = $this->credit_limit;
            $this->account->credit_days = $this->credit_days;
            $this->account->registration_type = $this->registration_type;

            $ledgerdata = [
                'account_id' => $this->account->id,
                'opposite_account_id' => null,
                'balance' => $this->opening_balance,
                'type' => 'opening_balance',
                'balance_type' => $this->balance_type,
                'date' => today(),
                'vou_doc_no' => null,
                'type_id' => null
            ];
            $this->LedgerAccountBalanceCreateOrUpdate($ledgerdata);

            if($this->account_address_detail_form_show && $this->f4AddressFormSubmit)
            {
                // Create account address details
                $account_address_detail = $this->account->account_address_detail;
                //Address Details Forn Data
                $account_address_detail->contact_person = $this->contact_person;
                $account_address_detail->address = $this->address;
                $account_address_detail->city_id = $this->city_address_detail;
                $account_address_detail->pincode = $this->pincode_address_detail;
                $account_address_detail->area = $this->area_address_detail;
                $account_address_detail->state_id = $this->state_address_detail;
                $account_address_detail->category = $this->category;

                //Contant Details Forn Data
                $account_address_detail->mobile = $this->mobile_contact_detail;
                $account_address_detail->phone_no = $this->phone_no;
                $account_address_detail->phone_no_r = $this->phone_no_roaming;
                $account_address_detail->fax = $this->fax;
                $account_address_detail->factory_no = $this->factory_no;
                $account_address_detail->email = $this->email;
                $account_address_detail->website = $this->website;
                $account_address_detail->save();
            }

            if($this->account_bank_detail_form_show && $this->bankDetailFormSubmit) 
            {
                //Bank Details Forn Data
                $account_bank_detail = $this->account->account_bank_detail;
                $account_bank_detail->bank_name = $this->bank_name;
                $account_bank_detail->branch_name = $this->branch_name;
                $account_bank_detail->address = $this->bank_address;
                $account_bank_detail->ifsc_code = $this->ifsc_code;
                $account_bank_detail->account_no = $this->account_no;
                $account_bank_detail->save();
            }

            if($this->account_interest_form_show && $this->interestDetailFormSubmit)
            {
                //Account interest Forn Data
                $account_interest = $this->account->account_interest;
                $account_interest->interest = $this->interest;
                $account_interest->interest_ac = $this->interest_ac;
                $account_interest->tds_ac = $this->tds_ac;
                $account_interest->cr_db = $this->credit_debit;
                $account_interest->save();
            }
            $this->account->save();

            foreach ($this->bill_entries as $key => $bill_entry) {
                if ($bill_entry['id']) {
                    $accountBillToBill = AccountBillToBill::find($bill_entry['id']);
                    $accountBillToBill->adjustment_type = $bill_entry['bill_to_bill_adjustment_type'];
                    $accountBillToBill->date = $bill_entry['bill_to_bill_date'];
                    $accountBillToBill->particular = $bill_entry['bill_to_bill_particular'];
                    $accountBillToBill->credit_days = $bill_entry['bill_to_bill_credit_days'];
                    $accountBillToBill->amount = $bill_entry['bill_to_bill_amount'];
                    $accountBillToBill->adjusted_amt = $bill_entry['bill_to_bill_adjusted_amt'];
                    $accountBillToBill->balance_type = $bill_entry['bill_to_bill_balance_type'];
                    $accountBillToBill->save();
                } else {
                    AccountBillToBill::create([
                        'adjustment_type' => $bill_entry['bill_to_bill_adjustment_type'],
                        'date' => $bill_entry['bill_to_bill_date'],
                        'particular' => $bill_entry['bill_to_bill_particular'],
                        'credit_days' => $bill_entry['bill_to_bill_credit_days'],
                        'amount' => $bill_entry['bill_to_bill_amount'],
                        'adjusted_amt' => $bill_entry['bill_to_bill_adjusted_amt'],
                        'balance_type' => $bill_entry['bill_to_bill_balance_type'],
                        'account_id' => $this->account->id,
                        'company_id' => auth()->user()->company ? auth()->user()->company->id : null,
                    ]);
                }
            }

        } catch (\Exception $e) {
            toast('Something went wrong!', 'error');
            return redirect()->route('erp.master.account.index');
        } 

        toast('Account updated successfully!', 'success');
        if(isset($this->edit_type) && $this->edit_type == 'provisional_outstanding'){
            return redirect()->route('erp.consultant.provisional-outstanding.index');
        } elseif (isset($this->edit_type) && $this->edit_type == 'cash_book') {
            return redirect()->route('erp.report.account-book.cash-book.index');
        } elseif (isset($this->edit_type) && $this->edit_type == 'bank_book') {
            return redirect()->route('erp.report.account-book.bank-book.index');
        } elseif (isset($this->edit_type) && $this->edit_type == 'ledger') {
            return redirect()->route('erp.report.account-book.ledger.index');
        } elseif (isset($this->edit_type) && $this->edit_type == 'opening_balance') {
            return redirect()->route('erp.report.balance-sheet.trial-balance.opening-balance');
        }
        return redirect()->route('erp.master.account.index');
    }

    public function addressDetail() {
        if($this->account_address_detail_form_show) 
        {
            // $rules1 = [
            //     // Address details form rules
            //     'contact_person' => ['required'],
            //     'address' => ['required'],
            //     'city_address_detail' => ['required'],
            //     'pincode_address_detail' => ['required', 'numeric'],
            //     'area_address_detail' => ['required'],
            //     'state_address_detail' => ['required'],
            //     'category' => ['required'],
                
            //     // Contant details form rules
            //     'mobile_contact_detail' => ['required', 'numeric'],
            //     'phone_no' => ['required', 'numeric'],
            //     'phone_no_roaming' => ['required', 'numeric'],
            //     'fax' => ['required'],
            //     'factory_no' => ['required'],
            //     'email' => ['required', 'email'],
            //     'website' => ['required'],
            // ];
            // $this->validate($rules1);
            $this->f4AddressFormSubmit = true;
            $this->dispatchBrowserEvent('close-model');
        }   
    }

    public function bankDetail() {
        if($this->account_bank_detail_form_show) 
        {
            // $rules = [

            //     // Bank details form rules
            //     'bank_name' => ['required'],
            //     'branch_name' => ['required'],
            //     'bank_address' => ['required'],
            //     'ifsc_code' => ['required'],
            //     'account_no' => ['required', 'numeric'],
            // ];
            // $this->validate($rules);
            $this->bankDetailFormSubmit = true;
            $this->dispatchBrowserEvent('close-model');
        }   
    }

    public function interestDetail(){
        if($this->account_interest_form_show) 
        {
            // $rules = [
            //     // Account interest form rules
            //     'interest' => ['required', 'numeric'],
            //     'interest_ac' => ['required'],
            //     'tds_ac' => ['required'],
            //     'credit_debit' => ['required'],
            // ];
            // $this->validate($rules);
            $this->interestDetailFormSubmit = true;
            $this->dispatchBrowserEvent('close-model');
        }
    }

    public function addEntry()
    {
        $validator = Validator::make($this->all(),
            [
                'bill_to_bill_adjustment_type' => 'required',
                'bill_to_bill_date' => 'required',
                'bill_to_bill_particular' => 'required',
                'bill_to_bill_credit_days' => 'required',
                'bill_to_bill_amount' => 'required',
                'bill_to_bill_adjusted_amt' => 'required',
                'bill_to_bill_balance_type' => 'required'
            ],
            [
                'bill_to_bill_adjustment_type.required' => 'Select Adjustment Type',
                'bill_to_bill_date.required' => 'Enter Date',
                'bill_to_bill_particular.required' => 'Enter Particular',
                'bill_to_bill_credit_days.required' => 'Enter Credit Days',
                'bill_to_bill_amount.required' => 'Enter Amount',
                'bill_to_bill_adjusted_amt.required' => 'Enter Adjusted Amt',
                'bill_to_bill_balance_type.required' => 'Select CR/DB'
            ]);
        if ($validator->fails()) {
            $this->alert('error', $validator->errors()->first(), [
                'position' => 'center',
                'toast' => true
            ]);
        } else {
            $this->bill_entries[] = [
                'id' => null,
                'bill_to_bill_adjustment_type' => $this->bill_to_bill_adjustment_type,
                'bill_to_bill_date' => $this->bill_to_bill_date,
                'bill_to_bill_particular' => $this->bill_to_bill_particular,
                'bill_to_bill_credit_days' => $this->bill_to_bill_credit_days,
                'bill_to_bill_amount' => $this->bill_to_bill_amount,
                'bill_to_bill_adjusted_amt' => $this->bill_to_bill_adjusted_amt,
                'bill_to_bill_balance_type' => $this->bill_to_bill_balance_type,
            ];
            $this->reset('bill_to_bill_adjustment_type');
            $this->reset('bill_to_bill_date');
            $this->reset('bill_to_bill_particular');
            $this->reset('bill_to_bill_credit_days');
            $this->reset('bill_to_bill_amount');
            $this->reset('bill_to_bill_adjusted_amt');
            $this->reset('bill_to_bill_balance_type');
        }
        $this->dispatchBrowserEvent('entry_table');
    }

    public function updatedOpeningBalance()
    {
        $this->bill_to_bill_amount = $this->opening_balance;
    }

    public function updatedBalanceMethod()
    {
        if ($this->balance_method == 'BTB') {
            $this->account_bill_to_bill_form_show = true;                         
        } else {
            $this->account_bill_to_bill_form_show = false;
            unset($this->bill_entries);
        }
    }

    public function deleteEntry($key)
    {
        if ($this->bill_entries[$key]['id']) {
            $accountBillToBill = AccountBillToBill::find($this->bill_entries[$key]['id']);
            $accountBillToBill->delete();
        }
        unset($this->bill_entries[$key]);
        $this->dispatchBrowserEvent('entry_table');
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <form wire:submit.prevent="saveAccount">

                    <div class="row">
                        <div class="col-md-6 border">
                            {{-- General detail form --}}
                            <h4 class="card-title mb-1">General detail</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label"> Name </label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control form-control-sm form-control form-control-sm-sm"  placeholder="Enter account name" wire:model.defer="name" required>
                                    @error('name')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label"> Alias </label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control form-control-sm form-control form-control-sm-sm" placeholder="Enter account alias" wire:model.defer="alias">
                                    @error('alias')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row" wire:ignore>
                                <div class="col-md-4">
                                    <label class="form-label"> Account group </label>
                                </div>
                                <div class="col-md-8">
                                    <select wire:model='account_group' id="account_group" required>
                                        <option value="">Select parent group</option>
                                        @foreach ($accountGroups as $group)
                                            <option value="{{ $group->id }}"  {{ $account_group == $group->id ? 'selected' : '' }} wire:key="account_group-{{ $group->id }}">
                                                {{ $group->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('account_group')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                    <script>
                                        new TomSelect("#account_group", {
                                            create: false,
                                            sortField: {
                                                field: 'text',
                                                direction: 'asc'
                                            },
                                            plugins: ['remove_button']
                                        });
                                    </script>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-8">
                                        @error('account_group')
                                            <span class="text-danger small wow flash">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">Registration Type </label>
                                </div>
                                <div class="col-md-8 pb-2">
                                    <select wire:model.defer="registration_type" class="form-control form-control-sm form-control form-control-sm-sm" id="state"  {{$registration_type_disabled}}>
                                        <option value="" selected>Select</option>
                                        <option value="regular" selected>Regular</option>
                                        <option value="consumer" selected>Consumer</option>
                                        <option value="unregistered" selected>Unregistered</option>
                                        <option value="composition" selected>Composition</option>
                                    </select>
                                    @error('registration_type')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- General detail form end --}}
                        
                        </div>

                        <div class="col-md-6 border">
                            {{-- Party detail form --}}
                            <h4 class="card-title mb-1">Party detail</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">State </label>
                                </div>
                                <div class="col-md-8 pb-2">
                                    <select wire:model.defer="state" class="form-control form-control-sm form-control form-control-sm-sm" id="state"  {{$state_disabled}}>
                                        <option value="" selected>Select state</option>
                                        @foreach ($states as $state)
                                            <option value="{{ $state->id }}" wire:key="state-{{ $state->id }}">
                                            {{ $state->code }} || {{ $state->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('state')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label"> Mobile </label>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" class="form-control form-control-sm form-control form-control-sm-sm" placeholder="Enter mobile" wire:model.defer="mobile"  {{$mobile_disabled}}>
                                    @error('mobile')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row pb-2">
                                <div class="col-md-4">
                                    <label class="form-label"> City </label>
                                </div>
                                <div class="col-md-8">
                                    <select wire:model.defer="city" class="form-control form-control-sm form-control form-control-sm-sm" id="city"  {{$city_disabled}}>
                                        <option value="" selected>Select city</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}" wire:key="city-{{ $city->id }}">
                                                {{ $city->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('city')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label"> Pincode </label>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" class="form-control form-control-sm form-control form-control-sm-sm"  placeholder="Enter pincode" wire:model.defer="pincode" {{$pincode_disabled}}>
                                    @error('pincode')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label"> Area </label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control form-control-sm form-control form-control-sm-sm"   placeholder="Enter area" wire:model.defer="area" {{$area_disabled}}>
                                    @error('area')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Party detail form end --}}

                            {{-- ID proof form --}}
                            <hr class="bg-dark">
                            <h4 class="card-title mb-1">ID proof</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label"> Pan no </label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control form-control-sm form-control form-control-sm-sm"   placeholder="Enter pan no" wire:model.defer="pan_no" {{$pan_no_disabled}}>
                                    @error('pan_no')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label"> Aadhar no </label>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" class="form-control form-control-sm form-control form-control-sm-sm"   placeholder="Enter aadhar no" wire:model.defer="aadhar_no" {{$aadhar_no_disabled}}>
                                    @error('aadhar_no')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label"> GST no </label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control form-control-sm form-control form-control-sm-sm"   placeholder="Enter GST no" wire:model.defer="gstin_no" {{$gstin_no_disabled}}>
                                    @error('gstin_no')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- ID proof form end --}}

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 border">

                            {{-- Balance form --}}
                            <h4 class="card-title mb-1">Balance</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label"> Opening balance </label>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" class="form-control form-control-sm form-control form-control-sm-sm"  placeholder="Enter opening balance" wire:model.defer="opening_balance"  {{$opening_balance_disabled}}>
                                    @error('opening_balance')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label"> Balance type </label>
                                </div>
                                <div class="col-md-8">
                                    <select wire:model.defer="balance_type" class="form-control form-control-sm form-control form-control-sm-sm form-select" >
                                        @foreach ($balance_types as $balance_type)
                                            <option value="{{ $balance_type }}">
                                                {{ ucfirst($balance_type) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('balance_type')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label"> Balance method </label>
                                </div>
                                <div class="col-md-8">
                                    <select wire:model.defer="balance_method" class="form-control form-control-sm form-control form-control-sm-sm form-select" >
                                        @foreach ($balance_methods as $balance_method)
                                            <option value="{{ $balance_method }}">
                                                {{ $balance_method == "B.Only" ? "Balance Only" : $balance_method }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('balance_method')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Balance form end --}}

                            @if($account_address_detail_form_show)
                                {{-- add category modal --}}
                                <div class="modal fade" id="f4_address_detail" tabindex="-1" aria-hidden="true" wire:ignore.self>
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">F4 Address Details</h5>
                                                <a href="#" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></a>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6 border">
                                                        <h4 class="card-title mb-1">Address detail</h4>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label class="form-label"> Contact Person </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control form-control-sm form-control form-control-sm-sm" placeholder="Enter contact person" wire:model.defer="contact_person">
                                                                @error('contact_person')
                                                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label class="form-label"> Address </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control form-control-sm form-control form-control-sm-sm" placeholder="Enter address" wire:model.defer="address">
                                                                @error('address')
                                                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label class="form-label"> City </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <select wire:model.defer="city_address_detail" class="form-control form-control-sm form-control form-control-sm-sm" id="city_address_detail">
                                                                    <option value="">Select city</option>
                                                                    @foreach ($cities as $city)
                                                                        <option value="{{ $city->id }}" wire:key="city_address_detail-{{ $city->id }}">
                                                                            {{ $city->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                @error('city_address_detail')
                                                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label class="form-label"> Pincode </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="number" class="form-control form-control-sm form-control form-control-sm-sm" placeholder="Enter pincode" wire:model.defer="pincode_address_detail">
                                                                @error('pincode_address_detail')
                                                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label class="form-label"> Area </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control form-control-sm form-control form-control-sm-sm" placeholder="Enter area" wire:model.defer="area_address_detail">
                                                                @error('area_address_detail')
                                                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label class="form-label">State </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <select wire:model.defer="state_address_detail" class="form-control form-control-sm form-control form-control-sm-sm" id="state_address_detail">
                                                                    <option value="">Select state</option>
                                                                    @foreach ($states as $state)
                                                                        <option value="{{ $state->id }}" wire:key="state_address_detail-{{ $state->id }}">
                                                                        {{ $state->code }}  ||  {{ $state->name }}  
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                @error('state_address_detail')
                                                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label class="form-label"> Category </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control form-control-sm form-control form-control-sm-sm" placeholder="Enter category" wire:model.defer="category">
                                                                @error('category')
                                                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 border">
                                                        <h4 class="card-title mb-1">Contact detail</h4>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label class="form-label"> Mobile </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="number" class="form-control form-control-sm form-control form-control-sm-sm" placeholder="Enter mobile" wire:model.defer="mobile_contact_detail">
                                                                @error('mobile_contact_detail')
                                                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label class="form-label"> Phone No </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="number" class="form-control form-control-sm form-control form-control-sm-sm" placeholder="Enter phone number" wire:model.defer="phone_no">
                                                                @error('phone_no')
                                                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label class="form-label"> Phone(R) </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="number" class="form-control form-control-sm form-control form-control-sm-sm" placeholder="Enter phone roaming number" wire:model.defer="phone_no_roaming">
                                                                @error('phone_no_roaming')
                                                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label class="form-label"> Fax </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control form-control-sm form-control form-control-sm-sm" placeholder="Enter fax" wire:model.defer="fax">
                                                                @error('fax')
                                                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label class="form-label"> Factory No </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control form-control-sm form-control form-control-sm-sm" placeholder="Enter factory number" wire:model.defer="factory_no">
                                                                @error('factory_no')
                                                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label class="form-label"> E-Mail </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="email" class="form-control form-control-sm form-control form-control-sm-sm" placeholder="Enter email" wire:model.defer="email">
                                                                @error('email')
                                                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label class="form-label"> Website </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control form-control-sm form-control form-control-sm-sm" placeholder="Enter Website" wire:model.defer="website">
                                                                @error('website')
                                                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <label for="addressDetails" wire:click="addressDetail" class="btn btn-primary">Save</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if($account_interest_form_show)
                                {{-- Account interest form --}}
                                <div class="modal fade" id="account_interest_form_show" tabindex="-1" aria-hidden="true" wire:ignore.self>
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Account Interest</h5>
                                                <a href="#" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></a>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="form-label"> Interest % </label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="number" class="form-control form-control-sm form-control form-control-sm-sm" placeholder="Enter interest" wire:model.defer="interest">
                                                        @error('interest')
                                                            <span class="text-danger small wow flash">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="form-label"> Interest A/c. </label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <select wire:model.defer="interest_ac" class="form-control form-control-sm form-control form-control-sm-sm" id="interest_ac">
                                                            <option value="">Select Interest A/c</option>
                                                            @foreach (config('interest_ac') as $account)
                                                                <option value="{{$account}}">
                                                                    {{ $account }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('interest_ac')
                                                            <span class="text-danger small wow flash">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="form-label"> TDS A/c. </label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control form-control-sm form-control form-control-sm-sm" placeholder="Enter TDS A/c" wire:model.defer="tds_ac">
                                                        @error('tds_ac')
                                                            <span class="text-danger small wow flash">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="form-label"> CR / DB. </label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <select wire:model.defer="credit_debit" class="form-control form-control-sm form-control form-control-sm-sm form-select">
                                                            <option value="credit">Credit</option>
                                                            <option value="debit">Debit</option>
                                                        </select>
                                                        @error('credit_debit')
                                                            <span class="text-danger small wow flash">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <label for="addressDetails" wire:click="interestDetail" class="btn btn-primary">Save</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Account interest form end --}}
                            @endif
                        </div>

                        <div class="col-md-6 border">
                            {{-- Credit detail form --}}
                            <h4 class="card-title mb-1">Credit detail</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">Credit limit </label>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" class="form-control form-control-sm form-control form-control-sm-sm"  placeholder="Enter credit limit" wire:model.defer="credit_limit" {{$credit_limit_disabled}}>
                                    @error('credit_limit')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label"> Credit day </label>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" class="form-control form-control-sm form-control form-control-sm-sm"   placeholder="Enter credit day" wire:model.defer="credit_days" {{$credit_days_disabled}}>
                                    @error('credit_days')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Credit detail form end --}}
                            
                            {{-- Bank details --}}
                            @if($account_bank_detail_form_show)
                                <div class="modal fade" id="account_bank_detail_form_show" tabindex="-1" aria-hidden="true" wire:ignore.self>
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Bank Detail</h5>
                                                <a href="#" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></a>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="form-label"> Bank Name </label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control form-control-sm form-control form-control-sm-sm" placeholder="Enter bank name" wire:model.defer="bank_name">
                                                        @error('bank_name')
                                                            <span class="text-danger small wow flash">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="form-label"> Branch Name </label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control form-control-sm form-control form-control-sm-sm" placeholder="Enter branch name" wire:model.defer="branch_name">
                                                        @error('branch_name')
                                                            <span class="text-danger small wow flash">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="form-label"> Address </label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control form-control-sm form-control form-control-sm-sm" placeholder="Enter address" wire:model.defer="bank_address">
                                                        @error('bank_address')
                                                            <span class="text-danger small wow flash">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="form-label"> IFSC Code </label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control form-control-sm form-control form-control-sm-sm" placeholder="Enter IFSC Code" wire:model.defer="ifsc_code">
                                                        @error('ifsc_code')
                                                            <span class="text-danger small wow flash">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="form-label"> Account No. </label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="number" class="form-control form-control-sm form-control form-control-sm-sm" placeholder="Enter account number" wire:model.defer="account_no">
                                                        @error('account_no')
                                                            <span class="text-danger small wow flash">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <label for="addressDetails" wire:click="bankDetail" class="btn btn-primary">Save</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            {{-- Bank details end --}}
                        </div>
                    </div>
                    {{-- Bill To Bill form --}}
                    <div class="modal fade" id="bill_to_bill_form_show" tabindex="-1" aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div>
                                        <div>{{$name}}</div>
                                        <div>Adjustment Amount : {{$opening_balance}}</div>
                                    </div>
                                    <a href="#" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></a>
                                </div>
                                <div class="modal-body">
                                    <table class="table-responsive table table-bordered text-nowrap border-bottom entry_table">
                                        <thead>
                                             <tr>
                                                <th class="bg-primary text-white">Adj.type</th>
                                                <th class="bg-primary text-white">Date</th>
                                                <th class="bg-primary text-white">Particular</th>
                                                <th class="bg-primary text-white">Credit Days</th>
                                                <th class="bg-primary text-white">Amount</th>
                                                <th class="bg-primary text-white">Adjusted Amt</th>
                                                <th class="bg-primary text-white">CR/DB</th>
                                                <th class="bg-primary text-white">Action</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <select class="form-control form-control-sm form-select" wire:model.defer="bill_to_bill_adjustment_type">
                                                        <option value="">Select Account</option>
                                                        @foreach ($adjustment_types as $adjustment_type)
                                                            <option value="{{ $adjustment_type }}">
                                                                {{ $adjustment_type }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="date" class="form-control form-control-sm" wire:model.defer="bill_to_bill_date">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control form-control-sm" wire:model.defer="bill_to_bill_particular">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control form-control-sm" wire:model.defer="bill_to_bill_credit_days">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control form-control-sm" wire:model.defer="bill_to_bill_amount">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control form-control-sm" wire:model.defer="bill_to_bill_adjusted_amt">
                                                </td>
                                                <td>
                                                    <select class="form-control form-control-sm form-select" wire:model.defer="bill_to_bill_balance_type">
                                                        <option value="">Select Account</option>
                                                        @foreach ($balance_types as $balance_type)
                                                            <option value="{{ $balance_type }}">
                                                                {{ ucfirst($balance_type) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="button" class="btn btn-primary btn-sm" value="Add" wire:click="addEntry">
                                                </td>
                                            </tr>
                                            @foreach ($bill_entries as $key => $bill_entry)
                                                <tr>
                                                     <td>
                                                        @foreach ($adjustment_types as $adjustment_type)
                                                            {{$adjustment_type == $bill_entry['bill_to_bill_adjustment_type'] ? $adjustment_type : ''}}
                                                        @endforeach
                                                     </td>
                                                     <td>
                                                        {{$bill_entry['bill_to_bill_date']}}
                                                     </td>
                                                     <td>
                                                        {{$bill_entry['bill_to_bill_particular']}}
                                                     </td>
                                                     <td>
                                                        {{$bill_entry['bill_to_bill_credit_days']}}
                                                     </td>
                                                     <td>
                                                        {{$bill_entry['bill_to_bill_amount']}}
                                                     </td>
                                                     <td>
                                                        {{$bill_entry['bill_to_bill_adjusted_amt']}}
                                                     </td>
                                                     <td>
                                                        {{$bill_entry['bill_to_bill_balance_type']}}
                                                     </td>
                                                     <td>
                                                         <input type="button" class="btn btn-sm btn-outline-danger" value="Delete" wire:click=deleteEntry({{$key}})>
                                                     </td>
                                                </tr>
                                             @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <label for="addressDetails" wire:click="interestDetail" class="btn btn-primary">Save</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Bill To Bill form end --}}
                    <div class="col-auto ms-auto d-print-none d-flex pe-0 mt-3">
                        <div class="btn-list">
                            <button type="button" class="btn btn-primary btn-sm me-2 {{ $account_address_detail_form_show ? '' : 'd-none' }}" data-bs-toggle="modal" data-bs-target="#f4_address_detail">F4 Address Details</button>
                            <button type="button" class="btn btn-primary btn-sm me-2 {{ $account_bank_detail_form_show ? '' : 'd-none' }}" data-bs-toggle="modal" data-bs-target="#account_bank_detail_form_show">Bank Details</button>
                            <button type="button" class="btn btn-primary btn-sm me-2 {{ $account_interest_form_show ? '' : 'd-none' }}" data-bs-toggle="modal" data-bs-target="#account_interest_form_show">Interest</button>
                            <button type="button" class="btn btn-primary btn-sm me-2 {{ $account_bill_to_bill_form_show ? '' : 'd-none'}}" data-bs-toggle="modal" data-bs-target="#bill_to_bill_form_show">Bill To Bill</button>
                        </div>
                    </div>
                    <input type="submit" id="formSubmitBtn" class="d-none">
                </form>
                <script>
                    window.addEventListener('close-model', event => {
                        $("#f4_address_detail").modal("hide");
                        $("#account_bank_detail_form_show").modal("hide");
                        $("#account_interest_form_show").modal("hide");
                    });
                </script>
            </div>
        blade;
    }
}
