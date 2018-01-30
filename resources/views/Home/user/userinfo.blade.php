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
<!-- 				<div class="user-infoPic">
				<form action="{{ url('/home/center/file') }}" method="POST" enctype="multipart/form-data">
					<div class="filePic">
						<input type="file" name="avatar" class="inputPic" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*">
						<img class="am-circle am-img-thumbnail" src="{{url('home/usercenter/images/getAvatar.do.jpg') }}" alt="" />
					</div>
				</form>
					<p class="am-form-help">头像</p>

					<div class="info-m">
						<div><b>用户名：<i>{{ Session('home_user')->name }}</i></b></div>
						<div class="vip">
                              <span></span><a href="#">会员专享</a>
						</div>
					</div>
				</div> -->

				<!--个人信息 -->
				<div class="info-main">
					<form id="myform" class="am-form am-form-horizontal" action="{{ url('/home/center/userinfo_create') }}" method="POST" enctype="multipart/form-data">
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
								<input type="text" id="user-name2" name="name" placeholder="nickname" value="{{ Session('home_user')->name }}">
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
									<select  id="birthday_y" >
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
									<select  id="birthday_m" >
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
									<em>月</em>
								</div>
								<div class="birth-select2"  >
									<select  id="birthday_d">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
										<option value="11">11</option>
										<option value="12">12</option>
										<option value="13">13</option>
										<option value="14">14</option>
										<option value="15">15</option>
										<option value="16">16</option>
										<option value="17">17</option>
										<option value="18">18</option>
										<option value="19">19</option>
										<option value="20">20</option>
										<option value="21">21</option>
										<option value="22">22</option>
										<option value="23">23</option>
										<option value="24">24</option>
										<option value="25">25</option>
										<option value="26">26</option>
										<option value="27">27</option>
										<option value="28">28</option>
										<option value="29">29</option>
										<option value="30">30</option>
										<option value="31">31</option>
									</select>
									<input type="hidden" id="birthday" name="birthday" value="">
									<em>日</em>
								</div>
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
								<input id="user-email" name="email" placeholder="Email" type="email" value="{{ Session('home_user')->email }}">
							</div>
						</div>

						<div class="info-btn">
							<button id="submit" type="submit" >保存修改</button>
						</div>

					</form>
				</div>

			</div>

		</div>
		<script type="text/javascript">
		    var birthday_y = document.getElementById('birthday_y');
		    var birthday_m = document.getElementById('birthday_m');
		    var birthday_d = document.getElementById('birthday_d');
		    var birthday = document.getElementById('birthday');
		    var submit = document.getElementById('submit');
		    submit.onclick = function(){
		    	birthday.value = ""+birthday_y.value+"-"+birthday_m.value+"-"+birthday_d.value;
		    }
		    
		</script>

		<!--底部-->
		<div class="footer">
		</div>
	</div>

@parent
</div>

@stop
