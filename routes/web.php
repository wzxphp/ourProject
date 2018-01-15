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
