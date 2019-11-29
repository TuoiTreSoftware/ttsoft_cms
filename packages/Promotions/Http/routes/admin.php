<?php

Route::middleware(['admin'])->prefix(config('ttsoft.cms_path'))->group(function () {
	Route::prefix('don-hang-ban')->group(function () {
		Route::get("/",'AdminController@get_so')->name('sales.get.don_hang_ban.list');
		Route::get("/create",'AdminController@add_so')->name('sales.get.don_hang_ban.add');
	});
	Route::prefix('san-pham')->group(function () {
		Route::get("/",'AdminController@get_sp')
			->name('sales.get.san_pham.list')
			->middleware('permission:promotion-view');
		Route::get("/gio-hang",'AdminController@get_cart')->name('sales.get.get_cart.cart');
	});
	Route::prefix('hoa-don')->group(function () {
		Route::get("/",'AdminController@get_hoa_don')->name('sales.get.hoa_don.list');
		Route::get("/create",'AdminController@add_hoa_don')->name('sales.get.hoa_don.add');
	});
	Route::prefix('hang-ban-tra-lai')->group(function () {
		Route::get("/",'AdminController@get_return')->name('sales.get.tra_hang_ban.list');
		Route::get("/create",'AdminController@add_return')->name('sales.get.tra_hang_ban.add');
	});
	Route::prefix('bao-cao')->group(function () {
		Route::get("/doanh-so-ban-hang",'AdminController@dsbh')->name('sales.get.dsbh');
	});
});

Route::middleware(['admin'])->prefix(config('ttsoft.cms_path'))->group(function () {
	Route::prefix('promotions')->group(function () {
		Route::get("/",'DiscountController@getList')->name('admin.promotions.get.list');
		Route::get("/add",'DiscountController@getEdit')->name('admin.promotions.get.add');
		Route::post("/add",'DiscountController@postCreate')->name('admin.promotions.post.add');
		Route::get("/generate",'DiscountController@generate')->name('admin.promotions.generate.add');
		Route::get("/deleted/{id}",'DiscountController@getDeleted')->name('admin.promotions.get.deleted');
	});
});


