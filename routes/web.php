<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('/home', 'App\Http\Controllers\UserController@homePage');

Route::get('/register','App\Http\Controllers\UserController@registerPage');
Route::post('/register', 'App\Http\Controllers\UserController@register');

Route::post('/registerOutlet', 'App\Http\Controllers\UserController@registerOutlet');

Route::get('/login','App\Http\Controllers\UserController@loginPage');
Route::post('/login', 'App\Http\Controllers\UserController@login');