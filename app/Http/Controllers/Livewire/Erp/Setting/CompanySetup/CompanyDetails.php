<?php

namespace App\Http\Controllers\Livewire\Erp\Setting\CompanySetup;

use Livewire\Component;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Http\Traits\LocationTrait;
use App\Models\User;
use App\Models\Company;

class CompanyDetails extends Component
{
    use LivewireAlert;
    use LocationTrait;
    use WithFileUploads;

    public $user;

    public $security_type = false;

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

    public function mount()
    {
        $company = Company::find(auth()->user()->company->id);

        $this->company_number = $company->company_number;
        $this->language = $company->language;
        $this->company_name = $company->company_name;
        $this->short_name = $company->short_name;
        $this->group_name = $company->group_name;
        $this->fin_year_from = $company->fin_year_from;
        $this->fin_year_to = $company->fin_year_to;
        $this->password = $company->password;
        $this->report_header = $company->report_header;
        $this->jurisdiction_city = $company->jurisdiction_city;
        $this->auto_gst = $company->auto_gst ? true : false;
    }

    public function render()
    {
        return view('livewire.erp.setting.company-setup.company-details')->extends('erp.app');
    }

    public function submit()
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

        Company::find(auth()->user()->company->id)->update([
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
        ]);
        
        if ($this->logo) {
            $company = Company::find(auth()->user()->company->id);
            $company->addMedia($this->logo)->toMediaCollection('logo');
        }

        toast('Company details changed successfully!', 'success');

        return redirect()->route('erp.setting.home');
    }

    public function updatedLogo()
    {
        $this->validate([
            'logo' => 'image|max:1024'
        ]);
    }
}
