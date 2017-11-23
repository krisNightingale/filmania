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
    Route::get('/top', 'FilmController@getTop');
    Route::get('/new', 'FilmController@getNew');
    Route::get('/search', 'FilmController@searchFilm');
    Route::get('/genre', 'FilmController@searchFilmByGenre');
    Route::get('/{id}', 'FilmController@getFilmById');
    Route::post('/{film_id}/user/{user_id}', 'FilmController@addToWatchlist');
});

Route::group(['prefix' => 'user'], function () {
    Route::get('/', 'UserController@getUserList');
    Route::get('/me', 'UserController@getMyProfile');
    Route::get('/info', 'UserController@userInfo');
    Route::post('/info', 'UserController@updateUserInfo');
    Route::get('/collections', 'UserController@getMyProfile');
    Route::post('/{user_id}/film/{film_id}/review', 'UserController@setReview');
    Route::get('/film/{id}/add', 'UserController@addToWishlist');
    Route::get('/film/{id}/watch', 'UserController@addToWatched');
    Route::post('/film/{id}/remove', 'UserController@removeFromWatchlist');
    Route::get('/film/{id}/like', 'UserController@addToFavorites');
    Route::get('/film/{id}/unlike', 'UserController@removeFromFavorites');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/create', 'AdminController@createFilm');
    Route::post('/add', 'AdminController@addFilm');
    Route::get('/update/{id}', 'AdminController@updateFilmPage');
    Route::post('/update/{id}', 'AdminController@updateFilm');
    Route::post('/delete/{id}', 'AdminController@deleteFilm');
});

Auth::routes();
