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

Route::get('/principal', function () {
    return view('principal');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/type_movie', 'TypeMovieController');

Route::resource('/movie', 'MovieController');

Route::get('/mostrarpeliculaspdf', 'MovieController@pdf')->name('movie.pdf');

Route::get('/mostrargenerospdf', 'TypeMovieController@pdf')->name('type_movie.pdf');