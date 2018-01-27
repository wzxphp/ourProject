@extends('admin.layout')
@section('title','查看管理员')
@section('content')
    <!-- 中部开始 -->
    <div class="wrapper">
        <!-- 右侧主体开始 -->

        <div class="page-content">
            <div class="content">
                <!-- 右侧内容框架，更改从这里开始 -->

                <div  class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        商品ID
                    </label>
                    <a class="btn btn-default" href="#" role="button">{{$data['id']}}</a>
                </div>

                <div  class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        时间
                    </label>
                    <a class="btn btn-default" href="#" role="button">{{$data['created_at']}}</a>
                </div>
                <form id="form_upload" method="post" target="iframe1" action="{{ url('admin/recom/'.$data['id'].'/doedit') }}" enctype="multipart/form-data" >
                    {{ csrf_field()}}
                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red">*</span>商品图片
                        </label>

                        <div class="layui-input-inline">
                            <input type="file" id="file_upload" value="" name="recommend_img" style="width:20;height:20" />
                        </div>

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
                            <input type="text" id="L_username" name="recommend_name" required="" lay-verify="nikename"
                                   value="{{ $data['recommend_name'] }}" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="" class="layui-form-label">
                            <span class="x-red">*</span>商品价格
                        </label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_username" name="recommend_price" required="" lay-verify="nikename"
                                   value="{{ $data['recommend_price'] }}"  autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="" class="layui-form-label">
                            <span class="x-red">*</span>商品折扣
                        </label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_username" name="recommend_discount" required="" lay-verify="nikename"
                                   value="{{ $data['recommend_discount'] }}"  autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="" class="layui-form-label">
                            <span class="x-red">*</span>商品库存
                        </label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_username" name="recommend_invent" required="" lay-verify="nikename"
                                   value="{{ $data['recommend_invent'] }}"  autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="" class="layui-form-label">
                            <span class="x-red">*</span>商品介绍
                        </label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_username" name="recommend_info" required="" lay-verify="nikename"
                                   value="{{ $data['recommend_info'] }}" autocomplete="off" class="layui-input">
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
@endsection