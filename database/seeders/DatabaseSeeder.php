<?php

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        $adminUser = User::factory()->create([
            'email' => 'admin@example.com',
            'password' => Hash::make('123'),
        ]);

        $adminUser->assignRole($adminRole);

        $this->call(UserSeeder::class);
    }
}