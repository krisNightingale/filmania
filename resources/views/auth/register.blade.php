<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="{{ asset('css/log.css') }}" rel="stylesheet">
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Filmania</title>
</head>

<body>
    <div class="container-fluid background">
        <nav class="navbar">
            <div class="container-fluid">
                <div class="pull-left">
                    <a href="{{ url('/') }}" class="navbar-left">
                        <img src="{{ asset('pictures/logo.png') }}" class="logo">
                    </a>
                </div>

                <div class="pull-right">
                    <a href="{{ route('login') }}">
                        <button type="submit" class="btn btn-default my-btn">Войти</button>
                    </a>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="center-block">
                <form method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <p class="brand-name text-center">Filmania</p>
                    <input id="first_name" type="text" class="form-control reg-field " name="first_name" placeholder="Имя" value="{{ old('first_name') }}" required autofocus>
                    @if ($errors->has('first_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                    @endif
                    <input id="last_name" type="text" class="form-control reg-field " name="last_name" placeholder="Фамилия" value="{{ old('last_name') }}" required autofocus>
                    @if ($errors->has('last_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                    @endif
                    <input id="email" type="email" class="form-control reg-field" placeholder="Email" name="email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    <input id="password" type="password" class="form-control reg-field"  placeholder="Password" name="password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <input id="password-confirm" type="password" class="form-control reg-field last-input"  placeholder="Confirm password" name="password_confirmation" required>

                    <button type="submit" class="btn btn-default reg-btn reg-field">Зарегистрироваться</button>
                </form>
            </div>
        </div>


        <div class="container-fluid reg-footer">
            <p class="brand-footer text-right">Filmania, 2017</p>
        </div>
    </div>

</body>
</html>