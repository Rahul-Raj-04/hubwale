<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GstJournalEntry extends Model
{
	use HasFactory,SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'gst_journal_entries';

	protected $fillable = [
	    'vou_type',
		'type',
		'sub_type',
		'reference_no',
		'vou_date',
		'vou_no',
		'doc_no',
		'doc_date',
		'balance_type',
		'account_id',
		'entry_type',
		'gst_commodity_id',
		'assess_amt',
		'currency_id',
		'exchange_rate',
		'debit',
		'credit',
		'narration',
		'company_id',
	];

    public function gst_commodity()
    {
        return $this->belongsTo(GstCommodity::class);
    }
    
    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function currency()
    {
        return $this->belongsTo(CurrencyMaster::class, 'currency_id', 'id');
    }
}
