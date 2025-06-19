<?php

namespace App\Models\PurchaseManagement;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $fillable = ['supplier_id', 'order_no', 'order_date', 'status', 'total_amount', 'description'];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function purchaseInvoices()
    {
        return $this->hasMany(PurchaseInvoice::class);
    }
}
