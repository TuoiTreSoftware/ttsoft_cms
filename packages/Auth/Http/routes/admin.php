<?php

Route::prefix(config('ttsoft.cms_path'))->group(function () {
	Route::get("/login",'AuthController@index')->name('auth.login.get.index');
	Route::post("/login",'AuthController@postLogin')->name('auth.login.post.index');

	Route::get("/logout",'AuthController@logout')->middleware(['admin'])->name('auth.login.get.logout');

	Route::get("/forgot","AuthController@showLinkRequestForm")->name("showLinkRequestForm.get.index");
	Route::post("/forgot","AuthController@postForgot")->name("sendResetLinkEmail.post.index");

	Route::get("/reset/{email}/{token}","AuthController@showFormReset")->name("showFormReset.get.index");
	Route::post("/reset/{email}/{token}","AuthController@resetFormReset")->name("resetFormReset.post.index");
});


