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
                                    {{--<input type="checkbox" onchange="change(this,'12')" name="open" lay-skin="switch" lay-filter="switchTest" title="开关">--}}
                                    <input type="checkbox" onchange="change(this,'12')" name="open" title="开关">
                                    {{--<div class="layui-unselect layui-form-switch layui-form-onswitch"><i></i></div>--}}
                                </div>
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
            function change(obj,id) {

                $st = $(obj).attr('checked');
                console.log($st);
                //发异步把用户状态进行更改
                $.post('{{ url('admin/config/change') }}',{'_token':"{{csrf_token()}}",'id':id,'st':$st},function (data) {
                    if(data.status == 0) {
                        layer.msg('已关闭', {icon: 5, time: 1000});
                        setTimeout(function(s){location.reload()},900);
                    }else{
                        layer.msg(data.message, {icon: 1, time: 1000});}
                });
            }
    </script>
@endsection