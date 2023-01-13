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

Route::get('/', function () {
    return view('welcome');
});
// Auth::routes(['verify' => true]);

Route::post('image-upload', 'ImageUploadController@store')->name('image.store');


Auth::routes();

Route::get('/email/verify/{id}','AdminController@verificate_email');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('pdf', 'InformesController@general')->name('pdf');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin','AdminController@index');
    Route::resource('/admin','AdminController');
    //CRUD
    Route::get('/users/{user}','AdminController@show')->name('users.show');
    Route::get('/users/{user}/edit','AdminController@edit')->name('users.edit');
    
    Route::get('/articles/newArticle', 'ArticleController@showRegistrationForm');
    Route::resource('/articles','ArticleController');
    Route::put('/articles/{article}/softdel','ArticleController@softdel')->name('articles.softdel');

    Route::put('/users/{user}/activate','AdminController@activate')->name('users.activate');
    Route::put('/users/{user}/desactivate','AdminController@desactivate')->name('users.desactivate');
    Route::put('/users/{user}/softdel','AdminController@softdel')->name('users.softdel');
    Route::put('/users/{user}/update','AdminController@update')->name('users.update');
    
});

    Route::resource('/offers','OfferController');
    Route::post('offers/apply/{id}','OfferController@apply')->name('users.offerApply');
    Route::get('offers/show/{id}','OfferController@show')->name('users.offerShow');
