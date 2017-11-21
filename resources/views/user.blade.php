@extends('layouts.layout')

@section('content')

    <div class="container-fluid">
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
        <p class="text-left genre-text">Мои фильмы</p>
        <img src="style/pictures/arrow.png" alt="" class="pull-right icon-forward">
    </div>

    <div class="container-fluid bg-grey">
        <div class="row text-center">
            <div class="col-sm-3">
                <div class="thumbnail card-film">
                    <img src="style/pictures/1.jpg" class="film-pic">
                    <div class="film-main">
                        <div class="pull-right rating">
                            <img src="style/pictures/star.png">
                            <img src="style/pictures/star.png">
                            <img src="style/pictures/star.png">
                            <img src="style/pictures/star.png">
                            <img src="style/pictures/star.png">
                        </div>
                        <p class="text-left"><strong>Family Guy</strong></p>
                    </div>
                    <p class="text-left film-description">Разнообразный и богатый опыт
                        укрепления иразвития структуры играет
                        важную роль в формировании новых
                        предложений. Не следует забывать, что
                        дальнейшее развитие различных форм
                        деятельности позволяет выполнять
                        важные задания по разработке условий.
                    </p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="thumbnail card-film">
                    <img src="style/pictures/1.jpg" class="film-pic">
                    <div class="film-main">
                        <div class="pull-right rating">
                            <img src="style/pictures/star.png">
                            <img src="style/pictures/star.png">
                            <img src="style/pictures/star.png">
                            <img src="style/pictures/star.png">
                            <img src="style/pictures/star.png">
                        </div>
                        <p class="text-left"><strong>Family Guy</strong></p>
                    </div>

                    <p class="text-left film-description">Разнообразный и богатый опыт
                        укрепления иразвития структуры играет
                        важную роль в формировании новых
                        предложений. Не следует забывать, что
                        дальнейшее развитие различных форм
                        деятельности позволяет выполнять
                        важные задания по разработке условий.</p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="thumbnail card-film">
                    <img src="style/pictures/1.jpg" class="film-pic">
                    <div class="film-main">
                        <div class="pull-right rating">
                            <img src="style/pictures/star.png">
                            <img src="style/pictures/star.png">
                            <img src="style/pictures/star.png">
                            <img src="style/pictures/star.png">
                            <img src="style/pictures/star.png">
                        </div>
                        <p class="text-left"><strong>Family Guy</strong></p>
                    </div>

                    <p class="text-left film-description">Разнообразный и богатый опыт
                        укрепления иразвития структуры играет
                        важную роль в формировании новых
                        предложений. Не следует забывать, что
                        дальнейшее развитие различных форм
                        деятельности позволяет выполнять
                        важные задания по разработке условий.</p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="thumbnail card-film">
                    <img src="style/pictures/1.jpg" class="film-pic">
                    <div class="film-main">
                        <div class="pull-right rating">
                            <img src="style/pictures/star.png">
                            <img src="style/pictures/star.png">
                            <img src="style/pictures/star.png">
                            <img src="style/pictures/star.png">
                            <img src="style/pictures/star.png">
                        </div>
                        <p class="text-left"><strong>Family Guy</strong></p>
                    </div>

                    <p class="text-left film-description">Разнообразный и богатый опыт
                        укрепления иразвития структуры играет
                        важную роль в формировании новых
                        предложений. Не следует забывать, что
                        дальнейшее развитие различных форм
                        деятельности позволяет выполнять
                        важные задания по разработке условий.</p>
                </div>
            </div>
    </div>
    </div>

    <div class="container-fluid genre-tab other">
        <p class="text-left genre-text">Хочу посмотреть</p>
        <img src="style/pictures/arrow.png" alt="" class="pull-right icon-forward">
    </div>

    <div class="container-fluid bg-grey">
        <div class="row text-center">
            <div class="col-sm-3">
                <div class="thumbnail card-film">
                    <img src="style/pictures/1.jpg" class="film-pic">
                    <div class="film-main">
                        <div class="pull-right rating">
                            <img src="style/pictures/star.png">
                            <img src="style/pictures/star.png">
                            <img src="style/pictures/star.png">
                            <img src="style/pictures/star.png">
                            <img src="style/pictures/star.png">
                        </div>
                        <p class="text-left"><strong>Family Guy</strong></p>
                    </div>
                    <p class="text-left film-description">Разнообразный и богатый опыт
                        укрепления иразвития структуры играет
                        важную роль в формировании новых
                        предложений. Не следует забывать, что
                        дальнейшее развитие различных форм
                        деятельности позволяет выполнять
                        важные задания по разработке условий.
                    </p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="thumbnail card-film">
                    <img src="style/pictures/1.jpg" class="film-pic">
                    <div class="film-main">
                        <div class="pull-right rating">
                            <img src="style/pictures/star.png">
                            <img src="style/pictures/star.png">
                            <img src="style/pictures/star.png">
                            <img src="style/pictures/star.png">
                            <img src="style/pictures/star.png">
                        </div>
                        <p class="text-left"><strong>Family Guy</strong></p>
                    </div>

                    <p class="text-left film-description">Разнообразный и богатый опыт
                        укрепления иразвития структуры играет
                        важную роль в формировании новых
                        предложений. Не следует забывать, что
                        дальнейшее развитие различных форм
                        деятельности позволяет выполнять
                        важные задания по разработке условий.</p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="thumbnail card-film">
                    <img src="style/pictures/1.jpg" class="film-pic">
                    <div class="film-main">
                        <div class="pull-right rating">
                            <img src="style/pictures/star.png">
                            <img src="style/pictures/star.png">
                            <img src="style/pictures/star.png">
                            <img src="style/pictures/star.png">
                            <img src="style/pictures/star.png">
                        </div>
                        <p class="text-left"><strong>Family Guy</strong></p>
                    </div>

                    <p class="text-left film-description">Разнообразный и богатый опыт
                        укрепления иразвития структуры играет
                        важную роль в формировании новых
                        предложений. Не следует забывать, что
                        дальнейшее развитие различных форм
                        деятельности позволяет выполнять
                        важные задания по разработке условий.</p>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="thumbnail card-film">
                    <img src="style/pictures/1.jpg" class="film-pic">
                    <div class="film-main">
                        <div class="pull-right rating">
                            <img src="style/pictures/star.png">
                            <img src="style/pictures/star.png">
                            <img src="style/pictures/star.png">
                            <img src="style/pictures/star.png">
                            <img src="style/pictures/star.png">
                        </div>
                        <p class="text-left"><strong>Family Guy</strong></p>
                    </div>

                    <p class="text-left film-description">Разнообразный и богатый опыт
                        укрепления иразвития структуры играет
                        важную роль в формировании новых
                        предложений. Не следует забывать, что
                        дальнейшее развитие различных форм
                        деятельности позволяет выполнять
                        важные задания по разработке условий.</p>
                </div>
        </div>
        </div>

    </div>

@endsection