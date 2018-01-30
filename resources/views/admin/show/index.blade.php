@extends('admin.layout')
@section('title','商品订单管理表')
@section('content')

    <!-- 右侧主体开始 -->
    <div class="page-content">
        <!-- 当前位置 -->


            <div class="container">
                <div class="logo"><a href="{{url('admin/show/index')}}">后台首页轮播图</a></div>
                <div class="open-nav"><i class="iconfont">&#xe699;</i></div>


            </div>
            <table width="100%" border="0" cellpadding="8" cellspacing="0" class="layui-table">
                <tr>
                    <th>添加轮播图</th>
                    <th><span class="x-right" style="line-height:40px">共有数据：{{count($data)}} 条数据</span>轮播图列表</th>
                </tr>
                <tr>
                    <td width="350" valign="top">
                        <form action="{{ url('/admin/show/insert') }}" method="post"  class="layui-form xbs" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableOnebor">
                                <tr>
                                    <td><b>轮播图名称</b>
                                        <input type="text" name="name" value="" size="20" class="layui-input" />
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>幻灯图片</b>
                                        @if (count($errors) > 0)
                                            <div class="layui-icon  alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <input type="file" name="img" class="layui-input" />
                                    </td>
                                </tr>

                                <tr>
                                    <td><b>排序</b>
                                        <input type="text" name="sort value="" size="20" class="layui-input" />
                                    </td>"
                                </tr>
                                <tr>
                                    <td>
                                        <input type="hidden" name="token" value="79db104d" />
                                        <input  class="layui-btn" type="submit" value="提交" />
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </td>
                    <td valign="top">
                        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableOnebor">
                            <tr>
                                <th width="100">图片</th>
                                <th width="100">轮播图名称</th>

                                <th width="50" align="center">修改排序</th>

                                <th width="80" align="center">操作</th>
                            </tr>
                            @foreach($data as $item)
                                <tr>
                                    <td><img src="/uploads/{{ $item->img }}"  width="200px" height="100px" /></td>
                                    <td>{{ $item->name }}</td>
                                    {{--<td><input type="text" class="layui-input"  value="{{ $item->name }}"></td>--}}
                                    <td><input type="text" class="layui-input" onchange="changeOrder(this,{{ $item->id }})" value="{{ $item->sort }}"></td>

                                    <td align="center">
                                        <a href="{{url('admin/show/edit')}}/{{$item->id}}">编辑</a> ||
                                                       <a href="{{url('admin/show/delete')}}/{{$item->id}}">删除</a>
                                    </td>

                            @endforeach
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    {{--//排序--}}
    <script type="text/javascript">
        function changeOrder(obj,id){
//            获取当前文本框的值
            var v = $(obj).val();
//            $.post('路由','参数','执行后的返回结果')
            $.post('{{ url('/admin/show/changeorder') }}',{'_token':"{{ csrf_token() }}",'id':id,'cate_order':v},function(data){
//                console.log(data);
                if(data.status == 0){
//                    如果修改成功，给用户一个修改成功的提示，然后刷新页面
                    layer.msg(data.msg);
                    // console.log(241);

                    setTimeout(function(){
                        window.location.href = location.href;
                    },1000);
                }else{
                    layer.msg(data.msg);
                }
            })
        }
    </script>
    <!-- 右侧主体结束 -->

    <!-- 中部结束 -->

@endsection