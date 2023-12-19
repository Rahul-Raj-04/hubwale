<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccountGroup extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
    	'id',
		'name',
		'parent_id',
		'header',
		'sequence',
		'is_default',
		'category',
        'city_id',
        'city_id_default',
        'pincode',
        'pincode_default',
        'area',
        'area_default',
        'mobile',
        'mobile_default',
        'state_id',
        'state_id_default',
        'pan_no',
        'pan_no_default',
        'aadhar_no',
        'aadhar_no_default',
        'gstin_no',
        'gstin_no_default',
        'balance_method',
        'balance_method_default',
        'opening_balance',
        'opening_balance_default',
        'balance_type',
        'balance_type_default',
        'credit_limit',
        'credit_limit_default',
        'credit_days',
        'credit_days_default',
        'account_address_details',
        'account_bank_details',
        'account_interest',
        'registration_type',
        'company_id'
    ];

    public function getParentGroupAttribute()
    {
       return AccountGroup::find($this->parent_id);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function accounts()
    {
        return $this->hasMany(Account::class, 'account_group_id');
    }

    public function parent()
    {
        return $this->belongsTo(AccountGroup::class,"parent_id","id");
    }
}