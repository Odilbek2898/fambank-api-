<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories =
            [
                [
                    'name'      => 'Заработная плата',
                    'type_id'   => 1,
                ],
                [
                    'name'      => 'Иные доходы',
                    'type_id'   => 1,
                ],
                [
                    'name'      => 'Продукты питания',
                    'type_id'   => 2,
                ],
                [
                    'name'      => 'Транспорт',
                    'type_id'   => 2,
                ],
                [
                    'name'      => 'Мобильная связь',
                    'type_id'   => 2,
                ],
                [
                    'name'      => 'Интернет',
                    'type_id'   => 2,
                ],
                [
                    'name'      => 'Развлечения',
                    'type_id'   =>  2,
                ],
                [
                    'name'      => 'Другое',
                    'type_id'   => 2,
                ]
            ];

        DB::table('categories')->insert($categories);
    }
}
