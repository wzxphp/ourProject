@extends('Home.user.centerlayout')

@section('content')
    
<div class="center">
    <div class="col-main">
        <div class="main-wrap">

            <div class="user-order">

                <!--标题 -->
                <div class="am-cf am-padding">
                    <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单管理</strong> / <small>Order</small></div>
                </div>
                <hr/>

                <div class="am-tabs am-tabs-d2 am-margin" data-am-tabs>
                    @if(session('info'))
                      <div class="alert alert-info">
                        {{ session('info') }}
                      </div>
                    @endif
                    <ul class="am-avg-sm-5 am-tabs-nav am-nav am-nav-tabs">
                        <li class="am-active"><a href="#tab1">订单</a></li>
                        <li><a href="#tab2">待付款</a></li>
                        <li><a href="#tab3">待发货</a></li>
                        <li><a href="#tab4">待收货</a></li>
                        <li><a href="#tab5">待评价</a></li>
                    </ul>

                    <div class="am-tabs-bd">
                        <div class="am-tab-panel am-fade am-in am-active" id="tab1">
                            <div class="order-top">
                                <div class="th th-item">
                                    <td class="td-inner">商品</td>
                                </div>
                                <div class="th th-price">
                                    <td class="td-inner">单价</td>
                                </div>
                                <div class="th th-number">
                                    <td class="td-inner">数量</td>
                                </div>
                                <div class="th th-operation">
                                    <td class="td-inner">商品操作</td>
                                </div>
                                <div class="th th-amount">
                                    <td class="td-inner">合计</td>
                                </div>
                                <div class="th th-status">
                                    <td class="td-inner">交易状态</td>
                                </div>
                                <div class="th th-change">
                                    <td class="td-inner">交易操作</td>
                                </div>
                            </div>

                            <div class="order-main">
                                <div class="order-list">
                                    <!-- @foreach($findorders as $k=>$v)
                                    @endforeach -->

                                    <!--交易成功-->
                                    <div class="order-status5">
                                    @if(empty($findorders))
                                        <span>订单空空！！！</span>
                                    @else
                                    @foreach($findorders as $k=>$v)
                                        <div class="order-title">
                                            <div class="dd-num">订单编号
                                                <a href="javascript:;">{{ $v['guid'] }}</a>
                                            </div>
                                                <span>成交时间：{{ $v['created_at'] }}</span>
                                        </div>
                                        <div class="order-content">
                                            <div class="order-left">
                                            
                                                <ul class="item-list">
                                                    <li class="td td-item">
                                                        <div class="item-pic">
                                                            <a href="#" class="J_MakePoint">
                                                                <img src="{{ $v['cargo_message_original'] }}" class="itempic J_ItemImg">
                                                            </a>
                                                        </div>
                                                        <div class="item-info">
                                                            <div class="item-basic-info">
                                                                <a href="#">
                                                                    <p>{{ $v['cargo_message_name'] }}</p>
                                                                    <!-- <p class="info-little">颜色：12#川南玛瑙
                                                                        <br/>包装：裸装 </p> -->
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="td td-price">
                                                        <div class="item-price">
                                                            {{ $v['cargo_message_price'] }}
                                                        </div>
                                                    </li>
                                                    <li class="td td-number">
                                                        <div class="item-number">
                                                            <span>×</span>{{ $v['cargo_message_number'] }}
                                                        </div>
                                                    </li>
                                                    <li class="td td-operation">
                                                        <div class="item-operation">
                                                            
                                                        </div>
                                                    </li>
                                                </ul>
                                            
                                            </div>
                                            <div class="order-right">
                                                <li class="td td-amount">
                                                    <div class="item-amount">
                                                        合计：{{ $v['total_amount'] }}
                                                        <!-- <p>含运费：<span>10.00</span></p> -->
                                                    </div>
                                                </li>
                                                <div class="move-right">
                                                    <li class="td td-status">
                                                        <div class="item-status">
                                                            <p class="Mystatus">
                                                            @if($v['status'] == 0)
                                                                <span>交易关闭</span>
                                                            @elseif($v['status'] == 1)
                                                                <a href="{{ url('/home/order/remove') }}/{{ $v['id'] }}">取消订单</a>
                                                            @elseif($v['status'] == 3)
                                                                <span>交易成功</span><br>
                                                                <a href="{{ url('/home/order/del') }}/{{ $v['id'] }}">删除订单</a>
                                                            @elseif($v['status'] == 4)
                                                                <a href="{{ url('/home/order/del') }}/{{ $v['id'] }}">删除订单</a>
                                                            @endif
                                                            </p>
                                                            <p class=""><a href="{{ url('home/center/orderinfo') }}/{{ $v['id'] }}">订单详情</a></p>

                                                        </div>
                                                    </li>
                                                    <li class="td td-change">
                                                        <div class="am-btn am-btn-danger anniu">
                                                        @if($v['status'] == 1)
                                                            <a href="{{ url('/home/order/remind') }}/{{ $v['id'] }}">提醒发货</a>
                                                        @elseif($v['status'] == 2)
                                                            <a href="{{ url('/home/order/confirm') }}/{{ $v['id'] }}">确认收货</a>
                                                        @elseif($v['status'] == 3)
                                                            <a href="{{ url('/home/reviews') }}/{{ $v['id'] }}">评论商品</a>
                                                        @elseif($v['status'] == 4)
                                                            <a href="{{ url('/home/details') }}/{{ $v['cargo_message_id'] }}">再次购买</a>
                                                        @elseif($v['status'] == 0)
                                                            <a href="{{ url('/home/order/del') }}/{{ $v['id'] }}">删除订单</a>
                                                        </div>
                                                        @endif
                                                        
                                                    </li>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @endif
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!--底部-->
        <div class="footer">

        </div>
    </div>
@parent
</div>

@stop