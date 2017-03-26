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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/admin', 'HomeController@admin')->middleware('auth');
Route::get('/articles/{article}', 'ArticleController@detail');
Route::get('/news', 'ArticleController@listNew')->name('articles.new');
Route::get('/promotions', 'ArticleController@listPromotion')->name('articles.promotion');
Route::get('/products/{product}', 'ProductController@detail');
Route::get('/products', 'ProductController@listNew')->name('products.new');


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
	Route::group(['prefix' => 'products'], function(){
	Route::get('/', function(){
		return view('product.index');
	})->name('products.index');
	Route::post('/', 'ProductController@store')->name('products.store');
	Route::get('create', 'ProductController@create')->name('products.create');
	Route::get('{product}', 'ProductController@show')->name('products.show');
	Route::get('edit/{product}', 'ProductController@edit')->name('products.edit');
	Route::put('{product}', 'ProductController@update')->name('products.update');
	Route::delete('{product}', 'ProductController@delete')->name('products.delete');
	});	
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
	Route::group(['prefix' => 'articles'], function(){
	Route::get('news', 'ArticleController@newIndex');
	Route::get('promotions', 'ArticleController@promotionIndex');
	Route::post('/', 'ArticleController@store');
	Route::get('news/create', 'ArticleController@newCreate');
	Route::get('promotions/create', 'ArticleController@promotionCreate');
	Route::get('edit/{article}', 'ArticleController@edit');
	Route::put('{article}', 'ArticleController@update');
	Route::delete('{article}', 'ArticleController@delete');
	});	
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
	Route::group(['prefix' => 'sliders'], function(){
	Route::get('/', function(){
		return view('slider.index');
	})->name('sliders.index');
	Route::post('/', 'SliderController@store')->name('sliders.store');
	Route::get('create', 'SliderController@create')->name('sliders.create');
	Route::get('{product}', 'SliderController@show')->name('sliders.show');
	Route::get('edit/{product}', 'SliderController@edit')->name('sliders.edit');
	Route::put('{product}', 'SliderController@update')->name('sliders.update');
	Route::delete('{product}', 'SliderController@delete')->name('sliders.delete');
	});	
});


