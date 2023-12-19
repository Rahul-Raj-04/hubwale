<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockManagementTransaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
    	'product_id',
        'available_pieces_quantity',
		'available_packages_quantity',
		'defective_pieces_quantity',
		'defective_packages_quantity'
    ];

    public function product()
    {
        return $this->belongsTo(Products::class);
    }

}
