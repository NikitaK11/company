@extends('layouts.app')
@section('content')
    <div  style="display:flex;justify-content: center; align-items: center; flex-direction: column">

        <img style="width: 80%;" src="{{asset('images/main.jpg')}}" alt="">
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




    </div>


    @endsection