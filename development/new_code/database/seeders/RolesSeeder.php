<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->delete();

        DB::table('roles')->insert([
            1 => [
                'name' => 'admin',
            ],
            2 => [
                'name' => 'cashier',
            ],
            3 => [
                'name' => 'waiter',
            ],
        ]);
    }
}
