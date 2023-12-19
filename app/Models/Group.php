<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'short_name',
        'company_id'
    ];

    public function products()
    {
        $this->hasMany(Products::class);
    }

    public function company()
    {
        $this->belongsTo(Company::class);
    }

    public function getGroupProductsAttribute()
    {
        $groups = Products::where('group_id', $this->id)->get()->first();
        if ($groups) {
            return true;
        }
        return false;
    }
}
