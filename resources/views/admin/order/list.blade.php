@extends('admin.layout')
@section('title','商品订单管理表')
@section('content')

    <!-- 右侧主体开始 -->
    <div class="page-content">
        <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <form class="layui-form xbs" action="" >
                {{ csrf_field() }}
                <div class="layui-form-pane" style="text-align: center;">
                    <div class="layui-form-item" style="display: inline-block;">
                        <label class="layui-form-label xbs768">日期范围</label>
                        <div class="layui-input-inline xbs768">
                            <input class="layui-input" placeholder="开始日" id="LAY_demorange_s">
                        </div>
                        <div class="layui-input-inline xbs768">
                            <input class="layui-input" placeholder="截止日" id="LAY_demorange_e">
                        </div>
                        <div class="layui-input-inline">
                            <input type="text" name="username"  placeholder="请输入用户名" autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-input-inline" style="width:80px">
                            <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                        </div>
                    </div>
                </div>
            </form>
            <xblock><button class="layui-btn" onclick="member_add('添加用户','member-add.html','600','500')"><i class="layui-icon">&#xe608;</i><a href="{{ url('admin/cate/create') }}">添加分类</a></button><span class="x-right" style="line-height:40px">共有数据：88 条</span></xblock>
            <table class="layui-table">
                <thead>
                <tr>

                    <th> 编号 </th>
                    <th> 商品编号 </th>
                    <th> 用户ID </th>
                    <th> 下单商品 </th>
                    <th> 商品单价 </th>
                    <th> 商品数量 </th>
                    <th> 收货地址 </th>
                    <th> 支付方式 </th>
                    <th> 支付状态 </th>
                    <th> 总计 </th>
                    <th> 加入时间 </th>



                    {{--<th> 添加时间 </th>--}}
                    <th>操作</th>

                </tr>
                </thead>
                <tbody>
                @foreach($cates as $k=>$v)
                <tr>

                    <td >{{ $v->pid }}</td>

                    <td >{{ $v->guid }}</td>
                    <td>{{$v->user_id}}</td>
                    <td >{{ $v->cargo_message_id }}</td>
                    <td >{{ $v->cargo_message_price }}</td>
                    <td >{{ $v->cargo_message_number }}</td>
                    <td >{{ $v->cargo_message_address }}</td>
                    <td >{{ $v->pay_type }}</td>
                    <td >{{ $v->pay_status }}</td>
                    <td >{{ $v->total_amount }}</td>
                    <td >{{ $v->created_at }}</td>

                    <td>
                    <a href="{{ url('admin/order/'.$v->id.'/edit') }}">修改订单</a>
                    <a href="javascript:;" onclick="del({{ $v->id }})">删除</a>

                    </td>

                </tr>
                @endforeach
                </tbody>
            </table>

            <!-- 右侧内容框架，更改从这里结束 -->
        </div>
    </div>
    <!-- 右侧主体结束 -->
    <script>
        function del(id){
            //询问框
            layer.confirm('您确定要删除吗？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                //向服务器发送ajax请求，删除当前id对应的用户数据
//                $.post('请求的路由','携带的参数','处理成功后的返回结果')
                $.get('{{ url('admin/cate/') }}/'+id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
//                    data就是服务器返回的json数据
//                    console.log(data);
//                    JSON.parse()
//                    JSON.stringify()

                     if(data.status == 0){
                        layer.msg(data.message, {icon: 6});
                        setTimeout(function(){
                            window.location.href = location.href;
                        },2000);


                    }else{
                        layer.msg(data.message, {icon: 5});

                        window.location.href = location.href;
                    }

                })

//
            }, function(){

            });
        }


        //排序
        function changeOrder(obj,id){
//            获取当前文本框的值
            var v = $(obj).val();
//            $.post('路由','参数','执行后的返回结果')
            $.post('{{ url('admin/cate/changeorder') }}',{'_token':"{{ csrf_token() }}",'id':id,'cate_order':v},function(data){
//                console.log(data);
                if(data.status == 0){
//                    如果修改成功，给用户一个修改成功的提示，然后刷新页面
                    layer.msg(data.msg);

                    setTimeout(function(){
                        window.location.href = location.href;
                    },3000);
                    layer.msg(data.msg);
                }else{
                }
            })
        }
    </script>

    <!-- 中部结束 -->

@endsection