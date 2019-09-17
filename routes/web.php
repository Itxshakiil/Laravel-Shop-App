<?php

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


Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user-logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::get('/product/view/{slug}', 'ProductController@view')->name('product.view');
Route::post('/product/{slug}', 'OrderController@store')->name('order.create');
Route::get('/checkout/{order}', 'OrderController@checkout')->name('order.checkout');
Route::post('/payment','PaymentController@store')->name('payment.status');

// Admin
Route::group(['prefix' => 'admin'], function () {

    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    // Pasword Reset Routes
    Route::post('/password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset','Auth\AdminResetPasswordController@reset')->name('admin.password.update');
    Route::get('/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::resource('/products', 'Admin\ProductController');
});
