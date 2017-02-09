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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix'=>'admin'],function(){
   Route::group(['prefix'=>'cate'],function(){
       Route::get('',['as'=>'admin.cate.getList','uses'=>'CateController@getList']);
       Route::get('add',['as'=>'admin.cate.getAdd','uses'=>'CateController@getAdd']);
       Route::post('add',['as'=>'admin.cate.postAdd','uses'=>'CateController@postAdd']);

       Route::get('edit/{id}',['as'=>'admin.cate.getEdit','uses'=>'CateController@getEdit']);
       Route::post('edit/{id}',['as'=>'admin.cate.postEdit','uses'=>'CateController@postEdit']);

       Route::get('delete/{id}',['as'=>'admin.cate.getDel','uses'=>'CateController@getDel']);
//       Route::post('delete/{id}',['as'=>'admin.cate.getDel','uses'=>'CateController@getDel']);
   });
});
Auth::routes();

Route::get('/home', 'HomeController@index');
