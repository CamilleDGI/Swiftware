<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockroomController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OperationController;
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

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/admin/stockrooms', [App\Http\Controllers\StockroomController::class, 'index']);
Route::get('/admin/stockrooms/create', [App\Http\Controllers\StockroomController::class, 'create']);
Route::post('/admin/stockrooms', [App\Http\Controllers\StockroomController::class, 'store']);
Route::get('/admin/stockrooms/{stockroom_number}',  [App\Http\Controllers\StockroomController::class, 'show']);
Route::get('/admin/stockrooms/{stockroom_number}/edit', [App\Http\Controllers\StockroomController::class, 'edit']);
Route::put('/admin/stockrooms/{stockroom_number}', [App\Http\Controllers\StockroomController::class, 'update']);


Route::get('/admin/customers', [App\Http\Controllers\CustomerController::class, 'index']);
Route::get('/admin/customers/enroll', [App\Http\Controllers\CustomerController::class, 'create']);
Route::post('/admin/customers', [App\Http\Controllers\CustomerController::class, 'store']);
Route::get('/admin/customers/{customer_id}', [App\Http\Controllers\CustomerController::class, 'show']);

Route::get('/admin/products', [App\Http\Controllers\ProductController::class, 'index']);
Route::get('/admin/products/add', [App\Http\Controllers\ProductController::class, 'create']);

Route::get('/operation', function () {
    return view('operation.operation');
});


Route::get('/operation', [App\Http\Controllers\OperationController::class, 'index']);
Route::get('/operation/receive', [App\Http\Controllers\OperationController::class, 'create']);

