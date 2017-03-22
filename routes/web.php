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

Route::get('/', [
	'uses'=>'ProductController@getIndex',
	'as'=>'product.index'
]);

Route::get('/showProduct/{id}', [
	'uses'=>'ProductController@showProduct',
	'as'=>'product.show'
]);


Auth::routes();

Route::get('/home', [
	'uses'=>'HomeController@index',
	'as'=>'profile',
	'middleware'=>'auth'
]);

Route::get('/logout', [
	'uses'=>'HomeController@logout',
	'as'=>'logout',
	'middleware'=>'auth'
]);

Route::get('/add-to-route/{id}', [
	'uses'=>'ProductController@getAddToCart',
	'as'=>'product.addToCart'
]);

Route::get('/shopping-cart', [
	'uses'=>'ProductController@getCart',
	'as'=>'product.shoppingCart'
]);

Route::get('/checkout', [
	'uses'=>'ProductController@getCheckout',
	'as'=>'checkout',
	'middleware'=>'auth'
]);

Route::post('/checkout', [
	'uses'=>'ProductController@postCheckout',
	'as'=>'checkout',
	'middleware'=>'auth'
]);


Route::get('/reduce/{id}', [
	'uses'=>'productController@getReduceByOne',
	'as'=>'product.reduceByOne'
	]);

Route::get('/remove/{id}', [
	'uses'=>'productController@getRemoveItem',
	'as'=>'product.remove'
	]);

//-----------------------------------------------------
// admin routes

Route::get('/admin_home', [
	'uses'=>'AdminHomeController@index',
	'as'=>'Admin.Home',
	'middleware'=>'admin.user'
	]);

Route::get('admin_login','AdminAuth\LoginController@showLoginForm');
Route::post('admin_login','AdminAuth\LoginController@Login');
Route::get('admin_logout','AdminAuth\LoginController@logout');

Route::post('admin_password/email','AdminAuth\ForgotPasswordController@sendResetLink');
Route::get('admin_password/reset','AdminAuth\ForgotPasswordController@showLinkRequestForm');

Route::post('admin_password/reset','AdminAuth\ResetPasswordController@reset');

Route::get('admin_password/reset/{token}','AdminAuth\ResetPasswordController@showResetForm');

Route::get('admin_register','AdminAuth\RegisterController@showRegistrationForm');

Route::post('admin_register','AdminAuth\RegisterController@register');