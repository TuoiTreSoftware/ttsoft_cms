<?php

Route::middleware(['admin','lang'])->prefix(config('ttsoft.cms_path'))->group(function () {
	Route::prefix('accounting')->group(function () {
		Route::prefix('phieu-thu')->group(function () {
			Route::get("/",'PhieuThuController@getList')->name('accounting.phieu_thu.get.list');
			Route::get("/add",'PhieuThuController@getCreate')->name('accounting.phieu_thu.get.add');
			Route::post("/add",'PhieuThuController@postCreate')->name('accounting.phieu_thu.post.add');
			Route::get("/edit/{id}",'PhieuThuController@getEdit')->name('accounting.phieu_thu.get.edit');
			Route::post("/edit/{id}",'PhieuThuController@postEdit')->name('accounting.phieu_thu.post.edit');
			Route::get("/delete/{id}",'PhieuThuController@getDelete')->name('accounting.phieu_thu.get.delete');
		});
		// phieu chi
		Route::prefix('phieu-chi')->group(function () {
			Route::get("/",'PhieuChiController@getList')->name('accounting.phieu_chi.get.list');
			Route::get("/add",'PhieuChiController@getCreate')->name('accounting.phieu_chi.get.add');
			Route::post("/add",'PhieuChiController@postCreate')->name('accounting.phieu_chi.post.add');
			Route::get("/edit/{id}",'PhieuChiController@getEdit')->name('accounting.phieu_chi.get.edit');
			Route::post("/edit/{id}",'PhieuChiController@postEdit')->name('accounting.phieu_chi.post.edit');
			Route::get("/delete/{id}",'PhieuChiController@getDelete')->name('accounting.phieu_chi.get.delete');
		});
		// Bao co ngan hang
		Route::prefix('bao-co')->group(function () {
			Route::get("/",'BaoCoController@getList')->name('accounting.bao_co.get.list');
			Route::get("/add",'BaoCoController@getCreate')->name('accounting.bao_co.get.add');
			Route::post("/add",'BaoCoController@postCreate')->name('accounting.bao_co.post.add');
			Route::get("/edit/{id}",'BaoCoController@getEdit')->name('accounting.bao_co.get.edit');
			Route::post("/edit/{id}",'BaoCoController@postEdit')->name('accounting.bao_co.post.edit');
			Route::get("/delete/{id}",'BaoCoController@getDelete')->name('accounting.bao_co.get.delete');
		});
		// Bao no ngan hang
		Route::prefix('bao-no')->group(function () {
			Route::get("/",'BaoNoController@getList')->name('accounting.bao_no.get.list');
			Route::get("/add",'BaoNoController@getCreate')->name('accounting.bao_no.get.add');
			Route::post("/add",'BaoNoController@postCreate')->name('accounting.bao_no.post.add');
			Route::get("/edit/{id}",'BaoNoController@getEdit')->name('accounting.bao_no.get.edit');
			Route::post("/edit/{id}",'BaoNoController@postEdit')->name('accounting.bao_no.post.edit');
			Route::get("/delete/{id}",'BaoNoController@getDelete')->name('accounting.bao_no.get.delete');
		});
	});
});


