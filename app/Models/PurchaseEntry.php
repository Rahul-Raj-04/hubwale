<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseEntry extends Model
{
    use HasFactory, SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'party_ac_id',
        'purc_ac_id',
        'erp_product_id',
        'group_id',
        'company_id',
        'type',
        'cash_debit',
        'invoice_type_id',
        'vou_no',
        'vou_date',
        'bill_no',
        'bill_date',
        'cheque_no',
        'cheque_date',
        'original_bill_no',
        'original_bill_date',
        'date',
        'doc_date',
        'party_name',
        'balance',
        'pending',
        'qty',
        'rate',
        'amount',
        'narration',
        'tax_bill_of_supply',
    ];

    public function party_ac()
    {
        return $this->belongsTo(Account::class);
    }
    
    public function invoice_type()
    {
        return $this->belongsTo(ErpSetupInvoiceType::class);
    }

    public function erp_product()
    {
        return $this->belongsTo(ErpProduct::class);
    }
}
