<?php

namespace Database\Factories\Inventory;

use App\Models\Inventory\InventoryItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class InventoryItemFactory extends Factory
{
    protected $model = InventoryItem::class;

    public function definition(): array
    {
        $units = ['kg', 'bag', 'ton', 'liter', 'piece'];
        $categories = ['Raw Material', 'Finished Feed', 'Additive', 'Medicine'];
        return [
            'name' => $this->faker->word . ' Item',
            'sku' => $this->faker->unique()->numerify('SKU###'),
            'category' => $this->faker->randomElement($categories),
            'unit' => $this->faker->randomElement($units),
            'quantity' => $this->faker->randomFloat(2, 0, 1000),
            'min_quantity' => $this->faker->randomFloat(2, 0, 100),
            'cost_price' => $this->faker->randomFloat(2, 10, 500),
            'sale_price' => $this->faker->randomFloat(2, 20, 700),
            'description' => $this->faker->sentence,
        ];
    }
}
