@extends('layouts.layout')

@section('content')

    <div class="container-fluid">

        <div class="pull-left user-info">
            <form method="POST" action="{{ url('/admin/add') }}">
                {{ csrf_field() }}

                <h3>Добавить фильм:</h3><br>

                <label for="name">Название:</label>
                <input id="name" name="name" type="text" class="form-control" placeholder="Название" style="width: 350px;" required autofocus>
                <br>
                <label for="country">Страна:</label>
                <input id="country" name="country" type="text" class="form-control" placeholder="Страна" style="width: 200px;">
                <br>
                <label for="duration">Длительность:</label>
                <input id="duration" name="duration" type="text" class="form-control" placeholder="(мин)" style="width: 100px;">
                <br>
                <div class="form-group">
                    <label for="release_year">Год:</label>
                    <select class="form-control" id="release_year" name="release_year" style="width: 100px;">
                        @for($year = intval(date('Y')); $year > 1950; $year--)
                        <option>{{$year}}</option>
                        @endfor
                    </select>
                </div>
                <label for="genre">Жанр:</label>
                <input id="genre" name="genre" type="text" class="form-control" placeholder="(Комедия)" style="width: 350px;">
                <br>
                <div class="form-group">
                    <label for="description">Описание:</label>
                    <textarea class="form-control" rows="2" id="description" name="description" style="width: 400px;"></textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-success" style="margin-bottom: 20px;">Добавить</button>
            </form>
        </div>
    </div>

@endsection