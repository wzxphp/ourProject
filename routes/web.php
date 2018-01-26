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
Route::get('/home/center','Home\UserController@center')->middleware('islogin');
// 用户信息页面
Route::get('/home/center/userinfo','Home\UserController@userinfo');
// 完善用户信息
Route::post('/home/center/userinfo_create','Home\UserController@userinfo_create');
// 用户安全设置页面
Route::get('/home/center/safe','Home\UserController@safe');
// 用户自主修改密码页面
Route::get('/home/center/password/{email}','Home\UserController@password');
// 用户自主修改密码
Route::post('/home/center/dopass','Home\UserController@dopass');
// 用户地址管理页面
Route::get('/home/center/address','Home\UserController@address');
// 城市省市区三级联动
Route::post('/home/center/ajax','Home\UserController@ajax');
// 用户添加地址
Route::post('/home/center/doadd','Home\UserController@doadd');

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
//未授权页面
Route::get('auth','Admin\LoginController@auth');
//后台登录路由
Route::get('admin/login','Admin\LoginController@login');
//登录页面的逻辑验证
Route::post('admin/dologin','Admin\LoginController@dologin');
//忘记密码
Route::get('admin/forget','Admin\LoginController@forget');
//忘记密码处理
Route::post('admin/doforget','Admin\LoginController@doforget');
//重置密码
Route::get('admin/reset','Admin\LoginController@reset');
//重置密码处理
Route::post('admin/doreset','Admin\LoginController@doreset');
//退出登录
Route::get('admin/logout','Admin\LoginController@logout');
//登录页面的验证码
Route::get('admin/code','Admin\LoginController@code');

//路由组
//Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['admin_islogin','hasRole']],function(){
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['admin_islogin']],function(){
//后台首页
    Route::get('index','LoginController@index');
//管理员模块
    Route::post('admin_user_del','Admin_userController@delAll');  //删除多行
    Route::post('admin_user_statu','Admin_userController@statu');  //修改管理员状态
    Route::get('admin_user/auth/{id}','Admin_userController@auth');  //管理员授权
    Route::post('admin_user/doauth','Admin_userController@doAuth'); //添加用户授权逻辑
    Route::resource('admin_user','Admin_userController');
//会员管理模块
    Route::get('user/deleted','UserController@deleted');       //删除会员页面
    Route::get('user/statu/{id}','UserController@statu');       //删除会员状态
    Route::get('user/statu2/{id}','UserController@statu2');       //恢复会员状态
    Route::post('user/showav','UserController@showav');       //查看会员头像
    Route::resource('user','UserController');
//角色管理模块
    Route::get('role/auth/{id}','RoleController@auth');  //角色授权
    Route::post('role/doauth','RoleController@doAuth'); //角色授权执行
    Route::resource('role','RoleController');
//权限管理模块
    Route::resource('permission','PermissionController');
//评论管理模块
    Route::resource('comment','CommentController');
//网站配置模块
    Route::get('config/close','ConfigController@close');  //关闭网站
    Route::post('config/changecontent','ConfigController@changeContent');//批量修改网站配置信息
    Route::resource('config','ConfigController');



//分类管理模块=====================================================
    Route::get('cate/create','CateController@create');
    Route::post('cate/store','CateController@store');
    Route::get('cate/index','CateController@index');
    Route::post('cate/changeorder','CateController@changeOrder');
    Route::get('cate/{id}/edit','CateController@edit');
    Route::post('cate/update','CateController@update');
    Route::get('cate/{id}','CateController@del');
//订单管理
    Route::get('order/index','OrderController@index');

//商品管理模块====================================================
    Route::get('goods/index','GoodsController@index');
// 商品添加页面
    Route::get('goods/create','GoodsController@create');
//商品数据接收
    Route::post('goods/upload','GoodsController@upload');
//商品修改页面
    Route::get('goods/{id}/edit','GoodsController@edit');
    Route::post('goods/{id}/xxoo','GoodsController@xxoo');
//删除
    Route::get('goods/{id}','GoodsController@del');



});



