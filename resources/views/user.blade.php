@extends('layouts.layout')

@section('content')

    <div class="container-fluid" style="margin-top: 15px;">
        <div class="pull-left">
            <img src="{{$user->getPhotoPath()}}">
        </div>

        <div class="pull-left user-info">
            <p>Имя: {{$user->first_name}}</p>
            <p>Фамилия: {{$user->last_name}}</p>
            <p>E-mail: {{$user->email}}</p>
            <a  href="{{ url('/user/info') }}">
            <button type="submit" class="btn btn-default my-btn">Редактировать</button>
            </a>
        </div>
    </div>


    <div class="container-fluid genre-tab">
        <p class="text-left genre-text">Просмотренные</p>
        <a href="{{ url('/film/new') }}">
            <img src="{{ asset('pictures/arrow.png')}}" alt="" class="pull-right icon-forward">
        </a>
    </div>

    <div class="container-fluid bg-grey">
        <div class="row text-center">
            @foreach($watched as $film)
                <div class="col-sm-2">
                    <a href="{{url('/film/'.$film->id)}}">
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
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container-fluid genre-tab other">
        <p class="text-left genre-text">Хочу посмотреть</p>
        <a href="{{ url('/film/new') }}">
            <img src="{{ asset('pictures/arrow.png')}}" alt="" class="pull-right icon-forward">
        </a>
    </div>

    <div class="container-fluid bg-grey">
        <div class="row text-center">
            @foreach($wished as $film)
                <div class="col-sm-2">
                    <a href="{{url('/film/'.$film->id)}}">
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
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container-fluid genre-tab other">
        <p class="text-left genre-text">Избранное</p>
        <a href="{{ url('/film/new') }}">
            <img src="{{ asset('pictures/arrow.png')}}" alt="" class="pull-right icon-forward">
        </a>
    </div>

    <div class="container-fluid bg-grey">
        <div class="row text-center">
            @foreach($favorites as $film)
                <div class="col-sm-2">
                    <a href="{{url('/film/'.$film->id)}}">
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
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection