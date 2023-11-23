<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
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
    Route::get('/stock-in/index', 'stockInIndex')->name('stockInIndex');
    Route::get('/stock-in/approval', 'stockInApprovalPage')->name('stockInApprovalPage');
    Route::get('/stock-in/reportMenu', 'reportPage')->name('reportPage');
    Route::get('/stock-in/report', 'showReport')->name('showReport');
    Route::get('/stock-in/create', 'create')->name('create');
    Route::post('/stock-in/store', 'storeStockIn')->name('storeStockIn');
    Route::get('/stock-in/{id}', 'showStockIn')->name('showStockIn');
    Route::delete('/stock-in/{id}', 'deleteStockIn')->name('deleteStockIn');
    Route::get('generate-stock-in-pdf', 'generateStockInPDF')->name('generateStockInPDF');
    Route::get('/stock-in/export_excel', 'exportStockIn')->name('exportStockIn');
});

Route::controller(StockOutTransactionController::class)->group(function(){
    Route::get('/stock-out/index', 'stockOutIndex')->name('stockOutIndex');
    Route::get('/stock-out/approval', 'stockOutApprovalPage')->name('stockOutApprovalPage');
    Route::get('/stock-out/reportMenu', 'reportPage')->name('reportPage');
    Route::get('/stock-out/report', 'showReport')->name('showReport');
    Route::get('/stock-out/create', 'create')->name('create');
    Route::post('/stock-out/store', 'storeStockOut')->name('storeStockOut');
    Route::get('/stock-out/{id}', 'showStockOut')->name('showStockOut');
    Route::delete('/stock-out/{id}', 'deleteStockOut')->name('deleteStockOut');
    Route::get('generate-stock-out-pdf', 'generateStockOutPDF')->name('generateStockOutPDF');
    Route::get('/stock-out/export_excel', 'exportStockOut')->name('exportStockOut');
});

Route::controller(UserController::class)->group(function(){
    Route::get('/profile', 'profilePage')->name('profilePage');
    Route::get('/profile/edit', 'editProfilePage')->name('editProfilePage');
    Route::patch('profile/edit', 'editProfile')->name('editProfile');
    Route::get('/profile/changePassword', 'changePasswordPage')->name('changePasswordPage');
    Route::patch('profile/changePassword', 'changePassword')->name('changePassword');
});
