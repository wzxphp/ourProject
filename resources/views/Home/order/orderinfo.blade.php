@extends('Home.user.centerlayout')

@section('content')
<div class="center">
	<div class="col-main">
		<div class="main-wrap">

			<div class="user-orderinfo">

				<!--标题 -->
				<div class="am-cf am-padding">
					<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单详情</strong> / <small>Order&nbsp;details</small></div>
				</div>
				<hr/>
				<!--进度条-->
				<div class="m-progress">
					<div class="m-progress-list">
						<span class="step-1 step">
                           <em class="u-progress-stage-bg"></em>
                           <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                           <p class="stage-name">拍下商品</p>
                        </span>
						<span class="step-2 step">
                           <em class="u-progress-stage-bg"></em>
                           <i class="u-stage-icon-inner">2<em class="bg"></em></i>
                           <p class="stage-name">卖家发货</p>
                        </span>
						<span class="step-3 step">
                           <em class="u-progress-stage-bg"></em>
                           <i class="u-stage-icon-inner">3<em class="bg"></em></i>
                           <p class="stage-name">确认收货</p>
                        </span>
						<span class="step-4 step">
                           <em class="u-progress-stage-bg"></em>
                           <i class="u-stage-icon-inner">4<em class="bg"></em></i>
                           <p class="stage-name">交易完成</p>
                        </span>
						<span class="u-progress-placeholder"></span>
					</div>
					<div class="u-progress-bar total-steps-2">
						<div class="u-progress-bar-inner"></div>
					</div>
				</div>
				<div class="order-infoaside">
					<div class="order-addresslist">
					@foreach($info as $key=>$val)
					@endforeach
						<div class="order-address">
							<div class="icon-add">
							</div>
							<p class="new-tit new-p-re">
								<span class="new-txt">{{ $val->name }}</span>
								<span class="new-txt-rd2">{{ $val->cargo_message_tel }}</span>
							</p>
							<div class="new-mu_l2a new-p-re">
								<p class="new-mu_l2cw">
									<span class="title">收货地址：</span>
									<span class="province">{{ $val->cargo_message_address }}</span>
									<span class="street">{{ $val->cargo_details_address }}</span></p>
							</div>
						</div>
					</div>
					<div class="order-addresslist" style="border:1px solid #ccc;width:500px;height:150px;">
                        <h2>评论</h2>
                        @foreach($review as $m=>$n)
                        <div class="submit-review">
                            <p>
                                @if($n->comment_type == 0)
                                    <span>匿名评价</span>
                                @elseif($n->comment_type == 1)
                                    <span>{{ Session('home_user')->name }}</span>
                                @endif
                                @if($n->star == 1)
                                    <span>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </span>
                                @elseif($n->star == 2)
                                    <span>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </span>
                                @elseif($n->star == 3)
                                    <span>差评！！！</span>
                                @endif
                            </p>
                            <p>
                            <span>{{ $n->comment_info }}</span>
                            </p>
                        </div>
                        @endforeach
					</div>
				</div>
				<div class="order-infomain">

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

						<div class="order-status3">
							<div class="order-title">
							@foreach($info as $k=>$v)
								<div class="dd-num">订单编号：<a href="javascript:;">{{ $v->guid }}</a></div>
								<span>成交时间：{{ $v->created_at }}</span>
								<!--    <em>店铺：小桔灯</em>-->
							</div>
							<div class="order-content">
								<div class="order-left">
									<ul class="item-list">
										<li class="td td-item">
											<div class="item-pic">
												<a href="#" class="J_MakePoint">
													<img src="{{ $v->cargo_message_original }}" class="itempic J_ItemImg">
												</a>
											</div>
											<div class="item-info">
												<div class="item-basic-info">
													<a href="#">
														<p>{{ $v->cargo_message_name }}</p>
														<!-- <p class="info-little">颜色：12#川南玛瑙
															<br/>包装：裸装 </p> -->
													</a>
												</div>
											</div>
										</li>
										<li class="td td-price">
											<div class="item-price">
												{{ $v->cargo_message_price }}
											</div>
										</li>
										<li class="td td-number">
											<div class="item-number">
												<span>×</span>{{ $v->cargo_message_number }}
											</div>
										</li>
									<!-- <li class="td td-operation">
											<div class="item-operation">
												退款/退货
											</div>
										</li> -->
									</ul>

								</div>
								<div class="order-right">
									<li class="td td-amount">
										<div class="item-amount">
											合计：{{ $v->total_amount }}
											<!-- <p>含运费：<span>10.00</span></p> -->
										</div>
									</li>
									<div class="move-right">
										<li class="td td-status">
											<div class="item-status">
												<p class="Mystatus">
													@if($v->status == 1)
                                                    <span>未发货</span>
                                                    @elseif($v->status == 2)
                                                        <span>卖家已发货</span>
                                                    @elseif($v->status == 3)
                                                        <span>交易成功</span>
                                                    @endif
												</p>
												<p class="order-info"><a href="">查看物流</a></p>
												<p class="order-info"><a href="#">延长收货</a></p>
											</div>
										</li>
										<li class="td td-change">
											<div class="am-btn am-btn-danger anniu">
											@if($v->status == 1)
                                                <a href="{{ url('/home/order/remind') }}/{{ $v->id }}">提醒发货</a>
                                            @elseif($v->status == 2)
                                                <a href="{{ url('/home/order/confirm') }}/{{ $v->id }}">确认收货</a>
                                            @elseif($v->status == 3)
                                                <a href="{{ url('/home/reviews/create') }}">评论商品</a>
                                            @elseif($v->status == 4)
                                            	<a href="{{ url('/home/details') }}/{{ $v->cargo_message_id }}">再次购买</a>
											</div><br>
											<div class="am-btn am-btn-danger anniu">
                                                <a href="{{ url('/home/order/del') }}/{{ $v->id }}">删除订单</a>
                                            </div>
                                            @endif
										</li>
									</div>
								</div>
							</div>
						@endforeach
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