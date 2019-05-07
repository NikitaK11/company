<?php

use Illuminate\Database\Seeder;

class TaskPrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('task_priority')->insert(
            [
                [
                    'name' => 'High',
                ],
                [
                    'name' => 'Medium',
                ],
                [
                    'name' => 'Low',
                ],
            ]
        );
    }
}
