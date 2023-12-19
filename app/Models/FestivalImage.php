<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class FestivalImage extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'country_id',
        'business_category_id',
        'image_category_id', //festival category ex. Diwali, Holi
        'downloads',
        'design_name',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')->singleFile();
    }

    public function getImageAttribute() {
        return $this->getFirstMediaUrl('image');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function business_category()
    {
        return $this->belongsTo(FestivalImageBusinessCategory::class);
    }

    public function image_category() {
        return $this->belongsTo(ImageCategory::class);
    }
}
