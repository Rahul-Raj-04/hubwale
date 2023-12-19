<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GstSlab extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'gst_slab';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'gst_slab',
        'gst_type',
        'state_ut_tax',
        'central_tax',
        'integrated_tax',
        'company_id'
    ];

    public function gst_commodity()
    {
        return $this->hasOne(GstCommodity::class, 'gst_slab_id');
    }
}
