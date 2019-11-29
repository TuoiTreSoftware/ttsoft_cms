<?php
Route::middleware(['admin','lang'])->prefix(config('ttsoft.cms_path'))->group(function () {
	Route::prefix('page')->group(function () {
		Route::get("/list",'PageController@getList')
			->name('admin.page.get.list')
			->middleware('permission:page-view');
		Route::get("/add",'PageController@getCreate')->name('admin.page.get.add');
		Route::post("/add",'PageController@postCreate')->name('admin.page.post.add');

		Route::get("/edit/{id}",'PageController@getEdit')->name('admin.page.get.edit');
		Route::post("/edit/{id}",'PageController@postEdit')->name('admin.page.post.edit');
		Route::get("/delete/{id}",'PageController@getDelete')->name('admin.page.get.delete');


		// datatable server side

		Route::prefix('datatables')->group(function () {
			Route::get("/list",'Datatables\DatatablesPageController@getListAjax')
				->name('admin.page.datatables.get.list');
		});

	});
});
