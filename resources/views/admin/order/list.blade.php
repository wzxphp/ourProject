@extends('admin.layout')
@section('title','商品订单管理表')
@section('content')

    <!-- 右侧主体开始 -->
    <div class="page-content">
        <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <form class="layui-form xbs" action="{{url('admin/order/index')}}" method="get">
                {{ csrf_field() }}
                <div class="layui-form-pane" style="text-align: center;">
                    <div class="layui-form-item" style="display: inline-block;">
                        <label class="layui-form-label xbs768">日期范围</label>
                        <div class="layui-input-inline xbs768">
                            <input class="layui-input" placeholder="开始日" name="mindate" id="begin" autocomplete="off">
                        </div>
                        <div class="layui-input-inline xbs768">
                            <input class="layui-input" placeholder="截止日" name="maxdate" id="over" autocomplete="off">
                        </div>
                        <div class="layui-input-inline">
                            <input type="text" name="user_name"  placeholder="请输入用户名" autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-input-inline" style="width:80px">
                            <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                        </div>
                    </div>
                </div>
            </form>



            <tbody>
            <span class="x-right" style="line-height:40px">共有数据：{{ count($cates) }} 条</span></xblock>
            <table class="layui-table">
                <tr>
                    <th> 编号 </th>
                    <th> 商品编号 </th>
                    <th> 用户ID </th>
                    <th> 下单商品 </th>
                    <th> 商品单价 </th>
                    <th> 商品数量 </th>
                    <th> 收货地址 </th>
                    <th> 商品颜色 </th>
                    <th> 收货人电话 </th>
                    <th> 收货人姓名 </th>
                    <th> 邮编 </th>
                    <th> 支付方式 </th>
                    <th> 总计 </th>
                    <th> 加入时间 </th>
                    <th> 支付状态 </th>
                    <th> 更改状态 </th>



                    {{--<th> 添加时间 </th>--}}
                    <th>操作</th>

                </tr>

                @foreach($data as $k=>$v)
                <tr>
                    <td style="width:20px">{{ $v->id }}</td>
                    <td >{{ $v->guid }}</td>
                    <td>{{$v->user_id}}</td>
                    <td >{{ $v->cargo_message_id }}</td>
                    <td >{{ $v->cargo_message_price }}</td>
                    <td >{{ $v->cargo_message_number }}</td>
                    <td style="width:200px">{{ $v->cargo_message_address }}</td>
                    <td >{{ $v->color }}</td>
                    <td >{{ $v->tel }}</td>
                    <td >{{ $v->user_name }}</td>
                    <td >{{ $v->youbian }}</td>
                    <td >{{ $v->pay_type }}</td>
                    <td >{{ $v->total_amount }}</td>
                    <td >{{ $v->created_at }}</td>
                {{--</tr>--}}
                    <td >
                        @if($v->status==0)
                            交易关闭
                        @elseif($v->status==1)
                            待发货
                        @elseif($v->status==2)
                            已发货
                        @elseif($v->status==3)
                            成交！
                        @endif</td>

                    <td class=" ">
                        <a href="{{url('admin/order/up').'/'.$v->id}}">
                            @if($v->status==0)
                                <a href="{{url('admin/order/up').'/'.$v->id}}">
                                    点击开启订单
                                    @elseif($v->status==1)
                                        <a href="{{url('admin/order/yes').'/'.$v->id}}">
                                            点击已收货
                                            @elseif($v->status==2)
                                                <a href="{{url('admin/order/dis').'/'.$v->id}}">
                                                    点击成交
                                                    @elseif($v->status==3)
                                                        <a href="{{url('admin/order/down').'/'.$v->id}}">
                                                            点击关闭订单
                                            @endif

                                        </a>

                    </td>


                    </td>

                    {{--<td class="td-status">--}}
                        {{--@if( $v->status == '1' )<span class="layui-btn layui-btn-normal layui-btn-mini">已发货</span>--}}
                        {{--@else <span class="layui-btn layui-btn-disabled layui-btn-mini">已取消</span>--}}
                            {{--@endif--}}
                    {{--</td>--}}
                    <td class="td-manage">
                        {{--@if( $v->status == '1' )<a style="text-decoration:none" onclick="member_stop(this,'{{ $v->id }}')" href="javascript:;" title="点击取消发货"><i class="layui-icon">&#xe601;</i></a>--}}
                        {{--@else                   <a style="text-decoration:none" onClick="member_start(this,'{{ $v->id }}')" href="javascript:;" title="点击发货"><i class="layui-icon">&#xe62f;</a>--}}
                        {{--@endif--}}
                        <a title="修改订单" href="{{ url('admin/order/'.$v->id.'/edit') }}"
                           class="ml-5" style="text-decoration:none">
                            <i class="layui-icon">&#xe642;</i>修改
                        </a>
{{--                    <a href="{{ url('admin/order/'.$v->id.'/edit') }}">修改订单</a>--}}
                    {{--<a href="javascript:;" onclick="del({{ $v->id }})">删除</a>--}}
                    </td>
                </tr>
                @endforeach

            </table>
            </tbody>
            <!-- 右侧内容框架，更改从这里结束 -->
        </div>
        <div class="layui-show">
            {!! $data->render() !!}
        </div>
    </div>
    <!-- 右侧主体结束 -->
    <script>


        //日期插件
        layui.use(['laydate'], function(){
            laydate = layui.laydate;
            //以上模块根据需要引入
            var start = {
                min: '2018-01-01 00:00:00'
                ,max: '2099-06-16 23:59:59'
                ,istoday: false
                ,choose: function(datas){
                    end.min = datas; //开始日选好后，重置结束日的最小日期
                    end.start = datas //将结束日的初始值设定为开始日
                }
            };

            var end = {
                min: '2018-01-01 00:00:00'
                ,max: '2099-06-16 23:59:59'
                ,istoday: false
                ,choose: function(datas){
                    start.max = datas; //结束日选好后，重置开始日的最大日期
                }
            };

            document.getElementById('begin').onclick = function(){
                start.elem = this;
                laydate(start);
            };
            document.getElementById('over').onclick = function(){
                end.elem = this;
                laydate(end);
            }

        });
    </script>

    <!-- 中部结束 -->

@endsection