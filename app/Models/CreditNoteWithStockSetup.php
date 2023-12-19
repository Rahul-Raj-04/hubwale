<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreditNoteWithStockSetup extends Model
{
    use HasFactory,SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'credit_note_with_stock_setups';

	protected $fillable = [
	    'type',
		'gst_commodity_id',
		'sales_purchase_ac_id',
		'company_id',
        'invoice_type'
	];

    public function gst_commodity()
    {
        return $this->belongsTo(GstCommodity::class);
    }
    
    public function sales_purchase_ac()
    {
        return $this->belongsTo(Account::class);
    }
}
