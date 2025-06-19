<?php

namespace Database\Factories\PurchaseManagement;

use App\Models\PurchaseManagement\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

class SupplierFactory extends Factory
{
    protected $model = Supplier::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'company' => $this->faker->companySuffix,
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
