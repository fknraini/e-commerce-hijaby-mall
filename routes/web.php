<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;

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

// Route::get('/test_react', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class, 'landingPage']);
Route::get('/test_react',[HomeController::class, 'testReact']);

Route::middleware(['auth', 'verified'])->group(function () {
    // Route::view('home', 'home')->name('home');

    Route::get('home',[HomeController::class, 'landingPage']);

    Route::get('/products',[ProductController::class, 'products']);
    Route::get('/product/{id}',[ProductController::class, 'productDetail']);

    Route::get('/cart', [TransactionController::class, 'cart']);
    Route::post('/checkout', [TransactionController::class, 'checkout']);

    Route::get('/transactions', [TransactionController::class, 'transactions']);
    Route::get('/transaction/{id}', [TransactionController::class, 'transactionDetail'])->name('transaction');
    Route::post('/transaction/upload_payment_proof', [TransactionController::class, 'uploadPaymentProof']);
});
