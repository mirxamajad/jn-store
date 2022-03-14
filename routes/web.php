<?php

use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\ProductController;
use Illuminate\Routing\RouteGroup;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/' , 'IndexController@index');
Route::get('application' , 'IndexController@application')->name('index.app');
Route::post('getproduct' , 'IndexController@getProduct')->name('index.getproduct');
Route::get('singnleproduct/{id}/{name}' , 'IndexController@singnleproduct')->name('index.singnleproduct');
Route::get('category/{id}/{slug}' , 'IndexController@allproduct')->name('index.allproduct');
Route::get('category/{cat}/{id}/{slug}' , 'IndexController@allsubproduct')->name('index.allsubproduct');
Route::get('category/{subcate}/{id}/{slug}' , 'IndexController@allchildproduct')->name('index.allchildproduct');
Route::get('cart', 'IndexController@cart')->name('cart');
Route::get('add-to-cart/{id}', 'CartController@addToCart')->name('add.to.cart');
Route::patch('update-cart', 'CartController@update')->name('update.cart');
Route::delete('remove-from-cart', 'CartController@remove')->name('remove.from.cart');
Route::post('checkoutStore', 'CheckOutController@store')->name('checkout.stores');
Route::resource('checkout', 'CheckOutController');
Route::get('getShippingCharges/{id}', 'CheckOutController@getCharges')->name('checkout.getShipping');
Route::post('stripe-payment','StripeController@handlePost')->name('stripe.payment');
Route::get('stripe-checkout/{amount}','StripeController@checkout')->name('stripe.checkout');
Route::post('checkout','StripeController@afterpayment')->name('checkout.credit-card');
Auth::routes();

    Route::resource('catgeory', 'CategoryController');
    Route::resource('subcatgeory', 'SubCategoryController');
    Route::post('subcatgeory/getsubcat', 'SubCategoryController@getSubCat')->name('subcategory.getsubcat');
    Route::resource('childcatgeory', 'ChildCategoryController');
    Route::post('childcatgeory/getchildcat', 'ChildCategoryController@getChildCat')->name('childcategory.getchildcat');
    Route::resource('products', 'ProductController');
    Route::resource('productvariant', 'ProductVariantController');
    Route::resource('shipping', 'ShippingChargesController');
    Route::get('order', 'CheckOutController@getall')->name('order');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/home', 'HomeController@handleAdmin')->name('admin.route')->middleware('admin');
