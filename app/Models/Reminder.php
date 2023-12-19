<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reminder extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'remind_date',
		'before_day',
		'reminder_category_id',
		'particular',
		'frequency',
		'level',
		'company_id'
    ];

    public function reminderCategory()
    {
        return $this->belongsTo(ReminderCategory::class);
    }
}
