<?php

namespace App\Http\Controllers\Livewire\Erp\Setting\CompanySetup;

use Livewire\Component;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Http\Traits\LocationTrait;
use App\Models\User;
use App\Models\Company;

class StatutoryDetails extends Component
{
    use LivewireAlert;

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

    public function mount()
    {   
        $company = Company::find(auth()->user()->company->id);

        $this->pan = $company->pan;
        $this->gstin = $company->gstin;
        $this->aadhar = $company->aadhar;
        $this->tin = $company->tin;
        $this->cst = $company->cst;
        $this->tan = $company->tan;
        $this->ecc = $company->ecc;
        $this->importer_ecc_no = $company->importer_ecc_no;
        $this->service_tax_no = $company->service_tax_no;
        $this->ssi_no = $company->ssi_no;
        $this->generel_lic_no = $company->generel_lic_no;
        $this->wholesale_agent_lic_no = $company->wholesale_agent_lic_no;
        $this->commission_lic_no = $company->commission_lic_no;
        $this->drug_lic_no = $company->drug_lic_no;
        $this->cin_no = $company->cin_no;
        $this->food_product_lic_no = $company->food_product_lic_no;
    }

    public function render()
    {
        return view('livewire.erp.setting.company-setup.statutory-details')->extends('erp.app');
    }

    public function submit()
    {
        $company = Company::find(auth()->user()->company->id)->update([
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
        ]);

        toast('Statutory details changed successfully!', 'success');

        return redirect()->route('erp.setting.home');
    }
}
