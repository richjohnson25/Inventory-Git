<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerController;
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
    Route::get('/products/create', 'createProduct')->name('createProduct');
    Route::post('/products/create', 'storeProduct')->name('storeProduct');
    Route::get('/products/{id}', 'viewProduct')->name('viewProduct');
    Route::delete('/products/{id}', 'deleteProduct')->name('deleteProduct');

    Route::get('/categories/index', 'categoryListPage')->name('categoryListPage');
    Route::get('/categories/search/', 'searchCategories')->name('category_search');
    Route::get('/categories/create', 'createCategory')->name('createCategory');
    Route::post('/categories/create', 'storeCategory')->name('storeCategory');
    Route::delete('/categories/{id}', 'deleteCategory')->name('deleteCategory');

    Route::get('/units/index', 'unitListPage')->name('unitListPage');
    Route::get('/units/search/', 'searchUnit')->name('unit_search');
    Route::get('/units/create', 'createUnit')->name('createUnit');
    Route::post('/units/create', 'storeUnit')->name('storeUnit');
    Route::delete('/units/{id}', 'deleteUnit')->name('deleteUnit');
});

Route::controller(SupplierController::class)->group(function(){
    Route::get('/suppliers/index', 'supplierIndex')->name('supplierIndex');
    Route::get('/suppliers/search/', 'searchSuppliers')->name('supplier_search');
    Route::get('/suppliers/create', 'createSupplier')->name('createSupplier');
    Route::post('/suppliers/create', 'storeSupplier')->name('storeSupplier');
    Route::get('/suppliers/{id}', 'viewSupplier')->name('viewSupplier');
    Route::get('/suppliers/{id}/edit', 'editSupplier')->name('editSupplier');
    Route::patch('suppliers/{id}/edit', 'updateSupplier')->name('updateSupplier');
    Route::delete('suppliers/{id}', 'deleteSupplier')->name('deleteSupplier');
});

Route::controller(CustomerController::class)->group(function(){
    Route::get('/customers/index', 'customerIndex')->name('customerIndex');
    Route::get('/customers/search/', 'searchCustomers')->name('customer_search');
    Route::get('/customers/create', 'createCustomer')->name('createCustomer');
    Route::post('/customers/create', 'storeCustomer')->name('storeCustomer');
    Route::get('/customers/{id}', 'viewCustomer')->name('viewCustomer');
    Route::get('/customers/{id}/edit', 'editCustomer')->name('editCustomer');
    Route::patch('customers/{id}/edit', 'updateCustomer')->name('updateCustomer');
    Route::delete('/customers/{id}', 'deleteCustomer')->name('deleteCustomer');
});

Route::controller(StockInTransactionController::class)->group(function(){
    Route::get('/stock-in/index', 'stockInIndex')->name('stockInIndex');
    Route::get('/stock-in/export', 'exportStockIn')->name('exportStockIn');
    Route::get('/stock-in/reportMenu', 'reportPage')->name('reportPage');
    Route::get('/stock-in/report', 'showReport')->name('showReport');
    Route::get('/stock-in/create', 'create')->name('create');
    Route::post('/stock-in/store', 'storeStockIn')->name('storeStockIn');
    Route::get('/stock-in/{id}', 'showStockIn')->name('showStockIn');
    Route::delete('/stock-in/{id}', 'deleteStockIn')->name('deleteStockIn');
    Route::get('generate-stock-in-pdf', 'generateStockInPDF')->name('generateStockInPDF');
});

Route::controller(StockOutTransactionController::class)->group(function(){
    Route::get('/stock-out/index', 'stockOutIndex')->name('stockOutIndex');
    Route::get('/stock-out/export', 'exportStockOut')->name('exportStockOut');
    Route::get('/stock-out/reportMenu', 'reportPage')->name('reportPage');
    Route::get('/stock-out/report', 'showReport')->name('showReport');
    Route::get('/stock-out/create', 'create')->name('create');
    Route::get('/stock-out/create/getStockPerUnit/{id}', 'getStockPerUnit')->name('getStockPerUnit');
    Route::post('/stock-out/store', 'storeStockOut')->name('storeStockOut');
    Route::get('/stock-out/{id}', 'showStockOut')->name('showStockOut');
    Route::delete('/stock-out/{id}', 'deleteStockOut')->name('deleteStockOut');
    Route::get('generate-stock-out-pdf', 'generateStockOutPDF')->name('generateStockOutPDF');
});

Route::controller(UserController::class)->group(function(){
    Route::get('/profile', 'profilePage')->name('profilePage');
    Route::get('/profile/edit', 'editProfilePage')->name('editProfilePage');
    Route::patch('profile/edit', 'editProfile')->name('editProfile');
    Route::get('/profile/changePassword', 'changePasswordPage')->name('changePasswordPage');
    Route::patch('profile/changePassword', 'changePassword')->name('changePassword');
});
