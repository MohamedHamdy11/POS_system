<?php

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){ //...

        Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function(){

              Route::get('/index', 'DashboardController@index')->name('index');


              //  Categories routes
              Route::resource('categories', 'CategoryController')->except(['show']);

              //  products routs
              Route::resource('products', 'ProductController')->except(['show']);

              //  clients routs
              Route::resource('clients', 'ClientController')->except(['show']);
              Route::resource('clients.orders', 'Client\OrderController')->except(['show']);

              //  orders routs
              Route::resource('orders', 'OrderController')->except(['show']);
              Route::get('/orders/{order}/products', 'OrderController@products')->name('orders.products');


              // User Routes
              Route::resource('users', 'UserController')->except(['show']);
        }); // End Of DashBoard Routs
    });

