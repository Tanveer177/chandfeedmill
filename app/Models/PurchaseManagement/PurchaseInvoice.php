<?php

namespace App\Models\PurchaseManagement;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseInvoice extends Model
{
    use HasFactory;

    protected $fillable = ['purchase_order_id', 'invoice_no', 'invoice_date', 'amount', 'status', 'description'];

    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class);
    }
}
