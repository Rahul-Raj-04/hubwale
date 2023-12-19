<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CashBankReceipt extends Model
{
	use HasFactory,SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cash_bank_receipts';

	protected $fillable = [
	    'account_id',
		'type',
		'date',
		'vou_no',
		'opposite_account_id',
		'amount',
		'chq_dd_no',
		'chq_dd_date',
		'doc_no',
		'doc_date',
		'currency_id',
		'narration',
		'receipt_type',
		'company_id',
	];
    
    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function currency()
    {
        return $this->belongsTo(CurrencyMaster::class, 'currency_id', 'id');
    }

    public function opposite_account()
    {
        return $this->belongsTo(Account::class, 'opposite_account_id', 'id');
    }
}
