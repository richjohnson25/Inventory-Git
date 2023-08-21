<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoodsController;
use App\Http\Controllers\TransactionController;

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
    return view('dashboard');
});
Route::get('/home', 'App\Http\Controllers\UserController@homePage');

Route::get('/register','App\Http\Controllers\UserController@registerPage');
Route::post('/register', 'App\Http\Controllers\UserController@register');

Route::post('/registerOutlet', 'App\Http\Controllers\UserController@registerOutlet');

Route::get('/login','App\Http\Controllers\UserController@loginPage');
Route::post('/login', 'App\Http\Controllers\UserController@login');

Route::get('/dashboard', 'App\Http\Controllers\GoodsController@dashboardPage');

Route::get('/goods.listIndex', 'App\Http\Controllers\GoodsController@goodsListPage');

Route::get('/suppliers.listIndex', 'App\Http\Controllers\GoodsController@supplierListPage');

Route::get('/customers.listIndex', 'App\Http\Controllers\GoodsController@customerListPage');

Route::get('/stock-in.listIndex', 'App\Http\Controllers\TransactionController@stockInTransactionListPage');

Route::get('/stock-in.approvalIndex', 'App\Http\Controllers\TransactionController@stockInApprovalPage');

Route::get('/stock-in.chooseDateRange', 'App\Http\Controllers\TransactionController@chooseStockInDateRange');

Route::get('/stock-out.listIndex', 'App\Http\Controllers\TransactionController@stockOutTransactionListPage');

Route::get('/stock-out.approvalIndex', 'App\Http\Controllers\TransactionController@stockOutApprovalPage');

Route::get('/stock-out.chooseDateRange', 'App\Http\Controllers\TransactionController@chooseStockOutDateRange');