@extends('Home.user.centerlayout')

@section('content')
<div class="concent">
	<!--地址 -->
	<div class="paycont">
		<div class="address">
			<h3>确认收货地址 </h3>
			<div class="control">
				<div class="tc-btn createAddr theme-login am-btn am-btn-danger"><a href="">使用新地址</a></div>
			</div>
			<div class="clear"></div>
			@foreach($data as $m=>$n)
			@endforeach
				<ul class="am-avg-sm-1 am-avg-md-3 am-thumbnails">
				 
					<li class="user-addresslist defaultAddr">
						<span class="new-option-r"><i class="am-icon-check-circle"></i>默认地址</span>
						<p class="new-tit new-p-re">
							<span class="new-txt">{{ $n->name }}</span>
							<span class="new-txt-rd2">{{ $n->tel }}</span>
						</p>
						<div class="new-mu_l2a new-p-re">
							<p class="new-mu_l2cw">
								<span class="title">地址：</span>
								<span class="province">{{ $n->address }}</span>
								<span class="street">{{ $n->detail_address }}</span></p>
						</div>
						<div class="new-addr-btn">
							<a href="{{ url('/home/center/edit') }}/{{ $n->id }}"><i class="am-icon-edit"></i>编辑</a>
							<span class="new-addr-bar">|</span>
							<a href="{{ url('/home/center/del') }}/{{ $n->id }}" onclick="delClick(this);"><i class="am-icon-trash"></i>删除</a>
						</div>
					</li>
				
				</ul>
			<div class="clear"></div>
		</div>

		<!--订单 -->
		<div class="concent">
			<div id="payTable">
				<h3>确认订单信息</h3>
				<div class="cart-table-th">
					<div class="wp">
						<div class="th th-item">
							<div class="td-inner">商品信息</div>
						</div>
						<div class="th th-price">
							<div class="td-inner">单价</div>
						</div>
						<div class="th th-amount">
							<div class="td-inner">数量</div>
						</div>
						<div class="th th-sum">
							<div class="td-inner">金额</div>
						</div>
						<div class="th th-oplist">
							<div class="td-inner">配送方式</div>
						</div>
					</div>
				</div>
				<div class="clear"></div>
				
				<form action="{{ url('home/order') }}" method="POST">
				{{ csrf_field() }}
					<tr class="item-list">
						<div class="bundle  bundle-last">
							<div class="bundle-main">
							@foreach($reorders as $k=>$v)
								<ul class="item-content clearfix">
									<div class="pay-phone">
										<li class="td td-item">
											<div class="item-pic">
												<a href="#" class="J_MakePoint">
													<img src="{{ $reorders['cargo_message_original'] }}" class="itempic J_ItemImg">
													<input type="hidden" name="cargo_message_original" value="{{ $reorders['cargo_message_original'] }}">
												</a>
											</div>
											<div class="item-info">
												<div class="item-basic-info">
													<a href="#" class="item-title J_MakePoint" data-point="tbcart.8.11">{{ $reorders['cargo_message_name'] }}</a>

													<input type="hidden" name="cargo_message_name" value="{{ $reorders['cargo_message_name'] }}">

													<input type="hidden" name="guid" value="{{ $reorders['guid'] }}">

													<input type="hidden" name="cargo_message_id" value="{{ $reorders['cargo_message_id'] }}">

													<input type="hidden" name="user_id" value="{{$reorders['user_id']}}">
												</div>
											</div>
										</li>
										<li class="td td-price">
											<div class="item-price price-promo-promo">
												<div class="price-content">
													<em id="price" class="J_Price price-now">{{ $reorders['cargo_message_price'] }}</em>元

													<input type="hidden" name="cargo_message_price" value="{{ $reorders['cargo_message_price'] }}">
												</div>
											</div>
										</li>
									</div>
									<li class="td td-amount">
										<div class="amount-wrapper ">
											<div class="item-amount ">
												<span class="phone-title">购买数量</span>
												<div class="sl">
													<!-- <input class="min am-btn" onclick="change(-1)" name="" type="button" value="-" /> -->

													x<input class="text_box" disabled id="num" name="" type="text" value="{{ $reorders['cargo_message_number'] }}" style="width:30px;" />
													<input type="hidden" name="cargo_message_number" value="{{ $reorders['cargo_message_number'] }}">
													
													<!-- <input class="add am-btn" onclick="change(1)" name="" type="button" value="+" /> -->
												</div>
											</div>
										</div>
									</li>
									<li class="td td-sum">
										<div class="td-inner">
											<em tabindex="0" id="amount" class="J_ItemSum number">{{ $reorders['cargo_message_price'] * $reorders['cargo_message_number'] }}</em>元
											<input type="hidden" id="total" name="total_amount" value="{{ $reorders['cargo_message_price'] * $reorders['cargo_message_number'] }}">

											<input type="hidden" name="status" value="{{ $reorders['status'] }}">
										</div>
									</li>
									<li class="td td-oplist">
										<div class="td-inner">
											<span class="phone-title">配送方式</span>
											<div class="pay-logis">
												快递<b class="sys_item_freprice">10</b>元
											</div>
										</div>
									</li>
								@endforeach
								</ul>
								<div class="clear"></div>
							</div>
						</div>
					</tr>

				
			</div>
			<div class="pay-total">
			<!--留言-->
				<div class="order-extra">
					<div class="order-user-info">
						<div id="holyshit257" class="memo">
							<label>买家留言：</label>
							<input type="text" name="user_message" title="" placeholder="建议填写和卖家达成一致的说明" class="memo-input J_MakePoint c2c-text-default memo-close" >
							<div class="msg hidden J-msg">
								<p class="error">最多输入500个字符</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			
				<!--含运费小计 -->
			<div class="buy-point-discharge ">
				<p class="price g_price ">
					合计（含运费） <span>¥</span><em  class="pay-sum">{{ $reorders['total_amount'] }}</em>
				</p>
			</div>
			
			<!--信息 -->
			<div class="order-go clearfix">
				<div class="pay-confirm clearfix">
					<div class="box">
						<div tabindex="0" id="holyshit267" class="realPay"><em class="t">实付款：</em>
							<span class="price g_price ">
	                		<span>¥</span> <em class="style-large-bold-red " id="J_ActualFee">{{ $reorders['total_amount'] }}</em>
							</span>
						</div>

						<div id="holyshit268" class="pay-address">
							<p class="buy-footer-address">
								<span class="buy-line-title buy-line-title-type">寄送至：</span>
								<span class="buy--address-detail">
									<span class="province">{{ $reorders['cargo_message_address'] }}</span>
									<input type="hidden" name="cargo_message_address" value="{{ $reorders['cargo_message_address'] }}">
									<span class="street">{{ $reorders['cargo_details_address'] }}</span>
									<input type="hidden" name="cargo_details_address" value="{{ $reorders['cargo_details_address'] }}">
								</span>
								</span>
							</p>
							<p class="buy-footer-address">
								<span class="buy-line-title">收货人：</span>
								<span class="buy-address-detail">   
	                     		<span class="buy-user">{{ $reorders['name'] }}</span>

	                     		<input type="hidden" name="name" value="{{ $reorders['name'] }}">
								<span class="buy-phone">{{ $reorders['cargo_message_tel'] }}</span>
								</span>
								<input type="hidden" name="cargo_message_tel" value="{{ $reorders['cargo_message_tel'] }}">
							</p>
						</div>
					</div>

					<div id="holyshit269" class="submitOrder">
						<div class="go-btn-wrap">
							<!-- <a id="J_Go" href="{{ url('home/order') }}" class="btn-go" tabindex="0" title="">提交订单</a> -->
							<button id="submit" type="submit">提交订单</button>
						</div>
					</div>
					</form>
					<div class="clear"></div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>

<script type="text/javascript">

    var num = document.getElementById('num');
    var price = document.getElementById('price');
    var total = document.getElementById('total');
    var amount = document.getElementById('amount');
    // num.value = parseInt(num.value) + parseInt(n);

    if(num.value <= 0)
    {
        num.value = 1;
    }
    amount.innerHTML = parseInt(num.value) * parseInt(price.innerHTML);
    total.value = parseInt(num.value) * parseInt(price.innerHTML);

</script>
@stop