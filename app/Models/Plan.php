<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use HasFactory, SoftDeletes;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name', //string
        'description', //string
        'monthly_price', //numeric 
        'yearly_price', //numeric
        'country_id',
        'status', //boolean
        'festival_image', //boolean
        'fi_watermark', //boolean
        'fi_ad', //boolean
        'fi_download_limit_monthly', //numeric
        'fi_download_limit_yearly', //numeric
        'erp', //boolean
        'pdf_maker', //boolean
        'stock_management', //boolean
        'e_commerce' //boolean
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
