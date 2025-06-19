<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Create default permissions
        $permissions = [
            'manage users',
            'manage roles',
            'manage permissions',
            'manage accounts',
            'manage ledgers',
            'manage vouchers',
            'manage inventory',
            'manage suppliers',
            'manage purchases',
            'manage sales',
            'manage production',
            'view reports',
            'manage settings'
        ];
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles and assign permissions
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $managerRole = Role::firstOrCreate(['name' => 'Manager']);
        $accountantRole = Role::firstOrCreate(['name' => 'Accountant']);

        $adminRole->syncPermissions($permissions);
        $managerRole->syncPermissions([
            'manage accounts',
            'manage ledgers',
            'manage vouchers',
            'manage inventory',
            'manage suppliers',
            'manage purchases',
            'manage sales',
            'manage production',
            'view reports'
        ]);
        $accountantRole->syncPermissions([
            'manage accounts',
            'manage ledgers',
            'manage vouchers',
            'view reports'
        ]);

        // Assign Admin role to the first user (if exists)
        $user = User::first();
        if ($user) {
            $user->assignRole('Admin');
        }

        // Seed 10 users with random roles
        \App\Models\User::factory(10)->create()->each(function ($user) use ($adminRole, $managerRole, $accountantRole) {
            $roles = [$adminRole, $managerRole, $accountantRole];
            $user->assignRole($roles[array_rand($roles)]);
        });

        // Accounts & Finance
        $this->call(\Database\Seeders\Accounts\AccountSeeder::class);
        $this->call(\Database\Seeders\Accounts\LedgerSeeder::class);
        $this->call(\Database\Seeders\Accounts\VoucherSeeder::class);

        // Inventory Management
        $this->call(\Database\Seeders\Inventory\InventoryItemSeeder::class);

        // Purchase Management
        $this->call(\Database\Seeders\PurchaseManagement\SupplierSeeder::class);
        $this->call(\Database\Seeders\PurchaseManagement\PurchaseOrderSeeder::class);
        $this->call(\Database\Seeders\PurchaseManagement\PurchaseInvoiceSeeder::class);
    }
}
