<?php

use Illuminate\Database\Seeder;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert(
            [
                [
                    'executor_id' =>  2,
                    'creator_id' => 1,
                    'priority_id' => 3,
                    'task_type_id' => 3,
                    'point' => 3,
                    'date_begin' => '2019-05-20 14:00:00',
                    'project_id' => 1,
                    'description' => 'Реализовать странницу отзывов. Отзыв состоит из оценки товара по 10 бальной шкале, текста комментария, email, возможностью загрузки фото, ',
                    'branch' => 'SFT-144',
                    'task_status_id' => 1,
                    'created_at' =>  '2019-05-15 10:00:00',
                    'name' => 'ф-н Комментарий'
                ],
            ]
        );

        DB::table('tasks')->insert(
            [
                [
                    'executor_id' =>  3,
                    'creator_id' => 1,
                    'priority_id' => 2,
                    'task_type_id' => 3,
                    'point' => 3,
                    'date_begin' => '2019-05-20 15:00:00',
                    'project_id' => 2,
                    'description' => 'Некорректное отображение карточки товара на странице /product/...',
                    'branch' => 'DTV-77',
                    'task_status_id' => 1,
                    'created_at' =>  '2019-05-15 11:00:00',
                    'name' => 'Ошибка просмотра товара.'
                ],
            ]
        );

        DB::table('tasks')->insert(
            [
                [
                    'executor_id' =>  4,
                    'creator_id' => 1,
                    'priority_id' => 2,
                    'task_type_id' => 3,
                    'point' => 3,
                    'date_begin' => '2019-05-20 15:00:00',
                    'project_id' => 3,
                    'description' => 'Оптимизировать работу сбора статистики по продажам на странице /stats/total. ',
                    'branch' => 'HDM-218',
                    'task_status_id' => 1,
                    'created_at' =>  '2019-05-15 12:00:00',
                    'name' => 'Неправильная статистика.'
                ],
            ]
        );
    }
}
