@extends('Home.user.centerlayout')

@section('content')
<div class="center">
	<div class="col-main">
		<div class="main-wrap">

			<div class="user-collection">
				<!--标题 -->
				<div class="am-cf am-padding">
					<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我的收藏</strong> / <small>My&nbsp;Collection</small></div>
				</div>
				<hr/>

				<div class="you-like">
					<div class="s-bar">
						我的收藏
						<a class="am-badge am-badge-danger am-round">降价</a>
						<a class="am-badge am-badge-danger am-round">下架</a>
					</div>
					@if(session('info'))
					      <div class="alert alert-info">
					        {{ session('info') }}
					      </div>
					    @endif
					<div class="s-content">
					@foreach($colldata as $k=>$v)
					    
						<div class="s-item-wrap">
							<div class="s-item">

								<div class="s-pic">
									<a href="{{ url('home/details') }}/{{ $v->goods_id }}" class="s-pic-link">
										<img src="{{ $v->goods_original }}" alt="" title="" class="s-pic-img s-guess-item-img">
									</a>
								</div>
								<div class="s-info">
									<div class="s-title"><a href="{{ url('home/details') }}/{{ $v->goods_id }}" title="{{ $v->goods_name }}">{{ $v->goods_name }}</a></div>
									<div class="s-price-box">
										<span class="s-price"><em class="s-price-sign">¥</em><em class="s-value">42.50</em></span>
										<span class="s-history-price"><em class="s-price-sign">¥</em><em class="s-value">68.00</em></span>

										<a href="{{ url('home/coll/del') }}/{{ $v->id }}" class="c-nodo J_delFav_btn">取消收藏</a>
									</div>
									<div class="s-extra-box">
										<span class="s-comment">好评: 98.03%</span>
										<span class="s-sales">月销: 219</span>
									</div>
								</div>
								<div class="s-tp">
									<span class="ui-btn-loading-before">找相似</span>
									<i class="am-icon-shopping-cart"></i>
									<span class="ui-btn-loading-before buy">加入购物车</span>
									<p>
										<a href="" class="c-nodo J_delFav_btn">取消收藏</a>
									</p>
								</div>
							</div>
						</div>
					@endforeach
					</div>

					<div class="s-more-btn i-load-more-item" data-screen="0"><i class="am-icon-refresh am-icon-fw"></i>更多</div>

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