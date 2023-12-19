<?php

namespace App\Http\Controllers\Livewire\Common\Company;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Models\Company;
use App\Models\BusinessType;
use App\Http\Traits\LocationTrait;
use App\Http\Traits\CompanySetupTrait;

class CompanySetup extends Component
{
    use WithFileUploads, LocationTrait, CompanySetupTrait;

	public $company_name;
	public $logo;

	public $countries = [];
    public $states = [];
    public $cities = [];
    public $business_types = [];

	// address
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
    public $business_type;

    public function render()
    {
        return view('livewire.common.company.company-setup')->extends('livewire.auth.app');
    }

     public function mount()
    {
        $this->countries = $this->fetchAllCountries();
        $this->states = $this->fetchStatesByCountryId($this->country);
        $this->business_types = BusinessType::all();
    }

    public function updatedCountry()
    {
        $this->cities = $this->fetchCitiesByStateId(null);
        $this->states = $this->fetchStatesByCountryId($this->country);
        $this->state = 0;
    }

    public function submit()
    {
    	$this->validate([
            'company_name' => ['required'],
            'address' => ['required'],
            'country' => ['required', 'exists:countries,id'],
            'state' => ['required', 'exists:states,id'],
            'city' => ['required', 'exists:cities,id'],
            'pincode' => ['required', 'numeric', 'digits:6'],
            'email' => ['required','email'],
            "phone_1" => ['required'],
            "logo" => ['required', 'image','mimes:jpg,jpeg,png', 'max:1024'],
            "business_type" => ['required'],
        ]);

        $company = Company::create([
            "company_name" => $this->company_name,
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
            "business_type_id" => $this->business_type
        ]);
        $user = User::find(auth()->user()->id);
        $user->company_id = $company->id;
        $user->save();
        $this->companySetup($company->id);
        $company->addMedia($this->logo)->toMediaCollection('logo');
        redirect()->route('main.dashboard');
    }

    public function updatedState()
    {
        $this->cities = $this->fetchCitiesByStateId($this->state);
        $this->city = 0;
    }

    public function updatedLogo()
    {
        $this->validate([
            "logo" => ['required', 'image','mimes:jpg,jpeg,png', 'max:1024']
        ]);
    }
}
