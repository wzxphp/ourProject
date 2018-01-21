@extends('admin.layout')
@section('title','管理员修改')
@section('content')
    <!-- 右侧主体开始 -->
    <div class="page-content">
        <div class="content">

            <!-- 右侧内容框架，更改从这里开始 -->
            <blockquote class="layui-elem-quote">
                <a href="">后台首页</a>/
                <a href="">后台管理员</a>/
                <a href="">管理员修改</a>
            </blockquote>
            <div>
                @if(session('msg'))
                    <h3>{{session('msg')}}</h3>
                @endif
            </div>
            <!-- 中部开始 -->
            <div class="wrapper">
                <!-- 右侧主体开始 -->
                <div class="page-content">
                    <div class="content">
                        <!-- 右侧内容框架，更改从这里开始 -->
                        <form class="layui-form" action="{{url('admin/admin_user/'.$user->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="layui-form-item">
                                <label for="L_email" class="layui-form-label">
                                    账号
                                </label>
                                <div class="layui-input-inline">
                                    <input type="text" id="L_email" name="username" required lay-verify=""
                                           autocomplete="off" value="{{$user->name}}" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label for="L_email" class="layui-form-label">
                                    手机号
                                </label>
                                <div class="layui-input-inline">
                                    <input type="text" id="L_tel" name="tel" required lay-verify=""
                                           autocomplete="off" value="{{$user->tel}}" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label for="L_username" class="layui-form-label">
                                    旧密码
                                </label>
                                <div class="layui-input-inline">
                                    <input type="password" id="L_pass" name="pass"  lay-verify=""
                                           autocomplete="off" value="" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label for="L_username" class="layui-form-label">
                                    新密码
                                </label>
                                <div class="layui-input-inline">
                                    <input type="password" id="L_newpass" name="newpass"  lay-verify=""
                                           autocomplete="off" value="" class="layui-input">
                                </div>
                            </div>


                            <div class="layui-form-item">
                                <label for="L_sign" class="layui-form-label">
                                </label>
                                <button class="layui-btn" key="set-mine" lay-filter="save" lay-submit>
                                    保存
                                </button>
                            </div>
                        </form>
                        <!-- 右侧内容框架，更改从这里结束 -->
                    </div>
                </div>
                <!-- 右侧主体结束 -->
            </div>
            <!-- 中部结束 -->
            </div>
        </div>
    </div>
@endsection