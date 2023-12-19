<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_id',
		'menu',
		'sub_menu',
		'header',
		'key',
		'value',
		'type',
		'description',
		'option',
		'validation'
    ];

    public function company()
    {
    	return $this->belongsTo(Company::class);
    }
}
