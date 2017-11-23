@extends('layouts.layout')

@section('content')

    <div class="container-fluid">

        <div class="pull-left user-info">
            <form method="POST" action="{{ url('/admin/update/'.$film->id) }}">
                {{ csrf_field() }}

                <h3>Добавить фильм:</h3><br>

                <label for="name">Название:</label>
                <input id="name" name="name" value="{{$film->name}}" type="text" class="form-control" placeholder="Название" style="width: 350px;" required autofocus>
                <br>
                <label for="country">Страна:</label>
                <input id="country" name="country" value="{{$film->country}}" type="text" class="form-control" placeholder="Страна" style="width: 200px;">
                <br>
                <label for="duration">Длительность:</label>
                <input id="duration" name="duration" value="{{$film->duration}}" type="text" class="form-control" placeholder="(мин)" style="width: 100px;">
                <br>
                <div class="form-group">
                    <label for="year">Год:</label>
                    <select class="form-control" id="year" name="release_year" style="width: 100px;">
                        @for ($year = date('Y'); $year > 1950; $year--)
                                <option @if ($year == $film->release_year) selected @endif>{{$year}}</option>
                        @endfor
                    </select>
                </div>
                <label for="genre">Жанр:</label>
                <input id="genre" name="genre" value="{{$film->genre}}" type="text" class="form-control" placeholder="(Комедия)" style="width: 350px;">
                <br>
                <div class="form-group">
                    <label for="description">Описание:</label>
                    <textarea class="form-control" rows="2" id="description" name="description" style="width: 400px;">{{$film->description}}</textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-success" style="margin-bottom: 20px;">Обновить</button>
            </form>
        </div>
    </div>

@endsection