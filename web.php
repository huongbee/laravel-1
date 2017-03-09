<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/


Route::get('/',"Product@getProduct")->name('index');
Route::get('/sanpham/{id}',"ProductType@getProductByType");

Route::get('/chitiet/{id}.html','ProductDetail@getDetailProduct')->name('chitietsanpham');

Route::get('add-to-cart/{id}',[
	'uses' => 'Product@getAddToCart',
	'as' => 'giohang.addToCart'
]);

Route::get('shopping-cart',[
	'uses' => 'Product@getProduct',
	'as' => 'giohang.shoppingCart'
]);

Route::get('checkout.html',[
	'uses' => 'Product@getCheckout',
	'as' => 'checkout'
]);

Route::post('checkout.html',[
	'uses' => 'Product@postCheckout',
	'as' => 'checkout'
]);
Route::get('delete-cart.html','Product@getDelCart')->name('delCart');

/*
Route::group(['middleware'=>'kiemtraLogin'], function(){ //kiemtraLogin ten dat o file Kernel.php
	//chi khi da dang nhap moi vao duoc route nay
	Route::get('/chitiet/{id}.html','ProductDetail@getDetailProduct');


});*/

Route::get('/signup.html',[
	'uses' => 'admin\AdminController@getDangki',
	'as' => 'admin.pages.user.signup'
]);

Route::post('/signup.html',[
	'uses' => "admin\AdminController@postDangki",
	'as' => 'admin.pages.user.signup'
]);

Route::get('/signin.html',[
	'uses' => 'admin\AdminController@getDangnhap',
	'as' => 'admin.pages.user.signin'
]);

Route::post('/signin.html',[
	'uses' => "admin\AdminController@postDangnhap",
	'as' => 'admin.pages.user.signin'
]);

Route::group(['prefix'=>'admin','middleware'=>'kiemtraLogin'],function(){
	Route::get('trangchu',function(){
		return view('admin.pages.dashboard.index');
	});
	Route::get('logout.html','admin\AdminController@getDangxuat');

	Route::get('danh-sach-san-pham.html','admin\AdminController@getProduct');

	Route::get('them-san-pham.html','admin\AdminController@getThemSP')->name('themsp');
	Route::post('them-san-pham.html','admin\AdminController@postThemSP');


});