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

Route::get('', 'ItemController@index')->name('Home');

Route::get('items/view/{id}', 'ItemController@view');


Route::get('hogehoge', 'ItemController@hogehoge')->name('hogehoge');


Route::get('sitemap', 'SitemapController@index')->name('Sitemap');


//sp版
Route::group(['prefix' => 'sp', 'as' => 'Sp/'], function () {

});
