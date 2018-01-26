@extends('Home.layout')

@section('content')
<div class="slider-area">
	<div class="zigzag-bottom"></div>
	<div id="slide-list" class="carousel carousel-fade slide" data-ride="carousel">
		
		<div class="slide-bulletz">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<ol class="carousel-indicators slide-indicators">
							<li data-target="#slide-list" data-slide-to="0" class="active"></li>
							<li data-target="#slide-list" data-slide-to="1"></li>
							<li data-target="#slide-list" data-slide-to="2"></li>
						</ol>                            
					</div>
				</div>
			</div>
		</div>

		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<div class="single-slide">
					<div class="slide-bg slide-one"></div>
					<div class="slide-text-wrapper">
						<div class="slide-text">
							<div class="container">
								<div class="row">
									<div class="col-md-6 col-md-offset-6">
										<div class="slide-content">
											<h2></h2>
											<p></p>
											<p></p>
											<a href="" class="readmore"></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="single-slide">
					<div class="slide-bg slide-two"></div>
					<div class="slide-text-wrapper">
						<div class="slide-text">
							<div class="container">
								<div class="row">
									<div class="col-md-6 col-md-offset-6">
										<div class="slide-content">
											<h2>We are great</h2>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe aspernatur, dolorum harum molestias tempora deserunt voluptas possimus quos eveniet, vitae voluptatem accusantium atque deleniti inventore. Enim quam placeat expedita! Quibusdam!</p>
											<a href="" class="readmore">Learn more</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="single-slide">
					<div class="slide-bg slide-three"></div>
					<div class="slide-text-wrapper">
						<div class="slide-text">
							<div class="container">
								<div class="row">
									<div class="col-md-6 col-md-offset-6">
										<div class="slide-content">
											<h2>We are superb</h2>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, eius?</p>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti voluptates necessitatibus dicta recusandae quae amet nobis sapiente explicabo voluptatibus rerum nihil quas saepe, tempore error odio quam obcaecati suscipit sequi.</p>
											<a href="" class="readmore">Learn more</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>        
</div> <!-- End slider area -->

<div class="promo-area">
	<div class="zigzag-bottom"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-6">
				<div class="single-promo">
					<i class="fa fa-refresh"></i>
					<p>30天可退换</p>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="single-promo">
					<i class="fa fa-truck"></i>
					<p>免费到家</p>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="single-promo">
					<i class="fa fa-lock"></i>
					<p>购物更放心</p>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="single-promo">
					<i class="fa fa-gift"></i>
					<p>品类齐全</p>
				</div>
			</div>
		</div>
	</div>
</div> <!-- End promo area -->

<div class="maincontent-area">
	<div class="zigzag-bottom"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="latest-product">
					<h2 class="section-title">新品热销</h2>
					<div class="product-carousel">
						{{--开始--}}
						@foreach($res as $v)
						<div class="single-product">
							<div class="product-f-image">
								<img src="{{$v->recommend_img}}" style="width:200px; height:300px;">
								<div class="product-hover">
									<a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> 加入购物车</a>
									<a href="single-product.html" class="view-details-link"><i class="fa fa-link"></i> 查看详情</a>
								</div>
							</div>
							
							<h2><a href="single-product.html">{{$v->recommend_name }}</a></h2>
							
							<div class="product-carousel-price">
								<ins>${{ $v->recommend_price }}</ins> <del>${{$v->recommend_discount}}</del>
							</div> 
						</div>
							@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div> <!-- End main content area -->

<div class="brands-area">
	<div class="zigzag-bottom"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="brand-wrapper">
					<h2 class="section-title">品牌</h2>
					<div class="brand-list">
						<img src="/home/img/services_logo__1.jpg" alt="">
						<img src="/home/img/services_logo__2.jpg" alt="">
						<img src="/home/img/services_logo__3.jpg" alt="">
						<img src="/home/img/services_logo__4.jpg" alt="">
						<img src="/home/img/services_logo__1.jpg" alt="">
						<img src="/home/img/services_logo__2.jpg" alt="">
						<img src="/home/img/services_logo__3.jpg" alt="">
						<img src="/home/img/services_logo__4.jpg" alt="">                            
					</div>
				</div>
			</div>
		</div>
	</div>
</div> <!-- End brands area -->

<div class="product-widget-area">
	<div class="zigzag-bottom"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="single-product-widget">
					<h2 class="product-wid-title">最近浏览</h2>
					<a href="#" class="wid-view-more">更多</a>
					<div class="single-wid-product">
						<a href="single-product.html"><img src="/home/img/product-thumb-4.jpg" alt="" class="product-thumb"></a>
						<h2><a href="single-product.html">Sony playstation microsoft</a></h2>
						<div class="product-wid-rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div>
						<div class="product-wid-price">
							<ins>$400.00</ins> <del>$425.00</del>
						</div>                            
					</div>
					<div class="single-wid-product">
						<a href="single-product.html"><img src="/home/img/product-thumb-1.jpg" alt="" class="product-thumb"></a>
						<h2><a href="single-product.html">Sony Smart Air Condtion</a></h2>
						<div class="product-wid-rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div>
						<div class="product-wid-price">
							<ins>$400.00</ins> <del>$425.00</del>
						</div>                            
					</div>
					<div class="single-wid-product">
						<a href="single-product.html"><img src="/home/img/product-thumb-2.jpg" alt="" class="product-thumb"></a>
						<h2><a href="single-product.html">Samsung gallaxy note 4</a></h2>
						<div class="product-wid-rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div>
						<div class="product-wid-price">
							<ins>$400.00</ins> <del>$425.00</del>
						</div>                            
					</div>
				</div>
			</div>
		</div>
	</div>
</div> <!-- End product widget area -->

@stop
