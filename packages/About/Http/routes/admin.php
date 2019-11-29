<?php

Route::middleware(['admin','lang'])->prefix(config('ttsoft.cms_path'))->group(function () {
	Route::prefix('about')->group(function () {
		Route::get("/",'AboutController@getList')
			->name('admin.about.get.list')
			->middleware('permission:about-view');
		Route::post("/update",'AboutController@postEdit')
			->name('admin.about.get.update')
			->middleware('permission:post-view');
	});
});