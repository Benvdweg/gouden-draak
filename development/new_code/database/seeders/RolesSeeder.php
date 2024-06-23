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
                'name' => 'Admin',
            ],
            2 => [
                'name' => 'Kassamedewerker',
            ],
            3 => [
                'name' => 'Ober',
            ],
        ]);
    }
}
