<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\MyController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ManufactureController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Check_orderController;
use App\Http\Controllers\overview;
use App\Http\Controllers\Auth\RegisteredUserController;

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



Route::get('/logout', [RegisteredUserController::class, 'logout']);
//lists checkout
Route::get('/update-checkout1/{id}', [Check_orderController::class, 'update1']);
Route::get('/update-checkout2/{id}', [Check_orderController::class, 'update2']);
Route::prefix('checkout')->name('checkout.')->group(function () {
    Route::get('/', [Check_orderController::class, 'index_Checkout'])->name('index_Checkout');
    Route::get('/delete/{id}', [Check_orderController::class, 'delete'])->name('delete');
});

//lists review
Route::prefix('review')->name('review.')->group(function () {
    Route::get('/', [ReviewController::class, 'index_review'])->name('index_review');
    Route::get('/add_review', [ReviewController::class, 'add_review'])->name('add_review');
    Route::post('/add_review', [ReviewController::class, 'postAdd_review'])->name('post-add_review');
    Route::get('/delete/{comment_id}', [ReviewController::class, 'delete'])->name('delete');
});
Route::get('/edit-review/{id}', [ReviewController::class, 'edit']);
Route::post('/update-review/{id}', [ReviewController::class, 'update']);

//lists manufacture
Route::prefix('manufacture')->name('manufacture.')->group(function () {
    Route::get('/', [ManufactureController::class, 'index_manufacture'])->name('index_manufacture');

    Route::get('/add_manufacture', [ManufactureController::class, 'add_manufacture'])->name('add_manufacture');
    Route::post('/add_manufacture', [ManufactureController::class, 'postAdd_manufacture'])->name('post-add_manufacture');

    Route::get('/delete/{id}', [ManufactureController::class, 'delete'])->name('delete');
});
Route::get('/edit-manufacture/{id}', [ManufactureController::class, 'edit']);
Route::post('/update-manufacture/{id}', [ManufactureController::class, 'update']);

//danh sach san pham
Route::prefix('product')->name('product.')->group(function () {
    Route::get('/', [ProductController::class, 'index_product'])->name('index_product');

    Route::get('/add_product', [ProductController::class, 'add_product'])->name('add_product');
    Route::post('/add_product', [ProductController::class, 'postAdd_product'])->name('post-add_product');

    Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('delete');
});
Route::get('/edit-product/{id}', [ProductController::class, 'edit']);
Route::post('/update-product/{id}', [ProductController::class, 'update']);
Route::get('overview', [overview::class, 'show_product']);
//danh sách loai sản phẩm
Route::prefix('type')->name('type.')->group(function () {
    Route::get('/', [TypeController::class, 'index_type'])->name('index_type');

    Route::get('/add_type', [TypeController::class, 'add_type'])->name('add_type');
    Route::post('/add_type', [TypeController::class, 'postAdd_type'])->name('post-add_type');

    Route::get('/delete/{id}', [TypeController::class, 'delete'])->name('delete');
});
Route::get('/edit-product_type/{id}', [TypeController::class, 'edit']);
Route::post('/update-product_type/{id}', [TypeController::class, 'update']);

//danh sach nguoi dung

Route::prefix('users')->name('users.')->group(function () {
    Route::get('/', [UsersController::class, 'index'])->name('index');

    Route::get('/add', [UsersController::class, 'add'])->name('add');
    Route::post('/add', [UsersController::class, 'postAdd'])->name('post-add');

    Route::get('/delete/{id}', [UsersController::class, 'delete'])->name('delete');
});
Route::get('/edit-users/{id}', [UsersController::class, 'edit']);
Route::post('/update-users/{id}', [UsersController::class, 'update']);



Route::get('/placeorder', [MyController::class, 'Placeorder']);
Route::get('/order', [MyController::class, 'LoadOrder']);

//dashboard
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});
//end dashboard

require __DIR__ . '/auth.php';
Route::get('/admin', [ProductController::class, 'show_product']);
Route::post('/send-comment', [MyController::class, 'send_comment']);
Route::post('/load-comment', [MyController::class, 'load_comment']);
//start wishlist route
Route::get('/addwl/{id}', [MyController::class, 'AddWL']);
Route::get('/deletewl/{id}', [MyController::class, 'Deletewl']);
Route::get('/wishlist', [MyController::class, 'Loadwishlist']);
//end wishlist

//start cart route
Route::get('/addcart/{id}', [MyController::class, 'AddCart']);
Route::get('/delcart/{id}', [MyController::class, 'DeleteCart']);
Route::get('/dellistcart/{id}', [MyController::class, 'DeleteListCart']);
Route::get('/updatelistcart/{id}/{quan}', [MyController::class, 'UpdateListCart']);
//end cart route
//start gallery route

Route::get('/shop', [MyController::class, 'Gallery']);
Route::get('/showall', [MyController::class, 'ShowAllProduct']);
Route::get('/showfeature', [MyController::class, 'ShowFeatureProduct']);
Route::get('/showhightolow', [MyController::class, 'ShowProductPriceHighToLow']);
Route::get('/showlowtohigh', [MyController::class, 'ShowProductPriceLowToHigh']);
Route::get('/showbestselling', [MyController::class, 'ShowProductBestSelling']);
Route::get('/showbymanu/{id}', [MyController::class, 'ShowProductByManu']);
Route::get('/showbytype/{id}', [MyController::class, 'ShowProductByType']);
//end gallery route

//Route::get('/', [ProductTypeController::class, 'getProductType']);

Route::get('/search-result', [MyController::class, 'searchProductByName']);
Route::post('/', [MyController::class, 'conTactNewProduct']);
Route::post('/contact-us', [MyController::class, 'conTact']);
Route::post('/shop', [MyController::class, 'searchProductByName']);
Route::get('/', [MyController::class, 'index']);
Route::get('/{tenmien?}', [MyController::class, 'page']);
Route::get('/producttype/{id}', [MyController::class, 'getProductByTypeID']);
// Route::get('/shop-detail/{id}', [MyController::class, 'getProductByManuID']);
Route::get('/shop-detail/{id}', [MyController::class, 'getProductById']);
