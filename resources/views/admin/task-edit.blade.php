@extends('layouts.admin')
@section('content')
    <div class="container event-view" style="margin-bottom: 20px;">
        <h5><strong>Редактирование задания</strong></h5>



        <form class="row" action="/admin/task/update" method="post" enctype="multipart/form-data" >



            @csrf
            <input type="hidden" class="form-control" name="id"  value="{{$task->id}}" >

            <div class="col-md-6">

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Название</div>
                            </div>
                            <input name="name" required type="text" class="form-control"  value="{{$task->name}}"   >
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
                                @foreach($projects as $project)
                                    <option {{$task->project->id == $project->id ? 'selected' : ' '}} value="{{$project->id}}">
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
                                <div class="input-group-text">Создал</div>
                            </div>
                            <select name="creator_id" class="form-control">
                                @foreach($users as $user)
                                    <option {{$task->creator->id == $user->id ? 'selected' : ' '}} value="{{$user->id}}">
                                        {{$user->name}}
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
                                <div class="input-group-text">Исполнитель</div>
                            </div>
                            <select name="executor_id" class="form-control">
                                @foreach($users as $user)
                                    <option {{$task->executor->id == $user->id ? 'selected' : ' '}} value="{{$user->id}}">
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
                                <div class="input-group-text">Тип задания</div>
                            </div>
                            <select name="type_id" class="form-control">
                                @foreach($taskTypes as $taskType)
                                    <option {{$task->type->id == $taskType->id ? 'selected' : ' '}} value="{{$taskType->id}}">
                                        {{$taskType->name}}
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
                                @foreach($taskStatuses as $taskStatus)
                                    <option {{$task->status->id == $taskStatus->id ? 'selected' : ' '}} value="{{$taskStatus->id}}">
                                        {{$taskStatus->name}}
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
                                <div class="input-group-text">Приоритет</div>
                            </div>
                            <select name="priority_id" class="form-control">
                                @foreach($taskPriorities as $p)
                                    <option {{$task->priority->id == $p->id ? 'selected' : ' '}} value="{{$p->id}}">
                                        {{$p->name}}
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
                                <div class="input-group-text">Сложность</div>
                            </div>
                            <input name="point" required type="number" class="form-control"  value="{{$task->point}}" >
                        </div>
                    </div>
                </div>

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Branch</div>
                            </div>
                            <input name="branch" required type="text" class="form-control"  value="{{$task->branch}}" >
                        </div>
                    </div>
                </div>

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Дата начала выполния</div>
                            </div>
                            <input name="date_begin" required type="date" class="form-control"  value="{{$task->date_begin}}" >
                        </div>
                    </div>
                </div>

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Дата создания</div>
                            </div>
                            <input name="created_at" required type="date" class="form-control"  value="{{$task->created_at}}" >
                        </div>
                    </div>
                </div>












            </div>

            <div class="col-md-6">

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Описание</div>
                            </div>
                            <textarea name="description" required  class="form-control"   >
                                {{$task->description}}
                            </textarea>
                        </div>
                    </div>
                </div>




                <div class="event-option col-md-4">
                    <input class="btn btn-success my-2 my-sm-0" type="submit" value="Обновть"/>
                </div>


            </div>

        </form>



@endsection