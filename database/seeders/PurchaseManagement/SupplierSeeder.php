<?php

namespace Database\Seeders\PurchaseManagement;

use Illuminate\Database\Seeder;
use App\Models\PurchaseManagement\Supplier;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        Supplier::factory(10)->create();
    }
}
