<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'IndexController@index');

// Route::group()
// 显示分类
Route::get('/type/{typeid}/show', ['as' => 'website.type.show', 'uses' => 'TypeController@show']);

Route::get('/app/{appid}/show', ['as' => 'website.app.show', 'uses' => 'AppController@show']);

Route::group([
    // 'prefix' => 'admin'
    // , 'middleware' =>  'auth'
    ], function(){

    Route::get('/app',  ['as'   =>  'website.app.index', 'uses' => 'AppController@index']);
    Route::get('/app/create', ['as'   =>  'website.app.create', 'uses' =>  'AppController@create']);
    Route::get('app/{id}/edit', ['as' => 'website.app.edit', 'uses' => 'AppController@edit']);
    Route::get('app/{id}/update', ['as' => 'website.app.update', 'uses' => 'AppController@update']);
    Route::post('/app/store', ['as'  =>  'website.app.store', 'uses' =>  'AppController@store']);
    // 上传文件
    Route::any('/app/uploader', ['as' => 'website.app.uploader', 'uses' => 'AppController@uploader']);
    // 上传图片
    Route::any('/app/uploadImage', ['as' => 'website.app.uploadImage', 'uses' => 'AppController@uploadImage']);

});

Auth::routes();

Route::get('/home', 'HomeController@index');
