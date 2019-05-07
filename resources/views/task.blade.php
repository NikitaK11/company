@extends('layouts.app')
@section('content')
    <div class="container event-view" style="margin-bottom: 20px;">
        <h5><strong>Просмотр задания</strong></h5>



        <form class="row" action="/task/complete" method="post" enctype="multipart/form-data" >



            @csrf
            <input type="hidden" class="form-control" name="id"  value="{{$task->id}}" >

            <div class="col-md-6">

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Проект</div>
                            </div>
                            <input readonly name="point"   type="text" class="form-control"  value="{{  $task->project->name}}" >
                        </div>
                    </div>
                </div>

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Создал</div>
                            </div>
                            <input readonly name="point"   type="text" class="form-control"  value="{{  $task->creator->name}}" >

                        </div>
                    </div>
                </div>

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Исполнитель</div>
                            </div>
                            <select readonly name="executor_id" class="form-control">
                                @foreach($users as $user)
                                    <option {{$task->executor_id == $user->id ? 'selected' : ' '}} value="{{$user->id}}">
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
                                <div class="input-group-text">Тип задания</div>
                            </div>
                            <input readonly name="point"   type="text" class="form-control"  value="{{  $task->type->name}}" >

                        </div>
                    </div>
                </div>

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Статус</div>
                            </div>
                            <select readonly name="status_id" class="form-control">
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

                            <input readonly name="point"   type="text" class="form-control"  value="{{  $task->priority->name}}" >

                        </div>
                    </div>
                </div>


                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Сложность</div>
                            </div>
                            <input readonly name="point" required type="number" class="form-control"  value="{{$task->point}}" >
                        </div>
                    </div>
                </div>

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Branch</div>
                            </div>
                            <input readonly name="branch" required type="text" class="form-control"  value="{{$task->branch}}" >
                        </div>
                    </div>
                </div>

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Дата начала выполния</div>
                            </div>
                            <input readonly name="date_begin" required type="date" class="form-control"  value="{{$task->date_begin}}" >
                        </div>
                    </div>
                </div>

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Дата создания</div>
                            </div>
                            <input readonly name="created_at" required type="date" class="form-control"  value="{{$task->created_at}}" >
                        </div>
                    </div>
                </div>






                @if(\Illuminate\Support\Facades\Auth::id() ==  $task->executor->id
                ||
                    ( !empty($task->executor->departmnt->chief->id) &&
                        $task->executor->departmnt->chief->id == \Illuminate\Support\Facades\Auth::id()
                    )
                )
                    <input class="col-lg-offset-8 btn btn-success" type="submit" value="Обновить статус">

                @endif





            </div>

            <div class="col-md-6">

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Описание</div>
                            </div>
                            <textarea readonly name="description" required  class="form-control"   >
                                {{$task->description}}
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>

        </form>
        <div class="row">

        </div>


@endsection