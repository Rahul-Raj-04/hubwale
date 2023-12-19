<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes;

    protected $fillable = [
        'company_number',
        'language',
        'company_name',
        'short_name',
        'group_name',
        'fin_year_from',
        'fin_year_to',
        'password',
        'report_header',
        'jurisdiction_city',
        'auto_gst',
        'business_type_id',

        //Statutory details
        'pan',
        'gstin',
        'aadhar',
        'tin',
        'cst',
        'tan',
        'ecc',
        'importer_ecc_no',
        'service_tax_no',
        'ssi_no',
        'generel_lic_no',
        'wholesale_agent_lic_no',
        'commission_lic_no',
        'drug_lic_no',
        'cin_no',
        'food_product_lic_no',

        //Address details
        'address',
        'country',
        'state',
        'city',
        'pincode',
        'phone_1',
        'phone_2',
        'mob_1',
        'mob_2',
        'fax',
        'email',
        'website',

        //Bank details
        'bank_name',
        'branch_name',
        'bank_address',
        'bank_ifsc',
        'bank_ac_no',
        'iban_no',
        'swift_code',
        'upi_code',
        'upi_id',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('logo')->singleFile();
        $this->addMediaCollection('pdf');
    }

    public function getLogoAttribute() {
        return $this->getFirstMediaUrl('logo');
    }

    public function pdfs()
    {
    
        return $this->hasMany(Pdf::class);
    }

    public function country()
    {
        return Country::find($this->country);
    }

    public function state()
    {
        return State::find($this->state);
    }

    public function city()
    {
        return City::find($this->city);
    }

    public function getFullAddressAttribute()
    {
        return trim($this->address).', '.trim($this->city()->name).', '.trim($this->state()->name).', '.trim($this->pincode);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    public function products()
    {
        return $this->hasMany(Products::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function account_group()
    {
        return $this->hasMany(AccountGroup::class);
    }

    public function ecommerce_products()
    {
        return $this->hasMany(EcommerceProduct::class, 'company_id', 'id');
    }
}
