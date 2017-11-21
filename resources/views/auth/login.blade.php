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
                    <a href="{{ route('register') }}">
                        <button type="submit" class="btn btn-default my-btn">Создать аккаунт</button>
                    </a>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="center-block">
                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <p class="brand-name text-center">Filmania</p>
                    <input type="email" class="form-control log-in-field" id="email" value="{{ old('email') }}" required autofocus placeholder="Email" name="email">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

                    <input id="password" type="password" class="form-control log-in-field" name="password" required placeholder="Password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <button type="submit" class="btn btn-default reg-btn reg-field">Войти</button>
                    <div class="container-fluid pass-miss-block text-center">
                        <a href="{{ route('password.request') }}" class="pass-miss">Забыли пароль?</a>
                    </div>
                </form>
            </div>
        </div>


        <div class="container-fluid reg-footer">
            <p class="brand-footer text-right">Filmania, 2017</p>
        </div>
    </div>

</body>
</html>