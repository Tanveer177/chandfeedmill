<?php

namespace Database\Factories\PurchaseManagement;

use App\Models\PurchaseManagement\PurchaseOrder;
use App\Models\PurchaseManagement\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseOrderFactory extends Factory
{
    protected $model = PurchaseOrder::class;

    public function definition(): array
    {
        return [
            'supplier_id' => Supplier::factory(),
            'order_no' => $this->faker->unique()->numerify('PO###'),
            'order_date' => $this->faker->date(),
            'status' => $this->faker->randomElement(['pending', 'approved', 'received', 'cancelled']),
            'total_amount' => $this->faker->randomFloat(2, 1000, 10000),
            'description' => $this->faker->sentence,
        ];
    }
} 