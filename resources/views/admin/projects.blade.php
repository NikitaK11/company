@extends('layouts.admin')
@section('content')
    <div class="container">



        <h3>Проекты  <span class="	glyphicon glyphicon-briefcase"></span></h3>
        <a href="{{route('admin-project-create')}}" class="btn btn-info">Добавть проект</a>
        <div  class="block-border">
            <table class="table table-hover ">
                <thead>
                <tr>
                    <th scope="col">№</th>
                    <th scope="col">Название</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Изображение</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($projects as $project)
                    <tr>
                        <th scope="row">{{$project->id}}</th>
                        <td>{{$project->name}}</td>
                        <td>{{$project->description}}</td>

                        <td>
                            <img style="width: 100px;" src="{{asset('/images/projects/'.$project->img)}}" alt="">
                        </td>
                        <td>
                            <a href="/admin/project/edit?id={{$project->id}}" class="btn btn-danger">Редактировать</a>
                        </td>
                        <td>
                            <a href="/admin/project?id={{$project->id}}" class="btn btn-info">Просмотр</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>



    </div>


@endsection