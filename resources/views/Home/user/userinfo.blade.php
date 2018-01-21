@extends('Home.user.centerlayout')

@section('content')
<div class="center">
	<div class="col-main">
		<div class="main-wrap">

			<div class="user-info">
				<!--标题 -->
				<div class="am-cf am-padding">
					<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">个人资料</strong> / <small>Personal&nbsp;information</small></div>
				</div>
				<hr/>

				<!--头像 -->
				<div class="user-infoPic">

					<div class="filePic">
						<input type="file" class="inputPic" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*">
						<img class="am-circle am-img-thumbnail" src="{{url('home/usercenter/images/getAvatar.do.jpg') }}" alt="" />
					</div>

					<p class="am-form-help">头像</p>

					<div class="info-m">
						<div><b>用户名：<i>{{ Session('user')->name }}</i></b></div>
						<div class="vip">
                              <span></span><a href="#">会员专享</a>
						</div>
					</div>
				</div>

				<!--个人信息 -->
				<div class="info-main">
					<form class="am-form am-form-horizontal" action="{{ url('/home/center/userinfo_create') }}" method="POST">
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
							<label for="user-name2" class="am-form-label">昵称</label>
							<div class="am-form-content">
								<input type="text" id="user-name2" name="name" placeholder="nickname" value="{{ Session('user')->name }}">
                                  <small>昵称长度不能超过40个汉字</small>
							</div>
						</div>

						<div class="am-form-group">
							<label for="user-name" class="am-form-label">姓名</label>
							<div class="am-form-content">
								<input type="text" id="user-name2" name="true_name" placeholder="name">
                                 
							</div>
						</div>

						<div class="am-form-group">
							<label class="am-form-label">性别</label>
							<div class="am-form-content sex">
								<label class="am-radio-inline">
									<input type="radio" name="sex" value="1" data-am-ucheck> 男
								</label>
								<label class="am-radio-inline">
									<input type="radio" name="sex" value="2" data-am-ucheck> 女
								</label>
								<label class="am-radio-inline">
									<input type="radio" name="sex" value="0" data-am-ucheck> 保密
								</label>
							</div>
						</div>

						<div class="am-form-group">
							<label for="user-birth" class="am-form-label">生日</label>
							<div class="am-form-content birth">
								<div class="birth-select">
									<select data-am-selected name="birthday">
										<option value="2018">2018</option>
										<option value="2017">2017</option>
										<option value="2016">2016</option>
										<option value="2015">2015</option>
										<option value="2014">2014</option>
										<option value="2013">2013</option>
										<option value="2012">2012</option>
										<option value="2011">2011</option>
										<option value="2010">2010</option>
										<option value="2009">2009</option>
										<option value="2008">2008</option>
										<option value="2007">2007</option>
										<option value="2006">2006</option>
										<option value="2005">2005</option>
										<option value="2004">2004</option>
										<option value="2003">2003</option>
										<option value="2002">2002</option>
										<option value="2001">2001</option>
										<option value="2000">2000</option>
										<option value="1999">1999</option>
										<option value="1998">1998</option>
										<option value="1997">1997</option>
										<option value="1996">1996</option>
										<option value="1995">1995</option>
										<option value="1994">1994</option>
										<option value="1993">1993</option>
										<option value="1992">1992</option>
										<option value="1991">1991</option>
										<option value="1990">1990</option>
										<option value="1989">1989</option>
										<option value="1988">1988</option>
										<option value="1987">1987</option>
									</select>
									<em>年</em>
								</div>
								<div class="birth-select2">
									<select data-am-selected>
										<option value="12">12</option>
										<option value="11">11</option>
										<option value="10">10</option>
										<option value="09">09</option>
										<option value="08">08</option>
										<option value="07">07</option>
										<option value="06">06</option>
										<option value="05">05</option>
										<option value="04">04</option>
										<option value="03">03</option>
										<option value="02">02</option>
										<option value="01">01</option>
									</select>
									<em>月</em></div>
								<div class="birth-select2">
									<select data-am-selected>
										<option value="a">21</option>
										<option value="b">23</option>
									</select>
									<em>日</em></div>
							</div>
					
						</div>
						<div class="am-form-group">
							<label for="user-phone" class="am-form-label">电话</label>
							<div class="am-form-content">
								<input id="user-phone" name="tel" placeholder="telephonenumber" type="tel">

							</div>
						</div>
						<div class="am-form-group">
							<label for="user-email" class="am-form-label">电子邮件</label>
							<div class="am-form-content">
								<input id="user-email" name="email" placeholder="Email" type="email" value="{{ Session('user')->email }}">

							</div>
						</div>
						<div class="am-form-group address">
							<label for="user-address" class="am-form-label">收货地址</label>
							<div class="am-form-content address">
								<a href="address.html">
									<p class="new-mu_l2cw">
										<span class="province">湖北</span>省
										<span class="city">武汉</span>市
										<span class="dist">洪山</span>区
										<span class="street">雄楚大道666号(中南财经政法大学)</span>
										<span class="am-icon-angle-right"></span>
									</p>
								</a>

							</div>
						</div>
						<div class="am-form-group safety">
							<label for="user-safety" class="am-form-label">账号安全</label>
							<div class="am-form-content safety">
								<a href="safety.html">

									<span class="am-icon-angle-right"></span>

								</a>

							</div>
						</div>
						<div class="info-btn">
							<button type="submit" >保存修改</button>
						</div>

					</form>
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
