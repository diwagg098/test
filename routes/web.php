<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index');
Route::get('/login', 'AuthController@login');
Route::post('/login', 'AuthController@postLogin');
Route::get('/logout', 'AuthController@logout');
Route::get('/register', function () {
    return view('auth.register');
});

Route::post('/register', 'AuthController@register');

// Route Apartement
Route::get('/apartement', 'ApartementController@index');
Route::get('/apartement/book', 'ApartementController@create');
Route::post('/apartement/book', 'ApartementController@store');
Route::get('/apartement/edit/{uniq_id}', 'ApartementController@edit');
Route::post('/apartement/update/{uniq_id}', 'ApartementController@update');
Route::delete('/apartement/delete/{uniq_id}', 'ApartementController@destroy');
