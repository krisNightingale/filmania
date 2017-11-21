@extends('layouts.layout')

@section('content')

    <div id="myCarousel" class="carousel" data-ride="carousel"> <!--slide добавить в класс-->

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="{{ asset('pictures/1.jpg')}}" class="img-responsive">
                <div class="carousel-caption">
                    <h3 class="col-md-8 col-md-offset-2 text-center">Побег из Шоушенка</h3>
                    <p class="col-md-8 col-md-offset-2 text-center">Шоушенк — название тюрьмы. И если тебе нет еще 30-ти, а ты получаешь пожизненное, то приготовься к худшему: для тебя выхода из Шоушенка не будет!</p>
                    <div class="col-md-8 col-md-offset-2 hover-slide text-center">
                        <a href="#page-intro" class="btn btn-default continue-btn">Подробнее</a>
                    </div>
                </div>
            </div>

            <div class="item">
                <img src="{{ asset('pictures/2.jpg')}}">
                <div class="carousel-caption">
                    <h3 class="col-md-8 col-md-offset-2 text-center">Форест Гамп</h3>
                    <p class="col-md-8 col-md-offset-2 text-center">«Фо́ррест Гамп» — драма, девятый полнометражный фильм режиссёра Роберта Земекиса. Поставлен по одноимённому роману Уинстона Грума, вышел на экраны в 1994 году.</p>
                    <div class="col-md-8 col-md-offset-2 hover-slide text-center">
                        <button type="button" class="btn btn-default continue-btn">Подробнее</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>

        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>

    </div>

    <div class="container-fluid genre-tab">
        <p class="text-left genre-text">Новинки</p>
        <img src="{{ asset('pictures/arrow.png')}}" alt="" class="pull-right icon-forward">
    </div>

    <div class="container-fluid bg-grey">

            @foreach($top as $film)
            @if($loop->index % 4 == 0)
                <div class="row text-center">
            @endif
                <div class="col-sm-3">
                    <div class="thumbnail card-film">
                        <img src="{{$film->getPosterPath()}}" class="film-pic">
                        <div class="film-main">
                            <div class="pull-right rating">
                                <img src="{{asset('pictures/star.png')}}">
                                <img src="{{asset('pictures/star.png')}}">
                                <img src="{{asset('pictures/star.png')}}">
                                <img src="{{asset('pictures/star.png')}}">
                                <img src="{{asset('pictures/star.png')}}">
                            </div>
                            <p class="text-left"><strong>{{$film->name}}</strong></p>
                        </div>
                    </div>
                </div>
            @if($loop->index % 4 == 3)
                </div>
            @endif
            @endforeach

    </div>

    <div class="container-fluid genre-tab other">
        <p class="text-left genre-text">Топ просмотров</p>
        <img src="{{ asset('pictures/arrow.png')}}" alt="" class="pull-right icon-forward">
    </div>


@endsection