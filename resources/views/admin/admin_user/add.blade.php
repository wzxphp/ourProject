@extends('admin.layout')
@section('title','管理员添加')
@section('content')
    <!-- 右侧主体开始 -->
    <div class="page-content">
        <div class="content">

            <!-- 右侧内容框架，更改从这里开始 -->
            <blockquote class="layui-elem-quote">
                <a href="">后台首页</a>/
                <a href="">后台管理员</a>/
                <a href="">管理员添加</a>
            </blockquote>
            <!-- 中部开始 -->
            <div class="wrapper">

                <!-- 右侧主体开始 -->
                <div class="page-content">
                    <div class="content">
                        <!-- 右侧内容框架，更改从这里开始 -->
                        <form class="layui-form" action="{{url('admin/admin_user')}}" method="post">
                            {{csrf_field()}}
                            <div class="layui-form-item">
                                <label for="L_username" class="layui-form-label">
                                    <span class="x-red"></span>账号
                                </label>
                                <div class="layui-input-inline">
                                    <input type="text" id="L_username" name="username" required="" lay-verify="username"
                                           autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label for="L_username" class="layui-form-label">
                                    <span class="x-red"></span>手机号
                                </label>
                                <div class="layui-input-inline">
                                    <input type="text" id="L_tel" name="tel" required="" lay-verify="phone"
                                           autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label for="L_email" class="layui-form-label">
                                    <span class="x-red"></span>邮箱
                                </label>
                                <div class="layui-input-inline">
                                    <input type="email" id="L_email" name="email" required="" lay-verify="email"
                                           autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label for="L_pass" class="layui-form-label">
                                    <span class="x-red"></span>密码
                                </label>
                                <div class="layui-input-inline">
                                    <input type="password" id="L_pass" name="pass" required="" lay-verify="pass"
                                           autocomplete="off" class="layui-input">
                                </div>
                                <div class="layui-form-mid layui-word-aux">
                                    6到16个字符
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label for="L_repass" class="layui-form-label">
                                    <span class="x-red"></span>确认密码
                                </label>
                                <div class="layui-input-inline">
                                    <input type="password" id="L_repass" name="repass" required="" lay-verify="repass"
                                           autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label for="L_repass" class="layui-form-label">
                                </label>
                                <button  class="layui-btn" lay-filter="add" lay-submit="">
                                    增加
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
    <!-- 右侧主体结束 -->
    <script>



        layui.use('form', function() {
            var form = layui.form();
            form.verify({
                username : function(value) {
                    if (value.length < 2) {
                        return '至少输入2个字符啊';
                    }
                },
                pass : function(value) {
                    if (value.length < 6 || value.length > 18) {
                        return '6-18位';
                    }
                },
                repass : function(value) {
                    if (!new RegExp($("#L_pass").val()).test(value)) {
                        return '二次密码输入不一致';
                    }
                }
            });
        });
    </script>
@endsection