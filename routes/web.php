<?php

use App\Controllers\AdminController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin','AdminController@index');
Route::get('/adminMenu','AdminController@showUsers')->name('adminMenu');


//CRUD
Route::get('/users/{user}','AdminController@show')->name('users.show');
Route::delete('/users/{user}','AdminController@destroy')->name('users.delete');
Route::put('/users/{user}','AdminController@activate')->name('users.activate');
Route::put('/users/{user}','AdminController@desactivate')->name('users.desactivate');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/register/verify/{code}', 'HomeController@verify');

Route::get('/enviarEmail', 'HomeController@enviarEmail')->name('enviarEmail');

