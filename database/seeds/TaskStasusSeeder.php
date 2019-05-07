<?php

use Illuminate\Database\Seeder;

class TaskStasusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('task_statuses')->insert(
            [
                [
                    'name' => 'Waiting',
                ],
                [
                    'name' => 'In progress',
                ],
                [
                    'name' => 'QA',
                ],
                [
                    'name' => 'Ready from Production',
                ],
                [
                    'name' => 'Done',
                ],
            ]
        );
    }
}
