<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ECommerceCart extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'product_id',
        'product_variation_id',
        'packaging_type',
        'quantity'
    ];

    public function product()
    {
        return $this->belongsTo(ECommerceProduct::class);
    }

    public function product_variation()
    {
        return $this->belongsTo(ECommerceProductVariation::class);
    }

    /**
     * get amount with taxes
    */
    public function getTotalAmountAttribute()
    {
        if ($this->packaging_type == 'box') {
            $amount = ((int) $this->product_variation->box_price * (int) $this->quantity);
        } else {
            $amount = ((int) $this->product_variation->piece_price * (int) $this->quantity);
        }
        if ($this->product->tax) {
            return $amount + ($amount * ( (int) $this->product->tax->tax/100));
        }
        return $amount;
    }

    /**
     * get amount without taxes
    */
    public function getTotalAmountWithoutTaxAttribute()
    {
        if ($this->packaging_type == 'box') {
            return ((int) $this->product_variation->box_price * (int) $this->quantity);
        } else {
            return ((int) $this->product_variation->piece_price * (int) $this->quantity);
        }
    }

    public function getTaxAttribute()
    {
        if ($this->product->tax) {
            if ($this->packaging_type == 'box') {
                $amount = ((int) $this->product_variation->box_price * (int) $this->quantity);
            } else {
                $amount = ((int) $this->product_variation->piece_price * (int) $this->quantity);
            }
            return $amount * ( (int) $this->product->tax->tax/100);
        }
        return 0;
    }
}
