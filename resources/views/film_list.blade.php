@extends('layouts.layout')

@section('content')

    @if(!count($films))
        <div class="container-fluid bg-grey">
            <h2>Результаты не найдены.</h2>
        </div>
    @endif
    @foreach($films as $film)
        @if($loop->index % 6 == 0)
        <div class="container-fluid bg-grey">
        <div class="row text-center">
        @endif
            <div class="col-md-2">
                <a href="{{url('/film/'.$film->id)}}">
                <div class="thumbnail card-film">
                    <img src="{{$film->getPosterPath()}}" class="film-pic">
                    <div class="film-main">
                        <div class="pull-right rating">
                            @for($i=1; $i<=$film->rating; $i++)
                                <img src="{{ asset('pictures/star.png')}}">
                            @endfor
                            @for($i=$film->rating + 1; $i<=5; $i++)
                                <img src="{{ asset('pictures/nstar.png')}}">
                            @endfor
                        </div>
                        <p class="text-left"><strong>{{$film->name}}</strong></p>
                    </div>
                </div>
                </a>
            </div>
        @if(($loop->index % 6 == 5)||$loop->last)
        </div>
        </div>
        @endif
    @endforeach

@endsection