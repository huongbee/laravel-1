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

Route::get('test',function(){
	echo 'Hello Word!';
});

Route::get('test/huong',function(){
	echo 'Hello Hương!';
});

Route::get('truyenthamso/{ten}/{tuoi}',function($name,$age){
	echo 'Xin chào bạn '.$name.'<br />'.$age;
});
//chi cho phep so có 6 chữ số
Route::get('mon-an/{tenmonan?}',function ($tenmonan = "123") {
	return $tenmonan;
})->where([ 'tenmonan' =>  '[0-9]{6}' ]);

Route::get('thong-tin/{hoten}/{sodienthoai}',function ($hoten,$sodienthoai) {
	return "Thông tin của bạn là : $hoten có số điện thoại là $sodienthoai";
})->where(['hoten'=>'[a-zA-Z]+','sodienthoai'=>'[0-9]{1,2}']);








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


Route::get('happynewyear','ProductsController@getAllProduct');


Route::post('add_noti',[
		'as'=>'add_noti',
		'uses'=>'ProductsController@postAddNoti'
	]);


////bai 2
//goi controller
	// có ko co tham so
		Route::get('xinchao','ProductsController@getXinchao');
	//co tham so

	// Route có định danh
	Route::get('dinhdanh',function(){
		return 123;
	})->name('route1');

	Route::get('dinhdanhroute',[
		'as'=>'dinhdanhroute',
		'uses'=>'ProductsController@getRoute'
	]);

//làm việc với url
	Route::get('goi-controller','ProductsController@getData');
//gửi nhận tham số trên request
	Route::get('get-form','ProductsController@getForm')->name('getform');
	Route::post('post-form','ProductsController@postForm')->name('postform');


	Route::get('setCookie','ProductsController@setCookie');

	Route::get('getCookie','ProductsController@getCookie');
	//lấy dữ liệu json với response
	Route::get('get-json','ProductsController@getJson');


	//upload file
	Route::get('upload-file','ProductsController@getUpload');
	Route::post('upload-file','ProductsController@postUpload');

	Route::get('cau-dieu-kien','ProductsController@getDieuKien');

	//middleware
	Route::get('kiem-tra-middleware','ProductsController@getKiemtra');

	Route::post('kiem-tra-middleware',[
		'middleware'=>'dieukien',
		'as'=>'kiem-tra-middleware',
		'uses'=>'ProductsController@postKiemtra'
	]);

	//Session
	Route::get('session',[
		'as'=>'session',
		'uses'=>'ProductsController@setSession'
	]);
	Route::get('del_session',[
		'as'=>'del_session',
		'uses'=>'ProductsController@forgetSession'
	]);



	Route::get('database',[
		'as'=>'create_table',
		'uses'=>'ProductsController@createTable'
	]);
	Route::get('lienket',[
		'as'=>'lienket_table',
		'uses'=>'ProductsController@lienketTable'
	]);
