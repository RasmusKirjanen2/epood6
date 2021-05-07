<?php

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
    return view('index');
});

Route::get('/products/create', function () {
    return view('products/create');
});

Route::get('/products',[\App\Http\Controllers\ProductController::class,'products']);
Route::get('/products/{product}',[\App\Http\Controllers\ProductController::class,'show']);
Route::post('/products/store',[\App\Http\Controllers\ProductController::class,'store'])->middleware('auth');
Route::get('/products/edit/{product}', [\App\Http\Controllers\ProductController::class,'edit'])->middleware('auth');
Route::put('/products/{product}', [\App\Http\Controllers\ProductController::class,'update'])->middleware('auth');
Route::get('/products/delete/{product}', [\App\Http\Controllers\ProductController::class,'destroy'])->middleware('auth');
Route::get('/posts',[\App\Http\Controllers\ProductController::class,'posts'])->middleware('auth');
Route::post('/products/comment/{product}',[\App\Http\Controllers\CommentController::class,'store'])->middleware('auth');


Route::get('/cart',[\App\Http\Controllers\ProductController::class,'getCart']);
Route::get('/checkout',[\App\Http\Controllers\ProductController::class,'getCheckout'])->name('checkout');
Route::post('/checkout',[\App\Http\Controllers\ProductController::class,'postCheckout']);

Route::get('/add-to-cart/{id}',[\App\Http\Controllers\ProductController::class,'getAddToCart'])->name('product.addToCart');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
