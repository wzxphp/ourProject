@extends('admin.layout')
@section('title','商品订单管理表')
@section('content')

    <!-- 右侧主体开始 -->
    {{--<div class="page-content">--}}
        <!-- 当前位置 -->


            <div class="container">
                <div class="logo">修改轮播图页面</div>
                <div class="open-nav"><i class="iconfont">&#xe699;</i></div>


            </div>
            {{--<tr width="100%" border="0" cellpadding="8" cellspacing="0" class="layui-table">--}}


                {{--<tr>--}}
                    {{--<td width="350" valign="top">--}}
                        <form action="{{ url('/admin/show/update') }}" method="post"  class="layui-form xbs" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{--<tr width="100%" border="0" cellpadding="8" cellspacing="0" class="tableOnebor">--}}
                            <input type="hidden" name="id" value="{{ $data->id }}" size="20" class="layui-input" />
                            <table width="300px" border="0" cellpadding="20" cellspacing="30" >

                                <tr>
                                    <td><b>轮播图名称</b>

                                        <input type="text"  name="name" value="{{ $data->name }}" size="20" class="layui-input" />
                                    </td>
                                </tr>

                                <tr>
                                    <td><b>幻灯图片</b>

                                        <input type="file" name="img"  value="{{ $data->img }}" style="width:200px" class="layui-input" />
                                        {{--<img src="/uploads/{{ $data->img }}" width="100" />--}}
                                    </td>

                                </tr>
                                {{--<tr>--}}
                                    {{--<td><b>排序</b>--}}

                                        {{--<input type="text"  name="sort" value="{{ $data->sort }}" size="20" class="layui-input" />--}}
                                    {{--</td>--}}
                                {{--</tr>--}}


                                <tr>
                                    <td>
                                        <input type="hidden" name="token" value="79db104d" />
                                        <input  class="layui-btn" type="submit" value="提交" />
                                    </td>
                                </tr>


                            </table>
                        </form>




    <!-- 中部结束 -->

@endsection