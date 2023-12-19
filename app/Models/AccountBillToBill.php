<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccountBillToBill extends Model
{
    use HasFactory,SoftDeletes;

        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'account_bill_to_bills';

	protected $fillable = [
    	'adjustment_type',
		'date',
		'particular',
		'credit_days',
		'amount',
		'adjusted_amt',
		'balance_type',
		'account_id',
		'company_id',
	];
}
