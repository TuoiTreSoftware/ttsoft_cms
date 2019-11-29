<?php

/*Trang quản trị - /admin */
Route::middleware(['admin','lang'])->prefix(config('ttsoft.cms_path'))->group(function () {
	
	/*Phân hệ quản lý kho - /kho */
	Route::prefix('kho')->group(function () {

		/*Nhập kho hàng hóa - NVL - /nhap-kho */
		Route::prefix('nhap-kho')->group(function () {
			Route::get("/",'ImportinventoriesController@getList')
			->name('inventories.nhap_kho.get.list')
			->middleware('permission:inventories_import-view');
			Route::get("/add",'ImportinventoriesController@getCreate')->name('inventories.nhap_kho.get.add');
			Route::post("/add",'ImportinventoriesController@postCreate')->name('inventories.nhap_kho.post.add');
			Route::get("/delete/{id}",'ImportinventoriesController@getDelete')->name('inventories.nhap_kho.get.delete');
			//Cap nhat phieu nhap kho
			Route::get("/edit/{id}",'ImportinventoriesController@getEdit')->name('inventories.nhap_kho.get.getEdit');
			Route::post("/edit/{id}",'ImportinventoriesController@postEdit')->name('inventories.nhap_kho.post.postEdit');
			
		});

		// phiếu xuất kho
		Route::prefix('xuat-kho')->group(function () {
			Route::get("/",'ExportInventoriesController@getListXK')
			->name('inventories.xuat_kho.get.list')
			->middleware('permission:inventories_export-view');
			Route::get("/add",'ExportInventoriesController@getCreateXK')->name('inventories.xuat_kho.get.add');
			Route::post("/add",'ExportInventoriesController@postCreateXK')->name('inventories.xuat_kho.post.add');
			Route::get("/edit/{id}",'ExportInventoriesController@getEditXK')->name('inventories.xuat_kho.get.edit');
			Route::post("/edit/{id}",'ExportInventoriesController@postEditXK')->name('inventories.xuat_kho.post.edit');
			Route::get("/delete/{id}",'ExportInventoriesController@getDeleteXK')->name('inventories.xuat_kho.get.delete');
		});
		Route::prefix('dieu-chuyen')->group(function () {
			Route::get("/",'TransferController@getList')
			->name('inventories.dieu_chuyen.get.list')
			->middleware('permission:inventories_dc-view');
			Route::get("/add",'TransferController@getCreate')->name('inventories.dieu_chuyen.get.add');
			Route::post("/add",'TransferController@postCreate')->name('inventories.dieu_chuyen.post.add');
			Route::get("/delete/{id}",'TransferController@getDeleteXK')->name('inventories.dieu_chuyen.get.delete');
		});
		Route::prefix('bao-cao')->group(function () {
			Route::get("/",'ReportinvantoriesController@getReportNXT')
			->name('inventories.bao_cao.get.list')
			->middleware('permission:report-view');
			
		});
		
		/*Find product to ajax append*/
		Route::post("/find-product",'ImportinventoriesController@findProduct')->name('importinventory.product.get.findProduct');
		Route::post("/find-xk",'ExportInventoriesController@findProduct')->name('exportinventories.product.get.findProduct');
		Route::post("/ttt",'ImportinventoriesController@text');
		Route::post("/autocomplete",'ImportinventoriesController@autocomplete')
			->name('importinventory.get.autocomplete');

	});
});



