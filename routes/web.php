<?php

use App\Controllers\AdminController;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

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

// Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin','AdminController@index');
Route::get('/adminMenu','AdminController@showUsers')->name('adminMenu');


//CRUD
Route::get('/users/{user}','AdminController@show')->name('users.show');
Route::get('/users/{user}/edit','AdminController@edit')->name('users.edit');
Route::put('/users/{user}/activate','AdminController@activate')->name('users.activate');
Route::put('/users/{user}/desactivate','AdminController@desactivate')->name('users.desactivate');
Route::put('/users/{user}/softdel','AdminController@softdel')->name('users.softdel');
Route::put('/users/{user}/update','AdminController@update')->name('users.update');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/register/verify/{id}', 'HomeController@verify')->name('email.activate');

Route::get('/enviarEmail', 'HomeController@enviarEmail')->name('enviarEmail');

