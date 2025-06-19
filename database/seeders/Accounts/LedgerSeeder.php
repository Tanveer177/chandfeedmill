<?php

namespace Database\Seeders\Accounts;

use Illuminate\Database\Seeder;
use App\Models\Accounts\Ledger;

class LedgerSeeder extends Seeder
{
    public function run(): void
    {
        Ledger::factory(20)->create();
    }
}
