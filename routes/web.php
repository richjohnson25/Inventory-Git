<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
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
    return view('home');
});

Route::get('/home', 'App\Http\Controllers\UserController@homePage');

Route::get('/register','App\Http\Controllers\UserController@registerPage');
Route::post('/register', 'App\Http\Controllers\UserController@register');

Route::post('/registerOutlet', 'App\Http\Controllers\UserController@registerOutlet');

Route::get('/login','App\Http\Controllers\UserController@loginPage');
Route::post('/login', 'App\Http\Controllers\UserController@login');

Route::get('/dashboard', 'App\Http\Controllers\ProductController@dashboardPage');

Route::get('/products', 'App\Http\Controllers\ProductController@productListPage');

Route::get('/products/search/', 'App\Http\Controllers\ProductController@searchProducts')->name('product_search');

Route::get('/products/{$id}', 'App\Http\Controllers\ProductController@showProductReport');

Route::get('/suppliers', 'App\Http\Controllers\ProductController@supplierListPage');

Route::get('/suppliers/search/', 'App\Http\Controllers\ProductController@searchSuppliers')->name('supplier_search');

Route::get('/customers', 'App\Http\Controllers\ProductController@customerListPage');

Route::get('/customers/search/', 'App\Http\Controllers\ProductController@searchCustomers')->name('customer_search');

/*
Route::get('/products/{$id}', function () {
    return view('products.listIndex');
});*/

/*Route::get('/goods/listIndex', 'App\Http\Controllers\GoodsController@goodsListPage');

Route::get('/suppliers/listIndex', 'App\Http\Controllers\GoodsController@supplierListPage');

Route::get('/customers/listIndex', 'App\Http\Controllers\GoodsController@customerListPage');*/

Route::get('/stock_in/index', 'App\Http\Controllers\TransactionController@stockInTransactionIndex');

Route::get('/stock_in/addTransaction', 'App\Http\Controllers\TransactionController@addStockInTransactionPage');

Route::get('/stock_in/approval/{id}', 'App\Http\Controllers\TransactionController@StockInApprovalPage');

Route::get('/stock_in/chooseDate', 'App\Http\Controllers\TransactionController@chooseStockInDateRangePage');

Route::get('/stock_in/report', 'App\Http\Controllers\TransactionController@chooseStockInReportPage');

Route::get('/stock_out/index', 'App\Http\Controllers\TransactionController@stockOutTransactionIndex');

Route::get('/stock_out/addTransaction', 'App\Http\Controllers\TransactionController@addStockOutTransactionPage');

Route::get('/stock_out/approval/{id}', 'App\Http\Controllers\TransactionController@StockOutApprovalPage');

Route::get('/stock_out/chooseDate', 'App\Http\Controllers\TransactionController@chooseStockOutDateRangePage');

Route::get('/stock_out/report', 'App\Http\Controllers\TransactionController@chooseStockOutReportPage');

/*
Route::get('/stock_in/approve/{$id}', function () {
    return view('stock-in.approve');
});

Route::get('/stock_in/report', function () {
    return view('stock-in.chooseDateRange');
});

Route::get('/stock_out/approve/{$id}', function () {
    return view('stock-out.approve');
});

Route::get('/stock_out/report', function () {
    return view('stock-out.chooseDateRange');
});*/

/*Route::get('/stock-in.listIndex', 'App\Http\Controllers\TransactionController@stockInTransactionListPage');

Route::get('/stock-in.approval', 'App\Http\Controllers\TransactionController@stockInApproval');

Route::get('/stock-in.chooseDateRange', 'App\Http\Controllers\TransactionController@chooseStockInDateRange');

Route::get('/stock-out.listIndex', 'App\Http\Controllers\TransactionController@stockOutTransactionListPage');

Route::get('/stock-out.approval', 'App\Http\Controllers\TransactionController@stockOutApproval');

Route::get('/stock-out.chooseDateRange', 'App\Http\Controllers\TransactionController@chooseStockOutDateRange');*/