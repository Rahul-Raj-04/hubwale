<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Festival Image category
*/
class ImageCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "image_category";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'date'
    ];

    public function festivalImage() {
        return $this->hasMany(FestivalImage::class);
    }
}
