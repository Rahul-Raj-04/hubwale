<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GstExpense extends Model
{
	use HasFactory,SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'gst_expenses';

	protected $fillable = [
		'party_account_id',
		'type',
		'vou_date',
		'vou_no',
		'bill_no',
		'bill_date',
		'expense_account_id',
		'gst_commodity_id',
		'assess_amt',
		'central_tax',
		'state_tax',
		'integrated_tax',
		'total_amount',
		'narration',
		'company_id'
	];

    public function gst_commodity()
    {
        return $this->belongsTo(GstCommodity::class);
    }
    
    public function expense_account()
    {
        return $this->belongsTo(Account::class, 'expense_account_id', 'id');
    }

    public function party_account()
    {
        return $this->belongsTo(Account::class, 'party_account_id', 'id');
    }
}
