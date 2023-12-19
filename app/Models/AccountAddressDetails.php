<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccountAddressDetails extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'contact_person',
        'address',
        'city_id',
        'pincode',
        'area',
        'state_id',
        'category',
        'mobile',
        'phone_no',
        'phone_no_r',
        'fax',
        'factory_no',
        'email',
        'website',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function account()
    {
        return $this->hasOne(Account::class, 'account_address_detail_id');
    }
}
