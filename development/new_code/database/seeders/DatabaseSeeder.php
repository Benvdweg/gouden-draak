<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(DishTypesTableSeeder::class);
        $this->call(AdditionsTableSeeder::class);
        $this->call(DishesTableSeeder::class);
        $this->call(ReservationsSeeder::class);
        $this->call(RolesSeeder::class);

        User::factory()->create([
            'name' => 'Kassa',
            'email' => 'cashier@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 1,
        ]);

        User::factory()->create([
            'name' => 'Ober',
            'email' => 'waiter@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 3,
        ]);
    }
}
