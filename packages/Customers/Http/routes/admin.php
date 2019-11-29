<?php

Route::middleware(['admin','lang'])->prefix(config('ttsoft.cms_path'))->group(function () {
	Route::prefix('customer')->group(function () {
		Route::get('/','CustomerController@getList')
			->name('customer.get.list');
			// ->middleware('permission:customer-view');
		
		Route::get('/create','CustomerController@getCreate')->name('customer.get.create');
		Route::post('/create','CustomerController@postCreate')->name('customer.post.create');

		Route::get('/edit/{id}','CustomerController@getEdit')->name('customer.get.edit');
		Route::post('/edit/{id}','CustomerController@postEdit')->name('customer.post.edit');

		Route::get('/detail/{id}','CustomerController@getDetail')->name('customer.get.detail');

		Route::get('/delete/{id}','CustomerController@getDelete')->name('customer.get.delete');

	});
	
});


