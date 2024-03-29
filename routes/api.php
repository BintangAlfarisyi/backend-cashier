<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionDetailController;
use App\Http\Controllers\UserController;
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

Route::apiResource('/category', CategoryController::class);
Route::apiResource('/products', ProductController::class);
Route::apiResource('/jenis', JenisController::class);
Route::apiResource('/stock', StockController::class);
Route::apiResource('/customer', CustomerController::class);
Route::apiResource('/menu', MenuController::class);
Route::apiResource('/user', UserController::class);
Route::apiResource('/transaction', TransactionController::class);
Route::apiResource('/transactionDetail', TransactionDetailController::class);
Route::apiResource('/table', TableController::class);
Route::apiResource('/order', OrderController::class);
Route::apiResource('/employee', EmployeeController::class);