<?php

/*Trang quản trị - /admin */
Route::middleware(['admin','lang'])->prefix(config('ttsoft.cms_path'))->group(function () {
	/*Phân hệ quản lý vật tư - /vật tư */
	Route::prefix('product')->group(function () {

		/*Tạo mới vật tư - NVL - */
		Route::prefix('create')->group(function () {
			Route::get("/",'ProductController@getCreate')->name('products.get.create');
			Route::post("/",'ProductController@postCreate')->name('products.post.create');
		});
		Route::prefix('list')->group(function () {
			Route::get("/",'ProductController@getList')
			->name('products.get.list')
			->middleware('permission:products-view');
		});
		Route::prefix('edit')->group(function () {
			Route::get("/{id}",'ProductController@getEdit')->name('products.get.edit');
			Route::post("/{id}",'ProductController@postEdit')->name('products.post.edit');
		});
		Route::prefix('delete')->group(function () {
			Route::get("/{id}",'ProductController@getDelete')->name('products.get.delete');
		});
		Route::prefix('detail')->group(function () {
			Route::get("/{id}",'ProductController@getDetail')->name('products.get.detail');
		});

		Route::get("/image/delete/{id}",'ProductController@getDelImg')->name('admin.courses.get.getDelImg');

		/*Search product by keywords*/
		Route::post("/autocomplete",'ProductAutocompleteController@autocomplete')->name('product.get.autocomplete');

		Route::prefix('datatables')->group(function () {
			Route::get("/list",'Datatables\DatatablesProductController@getListAjax')
				->name('admin.product.datatables.get.list');
		});



		Route::get("/getAllAttrs",'ProductController@getAllAttrs')->name('admin.product.get.getAllAttrs');

		Route::get("export/product",'ProductController@getExport')->name('admin.product.export');
		
	});


	Route::prefix('attribute')->group(function () {

		/*Tạo mới Attribute - */
		Route::prefix('create')->group(function () {
			Route::get("/",'AttributeController@getCreate')->name('admin.attribute.get.create');
			Route::post("/",'AttributeController@postCreate')->name('admin.attribute.post.create');
		});
		Route::prefix('list')->group(function () {
			Route::get("/",'AttributeController@getList')->name('admin.attribute.get.list');
		});
		Route::prefix('edit')->group(function () {
			Route::get("/{id}",'AttributeController@getEdit')->name('admin.attribute.get.edit');
			Route::post("/{id}",'AttributeController@postEdit')->name('admin.attribute.post.edit');
		});
		Route::prefix('delete')->group(function () {
			Route::get("/{id}",'AttributeController@getDelete')->name('admin.attribute.get.delete');
		});

		Route::prefix('datatables')->group(function () {
			Route::get("/list",'Datatables\DatatablesAttributeController@getListAjax')
				->name('admin.attribute.datatables.get.list');
		});
	});

	/*QUẢN LÝ CÀI ĐẶT VÀ ĐƠN HÀNG DỰ TOÁN*/
	Route::prefix('du-toan')->group(function () {
		/*Danh sách đơn hàng dự toán*/
		Route::prefix('list')->group(function () {
			Route::get("/",'DuToanController@getList')
				->name('sales.dutoan.get.list');
		});

		/*Tham số dự toán*/
		Route::prefix('tham-so')->group(function () {
			Route::get("/",'DuToanController@getThamSo')
			->name('sales.dutoan.get.tham-so');

			Route::post("/",'DuToanController@postThamSo')
			->name('sales.dutoan.post.postThamSo');
		});
	});
});


