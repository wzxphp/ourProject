@extends('Home.user.centerlayout')

@section('content')
<div class="center">
	<div class="col-main">
		<div class="main-wrap">

			<!--标题 -->
			<div class="user-safety">
				<div class="am-cf am-padding">
					<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">账户安全</strong> / <small>Set&nbsp;up&nbsp;Safety</small></div>
				</div>
				<hr/>

				<!--头像 -->
				<div class="user-infoPic">

					<div class="filePic">
						<img class="am-circle am-img-thumbnail" src="{{url('home/usercenter/images/getAvatar.do.jpg')}}" alt="" />
					</div>

					<p class="am-form-help">头像</p>

					<div class="info-m">
						<div><b>用户名：<i>{{ Session('user')->name }}</i></b></div>
                        <div class="safeText">
                          	<a href="safety.html">账户安全:<em style="margin-left:20px ;">60</em>分</a>
							<div class="progressBar"><span style="left: -95px;" class="progress"></span></div>
						</div>
					</div>
				</div>

				<div class="check">
					<ul>
						<li>
							<i class="i-safety-lock"></i>
							<div class="m-left">
								<div class="fore1">登录密码</div>
								<div class="fore2"><small>为保证您购物安全，建议您定期更改密码以保护账户安全。</small></div>
							</div>
							<div class="fore3">
								<a href="{{ url('home/center/password') }}">
									<div class="am-btn am-btn-secondary">修改</div>
								</a>
							</div>
						</li>
						<li>
							<i class="i-safety-wallet"></i>
							<div class="m-left">
								<div class="fore1">支付密码</div>
								<div class="fore2"><small>启用支付密码功能，为您资产账户安全加把锁。</small></div>
							</div>
							<div class="fore3">
								<a href="setpay.html">
									<div class="am-btn am-btn-secondary">立即启用</div>
								</a>
							</div>
						</li>
						<li>
							<i class="i-safety-iphone"></i>
							<div class="m-left">
								<div class="fore1">手机验证</div>
								<div class="fore2"><small>您验证的手机：186XXXXXXXX 若已丢失或停用，请立即更换</small></div>
							</div>
							<div class="fore3">
								<a href="bindphone.html">
									<div class="am-btn am-btn-secondary">换绑</div>
								</a>
							</div>
						</li>
						<li>
							<i class="i-safety-mail"></i>
							<div class="m-left">
								<div class="fore1">邮箱验证</div>
								<div class="fore2"><small>您验证的邮箱：5831XXX@qq.com 可用于快速找回登录密码</small></div>
							</div>
							<div class="fore3">
								<a href="email.html">
									<div class="am-btn am-btn-secondary">换绑</div>
								</a>
							</div>
						</li>
						<li>
							<i class="i-safety-idcard"></i>
							<div class="m-left">
								<div class="fore1">实名认证</div>
								<div class="fore2"><small>用于提升账号的安全性和信任级别，认证后不能修改认证信息。</small></div>
							</div>
							<div class="fore3">
								<a href="idcard.html">
									<div class="am-btn am-btn-secondary">认证</div>
								</a>
							</div>
						</li>
						<li>
							<i class="i-safety-security"></i>
							<div class="m-left">
								<div class="fore1">安全问题</div>
								<div class="fore2"><small>保护账户安全，验证您身份的工具之一。</small></div>
							</div>
							<div class="fore3">
								<a href="question.html">
									<div class="am-btn am-btn-secondary">认证</div>
								</a>
							</div>
						</li>
					</ul>
				</div>

			</div>
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