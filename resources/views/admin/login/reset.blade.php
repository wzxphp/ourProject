<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台登录页面</title>
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
    <div class="login-logo"><h1>忘记密码</h1></div>
    <div class="login-box">

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @if(is_object($errors))
                        @foreach ($errors->all() as $error)
                            <li style="color:white">{{ $error }}</li>
                        @endforeach
                    @else
                        <li style="color:white">{{ $errors }}</li>
                    @endif
                </ul>
            </div>
        @endif

        <form id="fid" class="layui-form layui-form-pane" action="{{ url('admin/doreset') }}" method="post">
            {{csrf_field()}}
            <h3>重置密码</h3>
            <label class="login-title" for="username">帐号</label>
            <div class="layui-form-item">
                <label class="layui-form-label login-form"><i class="iconfont">&#xe6b8;</i></label>
                <div class="layui-input-inline login-inline">
                    <input type="text" name="name" value="{{$user->name}}" lay-verify="required" placeholder="请输入你的帐号" autocomplete="off" class="layui-input">
                </div>
            </div>

            <label class="login-title" for="password">新密码</label>
            <div class="layui-form-item">
                <label class="layui-form-label login-form"><i class="iconfont">&#xe82b;</i></label>
                <div class="layui-input-inline login-inline">
                    <input type="password" name="newpass" lay-verify="required" placeholder="请输入你的密码" autocomplete="off" class="layui-input">
                </div>
            </div>


            <div style="height: 30px;"></div>
            <div style="text-align:center;">
                <button class="btn btn-warning pull-right" lay-submit lay-filter="login"  type="submit">提交</button>
            </div>
        </form>
    </div>
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
