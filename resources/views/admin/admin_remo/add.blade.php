@extends('admin.layout')
@section('title','查看管理员')
@section('content')
        <!-- 左侧菜单结束 -->
        <!-- 右侧主体开始 -->
        <div class="page-content">
          <div class="content">

              <form class="layui-form xbs" action="{{url('admin/recom/index')}}" method="get">
                  <div class="layui-form-pane" style="text-align: center;">
                      <div class="layui-form-item" style="display: inline-block;">
                          <div class="layui-input-inline">
                              <input type="text" name="recommend_name"  placeholder="请输入用户名" autocomplete="off" class="layui-input">
                          </div>
                          <div class="layui-input-inline" style="width:80px">
                              <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                          </div>
                      </div>
                  </div>
              </form>
            <!-- 右侧内容框架，更改从这里开始 -->
            <table class="layui-table">
                <thead>
                    <tr>
                        <th>
                            ID
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
                            库存
                        </th>
                        <th>
                            销售量
                        </th>
                        <th>
                            上架时间
                        </th>
                        <th>
                            更新时间
                        </th>
                        <th>
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach($date as $k=>$v)
                    <tr>
                        <td>
                            {{$v->id}}
                        </td>
                        <td>
                            <img src="{{$v->recommend_img}}" style="width: 150px; height: 150px;" />
                        </td>
                        <td>
                            {{$v->recommend_name}}
                        </td>
                        <td>
                            {{$v->recommend_price}}
                        </td>
                        <td>
                            {{$v->recommend_discount}}
                        </td>
                        <td>
                            {{$v->recommend_info}}
                        </td>
                        <td >
                            {{$v->recommend_invent}}
                        </td>

                        <td >
                            {{$v->recommend_volume}}
                        </td>
                        <td >
                            {{$v->created_at}}
                        </td>
                        <td >
                            {{$v->updated_at}}
                        </td>

                        <td class="td-manage">

                            <a title="修改" href="{{ url('admin/recom/'.$v->id.'/edit') }}"
                               class="ml-5" style="text-decoration:none">
                                <i class="layui-icon">&#xe642;</i>
                            </a>
                            <a title="删除" href="javascript:;" onclick="view_del(this,'{{$v->id}}')"
                               style="text-decoration:none">
                                <i class="layui-icon">&#xe640;</i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
          {!! $date->render() !!}
            <!-- 右侧内容框架，更改从这里结束 -->
          </div>
        </div>
        <!-- 右侧主体结束 -->
    </div>


        <script type="text/javascript">
            /*商品-删除*/
            function view_del(obj,id){
                layer.confirm('确认要删除吗？',function(index){
                    //发异步删除数据
                    $.get('{{ url('admin/recom/') }}/'+id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
                        if(data.status == 0) {
                            $(obj).parents("tr").remove();
                            layer.msg(data.message, {icon: 1, time: 1000});
                        }else{
                            layer.msg(data.message, {icon: 1, time: 1000});}
                    });
                });
            }
        </script>
    <!-- 中部结束 -->
@endsection