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

@parent
</div>
@stop