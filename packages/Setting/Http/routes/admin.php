<?php

Route::middleware(['admin','lang'])->prefix(config('ttsoft.cms_path'))->group(function () {
	Route::get("/setting",'SettingController@index')
			->name('admin.setting.get.index')
			->middleware('permission:setting-view');

	Route::post("/setting",'SettingController@getEdit')->name('admin.setting.get.getEdit');
});
// ajax
Route::get('/ajax/address','BranchController@getAddress')->name('ajax.branch.get.address');


