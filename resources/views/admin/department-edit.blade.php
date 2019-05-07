@extends('layouts.admin')
@section('content')
    <div class="container event-view">
        <h4><strong>Редактирование департамента</strong></h4>

        <form id="formAdd" class="row" action="/admin/department/update" method="get" enctype="multipart/form-data" >

            @csrf


            <div class="col-md-6">



                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Название</div>
                            </div>
                            <input name="name"    required type="text" class="form-control" value="{{$department->name}}"  >
                        </div>
                    </div>
                </div>

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Адрес</div>
                            </div>
                            <input name="address"    required type="text" class="form-control" value="{{$department->address}}"  >
                        </div>
                    </div>
                </div>

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Телефон</div>
                            </div>
                            <input name="phone"    required type="text" class="form-control" value="{{$department->phone}}"  >
                        </div>
                    </div>
                </div>

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Описание</div>
                            </div>
                            <textarea style="height: 100px;" name="description" required   class="form-control">
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


                            <select class="form-control" name="chief_id">
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name . ' ' . $user->userType->name}}</option>
                                @endforeach
                            </select>



                        </div>
                    </div>
                </div>
                <button style="position: absolute;bottom: 0;right: 0;" class="btn btn-success">Обновить</button>
            </div>

            <input hidden name="users" id="inputUser" type="text" >

            <input hidden name="department_id" type="text" value="{{$department->id}}" >

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
                <tbody id="tbody">
                @foreach($department->users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->userType->name}}</td>
                        <td>
                            {{ !empty($user->department->name) ? $user->department->name : ' ' }}
                        </td>
                        <td>{{$user->created_at}}</td>
                        <td>
                            <img style="width: 50px;" src="{{asset('/images/users/'.$user->img)}}" alt="">
                        </td>
                        <td>
                            <input style="width: 20px;" type="checkbox" class="form-control input-user" data-user_id="{{$user->id}}"  checked>
                        </td>
                    </tr>
                @endforeach

                @foreach($users as $user)
                    <?php if( empty($user->department_id )){ ?>
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->userType->name}}</td>
                        <td>

                        </td>
                        <td>{{$user->created_at}}</td>
                        <td>
                            <img style="width: 50px;" src="{{asset('/images/users/'.$user->img)}}" alt="">
                        </td>
                        <td>
                            <input style="width: 20px;" type="checkbox" data-user_id="{{$user->id}}" class="form-control input-user"  >
                        </td>
                    </tr>
                    <?php }?>
                @endforeach
                </tbody>
            </table>


        </div>

        <script>


            $(document).ready(function () {
                document.getElementById('tbody')
                    .addEventListener('click',function () {
                        let element = event.target;

                        if (element.classList.contains('input-user')){
                            let users = document.getElementsByClassName('input-user');

                            let buffer = [];

                            for( let i = 0; i < users.length; i++){
                                if(users[i].checked){
                                    buffer.push(users[i].dataset.user_id);
                                }
                            }

                            $('#inputUser').val(JSON.stringify(buffer));
                        }
                    });
            });

        </script>



@endsection