@extends('Home.layout')

@section('content')
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>超有货</h2>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End Page title area -->
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-sidebar">
                    <h2 class="sidebar-title">搜主题商品</h2>
                    <form action="{{ url('home/search') }}" method="POST">
                    {{ csrf_field() }}
                        <input type="text" name="keywords" placeholder="再逛逛">
                        <input type="submit" value="搜索">
                    </form>
                </div>
                    
                <div class="single-sidebar">
                    <div class="thubmnail-recent">
                        <li><a href="{{ url('home/index') }}">首页</a></li>
                    </div>
                    <div class="thubmnail-recent">
                        <li><a href="{{ url('home/cate') }}">全部分类</a></li>
                    </div>
                    <div class="thubmnail-recent">
                        <li><a href="{{ url('home/list') }}">轻奢美妆</a></li>
                    </div>
                    <div class="thubmnail-recent">
                        <li><a href="{{ url('home/casual') }}">休闲家居</a></li>
                    </div>                    
                    <div class="thubmnail-recent">
                        <li><a href="{{ url('home/digital') }}">数码馆</a></li>
                    </div>                    
                    <div class="thubmnail-recent">
                        <li><a href="{{ url('home/outdoor') }}">户外</a></li>
                    </div>
                </div>

            </div>
            <div class="col-md-8">
                <div class="product-content-right">
                    <div class="woocommerce">
                        @foreach($goodsdata as $k=>$v)
                            <div class="col-md-3 col-md-6">
                                <div class="single-shop-product">
                                    <div class="product-upper">
                                        <a href="{{ url('home/details') }}/{{ $goodsdata[$k]->goods_id }}"><img src="{{ $goodsdata[$k]->goods_original }}" alt=""></a>
                                    </div>
                                    <h2><a href="{{ url('home/details') }}/{{ $goodsdata[$k]->goods_id }}">{{ $goodsdata[$k]->goods_name }}</a></h2>
                                    <div class="product-carousel-price">
                                        <ins>{{ $goodsdata[$k]->goods_price }}</ins> <del>$999.00</del>
                                    </div>  
                                    
                                    <div class="product-option-shop">
                                        <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="{{ url('home/details') }}/{{ $goodsdata[$k]->goods_id }}">查看详情</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- <div class="cart-collaterals"> -->
                            <!-- <div class="cross-sells"> -->
                                <!-- <ul class="products"> -->


                                    <!-- <li class="product"> -->
                                        <!-- <a href="single-product.html"> -->
                                          <!--   <img width="325" height="325" alt="T_4_front" class="attachment-shop_catalog wp-post-image" src="img/product-4.jpg"> -->
                                          <!--   <span class="price"><span class="amount">£20.00</span></span> -->
                                        <!-- </a> -->


                                    <!-- </li> -->
                                <!-- </ul> -->
                            <!-- </div> -->

                        <!-- </div> -->
                    </div>                        
                </div>                    
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="product-pagination text-center">
                    <nav>
                        {!! $goodsdata->render() !!}
                    </nav>                        
                </div>
            </div>
        </div>
    </div>
</div>

@stop