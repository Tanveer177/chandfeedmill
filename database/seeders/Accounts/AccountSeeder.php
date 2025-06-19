<?php

namespace Database\Seeders\Accounts;

use Illuminate\Database\Seeder;
use App\Models\Accounts\Account;

class AccountSeeder extends Seeder
{
    public function run(): void
    {
        Account::factory(10)->create();
    }
}
