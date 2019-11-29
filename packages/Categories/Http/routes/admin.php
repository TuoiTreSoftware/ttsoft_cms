<?php

Route::middleware(['admin','lang'])->prefix(config('ttsoft.cms_path'))->group(function () {
	Route::prefix('categories')->group(function(){
		Route::prefix('inventories')->group(function () {
			Route::get("/",'AdminController@getList')
				->name('categories.inventories.get.list')
				->middleware('permission:categories-view');
			Route::get("/create",'AdminController@getCreate')->name('categories.inventories.get.create');
			Route::post("/create",'AdminController@postCreate')->name('categories.inventories.post.create');
			Route::get("/edit/{id}",'AdminController@getEdit')->name('categories.inventories.get.edit');
			Route::post("/edit/{id}",'AdminController@postEdit')->name('categories.inventories.post.edit');
			Route::get("/delete/{id}",'AdminController@getDelete')->name('categories.inventories.get.Delete');
		});
		Route::prefix('product-categories')->group(function(){
			Route::get("/",'ProductCategoryController@getList')
					->name('product.categories.get.list')
					->middleware('permission:categories-view');
			Route::get("/create",'ProductCategoryController@getCreate')->name('product.categories.get.create');
			Route::post("/create",'ProductCategoryController@postCreate')->name('product.categories.post.create');
			Route::get("/edit/{id}",'ProductCategoryController@getEdit')->name('product.categories.get.edit');
			Route::post("/edit/{id}",'ProductCategoryController@postEdit')->name('product.categories.post.edit');
			Route::get("/delete/{id}",'ProductCategoryController@getDelete')->name('product.categories.get.Delete');

			Route::prefix('datatables')->group(function () {
				Route::get("/list",'Datatables\DatatablesCatetegoryController@getListAjax')
					->name('admin.product_categories.datatables.get.list');
			});
		});

		Route::prefix('producer')->group(function(){
			Route::get("/",'ProducerController@getList')
					->name('producer.get.list')
					->middleware('permission:categories-view');
			Route::get("/create/",'ProducerController@getCreate')->name('producer.get.create');
			Route::post("/create/",'ProducerController@postCreate')->name('producer.post.create');
			Route::get("/edit/{id}",'ProducerController@getEdit')->name('producer.get.edit');
			Route::post("/edit/{id}",'ProducerController@postEdit')->name('producer.post.edit');
			Route::get("/delete/{id}",'ProducerController@getDelete')->name('producer.get.Delete');
		});

		Route::get("/{category}",'CategoryController@getList')
				->name('categories.get.list')
				->middleware('permission:categories-view');
		Route::get("/create/{category}",'CategoryController@getCreate')->name('categories.get.create');
		Route::post("/create/{category}",'CategoryController@postCreate')->name('categories.post.create');
		Route::get("/edit/{id}",'CategoryController@getEdit')->name('categories.get.edit');
		Route::post("/edit/{id}",'CategoryController@postEdit')->name('categories.post.edit');
		Route::get("/delete/{id}",'CategoryController@getDelete')->name('categories.get.Delete');
	});
});


