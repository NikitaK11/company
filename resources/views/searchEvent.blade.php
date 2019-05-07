@extends('layouts.app')
@section('content')
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{'images/slider/1.png'}}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{'images/slider/2.jpg'}}" alt="Second slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto event-type-menu">
                        @foreach($eventTypes as $eventType)
                            <li class="nav-item" >
                                <a class="nav-link" href="/event-type/{{$eventType->id}}">{{$eventType->name}}  <span class="sr-only">(current)</span></a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </nav>
        </div>

        <form action="search" >
            <div>
                <div class="filter-container">
                    <h5> Найти по дате :</h5>
                    <div class="date-filter">
                        <div class="col-sm-10 my-1">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">От</div>
                                </div>
                                <input name="dateFrom" value="{{$dateFrom}}" type="date" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="date-filter">
                        <div class="col-sm-10 my-1">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">До</div>
                                </div>
                                <input name="dateTo" value="{{$dateTo}}" type="date" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <input type="submit"  class="btn btn-success my-2 my-sm-0" value="Найти">
                </div>

            </div>
        </form>

        <div class="events-nearest-block row">
            <div class="block-title">
                <p>Результат</p>
            </div>

            <div class="container">
                @if(count($events)==0)
                    <h5>Нечего не найдено</h5>
                @endif
                @foreach($events as $event)
                    <div class="event col-md-3">
                        <img src="{{asset( 'images/events/' . $event->img)}}" alt="">
                        <div class="event-option">
                            <p>Дата : {{$event->date_begin_event}}</p>
                        </div>

                        <div class="event-option">
                            <p>Стоимость : {{$event->price}} BYN</p>
                        </div>

                        <div class="event-option">
                            <p>Место : {{$event->place->name}}</p>
                        </div>
                        <div class="event-option">
                            <a href="event/{{$event->id}}" class="btn btn-info my-2 my-sm-0">Подробно</a>
                        </div>
                        <div style="margin-top: 5px;" class="event-option">
                            <a href="/basket/{{$event->id}}" class="btn btn-success my-2 my-sm-0">Купить</a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>


@endsection