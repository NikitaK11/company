<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'name' => 'Алексей Маханько',
                    'password' => \Illuminate\Support\Facades\Hash::make('123456'),
                    'email' => 'softteco10@soft.ru',
                    'created_at' => (new DateTime('now'))->format('Y-m-d'),
                    'admin' => TRUE,
                    'user_type_id' => 1,
                    'department_id' => 1,
                    'img' => '1.jpeg',
                ],
                [
                    'name' => 'Антон Бурак',
                    'password' => \Illuminate\Support\Facades\Hash::make('123456'),
                    'email' => 'softteco11@soft.ru',
                    'created_at' => (new DateTime('now'))->format('Y-m-d'),
                    'user_type_id' => 2,
                    'admin' => FALSE,
                    'department_id' => 1,
                    'img' => '2.jpeg',
                ],
                [
                    'name' => 'Виталий Смирнов',
                    'password' => \Illuminate\Support\Facades\Hash::make('123456'),
                    'email' => 'softteco12@soft.ru',
                    'created_at' => (new DateTime('now'))->format('Y-m-d'),
                    'user_type_id' => 3,
                    'admin' => FALSE,
                    'department_id' => 1,
                    'img' => '3.jpeg',
                ],
                [
                    'name' => 'Анна Орлова',
                    'password' => \Illuminate\Support\Facades\Hash::make('123456'),
                    'email' => 'softteco13@soft.ru',
                    'created_at' => (new DateTime('now'))->format('Y-m-d'),
                    'user_type_id' => 6,
                    'admin' => FALSE,
                    'department_id' => 2,
                    'img' => '8.jpeg',
                ],
                [
                    'name' => 'Олег Миронов',
                    'password' => \Illuminate\Support\Facades\Hash::make('123456'),
                    'email' => 'softteco14@soft.ru',
                    'created_at' => (new DateTime('now'))->format('Y-m-d'),
                    'user_type_id' => 5,
                    'admin' => FALSE,
                    'department_id' => 2,
                    'img' => '5.jpeg',
                ],
                [
                    'name' => 'Александр Косенко',
                    'password' => \Illuminate\Support\Facades\Hash::make('123456'),
                    'email' => 'softteco15@soft.ru',
                    'created_at' => (new DateTime('now'))->format('Y-m-d'),
                    'user_type_id' => 4,
                    'admin' => FALSE,
                    'department_id' => 1,
                    'img' => '6.jpeg',
                ],

                [
                    'name' => 'Александр Лагутин',
                    'password' => \Illuminate\Support\Facades\Hash::make('123456'),
                    'email' => 'softteco16@soft.ru',
                    'created_at' => (new DateTime('now'))->format('Y-m-d'),
                    'user_type_id' => 4,
                    'admin' => FALSE,
                    'department_id' => 1,
                    'img' => '7.jpeg',
                ],

                [
                    'name' => 'Куксар Алексей',
                    'password' => \Illuminate\Support\Facades\Hash::make('123456'),
                    'email' => 'softteco18@soft.ru',
                    'created_at' => (new DateTime('now'))->format('Y-m-d'),
                    'user_type_id' => 4,
                    'admin' => FALSE,
                    'department_id' => 1,
                    'img' => '4.jpeg',
                ],
            ]
        );
    }
}
