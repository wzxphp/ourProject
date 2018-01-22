@extends('Home.user.centerlayout')

@section('content')
<div class="center">
	<div class="col-main">
		<div class="main-wrap">

			<div class="am-cf am-padding">
				<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">修改密码</strong> / <small>Password</small></div>
			</div>
			<hr/>
			<!--进度条-->
			<div class="m-progress">
				<div class="m-progress-list">
					<span class="step-1 step">
                        <em class="u-progress-stage-bg"></em>
                        <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                        <p class="stage-name">重置密码</p>
                    </span>
					<span class="step-2 step">
                        <em class="u-progress-stage-bg"></em>
                        <i class="u-stage-icon-inner">2<em class="bg"></em></i>
                        <p class="stage-name">完成</p>
                    </span>
					<span class="u-progress-placeholder"></span>
				</div>
				<div class="u-progress-bar total-steps-2">
					<div class="u-progress-bar-inner"></div>
				</div>
			</div>
			<form class="am-form am-form-horizontal" action="{{url('home/center/dopass')}}" method="POST">
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
					<label for="user-old-password" class="am-form-label">原密码</label>
					<div class="am-form-content">
						<input type="password" name="password" id="user-old-password" placeholder="请输入原登录密码">
					</div>
				</div>
				<div class="am-form-group">
					<label for="user-new-password" class="am-form-label">新密码</label>
					<div class="am-form-content">
						<input type="password" name="newpass" id="user-new-password" placeholder="由数字、字母组合">
					</div>
				</div>
				<input type="hidden" name="email" value="{{ $email }}">
				<div class="am-form-group">
					<label for="user-confirm-password" class="am-form-label">确认密码</label>
					<div class="am-form-content">
						<input type="password" name="repass" id="user-confirm-password" placeholder="请再次输入上面的密码">
					</div>
				</div>
				<div class="info-btn">
					<button type="submit">保存修改</button>
				</div>

			</form>

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