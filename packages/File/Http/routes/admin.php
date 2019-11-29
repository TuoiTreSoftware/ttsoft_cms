<?php
Route::middleware(['admin','lang'])->prefix(config('ttsoft.cms_path'))->group(function () {
	Route::get('/ckfinderURL','FileController@ckfinder')->name('admin.file.get.ckfinder');
	//export;
	Route::get('export','ExportController@getExport')->name('admin.file.export.product');
});
