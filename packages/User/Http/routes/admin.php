<?php

Route::middleware(['admin','lang'])->prefix(config('ttsoft.cms_path'))->group(function () {
	/* phân roles users */
	Route::group(['prefix' => 'users'], function () {
		Route::get('list',[
			'as'=>'users.index',
			'uses'=>'UserController@index',
			'middleware' => [
				'permission:user-view'
			]
		]);
		Route::get('create',[
			'as'=>'users.create',
			'uses'=>'UserController@create',
			'middleware' => [
				'permission:user-create'
			]
		]);
		Route::post('create',[
			'as'=>'users.store',
			'uses'=>'UserController@store',
			
		]);
		Route::get('show/{id}',[
			'as'=>'users.show',
			'uses'=>'UserController@show',
			'middleware' => [
				'permission:role-view'
			]
		]);
		Route::get('{id}/edit',[
			'as'=>'users.edit',
			'uses'=>'UserController@edit',
		]);
		Route::patch('update/{id}',[
			'as'=>'users.update',
			'uses'=>'UserController@update',
			'middleware' => [
				'permission:user-edit'
			]
		]);
		Route::delete('delete/{id}',[
			'as'=>'users.destroy',
			'uses'=>'UserController@destroy',
			'middleware' => [
				'permission:user-delete'
			]
		]);
	});

	//Roles
	Route::group(['prefix' => 'roles'], function () {
		Route::get('/list',[
			'as'=>'roles.index',
			'uses'=>'RoleController@index',
			'middleware' => [
				//'permission:role-view'
			]
		]);
		Route::get('create',[
			'as'=>'roles.create',
			'uses'=>'RoleController@create',
		]);
		Route::post('create',[
			'as'=>'roles.store',
			'uses'=>'RoleController@store',
			'middleware' => [
				//'permission:role-add'
			]
		]);
		Route::get('show/{id}',[
			'as'=>'roles.show',
			'uses'=>'RoleController@show',
		]);
		Route::get('edit/{id}',[
			'as'=>'roles.edit',
			'uses'=>'RoleController@edit',
		]);
		Route::patch('update/{id}',[
			'as'=>'roles.update',
			'uses'=>'RoleController@update',
			'middleware' => [
				//'permission:role-edit'
			]
		]);
		Route::delete('delete/{id}',[
			'as'=>'roles.destroy',
			'uses'=>'RoleController@destroy',
			'middleware' => [
				//'permission:role-delete'
			]
		]);
	});
});


