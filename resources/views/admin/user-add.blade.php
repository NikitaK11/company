@extends('layouts.admin')
@section('content')
    <div class="container event-view">
        <h5><strong>Добавление ползователя</strong></h5>



        <form class="row" action="{{route('admin-user-add')}}" method="post" enctype="multipart/form-data" >



            @csrf


            <div class="col-md-6">

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">ФИО</div>
                            </div>
                            <input name="name" required type="text" class="form-control"  >
                        </div>
                    </div>
                </div>

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Email</div>
                            </div>
                            <input name="email" required type="email" class="form-control"  >
                        </div>
                    </div>
                </div>

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Пароль</div>
                            </div>
                            <input name="password" required type="password" class="form-control"  >
                        </div>
                    </div>
                </div>

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Должность</div>
                            </div>
                            <select name="user_type_id" class="form-control">
                                @foreach($userTypes as $userType)
                                    <option value="{{$userType->id}}">
                                        {{$userType->name}}
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
                                <div class="input-group-text">Департамент</div>
                            </div>
                            <select name="department_id" class="form-control">
                                @foreach($departments as $department)
                                    <option value="{{$department->id}}">
                                        {{$department->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>





                <div class="event-option col-md-4">
                    <input class="btn btn-success my-2 my-sm-0" type="submit" value="Добавить"/>
                </div>
            </div>


        </form>



@endsection