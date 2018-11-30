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
    return redirect()->route('home');
});


Auth::routes();


Route::resource('completion', 'CompletionsController');
Route::resource('newsletter', 'NewsletterSubsController');
Route::resource('order', 'OrdersController');
Route::resource('transaction', 'TransactionsController');
Route::resource('role', 'RolesController');
Route::resource('user', 'UsersController');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('make', ['as' => 'make', 'uses' => 'MakesController@index']);
Route::get('shop', ['as' => 'shop', 'uses' => 'ProductsController@index']);
Route::get('search', ['as' => 'search', 'uses' => 'ProductsController@search']);
Route::post('add_to_cart', ['as' => 'add_to_cart', 'uses' => 'CartsController@store']);
Route::get('view_cart',  ['as' => 'view_cart', 'uses' => 'CartsController@index']);
Route::post('update_cart',  ['as' => 'update_cart', 'uses' => 'CartsController@update']);
Route::post('clear', ['as' => 'clear', 'uses' => 'CartsController@destroy']);
Route::post('remove', ['as' => 'remove', 'uses' => 'CartsController@destroy']);
Route::get('checkouts', ['as' => 'checkouts', 'uses' => 'CheckoutsController@index']);
Route::post('got_promo_code', ['as' => 'got_promo_code', 'uses' => 'CheckoutsController@promo']);

Route::get('oAuth2/{method}', ['as' => 'checkouts', 'uses' => 'CheckoutsController@oAuth2']);





