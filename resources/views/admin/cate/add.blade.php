@extends('admin.layout')
@section('title','分类添加页面')
@section('content')
    <!-- 右侧主体开始 -->
    <div class="page-content">
        <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->

            <blockquote class="layui-elem-quote">
                <a href="">后台首页</a>|
                <a href="">增加分类</a>|
                <a href="">管理分类列表</a>
            </blockquote>
            <!-- 中部开始 -->
            <div class="wrapper">

                <!-- 右侧主体开始 -->
                <div class="page-content">
                    <div class="content">
                        <!-- 右侧内容框架，更改从这里开始 -->

                        <form class="layui-form" action="{{ url('admin/cate/store') }}" method="post">
                            {{ csrf_field() }}
                            {{--<input type="hidden" name="_token" value="F5shShRYqj5LyUr2noJpbU29pDADKfzdwAMHqE1e">--}}
                            <div class="layui-form-item">
                                <label for="L_username" class="layui-form-label">
                                    <span class="x-red"></span>父级分类
                                </label>
                                <div class="layui-input-inline">
                                    <select name="pid" id="catid" class="required" class="layui-input">
                                        <option value="0">顶级分类</option>
                                        @foreach($cateone as $k=>$v)
                                        <option value="{{ $v->id }}">{{ $v->name }}</option>
                                        @endforeach
                                     </select>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label for="L_username" class="layui-form-label">
                                    <span class="x-red"></span>分类名称
                                </label>
                                <div class="layui-input-inline">
                                    <input type="text" id="L_username" name="name" required="" lay-verify="nikename" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label for="L_username" class="layui-form-label">
                                    <span class="x-red"></span>商品关键词
                                </label>
                                <div class="layui-input-inline">
                                    <input type="text" id="L_username" name="describe" required="" lay-verify="nikename" autocomplete="off" class="layui-input">
                                </div>
                            </div>


                            <div class="layui-form-item">
                                <label for="L_repass" class="layui-form-label">
                                <button  class="layui-btn" lay-filter="add" lay-submit="">
                                </label>
                                    添加
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