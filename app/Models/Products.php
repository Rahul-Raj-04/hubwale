<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes;

    protected $fillable = [
        'company_id',
        'group_id',
        'category_id',
        'name',
        'alias',
        'gst_commodity',
        'number',
        'size', // in cm
        'brand',
        'description',
        'packaging_type',
        'price_per_piece',
        'price_per_package',
        'weight_per_piece',
        'weight_per_package',
        'quantity_per_package',
        'color',
        'grade',
        'unit',
        'surface',
        'custom_size',
        'custom_color',
        'custom_fields',
        'sku',
        'available_pieces_quantity',
        'available_packages_quantity',
        'defective_pieces_quantity',
        'defective_packages_quantity',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image');
    }

    public function getImageAttribute() {
        return $this->getMedia('image');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function gst_commodities() 
    {
        return $this->belongsTo(GstCommodity::class, 'gst_commodity', 'id');
    }
}
