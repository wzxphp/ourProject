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
// 关键字所搜
Route::post('/home/search','Home\SearchController@search');
// 美妆列表
Route::get('/home/list','Home\ListController@list');
// 休闲列表
Route::get('/home/casual','Home\ListController@casual');
// 数码列表
Route::get('/home/digital','Home\ListController@digital');
// 户外列表
Route::get('/home/outdoor','Home\ListController@outdoor');
// 全部分类列表
Route::get('/home/cate','Home\CateController@cate');
// 详情表
Route::get('/home/details/{id}','Home\ListController@details');
// 推荐位促销
Route::get('/home/recom/{id}','Home\IndexController@recom');
// 购物车
Route::get('/home/cart','Home\CartController@index');
	// 添加购物车
Route::post('/home/cart/{id}','Home\CartController@cart');
	// 删除购物车中的商品
Route::get('/home/cart/del/{id}','Home\CartController@del');
// 收藏
	// 添加收藏
Route::get('/home/coll/{id}','Home\CollController@coll');
	// 添加收藏
Route::get('/home/coll','Home\CollController@index');
	// 取消收藏
Route::get('/home/coll/del/{id}','Home\CollController@del');
// 订单
	// 确认订单
Route::post('/home/reorder','Home\OrderController@reorder');
	// 提交订单
Route::post('/home/order','Home\OrderController@index');
	// 浏览订单
Route::get('/home/center/order','Home\OrderController@show');
	// 订单详情
Route::get('home/center/orderinfo/{id}','Home\OrderController@orderinfo');
	// 删除订单
Route::get('/home/order/del/{id}','Home\OrderController@del');
	// 取消订单
Route::get('/home/order/remove/{id}','Home\OrderController@remove');
// 订单管理
	// 提醒发货
Route::get('/home/order/remind/{id}','Home\OrderController@remind');
	// 确认收货
Route::get('/home/order/confirm/{id}','Home\OrderController@confirm');
// 评论
Route::resource('/home/reviews','Home\ReviewController');


// 用户============================================================
// 用户中心页面
Route::get('/home/center','Home\UserController@center')->middleware('islogin');
// 用户信息页面
Route::get('/home/center/userinfo','Home\UserController@userinfo');
// 完善用户信息
Route::post('/home/center/userinfo_create','Home\UserController@userinfo_create');
// 上传头像
Route::post('/home/center/upload','Home\UserController@upload');
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
Route::get('/home/center/edit/{id}','Home\UserController@edit');
Route::post('/home/center/update','Home\UserController@update');
// 用户删除地址
Route::get('/home/center/del/{id}','Home\UserController@del');


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

//分类管理模块====================================================qin
    Route::get('cate/create','CateController@create');
    Route::post('cate/store','CateController@store');
    Route::get('cate/index','CateController@index');
    Route::post('cate/changeorder','CateController@changeOrder');
    Route::get('cate/{id}/edit','CateController@edit');
    Route::post('cate/update','CateController@update');
    Route::get('cate/{id}','CateController@del');
//订单管理模块=====================================================qin
    Route::get('order/index','OrderController@index');
    Route::get('order/{id}/edit','OrderController@edit');
    Route::post('order/update','OrderController@update');
//订单状态修改
    Route::get('order/up/{id}','OrderController@up');   //发货
    Route::get('order/down/{id}','OrderController@down'); //未发货
    Route::get('order/yes/{id}','OrderController@yes'); //已收货
    Route::get('order/dis/{id}','OrderController@dis'); //取消订单

//商品管理模块====================================================zhang
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
//商品上下价
Route::get('admin/goods/goods_sta','Admin\GoodsController@goods_sta');


//==============================================================================推荐位
//推荐位新出
// 首页
Route::get('admin/xiugai/brow','Admin\XuigaiController@create');
// 添加
Route::get('admin/xiugai/{id}/index','Admin\XuigaiController@index');
// 删除
Route::get('admin/xiugai/{id}','Admin\XuigaiController@del');



//轮播图======================================================================qin
Route::get('admin/show/index','Admin\ShowController@index'); //页面
Route::post('admin/show/insert','Admin\ShowController@insert');  //添加提交
Route::post('admin/show/changeorder','Admin\ShowController@changeorder'); //排序
Route::get('admin/show/delete/{id}','Admin\ShowController@delete');  //删除轮播图
Route::get('admin/show/edit/{id}','Admin\ShowController@edit');  //轮播图页面
Route::post('admin/show/update','Admin\ShowController@update'); //修改轮播图
//广告位======================================================================qin
Route::get('admin/guang/index','Admin\GuangController@index'); //页面
Route::get('admin/guang/add','Admin\GuangController@add'); //添加页面
Route::post('admin/guang/insert','Admin\GuangController@insert'); //添加
Route::post('admin/guang/delete/{id}','Admin\GuangController@delete');//删除
Route::get('admin/guang/edit/{id}','Admin\GuangController@edit');  //修改页面
Route::post('admin/guang/update','Admin\GuangController@update'); //修改
Route::post('admin/guang/changeorder','Admin\GuangController@changeorder'); //排序
Route::post('admin/guang/update','Admin\GuangController@update'); //修改广告位
Route::get('admin/guang/up/{id}','Admin\GuangController@up');   //上架
Route::get('admin/guang/down/{id}','Admin\GuangController@down'); //下架
//图片上传公用方法
Route::post('admin/file/upload','Admin\FileController@upload');




