<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ECommerceProduct extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'company_id',
        'category_id',
        'sub_category_id',
        'brand_id',
        'supplier_brand_id',
        'tax_id',
        'name',
        'description',
        'status'
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images');
    }

    public function company()
    {
        return $this->belongsTo(Company::class)->withTrashed();
    }

    public function sub_category()
    {
        return $this->belongsTo(ECommerceCategory::class)->withTrashed();
    }

    public function category()
    {
        return $this->belongsTo(ECommerceCategory::class)->withTrashed();
    }

    public function brand()
    {
        return $this->belongsTo(ECommerceBrand::class)->withTrashed();
    }

    public function supplier_brand()
    {
        return $this->belongsTo(ECommerceBrand::class)->withTrashed();
    }

    public function tax()
    {
        return $this->belongsTo(ECommerceTax::class)->withTrashed();
    }

    public function variations()
    {
        return $this->hasMany(ECommerceProductVariation::class, 'product_id');
    }

    public function scopeMyProducts($query)
    {
        return $query->where('company_id', auth()->user()->company_id);
    }

    public function getBoxPriceRangeAttribute()
    {
        $min = $this->variations()->whereIn('packaging_type', ['box', 'both'])->orderBy('box_price', 'ASC')->first();
        $max = $this->variations()->whereIn('packaging_type', ['box', 'both'])->orderBy('box_price', 'DESC')->first();
        if ($min && $max) {
            return $min->box_price." - ".$max->box_price;
        }
        return "-";
    }

    public function getPiecePriceRangeAttribute()
    {
        $min = $this->variations()->whereIn('packaging_type', ['piece', 'both'])->orderBy('piece_price', 'ASC')->first();
        $max = $this->variations()->whereIn('packaging_type', ['piece', 'both'])->orderBy('piece_price', 'DESC')->first();
        if ($min && $max) {
            return $min->piece_price." - ".$max->piece_price;
        }
        return "-";
    }

    public function getUrlAttribute()
    {
        $data = [
            "companyId" => $this->company_id,
            "companyName" => $this->company->company_name,
            "productId" => $this->id,
            "productName" => $this->name
        ];
        return route('e-commerce.store.product-view', $data);
    }

    public function getStoreUrlAttribute()
    {
        $data = [
            "companyId" => $this->company_id,
            "companyName" => $this->company->company_name,
        ];
        return route('e-commerce.store.index', $data);
    }
}
