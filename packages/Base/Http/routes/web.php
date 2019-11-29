<?php
//Thien Routes
Route::group(['prefix'=>'/'],function(){
	Route::group(['prefix'=>'thongbao'],function(){
		Route::get('list',function(){
			return view('bconnect::front.thongbao.list');
		});
		Route::get('profile',function(){
			return view('bconnect::front.thongbao.profile');
		});
		Route::get('create',function(){
			return view('bconnect::front.thongbao.create');
		});
	});
	Route::group(['prefix'=>'hoivien'],function(){
		Route::get('list',function(){
			return view('bconnect::front.hoivien.list');
		});
		Route::get('profile',function(){
			return view('bconnect::front.hoivien.profile');
		});
	});
	Route::group(['prefix'=>'login'],function(){
		Route::get('dangnhap',function(){
			return view('bconnect::front.login.login');
		});
		Route::get('dangky',function(){
			return view('bconnect::front.login.dangky');
		});
	});
	Route::group(['prefix'=>'dichvu'],function(){
		Route::get('detail',function(){
			return view('bconnect::front.dichvu.detail');
		});
		Route::get('list',function(){
			return view('bconnect::front.dichvu.list');
		});
	});
	Route::group(['prefix'=>'baogia'],function(){
		Route::get('list',function(){
			return view('bconnect::front.baogia.list');
		});
		Route::get('profile',function(){
			return view('bconnect::front.baogia.profile');
		});
		Route::get('create',function(){
			return view('bconnect::front.baogia.create');
		});
	});
});
