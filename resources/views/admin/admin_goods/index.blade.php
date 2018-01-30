@extends('admin.layout')
@section('title','查看管理员')
@section('content')
        <!-- 右侧主体开始 -->
        <div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <form class="layui-form xbs" action="{{url('admin/goods/index')}}" method="get">
            {{ csrf_field()}}
                <div class="layui-form-pane" style="text-align: center;">
                  <div class="layui-form-item" style="display: inline-block;">
                    <div class="layui-input-inline">
                      <input type="text" name="goods_name"  placeholder="商品名称" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-input-inline" style="width:80px">
                        <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i>1</button>
                    </div>
            </form>
             <form class="layui-form xbs" action="{{url('admin/goods/index')}}" method="get">
                    {{ csrf_field()}}
                      <div class="layui-input-inline">
                          <input type="text" name="goods_price"  placeholder="商品价格" autocomplete="off" class="layui-input">
                      </div>
                    <div class="layui-input-inline" style="width:80px">
                        <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i>2</button>
                    </div>
                  </div>
                </div> 
            </form>
            <div>
                    <button class="layui-btn" ><i class="layui-icon"></i>共有数据:{{count($goods)}}</button>
            </div>
            <table class="layui-table">
                <thead>
                    <tr>
                        <th>
                            商品ID
                        </th>
                        <th>
                            分类名称
                        </th>
                        <th>
                            商品图片
                        </th>
                        <th>
                            商品名称
                        </th>
                        <th>
                            商品价格
                        </th>
                        <th>
                            商品折扣
                        </th>
                        <th>
                            商品介绍
                        </th>
                        <th>
                            销售量
                        </th>
                        <th>
                            库存量
                        </th>
                        <th>
                            上架时间
                        </th>
                        <th>
                            更新时间
                        </th>
                        <th>
                            商品状态
                        </th>
                        <th>
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($goods as $v)
                    <tr>
                        <td>
                            {{ $v->goods_id  }}
                        </td>
                        <td>
                            {{$cates[$v->category_id]}}
                        </td>
                        <td>
                            <img src="{{$v->goods_original}}" style="width: 50px; height: 100px;" />

                        </td>
                        <td >
                            {{  $v->goods_name  }}
                        </td>
                        <td >
                            {{  $v->goods_price  }}
                        </td>
                        <td >
                            {{  $v->goods_discount  }}
                        </td>

                        <td >
                            {{  $v->goods_info  }}
                        </td>
                        <td >
                            {{  $v->sales_volume  }}
                        </td>
                        <td >
                            {{ $v->inventory}}

                        </td>
                        <td>
                            {{  $v->create_at  }}
                        </td>
                        <td>
                            {{ $v->update_at  }}
                        </td>
                        <td class="td-status">
                            @if( $v->goods_status == '1' )
                             <span class="layui-btn layui-btn-normal layui-btn-mini">上架</span>
                            @else
                            <span class="layui-btn layui-btn-disabled layui-btn-mini">下架</span>
                            @endif
                        </td>
                        <td class="td-manage">
                            @if( $v->goods_status == '1' )
                                <a style="text-decoration:none" onclick="goods_start(this,'{{ $v->goods_id }}')" href="javascript:;" title="下架"><i class="layui-icon">&#xe601;</i></a>
                            @else  
                                <a style="text-decoration:none" onclick="goods_start(this,'{{ $v->goods_id }}')" href="javascript:;" title="上架"><i class="layui-icon">&#xe62f;</i></a>
                            @endif
                                <a title="编辑" href="{{ url('admin/goods/'.$v->goods_id.'/edit')}}"
                                   class="ml-5" style="text-decoration:none">
                                    <i class="layui-icon">&#xe642;</i>
                                </a>
                                <a title="删除" href="javascript:;" onclick="delGoods({{ $v->goods_id }})"
                                   style="text-decoration:none">
                                    <i class="layui-icon">&#xe640;</i>
                                </a>
                                <a href="{{url('admin/xiugai/'.$v->goods_id.'/index')}}">推荐</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- 右侧内容框架，更改从这里结束 -->
          </div>
            <div style="float:right" id="page" class="layui-page">
                {!! $goods->render() !!}
            </div>
        </div>
        <!-- 右侧主体结束 -->
    </div>
    <!-- 中部结束 -->
    
        <script type="text/javascript">

        /*上架*/
        function goods_start(obj,id){
            layer.confirm('确认要上架吗？',
                function(index){
                //发异步把用户状态进行更改
                $.get('{{ url('admin/goods/goods_sta') }}',
                    {'_token':"{{csrf_token()}}",'close':id},
                    function (data) {
                    if(data.goods_status == 1) {
                        layer.msg(data.message, {icon: 1, time: 1000},
                            function(){location.href="{{ url('admin/goods/index') }}"});
                    }else{
                        layer.msg(data.message, {icon: 2, time: 1000});
                    }
                });

            });
        }

        // 删除商品
            function delGoods(id){
                layer.confirm('您确定要删除吗？', {
                    btn: ['确定','取消'] //按钮
                }, function(){
                    $.get('{{ url('admin/goods/') }}/'+id,
                        {'_method':'delete','_token':"{{csrf_token()}}"},
                        function (data) {

                            if(data.status == 0){
                                layer.msg(data.message, {icon: 6});
                                setTimeout(function(){
                                    window.location.href = location.href;
                                },1000);
                            }else{
                                layer.msg(data.message, {icon: 5});

                                window.location.href = location.href;
                            }

                        })

//
                }, function(){

                });
            }
        </script>
@endsection