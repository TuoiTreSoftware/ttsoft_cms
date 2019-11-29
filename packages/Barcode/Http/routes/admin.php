<?php

/*Trang quản trị - /admin */
Route::middleware(['admin'])->prefix(config('ttsoft.cms_path'))->group(function () {
    Route::prefix('barcode')->group(function () {
    	Route::get('/', 'BarcodeController@getGenerate')->name('barcode.get.generate');
    });
});
