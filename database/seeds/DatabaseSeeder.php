<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            UserTypeSeeder::class,
            DepartamentSeeder::class,
            ProjectSeeder::class,
            TaskPrioritySeeder::class,
            TaskStasusSeeder::class,
            TasksSeeder::class,
            TaskTypeSeeder::class,
        ]);
    }
}
