<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(['middleware' => ['web']],function(){


    Route::get('/', function () {
        return view('welcome');
    });

    Route::any('admin/login','Admin\LoginController@login');
    Route::get('admin/code','Admin\LoginController@code');

});


Route::group(['middleware' => ['web','admin.login'],'prefix' =>'admin','namespace' => 'Admin'],function(){

    Route::get('index','IndexController@index');
    Route::get('welcome','IndexController@welcome');
    Route::get('quit','LoginController@quit');
    Route::any('pass','IndexController@pass');

    Route::post('cate/changeorder','CategoryController@changeOrder');
    Route::resource('category','CategoryController');               //文章分类
    Route::resource('gcate','GcateController');                     //商品分类

    Route::resource('article','ArticleController');                 //文章
    Route::resource('goods','GoodsController');                     //商品

    Route::get('upload/create/{g_id}','UploadController@add');                                             //上传
    Route::any('upload/index','UploadController@index');
    Route::any('upload/store','UploadController@store');
    Route::any('upload/del/{g_id}','UploadController@del');

    Route::any('file','fileController@index');
    Route::any('file/add','fileController@add');
    Route::any('file/addshow/{g_id}','fileController@addshow');
    Route::any('file/del','fileController@del');


    //Route::any('upload', 'CommonCotroller@upload');
});


