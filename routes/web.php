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
    Route::get('/libros/existencia', 'BooksController@existencia')->name('existencia');
    Route::get('/libros/agregar/index', 'BooksController@agregarIndex')->name('agregarIndex');
    Route::post('/libros/agregar', 'BooksController@addBook')->name('pelicula.agregar');
    Route::get('/libros', 'BooksController@index')->name('pelicula');
    Route::get('/libros/reservar/{id}', 'BooksController@reservarIndex')->name('pelicula.reservarIndex');
    Route::post('/libros/reservar', 'BooksController@reservar')->name('pelicula.reservar');
    Route::post('/libros/eliminar/{id}', 'BooksController@delete')->name('book.delete');
    Route::get('/libros/actualizar/{id}', 'BooksController@updateIndex')->name('pelicula.updateIndex');
    Route::post('/libros/actualizar', 'BooksController@update')->name('book.update');
    Route::get('/libros/devolver', 'BooksController@backIndex')->name('book.backIndex');
    Route::get('/libros/devolver/{id}', 'BooksController@back')->name('book.back');
});
