<?php

use Illuminate\Database\Seeder;

class DepartamentSeeder extends Seeder
{

    public function run()
    {
        DB::table('departments')->insert(
            [
                [
                    'name' => 'IT SOFTTECO Group 1',
                    'chief_id' => 1,
                    'phone' => '+375 29 333 58 18',
                    'description' => 'Разработка серврной части. QA , PHP, MySql, Redis, Node.js',
                    'address' => 'г.Минск, ул.Мележа 5 к.2, офис 704',
                ],
                [
                    'name' => 'IT SOFTTECO Group 2',
                    'chief_id' => 4,
                    'phone' => '+375 29 333 58 18',
                    'description' => 'Разработка Fronted, design. HTML, CSS, JS, React.js, Angular',
                    'address' => 'г.Минск, ул.Мележа 5 к.2, офис 302',
                ],
            ]
        );
    }
}
