<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "campaign_name",
        "title",
        "message",
        "url",
        "send_to_all",
        "module"
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
