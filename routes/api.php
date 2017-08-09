<?php
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::get('/user', function (Request $request) {
	return $request->user();
})->middleware('auth:api');

Route::group(['prefix' => 'products'], function () {
	Route::post('/', 'ProductController@index');
	Route::delete('{product}', 'ProductController@delete');
	Route::put('/{product}', 'ProductController@changeStatus');
});
Route::group(['prefix' => 'articles'], function () {
	Route::post('/{type}', 'ArticleController@index');
	Route::delete('{article}', 'ArticleController@delete');
	Route::put('/{article}', 'ArticleController@changeStatus');
});

Route::group(['prefix' => 'sliders'], function () {
	Route::post('/', 'SliderController@index');
	Route::delete('{slider}', 'SliderController@delete');
	Route::put('/{slider}', 'SliderController@changeStatus');
});