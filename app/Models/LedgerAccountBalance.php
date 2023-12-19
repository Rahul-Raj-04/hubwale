<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LedgerAccountBalance extends Model
{
    use HasFactory,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'account_id',
        'balance',
        'type',
        'balance_type',
        'closing_balance',
        'date',
        'vou_doc_no',
        'type_id',
        'opposite_account_id',
        'model_name'
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function opposite_account()
    {
        return $this->belongsTo(Account::class);
    }

    public function getModelAttribute()
    {
        if ($this->model_name == 'JournalEntry') {
            $JournalEntry = JournalEntry::find($this->type_id);            
            if($JournalEntry){
                $JournalEntries = JournalEntry::where('group_id', $JournalEntry->group_id)->get();
                return $JournalEntries ? $JournalEntries : [];
            }
            return [];
            
        }
    }
}
