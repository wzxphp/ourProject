@extends('admin.layout')
@section('title','查看管理员')
@section('content')
<!-- 中部开始 -->
<div class="wrapper">
    <!-- 右侧主体开始 -->
    <div class="page-content">
        <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <form id="form_upload" method="post" target="iframe1" action="{{ url('admin/goods/upload')  }}" enctype="multipart/form-data">
                {{ csrf_field()}}
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        <span class="x-red">*</span>商品图片
                    </label>
                    <div class="layui-input-inline">
                        <input type="file" id="file_upload" name="goods_original" style="width:20;height:20" />
                    </div>

                    {{--//  图片开始--}}
                    <script type="text/javascript">
                            $("#file_upload").change(function () {
                                uploadImage();
                            });
                        function uploadImage() {
                            // alert('')判断是否有选择上传文件
                            var imgPath = $("#file_upload").val();
                            if (imgPath == "") {
                                alert("请选择上传图片！");
                                return;
                            }
                            //判断上传文件的后缀名
                            var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
                            if (strExtension != 'jpg' && strExtension != 'gif' && strExtension != 'png' && strExtension != 'bmp' && strExtension == '') {
                                alert("请选择图片文件");
                                return;
                            }
                        }
                    </script>

                    {{--图片结束--}}
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        <span class="x-red">*</span>商品名称
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="goods_name" required="" lay-verify="nikename"
                               autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="" class="layui-form-label">
                        <span class="x-red">*</span>商品价格
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="goods_price" name="goods_price" required="" lay-verify="nikename"
                               autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="" class="layui-form-label">
                        <span class="x-red">*</span>商品折扣
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="goods_discount" name="goods_discount" required="" lay-verify="nikename"
                               autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="" class="layui-form-label">
                        <span class="x-red">*</span>商品库存
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="inventory" name="inventory" required="" lay-verify="nikename"
                               autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="" class="layui-form-label">
                        <span class="x-red">*</span>商品介绍
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="goods_info" required="" lay-verify="nikename"
                               autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="" class="layui-form-label">
                        <span class="x-red"></span>
                    </label>
                    <div class="layui-input-inline">
                        <input type="submit" id="tijiao"  value="提交" lay-verify="nikename"
                               autocomplete="off" class="layui-input">
                    </div>
                </div>
            </form>
            <!-- 右侧内容框架，更改从这里结束 -->
        </div>
    </div>
    <!-- 右侧主体结束 -->
</div>
<script>
    var zhengze = /^[0-9]*$/
    $('#goods_price').blur(function(){
        var price = $(this).val();
        var ls = zhengze.test(price);
        if(!ls){
            alert('请输入正确的数字');
        }
        
    });

    $('#goods_discount').blur(function(){
        var price = $(this).val();
        var ls = zhengze.test(price);
        if(!ls){
            alert('请输入正确的数字');
        }
        
    });

    $('#inventory').blur(function(){
        var price = $(this).val();
        var ls = zhengze.test(price);
        if(!ls){
            alert('请输入正确的数字');
        }
        
    });

    $('#tijiao').submit(function(){
        alert(22)
        return false;
    })
    
</script>
<!-- 中部结束 -->
@endsection