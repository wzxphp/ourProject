@extends('admin.layout')
@section('title','权限修改')
@section('content')
    <!-- 右侧主体开始 -->
    <div class="page-content">
        <div class="content">

            <!-- 右侧内容框架，更改从这里开始 -->
            <blockquote class="layui-elem-quote">
                <a href="{{url('admin/index')}}">后台首页</a>/
                <a href="">权限管理</a>/
                <a href="">权限修改</a>
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
                        <form class="layui-form" action="{{url('admin/permission/'.$per->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="layui-form-item">
                                <label for="L_name" class="layui-form-label">
                                    权限名称
                                </label>
                                <div class="layui-input-inline">
                                    <input type="text" id="L_email" name="name" required lay-verify=""
                                           autocomplete="off" value="{{$per->permission_name}}" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label for="L_tel" class="layui-form-label">
                                    权限路径
                                </label>
                                <div class="layui-input-inline">
                                    <input type="text" id="L_tel" name="des" required lay-verify=""
                                           autocomplete="off" value="{{$per->permission_des}}" class="layui-input">
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