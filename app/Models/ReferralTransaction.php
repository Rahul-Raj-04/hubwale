<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferralTransaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'refer_by_id',
        'status',
        'fi_download_limit'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function referBy()
    {
        return $this->belongsTo(User::class,'id', 'refer_by_id');
    }
}
