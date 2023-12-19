<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ECommerceOrder extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'user_id',
        'name',
        'street_address',
        'city',
        'state',
        'country',
        'pincode',
        'remarks',
        'payment_method', //cash, online
        'payment_status_id',
        'order_status_id'
    ];

    public function items()
    {
        return $this->hasMany(ECommerceOrderItem::class, 'order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(User::class, 'company_id');
    }

    public function payment_status()
    {
        return $this->belongsTo(ECommerceStatus::class);
    }

    public function order_status()
    {
        return $this->belongsTo(ECommerceStatus::class);
    }

    public function GetTotalAmountAttribute()
    {
        return $this->items->sum('total_amount');
    }
}
