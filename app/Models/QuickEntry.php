<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuickEntry extends Model
{
    use HasFactory,SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'quick_entries';

	protected $fillable = [
	    'main_account_id',
		'type',
		'vou_type',
		'date',
		'day',
		'vou_no',
		'doc_no',
		'account_id',
		'currency_id',
		'exchange_rate',
		'amount',
		'narration',
		'balance_type',
		'module_name',
		'company_id',
		'is_audit'
	];

	public function currency()
    {
        return $this->belongsTo(CurrencyMaster::class, 'currency_id', 'id');
    }

    public function main_account()
    {
        return $this->belongsTo(Account::class, 'main_account_id', 'id');
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
