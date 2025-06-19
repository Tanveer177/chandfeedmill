<?php

namespace Database\Seeders\PurchaseManagement;

use Illuminate\Database\Seeder;
use App\Models\PurchaseManagement\PurchaseOrder;

class PurchaseOrderSeeder extends Seeder
{
    public function run(): void
    {
        PurchaseOrder::factory(10)->create();
    }
} 