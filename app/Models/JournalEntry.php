<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JournalEntry extends Model
{
    use HasFactory,SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'journal_entries';

	protected $fillable = [
		'vou_type',
		'tax_type',
		'vou_date',
		'vou_no',
		'chq_dd_no',
		'chq_dd_date',
		'balance_type',
		'account_id',
		'chq_no',
		'chq_date',
		'currency_id',
		'exchange_rate',
		'debit',
		'credit',
		'narration',

		'doc_no',
		'doc_date',
		'company_id',
		'is_audit',
		'group_id'
	];

	public function currency()
    {
        return $this->belongsTo(CurrencyMaster::class, 'currency_id', 'id');
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

}
