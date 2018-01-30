@extends('admin.layout')
@section('title','商品订单管理表')
@section('content')
    <div class="container">
        <div class="logo">修改广告位</div>
        <div class="open-nav"><i class="iconfont">&#xe699;</i></div>


    </div>
        <div class="x-body">
            <form class="layui-form" action="{{ url('/admin/guang/update') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{--<table width="300px" border="0" cellpadding="20" cellspacing="30" >--}}



                <div class="layui-form-item">
                        <label for="desc" class="layui-form-label">
                                <span class="x-red">*</span>ID
                            </label>

                            <input type="text" name="id" readonly="readonly" value="{{ $data->id }}" style="width:200px" class="layui-input" />
                            <span class="x-red" >*</span>
                            {{--<img src="/uploads/{{ $data->img }}" width="100" />--}}

                    </div>
                <div class="layui-form-item">
                        <label for="desc" class="layui-form-label">
                                <span class="x-red">*</span>广告图
                            </label>

                            {{--<input type="file" name="img" value="{{ $data->img }}" style="width:200px" class="layui-input" />--}}
                            <span class="x-red">*</span>
                            <input id="file_upload" name="img"  type="file" multiple="true" >
                            <br>
                            {{--<input type="file" name="img" style="width:200px" class="layui-input" />--}}
                            {{--<img src="/uploads/{{ $data->img }}" width="100" />--}}

                            <img src=""/uploads/{{ $data->img }}"" alt="" id="file_upload_img" value="{{ $data->img }}" style="max-width: 350px; max-height:100px;">
                            {{--<img src="/uploads/{{ $data->img }}" width="100" />--}}

                </div>

                <div class="layui-form-item">
                    <label for="desc" class="layui-form-label">
                        <span class="x-red">*</span>广告名称（描述）
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="desc" name="name" value="{{ $data->name }}" required="" lay-verify="required"
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
                                <input type="text" id="desc" name="sort" value="{{ $data->id }}" required="" lay-verify="required"
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
                        更改
                    </button>
                </div>
            </form>
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

            //只将文件上传表单项的内容放入formData对象
            var formData = new FormData();
            formData.append('file_upload', $('#file_upload')[0].files[0]);
            formData.append('_token', '{{csrf_token()}}');

            $.ajax({
                type: "POST",
                url: "/admin/file/upload",
                data: formData,
                async: true,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
//                    console.log(data);
                    $('#file_upload_img').attr('src',data);
                },

                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("上传失败，请检查网络后重试");
                }
            });
        }
    </script>

    </body>

@endsection