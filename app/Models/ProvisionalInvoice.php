<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProvisionalInvoice extends Model
{
    use HasFactory, SoftDeletes;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'provisional_invoices';

    protected $fillable = [
        'id',
        'company_id',
        'account_id',
        'particulars',
        'invoice_type',
        'bill_no',
        'bill_date',
        'amount',
        'c_d',
        'narration',
        'is_audit'
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
