<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GstEntry extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'gst_entries';

	protected $fillable = [
		'account_id',
		'date',
		'utilization_type',
		'vou_no',
		'period',
		'chq_dd_date',
		'chq_dd_no',
		'challan_date',
		'challan_no',
		'tax',
		'interest',
		'penalty',
		'fees',
		'other',
		'total',
		'amount',
		'narration',
		'gst_entry_type',
		'company_id'
	];
 
    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
