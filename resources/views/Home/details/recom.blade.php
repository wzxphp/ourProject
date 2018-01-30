@extends('Home.layout')

@section('content')
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>商品详情</h2>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">       
            <div class="col-md-12">
                <div class="product-content-right">
                    <div class="product-breadcroumb">
                        <a href="">Home</a>
                        <a href="">Category Name</a>
                        <a href="">Sony Smart TV - 2015</a>
                    </div>
                    
                    
                    <div class="row">
                    @foreach($recoms as $k=>$v)
                        <div class="col-sm-6">
                            <div id="product-images" class="product-images">
                                <div id="product-main-img" class="product-main-img">
                                    <img id="smallImg" src="{{ $v->recommend_img }}" alt="">
                                    <!-- <div id="move"></div> -->
                                </div>

<!--                                 <div id="big">
                                    <img id="bigImg" style="display:none;" src="{{ $data[$k]->goods_original }}">
                                </div> -->
                                
                                <div id="product-gallery" class="product-gallery">
                                    <img src="{{ $v->recommend_img }}" alt="">
                                    <img src="{{ $v->recommend_img }}" alt="">
                                    <img src="{{ $v->recommend_img }}" alt="">
                                    <img src="{{ $v->recommend_img }}" alt="">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="product-inner">
                                <h2 class="product-name">{{ $v->recommend_name }}</h2>
                                <div class="product-inner-price">
                                    <ins>{{ $v->recommend_price }}</ins> <del>$800.00</del>
                                </div>    
                                
                                <form action="{{ url('/home/cart') }}/{{ $v->id }}" class="cart" method="POST">
                                {{ csrf_field() }}
                                    <div class="quantity">
                                        <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="shopping_number" min="1" step="1">
                                    </div>
                                    @if($v->recomend_status == 1)
                                        <button class="add_to_cart_button" type="submit">加入购物车</button>
                                    @elseif($v->recomend == 2)
                                        <button class="add_to_cart_button" disabled type="submit">商品已下架</button>
                                    @endif
                                </form>   
                                
                                <div class="product-inner-category">
                                    <p>Category: <a href="">Summer</a>. Tags: <a href="">awesome</a>, <a href="">best</a>, <a href="">sale</a>, <a href="">shoes</a>. </p>
                                </div> 
                                
                                <div role="tabpanel">
                                    <ul class="product-tab" role="tablist">
                                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">更多详情</a></li>
                                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">评论</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="home">
                                            <h2>商品详情</h2>  
                                            <p>{{ $v->recommend_info }}</p>
                                        </div>
                                        @endforeach
                                        <div role="tabpanel" class="tab-pane fade" id="profile">
                                            <h2>评论</h2>
                                            @foreach($review as $m=>$n)
                                            <div class="submit-review">
                                                <p>
                                                    @if($n->comment_type == 0)
                                                        <span>匿名评价</span>
                                                    @elseif($n->comment_type == 1)
                                                        @foreach($revuser as $i=>$j)
                                                        <span>{{ $j->name }}</span>
                                                        @endforeach
                                                    @endif
                                                    @if($n->star == 1)
                                                        <span>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </span>
                                                    @elseif($n->star == 2)
                                                        <span>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </span>
                                                    @elseif($n->star == 3)
                                                        <span>差评！！！</span>
                                                    @endif
                                                </p>
                                                <p>
                                                <span>{{ $n->comment_info }}</span>
                                                </p>
                                            </div>
                                            @endforeach
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
</div>

@stop