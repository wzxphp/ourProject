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
//分类模块
Route::get('admin/cate/create','Admin\CateController@create');
Route::post('admin/cate/store','Admin\CateController@store');
Route::get('admin/cate/index','Admin\CateController@index');
Route::post('admin/cate/changeorder','Admin\CateController@changeOrder');
Route::get('admin/cate/{id}/edit','Admin\CateController@edit');
Route::post('admin/cate/update','Admin\CateController@update');
Route::get('admin/cate/{id}','Admin\CateController@del');
//订单管理
Route::get('admin/order/index','Admin\OrderController@index');

