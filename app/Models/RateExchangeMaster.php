<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RateExchangeMaster extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rate_exchange_masters';

	protected $fillable = [
	    'currency_master_id',
		'date',
		'standard_rate',
		'selling_rate',
		'buyung_rate',
		'company_id'
	];

	public function currency_master()
    {
        return $this->belongsTo(CurrencyMaster::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
