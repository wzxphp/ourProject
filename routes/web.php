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
// 美妆列表
Route::get('/home/list','Home\ListController@list');
// 休闲列表
Route::get('/home/casual','Home\ListController@casual');
// 数码列表
Route::get('/home/digital','Home\ListController@digital');
// 户外列表
Route::get('/home/outdoor','Home\ListController@outdoor');
// 全部分类列表
Route::get('/home/cate','Home\ListController@cate');
// 详情表
Route::get('/home/details','Home\ListController@details');
// 购物车
Route::get('/home/cart','Home\Cartcontroller@index');
// 订单
Route::get('/home/order','Home\Cartcontroller@index');

// 用户============================================================
// 用户中心页面
Route::get('/home/center','Home\UserController@center');
// 用户信息页面
Route::get('/home/center/userinfo','Home\UserController@userinfo');
// 完善用户信息
Route::post('/home/center/userinfo_create','Home\UserController@userinfo_create');
// 用户安全设置页面
Route::get('/home/center/safe','Home\UserController@safe');
// 用户自主修改密码页面
Route::get('/home/center/password','Home\UserController@password');
// 用户地址管理页面
Route::get('/home/center/address','Home\UserController@address');

// 登录============================================================
// 登录注册
Route::get('/home/login/index','Home\LoginController@index');
// 登录
Route::post('/home/login/dologin','Home\LoginController@dologin');
// 退出登录
Route::get('/home/loginout','Home\LoginController@loginout');
// 验证码引入
Route::get('/home/code','Home\LoginController@code');
// 注册邮件发送
Route::post('/home/register/send','Home\LoginController@send');

// 忘记密码，修改
Route::get('/home/forgot/forpass','Home\LoginController@forpass');
// 发送邮件验证
Route::post('/home/forgot/dopass','Home\LoginController@dopass');
// 准备密码修改页面
Route::get('/home/forgot/updatepass/{email}','Home\LoginController@updatepass');
// 修改密码
Route::post('/home/forgot/update','Home\LoginController@update');




//后台=============================================================
//后台登录路由
Route::get('admin/login','Admin\LoginController@login');
//登录页面的验证码
Route::get('admin/code','Admin\LoginController@code');
//登录页面的逻辑验证
Route::post('admin/dologin','Admin\LoginController@dologin');
//路由组
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'islogin'],function(){
//后台首页
    Route::get('index','LoginController@index');
//退出登录
    Route::get('logout','LoginController@logout');
//管理员模块
    Route::resource('admin_user','Admin_userController');
    //Route::post('admin_user','Admin_userController@delAll');
//会员管理模块
    Route::resource('user','UserController');
});