<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!--<link href=" asset('css/app.css') " rel="stylesheet">-->
    <link href="{{ asset('css/nav-bar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/film.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <title>{{ config('app.name', 'Filmania') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNav">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{ url('/') }}" class="pull-left">
                    <img src="{{ asset('pictures/logo.png')}}" class="logo">
                </a>
                <p class="navbar-brand">Filmania</p>
            </div>

            <div class="collapse navbar-collapse" id="myNav">
                <div class="col-sm-6">
                    <form class="navbar-form" method="get" action="{{ url('/film/search') }}">
                        <div class="form-group">
                            <input name="name" type="text" class="form-control" placeholder="Поиск">
                        </div>
                        <button type="submit" class="btn btn-default">
                            <span class="glyphicon glyphicon-search search"></span>
                        </button>
                    </form>

                    <ul class="nav navbar-nav film-nav">
                        <li class="menu text-center"><a href="{{ url('/') }}">Главная</a></li>
                        <li class="menu text-center"><a href="{{ url('/film/new') }}">Новинки</a></li>
                        <li class="menu text-center"><a href="{{ url('/film/top') }}">Топ фильмов</a></li>
                        <li class="menu text-center dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                Жанры<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('/film/genre?genre=омедия') }}">Комедия</a></li>
                                <li><a href="#">Мелодрамма</a></li>
                                <li><a href="#">Ужасы</a></li>
                            </ul>
                        </li>
                        @if(Auth::check() && Auth::user()->isAdmin())
                        <li class="menu text-center">
                            <a href="{{ url('/admin/create') }}">Добавить</a>
                        </li>
                        @endif
                    </ul>
                </div>

                <div class="col-sm-2">
                    <div class="pull-right">
                        @guest
                            <a  href="{{ route('login') }}">
                                <button type="submit" class="btn btn-default my-btn">Войти</button>
                            </a>
                        @else
                            <a href="{{ url('/user/me') }}">
                                <button class="btn btn-default my-btn"> {{ Auth::user()->first_name}}
                                @if(Auth::check() && Auth::user()->isAdmin())
                                    (Admin)
                                @endif
                                </button>
                            </a>
                            <a  href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <button type="submit" class="btn btn-default my-btn">Выйти</button>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    {{ csrf_field() }}
                                </form>
                            </a>
                        @endguest
                    </div>
                </div>
            </div>

        </div>
    </div>
</nav>

@yield('content')

<div class="panel-footer">
    <p class="pull-right">Filmania 2017</p>
</div>
</body>
</html>