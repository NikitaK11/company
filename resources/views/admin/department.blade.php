@extends('layouts.admin')
@section('content')
    <div class="container event-view">
        <h4><strong>Просмотр департамента</strong></h4>

        <a href="/admin/department/edit?id={{$department->id}}" style="margin-left: 300px;" class="btn btn-danger">Редактировать</a>

        <form class="row" action="{{route('admin-user-add')}}" method="post" enctype="multipart/form-data" >



            @csrf


            <div class="col-md-6">



                    <div class="event-option">
                        <div class="col-sm-10 my-1">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Название</div>
                                </div>
                                <input name="name"  readonly required type="text" class="form-control" value="{{$department->name}}"  >
                            </div>
                        </div>
                    </div>

                    <div class="event-option">
                        <div class="col-sm-10 my-1">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Адрес</div>
                                </div>
                                <input name="name"  readonly required type="text" class="form-control" value="{{$department->address}}"  >
                            </div>
                        </div>
                    </div>

                    <div class="event-option">
                        <div class="col-sm-10 my-1">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Телефон</div>
                                </div>
                                <input name="name"  readonly required type="text" class="form-control" value="{{$department->phone}}"  >
                            </div>
                        </div>
                    </div>

                    <div class="event-option">
                        <div class="col-sm-10 my-1">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Описание</div>
                                </div>
                                <textarea style="height: 100px;" name="description" required readonly class="form-control">
                                    {{$department->description}}
                                </textarea>
                            </div>
                        </div>
                    </div>





            </div>

            <div class="col-md-6">
                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Руководитель</div>
                            </div>
                            <img style="width: 100px; height: 100px;" src="{{asset('/images/users/'.$department->chief->img)}}" alt="">
                            <input name="name"  readonly required type="text" class="form-control" value="{{$department->chief->name}}"  >



                        </div>
                    </div>
                </div>

            </div>


        </form>

        <h4>Сотрудники департамента  <span class="glyphicon glyphicon-user"></span></h4>

        <div  class="block-border">
            <table class="table table-hover ">
                <thead>
                <tr>
                    <th scope="col">№</th>
                    <th scope="col">ФИО</th>
                    <th scope="col">Email</th>
                    <th scope="col">Должность</th>
                    <th scope="col">Департамент</th>
                    <th scope="col">Дата регистрации</th>
                    <th scope="col">Роль</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($department->users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->userType->name}}</td>
                        <td>{{$user->department->name}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>
                            <img style="width: 50px;" src="{{asset('/images/users/'.$user->img)}}" alt="">
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>



@endsection