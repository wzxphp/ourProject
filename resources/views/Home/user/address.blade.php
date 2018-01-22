@extends('Home.user.centerlayout')

@section('content')
<div class="center">
	<div class="col-main">
		<div class="main-wrap">

			<div class="user-address">
				<!--标题 -->
				<div class="am-cf am-padding">
					<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">地址管理</strong> / <small>Address&nbsp;list</small></div>
				</div>
				<hr/>
				<ul class="am-avg-sm-1 am-avg-md-3 am-thumbnails">
				 @foreach($addr as $k=>$v)
					<li class="user-addresslist defaultAddr">
						<span class="new-option-r"><i class="am-icon-check-circle"></i>默认地址</span>
						<p class="new-tit new-p-re">
							<span class="new-txt">{{ $v->name }}</span>
							<span class="new-txt-rd2">{{ $v->tel }}</span>
						</p>
						<div class="new-mu_l2a new-p-re">
							<p class="new-mu_l2cw">
								<span class="title">地址：</span>
								<span class="province">{{ $v->address }}</span>
								<span class="street">{{ $v->detail_address }}</span></p>
						</div>
						<div class="new-addr-btn">
							<a href="#"><i class="am-icon-edit"></i>编辑</a>
							<span class="new-addr-bar">|</span>
							<a href="javascript:void(0);" onclick="delClick(this);"><i class="am-icon-trash"></i>删除</a>
						</div>
					</li>
					@endforeach
				</ul>
				<div class="clear"></div>
				<a class="new-abtn-type" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}">添加新地址</a>
				<!--例子-->
				<div class="am-modal am-modal-no-btn" id="doc-modal-1">

					<div class="add-dress">

						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增地址</strong> / <small>Add&nbsp;address</small></div>
						</div>
						<hr/>

						<div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
							<form class="am-form am-form-horizontal" action="{{ url('/home/center/doadd') }}" method="POST">
								{{ csrf_field() }}
								@if(count($errors) > 0)
							        <div class="alert alert-danger">
							            <ul>
							                @foreach ($errors->all() as $error)
							                <li style="color:red;">{{ $error }}</li>
							                @endforeach
							            </ul>
							        </div>
							    @endif

							    @if(session('info'))
							      <div class="alert alert-info">
							        {{ session('info') }}
							      </div>
							    @endif
								<div class="am-form-group">
									<label for="user-name" class="am-form-label">收货人</label>
									<div class="am-form-content">
										<input type="text" name="name" id="user-name" placeholder="收货人" value="{{ Session('home_user')->name }}">
									</div>
								</div>

								<div class="am-form-group">
									<label for="user-phone" class="am-form-label">手机号码</label>
									<div class="am-form-content">
										<input id="user-phone" name="tel" placeholder="手机号必填" type="text" value="{{ Session('home_user')->tel }}">
									</div>
								</div>
								<div class="am-form-group">
									<label for="user-address" class="am-form-label">所在地</label>
									<div class="am-form-content address">
										<select  id="pro" >
											@foreach($pro as $k=>$v)
												<option value="{{ $v->id }}">{{ $v->Name }}</option>
											@endforeach
										</select>
										<select  id="city" >
											@foreach($city as $i=>$j)
												<option value="{{ $j->id }}">{{ $j->Name }}</option>
											@endforeach
										</select>
										<select id="town" >
											@foreach($town as $m=>$n)
												<option value="{{ $n->id }}">{{ $n->Name }}</option>
											@endforeach
										</select>
										<input type="hidden" id="address" name="address" value="">
									</div>
								</div>

								<div class="am-form-group">
									<label for="user-intro" class="am-form-label">详细地址</label>
									<div class="am-form-content">
										<textarea class="" rows="3" name="detail_address" id="user-intro" placeholder="输入详细地址"></textarea>
										<small>100字以内写出你的详细地址...</small>
									</div>
								</div>

								<div class="am-form-group">

										<!-- <a class="am-btn am-btn-danger">保存</a>
										<a href="javascript: void(0)" class="am-close am-btn am-btn-danger" data-am-modal-close>取消</a> -->
										<button id="submit" type="submit">保存修改</button>

								</div>
							</form>
						</div>

					</div>

				</div>

			</div>

			<script type="text/javascript">
				$(document).ready(function() {							
					$(".new-option-r").click(function() {
						$(this).parent('.user-addresslist').addClass("defaultAddr").siblings().removeClass("defaultAddr");
					});
					
					var $ww = $(window).width();
					if($ww>640) {
						$("#doc-modal-1").removeClass("am-modal am-modal-no-btn")
					}
					
				})
			</script>
			<script type="text/javascript">

				$('#pro').change(function(){
					var val = $(this).val();
					$.ajax({
						url:'{{ url("/home/center/ajax") }}',
						type:'post',
						data:{'val':val,'_token':'{{ csrf_token() }}'},
						success:function(data){
							
							$('#city').empty();
							$('#town').empty();

							var cstr = '';
							$.each(data['city'],function(i,n){
								cstr += "<option value='"+n.id+"'>"+n.Name+"</option>";
							});
							$('#city').append(cstr);

							var tstr = '';
							$.each(data['town'],function(k,v){
								tstr += "<option value='"+v.id+"'>"+v.Name+"</option>";
							});
							$('#town').append(tstr);
							
						},
						dataType:'json'
					});
				});


				$('#city').change(function(){
					var val = $(this).val();
					$.ajax({
						url:'{{ url("/home/center/ajax") }}',
						type:'post',
						data:{'val':val,'_token':'{{ csrf_token() }}'},
						success:function(data){
							$('#town').empty();

							console.log(data);
							var tstr = '';
							$.each(data['city'],function(k,v){
								
								tstr += "<option value='"+v.id+"'>"+v.Name+"</option>";
							});
							$('#town').append(tstr);
							
						},
						dataType:'json'
					});
				});

				$('#submit').click(function(){

					$("#address").val($("option:checked").text());
				});

			</script>

			<div class="clear"></div>

		</div>
		<!--底部-->
		<div class="footer">
		</div>
	</div>


	<aside class="menu">
		<ul>
			<li class="person active">
				<a href="{{ url('home/center') }}"><i class="am-icon-user"></i>个人中心</a>
			</li>
			<li class="person">
				<p><i class="am-icon-newspaper-o"></i>个人资料</p>
				<ul>
					<li> <a href="{{ url('home/center/userinfo') }}">个人信息</a></li>
					<li> <a href="{{ url('home/center/safe') }}">安全设置</a></li>
					<li> <a href="{{ url('home/center/address') }}">地址管理</a></li>
					<li> <a href="cardlist.html">快捷支付</a></li>
				</ul>
			</li>
			<li class="person">
				<p><i class="am-icon-balance-scale"></i>我的交易</p>
				<ul>
					<li><a href="order.html">订单管理</a></li>
					<li> <a href="change.html">退款售后</a></li>
					<li> <a href="comment.html">评价商品</a></li>
				</ul>
			</li>
			<li class="person">
				<p><i class="am-icon-dollar"></i>我的资产</p>
				<ul>
					<li> <a href="points.html">我的积分</a></li>
					<li> <a href="coupon.html">优惠券 </a></li>
					<li> <a href="bonus.html">红包</a></li>
					<li> <a href="walletlist.html">账户余额</a></li>
					<li> <a href="bill.html">账单明细</a></li>
				</ul>
			</li>

			<li class="person">
				<p><i class="am-icon-tags"></i>我的收藏</p>
				<ul>
					<li> <a href="collection.html">收藏</a></li>
					<li> <a href="foot.html">足迹</a></li>														
				</ul>
			</li>

			<li class="person">
				<p><i class="am-icon-qq"></i>在线客服</p>
				<ul>
					<li> <a href="consultation.html">商品咨询</a></li>
					<li> <a href="suggest.html">意见反馈</a></li>							
					
					<li> <a href="news.html">我的消息</a></li>
				</ul>
			</li>
		</ul>

	</aside>
</div>
@stop