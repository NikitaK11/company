@extends('layouts.admin')
@section('content')
    <div class="container">



        <h3>Пользователи  <span class="glyphicon glyphicon-user"></span></h3>
        <a href="{{route('admin-user-add-view')}}" class="btn btn-info">Добавть пользователя</a>
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

                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->userType->name}}</td>
                        <td>{{ !empty( $user->department->name ) ? $user->department->name : ' ' }}</td>
                        <td>{{ (new DateTime($user->created_at))->format('Y-m-d') }}</td>

                        <td>
                            <img style="width: 100px;" src="{{asset('/images/users/'.$user->img)}}" alt="">
                        </td>

                        <td>
                            <a href="/admin/user/edit?id={{$user->id}}" class="btn btn-danger">Редактировать</a>
                        </td>
                        <td>
                            <a href="/admin/user?id={{$user->id}}" class="btn btn-info">Просмотр</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>



    </div>


@endsection