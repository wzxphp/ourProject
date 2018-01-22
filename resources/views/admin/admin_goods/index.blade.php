@extends('admin.layout')
@section('title','查看管理员')
@section('content')
        <!-- 右侧主体开始 -->
        <div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <form class="layui-form xbs" action="{{url('admin/goods/index')}}" method="get">
                <div class="layui-form-pane" style="text-align: center;">
                  <div class="layui-form-item" style="display: inline-block;">
                    <div class="layui-input-inline">
                      <input type="text" name="username"  placeholder="商品名称" autocomplete="off" class="layui-input">
                    </div>
                      <div class="layui-input-inline">
                          <input type="text" name="username"  placeholder="商品价格" autocomplete="off" class="layui-input">
                      </div>
                    <div class="layui-input-inline" style="width:80px">
                        <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i>1</button>
                    </div>
                  </div>
                </div> 
            </form>
            <div>
                    <button class="layui-btn" ><i class="layui-icon">&#xe608;</i>共有数据:{{count($ls)}}</button>
            </div>
            <table class="layui-table">
                <thead>
                    <tr>
                        <th>
                            商品ID
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
                            修改时间
                        </th>
                        <th>
                            下架时间
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
                            <img src="{{$v->goods_original}}" style="width: 150px; height: 150px;" />

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
                        <td>
                            {{ $v->delete_at  }}
                        </td>
                        <td >
                            <a href="">待售</a>
                            <a href="">上架</a>
                            <a href="">下架</a>
                        </td>
                        <td>
                            <a href="">发货</a> |
                            <a href="">待发货</a> |
                            <a href="">取消发货</a><br><br>
                            <a href="{{ url('admin/goods/'.$v->goods_id.'/edit')}}">修改订单</a> |
                            <a href="javascript:;" onclick="delGoods({{ $v->goods_id }})">删除</a> 
                        </td>
                    </tr>
                    @endforeach;
                </tbody>
            </table>
            <!-- 右侧内容框架，更改从这里结束 -->
          </div>
            <div class="pagination">
                {!! $goods->render() !!}
            </div>
        </div>
        <!-- 右侧主体结束 -->
    </div>
    <!-- 中部结束 -->

        <script>
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