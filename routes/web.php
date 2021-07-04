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


            Route::get('/contactez_nous', [App\Http\Controllers\Site\ContactController::class,'getContact'])->name('contact');
            Route::post('/contactez_nous', [App\Http\Controllers\Site\ContactController::class,'saveContact']);

            Auth::routes();


            Route::get('/', [App\Http\Controllers\Site\HomeController::class, 'index'])->name('home');
            Route::get('/catégorie/{slug}', [App\Http\Controllers\Site\CategoryController::class, 'show'])->name('category.show');
            Route::get('/produit/{slug}', [App\Http\Controllers\Site\ProductController::class, 'show'])->name('product.show');
            Route::post('/produit/ajouter/panier', [App\Http\Controllers\Site\ProductController::class, 'addToCart'])->name('product.add.cart');

            Route::get('/panier', [App\Http\Controllers\Site\CartController::class,'getCart'])->name('checkout.cart');
            Route::get('/panier/article/{id}/supprimer', [App\Http\Controllers\Site\CartController::class,'removeItem'])->name('checkout.cart.remove');
            Route::get('/panier/vider', [App\Http\Controllers\Site\CartController::class,'clearCart'])->name('checkout.cart.clear');

            Route::group(['middleware' => ['auth']], function () {
                Route::get('/la_caisse', [App\Http\Controllers\Site\CheckoutController::class,'getCheckout'])->name('checkout.index');
                Route::post('/la_caisse/commande', [App\Http\Controllers\Site\CheckoutController::class,'placeOrder'])->name('checkout.place.order');
                Route::get('la_caisse/paiement/achevée', [App\Http\Controllers\Site\CheckoutController::class,'complete'])->name('checkout.payment.complete');
                Route::get('compte/commandes', [App\Http\Controllers\Site\AccountController::class,'getOrders'])->name('account.orders');
            });


