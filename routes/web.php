<?php

use App\Http\Controllers\CheckController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderPageController;
use App\Http\Controllers\OrderPageontroller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\ReservePageController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\UserController;
use App\Models\Order;
use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

Route::controller(LoginController::class)->group(function(){
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'store')->name('login.store');
    Route::get('logout', 'destroy')->name('login.destroy');
});

Route::middleware(['perfil_admin'])->group(function(){
    Route::controller(UserController::class)->group(function(){
        Route::get('/admin', 'index')->name('panel-admin');
        Route::get('/admin/register', 'create')->name('create.user');
        Route::post('/admin/register', 'store')->name('store.user');
    });
});

Route::middleware(['perfil_restaurant'])->group(function(){
    Route::get('/restaurant', function () {
        return view('layout.panel');
    })->name('panel-restaurant');

    Route::controller(TableController::class)->group(function(){
        Route::get('/restaurant/tables','index')->name('tables-panel');
        Route::get('/restaurant/create-table','store')->name('create-table');
        Route::get('/restaurant/edit-table/{table}','edit')->name('edit-table');
        Route::post('/restaurant/edit-table/{table}','update')->name('edit-table');
        Route::get('/restaurant/delete/{table}','destroy')->name('delete-table');
        Route::post('/restaurant/create-table','create')->name('create-table');
    });

    Route::controller(ProductController::class)->group(function(){
        Route::get('/restaurant/products', 'index')->name('products-panel');
        Route::get('restaurant/create-products', 'create')->name('create-product');
        Route::post('restaurant/create-product', 'store')->name('product.store');
        Route::get('restaurant/edit-product/{product}', 'edit')->name('product.edit');
        Route::post('restaurant/edit-product/{product}', 'update')->name('product.update');
        Route::get('restaurant/destroy-product/{product}', 'destroy')->name('product.destroy');
    });

    Route::controller(OrderController::class)->group(function(){
        Route::get('/restaurant/orders','index')->name('orders-panel');
        Route::get('/restaurant/order/{order}','edit')->name('order.edit');
        Route::POST('/restaurant/order/{order}','update')->name('order.update');
        Route::get('/restaurant/order/destroy/{order}','destroy')->name('order.destroy');
    });
    Route::controller(CheckController::class)->group(function(){
        Route::get('/restaurant/checks','index')->name('checks-panel');
        Route::get('/restaurant/edit-check/{check}','edit')->name('check.edit');
        Route::POST('/restaurant/edit-check/{check}','update')->name('check.update');
    });
    
    Route::controller(ReserveController::class)->group(function(){
        Route::get('/restaurant/reserve','index')->name('reserves-panel');
        Route::get('/restaurant/reserve/search','search')->name('search.panel');
        Route::get('/restaurant/edit-reserve/{reserve}','edit')->name('reserve.edit');
        Route::POST('/restaurant/edit-reserve/{reserve}','update')->name('reserve.update');
    });
        
    Route::controller(RestaurantController::class)->group(function(){
        Route::get('/restaurant/edit-restaurant/{restaurant}','edit')->name('restaurant.edit');
        Route::POST('/restaurant/edit-restaurant/{restaurant}','update')->name('restaurant.update');
    });
});


Route::middleware(['identify_restaurant'])->group(function(){

    Route::controller(HomeController::class)->group(function(){

        Route::get('/{slug}',[HomeController::class, 'index'] );

        Route::get('/{slug}/products','products_show')->name('products');
        
        Route::post('/{slug}/products/{id}','add_cart')->name('add_cart');
    });

    Route::controller(ReservePageController::class)->group(function(){
        Route::get('{slug}/reserve', 'index')->name('index.reserve');
        Route::post('{slug}/reserve/search', 'searchTable')->name('search.reserve');
        Route::post('{slug}/reserve/store', 'store')->name('store.reserve');
    });

    Route::controller(OrderPageController::class)->group(function(){
        Route::get('{slug}/order', 'create')->name('create.order');
        Route::post('{slug}/order', 'store')->name('store.order');
        Route::get('{slug}/order/check/{check}', 'requestCheck')->name('request.check');
    });
});