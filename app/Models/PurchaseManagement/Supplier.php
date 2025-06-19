<?php

namespace App\Models\PurchaseManagement;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'address', 'company', 'status'];

    public function purchaseOrders()
    {
        return $this->hasMany(PurchaseOrder::class);
    }
}
