<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ErpProduct extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'alias',
        'garment_product',
        'gst_commodity_id',
        'vat_commodity_id',
        'commodity_for_less',
        'commodity_for_greater',
        'group_id',
        'category_id',
        'stock_required',
        'pricelist',
        'tcs',
        'purchase_rate',
        'sales_rate',
        'tax_paid_rate',
        'sales_unit_id',
        'purchase_unit_id',
        'gst_unit',
        'quantity',
        'amount',
        'minimum_stock',
        'reorder_level',
        'auto_production',
        'process_name',
        'sales_conversion_factor',
        'parchase_conversion_factor',
        'stock_conversion_factor',
        'closing_stock_account',
        'trending_account',
        'company_id'
    ];

    public function gst_commodity()
    {
        return $this->belongsTo(GstCommodity::class);
    }

    public function vat_commodity()
    {
        return $this->belongsTo(GstCommodity::class, 'vat_commodity_id', 'id');
    }

    public function commodity_for_less()
    {
        return $this->belongsTo(GstCommodity::class, 'commodity_for_less', 'id');
    }

    public function commodity_for_greater()
    {
        return $this->belongsTo(GstCommodity::class, 'commodity_for_greater', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
