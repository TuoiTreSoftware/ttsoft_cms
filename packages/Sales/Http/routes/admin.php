<?php

/*Trang quản trị - /admin */
Route::middleware(['admin'])->prefix(config('ttsoft.cms_path'))->group(function () {
	/*Phân hệ quản lý bán hàng - kinh doanh - /sales */
	Route::prefix('sales')->group(function () {
		Route::prefix('don-hang')->group(function () {
			Route::get("/",'OrderController@getListOrder')->name('sales.don_hang_ban.get.list');

			Route::get("/create",'OrderController@getCreateOrder')->name('sales.don_hang_ban.get.getCreateOrder');
			Route::post("/create",'OrderController@postCreateOrder')->name('sales.don_hang_ban.get.postCreateOrder');

			Route::get("/edit/{id}",'OrderController@getEditOrder')->name('sales.don_hang_ban.get.getEditOrder');
			Route::post("/edit/{id}",'OrderController@postEditOrder')->name('sales.don_hang_ban.get.postEditOrder');

			Route::post("/autocomplete",'OrderController@autocomplete')->name('sales.don_hang_ban.get.autocomplete');

			Route::post("/find-product",'OrderController@findProduct')->name('sales.don_hang_ban.get.findProduct');


			Route::post('/autocomplete-staff-tv','OrderController@autocompleteStaffTV')->name('sales.don_hang_ban.get.autocompleteStaffTV');
			Route::post("/find-staff-tv",'OrderController@findStaffTV')->name('sales.don_hang_ban.get.findStaff');

			Route::post('/autocomplete-staff-tua','OrderController@autocompleteStaffTua')->name('sales.don_hang_ban.get.autocompleteStaffTua');
			Route::post("/find-staff-tua",'OrderController@findStaffTua')->name('sales.don_hang_ban.get.findStaffTua');

			Route::get('/export/sales','OrderController@getExport')->name('export.sales');
		});
	});
});


