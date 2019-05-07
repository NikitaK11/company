@extends('layouts.admin')
@section('content')
    <div class="container">




        <h3>Департаменты  <span class="	glyphicon glyphicon-lock"></span></h3>
        <a href="/admin/department/create-view" class="btn btn-info">Добавить департамент</a>
        <div class="block-border"  style="margin-top: 10px;">
            <table class="table table-hover ">
                <thead>
                <tr>
                    <th scope="col">№</th>
                    <th scope="col">Название</th>
                    <th scope="col">Адрес</th>
                    <th scope="col">Телефон</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Руководитель</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($departments as $department)
                    <tr>
                        <th scope="row">{{$department->id}}</th>
                        <td>{{$department->name}}</td>
                        <td>{{$department->address}}</td>
                        <td>{{$department->phone}}</td>
                        <td>
                            <textarea readonly style="height: 75px;" class="form-control">
                                    {{$department->description}}
                            </textarea>

                        </td>
                        <td>{{!empty($department->chief->name)? $department->chief->name : ' '}}</td>
                        <td>
                            <a href="/admin/department/edit?id={{$department->id}}" class="btn btn-danger">Редактировать</a>
                        </td>
                        <td>
                            <a href="/admin/department?id={{$department->id}}" class="btn btn-info">Просмотр</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>



    </div>


@endsection