<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ForexAdjustment extends Model
{
use HasFactory,SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'forex_adjustments';

	protected $fillable = [
		'vou_type',
		'vou_date',
		'vou_no',
		'doc_no',
		'doc_date',
		'balance_type',
		'account_id',
		'debit',
		'credit',
		'narration',
		'company_id',
		'is_audit',
		'group_id'
	];

	public function account()
    {
        return $this->belongsTo(Account::class);
    }

}
