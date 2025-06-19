<?php

namespace Database\Factories\PurchaseManagement;

use App\Models\PurchaseManagement\PurchaseInvoice;
use App\Models\PurchaseManagement\PurchaseOrder;
use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseInvoiceFactory extends Factory
{
    protected $model = PurchaseInvoice::class;

    public function definition(): array
    {
        return [
            'purchase_order_id' => PurchaseOrder::factory(),
            'invoice_no' => $this->faker->unique()->numerify('INV###'),
            'invoice_date' => $this->faker->date(),
            'amount' => $this->faker->randomFloat(2, 1000, 10000),
            'status' => $this->faker->randomElement(['unpaid', 'paid', 'cancelled']),
            'description' => $this->faker->sentence,
        ];
    }
}
