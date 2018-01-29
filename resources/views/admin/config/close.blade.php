@extends('admin.layout')
@section('title','关闭网站')
@section('content')
    <!-- 右侧主体开始 -->
    <div class="page-content">
        <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->

            <blockquote class="layui-elem-quote">
                <a href="{{url('admin/index')}}">后台首页</a>/
                <a href="">网站配置</a>/
                <a href="">关闭网站</a>
            </blockquote>
            <!-- 中部开始 -->
            <div class="wrapper">
                <!-- 右侧主体开始 -->
                <div class="page-content">
                    <div class="layui-tab-item layui-show">
                        <form class="layui-form">
                            <div class="layui-form-item">
                                <label for="AppId" class="layui-form-label">
                                    <span class="x-red">*</span>是否开启
                                </label>
                                <div class="layui-input-block">
                                    <input type="checkbox" checked="" name="open" lay-skin="switch" lay-filter="switchTest" title="开关"><div class="layui-unselect layui-form-switch layui-form-onswitch"><i></i></div>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label for="L_repass" class="layui-form-label">
                                </label>
                                <button class="layui-btn" lay-filter="*" lay-submit="">
                                    保存
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- 右侧主体结束 -->
            </div>
            <!-- 中部结束 -->
        </div>
    </div>
    <!-- 右侧主体结束 -->
    <script>

        layui.use(['element','layer','form'], function(){
            form = layui.form()

            //监听提交
            form.on('submit(*)', function(data){
                console.log(data);
                //发异步，把数据提交给php
                layer.alert("保存成功", {icon: 6});
                return false;
            });

        })
    </script>
@endsection