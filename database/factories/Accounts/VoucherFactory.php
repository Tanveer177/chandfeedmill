<?php

namespace Database\Factories\Accounts;

use App\Models\Accounts\Voucher;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class VoucherFactory extends Factory
{
    protected $model = Voucher::class;

    public function definition(): array
    {
        $types = ['payment', 'receipt', 'journal', 'contra'];
        return [
            'voucher_no' => $this->faker->unique()->numerify('VCH###'),
            'date' => $this->faker->date(),
            'type' => $this->faker->randomElement($types),
            'description' => $this->faker->sentence,
            'amount' => $this->faker->randomFloat(2, 100, 10000),
            'created_by' => User::factory(),
        ];
    }
} 