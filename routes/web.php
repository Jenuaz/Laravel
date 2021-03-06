<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', 'HomeController@index');

Route::group(['middleware' => 'role:developer'], function() {
	Route::group(['prefix' => 'admin'], function () {
		Route::resource('/permissions', 'PermissionController', ['only' => ['index', 'store', 'update']]);
		Route::resource('/contacts', 'ContactController');
	});
});


Route::group(['middleware' => 'role:manager'], function() {

	Route::get('/admin', function() {
		return 'Welcome Manager';
	});
	
	Route::resource('/roles', 'PermissionController', ['only' => ['index']]);
});


Route::group(['prefix' => 'api'], function () {
//	Route::get('products', ['as' => 'products', function () {
//		return App\Product::all(); 	//select * from tableName	
	//	}]);
	Route::resource('products', 'ProductController', ['only' => ['index', 'store', 'update']]);
//	Description add to an existing product
	Route::resource('products.descriptions', 'ProductDescriptionController', ['only' => ['index', 'store']]);
});


//Route::get('/home', 'HomeController@index')->name('home');
