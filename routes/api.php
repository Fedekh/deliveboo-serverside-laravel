<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\DishController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\api\PaymentController;
use App\Http\Controllers\Api\RestaurantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('restaurants', [RestaurantController::class, 'index']);
Route::get('restaurants/{slug}', [RestaurantController::class, 'show']);
Route::get('dishes', [DishController::class, 'index']);
Route::get('dishes/{slug}', [DishController::class, 'show']);
Route::get('categories', [CategoryController::class, 'index']);

Route::get('generate/token', [PaymentController::class, 'tokenGenerate']);
Route::post('make/payment', [PaymentController::class, 'makePayment']);
// PaymentController genera un token di autenticazione per Braintree
// make/payment gestisce la creazione del pagamento utilizzando il token e i dettagli dell'ordine.