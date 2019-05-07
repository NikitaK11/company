@extends('layouts.admin')
@section('content')
    <div class="container event-view">
        <h5><strong>Просмотр проекта</strong></h5>

        <a href="/admin/project/edit?id={{$project->id}}" style="margin-left: 300px;" class="btn btn-danger">Редактировать</a>

        <form class="row" action="{{route('admin-user-add')}}" method="post" enctype="multipart/form-data" >



            @csrf


            <div class="col-md-6">

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">№</div>
                            </div>
                            <input name="name" readonly type="text" class="form-control"  value="{{$project->id}}" >
                        </div>
                    </div>
                </div>

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Название</div>
                            </div>
                            <input name="name" readonly type="text" class="form-control"  value="{{$project->name}}" >
                        </div>
                    </div>
                </div>

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Лого</div>
                            </div>
                            <img style="width: 100px;" src="{{asset('/images/projects/'.$project->img)}}" alt="">
                        </div>
                    </div>
                </div>


            </div>


        </form>



@endsection