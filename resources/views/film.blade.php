@extends('layouts.layout')

@section('content')

<div class="container-fluid main-area">
    <div class="col-sm-8 film-area">
        <div class="col-sm-12 container about-film">
            <img src="{{$film->getPosterPath()}}" alt="" class="col-sm-6 film-poster">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-7">
                        <p class="film-name">{{$film->name}}</p>
                        <div class="rating">
                            <img src="{{ asset('pictures/star.png')}}">
                            <img src="{{ asset('pictures/star.png')}}">
                            <img src="{{ asset('pictures/star.png')}}">
                            <img src="{{ asset('pictures/star.png')}}">
                            <img src="{{ asset('pictures/star.png')}}">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        @if(Auth::user()->isAdmin())
                            <a href="{{ url('/admin/update/'.$film->id) }}" class="btn btn-success">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                        @endif
                    </div>
                </div>
                <p>Премьера: {{$film->release_year}}</p>
                <p>Длительность: {{$film->duration}} минут</p>
                <p>Жанр: {{$film->genre}}</p>
                @foreach($film->staff()->get() as $staff)
                    <p>{{$staff->position()->first()->name}}: {{$staff->first_name}} {{$staff->last_name}}</p>
                @endforeach
                <p>Описание: {{$film->description}}</p>
            </div>
        </div>

        @if(Auth::check())
        <div class="container btn-block">
            <div class="col-sm-6 btn-area">
                <div class="row">
                    <div class="col-sm-6">
                        @if(!Auth::user()->hasInWishlist($film->id) && !Auth::user()->hasWatched($film->id))
                            <form method="get" action="{{ url('/user/film/'.$film->id.'/add') }}">
                                <button type="submit" class="btn btn-default continue-btn want-btn">Хочу посмотреть</button>
                            </form>
                        @else
                            <form method="post" action="{{ url('/user/film/'.$film->id.'/remove') }}">
                                <button type="submit" class="btn btn-default continue-btn want-btn">Удалить</button>
                            </form>
                        @endif
                    </div>
                    <div class="col-sm-6">
                        @if(Auth::user()->hasInWishlist($film->id) && !Auth::user()->hasWatched($film->id))
                            <form method="get" action="{{ url('/user/film/'.$film->id.'/watch') }}">
                                <button type="submit" class="btn btn-default continue-btn watched-btn pull-right">Смотрел</button>
                            </form>
                        @else
                            <form method="get" action="{{ url('/user/film/'.$film->id.'/add') }}">
                                <button type="submit" class="btn btn-default continue-btn watched-btn pull-right" >Не смотрел</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                @if(Auth::user()->isFilmFavorite($film->id))
                    <a href="{{ url('/user/film/'.$film->id.'/unlike') }}">
                        <img src="{{ asset('pictures/fav_active.png')}}" alt="" class="fav_icon">
                    </a>
                @else
                    <a href="{{ url('/user/film/'.$film->id.'/like') }}">
                        <img src="{{ asset('pictures/fav_no_active.png')}}" alt="" class="fav_icon">
                    </a>
                @endif
            </div>

        </div>
        @endif

        <div class="container-fluid genre-tab review-tab">
            <p class="text-left genre-text">Отзывы</p>
        </div>

        <div class="comment-zone">
            <div class="col-sm-2">
                <img src="{{ asset('pictures/ava.png')}}" alt="" class="ava center-block">
            </div>

            <div class="col-sm-10 input-comment">
                <textarea class="form-control" rows="5" placeholder="Оставьте свой комментарий..."></textarea>
            </div>

            <a href="#page-intro" class="btn btn-default continue-btn send-btn pull-right" >Отправить</a>
        </div>

    </div>

    <div class="col-sm-4">
        <p class="film-name">Рекомендуем</p>

        <div class="recom-block col-sm-12">
            <div class="recom-card">
                <div class="col-sm-6">
                    <img src="{{ asset('pictures/poster2.jpg')}}" alt="" class="recom-poster">
                </div>

                <div class="col-sm-6 recom-text">
                    <p>Название фильма</p>
                    <p>Премьера: 19 марта 2017</p>
                    <p>Длительность: 97 минут</p>
                    <div class="rating">
                        <img src="{{ asset('pictures/star.png')}}">
                        <img src="{{ asset('pictures/star.png')}}">
                        <img src="{{ asset('pictures/star.png')}}">
                        <img src="{{ asset('pictures/star.png')}}">
                        <img src="{{ asset('pictures/star.png')}}">
                    </div>

                    <a href="#page-intro" class="btn btn-default my-btn my-btn-film">Перейти</a>
                </div>
            </div>

            <div class="recom-card">
                <div class="col-sm-6">
                    <img src="{{ asset('pictures/poster2.jpg')}}" alt="" class="recom-poster">
                </div>

                <div class="col-sm-6 recom-text">
                    <p>Название фильма</p>
                    <p>Премьера: 19 марта 2017</p>
                    <p>Длительность: 97 минут</p>
                    <div class="rating">
                        <img src="{{ asset('pictures/star.png')}}">
                        <img src="{{ asset('pictures/star.png')}}">
                        <img src="{{ asset('pictures/star.png')}}">
                        <img src="{{ asset('pictures/star.png')}}">
                        <img src="{{ asset('pictures/star.png')}}">
                    </div>

                    <a href="#page-intro" class="btn btn-default my-btn my-btn-film">Перейти</a>
                </div>
            </div>

            <div>
                <div class="col-sm-6">
                    <img src="{{ asset('pictures/poster2.jpg')}}" alt="" class="recom-poster">
                </div>

                <div class="col-sm-6 recom-text">
                    <p>Название фильма</p>
                    <p>Премьера: 19 марта 2017</p>
                    <p>Длительность: 97 минут</p>
                    <div class="rating">
                        <img src="{{ asset('pictures/star.png')}}">
                        <img src="{{ asset('pictures/star.png')}}">
                        <img src="{{ asset('pictures/star.png')}}">
                        <img src="{{ asset('pictures/star.png')}}">
                        <img src="{{ asset('pictures/star.png')}}">
                    </div>

                    <a href="#page-intro" class="btn btn-default my-btn my-btn-film">Перейти</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="comments">

    <div class="container-fluid space"></div>

    @foreach($reviews as $review)
    <div class="comment container-fluid">
        <div class="col-sm-1">
            <img src="{{ asset('pictures/comment-ava.jpg')}}" alt="" class="comment-ava">
        </div>
        <div class="col-sm-10 comment-text">
            <p class="film-name">{{$review->user()->first()->first_name}} {{$review->user()->first()->last_name}}</p>
            <p>{{$review->text}}</p>
            <p class="date">{{date('d M Y',strtotime($review->date))}}</p>
        </div>
    </div>
    @endforeach

</div>

@endsection