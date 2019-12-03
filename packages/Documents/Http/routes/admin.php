<?php

Route::middleware(['admin','lang'])->prefix(config('ttsoft.cms_path'))->group(function () {
	Route::prefix('documents')->group(function () {
		Route::prefix('version')->group(function () {
			Route::get("/",'DocumentVersionController@getCreate')->name('get.create.document_version');
			Route::post("/",'DocumentVersionController@postCreate')->name('post.create.document_version');
			Route::get("/edit/{id}",'DocumentVersionController@getEdit')->name('get.edit.document_version');
			Route::post("/edit/{id}",'DocumentVersionController@postEdit')->name('post.edit.document_version');
			Route::get("/delete/{id}",'DocumentVersionController@delete')->name('delete.document_version');
		});

		Route::prefix('menu')->group(function () {
			Route::get("/",'DocumentMenuController@getCreate')->name('get.create.document_menu');
			Route::post("/",'DocumentMenuController@postCreate')->name('post.create.document_menu');
			Route::get("/edit/{id}",'DocumentMenuController@getEdit')->name('get.edit.document_menu');
			Route::post("/edit/{id}",'DocumentMenuController@postEdit')->name('post.edit.document_menu');
			Route::get("/delete/{id}",'DocumentMenuController@delete')->name('delete.document_menu');
		});

		Route::get("/",'DocumentController@getList')->name('get.list.document');
		Route::get("/create",'DocumentController@getCreate')->name('get.create.document');
		Route::post("/create",'DocumentController@postCreate')->name('post.create.document');
		Route::get("/edit/{id}",'DocumentController@getEdit')->name('get.edit.document');
		Route::post("/edit/{id}",'DocumentController@postEdit')->name('post.edit.document');
		Route::get("/delete/{id}",'DocumentController@delete')->name('delete.document');
	});
});


