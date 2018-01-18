<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
<title>商城</title>

<!--<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>--->

<!-- Bootstrap -->
<link rel="stylesheet" href="{{asset('/home/css/bootstrap.min.css')}}">

<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('/home/css/font-awesome.min.css')}}">

<!-- Custom CSS -->
<link rel="stylesheet" href="{{asset('/home/css/owl.carousel.css')}}">
<link rel="stylesheet" href="{{asset('/home/style.css')}}">
<link rel="stylesheet" href="{{asset('/home/css/responsive.css')}}">
<link href="{{ asset('home/usercenter/css/admin.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('home/usercenter/css/amazeui.css')}}" rel="stylesheet" type="text/css">
<link href="{{ asset('home/usercenter/css/infstyle.css')}}" rel="stylesheet" type="text/css">
<link href="{{ asset('home/usercenter/css/personal.css')}}" rel="stylesheet" type="text/css">
<link href="{{ asset('home/usercenter/css/stepstyle.css')}}" rel="stylesheet" type="text/css">
<link href="{{ asset('home/usercenter/css/addstyle.css')}}" rel="stylesheet" type="text/css">
<link href="{{ asset('home/usercenter/css/vipstyle.css')}}" rel="stylesheet" type="text/css">
<script src="{{ asset('home/usercenter/js/jquery.min.js') }}"></script>
<script src="{{ asset('home/usercenter/js/amazeui.js') }}"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>

<div class="header-area">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="user-menu">
					<ul>
					@if ( empty( Session('user') ) )
						<li><a href="{{ url('home/login/index') }}"><i class="fa fa-user"></i> {{ Session('user')->name }}</a></li>
					@else
						<li><a href="{{ url('home/loginout') }}"><i class="fa fa-user"></i> 退出</a></li>
						<li><a href="{{ url('home/center') }}"><i class="fa fa-user"></i> {{ Session('user')->name }}</a></li>
					@endif
						<li><a href="{{ url('home/center') }}"><i class="fa fa-user"></i> 个人中心</a></li>
						<li><a href="{{ url('home/cart') }}"><i class="fa fa-user"></i> 购物车</a></li>
						<li><a href="{{ url('home/order') }}"><i class="fa fa-user"></i> 订单</a></li>
						<li><a href="#"><i class="fa fa-heart"></i> 许愿树</a></li>
					</ul>
				</div>
			</div>
			
			<div class="col-md-4">
				<div class="header-right">
					<ul class="list-unstyled list-inline">
						<li class="dropdown dropdown-small">
							<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">currency :</span><span class="value">USD </span><b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">USD</a></li>
								<li><a href="#">INR</a></li>
								<li><a href="#">GBP</a></li>
							</ul>
						</li>

						<li class="dropdown dropdown-small">
							<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">language :</span><span class="value">English </span><b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">English</a></li>
								<li><a href="#">French</a></li>
								<li><a href="#">German</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div> <!-- End header area -->

<div class="site-branding-area">
	<div class="container">
		<div class="row">
			<div class="col-sm-5">
				<div class="logo">
					<h1><a href="{{ url('home/index') }}"><span><img src="{{ url('home/img/logo2.png') }}" alt=""></span></a></h1>
				</div>
			</div>
			<div class="col-sm-7">
				<div class="shopping-item">
					<form action="">
						<input type="text" name="keyword">
						<button type="submit" name="submit">搜索</button>
					</form>
				</div>
			</div>

		</div>
	</div>
</div> <!-- End site branding area -->

<div class="mainmenu-area">
	<div class="container">
		<div class="row">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div> 
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('home/index') }}">首页</a></li>
					<li><a href="{{ url('home/list') }}">奢品美妆</a></li>
					<li><a href="{{ url('home/casual') }}">休闲家居</a></li>
					<li><a href="{{ url('home/digital') }}">数码馆</a></li>
					<li><a href="{{ url('home/outdoor') }}">户外</a></li>
					<li><a href="{{ url('home/cate') }}">全部分类</a></li>
				</ul>
			</div>  
		</div>
	</div>
</div> <!-- End mainmenu area -->

@section('content')

@show
<!-- <div class="footer-top-area">
	<div class="zigzag-bottom"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-6">
				<div class="footer-about-us">
					<h2>e<span>Electronics</span></h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis magni at?</p>
					<div class="footer-social">
						<a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
						<a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
						<a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
						<a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
						<a href="#" target="_blank"><i class="fa fa-pinterest"></i></a>
					</div>
				</div>
			</div>
			
			<div class="col-md-3 col-sm-6">
				<div class="footer-menu">
					<h2 class="footer-wid-title">User Navigation </h2>
					<ul>
						<li><a href="#">My account</a></li>
						<li><a href="#">Order history</a></li>
						<li><a href="#">Wishlist</a></li>
						<li><a href="#">Vendor contact</a></li>
						<li><a href="#">Front page</a></li>
					</ul>                        
				</div>
			</div>
			
			<div class="col-md-3 col-sm-6">
				<div class="footer-menu">
					<h2 class="footer-wid-title">Categories</h2>
					<ul>
						<li><a href="#">Mobile Phone</a></li>
						<li><a href="#">Home accesseries</a></li>
						<li><a href="#">LED TV</a></li>
						<li><a href="#">Computer</a></li>
						<li><a href="#">Gadets</a></li>
					</ul>                        
				</div>
			</div>
			
			<div class="col-md-3 col-sm-6">
				<div class="footer-newsletter">
					<h2 class="footer-wid-title">Newsletter</h2>
					<p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
					<div class="newsletter-form">
						<form action="#">
							<input type="text" placeholder="热销"><br><br>
							<input type="submit" value="搜一下">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> <!-- End footer top area -->

<div class="footer-bottom-area">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="copyright">
					<p>Copyright &copy; 2016.Company name All rights reserved.<a target="_blank" href="http://sc.chinaz.com/moban/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a></p>
				</div>
			</div>
			
			<div class="col-md-4">
				<div class="footer-card-icon">
					<i class="fa fa-cc-discover"></i>
					<i class="fa fa-cc-mastercard"></i>
					<i class="fa fa-cc-paypal"></i>
					<i class="fa fa-cc-visa"></i>
				</div>
			</div>
		</div>
	</div>
</div> <!-- End footer bottom area -->

<!-- Latest jQuery form server -->
<script src="{{asset('/home/js/jquery-1.8.3.min.js')}}"></script>

<!-- Bootstrap JS form CDN -->
<script src="{{asset('/home/js/bootstrap.min.js')}}"></script>

<!-- jQuery sticky menu -->
<script src="{{asset('/home/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('/home/js/jquery.sticky.js')}}"></script>

<!-- jQuery easing -->
<script src="{{asset('/home/js/jquery.easing.1.3.min.js')}}"></script>

<!-- Main Script -->
<script src="{{asset('/home/js/main.js')}}"></script>
</body>
</html>