<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//to include the admin routes into the web.php file.
require 'admin.php';

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

Route::view('/', 'site.pages.homepage');


Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/category/{slug}', [App\Http\Controllers\Site\CategoryController::class, 'show'])->name('category.show');
Route::get('/product/{slug}', [App\Http\Controllers\Site\ProductController::class, 'show'])->name('product.show');
Route::post('/product/add/cart', [App\Http\Controllers\Site\ProductController::class, 'addToCart'])->name('product.add.cart');
