@extends('layouts.app')
@section('content')
    <div class="container event-view">
        <h5><strong>Мой кабинет</strong> <span class="	glyphicon glyphicon-user"></span></h5>



        <form class="row" action="{{route('admin-user-add')}}" method="post" enctype="multipart/form-data" >



            @csrf


            <div class="col-md-6">

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">ФИО</div>
                            </div>
                            <input name="name" readonly type="text" class="form-control"  value="{{$user->name}}" >
                        </div>
                    </div>
                </div>

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Email</div>
                            </div>
                            <input name="email" readonly type="email" class="form-control" value="{{$user->email}}"  >
                        </div>
                    </div>
                </div>

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Должность</div>
                            </div>
                            <input  readonly type="text" class="form-control" value="{{$user->userType->name}}"  >
                        </div>
                    </div>
                </div>

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Департамент</div>
                            </div>
                            <input  readonly type="text" class="form-control" value="{{$user->department->name}}"  >
                        </div>
                    </div>
                </div>








            </div>


        </form>

        <div  class="block-border">
            <h4><strong>Мои задания</strong> <span class="glyphicon glyphicon-briefcase"></span></h4>
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
                            <a href="/task?id={{$task->id}}" class="btn btn-info">Просмотр</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>



@endsection