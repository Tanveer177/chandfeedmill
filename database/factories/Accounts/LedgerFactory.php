<?php

namespace Database\Factories\Accounts;

use App\Models\Accounts\Ledger;
use App\Models\Accounts\Account;
use Illuminate\Database\Eloquent\Factories\Factory;

class LedgerFactory extends Factory
{
    protected $model = Ledger::class;

    public function definition(): array
    {
        $debit = $this->faker->randomFloat(2, 0, 10000);
        $credit = $this->faker->randomFloat(2, 0, 10000);
        return [
            'account_id' => Account::factory(),
            'date' => $this->faker->date(),
            'description' => $this->faker->sentence,
            'debit' => $debit,
            'credit' => $credit,
            'balance' => $debit - $credit,
        ];
    }
}
