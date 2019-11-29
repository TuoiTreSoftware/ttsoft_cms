<?php

Route::middleware(['admin','lang'])->prefix(config('ttsoft.cms_path'))->group(function () {
	Route::prefix('post')->group(function () {
		Route::get("/",'PostController@getList')
			->name('admin.post.get.list')
			->middleware('permission:post-view');
		Route::get("/add",'PostController@getCreate')->name('admin.post.get.add');
		Route::post("/add",'PostController@postCreate')->name('admin.post.post.add');

		Route::get("/edit/{id}",'PostController@getEdit')->name('admin.post.get.edit');
		Route::post("/edit/{id}",'PostController@postEdit')->name('admin.post.post.edit');

		Route::get("/delete/{id}",'PostController@getDelete')->name('admin.post.get.delete');

		Route::prefix('datatables')->group(function () {
			Route::get("/list",'Datatables\DatatablesPostController@getListAjax')
				->name('admin.post.datatables.get.list');
		});
	});
	Route::prefix('category')->group(function () {
		Route::get("/",'CategoryController@getList')
				->name('admin.post-categories.get.list')
				->middleware('permission:post-category-view');
		Route::post("/add",'CategoryController@postCreate')->name('admin.post-categories.post.add');

		Route::get("/edit/{id}",'CategoryController@getEdit')->name('admin.post-categories.get.edit');
		Route::post("/edit/{id}",'CategoryController@postEdit')->name('admin.post-categories.post.edit');

		Route::get("/delete/{id}",'CategoryController@getDelete')->name('admin.post-categories.get.delete');

		Route::prefix('datatables')->group(function () {
			Route::get("/list",'Datatables\DatatablesCatetegoryController@getListAjax')
				->name('admin.post_categories.datatables.get.list');
		});
	});
	Route::prefix('tag')->group(function () {
		Route::get("/",'TagController@getList')->name('admin.post-tags.get.list');
		Route::get("/add",'TagController@getCreate')->name('admin.post-tags.get.add');
		Route::post("/add",'TagController@postCreate')->name('admin.post-tags.post.add');
	});
});


