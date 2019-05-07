@extends('layouts.admin')
@section('content')
    <div class="container">


        <form action="/admin/tasks" method="get" style="width: 400px;">
            <div class="event-option">
                <div class="col-sm-10 my-1">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Исполнитель</div>
                        </div>
                        <select name="executor_id" class="form-control">
                            <option value="0">Не выбран</option>
                            @foreach($users as $user)
                                <option {{$executor_id == $user->id ? 'selected' : ' '}}   value="{{$user->id}}">
                                    {{$user->name . ' ' . $user->userType->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="event-option">
                <div class="col-sm-10 my-1">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Проект</div>
                        </div>
                        <select name="project_id" class="form-control">
                            <option value="0">Не выбран</option>
                            @foreach($projects as $project)
                                <option {{$project_id == $project->id ? 'selected' : ' '}}  value="{{$project->id}}">
                                    {{$project->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>




            <input   type="submit" class="btn-success btn col-md-offset-10" value="Найти">
        </form>


        <h3>Задания  <span class="	glyphicon glyphicon-copy"></span></h3>
        <a href="/admin/task/create" class="btn btn-info">Добавть задание</a>
        <div  class="block-border">
            <table class="table table-hover ">
                <thead>
                <tr>
                    <th scope="col">Пользователь</th>
                    <th scope="col">Waiting</th>
                    <th scope="col">In progress</th>
                    <th scope="col">QA</th>
                    <th scope="col">Ready from Production</th>
                    <th scope="col">Done</th>

                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name . ' ' . $user->userType->name}}</td>

                        <td>
                          <?php
                            $v = 0;
                            foreach ($user->stat as $p){
                                if($p->task_status_id == 1){
                                    $v = $p->count;
                                    break;
                                }
                            }
                            echo $v;
                          ?>
                        </td>

                        <td>
                            <?php
                            $v = 0;
                            foreach ($user->stat as $p){
                                if($p->task_status_id == 2){
                                    $v = $p->count;
                                }
                            }
                            echo $v;
                            ?>
                        </td>

                        <td>
                            <?php
                            $v = 0;
                            foreach ($user->stat as $p){
                                if($p->task_status_id == 3){
                                    $v = $p->count;
                                }
                            }
                            echo $v;
                            ?>
                        </td>

                        <td>
                            <?php
                            $v = 0;
                            foreach ($user->stat as $p){
                                if($p->task_status_id == 4){
                                    $v = $p->count;
                                }
                            }
                            echo $v;
                            ?>
                        </td>

                        <td>
                            <?php
                            $v = 0;
                            foreach ($user->stat as $p){
                                if($p->task_status_id == 5){
                                    $v = $p->count;
                                }
                            }
                            echo $v;
                            ?>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>



    </div>


@endsection