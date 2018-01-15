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

// Route::get('/', function () {
//     return view('welcome');
// });

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



