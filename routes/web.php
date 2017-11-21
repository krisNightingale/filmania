<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'FilmController@getMain');

Route::group(['prefix' => 'film'], function () {
    Route::get('/', 'FilmController@getMain');
    Route::get('/all', 'FilmController@getAll');
    Route::get('/top', 'FilmController@getAll');
    Route::get('/new', 'FilmController@getAll');
    Route::get('/{film_id}', 'FilmController@getFilmById');
    Route::post('/{film_id}/user/{user_id}', 'FilmController@addToWatchlist');
});

Route::group(['prefix' => 'user'], function () {
    Route::get('/', 'UserController@getUserList');
    Route::get('/me', 'UserController@getCurrentUser');
    Route::get('/info', 'UserController@userInfo');
    Route::post('/info', 'UserController@updateUserInfo');
    Route::post('/{user_id}/film/{film_id}/review', 'UserController@setReview');
});

Route::group(['prefix' => 'admin'], function () {
    Route::post('/create', 'AdminController@createFilm');
    Route::post('/update', 'AdminController@updateFilm');
    Route::post('/delete', 'AdminController@deleteFilm');
});

Auth::routes();
