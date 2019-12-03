<?php
Route::middleware(['frontend_lang'])->group(function () {

	Route::get('/','DocumentController@getIndex')
	->name('get.index.document');

	Route::prefix('documents')->group(function(){
		Route::get('/','DocumentController@getDocument')
		->name('frontend.docs.v1.5');	
	});
	
	/* Set Language Frontend*/
	Route::get('lang/{lang}','FrontendController@setlocaleLanguage')
	->name('frontend.home.get.setlang');

	
});


