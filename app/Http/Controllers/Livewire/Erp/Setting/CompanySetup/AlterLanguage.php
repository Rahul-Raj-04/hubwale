<?php

namespace App\Http\Controllers\Livewire\Erp\Setting\CompanySetup;

use Livewire\Component;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Http\Traits\LocationTrait;
use App\Models\User;
use App\Models\Company;

class AlterLanguage extends Component
{
    use LivewireAlert;
    use LocationTrait;
    use WithFileUploads;

    public $currentStep = 1;
    public $user;

    public $security_type = false;

    public $countries = [];
    public $states = [];
    public $cities = [];

    //Company details
    public $logo;
    public $company_number;
    public $language;
    public $company_name;
    public $short_name;
    public $group_name;
    public $fin_year_from;
    public $fin_year_to;
    public $password;
    public $report_header;
    public $jurisdiction_city;
    public $auto_gst;

    //Statutory details
    public $pan;
    public $gstin;
    public $aadhar;
    public $tin;
    public $cst;
    public $tan;
    public $ecc;
    public $importer_ecc_no;
    public $service_tax_no;
    public $ssi_no;
    public $generel_lic_no;
    public $wholesale_agent_lic_no;
    public $commission_lic_no;
    public $drug_lic_no;
    public $cin_no;
    public $food_product_lic_no;

    //Address details
    public $address;
    public $country;
    public $state;
    public $city;
    public $pincode;
    public $phone_1;
    public $phone_2;
    public $mob_1;
    public $mob_2;
    public $fax;
    public $email;
    public $website;

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

    public function render()
    {
        return view('livewire.erp.setting.company-setup.alter-language')->extends('welcome.app');
    }

    public function mount()
    {
        $this->fin_year_from = null ?? "01/04/2022"; //bug [need to fix]
        $this->fin_year_to = null ?? "31/03/2023"; //bug [need to fix]
        $this->country = 1;

        $this->countries = $this->fetchAllCountries();
        $this->states = $this->fetchStatesByCountryId($this->country);

    }

    public function firstStep()
    {
        $validate = [
            'company_number' => ['required','numeric', 'min:1', 'unique:companies'],
            'company_name' => ['required'],
            'fin_year_from' => ['required', 'date_format:d/m/Y'],
            'fin_year_to' => ['required', 'date_format:d/m/Y']
        ];
        if ($this->security_type) {
            $validate['password'] = ['required'];
        }
        $this->validate($validate);

        $this->currentStep = 2;
    }

    public function secondStep()
    {
        $this->currentStep = 3;
    }

    public function thirdStep()
    {
        $this->validate([
            'address' => ['required'],
            'country' => ['required', 'exists:countries,id'],
            'state' => ['required', 'exists:states,id'],
            'city' => ['required', 'exists:cities,id'],
            'pincode' => ['required', 'numeric', 'digits:6'],
            'email' => ['nullable','email']
        ]);
        $this->currentStep = 4;
    }

    public function submit()
    {
        $company = Company::create([
            "company_number" => $this->company_number,
            "language" => $this->language,
            "company_name" => $this->company_name,
            "short_name" => $this->short_name,
            "group_name" => $this->group_name,
            "fin_year_from" => $this->fin_year_from,
            "fin_year_to" => $this->fin_year_to,
            "password" => $this->password,
            "report_header" => $this->report_header,
            "jurisdiction_city" => $this->jurisdiction_city,
            "auto_gst" => $this->auto_gst,
            "pan" => $this->pan,
            "gstin" => $this->gstin,
            "aadhar" => $this->aadhar,
            "tin" => $this->tin,
            "cst" => $this->cst,
            "tan" => $this->tan,
            "ecc" => $this->ecc,
            "importer_ecc_no" => $this->importer_ecc_no,
            "service_tax_no" => $this->service_tax_no,
            "ssi_no" => $this->ssi_no,
            "generel_lic_no" => $this->generel_lic_no,
            "wholesale_agent_lic_no" => $this->wholesale_agent_lic_no,
            "commission_lic_no" => $this->commission_lic_no,
            "drug_lic_no" => $this->drug_lic_no,
            "cin_no" => $this->cin_no,
            "food_product_lic_no" => $this->food_product_lic_no,
            "address" => $this->address,
            "country" => $this->country,
            "state" => $this->state,
            "city" => $this->city,
            "pincode" => $this->pincode,
            "phone_1" => $this->phone_1,
            "phone_2" => $this->phone_2,
            "mob_1" => $this->mob_1,
            "mob_2" => $this->mob_2,
            "fax" => $this->fax,
            "email" => $this->email,
            "website" => $this->website,
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
        $user = User::find(auth()->user()->id);
        $user->company_id = $company->id;
        $user->save();
        $company->addMedia($this->logo)->toMediaCollection('logo');
        redirect()->route('main.dashboard');
    }

    public function nextStep()
    {
        if ($this->currentStep == 1) {
            $this->firstStep();
        } else if ($this->currentStep == 2) {
            $this->secondStep();
        } else if ($this->currentStep == 3) {
            $this->thirdStep();
        } else if ($this->currentStep == 4) {
            $this->submit();
        }
    }

    public function previousStep()
    {
        if ($this->currentStep !== 1 ) {
            --$this->currentStep;
        }
    }

    public function updatedState()
    {
        $this->cities = $this->fetchCitiesByStateId($this->state);
    }

    public function updatedLogo()
    {
        $this->validate([
            'logo' => 'image|max:1024'
        ]);
    }
}
