<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ErpSetupInvoiceType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'invoice_type', //sales, purchase, credit-note, debit-note
        'invoice_type_id', //its just string, not an relation
        'name',
        'type', // Types are comes from App/Enum/Enum::MASTER_GST_INVOICE_TYPE
        'gst_type', //Item wise, Voucher wise
        'export_type', //['UT-1', 'Bond', 'CT-1', 'CT-2', 'CT-3', 'Exp-0%']
        'is_capital_goods',
        'is_party_allowed',
        'is_place_of_supply',
        'status', //enable-disable
        'comment'
    ];

    protected static function boot(){
        parent::boot();
        // auto-sets values on creation
        static::creating(function ($query) {
            $query->invoice_type_id = $query->invoice_type_id ?? 'CID'.rand(111111,999999);
        });
    }
}
