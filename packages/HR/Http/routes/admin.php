<?php

Route::middleware(['admin','lang'])->prefix(config('ttsoft.cms_path'))->group(function () {
	Route::prefix('staffs')->group(function () {
		Route::get('/','StaffsController@getList')->name('staffs.get.list');
		Route::get('/create','StaffsController@getCreate')->name('staffs.get.create');
		Route::post('/create','StaffsController@postCreate')->name('staffs.post.create');
		Route::get('/edit/{id}','StaffsController@getEdit')->name('staffs.get.edit');
		Route::post('/edit/{id}','StaffsController@postEdit')->name('staffs.post.edit');
		Route::get('/detail/{id}','StaffsController@getDetail')->name('staffs.get.detail');
		Route::get('/delete/{id}','StaffsController@getDelete')->name('staffs.get.delete');
	});

	Route::prefix('cham-cong')->group(function () {
		Route::get('/','StaffsInOutController@getList')->name('staffs_in_out.get.list');
		Route::post('/','StaffsInOutController@postChamCongVao')->name('staffs_in_out.post.chamcong');
		Route::get('/edit/{id}','StaffsInOutController@getEdit')->name('staffs_in_out.get.edit');
		Route::post('/edit/{id}','StaffsInOutController@postEdit')->name('staffs_in_out.post.edit');
		Route::get('/detail/{id}','StaffsInOutController@getDetail')->name('staffs_in_out.get.detail');
		Route::get('/delete/{id}','StaffsInOutController@getDelete')->name('staffs_in_out.get.delete');
	});

	Route::prefix('commission')->group(function () {
		Route::get('/','CommissionController@getList')->name('commission.get.list');
		Route::post('/create','CommissionController@postCreate')->name('commission.post.create');
	});

	Route::prefix('report-cham-cong')->group(function () {
		Route::get('/','StaffsInOutController@getList')->name('report_staffs_in_out.get.list');
		Route::post('/','StaffsInOutController@postChamCongVao')->name('staffs_in_out.post.chamcong');
	});
	
});


