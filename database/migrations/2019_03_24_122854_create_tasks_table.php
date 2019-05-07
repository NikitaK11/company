<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('executor_id')->unsigned();
            $table->integer('creator_id')->unsigned();
            $table->integer('priority_id')->unsigned()->default(1);
            $table->integer('task_type_id')->unsigned()->default(1);
            $table->integer('point')->default(1);
            $table->date('date_begin')->nullable();
            $table->date('date_end')->nullable();
            $table->text('description')->nullable();
            $table->integer('task_status_id')->default(0);
            $table->string('branch')->nullable();
            $table->integer('project_id')->nullable();
            $table->string('name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
