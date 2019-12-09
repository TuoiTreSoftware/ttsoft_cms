<?php
Route::middleware(['frontend_lang'])->group(function () {

	Route::get('/','DocumentController@getIndex')
	->name('get.index.document');

	Route::prefix('documents')->group(function(){
		Route::prefix('/v1.5.0')->group(function(){
			Route::get('/{slug}','FrontendController@getNewsDetail')
			->name('frontend.news.detail.get')
			->where(['version' => '[a-zA-Z0-9-]+']);
		});
	});
	
	/* Set Language Frontend*/
	Route::get('lang/{lang}','FrontendController@setlocaleLanguage')
	->name('frontend.home.get.setlang');
});


