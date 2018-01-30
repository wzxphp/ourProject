@extends('admin.layout')
@section('title','配置信息添加')
@section('content')
    <!-- 右侧主体开始 -->
    <div class="page-content">
        <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->

            <blockquote class="layui-elem-quote">
                <a href="{{url('admin/index')}}">后台首页</a>/
                <a href="">网站配置</a>/
                <a href="">配置信息添加</a>
            </blockquote>
            <!-- 中部开始 -->
            <div class="wrapper">
                <!-- 右侧主体开始 -->
                <div class="page-content">
                    <div class="content">
                        <!-- 右侧内容框架，更改从这里开始 -->
                        <form class="layui-form" action="{{url('admin/config')}}" method="post">
                            {{csrf_field()}}
                            <div class="layui-form-item">
                                <label for="L_username" class="layui-form-label">
                                    <span class="x-red"></span>*标题：
                                </label>
                                <div class="layui-input-inline">
                                    <input type="text" id="L_username" name="conf_title" lay-verify="required"
                                           autocomplete="off" class="layui-input">
                                </div>
                                <div class="layui-form-mid layui-word-aux">
                                    标题必须填写
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label for="L_username" class="layui-form-label">
                                    <span class="x-red"></span>*名称：
                                </label>
                                <div class="layui-input-inline">
                                    <input type="text" id="L_tel" name="conf_name" required="" lay-verify=""
                                           autocomplete="off" class="layui-input">
                                </div>
                                <div class="layui-form-mid layui-word-aux">
                                    名称必须填写
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label for="L_email" class="layui-form-label">
                                    <span class="x-red"></span>*内容：
                                </label>
                                <div class="layui-input-inline">
                                    <input type="text" id="L_email" name="conf_content" required="" lay-verify=""
                                           autocomplete="off" class="layui-input">
                                </div>
                                <div class="layui-form-mid layui-word-aux">
                                    内容必须填写
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">类型：</label>
                                <div class="layui-input-block">
                                    <input type="radio" onclick="showTr()" name="field_type"  value="input" title="input" checked>
                                    <input type="radio" onclick="showTr()" name="field_type"  value="textarea" title="textarea" >
                                    <input type="radio" onclick="showTr()" name="field_type"  value="radio" title="radio" >
                                </div>
                            </div>
                            <div class="field_value">
                                <label for="L_pass" class="layui-form-label">
                                    <span class="x-red"></span>类型值：
                                </label>
                                <div class="layui-input-inline">
                                    <input type="text" id="L_pass" name="field_value" lay-verify=""
                                           autocomplete="off" class="layui-input">
                                </div>
                                <div class="layui-form-mid layui-word-aux">
                                    类型值只有在radio的情况下才需要配置，格式 1|开启,0|关闭
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label for="L_repass" class="layui-form-label">
                                    <span class="x-red"></span>排序：
                                </label>
                                <div class="layui-input-inline">
                                    <input type="text" id="L_repass" name="conf_order" required="" lay-verify=""
                                           autocomplete="off" class="layui-input">
                                </div>
                            </div>
                                <div class="layui-form-item layui-form-text">
                                    <label class="layui-form-label">说明：</label>
                                    <div class="layui-input-block">
                                        <textarea name="conf_tips" cols="3" rows="3" placeholder="请输入内容" class="layui-textarea"></textarea>
                                    </div>
                                </div>

                            <div class="layui-form-item">
                                <label for="L_repass" class="layui-form-label">
                                </label>
                                <button  class="layui-btn" lay-filter="add" lay-submit="">
                                    提交
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

//        $('input[name="field_type"]').click(alert('123'));

//        function showTr(){
////            获取当前选中元素的默认值
//            var v = $('input[name="field_type"]:checked').val();
//            alert(v);
//            if(v == 'radio'){
//                $('.field_value').show();
//            }else{
//                $('.field_value').hide();
//            }
//        }
//        showTr();
    </script>
@endsection