<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class FestivalImageAd extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        "country_id",
        "name",
        "url",
        "client_name",
        "client_mobile_number",
        "client_company_name",
        "expiry_date",
        "is_active", //boolean
        "payment_amount",
        "payment_status" // ['pending', 'success']
    ];


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('banner')->singleFile();
    }

    public function getBannerAttribute() {
        return $this->getFirstMediaUrl('banner');
    }

    protected $casts = [
        'expiry_date' => 'datetime',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
