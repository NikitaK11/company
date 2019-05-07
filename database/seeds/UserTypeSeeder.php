<?php

use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('user_types')->insert(
            [
                [
                    'name' => 'director',
                ],
                [
                    'name' => 'backend developer',
                ],
                [
                    'name' => 'frontend developer',
                ],
                [
                    'name' => 'full stack developer',
                ],
                [
                    'name' => 'QA',
                ],
                [
                    'name' => 'designer',
                ],
            ]
        );
    }
}
