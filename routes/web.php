<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontOfficeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [AuthController::class, 'home_redirect']);


Route::prefix('admin')->group(function () {
    Route::resource('/category', CategoryController::class);
    Route::resource('/product', ProductController::class );
    Route::post('/update/info' , [UserController::class, 'updateInfo'])->name('update.info')->middleware('auth');
    Route::post('update/password' , [UserController::class, 'updatePassword'])->name('update.password')->middleware('auth');
    Route::post('change/password' , [UserController::class, 'changePassword'])->name('change.password')->middleware('auth');
    Route::get('/profile' , [UserController::class, 'profile'])->name('profile')->middleware('auth');
});

    Route::post('/category/search', [FrontOfficeController::class, 'searchCategory'])->name('category.search');
    Route::post('/product/search', [FrontOfficeController::class, 'searchProduct'])->name('product.search');
    Route::get('/product' , [FrontOfficeController::class, 'getProduct']);
    Route::get('/category' , [FrontOfficeController::class, 'getCategory']);
    Route::get('/category/product/{id}' , [FrontOfficeController::class, 'getProductByCategory'])->name('category.product');
    Route::post('search/product/{id}', [FrontOfficeController::class, 'searchProductByCategory'])->name('search.product');


Auth::routes();
