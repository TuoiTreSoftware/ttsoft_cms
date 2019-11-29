<?php

/*Trang quản trị - /admin */
Route::middleware(['admin'])->prefix(config('ttsoft.cms_path'))->group(function () {
    Route::prefix('alepaypayment')->group(function () {
    	Route::get('/test','AlepayPaymentController@test')->name('alepay.callback.url');
    	Route::get('/callback','AlepayPaymentController@callback')->name('alepay.callback.url.callback');
    	Route::get('/cancel','AlepayPaymentController@cancel')->name('alepay.callback.url.cancel');
    });
});
