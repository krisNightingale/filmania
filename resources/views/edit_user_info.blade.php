@extends('layouts.layout')

@section('content')

    <div class="container-fluid">
        <div class="pull-left">
            <img src="{{$user->getPhotoPath()}}">
        </div>

        <div class="pull-left user-info">
            <form method="POST" action="{{ url('/user/info') }}">
                {{ csrf_field() }}

                <p>Имя:
                <input id="first_name" type="text" class="form-control reg-field " name="first_name" placeholder="Имя" value="{{ $user->first_name }}" required autofocus>
                </p>
                <p>Фамилия:
                <input id="last_name" type="text" class="form-control reg-field " name="last_name" placeholder="Фамилия" value="{{ $user->last_name }}" required autofocus>
                </p>
                <button type="submit" class="btn btn-default my-btn">Редактировать</button>
            </form>
        </div>
    </div>

@endsection