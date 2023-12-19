<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ErpSetupExpenseDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'expense_detail_type', //['sales', 'purchase', 'credit-note', 'debit-note']
        'expense_detail_id', //its just string, not an relation
        'company_id',
        'account_id',
        'name',
        'type', //['expense', 'Central Tax', 'State/UT Tax', 'Integrated Tax']
        'serial_number',
        'calculation', //['fixed', 'itemwise', 'fixed-itemwise']
        'readonly',
        'ac_type', //['fixed', 'variable', 'sales_ac']
        'ac_effect', //['yes', 'no', 'separate']
        'add_deduct', //['add', 'deduct']
        'type_2', //['cumulative', 'fixed', 'percentage', 'surcharge', 'qty']
        'type_2_percentage',
        'invoice_type',
        'round_off',
        'status',
        'comment',
    ];

    protected static function boot(){
        parent::boot();
        // auto-sets values on creation
        static::creating(function ($query) {
            $query->expense_detail_id = $query->expense_detail_id ?? 'ED'.rand(111111,999999);
        });
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
