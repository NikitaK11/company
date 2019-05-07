@extends('layouts.app')
@section('content')
    <div class="container">




        <h3>Департаменты  <span class="		glyphicon glyphicon-flash"></span></h3>
        <div class="block-border"  style="margin-top: 10px;">
            <table class="table table-hover ">
                <thead>
                <tr>
                    <th scope="col">№</th>
                    <th scope="col">Название</th>

                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($departments as $department)
                    <tr>
                        <th scope="row">{{$department->id}}</th>
                        <td>{{$department->name}}</td>

                        <td>
                            <a href="/users?id={{$department->id}}" class="btn btn-info">Просмотр</a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>



    </div>


@endsection