<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ECommerceBrand extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'name',
        'type' //['own', 'supplier']
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function scopeMyBrands($query)
    {
        $query->where('company_id', auth()->user()->company_id)->where('type', 'own');
    }

    public function products()
    {
        return $this->hasMany(ECommerceProduct::class, 'brand_id');
    }
}
