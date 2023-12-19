<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ECommerceCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'name',
        'type'// ['main', 'sub']
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function scopeMyAllCategories($query)
    {
        $query->where('company_id', auth()->user()->company_id);
    }

    public function scopeMyCategories($query)
    {
        $query->where('company_id', auth()->user()->company_id)->where('type', 'main');
    }

    public function scopeMySubCategories($query)
    {
        $query->where('company_id', auth()->user()->company_id)->where('type', 'sub');
    }

    public function products()
    {
        return $this->hasMany(ECommerceProduct::class, 'category_id');
    }
}
