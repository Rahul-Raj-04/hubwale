<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ECommerceOrderItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'order_id',
        'product_id',
        'variation_id',
        'packaging_type',
        'quantity',
        'price',
        'discount',
        'tax', // in percentage
        'payment_status_id',
        'order_status_id'
    ];

    public function order()
    {
        return $this->belongsTo(ECommerceOrder::class);
    }

    public function product()
    {
        return $this->belongsTo(ECommerceProduct::class, 'product_id', 'id');
    }

    public function variation()
    {
        return $this->belongsTo(ECommerceProductVariation::class, 'variation_id', 'id');
    }

    public function payment_status()
    {
        return $this->belongsTo(ECommerceStatus::class);
    }

    public function order_status()
    {
        return $this->belongsTo(ECommerceStatus::class);
    }

    public function getTotalAmountAttribute()
    {
        if ($this->packaging_type == 'box') {
            $amount = ((int) $this->variation->box_price * (int) $this->quantity);
        } else {
            $amount = ((int) $this->variation->piece_price * (int) $this->quantity);
        }
        info($amount);
        $discountedAmount = ($amount - (int) $this->discount);
        if ($this->product->tax) {
            return $discountedAmount + ($discountedAmount * ( (int) $this->product->tax->tax/100));
        }
        return $discountedAmount;
    }

    public function getTaxAttribute()
    {
        if ($this->packaging_type == 'box') {
            $amount = ((int) $this->variation->box_price * (int) $this->quantity);
        } else {
            $amount = ((int) $this->variation->piece_price * (int) $this->quantity);
        }
        $discountedAmount = ($amount - (int) $this->discount);
        if ($this->product->tax) {
            return ($discountedAmount * ( (int) $this->product->tax->tax/100));
        }
        return 0;
    }
}
