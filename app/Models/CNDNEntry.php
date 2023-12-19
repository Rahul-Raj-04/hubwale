<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CNDNEntry extends Model
{
    use HasFactory,SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'c_n_d_n_entries';

	protected $fillable = [
	    'balance_type',
		'party_account_id',
		'invoice_type',
		'effect',
		'tax_bill_of_supply',
		'reason',
		'vou_date',
		'voucher_no',
		'doc_no',
		'doc_date',
		'original_bill_no',
		'original_bill_date',
		'sales_purchase_ac_id',
		'gst_commodity_id',
		'assess_amt',
		'narration',

		'currency_master_id',
		'stock_effect',
		'service_id',
		'qty',
		'rate',
		'amount',

		'company_id',
		'model_name',
		'is_audit',
		'group_id'
	];

    public function party_account()
    {
        return $this->belongsTo(Account::class);
    }
    
    public function sales_purchase_ac()
    {
        return $this->belongsTo(Account::class);
    }

    public function gst_commodity()
    {
        return $this->belongsTo(GstCommodity::class);
    }

    public function currency_master()
    {
        return $this->belongsTo(CurrencyMaster::class);
    }
}
