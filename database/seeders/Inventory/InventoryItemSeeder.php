<?php

namespace Database\Seeders\Inventory;

use Illuminate\Database\Seeder;
use App\Models\Inventory\InventoryItem;

class InventoryItemSeeder extends Seeder
{
    public function run(): void
    {
        InventoryItem::factory(20)->create();
    }
}
