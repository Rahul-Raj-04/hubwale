<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobworkIn extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'company_id',
        'account_id',
        'product_name',
        'type',
        'r_i',
        'qty',
        'jobwork_rate',
        'jobwork_amount',
        'rate',
        'amount',
        'jobwork_ac_id',
        'module',
        'order_no',
        'order_date',
        'doc_no',
        'doc_date',
        'challan_no',
        'challan_date',
        'voucher_no',
        'voucher_date',
        'bill_no',
        'bill_date',
        'tax_bill_supply',  //(tax_invoice, bill_of_supply, other),
        'invoice_type',
        'batch_name',
        'nature_proccessing',
        'narration',
        'pend_qty',
        'closing_qty',
        'difference_qty',
        'group_id',
        'is_audit'
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
