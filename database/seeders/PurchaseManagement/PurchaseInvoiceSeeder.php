<?php

namespace Database\Seeders\PurchaseManagement;

use Illuminate\Database\Seeder;
use App\Models\PurchaseManagement\PurchaseInvoice;

class PurchaseInvoiceSeeder extends Seeder
{
    public function run(): void
    {
        PurchaseInvoice::factory(10)->create();
    }
}
