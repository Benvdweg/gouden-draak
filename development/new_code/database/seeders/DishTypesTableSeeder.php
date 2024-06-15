<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DishTypesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('dish_types')->delete();

        \DB::table('dish_types')->insert([
            0 => [
                'id' => 1,
                'type' => 'SOEP',
            ],
            1 => [
                'id' => 2,
                'type' => 'VOORGERECHT',
            ],
            2 => [
                'id' => 3,
                'type' => 'BAMI EN NASI GERECHTEN',
            ],
            3 => [
                'id' => 4,
                'type' => 'COMBINATIE GERECHTEN (met witte rijst)',
            ],
            4 => [
                'id' => 5,
                'type' => 'MIHOEN GERECHTEN',
            ],
            5 => [
                'id' => 6,
                'type' => 'CHINESE BAMI GERECHTEN',
            ],
            6 => [
                'id' => 7,
                'type' => 'INDISCHE GERECHTEN',
            ],
            7 => [
                'id' => 8,
                'type' => 'EIERGERECHTEN (met witte rijst)',
            ],
            8 => [
                'id' => 9,
                'type' => 'GROENTEN GERECHTEN (met witte rijst)',
            ],
            9 => [
                'id' => 10,
                'type' => 'VLEES GERECHTEN (met witte rijst)',
            ],
            10 => [
                'id' => 11,
                'type' => 'KIP GERECHTEN (met witte rijst)',
            ],
            11 => [
                'id' => 12,
                'type' => 'GARNALEN GERECHTEN (met witte rijst)',
            ],
            12 => [
                'id' => 13,
                'type' => 'OSSENHAAS GERECHTEN (met witte rijst)',
            ],
            13 => [
                'id' => 14,
                'type' => 'VISSEN GERECHTEN (met witte rijst)',
            ],
            14 => [
                'id' => 15,
                'type' => 'PEKING EEND GERECHTEN (met witte rijst)',
            ],
            15 => [
                'id' => 16,
                'type' => 'TIEPAN SPECIALITEITEN (met witte rijst)',
            ],
            16 => [
                'id' => 17,
                'type' => 'VEGETARISCHE GERECHTEN (met witte rijst)',
            ],
            17 => [
                'id' => 18,
                'type' => 'KINDERMENUS',
            ],
            18 => [
                'id' => 19,
                'type' => 'RIJSTTAFELS',
            ],
            19 => [
                'id' => 20,
                'type' => 'BUFFET',
            ],
            20 => [
                'id' => 21,
                'type' => 'DIVERSEN',
            ],
        ]);

    }
}
