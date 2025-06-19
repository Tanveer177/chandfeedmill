<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = ['voucher_no', 'date', 'type', 'description', 'amount', 'created_by'];

    public function creator()
    {
        return $this->belongsTo(\App\Models\User::class, 'created_by');
    }
}
