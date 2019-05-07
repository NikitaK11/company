@extends('layouts.app')
@section('content')
    <div class="container">



        <h3>Сотрудники  <span class="glyphicon glyphicon-user"></span></h3>
        <div class="event-option">
            <div class="col-sm-10 my-1">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Департамент</div>
                    </div>
                    <input style="width: 280px;" type="text" readonly class="form-control" value="{{$department->name}}">
                </div>
            </div>
        </div>

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

                    <th scope="col">Фото</th>
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
                            <a href="/user?id={{$user->id}}" class="btn btn-info">Просмотр</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <script>

            $(document).ready(function () {
                let currentDepartment = $('#selectDepartment').val();
                $('#selectDepartment').click(function () {

                    let id = this.val();
                    if (currentDepartment != id){
                        document.location = '/users?id='+id;
                    }

                });
            });
        </script>


    </div>




@endsection