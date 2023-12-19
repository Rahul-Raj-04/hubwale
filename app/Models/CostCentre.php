<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CostCentre extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cost_centres';

	protected $fillable = [
	    'name',
	    'cost_category_id',
	    'company_id'
	];

	public function cost_category()
    {
        return $this->belongsTo(CostCategory::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
