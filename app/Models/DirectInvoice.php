<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DirectInvoice extends Model
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
        'sale_account_id',
        'service_id',
        'amount',
        'c_d',
        'invoice_type',
        'tax_retail',
        'bill_no',
        'bill_date',
        'doc_no',
        'doc_date',
        'narration',
        'currency',
        'forex_bill_amount',
        'is_audit'
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
