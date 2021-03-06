<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SOFTTECO</title>

    <!-- Scripts -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">

    <script src="{{asset('js/jq.js')}}"></script>
    <!-- Styles -->

    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="background: #2f6bd0;
    height: 100px;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="col-md-4" src="{{asset('images/logo.png')}}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a style="padding: 10px; text-decoration: none;" class="btn-sm btn-success" href="{{ route('login') }}">Вход</a>
                            </li>
                            @if (Route::has('register'))

                            @endif
                        @else
                            <li>

                                <a id="navbarDropdown" href="#" style="padding: 10px; text-decoration: none;" class="btn-sm btn-info">
                                    {{ Auth::user()->name }}
                                </a>


                                <a style="padding: 10px; margin-left: 10px; text-decoration: none;" class="btn-sm btn-danger" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Выход
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>

                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('home')}}">Главная <span class="sr-only">(current)</span></a>
                        </li>








                                <li class="nav-item">
                                    <a class="nav-link" href="/projects">Проекты <span class="sr-only">(current)</span></a>
                                </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/departments">Дипортамент<span class="sr-only">(current)</span></a>
                            </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/users">Сотрудники <span class="sr-only">(current)</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/tasks">Задания<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/cabinet">Мой кабинет<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/desk">Доска<span class="sr-only">(current)</span></a>
                        </li>
                    </ul>

                </div>
            </nav>
        </div>

        <main >
            @yield('content')
        </main>
    </div>


</body>

<script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>


</html>
