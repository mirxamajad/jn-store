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
Route::apiResource('category','Api\CategoryApiController');
Route::apiResource('subcategory','Api\SubCategoryApiController');
Route::apiResource('childcategory','Api\ChildCategoryApiController');
Route::apiResource('product','Api\ProductApiController');
Route::apiResource('checkout','Api\CheckOutApiController');
Route::post('login','Api\UserApiController@login');
Route::post('register','Api\UserApiController@register');
