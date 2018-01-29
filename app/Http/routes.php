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

/**
 * 后台路由组
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
    Route::resource('category','CategoryController');                   //文章分类
    Route::resource('gcate','GcateController');                         //商品分类

    Route::resource('article','ArticleController');                     //文章

    Route::resource('goods','GoodsController');                         //商品
    Route::any('goods/sku/{g_id}','GoodsController@sku');
    Route::post('goods/skuadd','GoodsController@skuadd');               //提交sku
    Route::any('goods/skudel/{sku_id}','GoodsController@skudel');      //删除sku


    Route::get('upload/create/{g_id}','UploadController@add');          //上传 图片主图
    Route::any('upload/index','UploadController@index');
    Route::any('upload/store','UploadController@store');
    Route::any('upload/del/{g_id}','UploadController@del');

    Route::any('file/index','FileController@index');                          //上传文档 .pdf
    Route::any('file/add','FileController@add');
    Route::any('file/addshow/{g_id}','FileController@addshow');
    Route::any('file/del/{file_id}','FileController@del');

    Route::any('company/index','CompanyController@index');                  //公司介绍
    Route::any('company/add','CompanyController@add');
    Route::any('company/store','CompanyController@store');
    Route::any('company/del/{company_id}','CompanyController@del');

    Route::any('recruit/index','RecruitController@index');                  //招聘
    Route::any('recruit/add','RecruitController@add');
    Route::any('recruit/store','RecruitController@store');
    Route::any('recruit/del/{recruit_id}','RecruitController@del');

    //Route::any('upload', 'CommonCotroller@upload');
});


/**
 * 前台api路由组
 */
Route::group(['prefix'=>'api','namespace'=>'Home'],function(){
    Route::get('/',function (){
        return 'api version 1.0';
    });

    //新闻列表 cate_id
    Route::get('newsList/{cate_id}/{page_id?}','NewsController@newsList');

    //新闻详情 news_id
    Route::get('newsInfo/{news_id}','NewsController@newsInfo');

    //最新资讯 单条查询
    Route::get('newsNew','NewsController@newsNew');

    //首页产品介绍
    Route::get('goodsShow','GoodsController@goodsIntroduction');

    //产品中心页 产品列表
    Route::get('goodsList','GoodsController@goodsList');

    //产品中心页 产品详情
    Route::get('goodsInfo/{g_id}','GoodsController@goodsInfo');

});


