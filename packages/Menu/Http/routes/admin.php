<?php

Route::middleware(['admin','lang'])->prefix(config('ttsoft.cms_path'))->group(function () {
	Route::prefix('menu')->group(function () {

		Route::prefix('category')->group(function () {
			Route::get('/create','MenuController@getCreateMenu')->name('admin.menu.cate.get.getCreateMenu');
			Route::post('/create','MenuController@postCreateMenu')->name('admin.menu.cate.post.postCreateMenu');

			Route::get('/edit/{id}','MenuController@getEditMenu')->name('admin.menu.cate.get.getEditMenu');
			Route::post('/edit/{id}','MenuController@postEditMenu')->name('admin.menu.cate.post.postEditMenu');
		});


		Route::get('/',[
			'as' => 'admin.menu.get.list',
			'uses' => 'MenuController@getList'
		])->middleware('permission:menu-view');

		Route::post('saveMenu',[
			'as' => 'admin.menu.saveMenu',
			'uses' => 'MenuController@postSaveMenu'
		]);

		Route::post('add-courses',[
			'as' => 'admin.menu.add.courses',
			'uses' => 'MenuController@postAddcourses'
		]);

		Route::post('saveCustom',[
			'as' => 'admin.menu.postAddCustom',
			'uses' => 'MenuController@postAddCustom'
		]);

		Route::post('addPage',[
			'as' => 'admin.menu.postAddPage',
			'uses' => 'MenuController@postAddPage'
		]);

		Route::post('addPost',[
			'as' => 'admin.menu.postAddPost',
			'uses' => 'MenuController@postAddPost'
		]);

		Route::post('saveTexthtml',[
			'as' => 'admin.menu.saveTexthtml',
			'uses' => 'MenuController@saveTexthtml'
		]);

		Route::post('addCatePost',[
			'as' => 'admin.menu.postAddCatePost',
			'uses' => 'MenuController@postAddCatePost'
		]);

		Route::get('delete/{id}',[
			'as' => 'admin.menu.delete',
			'uses' => 'MenuController@getDelete'
		]);
		Route::get('edit/{id}',[
			'as' => 'admin.menu.edit',
			'uses' => 'MenuController@getUpdate'
		]);
		Route::post('edit/{id}',[
				'as' => 'admin.menu.postEdit',
			'uses' => 'MenuController@postUpdate'
		]);
		Route::post('selectCate',[
			'as' => 'admin.menu.selectCate',
			'uses' => 'MenuController@postSelectCate'
		]);

		// datatable server side

		Route::prefix('datatables')->group(function () {
			Route::get("/list",'Datatables\DatatablesController@getListAjax')
				->name('admin.menu.datatables.get.list');
		});
	});
});


