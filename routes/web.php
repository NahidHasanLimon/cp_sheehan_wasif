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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return view('frontend.pages.home');
// });
Route::get('/','FrontEnd\HomeController@index')->name('customer.home');
Auth::routes();
Route::post('customer/login','Auth\CustomerLoginController@storeCustomerLogin')->name('customer.login');
Route::post('customer/signup','Auth\CustomerLoginController@signup')->name('customer.signup');


Route::get('customer/order/index','FrontEnd\OrderController@index')->name('customer.order.index');
Route::post('customer/order/store','FrontEnd\OrderController@store')->name('customer.order.store');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});
Route::get('dashboard', function () {
    return view('backend.pages.blank');
})->name('admin.dashboard');



Route::get('/order/index', 'Backend\OrderController@index')->name('admin.order.index');
Route::get('/order/show', 'Backend\OrderController@show')->name('admin.order.show');
Route::post('/order/store', 'Backend\OrderController@store')->name('admin.order.store');
Route::get('/order/destroy', 'Backend\OrderController@destroy')->name('admin.order.destroy');
Route::get('/order/edit', 'Backend\OrderController@edit')->name('admin.order.edit');
Route::post('/order/update', 'Backend\OrderController@update')->name('admin.order.update');
Route::get('/order/statuschange', 'Backend\OrderController@change_order_status')->name('admin.order.statuschange');

Route::get('/area/index', 'Backend\AreaController@index')->name('admin.area.index');
Route::post('/area/store', 'Backend\AreaController@store')->name('admin.area.store');
Route::get('/area/destroy', 'Backend\AreaController@destroy')->name('admin.area.destroy');
Route::get('/area/edit', 'Backend\AreaController@edit')->name('admin.area.edit');
Route::post('/area/update', 'Backend\AreaController@update')->name('admin.area.update');

Route::get('/user/index', 'Backend\UserController@index')->name('admin.user.index');
Route::post('/user/store', 'Backend\UserController@store')->name('admin.user.store');
Route::get('/user/destroy', 'Backend\UserController@destroy')->name('admin.user.destroy');
Route::get('/user/edit', 'Backend\UserController@edit')->name('admin.user.edit');
Route::post('/user/update', 'Backend\UserController@update')->name('admin.user.update');
Route::get('/user/admin/isadminstatuschange', 'Backend\UserController@is_admin_status_change')->name('admin.user.isadminstatuschange');

Route::prefix('admin')->group(function() {
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('logout/', 'Auth\AdminLoginController@logout')->name('admin.logout');
    // Route::get('/', 'Auth\AdminController@index')->name('admin.dashboard');
   }) ;