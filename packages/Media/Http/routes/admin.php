<?php
Route::middleware(['admin','lang'])->prefix(config('ttsoft.cms_path'))->group(function () {
	Route::prefix('media')->group(function () {
		Route::get("/",'MediaController@getList')->name('admin.media.get.list');
		Route::get("/add",'MediaController@getCreate')->name('admin.media.get.add');
		Route::post("/add",'MediaController@postCreate')->name('admin.media.post.add');
		Route::get("/edit/{id}",'MediaController@getEdit')->name('admin.media.get.edit');
		Route::post("/edit/{id}",'MediaController@postEdit')->name('admin.media.post.edit');
		Route::get("/delete/{id}",'MediaController@getDelete')->name('admin.media.get.delete');
		Route::get("/list/{category}",'MediaController@getListCategory')->name('admin.media.get.list.category');

		Route::post("/home/update/{slug}",'MediaController@postHomeUpdate')->name('admin.media.post.postHomeUpdate');
	});
});
