<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddressBook extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
		'contact_person',
		'address',
		'city_id',
		'state_id',
		'pincode',
		'area',
		'address_category_id',
		'phone_1_o',
		'phone_1_r',
		'phone_2_o',
		'phone_2_r',
		'phone_f',
		'fax_1',
		'mobile_1',
		'mobile_2',
		'email',
		'website',
		'company_id'
    ];

    public function addressCategory()
    {
        return $this->belongsTo(AddressCategory::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
