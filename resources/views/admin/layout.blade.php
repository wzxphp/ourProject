<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="{{asset('/admin/css/font.css')}}">
    <link rel="stylesheet" href="{{asset('/admin/css/xadmin.css')}}">
    <link rel="stylesheet" href="https://cdn.bootcss.com/Swiper/3.4.2/css/swiper.min.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.bootcss.com/Swiper/3.4.2/js/swiper.jquery.min.js"></script>
    <script src="{{asset('/admin/lib/layui/layui.js')}}" charset="utf-8"></script>
    <script type="text/javascript" src="{{asset('/admin/js/xadmin.js')}}"></script>

</head>
<body>
<!-- 顶部开始 -->
<div class="container">
    <div class="logo"><a href="{{url('admin/index')}}">后台管理首页</a></div>
    <div class="open-nav"><i class="iconfont">&#xe699;</i></div>
    <ul class="layui-nav right" lay-filter="">
        <li class="layui-nav-item">
            <a href="javascript:;">管理员：{{session('adminuser')->name}}</a>
            <dl class="layui-nav-child"> <!-- 二级菜单 -->
                <dd><a href="{{url('admin/login')}}">切换帐号</a></dd>
                <dd><a href="{{url('admin/logout')}}">退出</a></dd>
            </dl>
        </li>
        <li class="layui-nav-item"><a href="{{url('/home/index')}}">前台首页</a></li>
    </ul>
</div>
<!-- 顶部结束 -->
<!-- 中部开始 -->
<div class="wrapper">
    <!-- 左侧菜单开始 -->
    <div class="left-nav">
        <div id="side-nav">
            <ul id="nav">
                <li class="list" current>
                    <a href="{{url('admin/index')}}">
                        <i class="iconfont">&#xe761;</i>
                        欢迎页面
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                </li>
                <li class="list">
                    <a href="javascript:;">
                        <i class="iconfont">&#xe705;</i>
                        后台管理员
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{ url('admin/admin_user') }}">
                                <i class="iconfont">&#xe6a7;</i>
                                管理员列表
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/admin_user/create') }}">
                                <i class="iconfont">&#xe6a7;</i>
                                管理员添加
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="list" >
                    <a href="javascript:;">
                        <i class="iconfont">&#xe6a3;</i>
                        角色管理
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{ url('admin/role') }}">
                                <i class="iconfont">&#xe6a7;</i>
                                角色列表
                            </a>
                        <li>
                            <a href="{{ url('admin/role/create') }}">
                                <i class="iconfont">&#xe6a7;</i>
                                角色添加
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="list" >
                    <a href="javascript:;">
                        <i class="iconfont">&#xe6a3;</i>
                        权限管理
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{ url('admin/permission') }}">
                                <i class="iconfont">&#xe6a7;</i>
                                权限列表
                            </a>

                        </li>
                        <li>
                            <a href="{{ url('admin/permission/create') }}">
                                <i class="iconfont">&#xe6a7;</i>
                                权限添加
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="list">
                    <a href="javascript:;">
                        <i class="iconfont">&#xe70b;</i>
                        会员管理
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{ url('admin/user') }}">
                                <i class="iconfont">&#xe6a7;</i>
                                会员列表
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/user/deleted') }}">
                                <i class="iconfont">&#xe6a7;</i>
                                会员删除
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="list">
                    <a href="javascript:;">
                        <i class="iconfont">&#xe70b;</i>
                        分类管理
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{ url('admin/cate/create') }}">
                                <i class="iconfont">&#xe6a7;</i>
                                添加分类
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/cate/index') }}">
                                <i class="iconfont">&#xe6a7;</i>
                                分类列表
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="list" >
                    <a href="javascript:;">
                        <i class="iconfont">&#xe6a3;</i>
                        订单管理
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu" style="display:none">
                        <li>
                            <a href="{{ url('admin/order/index') }}">
                                <i class="iconfont">&#xe6a7;</i>
                                订单列表
                            </a>
                        </li>
                    </ul>
                </li>
                <!--商品列表-->
                <li class="list">
                    <a href="javascript:;">
                        <i class="iconfont">&#xe6a3;</i>
                        商品管理
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{ url('admin/goods/index') }}">
                                <i class="iconfont">&#xe6a7;</i>
                                商品管理
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/goods/create') }}">
                                <i class="iconfont">&#xe6a7;</i>
                                添加商品
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="list" >
                    <a href="javascript:;">
                        <i class="iconfont">&#xe6a3;</i>
                        轮播图
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu" style="display:none">
                        <li>
                            <a href="{{ url('admin/show/index') }}">
                                <i class="iconfont">&#xe6a7;</i>
                                轮播图管理
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="list" >
                    <a href="javascript:;">
                        <i class="iconfont">&#xe6a3;</i>
                        广告位
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu" style="display:none">
                        <li>
                            <a href="{{ url('admin/guang/index') }}">
                                <i class="iconfont">&#xe6a7;</i>
                                广告位管理
                            </a>
                        </li>
                    </ul>
                </li>
                <!--商品结束-->
            </ul>
        </div>
    </div>
    <!-- 左侧菜单结束 -->
@section('content')
    @show
</div>
<!-- 中部结束 -->
<!-- 底部开始 -->
<div class="footer">
    <div class="copyright">Copyright ©2017 x-admin v2.3 All Rights Reserved. </div>
</div>
<!-- 底部结束 -->
<div class="bg-changer">
    <div class="swiper-container changer-list">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img class="item" src="{{asset('/admin/images/a.jpg')}}" alt=""></div>
            <div class="swiper-slide"><img class="item" src="{{asset('/admin/images/b.jpg')}}" alt=""></div>
            <div class="swiper-slide"><img class="item" src="{{asset('/admin/images/c.jpg')}}" alt=""></div>
            <div class="swiper-slide"><img class="item" src="{{asset('/admin/images/d.jpg')}}" alt=""></div>
            <div class="swiper-slide"><img class="item" src="{{asset('/admin/images/e.jpg')}}" alt=""></div>
            <div class="swiper-slide"><img class="item" src="{{asset('/admin/images/f.jpg')}}" alt=""></div>
            <div class="swiper-slide"><img class="item" src="{{asset('/admin/images/g.jpg')}}" alt=""></div>
            <div class="swiper-slide"><img class="item" src="{{asset('/admin/images/h.jpg')}}" alt=""></div>
            <div class="swiper-slide"><img class="item" src="{{asset('/admin/images/i.jpg')}}" alt=""></div>
            <div class="swiper-slide"><img class="item" src="{{asset('/admin/images/j.jpg')}}" alt=""></div>
            <div class="swiper-slide"><img class="item" src="{{asset('/admin/images/k.jpg')}}" alt=""></div>
            <div class="swiper-slide"><span class="reset">初始化</span></div>
        </div>
    </div>
    <div class="bg-out"></div>
    <div id="changer-set"><i class="iconfont">&#xe696;</i></div>
</div>
</body>
</html>