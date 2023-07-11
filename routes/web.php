<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('FrontEnd.homepage');
// });

// Route::get('/order', function () {
//     return view('FrontEnd.order');
// });
// Route::get('/show', function () {
//     return view('FrontEnd.details');
// });
// Route::get('/admincreate', function () {
//     return view('backEnd.category.create');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', function () {
        return view('FrontEnd.homepage');
    })->name('dashboard');
});

Route::group(['prefix'=>'admin', 'middleware'=>['auth','admin']],function () {
    // ...............................admin
     Route::get('/master', [App\Http\Controllers\CategoryProductController::class, 'master'])->name('admin.mster');
    // ...............................caregory
    Route::get('/index', [App\Http\Controllers\CategoryProductController::class, 'index'])->name('admin.index');
    Route::get('/create', [App\Http\Controllers\CategoryProductController::class, 'create'])->name('admin.create');
    Route::post('/store', [App\Http\Controllers\CategoryProductController::class, 'store'])->name('admin.store');
    Route::get('/edit{category}', [App\Http\Controllers\CategoryProductController::class, 'edit'])->name('admin.edit');
    Route::put('/update{category}', [App\Http\Controllers\CategoryProductController::class, 'update'])->name('admin.update');
    Route::delete('/delete{category}', [App\Http\Controllers\CategoryProductController::class, 'destroy'])->name('admin.delete');
    Route::get('/trshedc', [App\Http\Controllers\CategoryProductController::class, 'trashedc'])->name('admin.trashed');
    Route::get('/restorec{id}', [App\Http\Controllers\CategoryProductController::class, 'backdelc'])->name('admin.restore');
    Route::get('/hdeletec{id}', [App\Http\Controllers\CategoryProductController::class, 'hdeletec'])->name('admin.hdelete');
    // ..................................orders

    Route::get('/orderindex', [App\Http\Controllers\OrderController::class, 'orderindex'])->name('adminorder.orderindex');
    Route::post('/order/stuatas/{order}', [App\Http\Controllers\OrderController::class, 'changeStuatas'])->name('adminorder.changeStuatas');
    // Route::get('/order/edit/{order}', [App\Http\Controllers\OrderController::class, 'edit'])->name('adminorder.edit');
    // Route::put('/order/uodate/{order}', [App\Http\Controllers\OrderController::class, 'update'])->name('adminorder.update');
    Route::delete('/delete', [App\Http\Controllers\OrderController::class, 'destroy'])->name('adminorder.delete');
    Route::get('/orderdetail/{order}', [App\Http\Controllers\OrderController::class, 'show'])->name('adminorder.orderdetail');
    // ..................................meals
    Route::get('/product', [App\Http\Controllers\ProductsController::class, 'index'])->name('adminprod.index');
    Route::get('/productcreate', [App\Http\Controllers\ProductsController::class, 'create'])->name('adminprod.create');
    Route::post('/productstore', [App\Http\Controllers\ProductsController::class, 'store'])->name('adminproduct.store');
    Route::get('/producedit{product}', [App\Http\Controllers\ProductsController::class, 'edit'])->name('adminproduct.edit');
    Route::put('/producupdate{product}', [App\Http\Controllers\ProductsController::class, 'update'])->name('adminproduct.update');
    Route::delete('/producdestroy{product}', [App\Http\Controllers\ProductsController::class, 'destroy'])->name('adminproduct.destroy');
    // Route::get('/mealtrshed', [App\Http\Controllers\MealController::class, 'trashed'])->name('adminmeal.trshed');
    // Route::get('/mealrestore{id}', [App\Http\Controllers\MealController::class, 'backdel'])->name('adminmeal.restore');
    // Route::get('/mealhdelete{id}', [App\Http\Controllers\MealController::class, 'hdelete'])->name('adminmeal.hdelete');
    });
    // Route::group(['prefix'=>'user', 'middleware'=>['auth','user']],function () {


    // });
    Route::get('/', [App\Http\Controllers\HomepageController::class,'index'])->name('homepage.indexhome');
    Route::get('/show{product}', [App\Http\Controllers\HomepageController::class,'show'])->name('homepage.showhome');
    Route::get('/homeorder/{product}', [App\Http\Controllers\HomepageController::class, 'order'])->name('homepage.order');
    Route::post('/order/store', [App\Http\Controllers\OrderController::class, 'store'])->name('homeorder.store');
    Route::get('/cart', [App\Http\Controllers\OrderController::class, 'index'])->name('homecart.indexcart');
    Route::delete('/cart{order}', [App\Http\Controllers\OrderController::class, 'delete'])->name('order.delete');
