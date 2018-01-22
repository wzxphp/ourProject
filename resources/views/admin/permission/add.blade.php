@extends('admin.layout')
@section('title','权限添加')
@section('content')
    <!-- 右侧主体开始 -->
    <div class="page-content">
        <div class="content">

            <!-- 右侧内容框架，更改从这里开始 -->
            <blockquote class="layui-elem-quote">
                <a href="{{url('admin/index')}}">后台首页</a>/
                <a href="">权限管理</a>/
                <a href="">权限添加</a>
            </blockquote>
            <!-- 中部开始 -->
            <div class="wrapper">

                <!-- 右侧主体开始 -->
                <div class="page-content">
                    <div class="content">
                        <!-- 右侧内容框架，更改从这里开始 -->
                        <form class="layui-form" action="{{url('admin/permission')}}" method="post">
                            {{csrf_field()}}
                            <div class="layui-form-item">
                                <label for="L_name" class="layui-form-label">
                                    <span class="x-red"></span>权限名称
                                </label>
                                <div class="layui-input-inline">
                                    <input type="text" id="L_name" name="permission_name" required="" lay-verify=""
                                           autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label for="L_des" class="layui-form-label">
                                    <span class="x-red"></span>权限描述
                                </label>
                                <div class="layui-input-inline">
                                    <input type="text" id="L_tel" name="permission_des" required="" lay-verify=""
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
@endsection