<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalePurchaseTax extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sale_purchase_taxes';
    
    protected $fillable = [
        'sale_account_id',
        'discount',
        'freight',
        'central_tax',
        'state_ut_tax',
        'round_off',
        'sale_entry_id',
        'purchase_entry_id',
        'erp_product_id',
        'entry_type'
    ];
}
