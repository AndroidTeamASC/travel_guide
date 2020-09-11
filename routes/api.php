<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::Apiresource('/category','Api\CategoryController');

Route::Apiresource('/city','Api\CityController');

Route::Apiresource('/state','Api\StateController');

Route::resource('info','Api\InfoController');

Route::resource('emergency','Api\EmergencyController');

Route::post('/searcheByName','Api\InfoController@searcheByName');


Route::get('/getList','Api\InfoController@getList');

Route::post('/getComment','Api\InfoController@getComment')->name('getComment');

Route::post('searchbycity','Api\InfoController@searchbycity');

Route::get('/filterybyCategoryId','Api\InfoController@filterybyCategoryId');

