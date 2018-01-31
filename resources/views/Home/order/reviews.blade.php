@extends('Home.user.centerlayout')

@section('content')
<center>
@foreach($redata as $k=>$v)
@endforeach
<div role="tabpanel">
    <div class="tab-content">
	    <div role="tabpanel" class="tab-pane fade in active" id="home">
	        <h2>评论</h2>
			@if(count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li style="color:red;">{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
	        <form action="{{ url('/home/reviews') }}" method="POST">
	        {{ csrf_field() }}
		        <div class="submit-review">
		            <p><img src="{{ $v->cargo_message_original }}" style="width:100px;"> {{ $v->cargo_message_name }}</p>
					
		            <input type="hidden" name="goods_id" value="{{ $v->cargo_message_id }}">
		            <input type="hidden" name="user_id" value="{{ Session('home_user')->user_id }}">


		            <div class="rating-chooser">
		                <div class="rating-wrap-post">
			                <input type="radio" name="star" value="1">好评
			                <input type="radio" name="star" value="2">中评
			                <input type="radio" name="star" value="3">差评
		                </div>
		                <div class="rating-wrap-post">
			                <input type="radio" name="comment_type" value="0">匿名评价
			                <input type="radio" name="comment_type" value="1">不匿名评价
		                </div>
		            </div>
		            <div style="width:350px;">
		            	<textarea name="comment_info" cols="30" rows="10"></textarea>
		            </div>
		            <p><input type="submit" value="提交评论"></p>
		        </div>
	        </form>
	    </div>
    </div>

</div>
</center>

@stop