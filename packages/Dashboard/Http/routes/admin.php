<?php

Route::middleware(['admin','lang'])->prefix(config('ttsoft.cms_path'))->group(function () {
	Route::get("/",'DashboardController@index')->name('admin.dashboard.get.index');
});


