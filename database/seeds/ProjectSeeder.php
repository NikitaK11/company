<?php

use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert(
            [
                [
                    'name' => 'DomaTv',
                    'description' => 'Интернет-магазин',
                    'img' => 'domatv.jpg'
                ],
                [
                    'name' => 'Sofatex',
                    'description' => 'Интернет-магазин',
                    'img' => 'hotpartner.png'
                ],
                [
                    'name' => 'HotPartner',
                    'description' => 'Партнерская система',
                    'img' => 'sofatex.png'
                ],
            ]
        );
    }
}
