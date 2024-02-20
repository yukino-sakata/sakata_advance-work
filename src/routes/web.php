<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShopController;

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

Route::middleware('auth')->group(function(){
    Route::get('/', [AuthController::class, 'index']);
});
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('register', [AuthController::class, 'register']);
Route::get('menu1', [AuthController::class, 'menu1']);
Route::get('menu2', [AuthController::class, 'menu2']);
Route::get('mypage', [ShopController::class, 'mypage']);
Route::get('shoplist', [ShopController::class, 'shoplist']);
Route::get('detail', [ShopController::class, 'detail']);
Route::post('detail', [ShopController::class, 'detail']);
Route::post('reserved', [ShopController::class, 'reserved']);
Route::post('delete', [ShopController::class, 'delete']);