<?php

namespace Database\Factories\Accounts;

use App\Models\Accounts\Account;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccountFactory extends Factory
{
    protected $model = Account::class;

    public function definition(): array
    {
        $types = ['asset', 'liability', 'income', 'expense', 'equity'];
        return [
            'name' => $this->faker->company . ' Account',
            'code' => $this->faker->unique()->numerify('ACC###'),
            'type' => $this->faker->randomElement($types),
            'parent_id' => null,
            'description' => $this->faker->sentence,
        ];
    }
}
