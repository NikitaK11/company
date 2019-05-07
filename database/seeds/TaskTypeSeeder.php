<?php

use Illuminate\Database\Seeder;

class TaskTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('task_type')->insert(
            [
                [
                    'name' => 'Bug',
                ],
                [
                    'name' => 'Error',
                ],
                [
                    'name' => 'Task',
                ],
            ]
        );
    }
}
