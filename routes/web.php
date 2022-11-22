<?php

use App\Controllers\AdminController;
use App\Controllers\HomeController;
use App\Controllers\Auth\VerificationController;
use Illuminate\ Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


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
// Auth::routes(['verify' => true]);


Auth::routes();

Route::get('/email/verify/{id}','AdminController@verificate_email');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin','AdminController@index');
    //CRUD
    Route::get('/users/{user}','AdminController@show')->name('users.show');
    Route::get('/users/{user}/edit','AdminController@edit')->name('users.edit');

    Route::resource('/articles','ArticleController');

    Route::put('/users/{user}/activate','AdminController@activate')->name('users.activate');
    Route::put('/users/{user}/desactivate','AdminController@desactivate')->name('users.desactivate');
    Route::put('/users/{user}/softdel','AdminController@softdel')->name('users.softdel');
    Route::put('/users/{user}/update','AdminController@update')->name('users.update');
});