<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UtilizationEntry extends Model
{
    use HasFactory,SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'utilization_entries';

	protected $fillable = [
	    'vou_type',
        'period_of_utilization',
        'utilization_type',
        'vou_date',
        'vou_no',
        'doc_no',
        'doc_date',
        'utilization_from',
        'from_account_id',
        'utilization_for',
        'for_account_id',
        'amount',
        'narration',
        'company_id'
	];
    
    public function from_account()
    {
        return $this->belongsTo(Account::class, 'from_account_id', 'id');
    }

    public function for_account()
    {
        return $this->belongsTo(Account::class, 'for_account_id', 'id');
    }
}
