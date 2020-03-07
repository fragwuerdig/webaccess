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



//Route::get('/users', function(){
	
	//return view('users');
	
//})->name('users');

//Route::get('/aliases', function(){
	
	//return view('aliases');
	
//})->name('aliases');

//Route::get('/logout', function(){
	
	//return 'logout';
	
//})->name('logout');

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users', 'HomeController@users')->name('users');
Route::get('/users/delete/{id}', 'HomeController@users_delete')->name('users_delete');
Route::post('/users/create', 'HomeController@users_create')->name('users_create');
Route::post('/users/passwd/{id}', 'HomeController@users_passwd')->name('users_passwd');
Route::post('/aliases/add', 'HomeController@aliases_add')->name('aliases_add');
Route::get('/aliases', 'HomeController@aliases')->name('aliases');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');


