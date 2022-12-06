<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Product\ProductForSaleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('cart', CartController::class);
Route::post('/client/register', [ClientController::class, 'register']);
Route::post('/client/login', [ClientController::class, 'login']);
Route::post('/client/logout', [ClientController::class, 'logout']);
Route::get('/product-for-sale/list', [ProductForSaleController::class, 'index']);
Route::resource('company', CompanyController::class);
Route::resource('order', OrderController::class);
Route::resource('product', ProductController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
