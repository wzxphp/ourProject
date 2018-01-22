@extends('admin.layout')
@section('title','订单列表管理')
@section('content')

    <!-- 中部开始 -->
    <div class="wrapper">
        <!-- 右侧主体开始 -->
        <div class="page-content">
            <div class="content">
                <!-- 右侧内容框架，更改从这里开始 -->
                <form class="layui-form" action="{{ url('admin/order/update') }}" method="post">
                    {{ csrf_field() }}
                    {{--<input type="hidden" name="_token" value="F5shShRYqj5LyUr2noJpbU29pDADKfzdwAMHqE1e">--}}

                    <div class="layui-form-item">

                            <label for="L_username" class="layui-form-label">
                                <span class="x-red"></span>商品id
                            </label>
                            <div class="layui-input-inline">
                                <input type="text" id="L_username" readonly="readonly" value="{{ $cate->id }}" name="id" required="" lay-verify="nikename" autocomplete="off" class="layui-input">（*注：ID不允许修改）
                            </div>
                        </div>

                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red"></span>收货人姓名
                        </label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_username" value="{{ $cate->user_name }}" name="name" =required"" lay-verify="nikename" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red"></span>收货人电话
                        </label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_username" value="{{ $cate->tel }}" name="describe" required="" lay-verify="nikename" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red"></span>收货人地址
                        </label>
                        <div class="layui-input-inline">
                            <input  type="text" id="L_username" style="width:600px" value="{{ $cate->cargo_message_address }}" name="describe" required="" lay-verify="nikename" autocomplete="off" class="layui-input">
                        </div>
                    </div>



                    <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label">
                            <button  class="layui-btn" lay-filter="add" lay-submit="">
                        </label>
                        修改
                        </button>
                    </div>

                </form>
                <!-- 右侧内容框架，更改从这里结束 -->
            </div>
        </div>
        <!-- 右侧主体结束 -->
    </div>
    <!-- 中部结束 -->

@endsection