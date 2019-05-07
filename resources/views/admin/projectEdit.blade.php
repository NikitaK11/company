@extends('layouts.admin')
@section('content')
    <div class="container event-view">
        <h5><strong>Редактирование проекта</strong></h5>


        <form class="row" action="{{route('admin-project-update')}}" method="post" enctype="multipart/form-data" >



            @csrf

            <input type="hidden" name="id" value="{{$project->id}}">
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
                            <input name="name" required type="text" class="form-control"  value="{{$project->name}}" >
                        </div>
                    </div>
                </div>

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Лого</div>
                            </div>
                            <input type="file" name="img" class="form-control">
                            <img style="width: 100px;" src="{{asset('/images/projects/'.$project->img)}}" alt="">
                        </div>
                    </div>
                </div>


                <input type="submit" class="btn btn-success" value="Обновить">

            </div>


        </form>



@endsection