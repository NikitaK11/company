@extends('layouts.admin')
@section('content')
    <div class="container event-view">
        <h5><strong>Добавление проекта</strong></h5>


        <form class="row" action="{{route('admin-project-add')}}" method="post" enctype="multipart/form-data" >



            @csrf

            <div class="col-md-6">



                <div class="event-option">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Название</div>
                            </div>
                            <input name="name" required type="text" class="form-control"   >
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

                        </div>
                    </div>
                </div>


                <input type="submit" class="btn btn-success" value="Добавить">

            </div>


        </form>



@endsection