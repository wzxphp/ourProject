@extends('admin.layout')
@section('title','会员修改')
@section('content')
    <!-- 右侧主体开始 -->
    <div class="page-content">
        <div class="content">

            <!-- 右侧内容框架，更改从这里开始 -->
            <blockquote class="layui-elem-quote">
                <a href="">后台首页</a>/
                <a href="">会员管理</a>/
                <a href="">会员修改</a>
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
                        <form class="layui-form" action="{{url('admin/user/'.$user->user_id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('PUT')}}

                            <div class="layui-form-item">
                                <label for="L_email" class="layui-form-label">
                                    用户名
                                </label>
                                <div class="layui-input-inline">
                                    <input type="text" id="L_name" name="name" required lay-verify=""
                                           autocomplete="off" value="{{$user->name}}" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label for="L_email" class="layui-form-label">
                                    姓名
                                </label>
                                <div class="layui-input-inline">
                                    <input type="text" id="L_truename" name="true_name" required lay-verify=""
                                           autocomplete="off" value="{{$user->true_name}}" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label for="L_email" class="layui-form-label">
                                    性别
                                </label>
                                <div class="layui-input-block">
                                    <input type="radio" name="sex" value="1" title="男" @if($user->sex =='1') checked="true" @endif>
                                    <input type="radio" name="sex" value="2" title="女" @if($user->sex =='2') checked="true" @endif>
                                    <input type="radio" name="sex" value="0" title="保密" @if($user->sex =='0') checked="true" @endif>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label for="L_email" class="layui-form-label">
                                    生日
                                </label>
                                <div class="layui-input-inline">
                                    <input type="text" id="L_birthday" name="birthday" required lay-verify=""
                                           autocomplete="off" value="{{$user->birthday}}" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label for="L_email" class="layui-form-label">
                                    手机号
                                </label>
                                <div class="layui-input-inline">
                                    <input type="text" id="L_tel" name="tel" required lay-verify="phone"
                                           autocomplete="off" value="{{$user->tel}}" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label for="L_username" class="layui-form-label">
                                    邮箱
                                </label>
                                <div class="layui-input-inline">
                                    <input type="email" id="L_email" name="email"  lay-verify="email"
                                           autocomplete="off" value="{{$user->email}}" class="layui-input">
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