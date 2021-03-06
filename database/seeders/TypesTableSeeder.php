<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types =
            [
                [
                    'name'     => 'Доход',
                ],
                [
                    'name'     => 'Расход',
                ],
                [
                    'name'     => 'Карта создано',
                ]
            ];

        DB::table('types')->insert($types);
    }
}
