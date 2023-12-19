<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccountTransaction extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'account_id', // (Bank/Cash)
        'type', // (Receipt/Payment)
        'date',
        'voucher_no',
        'opposite_account_id',
        'amount',
        'payment_method',
        'reference_no',
        'transaction_date',
        'doc_no',
        'doc_date',
        'narration',
        'company_id',
        'module',
        'is_audit',
        'currency_id',
        'exchange_rate'
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function opposite_account()
    {
        return $this->belongsTo(Account::class);
    }
}
