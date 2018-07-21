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

//CRUDテスト用の画面
Route::group(['prefix' => 'member'], function () {
    Route::get('index', 'MemberController@index')->name('member@index');
    Route::match(['get','post'], 'create', 'MemberController@create')->name('member@create');
    Route::match(['get','post'], 'edit/{mem_id}', 'MemberController@edit')->name('member@edit');
});

Route::get('address', 'AddressController@getPref')->name('Address@getPref');

//Route::get('address/pref', 'AddressController@pref')->name('Address@pref');

Route::post('regist_favorite', 'ItemController@regist_favorite');

Route::post('delete_favorite', 'ItemController@delete_favorite');

Route::get('sitemap', 'SitemapController@index')->name('Sitemap');

//Queのトリガー
Route::get('/queue', function () {
    Queue::push(new \App\Jobs\SampleJob());
    return 'At ' . date('Y-m-d H:i:s') . ' - queue pushed.';
});

//管理画面
Route::group(['prefix' => 'auth','middleware' => 'auth'], function () {
    Route::get('home', 'Auth\LoginController@index')->name('AdminHome');
    Route::match(['get','post'], 'items/create', 'Auth\itemController@create')->name('item@create');
    Route::match(['get','post'], 'items/regist/{id}', 'Auth\itemController@regist')->name('itemRegist');
});

Route::group(['prefix' => 'auth'], function () {
    Route::match(['get','post'], 'login', 'Auth\LoginController@login')->name('login');
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');
});

//sp版
Route::group(['prefix' => 'sp', 'as' => 'Sp/'], function () {
});
