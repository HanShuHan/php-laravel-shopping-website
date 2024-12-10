<?php

use App\Http\Controllers\NavigationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

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

//HOME/INDEX
Route::get('/', [NavigationController::class, 'index']);

Route::get('/comp', function() {
    return view('pages.index');
});
//LOGIN AND REGISTER
Route::get('/login', function() {
    return view('pages.login');
});

Route::get('/signup', function() {
    return view('pages.register');
});

//SEARCH CONTROLLER
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/sales', [SearchController::class, 'listOnSale']);
//USER CONTROLLER
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/auth', [UserController::class, 'login']);
Route::get('/profile', [UserController::class, 'showProfile']);
Route::post('/profile/update', [UserController::class, 'updateProfile']);
Route::post('/profile/updatePicture', [UserController::class, 'updatePicture']);
Route::get('/recover', [UserController::class, 'recover']);
Route::post('profile/update-picture', [UserController::class, 'updatePicture']);

//PRODUCT CONTROLLER
Route::get('/product/{product_id}', [ProductController::class, 'index'])->name('product.index');
Route::get('/products/{categoryName}', [ProductController::class, 'listItems'])->name('product.listItems');
Route::get('/create/products', [ProductController::class, 'create'])->name('product.create');
Route::post('/products', [ProductController::class, 'store'])->name('product.store');

//CART CONTROLLER
Route::post('/cart/add/{product_id}', [\App\Http\Controllers\ProductController::class, 'addToCart']);
Route::get('/cart', [\App\Http\Controllers\CartController::class, 'showCart'])->name('cart.index');
Route::post('/cart/edit/{product_id}', [\App\Http\Controllers\CartController::class, 'editItemFromCart']);
Route::post('/cart/remove/{item_id}', [\App\Http\Controllers\CartController::class, 'removeFromCart']);
Route::post('/cart/clear', [\App\Http\Controllers\CartController::class, 'clearCart']);

//ORDER CONTROLLER
Route::get('/checkout', [OrderController::class, 'showOrder']);
Route::post('/process-order', [OrderController::class, 'processOrder']);
Route::get('/order/{orderId}', [OrderController::class, 'viewPlacedOrder']);
