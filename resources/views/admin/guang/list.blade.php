@extends('admin.layout')
@section('title','广告位列表页')
@section('content')

    <div class="x-nav">
        <div class="container">
            <div class="logo"><a href="{{url('admin/show/list')}}">后台首页广告位</a></div>
            <div class="open-nav"><i class="iconfont">&#xe699;</i></div>


        </div>
        </div>
        <div class="x-body">
            <xblock>
                <button class="layui-btn""><a href="{{ url('admin/guang/add') }}"\> 添加 </a></button>
                <span class="x-right" style="line-height:40px">共有数据：{{count($data)}} 条</span>
            </xblock>
            <table class="layui-table">
                <form action="{{ url('/admin/guang/insert') }}" method="post"  class="layui-form xbs" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <thead>

                    <tr>

                        <th>
                            ID
                        </th>
                        <th>
                            缩略图
                        </th>

                        <th>
                            名称(可描述)
                        </th>
                        <th>
                            排序
                        </th>
                        <th>
                            显示状态
                        </th>
                        <th>
                            操作
                        </th>
                    </tr>
                </thead>
                @foreach($data as $item)
                <tbody id="x-img">
                    <tr>

                        <td>
                            {{  $item->id  }}
                        </td>
                        <td>
                            <img  src="/uploads/{{ $item->img }}" width="200" alt="">
                        </td>

                        <td >
                            {{ $item->name }}
                        </td>
                        <td >
                            <input type="text" name="sort" onchange="changeOrder(this,{{ $item->id }})" value="{{ $item->sort }}" size="20" class="layui-input" />
                        </td>
                        <td class="td-status">
                            <span class="layui-btn layui-btn-normal layui-btn-mini">
                                @if($item->status==0)
                                已下线
                                @elseif($item->status==1)
                                    已上线

                            @endif
                            </span>
                        </td>
                        <td class="td-manage">
                            <a style="text-decoration:none" onclick="banner_stop(this,'10001')" href="javascript:;" title="不显示">
                                <i class="layui-icon">&#xe601;</i>
                            </a>
                            <a title="编辑" href="{{ url('admin/guang/edit/'.$item->id) }}"
                            class="ml-5" style="text-decoration:none">
                                <i class="layui-icon">&#xe642;</i>
                            </a>
                            <a title="删除" href="javascript:;" onclick="banner_del({{ $item->id }})"
                            style="text-decoration:none">
                                <i class="layui-icon">&#xe640;</i>
                            </a>

                        </td>
                    </tr>
                </tbody>
                    @endforeach
                </form>
            </table>

            <div id="page"></div>
        </div>

        <script>
            layui.use(['laydate','element','laypage','layer'], function(){
                $ = layui.jquery;//jquery
              laydate = layui.laydate;//日期插件
              lement = layui.element();//面包导航
              laypage = layui.laypage;//分页
              layer = layui.layer;//弹出层

              //以上模块根据需要引入

                layer.ready(function(){ //为了layer.ext.js加载完毕再执行
                  layer.photos({
                    photos: '#x-img'
                    //,shift: 5 //0-6的选择，指定弹出图片动画类型，默认随机
                  });
                }); 
              
            });
            {{--//排序--}}

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


           /*添加*/
            function banner_add(title,url,w,h){
                x_admin_show(title,url,w,h);
            }
             /*停用*/
            function banner_stop(obj,id){
                layer.confirm('确认不显示吗？',function(index){
                    //发异步把用户状态进行更改
                    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="banner_start(this,id)" href="javascript:;" title="显示"><i class="layui-icon">&#xe62f;</i></a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="layui-btn layui-btn-disabled layui-btn-mini">不显示</span>');
                    $(obj).remove();
                    layer.msg('不显示!',{icon: 5,time:1000});
                });
            }

            /*启用*/
            function banner_start(obj,id){
                layer.confirm('确认要显示吗？',function(index){
                    //发异步把用户状态进行更改
                    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="banner_stop(this,id)" href="javascript:;" title="不显示"><i class="layui-icon">&#xe601;</i></a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="layui-btn layui-btn-normal layui-btn-mini">已显示</span>');
                    $(obj).remove();
                    layer.msg('已显示!',{icon: 6,time:1000});
                });
            }
            // 编辑
//            function banner_edit (title,url,id,w,h) {
//                x_admin_show(title,url,w,h);
//            }
            /*删除*/
            function banner_del(id){
                layer.confirm('您确定要删除吗？',{
                    btn:['确定','取消']
                }, function(){
                    //向服务器发送ajax请求，删除当前id对应的用户数据
                    //$.post('请求的路由','携带的参数','处理成功后的返回结果')
                    $.post('{{ url('admin/guang/delete') }}/'+id,{'_token':"{{ csrf_token() }}"},function (data){
                        if(data.status == 0){
                            layer.msg(data.message,{icon:6});
                            setTimeout(function(){
                                window.location.href = location.href;
                            },1000);
                        }else{
                            layer.msg(data.message,{icon:5});
                            setTimeout(function(){
                                window.location.href = location.href;
                            },1000);
                        }
                    })
                })}
            </script>
@endsection