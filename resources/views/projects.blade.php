@extends('layouts.app')
@section('content')
    <div class="container">



        <h3>Проекты  <span class="	glyphicon glyphicon-briefcase"></span></h3>

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
                            <a href="/tasks?project_id={{$project->id}}" class="btn btn-info">Задания</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>



    </div>


@endsection