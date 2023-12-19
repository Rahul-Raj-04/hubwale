<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'short_name',
        'company_id'
    ];

    public function products()
    {
        return $this->hasMany(Products::class);
    }

    public function company()
    {
        $this->belongsTo(Company::class);
    }

    public function getCategoryProductsAttribute()
    {
        $products = Products::where('category_id', $this->id)->get()->first();
        if ($products) {
            return true;
        }
        return false;
        
    }
}
