<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RCMVoucher extends Model
{
	use HasFactory,SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'r_c_m_vouchers';

	protected $fillable = [
	    'account_id',
		'date',
		'vou_no',
		'gst_type',
		'gst_commodity_id',
		'i_t_c',
		'opposite_account_id',
		'amount',
		'chq_dd_no',
		'chq_dd_date',
		'doc_no',
		'doc_date',
		'narration',
		'vou_type',
		'currency_id',
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

    public function opposite_account()
    {
        return $this->belongsTo(Account::class, 'opposite_account_id', 'id');
    }

    public function currency()
    {
        return $this->belongsTo(CurrencyMaster::class, 'currency_id', 'id');
    }
}
