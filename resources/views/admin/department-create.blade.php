@extends('layouts.admin')
@section('content')
    <div class="container event-view">
        <h4><strong>Добавление департамента</strong></h4>


        <form class="row" action="/admin/department/create" method="get" enctype="multipart/form-data" >



            @csrf


            <div class="col-md-6">

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Название</div>
                            </div>
                            <input name="name"  required type="text" class="form-control"   >
                        </div>
                    </div>
                </div>

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Адрес</div>
                            </div>
                            <input name="address" required type="text" class="form-control"  >
                        </div>
                    </div>
                </div>

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Телефон</div>
                            </div>
                            <input name="phone" required type="text" class="form-control"  >
                        </div>
                    </div>
                </div>

                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Описание</div>
                            </div>
                            <textarea name="description" required class="form-control"></textarea>
                        </div>
                    </div>
                </div>

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


                <button style="margin-left: 350px;" class="btn btn-success">Добавить</button>



            </div>


        </form>



@endsection