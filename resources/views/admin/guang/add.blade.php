@extends('admin.layout')
@section('title','商品订单管理表')
@section('content')
    <div class="container">
        <div class="logo">添加广告位页面</div>
        <div class="open-nav"><i class="iconfont">&#xe699;</i></div>


    </div>
        <div class="x-body">
            <form class="layui-form" action="{{ url('/admin/guang/insert') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{--<table width="300px" border="0" cellpadding="20" cellspacing="30" >--}}



                    <tr>
                        <td><label for="desc" class="layui-form-label">
                                <span class="x-red">*</span>广告图
                            </label>

                            <input type="file" name="img" style="width:200px" class="layui-input" />
                            {{--<img src="/uploads/{{ $data->img }}" width="100" />--}}
                        </td>


                <div class="layui-form-item">
                    <label for="desc" class="layui-form-label">
                        <span class="x-red">*</span>广告名称（描述）
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="desc" name="name" required="" lay-verify="required"
                        autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        <span class="x-red">*</span>
                    </div>
                </div>
                        <div class="layui-form-item">
                            <label for="desc" class="layui-form-label">
                                <span class="x-red">*</span>排序
                            </label>
                            <div class="layui-input-inline">
                                <input type="text" id="desc" name="sort" required="" lay-verify="required"
                                       autocomplete="off" class="layui-input">
                            </div>
                            <div class="layui-form-mid layui-word-aux">
                                <span class="x-red">*</span>
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
        </div>

        <script>
//            layui.use(['form','layer','upload'], function(){
//                $ = layui.jquery;
//              var form = layui.form()
//              ,layer = layui.layer;
////
////
////              //图片上传接口
////              layui.upload({
////                url: './upload.json' //上传接口
////                ,success: function(res){ //上传成功后的回调
////                    console.log(res);
////                  $('#LAY_demo_upload').attr('src',res.url);
////                }
////              });
//
//
//              //监听提交
//              form.on('submit(add)', function(data){
//                console.log(data);
//                //发异步，把数据提交给php
//                layer.alert("增加成功", {icon: 6},function () {
//                    // 获得frame索引
//                    var index = parent.layer.getFrameIndex(window.name);
//                    //关闭当前frame
//                    parent.layer.close(index);
//                });
//                return false;
//              });
//
//
//            });
        </script>

    </body>

@endsection