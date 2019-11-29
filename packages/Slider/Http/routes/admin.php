<?php
Route::middleware(['admin','lang'])->prefix(config('ttsoft.cms_path'))->group(function () {
	Route::prefix('slider')->group(function () {
		Route::get("/add",'SliderController@getCreate')->name('admin.slider.get.add');
		Route::post("/add",'SliderController@postCreate')->name('admin.slider.post.add');

		Route::get("/edit/{id}",'SliderController@getEdit')->name('admin.slider.get.edit');
		Route::post("/edit/{id}",'SliderController@postEdit')->name('admin.slider.post.edit');
		Route::get("/delete/{id}",'SliderController@getDelete')->name('admin.slider.get.delete');

		Route::get("/list/{category}",'SliderController@getList')
			->name('admin.slider.get.list')
			->middleware('permission:slider-view');
	});
});
