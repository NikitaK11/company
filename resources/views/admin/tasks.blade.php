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

            <div class="event-option">
                <div class="col-sm-10 my-1">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Статус</div>
                        </div>
                        <select name="status_id" class="form-control">
                            <option value="0">Не выбран</option>
                            @foreach($statuses as $status)
                                <option {{$status_id == $status->id ? 'selected' : ' '}}  value="{{$status->id}}">
                                    {{$status->name}}
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
                    <th scope="col">№</th>
                    <th scope="col">Проект</th>
                    <th scope="col">Создал</th>
                    <th scope="col">Выполняет</th>
                    <th scope="col">Тип</th>
                    <th scope="col">Статус</th>
                    <th scope="col">Приоритет</th>
                    <th scope="col">Сложность</th>
                    <th scope="col">Дата создания</th>

                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <th scope="row">{{$task->id}}</th>
                        <td>{{$task->project->name}}</td>
                        <td>{{$task->creator->name}}</td>
                        <td>{{$task->executor->name}}</td>
                        <td>{{$task->type->name}}</td>
                        <td>{{$task->status->name}}</td>
                        <td>{{$task->priority->name}}</td>
                        <td>{{$task->point}}</td>
                        <td>{{$task->date_begin}}</td>
                        <td>
                            <a href="/admin/task/edit?id={{$task->id}}" class="btn btn-danger">Редактировать</a>
                        </td>
                        <td>
                            <a href="/admin/task?id={{$task->id}}" class="btn btn-info">Просмотр</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>



    </div>


@endsection