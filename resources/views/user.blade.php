@extends('layouts.app')
@section('content')
    <div class="container event-view">
        <h5><strong>Просмотр ползователя</strong></h5>



        <form class="row" action="{{route('admin-user-add')}}" method="post" enctype="multipart/form-data" >



            @csrf


            <div class="col-md-6">

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">ФИО</div>
                            </div>
                            <input name="name" readonly type="text" class="form-control"  value="{{$user->name}}" >
                        </div>
                    </div>
                </div>

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Email</div>
                            </div>
                            <input name="email" readonly type="email" class="form-control" value="{{$user->email}}"  >
                        </div>
                    </div>
                </div>

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Должность</div>
                            </div>
                            <input  readonly type="text" class="form-control" value="{{$user->userType->name}}"  >
                        </div>
                    </div>
                </div>

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Департамент</div>
                            </div>
                            <input  readonly type="text" class="form-control" value="{{$user->department->name}}"  >
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-6">
                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Фото</div>
                            </div>
                            <img src="{{asset('/images/users/'.$user->img)}}" style="width: 200px; height: 200px;" alt="">
                        </div>
                    </div>
                </div>
            </div>


        </form>



@endsection