<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    use HasFactory;

    protected $fillable = ['account_id', 'date', 'description', 'debit', 'credit', 'balance'];

    public function account()
    {
        return $this->belongsTo(\App\Models\Accounts\Account::class);
    }
}
