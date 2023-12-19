<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CurrencyMaster extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'currency_masters';

	protected $fillable = [
	    'symbol',
		'gc_code',
		'country_id',
		'integer',
		'fraction',
		'company_id'
	];

	public function company()
    {
        return $this->belongsTo(Company::class);
    }

   	public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
