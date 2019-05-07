@extends('layouts.admin')
@section('content')
    <div class="container event-view">
        <h5><strong>Редактирование ползователя</strong></h5>



        <form class="row" action="{{route('admin-user-edit')}}" method="post" enctype="multipart/form-data" >



            @csrf
            <input type="hidden" class="form-control" name="id"  value="{{$user->id}}" >

            <div class="col-md-6">

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">ФИО</div>
                            </div>
                            <input name="name" required type="text" class="form-control"  value="{{$user->name}}" >
                        </div>
                    </div>
                </div>

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Email</div>
                            </div>
                            <input name="email" required type="email" class="form-control" value="{{$user->email}}"  >
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
                                    <option {{$user->user_type_id == $userType->id ? 'selected' : ' '}} value="{{$userType->id}}">
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
                                    <option {{$user->department_id == $department->id ? 'selected' : ' '}} value="{{$department->id}}">
                                        {{$department->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

            </div>

                <div class="col-md-6">

                    <div class="event-option">
                        <div class="col-sm-10 my-1">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Фото</div>
                                </div>
                                <input name="img"   type="file" class="form-control">
                                <img style="width: 100px;" src="{{asset('images/users/'.$user->img)}}" alt="">
                            </div>
                        </div>
                    </div>

                </div>





                <div class="event-option col-md-4 col-md-offset-6">
                    <input class="btn btn-success my-2 my-sm-0" type="submit" value="Обновть"/>
                </div>





        </form>



@endsection