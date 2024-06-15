<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReservationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reservations')->insert([
            [
                'email' => 'john.doe@example.com',
                'starttime' => '2024-06-15 18:00:00',
                'endtime' => '2024-06-15 20:00:00',
                'table_number' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'email' => 'jane.smith@example.com',
                'starttime' => '2024-06-15 19:00:00',
                'endtime' => '2024-06-15 21:00:00',
                'table_number' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'email' => 'peter.jones@example.com',
                'starttime' => '2024-06-16 18:30:00',
                'endtime' => '2024-06-16 20:30:00',
                'table_number' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'email' => 'linda.brown@example.com',
                'starttime' => '2024-06-16 19:30:00',
                'endtime' => '2024-06-16 21:30:00',
                'table_number' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'email' => 'michael.white@example.com',
                'starttime' => '2024-06-17 17:00:00',
                'endtime' => '2024-06-17 19:00:00',
                'table_number' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'email' => 'susan.green@example.com',
                'starttime' => '2024-06-17 18:00:00',
                'endtime' => '2024-06-17 20:00:00',
                'table_number' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'email' => 'robert.lee@example.com',
                'starttime' => '2024-06-18 19:00:00',
                'endtime' => '2024-06-18 21:00:00',
                'table_number' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'email' => 'mary.king@example.com',
                'starttime' => '2024-06-18 20:00:00',
                'endtime' => '2024-06-18 22:00:00',
                'table_number' => 8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'email' => 'james.scott@example.com',
                'starttime' => '2024-06-19 18:00:00',
                'endtime' => '2024-06-19 20:00:00',
                'table_number' => 9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'email' => 'patricia.walker@example.com',
                'starttime' => '2024-06-19 19:00:00',
                'endtime' => '2024-06-19 21:00:00',
                'table_number' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
