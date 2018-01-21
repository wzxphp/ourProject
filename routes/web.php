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
    return view('welcome');
});

//前台============================================================
// 商城首页路由
Route::get('/home/index','Home\IndexController@index');
Route::get('/home/list','Home\ListController@list');
// 登录注册
Route::get('/home/login/index','Home\LoginController@index');
// 登录
Route::post('/home/login/dologin','Home\LoginController@dologin');
// 注册邮件发送
Route::post('/home/register/send','Home\LoginController@send');

// 忘记密码，修改
Route::get('/home/forgot/forpass','Home\LoginController@forpass');
// 发送邮件验证
Route::post('/home/forgot/dopass','Home\LoginController@dopass');
// 准备密码修改页面
Route::get('/home/forgot/updatepass','Home\LoginController@updatepass');
// 修改密码
Route::post('/home/forgot/update','Home\LoginController@update');




//后台=============================================================
//后台登录路由
Route::get('admin/login','Admin\LoginController@login');
//登录页面的验证码
Route::get('admin/code','Admin\LoginController@code');
//登录页面的逻辑验证
Route::post('admin/dologin','Admin\LoginController@dologin');
//后台首页
Route::get('admin/index','Admin\LoginController@index');
//后台管理员用户管理
Route::resource('admin/admin_user','Admin\Admin_userController');

//商品管理页面
Route::get('admin/goods/index','Admin\GoodsController@index');
// 商品添加页面
Route::get('admin/goods/create','Admin\GoodsController@create');
//商品数据接收
Route::post('admin/goods/upload','Admin\GoodsController@upload');
//商品修改页面
Route::get('admin/goods/{id}/edit','Admin\GoodsController@edit');
Route::post('admin/goods/{id}/xxoo','Admin\GoodsController@xxoo');
//删除
Route::get('admin/goods/{id}','Admin\GoodsController@del');