<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\SupplierController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

//Backend
Route::group(['prefix'=>'admin', 'middleware'=>'auth'],function(){
    Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'adminIndex'])->name('admin');

    //Supplier
    Route::resource('/supplier', SupplierController::class);
    //Customer
    Route::resource('/customer', CustomerController::class)->only(['index','create','edit']);
    //Category
    Route::resource('/category', CategoryController::class);
});
