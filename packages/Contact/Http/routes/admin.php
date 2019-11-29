<?php

Route::middleware(['admin','lang'])->prefix(config('ttsoft.cms_path'))->group(function () {
	Route::get("/contact",'ContactController@index')
		->name('admin.contact.get.index')
		->middleware('permission:contact-view');

	Route::get("/contact/export",'ContactController@export')->name('admin.contact.export.get.index');

	Route::prefix('datatables')->group(function () {
		Route::get("/list",'Datatables\DatatablesController@getListAjax')
			->name('admin.contact.datatables.get.list');
	});
});


