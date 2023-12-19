<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GstCommodity extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'gst_commodity';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'hsn_sac_id',
        'gst_slab_id',
        'description',
        'commodity_type',
        'applied_at',
        'company_id',
    ];

    public function hsn_sac()
    {
        return $this->belongsTo(HsnSac::class);
    }

    public function gst_slab()
    {
        return $this->belongsTo(GstSlab::class);
    }

    public function gst_sales_setup()
    {
        return $this->hasOne(GstSalesSetup::class, 'gst_commodity_id');
    }

    public function product() 
    {
        return $this->hasOne(Products::class, 'gst_commodity');
    }
}
