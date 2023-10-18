<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\StockInTransactionController;
use App\Http\Controllers\StockOutTransactionController;

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

Route::group(['authMid, role:guest'], function(){
    Route::get('/', [UserController::class, 'homePage']);
    Route::get('/home', [UserController::class, 'homePage']);

    Route::get('/register', [UserController::class, 'registerPage'])->name('registerPage');
    Route::post('/register', [UserController::class, 'register'])->name('register');

    Route::get('/outletRegister', [UserController::class, 'registerOutletPage'])->name('registerOutletPage');
    Route::post('/outletRegister', [UserController::class, 'registerOutlet'])->name('registerOutlet');

    Route::get('/login', [UserController::class, 'loginPage'])->name('loginPage');
    Route::post('/login', [UserController::class, 'login'])->name('login');

    Route::get('/logout', [UserController::class, 'logout'])->middleware('role:admin, member');
});

Route::controller(ProductController::class)->group(function(){
    Route::get('/dashboard', 'dashboardPage')->name('dashboardPage');

    Route::get('/products/index', 'productListPage')->name('productListPage');
    Route::get('/products/search/', 'searchProducts')->name('product_search');
    Route::get('/products/{id}', 'viewProduct')->name('viewProduct');
    Route::delete('/products/{id}', 'deleteProduct')->name('deleteProduct');

    Route::get('/suppliers', 'supplierListPage')->name('supplierListPage');
    Route::delete('suppliers/{id}', 'deleteSupplier')->name('deleteSupplier');
    Route::get('/suppliers/search/', 'searchSuppliers')->name('supplier_search');

    Route::get('/customers', 'customerListPage')->name('customerListPage');
    Route::delete('/customers/{id}', 'deleteCustomer')->name('deleteCustomer');
    Route::get('/customers/search/', 'searchCustomers')->name('customer_search');
});

Route::controller(StockInTransactionController::class)->group(function(){
    Route::get('/stock-in/index', 'index')->name('index');
    Route::get('/stock-in/create', 'create')->name('create');
    Route::post('/stock-in/store', 'store')->name('store');
    Route::get('/stock-in/{id}', 'show')->name('show');
    Route::patch('/stock-in/{id}', 'approve')->name('approve');
    Route::patch('/stock-in/{id}', 'reject')->name('reject');
    Route::get('/stock-in/chooseDateRange', 'chooseDateRange')->name('chooseDateRange');
    Route::get('/stock-in/report', 'showReport')->name('showReport');
});

Route::controller(StockOutTransactionController::class)->group(function(){
    Route::get('/stock-out/index', 'index')->name('index');
    Route::get('/stock-out/create', 'create')->name('create');
    Route::post('/stock-out/store', 'store')->name('store');
    Route::get('/stock-out/{id}', 'show')->name('show');
    Route::patch('/stock-out/{id}', 'approve')->name('approve');
    Route::patch('/stock-out/{id}', 'reject')->name('reject');
    Route::get('/stock-out/chooseDateRange', 'chooseDateRange')->name('chooseDateRange');
    Route::get('/stock-out/report', 'showReport')->name('showReport');
});

Route::get('/profile', [UserController::class, 'profilePage']);

Route::get('/profile/edit', [UserController::class, 'editProfilePage']);

Route::get('/profile/changePassword', [UserController::class, 'changePasswordPage']);