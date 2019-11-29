<?php

Route::middleware(['admin','lang'])->prefix(config('ttsoft.cms_path'))->group(function () {
	Route::prefix('home')->group(function () {
		Route::get("/",'HomeController@getList')
				->name('admin.home.get.list');
		Route::get("/edit/{slug}",'HomeController@getEdit')->name('admin.home.get.edit');
		Route::post("/edit/{slug}",'HomeController@postEdit')->name('admin.home.post.edit');

		Route::get("/view/{id}",'HomeController@getView')->name('admin.home.get.view');

		Route::get("/driveto",'HomeController@getDriveTo')->name('admin.home.get.driveto');
		Route::get("/insider",'HomeController@getInsider')->name('admin.home.get.insider');
		Route::get("/index_home",'HomeController@getIndexHome')->name('admin.home.get.index')
			->middleware('permission:home-view');
	});
});