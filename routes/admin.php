<?php

use App\Http\Controllers\Personal\DashboardController;
use App\Http\Controllers\Personal\Admin\CategoryController;
use App\Http\Controllers\Personal\Admin\EmployeeController;
use App\Http\Controllers\Personal\Admin\ProductController;
use App\Http\Controllers\Personal\Admin\ProductDayController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// prueba de creacion de cookies
// Route::get('/test',function(){
//     return response('<h1>hola como estas</h1>')->withCookie('miCookie','cristian',1);
// });
//
//
// Route::get('/ver',function(Request $request){
//     $c=$request->cookie('miCookie');
//     return response("<h1>$c</h1>")->withCookie('miCookie','cristian',1);
// });

Route::controller(DashboardController::class)->group(function(){
    Route::get('/','index')->name('admin');
    Route::get('/batch','batch')->name('admin.batch');
    Route::get('/product','product')->name('admin.product');
    Route::get('/employee','employee')->name('admin.employee');
    Route::get('/customer','customer')->name('admin.customer');
});


Route::controller(CategoryController::class)->group(function(){
    Route::post('/category','create')->name('admin.category.create');
    Route::put('/category/update/{category}','update')->name('admin.category.update');
    Route::post('/category/delete/{category}','delete')->name('admin.category.delete');
});


Route::controller(ProductController::class)->group(function(){
    Route::post('/product','create')->name('admin.product.create');
    Route::put('/product/update/{product}','update')->name('admin.product.update');
    Route::post('/product/delete/{product}','delete')->name('admin.product.delete');
    Route::get('/product/img/{id}','showImg')->name('admin.product.img');
});

Route::controller(ProductDayController::class)->group(function(){
    Route::post('/date','newBatch')->name('admin.batch.create');
    Route::post('/date/product/create/{date}','create')->name('admin.batch.product.create');
    Route::post('/date/product/delete/{id}','delete')->name('admin.batch.product.delete');
    Route::post('/date/product/update/{detail}','update')->name('admin.batch.product.update');
});

Route::controller(EmployeeController::class)->group(function(){
    Route::post('/employee/create','create')->name('admin.employee.create');
    Route::post('/employee/update/{user}','update')->name('admin.employee.update');
    Route::post('/employee/delete/{id}','delete')->name('admin.employee.delete');
});

// Route::controller();

?>
