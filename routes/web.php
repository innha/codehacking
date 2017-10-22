<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', 'Auth\LoginController@showLoginForm');

Route::get('/logout', 'Auth\LoginController@logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function() {
	return view('admin.index');
});


Route::group(['middleware' => 'admin'], function() {
	Route::get('/admin', 'AdminController@index');

	Route::resource('/admin/users', 'AdminUsersController', ['as' => 'admin'], 
			['name' => [

				'admin/users' => 'admin.users.index',
				'create' => 'admin.users.create',
				'store' => 'admin.users.store',
				'show' => 'admin.users.show',
				'edit' => 'admin.users.edit',
				'update' => 'admin.users.update',
				'destroy' => 'admin.users.destroy'
			]]
	);


	Route::resource('/admin/posts', 'AdminPostsController', ['as' => 'admin'], 
			['name' => [

				'admin/posts' => 'admin.posts.index',
				'create' => 'admin.posts.create',
				'store' => 'admin.posts.store',
				'show' => 'admin.posts.show',
				'edit' => 'admin.posts.edit',
				'update' => 'admin.posts.update',
				'destroy' => 'admin.posts.destroy'
			]]
	);	

	// Route::resource('/admin/categoriess', 'AdminCategoriesController');
});