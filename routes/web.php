<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\MyController;
use App\Http\Controllers\ProductTypeController;


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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
//Route::get('/', [ProductTypeController::class, 'getProductType']);
Route::post('/search', [MyController::class, 'searchProductByName']);
Route::get('/', [MyController::class, 'index']);
Route::get('/{tenmien?}', [MyController::class, 'page']);
Route::get('/producttype/{id}', [MyController::class, 'getProductByTypeID']);
Route::get('/shop-detail/{id}', [MyController::class, 'getProductById']);