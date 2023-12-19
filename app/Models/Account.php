<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
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
		'alias',
		'account_group_id',
		'city_id',
		'pincode',
		'area',
		'mobile',
		'state_id',
		'pan_no',
		'aadhar_no',
		'gstin_no',
		'balance_method',
		'opening_balance',
		'balance_type',
		'credit_limit',
		'credit_days',
		'account_address_detail_id',
		'account_bank_detail_id',
		'account_interest_id',
        'registration_type',
        'company_id',
        'is_default',
    ];

    public function account_group()
    {
        return $this->belongsTo(AccountGroup::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function account_address_detail()
    {
        return $this->belongsTo(AccountAddressDetails::class);
    }

    public function account_bank_detail()
    {
        return $this->belongsTo(AccountBankDetails::class);
    }

    public function account_interest()
    {
        return $this->belongsTo(AccountInterest::class);
    }

    public function gst_sales_setup()
    {
        return $this->hasOne(GstSalesSetup::class, 'sales_purchase_ac_id');
    }

    public function ldger_account_balance()
    {
        return $this->hasOne(LedgerAccountBalance::class, 'account_id');
    }

    public function ledger_account_balance()
    {
        return $this->hasMany(LedgerAccountBalance::class, 'account_id');
    }

    public function account_transaction()
    {
        return $this->hasMany(AccountTransaction::class, 'account_id');
    }
}
