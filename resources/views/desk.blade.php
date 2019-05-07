@extends('layouts.app')
@section('content')

    <style>
        td {
            font-size: 20px;
            width: 350px;
            height: 100px;
            background: #f5f5f7;
            text-align: center;
        }

        th {
            font-size: 20px;
            width: 350px;
            height: 50px;
            background: #f5f5f7;
            text-align: center;
        }

        .task-executor {
            border-radius: 50%;
            width: 50px;
            height: 50px;
        }

        .task-container {
            display: flex;
            flex-direction: column;
            height: 100%;
            justify-content: space-around;
        }
    </style>

    <div class="container" style="margin-bottom: 20px;">
        <h3>Доска  <span class="	glyphicon glyphicon-copy"></span></h3>

        <form action="/desk" method="get" style="width: 400px;">
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
            <input style="margin-left: 280px;" type="submit" class="btn-success btn" value="Найти">
        </form>
    </div>




    <table border="1" style="margin: 0 auto;"
    <tr>
        @foreach($statuses as $status)
            <th
                    style="font-size: 20px;
                    width: 300px;
                    height: 100px;
                    background: #f5f5f7;text-align: center"
            >{{$status->name}}</th>
        @endforeach
    </tr>
    <tbody>
    @foreach($tasks as $task)
        <tr>
            @for($i = 0; $i < count($statuses); $i++)
                @if($task->task_status_id == $statuses[$i]->id)
                    <td>
                        <div class="task-container">


                            <a href="/task?id={{$task->id}}">
                                <p>{{$task->name}}</p>
                            </a>

                            <div style="display: flex; align-items: center; justify-content: space-around;">

                                @if($task->task_type_id == 1)
                                    <i title="Type: bug" style="color: #ff5e4e"
                                       class="glyphicon glyphicon-question-sign"></i>
                                @elseif($task->task_type_id == 2)
                                    <i title="Type: error" style="color: #ffc761"
                                       class="glyphicon glyphicon-exclamation-sign"></i>
                                @elseif($task->task_type_id == 3)
                                    <i title="Type: task" style="color: #97ff7b"
                                       class="	glyphicon glyphicon-ok-circle"></i>
                                @endif

                                @if($task->priority_id == 1)
                                    <i title="Priority High" style="color: #ff5e4e"
                                       class="	glyphicon glyphicon-arrow-up"></i>
                                @elseif($task->priority_id == 2)
                                    <i title="Priority Medium" style="color: #ffc761"
                                       class="	glyphicon glyphicon-minus"></i>
                                @elseif($task->priority_id == 3)
                                    <i title="Priority Low" style="color: #97ff7b"
                                       class="glyphicon glyphicon-arrow-down"></i>
                                @endif
                                <p title="Difficult">
                                    @for($j = 0; $j < $task->point; $j++)
                                        <i style="color: #ff585b; font-size: 15px;"
                                           class="glyphicon glyphicon-asterisk"></i>
                                    @endfor
                                </p>
                                <p>{{$task->branch}}</p>
                                <a href="/user?id={{$task->executor->id}}" style="margin: 0 20px;">
                                    <img class="task-executor" src="{{asset('images/users/'.$task->executor->img)}}"
                                         alt="">
                                </a>

                            </div>

                        </div>

                    </td>

                @else
                    <td></td>
                @endif
            @endfor
        </tr>
    @endforeach


    </tbody>
    </table>




@endsection
