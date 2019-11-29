<?php
Route::middleware(['frontend_lang'])->group(function () {

	Route::get('/','FrontendController@getHome')
	->name('frontend.home.get');

	/* Set Language Frontend*/
	Route::get('lang/{lang}','FrontendController@setlocaleLanguage')
	->name('frontend.home.get.setlang');

	
});


