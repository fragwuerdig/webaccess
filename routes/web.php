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


use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/users', [HomeController::class, 'users'])->name('users');
Route::get('/users/delete/{id}', [HomeController::class, 'users_delete'])->name('users_delete');
Route::post('/users/create', [HomeController::class, 'users_create'])->name('users_create');
Route::post('/users/passwd/{id}', [HomeController::class, 'users_passwd'])->name('users_passwd');
Route::post('/aliases/add', [HomeController::class, 'aliases_add'])->name('aliases_add');
Route::post('/aliases/delete/{id}', [HomeController::class, 'aliases_delete'])->name('aliases_delete');
Route::get('/aliases', [HomeController::class, 'aliases'])->name('aliases');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

