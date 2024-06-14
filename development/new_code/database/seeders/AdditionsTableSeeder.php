<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdditionsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('additions')->delete();

        \DB::table('additions')->insert([
            0 => [
                'id' => 1,
                'letter' => 'A',
            ],
            1 => [
                'id' => 4,
                'letter' => 'B',
            ],
            2 => [
                'id' => 5,
                'letter' => 'C',
            ],
            3 => [
                'id' => 6,
                'letter' => 'D',
            ],
            4 => [
                'id' => 3,
                'letter' => 'G',
            ],
            5 => [
                'id' => 2,
                'letter' => 'H',
            ],
            6 => [
                'id' => 26,
                'letter' => 'K1',
            ],
            7 => [
                'id' => 27,
                'letter' => 'K2',
            ],
            8 => [
                'id' => 28,
                'letter' => 'K3',
            ],
            9 => [
                'id' => 29,
                'letter' => 'K4',
            ],
            10 => [
                'id' => 7,
                'letter' => 'M1',
            ],
            11 => [
                'id' => 8,
                'letter' => 'M2',
            ],
            12 => [
                'id' => 9,
                'letter' => 'M3',
            ],
            13 => [
                'id' => 10,
                'letter' => 'M4',
            ],
            14 => [
                'id' => 11,
                'letter' => 'M5',
            ],
            15 => [
                'id' => 12,
                'letter' => 'M6',
            ],
            16 => [
                'id' => 13,
                'letter' => 'P1',
            ],
            17 => [
                'id' => 14,
                'letter' => 'P2',
            ],
            18 => [
                'id' => 15,
                'letter' => 'P3',
            ],
            19 => [
                'id' => 16,
                'letter' => 'P4',
            ],
            20 => [
                'id' => 30,
                'letter' => 'R1',
            ],
            21 => [
                'id' => 31,
                'letter' => 'R2',
            ],
            22 => [
                'id' => 32,
                'letter' => 'R3',
            ],
            23 => [
                'id' => 33,
                'letter' => 'R4',
            ],
            24 => [
                'id' => 34,
                'letter' => 'R5',
            ],
            25 => [
                'id' => 35,
                'letter' => 'R6',
            ],
            26 => [
                'id' => 17,
                'letter' => 'T1',
            ],
            27 => [
                'id' => 18,
                'letter' => 'T2',
            ],
            28 => [
                'id' => 19,
                'letter' => 'T3',
            ],
            29 => [
                'id' => 20,
                'letter' => 'T4',
            ],
            30 => [
                'id' => 21,
                'letter' => 'T5',
            ],
            31 => [
                'id' => 23,
                'letter' => 'V1',
            ],
            32 => [
                'id' => 24,
                'letter' => 'V2',
            ],
            33 => [
                'id' => 25,
                'letter' => 'V3',
            ],
            34 => [
                'id' => 22,
                'letter' => 'V4',
            ],
        ]);

    }
}
