<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ECommerceProductVariation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'product_id',
        'size_id',
        'packaging_type', //['box', 'piece', 'both']
        'piece_per_box',
        'box_price',
        'piece_price',
    ];

    public function product()
    {
        return $this->belongsTo(ECommerceProduct::class);
    }

    public function size()
    {
        return $this->belongsTo(ECommerceSize::class);
    }
}
