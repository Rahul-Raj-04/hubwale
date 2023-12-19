<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccountInterest extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'interest',
        'interest_ac',
        'tds_ac',
        'cr_db',
    ];

    public function account()
    {
        return $this->hasOne(Account::class, 'account_interest_id');
    }
}
