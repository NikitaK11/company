@extends('layouts.app')
@section('content')

    <style>
        td{
            font-size: 20px;
            width: 300px;
            height: 200px;
            background: #f5f5f7;
            text-align: center;
        }
        th{
            font-size: 20px;
            width: 300px;
            height: 100px;
            background: #f5f5f7;
            text-align: center;
        }

        .task-executor{
            border-radius: 50%;
            width: 50px;
            height: 50px;
        }

        .task-container{
            display: flex;
            flex-direction: column;
            height: 100%;
            justify-content: space-around;
        }
    </style>

    <table border="1" style="margin: 0 auto;">
        <caption>Таблица размеров обуви</caption>
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
                        <td

                        >
                        <div class="task-container">





                            <p>{{$task->name}}</p>
                            <div style="display: flex; align-items: center; justify-content: space-around;">

                                @if($task->task_type_id == 1)
                                    <i title="Type: bug" style="color: #ff5e4e" class="glyphicon glyphicon-question-sign"></i>
                                @elseif($task->task_type_id == 2)
                                    <i title="Type: error" style="color: #ffc761" class="glyphicon glyphicon-exclamation-sign"></i>
                                @elseif($task->task_type_id == 3)
                                    <i title="Type: task" style="color: #97ff7b" class="	glyphicon glyphicon-ok-circle"></i>
                                @endif

                                @if($task->priority_id == 1)
                                    <i title="Priority High" style="color: #ff5e4e" class="	glyphicon glyphicon-arrow-up"></i>
                                @elseif($task->priority_id == 2)
                                    <i title="Priority Medium" style="color: #ffc761" class="	glyphicon glyphicon-minus"></i>
                                @elseif($task->priority_id == 3)
                                    <i title="Priority Low" style="color: #97ff7b" class="glyphicon glyphicon-arrow-down"></i>
                                @endif

                                <p>{{$task->branch}}</p>
                                <a href="/user?id={{$task->executor->id}}" style="margin: 0 20px;">
                                    <img class="task-executor" src="{{asset('images/users/'.$task->executor->img)}}" alt="">
                                </a>

                            </div>

                        </div>

                        </td>
                    @else
                        <td>35,5</td>
                    @endif
                @endfor
            </tr>
        @endforeach


        <tr>
            <td>48</td>
            <td>13,5</td>
            <td>49⅓</td>
            <td>31,5</td>
        </tr>
        </tbody>
    </table>
@endsection
