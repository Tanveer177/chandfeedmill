<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryItem extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'sku', 'category', 'unit', 'quantity', 'min_quantity', 'cost_price', 'sale_price', 'description'];
}
