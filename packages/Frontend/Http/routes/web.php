<?php
Route::middleware(['frontend_lang'])->group(function () {

	Route::get('/','FrontendController@getHome')
	->name('frontend.home1.get');

	/* Set Language Frontend*/
	Route::get('lang/{lang}','FrontendController@setlocaleLanguage')
	->name('frontend.home.get.setlang');

	Route::get('/{slug}-{id}.html','FrontendController@getPageDetail')
	->name('frontend.page.detail.get')
	->where(['slug' => '[a-zA-Z0-9-]+','id' => '[0-9-]+']);;

	Route::get('/lien-he.html','FrontendController@getLienhe')
	->name('frontend.lienhe.get');

	Route::post('/lien-he.html','FrontendController@postLienhe')
	->name('web.contact.post');

	Route::get('/gioi-thieu.html','FrontendController@getGioithieu')
	->name('frontend.gioithieu.get');


	// Gio hang
	Route::group(['prefix' => 'cart'], function () {
		Route::post('update','CartController@updateCart')->name('web.account.post.updateCart');
		Route::get('destroy','CartController@deleteAllCart')->name('web.account.post.destroyCart');
		Route::post('remove','CartController@deleteCart')->name('web.cart.post.removeItem');
		Route::post('add','CartController@getAddToCart')->name('web.account.post.addToCart');
		Route::get("/destroy",'CartController@deleteAllCart')->name('web.cart.get.destroy');
	});

	Route::group(['prefix' => 'checkout'], function () {
		Route::get('/cart','CartController@getCart')->name('web.account.get.getCart');
		Route::get('/','CartController@getCheckout')->name('web.account.get.getCheckout');
		Route::post('/','CartController@postCheckout')->name('web.account.post.postCheckout');
		Route::get('/success','CartController@getSuccessful')->name('web.account.get.getSuccessful');
	});
	//khuyen mai
	Route::post('/check-code-discount','CartController@checkCodeDiscount')->name('frontend.insert.data.checkCodeDiscount');

	//end

	/* detail product params : slug, id*/
	Route::get("/san-pham.html",'ProductController@getProductList')->name('web.product.get.getProductList');


	Route::get("/filter",'ProductController@filter')->name('web.product.get.filter');

	Route::post("/getPriceAttr",'ProductController@getPriceAttr')->name('web.product.get.getPriceAttr');

	Route::get("/san-pham/{slug}-{productId}.html",'ProductController@getProductDetail')
	->name('web.product.get.getProductDetail')
	->where(['slug' => '[a-zA-Z0-9-]+','id' => '[0-9-]+']);
	
	Route::get('/san-pham/danh-muc/{alias}.html','ProductController@getCategory')
	->name('web.products.getProductsSlug')
	->where(['alias' => '[a-zA-Z0-9-]+']);

	Route::get('/tin-tuc.html','FrontendController@getTintuc')
	->name('frontend.tintuc.get');

	Route::get('/tin-tuc/{slug}-{id}.html','FrontendController@getNewsDetail')
	->name('frontend.news.detail.get')
	->where(['slug' => '[a-zA-Z0-9-]+','id' => '[0-9-]+']);;

	Route::get('/danh-muc/{alias}.html','FrontendController@getNewsSlug')
	->name('web.news.getNewsSlug')
	->where(['alias' => '[a-zA-Z0-9-]+']);

	/*Dự toán*/
	Route::get('/du-toan.html','DuToanController@getDuToan')
	->name('web.dutoan.get');

	Route::post('/du-toan.html','DuToanController@postDuToan')
	->name('web.dutoan.post');
	/*danh mục*/

// Home
// Breadcrumbs::for('home', function ($trail) {
//     $trail->push('Home', route('/'));
// });

// // Home > About
// Breadcrumbs::for('about', function ($trail) {
// 	$trail->parent('home');
// 	$trail->push('About', route('about'));
// });

// // Home > Blog
// Breadcrumbs::for('blog', function ($trail) {
// 	$trail->parent('home');
// 	$trail->push('Blog', route('blog'));
// });

// // Home > Blog > [Category]
// Breadcrumbs::for('category', function ($trail, $category) {
// 	$trail->parent('blog');
// 	$trail->push($category->title, route('category', $category->id));
// });

// // Home > Blog > [Category] > [Post]
// Breadcrumbs::for('post', function ($trail, $post) {
// 	$trail->parent('category', $post->category);
// 	$trail->push($post->title, route('post', $post->id));
// });
});


