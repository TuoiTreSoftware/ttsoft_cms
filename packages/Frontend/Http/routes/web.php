<?php
Route::middleware(['frontend_lang'])->group(function () {

	Route::get('/','DocumentController@getIndex')
	->name('get.index.document');

	Route::prefix('documents')->group(function(){
		Route::get('/{version}/{slug}','DocumentController@getDocument')
		->name('frontend.docs.version');	
	});
	
	/* Set Language Frontend*/
	Route::get('lang/{lang}','FrontendController@setlocaleLanguage')
	->name('frontend.home.get.setlang');

	Route::get('/post/{slug}-{id}.html','FrontendController@getNewsDetail')
	->name('frontend.news.detail.get')
	->where(['slug' => '[a-zA-Z0-9-]+','id' => '[0-9-]+']);
});


