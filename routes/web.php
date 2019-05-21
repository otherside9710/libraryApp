<?php

use \Illuminate\Support\Facades\Auth;

Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    Route::get('/', function () {
        if (isset(\Illuminate\Support\Facades\Auth::user()->id)) {
            return redirect()->route('home');
        } else {
            return view('auth.login');
        }
    });

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/peliculas/existencia', 'BooksController@existencia')->name('existencia');
    Route::get('/peliculas/agregar/index', 'BooksController@agregarIndex')->name('agregarIndex');
    Route::post('/peliculas/agregar', 'BooksController@addBook')->name('pelicula.agregar');
    Route::get('/peliculas', 'BooksController@index')->name('pelicula');
    Route::get('/pelicula/reservar/{id}', 'BooksController@reservarIndex')->name('pelicula.reservarIndex');
    Route::post('/pelicula/reservar', 'BooksController@reservar')->name('pelicula.reservar');
    Route::post('/pelicula/eliminar/{id}', 'BooksController@delete')->name('pelicula.delete');
    Route::get('/pelicula/actualizar/{id}', 'BooksController@updateIndex')->name('pelicula.updateIndex');
    Route::post('/pelicula/actualizar', 'BooksController@update')->name('book.update');
});
