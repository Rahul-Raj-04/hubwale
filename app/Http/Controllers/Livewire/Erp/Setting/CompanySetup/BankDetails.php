<?php

namespace App\Http\Controllers\Livewire\Erp\Setting\CompanySetup;

use Livewire\Component;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Http\Traits\LocationTrait;
use App\Models\User;
use App\Models\Company;

class BankDetails extends Component
{
    use LivewireAlert;

    //Bank details
    public $bank_name;
    public $branch_name;
    public $bank_address;
    public $bank_ifsc;
    public $bank_ac_no;
    public $iban_no;
    public $swift_code;
    public $upi_code;
    public $upi_id;

    public function mount()
    {   
        $company = Company::find(auth()->user()->company->id);

        $this->bank_name = $company->bank_name;
        $this->branch_name = $company->branch_name;
        $this->bank_address = $company->bank_address;
        $this->bank_ifsc = $company->bank_ifsc;
        $this->bank_ac_no = $company->bank_ac_no;
        $this->iban_no = $company->iban_no;
        $this->swift_code = $company->swift_code;
        $this->upi_code = $company->upi_code;
        $this->upi_id = $company->upi_id;
    }

    public function render()
    {
        return view('livewire.erp.setting.company-setup.bank-details')->extends('erp.app');
    }

    public function submit()
    {
        $company = Company::find(auth()->user()->company->id)->update([
            "bank_name" => $this->bank_name,
            "branch_name" => $this->branch_name,
            "bank_address" => $this->bank_address,
            "bank_ifsc" => $this->bank_ifsc,
            "bank_ac_no" => $this->bank_ac_no,
            "iban_no" => $this->iban_no,
            "swift_code" => $this->swift_code,
            "upi_code" => $this->upi_code,
            "upi_id" => $this->upi_id,
        ]);

        toast('Bank details changed successfully!', 'success');

        return redirect()->route('erp.setting.home');
    }
}
