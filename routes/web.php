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

Route::get('/products/autocomplete', [
	'uses'=>'ProductController@autocomplete',
	'as'=>'product.autocomplete'
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

//-----------------------------------------------------------------------------

// Products CRUD

Route::get('/products/index', [
	'uses'=>'ManageProductsController@index',
	'as'=>'products.index',
	'middleware'=>'admin.user'
	]);

Route::get('/products/create', [
	'uses'=>'ManageProductsController@create',
	'as'=>'product.create',
	'middleware'=>'admin.user'
	]);

Route::post('/product/store', [
	'uses'=>'ManageProductsController@store',
	'as'=>'product.store',
	'middleware'=>'admin.user'
	]);


Route::get('/products/edit/{id}', [
	'uses'=>'ManageProductsController@edit',
	'as'=>'product.edit',
	'middleware'=>'admin.user'
	]);

Route::put('/products/update/{id}', [
	'uses'=>'ManageProductsController@update',
	'as'=>'product.update',
	'middleware'=>'admin.user'
	]);

Route::delete('/products/delete/{id}', [
	'uses'=>'ManageProductsController@destroy',
	'as'=>'product.delete',
	'middleware'=>'admin.user'
	]);

//------------------------------------------------------------
// Categories routes

Route::get('/categories/index', [
	'uses'=>'CategoriesController@index',
	'as'=>'categories.index',
	'middleware'=>'admin.user'
	]);

Route::post('/categories/store', [
	'uses'=>'CategoriesController@store',
	'as'=>'category.store',
	'middleware'=>'admin.user'
	]);

// Route::get('/categories/edit/{id}', [
// 	'uses'=>'CategoriesController@edit',
// 	'as'=>'categories.edit',
// 	'middleware'=>'admin.user'
// 	]);

Route::post('/categories/update/{id}', [
	'uses'=>'CategoriesController@update',
	'as'=>'category.update',
	'middleware'=>'admin.user'
	]);

Route::delete('/categories/delete/{id}', [
	'uses'=>'CategoriesController@destroy',
	'as'=>'category.destroy',
	'middleware'=>'admin.user'
	]);

//-----------------------------------------------------

// Offers Routes

Route::get('/offers/index', [
	'uses'=>'OffersController@index',
	'as'=>'offers.index',
	'middleware'=>'admin.user'
	]);

Route::get('/offers/create', [
	'uses'=>'OffersController@create',
	'as'=>'offer.create',
	'middleware'=>'admin.user'
	]);

Route::post('/offers/store', [
	'uses'=>'OffersController@store',
	'as'=>'offer.store',
	'middleware'=>'admin.user'
	]);


Route::get('/offers/edit/{id}', [
	'uses'=>'OffersController@edit',
	'as'=>'offer.edit',
	'middleware'=>'admin.user'
	]);

Route::put('/offers/update/{id}', [
	'uses'=>'OffersController@update',
	'as'=>'offer.update',
	'middleware'=>'admin.user'
	]);

Route::delete('/offers/delete/{id}', [
	'uses'=>'OffersController@destroy',
	'as'=>'offer.delete',
	'middleware'=>'admin.user'
	]);

Route::get('/showOffer/{id}', [
	'uses'=>'OffersController@showOffer',
	'as'=>'offer.show'
]);
