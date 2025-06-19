<?php

namespace Database\Seeders\Accounts;

use Illuminate\Database\Seeder;
use App\Models\Accounts\Voucher;

class VoucherSeeder extends Seeder
{
    public function run(): void
    {
        Voucher::factory(10)->create();
    }
}
