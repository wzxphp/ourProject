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
<!-- 				<ul class="am-avg-sm-1 am-avg-md-3 am-thumbnails">
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
							<a href="{{ url('/home/center/edit') }}/{{ $v->id }}"><i class="am-icon-edit"></i>编辑</a>
							<span class="new-addr-bar">|</span>
							<a href="{{ url('/home/center/del') }}/{{ $v->id }}" onclick="delClick(this);"><i class="am-icon-trash"></i>删除</a>
						</div>
					</li>
					@endforeach
				</ul> -->
				<div class="clear"></div>
				<a class="new-abtn-type" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}">添加新地址</a>
				<!--例子-->
				<div class="am-modal am-modal-no-btn" id="doc-modal-1">

					<div class="add-dress">

						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">修改地址</strong> / <small>Update&nbsp;address</small></div>
						</div>
						<hr/>

						<div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
							<form class="am-form am-form-horizontal" action="{{ url('/home/center/update') }}" method="POST">
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
										<input type="text" name="name" id="user-name" placeholder="收货人" value="{{ $data->name }}">
									</div>
								</div>
								
								<div class="am-form-group">
									<label for="user-phone" class="am-form-label">手机号码</label>
									<div class="am-form-content">
										<input id="user-phone" name="tel" placeholder="手机号必填" type="text" value="{{ $data->tel }}">
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
										<input type="hidden" name="id" value="{{ $data->id }}">
									</div>
								</div>

								<div class="am-form-group">
									<label for="user-intro" class="am-form-label">详细地址</label>
									<div class="am-form-content">
										<textarea class="" rows="3" name="detail_address" id="user-intro" placeholder="输入详细地址" >{{ $data->detail_address }}</textarea>
										<small>100字以内写出你的详细地址...</small>
									</div>
								</div>

								<div class="am-form-group">

										<!-- <a class="am-btn am-btn-danger">保存</a>
										<a href="javascript: void(0)" class="am-close am-btn am-btn-danger" data-am-modal-close>取消</a> -->
										<button id="submit" type="submit">修改</button>

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

@parent

</div>
@stop