<?php

Route::middleware(['admin','lang'])->prefix(config('ttsoft.cms_path'))->group(function () {
	Route::get("/setting",'SettingController@index')
			->name('admin.setting.get.index')
			->middleware('permission:setting-view');

	Route::post("/setting",'SettingController@getEdit')->name('admin.setting.get.getEdit');


	Route::prefix('branch')->group(function () {
		Route::get("/",'BranchController@getList')
				->name('admin.branch.get.list')
				->middleware('permission:branch-view');
		Route::post("/add",'BranchController@postCreate')->name('admin.branch.post.add');

		Route::get("/edit/{id}",'BranchController@getEdit')->name('admin.branch.get.edit');
		Route::post("/edit/{id}",'BranchController@postEdit')->name('admin.branch.post.edit');

		Route::get("/delete/{id}",'BranchController@getDelete')->name('admin.branch.get.delete');
	});
});
// ajax
Route::get('/ajax/address','BranchController@getAddress')->name('ajax.branch.get.address');


