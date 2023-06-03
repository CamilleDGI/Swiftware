<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockroomController;
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
Route::post('/admin/stockrooms',[App\Http\Controllers\StockroomController::class, 'store']);
Route::get('/admin/stockrooms/{stockroom_number}', [App\Http\Controllers\StockroomController::class, 'show']);